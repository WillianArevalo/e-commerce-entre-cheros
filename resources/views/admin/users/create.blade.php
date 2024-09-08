@extends('layouts.admin-template')
@section('title', 'Nuevo usuario')
@section('content')
    <div class="dark:bg-black">
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Nuevo usuario',
            'text' => 'Regresar a la lista de usuarios',
            'url' => route('admin.users.index'),
        ])
        <div class="bg-white dark:bg-black">
            <div class="mx-auto w-full">
                <form action="{{ Route('admin.users.store') }}" id="form-add-user" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex">
                        <div class="flex-[4]">
                            <div class="flex flex-col gap-1 border-b border-zinc-400 p-4 dark:border-zinc-800">
                                <h2 class="text-lg font-bold uppercase text-zinc-600 dark:text-zinc-300">
                                    Información del usuario
                                </h2>
                                <x-paragraph>
                                    Los campos marcados con <span class="text-red-500">*</span> son obligatorios
                                </x-paragraph>
                            </div>
                            @if ($errors->any())
                                <div class="flex items-center justify-center gap-4 bg-red-100 p-4 dark:bg-red-500">
                                    <x-icon icon="alert" class="h-5 w-5 text-red-500 dark:text-red-300" />
                                    <ul class="list-inside list-disc text-red-500 dark:text-red-300">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="flex flex-col gap-4 p-4">
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <x-input label="Nombre de usuario" placeholder="Usuario" name="username"
                                            type="text" icon="user" required />
                                    </div>
                                    <div class="flex-[3]">
                                        <x-input label="Correo electrónico" placeholder="Ingresa el correo electronico"
                                            name="email" type="email" icon="mail" required />
                                    </div>
                                    <div class="flex-1">
                                        <x-select label="Rol" name="role" id="role" required :options="[
                                            'admin' => 'Administrador',
                                            'user' => 'Usuario',
                                        ]"
                                            selected="{{ old('role') }}" />
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <x-input type="password" label="Contraseña" icon="password-user" id="password-user"
                                            placeholder="Ingresa la contraseña" name="password" required />
                                    </div>
                                    <div class="flex-1">
                                        <x-input type="password" label="Confirmar contraseña" icon="lock-check"
                                            placeholder="Confirma la contraseña" id="password-confirmed"
                                            name="password_confirmation" required />
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <x-input type="text" label="Nombre" placeholder="Ingresa el nombre"
                                            name="name" required />
                                    </div>
                                    <div class="flex-1">
                                        <x-input type="text" label="Apellido" placeholder="Ingresa el apellido"
                                            name="last_name" required />
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <x-select label="Lenguaje" name="locale" id="locale" :options="[
                                            'es' => 'Español',
                                            'en' => 'Inglés',
                                        ]" />
                                    </div>
                                    <div class="flex-1">
                                        <x-select label="Moneda" name="currency" id="currency" :options="$currencies->pluck('code', 'id')->toArray()" />
                                    </div>
                                    <div class="flex-1">
                                        <x-select label="Estado" name="status" id="status" :options="[
                                            '0' => 'Activo',
                                            '1' => 'Inactivo',
                                        ]" />
                                    </div>
                                </div>
                                <div class="w-56">
                                    <x-input label="Zona horiaria" placeholder="Ingresa la zona horaria" name="timezone"
                                        icon="timezone" />
                                </div>
                            </div>
                        </div>
                        <div class="flex-[1.5] border-s border-zinc-400 dark:border-zinc-800">
                            <h2 class="p-4 text-center text-base font-bold uppercase text-zinc-600 dark:text-zinc-300">
                                Foto de perfil
                            </h2>
                            <div class="group relative flex items-center justify-center p-4">
                                <img src="{{ Storage::url('images/default-profile.png') }}" alt="Foto de perfil"
                                    class="h-56 w-56 rounded-full object-cover" id="image-profile">
                                <label for="profile"
                                    class="absolute inset-0 flex cursor-pointer items-center justify-center rounded-full bg-black bg-opacity-50 text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                    <x-icon icon="camera-plus" class="h-5 w-5" />
                                    <input type="file" name="profile" id="profile" class="hidden"
                                        accept=".img, .jpg, .png, .webp" />
                                </label>
                            </div>
                            <div class="mt-4 flex items-center justify-center">
                                <x-button type="button" id="remove-image" icon="image-remove" text="Eliminar imagen"
                                    typeButton="secondary" size="small" />
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-4 border-t border-zinc-400 py-4 dark:border-zinc-800">
                        <x-button type="submit" text="Guardar" icon="save" typeButton="primary" />
                        <x-button type="a" href="{{ url()->previous() }}" text="Cancelar" icon="cancel"
                            typeButton="secondary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
