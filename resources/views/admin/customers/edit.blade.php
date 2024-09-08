@extends('layouts.admin-template')
@section('title', 'Editar cliente')
@section('content')
    <div>
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Editar cliente',
            'text' => 'Regresar a la lista de clientes',
            'url' => route('admin.customers.index'),
        ])
        <div class="bg-white dark:bg-black">
            <div class="mx-auto w-full">
                <div class="flex flex-col gap-1 p-4">
                    <h2 class="text-lg font-bold uppercase text-zinc-700 dark:text-zinc-300">
                        Editar información del cliente
                    </h2>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">
                        Los campos marcados con <span class="text-red-500">*</span> son obligatorios
                    </p>
                </div>
                <div class="flex flex-col border-t border-zinc-400 dark:border-zinc-800">
                    <div class="flex flex-1 flex-col gap-4 p-4">
                        <div class="flex items-center justify-end gap-4">
                            <x-button type="a" href="{{ Route('admin.users.edit', $customer->user->id) }}"
                                id="edit-user" text="Editar usuario" icon="edit" typeButton="secondary" />
                            <x-button type="button" data-drawer="#drawer-new-address" class="open-drawer"
                                text="Agregar dirección" icon="location-plus" typeButton="secondary" />
                        </div>
                        <form action="{{ route('admin.customers.update', $customer->id) }}" class="flex flex-col gap-4"
                            enctype="multipart/form-data" method="POST" id="form-update-customer">
                            @csrf
                            @method('PUT') <!-- Usamos PUT para actualizar -->
                            <div
                                class="flex flex-col gap-4 rounded-lg border border-zinc-400 bg-white p-4 dark:border-zinc-800 dark:bg-black">
                                <div class="w-96">
                                    <x-select label="Cambiar usuario asignado" text="Seleccionar usuario existente"
                                        id="user_id" name="user_id" value="{{ $customer->user->id }}" required
                                        :options="$users->pluck('email', 'id')->toArray()" selected="{{ $customer->user->id }}" />
                                </div>
                            </div>
                            <div class="rounded-lg border border-zinc-400 bg-white p-4 dark:border-zinc-800 dark:bg-black">
                                <h2 class="mb-2 text-base font-semibold text-black dark:text-white">
                                    Información general
                                </h2>
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <x-input label="Nombre" type="text" id="name" name="name"
                                            placeholder="Ingresa el nombre del cliente"
                                            value="{{ old('name', $customer->user->name) }}" required />
                                    </div>
                                    <div class="flex-1">
                                        <x-input label="Apellido" type="text" id="last_name" name="last_name"
                                            placeholder="Ingresa el apellido del cliente"
                                            value="{{ old('last_name', $customer->user->last_name) }}" required />
                                    </div>
                                </div>
                                <div class="mt-4 flex gap-4">
                                    <div class="flex-1">
                                        <x-input icon="calendar" label="Fecha de nacimiento" type="date" id="birthdate"
                                            name="birthdate" value="{{ old('birthdate', $customer->birthdate) }}"
                                            required />
                                    </div>
                                    <div class="flex flex-[2] gap-4">
                                        <div class="flex-1">
                                            <x-input label="Código de área" type="text" icon="plus" name="area_code"
                                                value="{{ old('area_code', $customer->area_code) }}" placeholder="503"
                                                required />
                                        </div>
                                        <div class="flex-[2]">
                                            <x-input label="Telefono" type="text" id="phone" name="phone"
                                                value="{{ old('phone', $customer->phone) }}" icon="phone"
                                                placeholder="Ingresa el telefono del cliente" required />
                                        </div>
                                    </div>
                                    <div class="w-max flex-1">
                                        <x-select label="Sexo" id="gender" name="gender" value="male"
                                            selected="{{ old('gender', $customer->gender) }}" :options="['male' => 'Masculino', 'female' => 'Femenino']" />
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div>
                            <x-table>
                                <x-slot name="thead">
                                    <x-tr>
                                        <x-th>
                                            Tipo de dirección
                                        </x-th>
                                        <x-th>
                                            Dirección
                                        </x-th>
                                        <x-th>
                                            Ciudad
                                        </x-th>
                                        <x-th>
                                            País
                                        </x-th>
                                        <x-th>
                                            Estado
                                        </x-th>
                                        <x-th>
                                            Acciones
                                        </x-th>
                                    </x-tr>
                                </x-slot>
                                <x-slot name="tbody">
                                    @if ($address->count() > 0)
                                        @foreach ($address as $item)
                                            <x-tr section="body">
                                                <x-td>
                                                    {{ App\Utils\Addresses::getAddress($item->type) }}
                                                </x-td>
                                                <x-td>
                                                    {{ $item->address_line_1 }}
                                                </x-td>
                                                <x-td>
                                                    {{ $item->city }}
                                                </x-td>
                                                <x-td>
                                                    {{ $item->country }}
                                                </x-td>
                                                <x-td>
                                                    <x-badge-status :status="$item->active" />
                                                </x-td>
                                                <x-td>
                                                    <div class="flex gap-2">
                                                        <x-button type="button" class="editAddress"
                                                            data-href="{{ Route('admin.addresses.edit', $item->id) }}"
                                                            data-action="{{ Route('admin.addresses.update', $item->id) }}"
                                                            icon="edit" onlyIcon="true" typeButton="success" />
                                                        <form action="{{ Route('admin.addresses.destroy', $item->id) }}"
                                                            method="POST" id="formDeleteAddress-{{ $item->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <x-button type="button" class="buttonDelete"
                                                                data-modal-target="deleteModal"
                                                                data-modal-toggle="deleteModal"
                                                                data-form="formDeleteAddress-{{ $item->id }}"
                                                                typeButton="danger" icon="delete" onlyIcon="true" />
                                                        </form>
                                                    </div>
                                                </x-td>
                                            </x-tr>
                                        @endforeach
                                    @endif
                                </x-slot>
                            </x-table>
                        </div>
                    </div>
                </div>
                <div class="mb-4 flex items-center justify-center gap-2">
                    <x-button type="button" onclick="document.getElementById('form-update-customer').submit()"
                        text="Actualizar cliente" icon="edit" typeButton="primary" />
                    <x-button type="a" href="{{ url()->previous() }}" text="Regresar" typeButton="secondary" />
                </div>

            </div>
        </div>

        <!-- Drawer new address -->
        <div id="drawer-new-address"
            class="drawer fixed right-0 top-0 z-40 h-screen w-[500px] translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-new-address">
            <h5 id="drawer-new-address-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-zinc-500 dark:text-zinc-400">
                Nueva dirección
            </h5>
            <button type="button" data-drawer="#drawer-new-address"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <form action="{{ route('admin.addresses.store', $customer->id) }}" method="POST" id="form-add-address">
                    @csrf
                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                    <div class="flex flex-col gap-4">
                        <div>
                            <x-select label="Tipo de dirección" id="address_type" name="type" required
                                :options="$addresses" />
                        </div>
                        <div>
                            <x-input label="Dirección (línea 1)" type="text" name="address_line_1" icon="location"
                                placeholder="Ingresa la primera línea de la dirección" required />
                        </div>
                        <div>
                            <x-input label="Dirección (línea 2)" type="text" name="address_line_2" icon="location"
                                placeholder="Ingresa la segunda línea de la dirección" required />
                        </div>
                        <div>
                            <x-select type="text" label="País" id="country-address" name="country"
                                :options="$countries" required />
                        </div>
                        <div>
                            <x-input type="text" label="Estado" name="state"
                                placeholder="Ingresa el estado del país" required />
                        </div>
                        <div>
                            <x-input label="Código postal" type="text" name="zip_code" placeholder="####" required />
                        </div>
                        <div>
                            <x-input type="text" label="Ciudad" name="city"
                                placeholder="Ingresa la ciudad del país" required />
                        </div>
                    </div>
                    <div class="my-4 flex gap-10">
                        <div>
                            <x-input type="checkbox" label="Dirección por defecto" name="default" />
                        </div>
                        <div>
                            <x-input type="checkbox" label="Activa" name="status" />
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Agregar dirección" icon="location-plus" typeButton="primary" />
                        <x-button type="button" data-drawer="#drawer-new-address" class="close-drawer" text="Cancelar"
                            typeButton="secondary" />
                    </div>
                </form>
            </div>
        </div>
        <!-- End Drawer new address -->

        <!-- Drawer edit address -->
        <div id="drawer-edit-address"
            class="drawer fixed right-0 top-0 z-40 h-screen w-[500px] translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-edit-address">
            <h5 id="drawer-edit-address-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-zinc-500 dark:text-zinc-400">
                Editar dirección
            </h5>
            <button type="button" data-drawer="#drawer-edit-address"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <form action="" method="POST" id="form-edit-address">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                    <div class="flex flex-col gap-4">
                        <div>
                            <x-select label="Tipo de dirección" id="type" name="type" required
                                :options="$addresses" />
                        </div>
                        <div>
                            <x-input label="Dirección (línea 1)" type="text" id="address_line_1"
                                name="address_line_1" icon="location"
                                placeholder="Ingresa la primera línea de la dirección" required />
                        </div>
                        <div>
                            <x-input label="Dirección (línea 2)" type="text" id="address_line_2"
                                name="address_line_2" icon="location"
                                placeholder="Ingresa la segunda línea de la dirección" required />
                        </div>
                        <div>
                            <x-select type="text" label="País" id="country" name="country" :options="$countries"
                                required />
                        </div>
                        <div>
                            <x-input type="text" label="Estado" id="state" name="state"
                                placeholder="Ingresa el estado del país" required />
                        </div>
                        <div>
                            <x-input label="Código postal" type="text" id="zip_code" name="zip_code"
                                placeholder="####" required />
                        </div>
                        <div>
                            <x-input type="text" label="Ciudad" id="city" name="city"
                                placeholder="Ingresa la ciudad del país" required />
                        </div>
                    </div>
                    <div class="my-4 flex gap-10">
                        <div>
                            <x-input type="checkbox" label="Dirección por defecto" id="default" name="default" />
                        </div>
                        <div>
                            <x-input type="checkbox" label="Activa" id="active" name="active" />
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Editar dirección" icon="edit" typeButton="primary" />
                        <x-button type="button" data-drawer="#drawer-edit-address" class="close-drawer" text="Cancelar"
                            typeButton="secondary" />
                    </div>
                </form>
            </div>
        </div>
        <!-- End Drawer edit address -->

        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar el cliente?"
            message="No podrás recuperar este registro" action="" />
    </div>
    </div>
@endsection
