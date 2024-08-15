@extends('layouts.admin-template')

@section('title', 'Nueva categoría')

@section('content')
    <div class="mt-4 dark:bg-black">
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Nuevo usuario',
            'text' => 'Regresar a la lista de usuarios',
            'url' => route('admin.users.index'),
        ])
        <div class="mt-4 bg-white px-4 dark:bg-black">
            <div class="mx-auto w-full">
                <form action="{{ route('admin.users.store') }}" class="flex flex-col gap-4" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="flex gap-4">
                        <div
                            class="bg-whtie flex h-max flex-1 flex-col rounded-lg border border-zinc-300 dark:border-zinc-900 dark:bg-black">
                            <p
                                class="border-b border-zinc-200 p-4 text-sm font-medium text-zinc-600 dark:border-zinc-900 dark:text-zinc-400">
                                Foto de perfil
                            </p>
                            <div class="flex flex-col items-center justify-center py-4">
                                <img src="{{ asset('images/default-profile.png') }}" alt="Foto de perfil" id="previewImage"
                                    class="@error('profile') is-invalid @enderror h-60 w-60 rounded-full object-cover">
                                @error('profile')
                                    <span class="mt-4 text-sm text-red-500">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="flex justify-end border-t border-zinc-200 dark:border-zinc-900">
                                <label for="profile"
                                    class="m-4 flex cursor-pointer items-center gap-2 rounded border-2 border-zinc-300 px-3.5 py-2.5 text-sm font-medium text-zinc-600 transition-colors hover:bg-zinc-100 dark:border-zinc-800 dark:text-white dark:hover:bg-zinc-900">
                                    <x-icon icon="image-add" class="h-5 w-5 text-current" />
                                    Agregar foto
                                </label>
                                <input type="file" name="profile" id="profile" class="hidden">
                            </div>
                        </div>
                        <div class="flex-[2] rounded-lg border border-zinc-300 bg-white dark:border-zinc-900 dark:bg-black">
                            <p
                                class="border-b border-zinc-200 p-4 text-sm font-medium text-zinc-600 dark:border-zinc-900 dark:text-zinc-400">
                                Información del usuario
                            </p>
                            <div class="flex flex-col gap-4 p-4">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1">
                                        <x-input type="text" name="username" id="username" label="Nombre de usuario"
                                            placeholder="Ingresa el usuario" />
                                    </div>
                                    <div class="flex-[2]">
                                        <x-input type="email" name="email" id="email_user" label="Correo electrónico"
                                            placeholder="Ingresa el correo electrónico del usuario" />
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="flex-1">
                                        <x-input type="text" name="name" id="name" label="Nombre"
                                            placeholder="Ingresa el nombre" />
                                    </div>
                                    <div class="flex-1">
                                        <x-input type="text" name="last_name" id="last_name" label="Apellido"
                                            placeholder="Ingresa el apellido del usuario" />
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="flex-1">
                                        <x-input type="password" name="password" id="password_user" label="Contraseña"
                                            placeholder="Ingresa la contraseña del usuario" />
                                    </div>
                                    <div class="flex-1">
                                        <x-input type="password" name="password_confirmation" id="password_confirmation"
                                            label="Confirmar contraseña" placeholder="Confirmar la contraseña" />
                                    </div>
                                </div>
                                <div class="flex">
                                    <x-select label="Rol" id="role" name="role" value="principal"
                                        :options="['admin' => 'Administrador', 'supervisor' => 'Supervisor']" selected="admin" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Ingresar usuario" icon="add-circle" typeButton="primary" />
                        <x-button type="a" href="{{ route('admin.users.index') }}" text="Regresar"
                            typeButton="secondary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
