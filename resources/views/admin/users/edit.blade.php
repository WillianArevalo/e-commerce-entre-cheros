@extends('layouts.admin-template')

@section('title', 'Nueva categoría')

@section('content')
    <div class="mt-4">
        <div class="dark:bg-gray-800 py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-gray-700">
            <a href="{{ route('admin.users.index') }}"
                class="text-gray-500 dark:text-gray-400 flex items-center justify-center gap-1 text-sm hover:underline hover:text-gray-600">
                <x-icon icon="arrow-left-02" class="w-4 h-4 text-current" />
                Regresar a usuarios
            </a>
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Editar usuario
            </h1>
        </div>
        <div class="bg-white dark:bg-gray-900 px-4 mt-4">
            <div class="mx-auto w-full mt-4">
                <form action="{{ route('admin.users.update', $user->id) }}" class="flex flex-col gap-4"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex gap-4">
                        <div
                            class="flex  flex-col flex-1 dark:bg-gray-800 bg-gray-50 rounded-lg border border-gray-200 dark:border-none">
                            <p
                                class="text-sm dark:text-gray-400 text-gray-600 font-medium p-4 border-b dark:border-gray-700 border-gray-200">
                                Foto de perfil
                            </p>
                            <div class="flex items-center justify-center flex-col py-4">
                                <img src="{{ Storage::url($user->profile_photo_path) }}"
                                    alt="Foto de perfil {{ $user->username }}" id="previewImage"
                                    class="rounded-full w-60 h-60 object-cover">
                            </div>
                            <div
                                class="flex items-center justify-end p-4 h-full border-t dark:border-gray-700 border-gray-200">
                                <label for="profile"
                                    class="text-sm bg-blue-600 text-white px-4 py-2 block rounded cursor-pointer hover:bg-blue-800 w-max">
                                    Cambiar foto
                                </label>
                                <input type="file" name="profile" id="profile" class="hidden">
                            </div>
                        </div>
                        <div
                            class="flex-[2] dark:bg-gray-800 bg-gray-50  rounded-lg border border-gray-200 dark:border-none">
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
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Rol
                                        </label>
                                        <input type="hidden" id="role" name="role" value="{{ $user->role }}">
                                        <div class="relative">
                                            <div
                                                class="selected border-2 border-gray-300 bg-gray-50 dark:border-gray-600 rounded-lg py-2.5 dark:bg-gray-700 w-full px-4 dark:text-white text-sm flex items-center justify-between">
                                                <span class="itemSelected">
                                                    @if ($user->role === 'admin')
                                                        Administrador
                                                    @else
                                                    @endif
                                                </span>
                                                <x-icon icon="arrow-down" class="w-5 h-5 dark:text-white text-gray-500" />
                                            </div>
                                            <ul
                                                class="absolute z-10 w-full mt-2 py-1 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 selectOptions hidden">
                                                <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
                                                    data-value="admin" data-input="#role">
                                                    Administrador
                                                </li>
                                                <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
                                                    data-value="supervisor" data-input="#role">
                                                    Supervisor
                                                </li>
                                                <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
                                                    data-value="colaborador" data-input="#role">
                                                    Colaborador
                                                </li>
                                            </ul>
                                        </div>
                                        @error('role')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 ms-2">
                                    <span class="block w-2 h-2 ring-2 ring-green-300 bg-green-600 rounded-full"></span>
                                    <span
                                        class="dark:text-white text-black text-sm">{{ Str::ucfirst($user->status) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Editar usuario" icon="edit" typeButton="success" />
                        <x-button type="a" href="{{ route('admin.users.index') }}" text="Cancelar" icon="cancel"
                            typeButton="danger" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
