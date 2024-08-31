@extends('layouts.admin-template')
@section('title', 'Configuración')
@section('content')
    <main>
        <section class="p-4 dark:bg-black">
            <h1 class="mb-3 text-3xl font-bold uppercase text-secondary dark:text-primary">
                Mi cuenta
            </h1>
            <div class="mt-3 rounded-lg border border-zinc-400 dark:border-zinc-800">
                <div class="border-b border-zinc-400 p-4 dark:border-zinc-800">
                    <span
                        class="inline-block rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold uppercase text-blue-500 dark:bg-blue-900 dark:text-blue-300">
                        Administrador
                    </span>
                </div>
                <div class="flex gap-2 p-4">
                    <img src="{{ Storage::url($user->profile) }}" alt="" class="h-28 w-28 rounded-xl object-cover">
                    <label for="profile-image"
                        class="flex h-max w-max cursor-pointer items-center gap-2 rounded-lg border border-zinc-400 px-3.5 py-2.5 text-sm font-medium text-zinc-600 transition-colors duration-300 hover:bg-zinc-100 dark:border-zinc-800 dark:text-white dark:hover:bg-zinc-900">
                        <x-icon icon="photo-up" class="h-5 w-5" />
                        Cambiar foto
                        <input type="file" class="hidden" id="profile-image">
                    </label>
                </div>
                <div class="p-4">
                    <h2>
                        <span class="text-xl font-semibold text-secondary dark:text-primary">
                            Información de seguridad
                        </span>
                    </h2>
                    <div class="mt-4">
                        <h2 class="font-semibold text-zinc-600 dark:text-zinc-200">Correo electrónico</h2>
                        <div class="mt-2 flex gap-2">
                            <div class="w-80">
                                <x-input type="email" icon="mail" name="email" class=""
                                    value="{{ $user->email }}" />
                            </div>
                            <x-button type="secondary" text="Cambiar correo" icon="mail-forward" />
                        </div>
                    </div>
                    <div class="mt-4">
                        <h2 class="font-semibold text-zinc-600 dark:text-zinc-200">
                            Contraseña
                        </h2>
                        <div class="mt-2 flex gap-2">
                            <x-button type="secondary" text="Cambiar contraseña" icon="password-user" />
                        </div>
                        <div class="mt-2">
                            <span class="text-xs uppercase text-zinc-600 dark:text-zinc-200">
                                Ultima actualización:
                                {{ $user->updated_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h2>
                        <span class="text-xl font-semibold text-secondary dark:text-primary">
                            Información personal
                        </span>
                    </h2>
                    <div class="mt-4">
                        <div class="mt-2">
                            <div class="w-96">
                                <x-input type="text" icon="user" name="username" value="{{ $user->username }}"
                                    label="Nombre de usuario" />
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex gap-4">
                            <div class="flex flex-1 flex-col gap-1">
                                <x-input type="text" name="name" value="{{ $user->name }}" label="Nombres" />
                            </div>
                            <div class="flex flex-1 flex-col gap-1">
                                <x-input type="text" name="last_name" value="{{ $user->last_name }}" label="Apellidos" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
