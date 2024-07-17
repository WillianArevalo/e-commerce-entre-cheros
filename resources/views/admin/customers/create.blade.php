@extends('layouts.admin-template')

@section('title', 'Nuevo producto')

@section('content')
    <div class="mt-4">
        <div class="dark:bg-black py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-zinc-900">
            <a href="{{ route('admin.products.index') }}"
                class="text-gray-500 dark:text-gray-400 flex items-center justify-center gap-1 text-sm hover:underline hover:text-gray-600">
                <x-icon icon="arrow-left-02" class="w-4 h-4 text-current" />
                Regresar a clientes
            </a>
            <h1 class="text-3xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Nuevo cliente
            </h1>
        </div>
        <div class="bg-white dark:bg-black p-4">
            <div class="mx-auto w-full">
                <form action="{{ route('admin.customers.store') }}" class="flex flex-col gap-4" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="flex flex-col gap-1">
                        <h2 class="text-gray-700 dark:text-gray-300 text-lg uppercase">Información del cliente</h2>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">
                            Los campos marcados con <span class="text-red-500">*</span> son obligatorios
                        </p>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-[2] flex flex-col gap-4">
                            <div class="bg-white border border-gray-200 p-4 rounded-lg dark:bg-black dark:border-zinc-900">
                                <h2 class="text-base mb-2 dark:text-blue-400 text-blue-700 font-semibold">
                                    Información general
                                </h2>
                                <div class="flex gap-4 flex-col">
                                    <div class="flex-1">
                                        <x-input label="Nombre" type="text" id="name" name="name"
                                            placeholder="Ingresa el nombre del cliente" value="{{ old('name') }}"
                                            required />
                                    </div>
                                    <div class="flex-1">
                                        <x-input label="Apellido" type="text" id="last_name" name="last_name"
                                            placeholder="Ingresa el apellido del cliente" value="{{ old('last_name') }}"
                                            required />
                                    </div>
                                </div>
                                <div class="flex gap-4 mt-4">
                                    <div class="flex-1">
                                        <x-input label="Fecha de nacimiento" type="date" id="birthdate" name="birthdate"
                                            value="{{ old('birthdate') }}" required />
                                    </div>
                                    <div class="flex-1">
                                        <x-input label="Telefono" type="text" id="phone" name="phone"
                                            value="{{ old('phone') }}" placeholder="Ingresa el telefono del cliente"
                                            required />
                                    </div>
                                    <div class="w-max flex-1">
                                        <x-select label="Sexo" id="gender" name="gender" value="male" selected=""
                                            :options="['male' => 'Masculino', 'female' => 'Femenino']" />
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white border border-gray-200 p-4 rounded-lg dark:bg-black dark:border-zinc-900">
                                <h2 class="text-base mb-2 dark:text-blue-400 text-blue-700 font-semibold">
                                    Información de contacto
                                </h2>
                                <div class="flex gap-4 flex-col">
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
                                <div class="flex gap-4 mt-4">
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
                                <div class="flex gap-4 mt-4">
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
                            <div class="bg-white border border-gray-200 p-4 rounded-lg dark:bg-black dark:border-zinc-900">
                                <h2 class="text-base mb-2 dark:text-blue-400 text-blue-700 font-semibold">
                                    Datos de usuario
                                </h2>
                                <div>
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm dark:text-gray-400 text-gray-600 font-medium p-4">
                                            Foto de perfil
                                        </p>
                                        <div class="flex justify-end">
                                            <label for="profile"
                                                class="flex items-center justify-center gap-2 text-sm bg-blue-600 text-white px-4 py-2 rounded cursor-pointer hover:bg-blue-800 w-max m-4 hover:ring-4 hover:ring-blue-200 dark:ring-blue-900">
                                                <x-icon icon="image-add" class="w-5 h-5 text-current" />
                                                Agregar foto
                                            </label>
                                            <input type="file" name="profile" id="profile" class="hidden">
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center flex-col py-4">
                                        <img src="{{ asset('images/default-profile.png') }}" alt="Foto de perfil"
                                            id="previewImage"
                                            class="rounded-full w-40 h-40 object-cover @error('profile') is-invalid @enderror">
                                        @error('profile')
                                            <span class="text-red-500 text-sm mt-4">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="flex gap-4 flex-col">
                                        <div class="flex-1">
                                            <x-input label="Nombre de usuario" type="text" id="username"
                                                name="username" placeholder="Ingresa el nombre del usuario"
                                                value="{{ old('username') }}" required />
                                        </div>
                                        <div class="flex-1">
                                            <x-input label="Correo electronico" type="email" id="email_customer"
                                                name="email" placeholder="Ingresa el correo electronico del cliente"
                                                value="{{ old('email') }}" required />
                                        </div>
                                    </div>
                                    <div class="flex gap-4 mt-4 flex-col">
                                        <div class="flex-1 ">
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
                        <x-button type="submit" text="Agregar cliente" icon="add-circle" typeButton="primary" />
                        <x-button type="a" href="{{ route('admin.customers.index') }}" text="Cancelar"
                            icon="cancel" typeButton="danger" />
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
