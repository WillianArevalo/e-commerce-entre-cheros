@extends('layouts.admin-template')

@section('title', 'Ajustes generales')

@section('content')
    <div class="dark:border-zinc-900 dark:bg-black mt-4">
        <div class="dark:bg-black py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-zinc-900">
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Políticas
            </h1>
            <p class="text-sm dark:text-gray-400 text-gray-700">
                Administra:
            </p>
            <ul class="flex flex-col gap-2 dark:text-gray-400 text-gray-700 text-sm mt-2">
                <li class="flex gap-2 items-center">
                    <span class="w-2 h-2 bg-blue-500 rounded-full block"></span>
                    Políticas de privacidad
                </li>
                <li class="flex gap-2 items-center">
                    <span class="w-2 h-2 bg-blue-500 rounded-full block"></span>
                    Políticas de compra
                </li>
                <li class="flex gap-2 items-center">
                    <span class="w-2 h-2 bg-blue-500 rounded-full block"></span>
                    Políticas de pago con tarjeta
                </li>
                <li class="flex gap-2 items-center">
                    <span class="w-2 h-2 bg-blue-500 rounded-full block"></span>
                    Políticas de envío
                </li>
                <li class="flex gap-2 items-center">
                    <span class="w-2 h-2 bg-blue-500 rounded-full block"></span>
                    Términos y condiciones
                </li>
            </ul>
        </div>
        <div class="p-4 rounded-lg dark:bg-black m-4">
            <p class="text-sm dark:text-gray-400 text-gray-700 mb-4">Carga los archivos con las políticas correspondientes
            </p>
            <div class="grid grid-cols-3 gap-4">
                <div
                    class="border border-gray-300 dark:border-zinc-900 rounded-lg flex items-center justify-center flex-col">
                    <h4 class="text-sm text-gray-700 dark:text-gray-300 p-4 border-b border-gray-700 w-full text-center">
                        Políticas de privacidad
                    </h4>
                    <div class="p-2">
                        <img src="{{ asset('images/photo.jpg') }}" alt="Imagen" class="w-full object-cover h-full">
                    </div>
                    <div class="flex gap-2 items-center justify-end w-full p-2 border-t border-gray-700">
                        <x-button type="a" text="Agregar PDF" typeButton="primary" icon="pdf" />
                        <x-button type="a" typeButton="secondary" icon="view" />
                        <x-button type="a" typeButton="danger" icon="delete" />
                        <x-button type="button" typeButton="success" icon="import" />
                    </div>
                </div>
                <div class="border border-gray-700 rounded-lg flex items-center justify-center flex-col">
                    <h4 class="text-sm text-gray-700 dark:text-gray-300 p-4 border-b border-gray-700 w-full text-center">
                        Políticas de privacidad
                    </h4>
                    <div class="p-2">
                        <img src="{{ asset('images/photo.jpg') }}" alt="Imagen" class="w-full object-cover h-full">
                    </div>
                    <div class="flex gap-2 items-center justify-end w-full p-2 border-t border-gray-700">
                        <x-button type="a" text="Agregar PDF" typeButton="primary" icon="pdf" />
                        <x-button type="a" typeButton="secondary" icon="view" />
                        <x-button type="a" typeButton="danger" icon="delete" />
                        <x-button type="button" typeButton="success" icon="import" />
                    </div>
                </div>
                <div class="border border-gray-700 rounded-lg flex items-center justify-center flex-col">
                    <h4 class="text-sm text-gray-700 dark:text-gray-300 p-4 border-b border-gray-700 w-full text-center">
                        Políticas de privacidad
                    </h4>
                    <div class="p-2">
                        <img src="{{ asset('images/photo.jpg') }}" alt="Imagen" class="w-full object-cover h-full">
                    </div>
                    <div class="flex gap-2 items-center justify-end w-full p-2 border-t border-gray-700">
                        <x-button type="a" text="Agregar PDF" typeButton="primary" icon="pdf" />
                        <x-button type="a" typeButton="secondary" icon="view" />
                        <x-button type="a" typeButton="danger" icon="delete" />
                        <x-button type="button" typeButton="success" icon="import" />
                    </div>
                </div>
                <div class="border border-gray-700 rounded-lg flex items-center justify-center flex-col">
                    <h4 class="text-sm text-gray-700 dark:text-gray-300 p-4 border-b border-gray-700 w-full text-center">
                        Políticas de privacidad
                    </h4>
                    <div class="p-2">
                        <img src="{{ asset('images/photo.jpg') }}" alt="Imagen" class="w-full object-cover h-full">
                    </div>
                    <div class="flex gap-2 items-center justify-end w-full p-2 border-t border-gray-700">
                        <x-button type="a" text="Agregar PDF" typeButton="primary" icon="pdf" />
                        <x-button type="a" typeButton="secondary" icon="view" />
                        <x-button type="a" typeButton="danger" icon="delete" />
                        <x-button type="button" typeButton="success" icon="import" />
                    </div>
                </div>
                <div class="border border-gray-700 rounded-lg flex items-center justify-center flex-col">
                    <h4 class="text-sm text-gray-700 dark:text-gray-300 p-4 border-b border-gray-700 w-full text-center">
                        Políticas de privacidad
                    </h4>
                    <div class="p-2">
                        <img src="{{ asset('images/photo.jpg') }}" alt="Imagen" class="w-full object-cover h-full">
                    </div>
                    <div class="flex gap-2 items-center justify-end w-full p-2 border-t border-gray-700">
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
