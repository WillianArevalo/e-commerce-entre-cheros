@extends('layouts.admin-template')
@section('title', 'Ajustes generales')
@section('content')
    <div>
        @include('layouts.__partials.admin.header-page', [
            'title' => 'Ajustes',
            'description' => 'Configura los ajustes generales de la aplicación',
        ])
        <div class="m-4 dark:bg-black">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="-mb-px flex flex-wrap text-center text-sm font-medium" id="tab-configurations"
                    data-tabs-toggle="#tab-configurations-content"
                    data-tabs-active-classes="text-primary-600 hover:text-primary-600 dark:text-primary-500 dark:hover:text-primary-500 border-primary-600 dark:border-primary-500"
                    data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                    role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block rounded-t-lg border-b-2 p-4" id="profile-styled-tab"
                            data-tabs-target="#settings-generales" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">
                            Información general
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block rounded-t-lg border-b-2 p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300"
                            id="dashboard-styled-tab" data-tabs-target="#settings-store" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">
                            Configuraciones de la tienda
                        </button>
                    </li>
                </ul>
            </div>
            <div id="tab-configurations-content">
                <div class="hidden" id="settings-generales" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="mt-4">
                        <form action="">

                            <div>
                                <h2 class="mb-2 text-xl font-semibold text-zinc-800 dark:text-zinc-100">
                                    Tienda
                                </h2>
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <div class="flex gap-4">
                                            <div class="flex flex-1 flex-col">
                                                <x-input type="text" name="name"
                                                    placeholder="Ingresa el nombre de la tienda"
                                                    label="Nombre de la tienda" />
                                            </div>
                                        </div>
                                        <div class="mt-4 flex">
                                            <div class="flex flex-1 flex-col">
                                                <x-input type="textarea" name="description"
                                                    placeholder="Ingresa la descripción de la tienda"
                                                    label="Descripción de la tienda" />
                                            </div>
                                        </div>
                                        <div class="mt-4 flex">
                                            <div class="flex flex-1 flex-col">
                                                <x-input type="text" name="url"
                                                    placeholder="Ingresa la URL de la tienda" label="URL de la tienda"
                                                    icon="link" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex gap-4">
                                            <div class="flex-1">
                                                <label class="mb-2 block text-sm font-medium text-zinc-900 dark:text-white">
                                                    Logo de la tienda
                                                </label>
                                                <div class="flex w-full items-center justify-center">
                                                    <label for="logo"
                                                        class="dark:hover:bg-bray-800 @error('image') is-invalid  @enderror flex h-60 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-zinc-400 bg-zinc-50 hover:border-zinc-500 hover:bg-zinc-100 dark:border-zinc-600 dark:bg-transparent dark:hover:border-zinc-700 dark:hover:bg-zinc-950">
                                                        <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                                            <x-icon icon="cloud-upload"
                                                                class="h-12 w-12 text-zinc-400 dark:text-zinc-500" />
                                                        </div>
                                                        <input id="logo" type="file" class="hidden"
                                                            name="image" />
                                                        <img src="" alt="Preview Image" id="logo-preview"
                                                            class="m-10 hidden h-64 w-56 rounded-xl object-cover">
                                                    </label>
                                                </div>
                                                @error('image')
                                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="flex-1">
                                                <label for="image"
                                                    class="mb-2 block text-sm font-medium text-zinc-900 dark:text-white">
                                                    Favicon de la tienda
                                                </label>
                                                <div class="flex w-full items-center justify-center">
                                                    <label for="favicon"
                                                        class="dark:hover:bg-bray-800 @error('image') is-invalid  @enderror flex h-60 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-zinc-400 bg-zinc-50 hover:border-zinc-500 hover:bg-zinc-100 dark:border-zinc-600 dark:bg-transparent dark:hover:border-zinc-700 dark:hover:bg-zinc-950">
                                                        <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                                            <x-icon icon="cloud-upload"
                                                                class="h-12 w-12 text-zinc-400 dark:text-zinc-500" />
                                                        </div>
                                                        <input id="favicon" type="file" class="hidden"
                                                            name="image" />
                                                        <img src="" alt="Preview Image" id="favicon-preview"
                                                            class="m-10 hidden h-64 w-56 rounded-xl object-cover">
                                                    </label>
                                                </div>
                                                @error('image')
                                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div>
                                <h2 class="mt-6 text-xl font-semibold text-zinc-800 dark:text-zinc-100">
                                    Contacto
                                </h2>
                                <div class="mt-2">
                                    <div class="flex gap-4">
                                        <div class="flex flex-1 flex-col">
                                            <x-input type="text" name="name"
                                                placeholder="Ingresa el correo electrónico de contacto" value=""
                                                label="Correo electrónico" icon="mail" />
                                        </div>
                                        <div class="flex flex-1 flex-col">
                                            <x-input type="text" name="name"
                                                placeholder="Ingresa el número de teléfono de contacto" value=""
                                                label="Teléfono de contacto" icon="phone" />
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <x-paragraph>Redes sociales</x-paragraph>
                                        <div class="mt-4 flex gap-4">
                                            <a href="#"
                                                class="rounded-lg border border-zinc-400 p-4 dark:border-zinc-800 dark:hover:bg-zinc-950">
                                                <x-icon icon="facebook" class="h-6 w-6 text-blue-600" />
                                            </a>
                                            <a href="#"
                                                class="rounded-lg border border-zinc-400 p-4 dark:border-zinc-800 dark:hover:bg-zinc-950">
                                                <x-icon icon="twitter" class="h-6 w-6 text-white" />
                                            </a>
                                            <a href="#"
                                                class="rounded-lg border border-zinc-400 p-4 dark:border-zinc-800 dark:hover:bg-zinc-950">
                                                <x-icon icon="instagram" class="h-6 w-6 text-pink-500" />
                                            </a>
                                            <button
                                                class="rounded-lg border border-zinc-400 p-4 dark:border-zinc-800 dark:hover:bg-zinc-950">
                                                <x-icon icon="plus" class="h-6 w-6 text-zinc-800 dark:text-zinc-400" />
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="hidden" id="settings-store" role="tabpanel" aria-labelledby="dashboard-tab">
                    <h2 class="text-xl font-semibold text-secondary dark:text-blue-400">Configuraciones</h2>
                    <div class="flex gap-4">
                        <div
                            class="mt-4 flex h-max w-max flex-col gap-4 rounded-lg border border-zinc-400 p-4 dark:border-zinc-800">
                            <div>
                                <h3 class="text-zinc-700 dark:text-zinc-300">Modo mantenimiento</h3>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">Activa o desactiva el modo
                                    mantenimiento
                                </p>
                                <form action="{{ Route('admin.general-settings.maintenance.update') }}" method="POST">
                                    @csrf
                                    <label class="mt-2 inline-flex cursor-pointer items-center">
                                        <input type="checkbox" name="site_in_maintenance" id="site_in_maintenance"
                                            value="{{ $maintenance->value ?? 0 }}" class="peer sr-only"
                                            {{ $maintenance->value == 1 ? 'checked' : '' }}>
                                        <div
                                            class="peer relative h-6 w-11 rounded-full bg-zinc-200 after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-zinc-400 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rtl:peer-checked:after:-translate-x-full dark:border-zinc-600 dark:bg-zinc-700 dark:peer-focus:ring-blue-800">
                                        </div>
                                        <span class="ms-3 text-sm font-medium text-zinc-900 dark:text-zinc-300">
                                            Activado
                                        </span>
                                    </label>
                                </form>
                                <x-button type="a" text="Ver página en mantimiento" icon="view"
                                    typeButton="secondary" class="mt-2 w-max" />
                            </div>
                        </div>
                        <div
                            class="mt-4 flex h-max w-max flex-col gap-4 rounded-lg border border-zinc-400 p-4 dark:border-zinc-800">
                            <div>
                                <h3 class="text-zinc-700 dark:text-zinc-300">Idiomas</h3>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">
                                    Configura los idiomas disponibles en la aplicación
                                </p>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">
                                    Idiomas agregados:
                                </p>
                                <div class="mt-2 flex gap-2">
                                    <span
                                        class="me-2 rounded bg-blue-100 px-2.5 py-0.5 text-sm font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                        Español
                                    </span>
                                    <span
                                        class="me-2 rounded bg-blue-100 px-2.5 py-0.5 text-sm font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                        Inglés
                                    </span>
                                </div>
                                <x-button type="a" text="Agregar idioma" icon="plus" typeButton="primary"
                                    class="mt-4 w-max" />
                            </div>
                        </div>
                        <div
                            class="mt-4 flex h-max w-max flex-col gap-4 rounded-lg border border-zinc-400 p-4 dark:border-zinc-800">
                            <div>
                                <h3 class="text-zinc-700 dark:text-zinc-300">Cookies</h3>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">
                                    Configura las cookies de la aplicación
                                </p>
                                <div class="mt-2 flex flex-col gap-2">
                                    <x-button type="button" text="Ver cookies" icon="view" typeButton="secondary"
                                        class="w-max" id="view-cookies" />
                                    <x-button type="a" text="Configurar cookies" icon="settings"
                                        typeButton="primary" class="w-max" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="rounded-lg border border-zinc-400 p-4 dark:border-zinc-800">
                            <h3 class="text-zinc-700 dark:text-zinc-300">Footer</h3>
                            <p class="text-sm text-zinc-600 dark:text-zinc-400">
                                Configura el contenido del footer de la aplicación
                            </p>
                            <div class="mt-4">
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">
                                    Contenido actual:
                                </p>
                                @include('layouts.__partials.store.footer')
                            </div>
                            <x-button type="a" text="Editar footer" icon="edit" typeButton="primary"
                                class="mt-4 w-max" />
                        </div>
                        <div class="mt-4 rounded-lg border border-zinc-400 p-4 dark:border-zinc-800">
                            <h3 class="text-zinc-700 dark:text-zinc-300">
                                Menú de navegación
                            </h3>
                            <p class="text-sm text-zinc-600 dark:text-zinc-400">
                                Configura el contenido del menú de navegación de la aplicación
                            </p>
                            <div class="mt-4">
                                <p class="mb-2 text-sm text-zinc-600 dark:text-zinc-400">
                                    Contenido actual:
                                </p>
                                @include('layouts.__partials.store.navbar')
                            </div>
                            <x-button type="a" text="Editar menú de navegación" icon="edit"
                                typeButton="primary" class="mt-4 w-max" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
