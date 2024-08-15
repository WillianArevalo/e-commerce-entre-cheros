@extends('layouts.admin-template')

@section('title', 'Configuración')

@section('content')
    <main>
        <section class="p-4 dark:bg-black">
            <div class="flex items-center rounded-lg border border-zinc-300 px-4 py-2 dark:border-zinc-900">
                <img src="{{ Storage::url($user->profile_photo_path) }}" alt=""
                    class="h-20 w-20 rounded-full object-cover">
                <div class="flex flex-col justify-center gap-2 p-4">
                    <h1 class="text-2xl font-bold dark:text-white">{{ $user->username }}</h1>
                    <p class="text-sm text-zinc-400">{{ $user->email }}</p>
                    <span
                        class="rounded-full border border-blue-800 p-2 text-center text-sm text-blue-500">{{ $user->role === 'admin' ? 'Administrador' : $user->role }}
                    </span>
                </div>
            </div>
            <div class="mt-4 rounded-lg border border-zinc-300 p-4 dark:border-zinc-900">
                <h1 class="text-2xl font-bold dark:text-white">Configuración</h1>
                <form action="" method="POST">
                    <div class="mt-4 grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="rounded-lg">
                            <h2 class="text-xl font-bold dark:text-white">Información de la cuenta</h2>
                            @csrf
                            @method('PUT')
                            <div class="mt-4">
                                <x-input type="text" label="Nombre de usuario" name="username"
                                    value="{{ $user->username }}" placeholder="Nombre del usuario" icon="user" />
                            </div>
                            <div class="mt-4">
                                <x-input type="password" label="Contraseña" placeholder="Cambiar contraseña"
                                    icon="password" />
                            </div>
                            <div class="mt-4">
                                <x-input type="password" label="Confirmar contraseña" placeholder="Confirmar contraseña"
                                    icon="password" />
                            </div>
                        </div>
                        <div class="rounded-lg">
                            <h2 class="text-xl font-bold dark:text-white">Foto de perfil</h2>
                            <div class="mt-4">
                                <label for="imageCategorie"
                                    class="dark:hover:bg-bray-800 @error('image') is-invalid  @enderror flex h-80 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-zinc-300 bg-zinc-50 hover:bg-zinc-100 dark:border-zinc-600 dark:bg-transparent dark:hover:border-zinc-500 dark:hover:bg-zinc-950">
                                    <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                        <x-icon icon="cloud-upload" class="h-12 w-12 text-zinc-400 dark:text-zinc-500" />
                                        <p class="mb-2 text-sm text-zinc-500 dark:text-zinc-400"><span
                                                class="font-semibold">Clic para agregar </span> o desliza la imagen</p>
                                        <p class="text-xs text-zinc-500 dark:text-zinc-400">PNG, JPG, WEBP</p>
                                    </div>
                                    <input id="imageCategorie" type="file" class="hidden" name="image" />
                                    <img src="" alt="Preview Image" id="previewImage"
                                        class="m-10 hidden h-64 w-56 object-cover">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <x-button type="submit" typeButton="primary" text="Guardar cambios" />
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection
