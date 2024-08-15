@extends('layouts.admin-template')

@section('title', 'Tickets de soporte')

@section('content')
    <div class="mt-4 rounded-lg">
        <div class="flex flex-col items-start border-y bg-white px-4 py-4 dark:border-zinc-900 dark:bg-black">
            <a href="{{ route('admin.support-tickets.index') }}"
                class="flex items-center justify-center gap-1 text-sm text-zinc-500 hover:text-zinc-600 hover:underline dark:text-zinc-400">
                <x-icon icon="arrow-left-02" class="h-4 w-4 text-current" />
                Regresar a la lista de tickets de soporte
            </a>
            <h1 class="font-secondary text-3xl font-bold text-secondary dark:text-blue-400">
                Detalles del ticket de soporte
            </h1>
        </div>
        <div class="m-4">
            <div class="flex gap-4">
                <div class="flex-[2] rounded-lg border dark:border-zinc-900">
                    <div class="flex items-center justify-between px-4 py-4">
                        <div class="flex items-center gap-8">
                            <h1 class="text-2xl font-bold text-secondary dark:text-blue-500">#86802</h1>
                            <h2 class="text-lg font-medium text-zinc-700 dark:text-white">Problema con la factura</h2>
                        </div>
                        <span class="rounded-full bg-green-500 px-3 py-1 text-sm text-white">Abierto</span>
                    </div>
                    <div class="flex border-t dark:border-zinc-900">
                        <div
                            class="flex flex-1 flex-col items-center justify-center gap-1 border-e p-4 dark:border-zinc-900">
                            <p class="text-sm text-zinc-600 dark:text-zinc-400">Prioridad:</p>
                            <span class="rounded-full bg-yellow-300 px-3 py-1 text-sm text-white">Media</span>
                        </div>
                        <div
                            class="flex flex-1 flex-col items-center justify-center gap-1 border-e p-4 dark:border-zinc-900">
                            <p class="text-sm text-zinc-600 dark:text-zinc-400">Categoría:</p>
                            <p class="text-sm text-zinc-600 dark:text-zinc-400">Facturación</p>
                        </div>
                        <div class="flex flex-1 flex-col items-center justify-center gap-2 p-4">
                            <p class="text-sm text-zinc-600 dark:text-zinc-400">Asignado a:</p>
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('/images/photo.jpg') }}" alt=""
                                    class="h-12 w-12 rounded-full object-cover">
                                <div class="flex flex-col gap-1 text-sm">
                                    <p class="text-zinc-600 dark:text-zinc-400">Username</p>
                                    <span class="rounded-full bg-blue-500 px-3 py-1 text-xs text-white">Administrador</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-1 rounded-lg border px-4 py-4 dark:border-zinc-900">
                    <div class="flex flex-col gap-3">
                        <div class="flex items-center gap-4">
                            <h2 class="font-bold dark:text-white">Información del usuario</h2>
                        </div>
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('/images/photo.jpg') }}" alt=""
                                class="h-14 w-14 rounded-full object-cover">
                            <div class="flex flex-col text-sm">
                                <p class="text-zinc-600 dark:text-zinc-400">Username</p>
                                <p class="text-zinc-600 dark:text-zinc-400">email@example.com</p>
                            </div>
                        </div>
                        <div>
                            <div
                                class="flex w-max items-center gap-2 rounded-full border border-zinc-300 px-4 py-2 text-sm dark:border-zinc-900">
                                <p class="text-zinc-600 dark:text-zinc-400">Fecha de creación:</p>
                                <p class="text-zinc-600 dark:text-zinc-400">24/07/2024</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex-1 rounded-lg border px-4 py-4 dark:border-zinc-900">
                <div class="flex gap-4">
                    <div class="flex flex-1 flex-col items-start gap-2">
                        <h2 class="font-bold text-zinc-700 dark:text-white">Descripción</h2>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur eligendi id nemo aut, unde
                            vel incidunt assumenda et facere nobis ad necessitatibus sequi quia quam. Reiciendis voluptate
                            officia at sequi?
                        </p>
                    </div>
                    <div class="2 flex flex-1 flex-col items-start gap-2">
                        <h2 class="font-bold text-zinc-700 dark:text-white">Archivos</h2>
                        <div class="w-full overflow-hidden rounded-lg border border-zinc-300 dark:border-zinc-900">
                            <table class="w-full text-left text-sm text-zinc-50">
                                <thead
                                    class="bg-zinc-50 text-xs uppercase text-zinc-700 dark:bg-zinc-950 dark:text-zinc-300">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">Archivo</th>
                                        <th scope="col" class="px-4 py-3"></th>
                                    </tr>
                                </thead>
                                <tbody class="font-secondary text-sm">
                                    <tr>
                                        <td class="px-4 py-1">
                                            <span
                                                class="flex items-center gap-2 font-medium text-zinc-600 dark:text-zinc-400">
                                                <x-icon icon="file" class="h-5 w-5 text-current" />
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
                                                class="flex items-center gap-2 font-medium text-zinc-600 dark:text-zinc-400">
                                                <x-icon icon="file" class="h-5 w-5 text-current" />
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
