@extends('layouts.admin-template')

@section('title', 'Nueva categoría')

@section('content')
    <div class="mt-4 dark:bg-black">
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Editar usuario',
            'text' => 'Regresar a la lista de usuarios',
            'url' => route('admin.users.index'),
        ])
        <div class="mt-4 bg-white px-4 dark:bg-black">
            <div class="mx-auto mt-4 w-full">
                <form action="{{ route('admin.users.update', $user->id) }}" class="flex flex-col gap-4"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex gap-4">
                        <div
                            class="flex h-max flex-1 flex-col rounded-lg border border-zinc-400 bg-white dark:border-zinc-800 dark:bg-black">
                            <p
                                class="border-b border-zinc-400 p-4 text-sm font-medium text-zinc-600 dark:border-zinc-800 dark:text-zinc-400">
                                Foto de perfil
                            </p>
                            <div class="flex flex-col items-center justify-center py-4">
                                <img src="{{ Storage::url($user->profile) }}" alt="Foto de perfil {{ $user->username }}"
                                    id="previewImage" class="h-60 w-60 rounded-full object-cover">
                            </div>
                            <div
                                class="flex h-full items-center justify-end border-t border-zinc-400 p-4 dark:border-zinc-800">
                                <label for="profile"
                                    class="flex cursor-pointer items-center gap-2 rounded border-2 border-zinc-400 px-3.5 py-2.5 text-sm font-medium text-zinc-600 transition-colors hover:bg-zinc-100 dark:border-zinc-800 dark:text-white dark:hover:bg-zinc-900">
                                    Cambiar foto
                                </label>
                                <input type="file" name="profile" id="profile" class="hidden">
                            </div>
                        </div>
                        <div class="flex-[2] rounded-lg border border-zinc-400 bg-white dark:border-zinc-800 dark:bg-black">
                            <p
                                class="border-b border-zinc-400 p-4 text-sm font-medium text-zinc-600 dark:border-zinc-700 dark:text-zinc-400">
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
                                <div class="flex items-center gap-4">
                                    <div class="flex-1">
                                        <x-input type="text" name="name" id="name" label="Nombre"
                                            value="{{ $user->name }}" />
                                    </div>
                                    <div class="flex-1">
                                        <x-input type="text" name="last_name" id="last_name" label="Apellido"
                                            value="{{ $user->last_name }}" />
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
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
                                <div class="ms-2 flex items-center gap-2">
                                    <span class="block h-2 w-2 rounded-full bg-green-600 ring-2 ring-green-300"></span>
                                    <span class="text-sm text-black dark:text-white">{{ Str::ucfirst($user->status) }}
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
