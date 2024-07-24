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
                Editar usuario
            </h1>
        </div>
        <div class="bg-white dark:bg-black px-4 mt-4">
            <div class="mx-auto w-full mt-4">
                <form action="{{ route('admin.users.update', $user->id) }}" class="flex flex-col gap-4"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex gap-4">
                        <div
                            class="h-max flex flex-col flex-1 dark:bg-black bg-white rounded-lg border border-gray-300 dark:border-zinc-900">
                            <p
                                class="text-sm dark:text-gray-400 text-gray-600 font-medium p-4 border-b dark:border-zinc-900 border-gray-200">
                                Foto de perfil
                            </p>
                            <div class="flex items-center justify-center flex-col py-4">
                                <img src="{{ Storage::url($user->profile_photo_path) }}"
                                    alt="Foto de perfil {{ $user->username }}" id="previewImage"
                                    class="rounded-full w-60 h-60 object-cover">
                            </div>
                            <div
                                class="flex items-center justify-end p-4 h-full border-t dark:border-zinc-900 border-gray-200">
                                <label for="profile"
                                    class="font-medium rounded cursor-pointer flex items-center gap-2 transition-colors text-sm border-2 text-zinc-600 hover:bg-zinc-100 border-zinc-300 dark:border-zinc-800 dark:text-white dark:hover:bg-zinc-900 px-3.5 py-2.5">
                                    Cambiar foto
                                </label>
                                <input type="file" name="profile" id="profile" class="hidden">
                            </div>
                        </div>
                        <div
                            class="flex-[2] dark:bg-black bg-white  rounded-lg border border-gray-300 dark:border-zinc-900">
                            <p
                                class="text-sm dark:text-gray-400 text-gray-600 font-medium p-4 border-b dark:border-gray-700 border-gray-200">
                                Información del usuario
                            </p>
                            <div class="flex flex-col gap-4 p-4">
                                <div class="flex items-center gap-4">
                                    <div class="flex-1">
                                        <x-input type="text" name="username" id="username" value="{{ $user->username }}"
                                            label="Nombre de usuario" placeholder="" />
                                    </div>
                                    <div class="flex-[2]">
                                        <x-input type="email" name="email" id="email_user" value="{{ $user->email }}"
                                            label="Correo electrónico" readonly />
                                    </div>
                                </div>
                                <div class="flex gap-4 items-center">
                                    <div class="flex-1">
                                        <x-input type="text" name="name" id="name" label="Nombre"
                                            value="{{ $user->name }}" />
                                    </div>
                                    <div class="flex-1">
                                        <x-input type="text" name="last_name" id="last_name" label="Apellido"
                                            value="{{ $user->last_name }}" />
                                    </div>
                                </div>
                                <div class="flex gap-4 items-center">
                                    <div class="flex-1">
                                        <x-input type="password" name="password" id="password_user" label="Contraseña"
                                            placeholder="Editar contraseña" />
                                    </div>
                                    <div class="flex-1">
                                        <x-input type="password" name="password_confirmation" id="password_confirmation"
                                            label="Confirmar contraseña" placeholder="Confirmar la contraseña" />
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex-1">
                                        <x-select label="Rol" id="role" name="role" value="user"
                                            :options="[
                                                'admin' => 'Administrador',
                                                'supervisor' => 'Supervisor',
                                                'customer' => 'Cliente',
                                            ]" selected="{{ $user->role }}" value="{{ $user->role }}" />
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 ms-2">
                                    <span class="block w-2 h-2 ring-2 ring-green-300 bg-green-600 rounded-full"></span>
                                    <span class="dark:text-white text-black text-sm">{{ Str::ucfirst($user->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Editar usuario" icon="edit" typeButton="primary" />
                        <x-button type="a" href="{{ route('admin.users.index') }}" text="Cancelar" icon="cancel"
                            typeButton="secondary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
