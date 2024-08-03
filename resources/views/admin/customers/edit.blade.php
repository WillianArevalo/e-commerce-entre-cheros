@extends('layouts.admin-template')

@section('title', 'Nuevo producto')

@section('content')
    <div class="mt-4">
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Editar cliente',
            'text' => 'Regresar a la lista de clientes',
            'url' => route('admin.customers.index'),
        ])
        <div class="bg-white p-4 dark:bg-black">
            <div class="mx-auto w-full">
                <form action="{{ route('admin.customers.update', $customer->id) }}" class="flex flex-col gap-4"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col gap-1">
                        <h2 class="text-lg uppercase text-gray-700 dark:text-gray-300">Información del cliente</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Los campos marcados con <span class="text-red-500">*</span> son obligatorios
                        </p>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex flex-[2] flex-col gap-4">
                            <div class="rounded-lg border border-gray-200 bg-white p-4 dark:border-zinc-900 dark:bg-black">
                                <h2 class="mb-2 text-base font-semibold text-blue-700 dark:text-blue-400">
                                    Información general
                                </h2>
                                <div class="flex flex-col gap-4">
                                    <div class="flex-1">
                                        <x-input label="Nombre" type="text" id="name" name="name"
                                            placeholder="Ingresa el nombre del cliente" value="{{ $customer->user->name }}"
                                            required />
                                    </div>
                                    <div class="flex-1">
                                        <x-input label="Apellido" type="text" id="last_name" name="last_name"
                                            placeholder="Ingresa el apellido del cliente"
                                            value="{{ $customer->user->last_name }}" required />
                                    </div>
                                </div>
                                <div class="mt-4 flex gap-4">
                                    <div class="flex-1">
                                        <x-input label="Fecha de nacimiento" type="date" id="birthdate" name="birthdate"
                                            value="{{ $customer->birthdate }}" required />
                                    </div>
                                    <div class="flex-1">
                                        <x-input label="Telefono" type="text" id="phone" name="phone"
                                            value="{{ $customer->phone }}" placeholder="Ingresa el telefono del cliente"
                                            required />
                                    </div>
                                    <div class="w-max flex-1">
                                        <x-select label="Sexo" id="gender" name="gender" value="male"
                                            selected="{{ $customer->gender }}" :options="['male' => 'Masculino', 'female' => 'Femenino']" />
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-lg border border-gray-200 bg-white p-4 dark:border-zinc-900 dark:bg-black">
                                <h2 class="mb-2 text-base font-semibold text-blue-700 dark:text-blue-400">
                                    Información de contacto
                                </h2>
                                <div class="flex flex-col gap-4">
                                    <div class="flex-1">
                                        <x-input label="Dirección (línea 1)" type="text" id="address_line_1"
                                            name="address_line_1" placeholder="Ingresa la primera línea de la dirección"
                                            required />
                                    </div>
                                    <div class="flex-1">
                                        <x-input label="Dirección (línea 2)" type="text" id="address_line_2"
                                            name="address_line_2" placeholder="Ingresa la segunda línea de la dirección"
                                            required />
                                    </div>
                                </div>
                                <div class="mt-4 flex gap-4">
                                    <div class="flex-[2]">
                                        <x-input type="text" label="País" id="country" name="country"
                                            placeholder="Ingresa el país" required />
                                    </div>
                                    <div class="w-max flex-[2]">
                                        <x-input type="text" label="Estado" id="state" name="state"
                                            placeholder="Ingresa el estado del país" required />
                                    </div>
                                    <div class="flex-1">
                                        <x-input label="Código postal" type="text" id="zip_code" name="zip_code"
                                            placeholder="####" required />
                                    </div>
                                </div>
                                <div class="mt-4 flex gap-4">
                                    <div class="w-max flex-1">
                                        <x-input type="text" label="Ciudad" id="city" name="city"
                                            placeholder="Ingresa la ciudad del país" required />
                                    </div>
                                    <div class="flex-1">
                                        <x-input label="Código de área" type="text" id="area_code" name="area_code"
                                            placeholder="Ingresa el código del área" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="rounded-lg border border-gray-200 bg-white p-4 dark:border-zinc-900 dark:bg-black">
                                <h2 class="mb-2 text-base font-semibold text-blue-700 dark:text-blue-400">
                                    Datos de usuario
                                </h2>
                                <div>
                                    <div class="flex items-center justify-between">
                                        <p class="p-4 text-sm font-medium text-gray-600 dark:text-gray-400">
                                            Foto de perfil
                                        </p>
                                        <div class="flex justify-end">
                                            <label for="profile"
                                                class="m-4 flex cursor-pointer items-center gap-2 rounded border-2 border-zinc-300 px-3.5 py-2.5 text-sm font-medium text-zinc-600 transition-colors hover:bg-zinc-100 dark:border-zinc-800 dark:text-white dark:hover:bg-zinc-900">
                                                <x-icon icon="image-add" class="h-5 w-5 text-current" />
                                                Cambiar foto
                                            </label>
                                            <input type="file" name="profile" id="profile" class="hidden">
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-center justify-center py-4">
                                        <img src="{{ Storage::url($customer->user->profile_photo_path) }}"
                                            alt="Foto de perfil" id="previewImage"
                                            class="@error('profile') is-invalid @enderror h-40 w-40 rounded-full object-cover">
                                        @error('profile')
                                            <span class="mt-4 text-sm text-red-500">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="flex flex-col gap-4">
                                        <div class="flex-1">
                                            <x-input label="Nombre de usuario" type="text" id="username"
                                                name="username" placeholder="Ingresa el nombre del usuario"
                                                value="{{ $customer->user->username }}" required />
                                        </div>
                                        <div class="flex-1">
                                            <x-input label="Correo electronico" type="email" id="email_customer"
                                                name="email" placeholder="Ingresa el correo electronico del cliente"
                                                value="{{ $customer->user->email }}" required />
                                        </div>
                                    </div>
                                    <div class="mt-4 flex flex-col gap-4">
                                        <div class="flex-1">
                                            <x-input label="Contraseña" type="password" id="password_customer"
                                                name="password" placeholder="Ingresa la contraseña del cliente"
                                                required />
                                        </div>
                                        <div class="flex-1">
                                            <x-input label="Confirmar contraseña" type="password"
                                                id="password_confirmation" name="password_confirmation"
                                                placeholder="Confirmar contraseña" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Editar cliente" icon="edit" typeButton="primary" />
                        <x-button type="a" href="{{ route('admin.customers.index') }}" text="Cancelar"
                            icon="cancel" typeButton="secondary" />
                    </div>
                </form>
                <form action="{{ route('admin.subcategories.search') }}" id="formSearchSubcategorie" method="POST">
                    @csrf
                    <input type="hidden" name="categorie_id" id="categorieIdSearch">
                </form>
            </div>
        </div>
    </div>
@endsection
