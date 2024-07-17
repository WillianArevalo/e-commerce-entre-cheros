@extends('layouts.admin-template')

@section('title', 'Ajustes generales')

@section('content')
    <div class="dark:border-zinc-900 mt-4 dark:bg-black">
        <div class="dark:bg-black py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-zinc-900">
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Ajustes generales
            </h1>
            <p class="text-sm text-gray-400">
                Configura los ajustes generales de la aplicación
            </p>
        </div>
        <div class="p-4 dark:bg-black m-4">
            <h2 class="text-secondary dark:text-blue-400 font-semibold text-xl">Configuraciones</h2>
            <div class="flex gap-4">
                <div class="flex gap-4 flex-col mt-4 border dark:border-zinc-900 border-gray-300 rounded-lg p-4 w-max h-max">
                    <div>
                        <h3 class="dark:text-gray-300 text-gray-700">Modo mantenimiento</h3>
                        <p class="dark:text-gray-400 text-gray-600 text-sm">Activa o desactiva el modo mantenimiento</p>
                        <label class="inline-flex items-center cursor-pointer mt-2">
                            <input type="checkbox" value="" class="sr-only peer">
                            <div
                                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Activado
                            </span>
                        </label>
                        <x-button type="a" text="Ver página en mantimiento" icon="view" typeButton="secondary"
                            class="w-max mt-2" />
                    </div>
                </div>
                <div
                    class="flex gap-4 flex-col mt-4 border dark:border-zinc-900 border-gray-300 rounded-lg p-4 w-max h-max">
                    <div>
                        <h3 class="dark:text-gray-300 text-gray-700">Idiomas</h3>
                        <p class="dark:text-gray-400 text-gray-600 text-sm">
                            Configura los idiomas disponibles en la aplicación
                        </p>
                        <p class="dark:text-gray-400 text-gray-600 text-sm">
                            Idiomas agregados:
                        </p>
                        <div class="flex gap-2 mt-2">
                            <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                Español
                            </span>
                            <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                Inglés
                            </span>
                        </div>
                        <x-button type="a" text="Agregar idioma" icon="plus" typeButton="primary"
                            class="w-max mt-4" />
                    </div>
                </div>
                <div
                    class="flex gap-4 flex-col mt-4 border dark:border-zinc-900 border-gray-300 rounded-lg p-4 w-max h-max">
                    <div>
                        <h3 class="dark:text-gray-300 text-gray-700">Cookies</h3>
                        <p class="dark:text-gray-400 text-gray-600 text-sm">
                            Configura las cookies de la aplicación
                        </p>
                        <div class="flex gap-4 mt-2 items-center">
                            <x-button type="button" text="Ver cookies" icon="view" typeButton="secondary"
                                class="w-max" />
                            <x-button type="a" text="Editar cookies" icon="edit" typeButton="success"
                                class="w-max" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="p-4 border dark:border-zinc-900 border-gray-300 rounded-lg">
                    <h3 class="dark:text-gray-300 text-gray-700">Footer</h3>
                    <p class="dark:text-gray-400 text-gray-600 text-sm">
                        Configura el contenido del footer de la aplicación
                    </p>
                    <div class="mt-4">
                        <p class="dark:text-gray-400 text-gray-600 text-sm">
                            Contenido actual:
                        </p>
                        @include('layouts.__partials.footer')
                    </div>
                    <x-button type="a" text="Editar footer" icon="edit" typeButton="success" class="w-max mt-4" />
                </div>
                <div class="p-4 border dark:border-zinc-900 border-gray-300 rounded-lg mt-4">
                    <h3 class="dark:text-gray-300 text-gray-700">
                        Menú de navegación
                    </h3>
                    <p class="dark:text-gray-400 text-gray-600 text-sm">
                        Configura el contenido del menú de navegación de la aplicación
                    </p>
                    <div class="mt-4">
                        <p class="dark:text-gray-400 text-gray-600 text-sm mb-2">
                            Contenido actual:
                        </p>
                        @include('layouts.__partials.navbar')
                    </div>
                    <x-button type="a" text="Editar menú de navegación" icon="edit" typeButton="success"
                        class="w-max mt-4" />
                </div>
            </div>
        </div>
    </div>
@endsection
