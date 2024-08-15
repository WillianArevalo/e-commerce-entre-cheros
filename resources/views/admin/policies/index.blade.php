@extends('layouts.admin-template')

@section('title', 'Ajustes generales')

@section('content')
    <div class="mt-4 dark:border-zinc-900 dark:bg-black">
        <div class="flex flex-col items-start border-y px-4 py-4 shadow-sm dark:border-zinc-900 dark:bg-black">
            <h1 class="font-secondary text-2xl font-bold text-secondary dark:text-blue-400">
                Políticas
            </h1>
            <p class="text-sm text-zinc-700 dark:text-zinc-400">
                Administra:
            </p>
            <ul class="mt-2 flex flex-col gap-2 text-sm text-zinc-700 dark:text-zinc-400">
                <li class="flex items-center gap-2">
                    <span class="block h-2 w-2 rounded-full bg-blue-500"></span>
                    Políticas de privacidad
                </li>
                <li class="flex items-center gap-2">
                    <span class="block h-2 w-2 rounded-full bg-blue-500"></span>
                    Políticas de compra
                </li>
                <li class="flex items-center gap-2">
                    <span class="block h-2 w-2 rounded-full bg-blue-500"></span>
                    Políticas de pago con tarjeta
                </li>
                <li class="flex items-center gap-2">
                    <span class="block h-2 w-2 rounded-full bg-blue-500"></span>
                    Políticas de envío
                </li>
                <li class="flex items-center gap-2">
                    <span class="block h-2 w-2 rounded-full bg-blue-500"></span>
                    Términos y condiciones
                </li>
            </ul>
        </div>
        <div class="m-4 rounded-lg p-4 dark:bg-black">
            <p class="mb-4 text-sm text-zinc-700 dark:text-zinc-400">Carga los archivos con las políticas correspondientes
            </p>
            <div class="grid grid-cols-3 gap-4">
                <div
                    class="flex flex-col items-center justify-center rounded-lg border border-zinc-300 dark:border-zinc-900">
                    <h4 class="w-full border-b border-zinc-700 p-4 text-center text-sm text-zinc-700 dark:text-zinc-300">
                        Políticas de privacidad
                    </h4>
                    <div class="p-2">
                        <img src="{{ asset('images/photo.jpg') }}" alt="Imagen" class="h-full w-full object-cover">
                    </div>
                    <div class="flex w-full items-center justify-end gap-2 border-t border-zinc-700 p-2">
                        <x-button type="a" text="Agregar PDF" typeButton="primary" icon="pdf" />
                        <x-button type="a" typeButton="secondary" icon="view" />
                        <x-button type="a" typeButton="danger" icon="delete" />
                        <x-button type="button" typeButton="success" icon="import" />
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center rounded-lg border border-zinc-700">
                    <h4 class="w-full border-b border-zinc-700 p-4 text-center text-sm text-zinc-700 dark:text-zinc-300">
                        Políticas de privacidad
                    </h4>
                    <div class="p-2">
                        <img src="{{ asset('images/photo.jpg') }}" alt="Imagen" class="h-full w-full object-cover">
                    </div>
                    <div class="flex w-full items-center justify-end gap-2 border-t border-zinc-700 p-2">
                        <x-button type="a" text="Agregar PDF" typeButton="primary" icon="pdf" />
                        <x-button type="a" typeButton="secondary" icon="view" />
                        <x-button type="a" typeButton="danger" icon="delete" />
                        <x-button type="button" typeButton="success" icon="import" />
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center rounded-lg border border-zinc-700">
                    <h4 class="w-full border-b border-zinc-700 p-4 text-center text-sm text-zinc-700 dark:text-zinc-300">
                        Políticas de privacidad
                    </h4>
                    <div class="p-2">
                        <img src="{{ asset('images/photo.jpg') }}" alt="Imagen" class="h-full w-full object-cover">
                    </div>
                    <div class="flex w-full items-center justify-end gap-2 border-t border-zinc-700 p-2">
                        <x-button type="a" text="Agregar PDF" typeButton="primary" icon="pdf" />
                        <x-button type="a" typeButton="secondary" icon="view" />
                        <x-button type="a" typeButton="danger" icon="delete" />
                        <x-button type="button" typeButton="success" icon="import" />
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center rounded-lg border border-zinc-700">
                    <h4 class="w-full border-b border-zinc-700 p-4 text-center text-sm text-zinc-700 dark:text-zinc-300">
                        Políticas de privacidad
                    </h4>
                    <div class="p-2">
                        <img src="{{ asset('images/photo.jpg') }}" alt="Imagen" class="h-full w-full object-cover">
                    </div>
                    <div class="flex w-full items-center justify-end gap-2 border-t border-zinc-700 p-2">
                        <x-button type="a" text="Agregar PDF" typeButton="primary" icon="pdf" />
                        <x-button type="a" typeButton="secondary" icon="view" />
                        <x-button type="a" typeButton="danger" icon="delete" />
                        <x-button type="button" typeButton="success" icon="import" />
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center rounded-lg border border-zinc-700">
                    <h4 class="w-full border-b border-zinc-700 p-4 text-center text-sm text-zinc-700 dark:text-zinc-300">
                        Políticas de privacidad
                    </h4>
                    <div class="p-2">
                        <img src="{{ asset('images/photo.jpg') }}" alt="Imagen" class="h-full w-full object-cover">
                    </div>
                    <div class="flex w-full items-center justify-end gap-2 border-t border-zinc-700 p-2">
                        <x-button type="a" text="Agregar PDF" typeButton="primary" icon="pdf" />
                        <x-button type="a" typeButton="secondary" icon="view" />
                        <x-button type="a" typeButton="danger" icon="delete" />
                        <x-button type="button" typeButton="success" icon="import" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
