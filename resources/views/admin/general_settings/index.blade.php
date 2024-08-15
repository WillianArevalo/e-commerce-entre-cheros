@extends('layouts.admin-template')

@section('title', 'Ajustes generales')

@section('content')
    <div class="mt-4 dark:border-zinc-900 dark:bg-black">
        <div class="flex flex-col items-start border-y px-4 py-4 shadow-sm dark:border-zinc-900 dark:bg-black">
            <h1 class="font-secondary text-2xl font-bold text-secondary dark:text-blue-400">
                Ajustes generales
            </h1>
            <p class="text-sm text-zinc-400">
                Configura los ajustes generales de la aplicación
            </p>
        </div>
        <div class="m-4 p-4 dark:bg-black">
            <h2 class="text-xl font-semibold text-secondary dark:text-blue-400">Configuraciones</h2>
            <div class="flex gap-4">
                <div class="mt-4 flex h-max w-max flex-col gap-4 rounded-lg border border-zinc-300 p-4 dark:border-zinc-900">
                    <div>
                        <h3 class="text-zinc-700 dark:text-zinc-300">Modo mantenimiento</h3>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400">Activa o desactiva el modo mantenimiento</p>
                        <label class="mt-2 inline-flex cursor-pointer items-center">
                            <input type="checkbox" value="" class="peer sr-only">
                            <div
                                class="peer relative h-6 w-11 rounded-full bg-zinc-200 after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-zinc-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rtl:peer-checked:after:-translate-x-full dark:border-zinc-600 dark:bg-zinc-700 dark:peer-focus:ring-blue-800">
                            </div>
                            <span class="ms-3 text-sm font-medium text-zinc-900 dark:text-zinc-300">
                                Activado
                            </span>
                        </label>
                        <x-button type="a" text="Ver página en mantimiento" icon="view" typeButton="secondary"
                            class="mt-2 w-max" />
                    </div>
                </div>
                <div
                    class="mt-4 flex h-max w-max flex-col gap-4 rounded-lg border border-zinc-300 p-4 dark:border-zinc-900">
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
                    class="mt-4 flex h-max w-max flex-col gap-4 rounded-lg border border-zinc-300 p-4 dark:border-zinc-900">
                    <div>
                        <h3 class="text-zinc-700 dark:text-zinc-300">Cookies</h3>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400">
                            Configura las cookies de la aplicación
                        </p>
                        <div class="mt-2 flex items-center gap-4">
                            <x-button type="button" text="Ver cookies" icon="view" typeButton="secondary"
                                class="w-max" />
                            <x-button type="a" text="Editar cookies" icon="edit" typeButton="primary"
                                class="w-max" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="rounded-lg border border-zinc-300 p-4 dark:border-zinc-900">
                    <h3 class="text-zinc-700 dark:text-zinc-300">Footer</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">
                        Configura el contenido del footer de la aplicación
                    </p>
                    <div class="mt-4">
                        <p class="text-sm text-zinc-600 dark:text-zinc-400">
                            Contenido actual:
                        </p>
                        @include('layouts.__partials.footer')
                    </div>
                    <x-button type="a" text="Editar footer" icon="edit" typeButton="primary" class="mt-4 w-max" />
                </div>
                <div class="mt-4 rounded-lg border border-zinc-300 p-4 dark:border-zinc-900">
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
                        @include('layouts.__partials.navbar')
                    </div>
                    <x-button type="a" text="Editar menú de navegación" icon="edit" typeButton="primary"
                        class="mt-4 w-max" />
                </div>
            </div>
        </div>
    </div>
@endsection
