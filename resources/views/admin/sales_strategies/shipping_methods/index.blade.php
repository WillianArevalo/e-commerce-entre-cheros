@extends('layouts.admin-template')
@section('title', 'Metodos de envío')
@section('content')
    <div>
        <div class="lg:ms-60">
            @include('layouts.__partials.admin.header-page', [
                'title' => 'Estrategias de venta',
                'description' =>
                    'Administrar los cupones de descuento, métodos de envío, método de pagos y cambio de divisas',
            ])
        </div>
        <div class="flex bg-zinc-50 dark:bg-black">
            @include('layouts.__partials.admin.nav-sales-strategies')
            <div class="mx-auto w-full lg:ms-60">
                <h2 class="font-secondary px-4 pt-4 text-lg font-medium text-zinc-600 dark:text-zinc-200 md:text-xl">
                    Métodos de envío
                </h2>
                <div class="mx-auto w-full">
                    <div class="relative overflow-hidden bg-white dark:bg-black">
                        <div
                            class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-x-4 md:space-y-0">
                            <div class="w-full md:w-1/2">
                                <form class="flex items-center" action="{{ route('admin.brands.search') }}"
                                    id="formSearchBrand">
                                    @csrf
                                    <x-input type="text" id="inputSearch" name="inputSearch" data-form="#formSearchBrand"
                                        data-table="#tableBrand" placeholder="Buscar" icon="search" />
                                </form>
                            </div>
                            <div
                                class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0">
                                <x-button type="button" class="open-drawer" data-drawer="#drawer-new-method"
                                    typeButton="primary" text="Agregar método" icon="plus" />
                            </div>
                        </div>
                        <div class="mx-4 mb-4">
                            <x-table>
                                <x-slot name="thead">
                                    <x-tr>
                                        <x-th class="w-10">
                                            <input id="default-checkbox" type="checkbox" value=""
                                                class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-blue-600">
                                        </x-th>
                                        <x-th>
                                            Nombre
                                        </x-th>
                                        <x-th>
                                            Estado
                                        </x-th>
                                        <x-th>
                                            Costo
                                        </x-th>
                                        <x-th :last="true">
                                            Acciones
                                        </x-th>
                                    </x-tr>
                                </x-slot>
                                <x-slot name="tbody">
                                    @if ($methods->count() == 0)
                                        <x-tr>
                                            <x-td colspan="4">
                                                No hay métodos de envío registrados
                                            </x-td>
                                        </x-tr>
                                    @else
                                        @foreach ($methods as $method)
                                            <x-tr>
                                                <x-td class="w-10">
                                                    <input id="default-checkbox" type="checkbox" value="{{ $method->id }}"
                                                        class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-blue-600">
                                                </x-td>
                                                <x-td>
                                                    {{ $method->name }}
                                                </x-td>
                                                <x-td>
                                                    <x-badge-status :status="$method->active" />
                                                </x-td>
                                                <x-td>
                                                    <span>
                                                        ${{ $method->cost }}
                                                    </span>
                                                </x-td>
                                                <x-td>
                                                    <div class="flex gap-2">
                                                        <x-button type="button" class="btnEditShippingMethod"
                                                            data-href="{{ route('admin.sales-strategies.shipping-methods.edit', $method->id) }}"
                                                            data-action="{{ route('admin.sales-strategies.shipping-methods.update', $method->id) }}"
                                                            typeButton="success" icon="edit" onlyIcon="true" />
                                                        <form
                                                            action="{{ route('admin.sales-strategies.shipping-methods.destroy', $method->id) }}"
                                                            id="formDeleteShippingMethod-{{ $method->id }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <x-button type="button"
                                                                data-form="formDeleteShippingMethod-{{ $method->id }}"
                                                                class="buttonDelete" onlyIcon="true" icon="delete"
                                                                typeButton="danger" data-modal-target="deleteModal"
                                                                data-modal-toggle="deleteModal" />
                                                        </form>
                                                        <x-button type="button" class="showMethod"
                                                            data-href="{{ route('admin.sales-strategies.shipping-methods.show', $method->id) }}"
                                                            typeButton="secondary" icon="view" onlyIcon="true" />
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
            </div>
        </div>

        <!-- Delete modal -->
        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar el método de envío?"
            message="No podrás recuperar este registro" action="" />
        <!-- End Delete modal -->

        <!-- Drawer new shipping method  -->
        <div id="drawer-new-method"
            class="drawer fixed right-0 top-0 z-[70] h-screen w-full translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black sm:w-[500px]"
            tabindex="-1" aria-labelledby="drawer-new-method">
            <h5 id="drawer-new-method-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-zinc-500 dark:text-zinc-400">
                Nuevo método de envío
            </h5>
            <button type="button" data-drawer="#drawer-new-method"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <form action="{{ route('admin.sales-strategies.shipping-methods.store') }}" class="flex flex-col gap-4"
                    method="POST">
                    @csrf
                    <div class="w-full">
                        <input type="hidden" name="method" value="POST">
                        <x-input type="text" name="name" required placeholder="Ingresa el nombre del método"
                            label="Nombre" value="{{ old('name') }}" />
                    </div>
                    <div class="w-full">
                        <x-input type="text" name="time" required placeholder="3 - 5 días hábiles"
                            label="Tiempo de entrega" value="{{ old('time') }}" />
                    </div>
                    <div class="w-full">
                        <x-input type="textarea" name="description" required
                            placeholder="Ingresa la descripción del método" label="Descripción"
                            value="{{ old('description') }}" />
                    </div>
                    <div class="w-full">
                        <input type="checkbox" value="0" name="active"
                            class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-blue-600">
                        <label for="active" class="text-sm text-zinc-500 dark:text-zinc-400">Activo</label>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <x-input type="number" step="0.01" name="min_weight" required placeholder="KG"
                                icon="weight-scale" label="Peso mínimo" value="{{ old('description') }}" />
                        </div>
                        <div class="flex-1">
                            <x-input type="number" step="0.01" name="max_weight" required icon="weight-scale"
                                placeholder="KG" label="Peso máximo" value="{{ old('description') }}" />
                        </div>
                    </div>
                    <div>
                        <div class="flex-1">
                            <x-input type="text" name="location" required icon="location" label="Locación"
                                value="{{ old('city') }}" />
                        </div>
                    </div>
                    <div>
                        <div class="flex-1">
                            <x-input type="number" step="0.01" name="cost" required icon="dollar"
                                placeholder="0.00" label="Costo" value="{{ old('cost') }}" />
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Agregar método" icon="plus" typeButton="primary" />
                        <x-button type="button" data-drawer="#drawer-new-method" class="close-drawer" text="Cancelar"
                            typeButton="secondary" icon="cancel" />
                    </div>
                </form>
            </div>
        </div>
        <!-- End Drawer new shipping method -->

        <!-- Drawer edit shipping method -->
        <div id="drawer-edit-method"
            class="drawer fixed right-0 top-0 z-[70] h-screen w-full translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black sm:w-[500px]"
            tabindex="-1" aria-labelledby="drawer-edit-method">
            <h5 id="drawer-edit-method-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-zinc-500 dark:text-zinc-400">
                Editar método de envío
            </h5>
            <button type="button" data-drawer="#drawer-edit-method"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <form action="" class="flex flex-col gap-4" method="POST" id="formEditMethod">
                    @csrf
                    @method('PUT')
                    <div class="w-full">
                        <input type="hidden" name="method" value="UPDATE">
                        <x-input type="text" name="name" id="name" required
                            placeholder="Ingresa el nombre del método" label="Nombre" />
                    </div>
                    <div class="w-full">
                        <x-input type="text" name="time" id="time" required placeholder="3 - 5 días hábiles"
                            label="Tiempo de entrega" />
                    </div>
                    <div class="w-full">
                        <x-input type="textarea" name="description" id="description" required
                            placeholder="Ingresa la descripción del método" label="Descripción" />
                    </div>
                    <div class="w-full">
                        <input type="checkbox" value="0" name="active" id="active"
                            class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-blue-600">
                        <label for="active" class="text-sm text-zinc-500 dark:text-zinc-400">Activo</label>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <x-input type="number" step="0.01" name="min_weight" id="min_weight" required
                                placeholder="KG" icon="weight-scale" label="Peso mínimo" />
                        </div>
                        <div class="flex-1">
                            <x-input type="number" step="0.01" name="max_weight" id="max_weight" required
                                icon="weight-scale" placeholder="KG" label="Peso máximo" />
                        </div>
                    </div>
                    <div>
                        <div class="flex-1">
                            <x-input type="text" name="location" id="location" required icon="location"
                                label="Locación" />
                        </div>
                    </div>
                    <div>
                        <div class="flex-1">
                            <x-input type="number" step="0.01" name="cost" id="cost" required
                                icon="dollar" placeholder="0.00" label="Costo" />
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Editar método" icon="edit" typeButton="primary" />
                        <x-button type="button" data-drawer="#drawer-edit-method" class="close-drawer" text="Cancelar"
                            typeButton="secondary" icon="cancel" />
                    </div>
                </form>
            </div>
        </div>
        <!-- End Drawer edit shipping method -->

        <!-- Drawer details shipping method -->
        <div id="drawer-details-method"
            class="drawer fixed right-0 top-0 z-[70] h-screen w-full translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black sm:w-[500px]"
            tabindex="-1" aria-labelledby="drawer-details-method">
            <h5 id="drawer-details-method-label"
                class="ms-4 inline-flex items-center text-base font-semibold text-zinc-500 dark:text-zinc-400">
                Detalles del método de envío
            </h5>
            <button type="button" data-drawer="#drawer-details-method"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="font-secondary text-sm" id="show-method-content">
            </div>
        </div>
        <!-- End Drawer details shipping method -->
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Comprueba si hay errores de validación en la sesión
            @if ($errors->any())
                @if (old('method') === 'POST')
                    $("#drawer-new-method").removeClass("translate-x-full");
                @elseif (old('method') === 'UPDATE')
                    $("#drawer-edit-method").removeClass("translate-x-full");
                @endif
                $("#overlay").removeClass("hidden");
            @endif
        });
    </script>
@endsection
