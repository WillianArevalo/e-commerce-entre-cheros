@extends('layouts.admin-template')
@section('title', 'Editar usuario')
@section('content')
    <div class="mt-4 dark:bg-black">
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Editar usuario',
            'text' => 'Regresar a la lista de usuarios',
            'url' => route('admin.users.index'),
        ])
        <div class="bg-white dark:bg-black">
            <div class="mx-auto w-full">
                <form action="{{ route('admin.users.update', $user->id) }}" id="form-edit-user" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                            type="text" icon="user" value="{{ old('username', $user->username) }}"
                                            required />
                                    </div>
                                    <div class="flex-[3]">
                                        <x-input label="Correo electrónico" placeholder="Ingresa el correo electrónico"
                                            name="email" type="email" icon="mail"
                                            value="{{ old('email', $user->email) }}" required />
                                    </div>
                                    <div class="flex-1">
                                        <x-select label="Rol" name="role" id="role" required :options="[
                                            'admin' => 'Administrador',
                                            'user' => 'Usuario',
                                            'customer' => 'Cliente',
                                        ]"
                                            selected="{{ old('role', $user->role) }}"
                                            value="{{ old('role', $user->role) }}" />
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <x-input type="password" label="Nueva contraseña (opcional)" icon="password-user"
                                            id="password-user" placeholder="Ingresa la nueva contraseña" name="password" />
                                    </div>
                                    <div class="flex-1">
                                        <x-input type="password" label="Confirmar nueva contraseña" icon="lock-check"
                                            placeholder="Confirma la nueva contraseña" id="password-confirmed"
                                            name="password_confirmation" />
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <x-input type="text" label="Nombre" placeholder="Ingresa el nombre"
                                            name="name" value="{{ old('name', $user->name) }}" required />
                                    </div>
                                    <div class="flex-1">
                                        <x-input type="text" label="Apellido" placeholder="Ingresa el apellido"
                                            name="last_name" value="{{ old('last_name', $user->last_name) }}" required />
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <x-select label="Lenguaje" name="locale" id="locale" :options="[
                                            'es' => 'Español',
                                            'en' => 'Inglés',
                                        ]"
                                            selected="{{ old('locale', $user->locale) }}"
                                            value="{{ old('locale', $user->locale) }}" />
                                    </div>
                                    <div class="flex-1">
                                        <x-select label="Moneda" name="currency" id="currency" :options="$currencies->pluck('code', 'code')->toArray()"
                                            selected="{{ old('currency', $user->currency) }}"
                                            value="{{ old('currency', $user->currency) }}" />
                                    </div>
                                    <div class="flex-1">
                                        <x-select label="Estado" name="status" id="status" :options="[
                                            '0' => 'Activo',
                                            '1' => 'Inactivo',
                                        ]"
                                            selected="{{ old('status', $user->status) }}"
                                            value="{{ old('status', $user->status) }}" />
                                    </div>
                                </div>
                                <div class="w-56">
                                    <x-input label="Zona horaria" placeholder="Ingresa la zona horaria" name="timezone"
                                        icon="timezone" value="{{ old('timezone', $user->timezone) }}" />
                                </div>
                            </div>
                        </div>
                        <div class="flex-[1.5] border-s border-zinc-400 dark:border-zinc-800">
                            <h2 class="p-4 text-center text-base font-bold uppercase text-zinc-600 dark:text-zinc-300">
                                Foto de perfil
                            </h2>
                            <div class="group relative flex items-center justify-center p-4">
                                <img src="{{ $user->profile ? Storage::url($user->profile) : Storage::url('images/default-profile.png') }}"
                                    alt="Foto de perfil" class="h-56 w-56 rounded-full object-cover" id="image-profile">
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
                        <x-button type="submit" text="Editar" icon="edit" typeButton="primary" />
                        <x-button type="a" href="{{ url()->previous() }}" text="Cancelar" icon="cancel"
                            typeButton="secondary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
