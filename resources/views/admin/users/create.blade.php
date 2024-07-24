@extends('layouts.admin-template')

@section('title', 'Nueva categoría')

@section('content')
    <div class="mt-4 dark:bg-black">
        <div class="dark:bg-black py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-zinc-900">
            <a href="{{ route('admin.users.index') }}"
                class="text-gray-500 dark:text-gray-400 flex items-center justify-center gap-1 text-sm hover:underline hover:text-gray-600">
                <x-icon icon="arrow-left-02" class="w-4 h-4 text-current" />
                Regresar a usuarios
            </a>
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Nuevo usuario
            </h1>
        </div>
        <div class="bg-white dark:bg-black px-4 mt-4">
            <div class="mx-auto w-full">
                <form action="{{ route('admin.users.store') }}" class="flex flex-col gap-4" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="flex gap-4">
                        <div
                            class="flex h-max flex-col flex-1 dark:bg-black bg-whtie rounded-lg border border-gray-300 dark:border-zinc-900">
                            <p
                                class="text-sm dark:text-gray-400 text-gray-600 font-medium p-4 border-b dark:border-zinc-900 border-gray-200">
                                Foto de perfil
                            </p>
                            <div class="flex items-center justify-center flex-col py-4">
                                <img src="{{ asset('images/default-profile.png') }}" alt="Foto de perfil" id="previewImage"
                                    class="rounded-full w-60 h-60 object-cover @error('profile') is-invalid @enderror">
                                @error('profile')
                                    <span class="text-red-500 text-sm mt-4">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="flex justify-end border-t dark:border-zinc-900 border-gray-200">
                                <label for="profile"
                                    class="font-medium rounded cursor-pointer flex items-center gap-2 transition-colors text-sm border-2 text-zinc-600 hover:bg-zinc-100 border-zinc-300 dark:border-zinc-800 dark:text-white dark:hover:bg-zinc-900 px-3.5 py-2.5 m-4">
                                    <x-icon icon="image-add" class="w-5 h-5 text-current" />
                                    Agregar foto
                                </label>
                                <input type="file" name="profile" id="profile" class="hidden">
                            </div>
                        </div>
                        <div class="flex-[2] dark:bg-black bg-white rounded-lg border border-gray-300 dark:border-zinc-900">
                            <p
                                class="text-sm dark:text-gray-400 text-gray-600 font-medium p-4 border-b dark:border-zinc-900 border-gray-200">
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
                                <div class="flex gap-4 items-center">
                                    <div class="flex-1">
                                        <x-input type="text" name="name" id="name" label="Nombre"
                                            placeholder="Ingresa el nombre" />
                                    </div>
                                    <div class="flex-1">
                                        <x-input type="text" name="last_name" id="last_name" label="Apellido"
                                            placeholder="Ingresa el apellido del usuario" />
                                    </div>
                                </div>
                                <div class="flex gap-4 items-center">
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
