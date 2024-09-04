@extends('layouts.admin-template')

@section('title', 'Agregar oferta relámpago')

@section('content')
    <div>
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Nuevo anuncio',
            'text' => 'Regresar a la lista de anuncios',
            'url' => route('admin.popups.index'),
        ])
        <div class="ms-4 mt-4 flex flex-col gap-1">
            <h2 class="text-lg uppercase text-zinc-700 dark:text-zinc-300">Información del anuncio</h2>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">
                Los campos marcados con <span class="text-red-500">*</span> son obligatorios
            </p>
        </div>
        <form action="{{ route('admin.popups.store') }}" method="POST" id="formPopup">
            @csrf
            <div class="bg-white p-4 text-sm dark:bg-black">
                <div class="mt-2">
                    <div class="flex flex-1 gap-4">
                        <div class="flex-1">
                            <x-input label="Nombre" type="text" name="name" id="name"
                                placeholder="Ingresa el nombre del anuncio" required />
                        </div>
                        <div class="hidden">
                            <x-input label="" type="hidden" name="content" id="content" />
                        </div>
                        <div class="flex-1">
                            <x-select label="Tipo" :options="[
                                'redirect' => 'Redireccionar',
                                'store' => 'Almacenar datos',
                            ]" id="type" name="type" selected="store"
                                value="store" />
                        </div>
                    </div>
                    <div id="redirect-link" class="mt-4 hidden">
                        <x-select label="Redireccionar a" :options="$routes" id="link" name="link" />
                    </div>
                </div>
                <div class="mt-4 flex flex-col gap-4 lg:flex-row">
                    <div class="flex-[1.5]">
                        <h5 class="mb-2 font-bold text-zinc-700 dark:text-white">Previsualización</h5>
                        <!-- Preview Popup -->
                        <div
                            class="popupContainer relative flex h-max w-full items-center justify-center overflow-auto rounded-lg border-2 border-dashed border-zinc-600 bg-zinc-300 py-32 dark:border-zinc-800 dark:bg-black">
                            <div class="relative min-w-[450px] rounded-md bg-white" id="popup">
                                <button type="button"
                                    class="closePopup absolute right-0 top-0 m-2 rounded-full p-1.5 hover:bg-zinc-200">
                                    <x-icon icon="x" class="h-5 w-5 text-black" />
                                </button>
                                <div class="headerPopup rounded p-4">
                                    <h2 class="headingPopup text-wrap mx-auto flex items-center justify-center px-4 text-center text-3xl font-bold uppercase text-black"
                                        id="textHeader">
                                        Encabezado
                                    </h2>
                                </div>
                                <div class="bodyPopup">
                                    <form action="">
                                        <div class="flex gap-2">
                                            <div class="flex flex-1 flex-col items-center justify-center">
                                                <div class="imagePoup w-full">
                                                    <img src="{{ asset('images/photo.jpg') }}" alt=""
                                                        class="h-60 w-full object-cover" id="imagePoup">
                                                </div>
                                                <p id="descriptionPoupText" class="mt-4 w-3/4 text-center">
                                                    Este es la descripción del anuncio
                                                </p>
                                                <div
                                                    class="inputPopup mt-4 flex w-4/5 flex-col items-center justify-center">
                                                    <x-input-store type="text" name="inputPopup" id="inputPopup"
                                                        placeholder="Ingresa el nombre del campo" class="mb-4 hidden" />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="footerPopup flex items-center justify-end gap-2 p-4">
                                    <x-button id="buttonPopupSecondary" type="button" typeButton="store-secondary"
                                        text="Botón 2" />
                                    <x-button id="buttonPopupPrimary" type="button" typeButton="store-gradient"
                                        text="Botón 1" />
                                </div>
                            </div>
                        </div>
                        <!-- End Preview Popup -->
                    </div>
                    <div class="flex-1">
                        <div class="flex flex-col gap-2">
                            <div>
                                <x-input label="Ancho del anuncio" type="number" name="width" id="width"
                                    icon="width" placeholder="Ingresa el ancho del anuncio" class="mb-2"
                                    min="500" />
                            </div>
                        </div>
                        <!-- Encabezado -->
                        <div class="mt-4">
                            <h3 class="font-bold text-zinc-900 dark:text-zinc-200">Encabezado</h3>
                            <x-input label="" type="text" name="header" id="header"
                                placeholder="Ingresa el texto del encabezado del anuncio" icon="heading" />
                            <div class="mt-4 flex gap-2">
                                <div class="flex-[4]">
                                    <x-select label="" :options="[
                                        'primary' => 'League Spartan',
                                        'secondary' => 'Poppins',
                                        'tertiary' => 'Mystical',
                                    ]" id="ff" name="ff"
                                        selected="secondary" value="bold" />
                                </div>
                                <div class="flex-[3]">
                                    <x-select label="" :options="[
                                        'bold' => 'Bold',
                                        'semibold' => 'Semibold',
                                        'medium' => 'Medium',
                                        'normal' => 'Normal',
                                    ]" id="fw" name="fw"
                                        selected="bold" value="bold" />
                                </div>
                                <div class="flex-[2]">
                                    <x-select label="" :options="[
                                        'xl' => 'XL',
                                        '2xl' => '2XL',
                                        '3xl' => '3XL',
                                        '4xl' => '4XL',
                                        '5xl' => '5XL',
                                        '6xl' => '6XL',
                                    ]" id="fs" name="fs"
                                        selected="xl" value="xl" />
                                </div>
                                <div class="flex-1">
                                    <input type="color" name="color" id="color"
                                        class="h-10 w-full bg-transparent">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <!-- Cuerpo -->
                            <h3 class="font-bold text-zinc-900 dark:text-zinc-200">Cuerpo</h3>
                            <x-input label="" type="text" name="descriptionPopup" id="descriptionPopup"
                                placeholder="Ingresa el texto del cuerpo" />
                            <div class="mt-4 flex gap-2">
                                <div class="flex-[4]">
                                    <x-select label="" :options="[
                                        'primary' => 'League Spartan',
                                        'secondary' => 'Poppins',
                                        'tertiary' => 'Mystical',
                                    ]" id="ffText" name="ffText"
                                        selected="secondary" value="bold" />
                                </div>
                                <div class="flex-[3]">
                                    <x-select label="" :options="[
                                        'bold' => 'Bold',
                                        'semibold' => 'Semibold',
                                        'medium' => 'Medium',
                                        'normal' => 'Normal',
                                    ]" id="fwText" name="fwText"
                                        selected="bold" value="bold" />
                                </div>
                                <div class="flex-[2]">
                                    <x-select label="" :options="[
                                        'xs' => 'XS',
                                        'sm' => 'SM',
                                        'base' => 'BASE',
                                        'lg' => 'LG',
                                        'xl' => 'XL',
                                    ]" id="fsText" name="fsText"
                                        selected="xl" value="xl" />
                                </div>
                                <div class="flex-1">
                                    <input type="color" name="colorText" id="colorText"
                                        class="h-10 w-full bg-transparent">
                                </div>
                            </div>
                            <div class="mt-4 flex items-center gap-4">
                                <label for="addImagePopup"
                                    class="flex cursor-pointer items-center gap-2 rounded-lg border border-zinc-400 px-3.5 py-2.5 text-sm font-medium text-zinc-600 transition-colors hover:bg-zinc-100 dark:border-zinc-800 dark:text-white dark:hover:bg-zinc-900">
                                    <x-icon icon="image-add" class="h-4 w-4 text-current" />
                                    Agregar imagen
                                </label>
                                <input type="file" name="" id="addImagePopup" class="hidden">
                                <x-button type="button" id="removeImagePoup" typeButton="danger" icon="image-remove" />
                            </div>
                            <div class="mt-4 flex items-center gap-4">
                                <x-button type="button" id="addInputPopup" typeButton="secondary" text="Agregar campo"
                                    icon="plus" />
                                <x-button type="button" icon="delete" id="removeInputPoup" typeButton="danger" />
                            </div>
                            <div id="optionsInput" class="mt-4 hidden">
                                <x-input label="" type="text" name="placeholder_input" id="placeholderInput"
                                    placeholder="Placeholder del campo" />
                            </div>
                            <!-- Footer -->
                            <div>
                                <h3 class="mt-4 font-bold text-zinc-900 dark:text-zinc-200">Footer</h3>
                                <div class="mt-2">
                                    <div>
                                        <x-input label="Texto botón principal" type="text" name="textButton"
                                            id="textButtonPrimary" placeholder="Ingresa el texto del botón principal" />
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <x-input label="Texto botón secundario" type="text" name="placeholder_input"
                                        id="textButtonSecondary" placeholder="Ingresa el texto del botón secundario" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="mx-4 mb-4 flex justify-center gap-4">
                    <x-button type="submit" text="Guardar" icon="save" typeButton="primary" id="addPopup" />
                    <x-button type="a" href="{{ route('admin.popups.index') }}" text="Regresar"
                        icon="arrow-left-02" typeButton="secondary" />
                </div>
            </div>
        </form>
    </div>
@endsection
