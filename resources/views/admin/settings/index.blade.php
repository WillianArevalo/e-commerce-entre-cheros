@extends('layouts.admin-template')

@section('title', 'Configuración')

@section('content')
    <main>
        <section class="dark:bg-black p-4">
            <div class="flex px-4 py-2 border dark:border-zinc-900 border-gray-300 rounded-lg items-center">
                <img src="{{ Storage::url($user->profile_photo_path) }}" alt=""
                    class="w-20 h-20 rounded-full object-cover">
                <div class="p-4 flex flex-col justify-center gap-2">
                    <h1 class="text-2xl font-bold dark:text-white">{{ $user->username }}</h1>
                    <p class="text-zinc-400 text-sm">{{ $user->email }}</p>
                    <span
                        class="text-blue-500 p-2 rounded-full text-center text-sm border border-blue-800">{{ $user->role === 'admin' ? 'Administrador' : $user->role }}
                    </span>
                </div>
            </div>
            <div class="p-4 border border-gray-300 dark:border-zinc-900 rounded-lg mt-4">
                <h1 class="text-2xl font-bold dark:text-white">Configuración</h1>
                <form action="" method="POST">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
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
                                    class="flex flex-col items-center justify-center w-full h-80 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-transparent hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-zinc-950 @error('image') is-invalid  @enderror">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <x-icon icon="cloud-upload" class="w-12 h-12 text-gray-400 dark:text-gray-500" />
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Clic para agregar </span> o desliza la imagen</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, WEBP</p>
                                    </div>
                                    <input id="imageCategorie" type="file" class="hidden" name="image" />
                                    <img src="" alt="Preview Image" id="previewImage"
                                        class="w-56 h-64 object-cover hidden m-10">
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
