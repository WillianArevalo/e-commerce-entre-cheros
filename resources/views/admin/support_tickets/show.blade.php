@extends('layouts.admin-template')

@section('title', 'Tickets de soporte')

@section('content')
    <div class="rounded-lg mt-4">
        <div class="bg-white dark:bg-black py-4 px-4 flex flex-col items-start border-y dark:border-zinc-900">
            <a href="{{ route('admin.support-tickets.index') }}"
                class="text-gray-500 dark:text-gray-400 flex items-center justify-center gap-1 text-sm hover:underline hover:text-gray-600">
                <x-icon icon="arrow-left-02" class="w-4 h-4 text-current" />
                Regresar a la lista de tickets de soporte
            </a>
            <h1 class="text-3xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Detalles del ticket de soporte
            </h1>
        </div>
        <div class="m-4">
            <div class="flex gap-4">
                <div class="border dark:border-zinc-900 rounded-lg flex-[2]">
                    <div class="flex items-center justify-between py-4 px-4">
                        <div class="flex items-center gap-8">
                            <h1 class="dark:text-blue-500 text-secondary font-bold text-2xl">#86802</h1>
                            <h2 class="dark:text-white text-gray-700 font-medium text-lg">Problema con la factura</h2>
                        </div>
                        <span class="bg-green-500 px-3 py-1 rounded-full text-sm text-white">Abierto</span>
                    </div>
                    <div class="border-t dark:border-zinc-900 flex">
                        <div
                            class="p-4 flex-1 border-e dark:border-zinc-900 flex flex-col gap-1 items-center justify-center">
                            <p class="dark:text-zinc-400 text-zinc-600 text-sm">Prioridad:</p>
                            <span class="bg-yellow-300 px-3 py-1 rounded-full text-white text-sm">Media</span>
                        </div>
                        <div
                            class="p-4 flex-1 border-e dark:border-zinc-900 flex flex-col gap-1 items-center justify-center">
                            <p class="dark:text-zinc-400 text-zinc-600 text-sm">Categoría:</p>
                            <p class="dark:text-zinc-400 text-zinc-600 text-sm">Facturación</p>
                        </div>
                        <div class="p-4 flex-1 flex flex-col gap-2 items-center justify-center">
                            <p class="dark:text-zinc-400 text-zinc-600 text-sm">Asignado a:</p>
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('/images/photo.jpg') }}" alt=""
                                    class="w-12 h-12 object-cover rounded-full">
                                <div class="flex flex-col text-sm gap-1">
                                    <p class="dark:text-zinc-400 text-zinc-600">Username</p>
                                    <span class="bg-blue-500 px-3 py-1 rounded-full text-xs text-white">Administrador</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-4 px-4 border dark:border-zinc-900 rounded-lg flex-1">
                    <div class="flex flex-col gap-3">
                        <div class="flex items-center gap-4">
                            <h2 class="dark:text-white font-bold">Información del usuario</h2>
                        </div>
                        <div class="flex gap-4 items-center">
                            <img src="{{ asset('/images/photo.jpg') }}" alt=""
                                class="w-14 h-14 object-cover rounded-full">
                            <div class="flex flex-col text-sm">
                                <p class="dark:text-zinc-400 text-zinc-600">Username</p>
                                <p class="dark:text-zinc-400 text-zinc-600">email@example.com</p>
                            </div>
                        </div>
                        <div>
                            <div
                                class="flex items-center gap-2 text-sm border dark:border-zinc-900 border-gray-300 px-4 py-2 rounded-full w-max">
                                <p class="dark:text-zinc-400 text-zinc-600">Fecha de creación:</p>
                                <p class="dark:text-zinc-400 text-zinc-600">24/07/2024</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-4 px-4 border dark:border-zinc-900 rounded-lg flex-1 mt-4">
                <div class="flex gap-4">
                    <div class="flex items-start flex-col gap-2 flex-1">
                        <h2 class="dark:text-white text-gray-700 font-bold">Descripción</h2>
                        <p class="dark:text-zinc-400 text-zinc-600 text-sm">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur eligendi id nemo aut, unde
                            vel incidunt assumenda et facere nobis ad necessitatibus sequi quia quam. Reiciendis voluptate
                            officia at sequi?
                        </p>
                    </div>
                    <div class="flex items-start flex-col gap-2 2 flex-1">
                        <h2 class="dark:text-white font-bold text-gray-700">Archivos</h2>
                        <div class="border dark:border-zinc-900 border-gray-300 rounded-lg w-full overflow-hidden">
                            <table class="w-full text-sm text-left text-gray-50">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-zinc-950 dark:text-gray-300">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">Archivo</th>
                                        <th scope="col" class="px-4 py-3"></th>
                                    </tr>
                                </thead>
                                <tbody class="font-secondary text-sm">
                                    <tr>
                                        <td class="px-4 py-1">
                                            <span
                                                class="font-medium flex items-center gap-2 dark:text-zinc-400 text-zinc-600">
                                                <x-icon icon="file" class="w-5 h-5 text-current" />
                                                archivo.pdf
                                            </span>
                                        </td>
                                        <td class="px-4 py-1">
                                            <div class="flex items-center space-x-2">
                                                <x-button type="button" icon="import" typeButton="primary" href=""
                                                    onlyIcon="true" />
                                                <x-button type="a" icon="view" typeButton="secondary"
                                                    href="{{ route('admin.support-tickets.show', 1) }}" onlyIcon="true" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-1">
                                            <span
                                                class="font-medium flex items-center gap-2 dark:text-zinc-400 text-zinc-600">
                                                <x-icon icon="file" class="w-5 h-5 text-current" />
                                                captura.jpg
                                            </span>
                                        </td>
                                        <td class="px-4 py-1">
                                            <div class="flex items-center space-x-2">
                                                <x-button type="button" icon="import" typeButton="primary" href=""
                                                    onlyIcon="true" />
                                                <x-button type="a" icon="view" typeButton="secondary"
                                                    href="{{ route('admin.support-tickets.show', 1) }}" onlyIcon="true" />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
