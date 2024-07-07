@extends('layouts.admin-template')

@section('title', 'Agregar oferta relámpago')

@section('content')
    <div class="mt-4">
        <div class="dark:bg-gray-800 py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-gray-700">
            <a href="{{ route('admin.popups.index') }}"
                class="text-gray-500 dark:text-gray-400 flex items-center justify-center gap-1 text-sm hover:underline hover:text-gray-600">
                <x-icon icon="arrow-left-02" class="w-4 h-4 text-current" />
                Regresar a anuncios
            </a>
            <h1 class="text-3xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Nuevo anuncio
            </h1>
        </div>
        <div class="p-4 dark:bg-gray-800 bg-gray-100 m-4 rounded-lg text-sm">
            <h2 class="text-gray-700 dark:text-gray-300 text-lg uppercase">Información de la oferta</h2>
            <form action="{{ route('admin.popups.store') }}" method="POST" id="formPopup">
                @csrf
                <div class="flex gap-2 mt-2">
                    <div class="flex-1">
                        <x-input label="Nombre" type="text" name="name" id="name"
                            placeholder="Ingresa el nombre del anuncio" />
                        <x-input label="" type="hidden" name="content" id="content" />
                    </div>
                </div>
            </form>
            <div class="mt-4 flex gap-4  flex-col lg:flex-row">
                <div class="flex-[2]">
                    <h5 class="mb-2 dark:text-white text-gray-700">Previsualización</h5>
                    <div class="bg-black p-8 flex items-center justify-center bg-opacity-50 popupContainer">
                        <div class="bg-white rounded-md relative" style="width: 450px">
                            <button type="button" class="absolute right-0 top-0 m-2 hover:bg-gray-200 p-1.5 rounded-full">
                                <x-icon icon="cancel" class="w-5 h-5 text-black" />
                            </button>
                            <div class="header rounded p-4">
                                <h2 class="text-black justify-center flex items-center text-center uppercase px-4 text-3xl font-bold"
                                    id="textHeader">
                                    Encabezado
                                </h2>
                            </div>
                            <div class="bodyPopup">
                                <form action="">
                                    <div class="flex gap-2">
                                        <div class="flex-1 items-center justify-center flex flex-col">
                                            <div class="w-full imagePoup">
                                                <img src="{{ asset('images/photo.jpg') }}" alt=""
                                                    class="h-60 w-full object-cover" id="imagePoup">
                                            </div>
                                            <p id="descriptionPoupText" class="w-1/2 text-center mt-4">
                                                Este es la descripción del anuncio
                                            </p>
                                            <div class="mt-4 w-full flex items-center justify-center inputPopup">
                                                <input type="text" name="" id="inputPopup"
                                                    class="text-sm rounded-md w-4/5 border-2 border-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-200 hidden"
                                                    placeholder="Input de ejemplo">

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="footer mt-4 flex items-center justify-end gap-2 p-4">
                                <button id="buttonPopupSecondary" type="button"
                                    class="border px-4 py-2 bg-gray-100 hover:bg-gray-200">
                                    Botón 2
                                </button>
                                <button type="button" id="buttonPopupPrimary"
                                    class="px-5 py-2 bg-blue-600 text-white hover:bg-blue-800">
                                    Botón 1
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-1">
                    <div>
                        <h3 class="text-gray-200">Encabezado</h3>
                        <x-input label="" type="text" name="header" id="header"
                            placeholder="Ingresa el texto del encabezado del anuncio" />
                    </div>
                    <div class="mt-4">
                        <h3 class="text-gray-200">Cuerpo</h3>
                        <x-input label="" type="text" name="descriptionPopup" id="descriptionPopup"
                            placeholder="Ingresa el texto del cuerpo" />
                        <div class="flex gap-4 items-center">
                            <label for="addImagePopup"
                                class="text-sm mt-4 flex items-center justify-center gap-2 bg-blue-700 text-white px-4 py-3 rounded-md w-max cursor-pointer flex-1">
                                <x-icon icon="image-add" class="w-4 h-4 text-current" />
                                Agregar imagen
                            </label>
                            <input type="file" name="" id="addImagePopup" class="hidden">
                            <button type="button"
                                class="text-sm mt-4 flex items-center justify-center gap-2 bg-red-700 text-white px-4 py-3 rounded-md w-max cursor-pointer flex-1"
                                id="removeImagePoup">
                                Eliminar imagen
                            </button>
                        </div>
                        <div class="flex gap-4 items-center">
                            <button type="button" id="addInputPopup"
                                class="text-sm mt-4 flex items-center justify-center gap-2 bg-blue-700 text-white px-4 py-3 rounded-md w-max cursor-pointer flex-1">
                                Agregar campo
                            </button>
                            <button type="button"
                                class="text-sm mt-4 flex items-center justify-center gap-2 bg-red-700 text-white px-4 py-3 rounded-md w-max cursor-pointer flex-1"
                                id="removeInputPoup">
                                Eliminar campo
                            </button>
                        </div>
                        <div id="optionsInput" class="hidden mt-4">
                            <x-input label="" type="text" name="name_input" id="nameInput"
                                placeholder="Nombre del campo" />
                            <x-input label="" type="text" name="placeholder_input" id="placeholderInput"
                                placeholder="Placeholder del campo" />
                        </div>
                        <div>
                            <h3 class="text-gray-200 mt-4">Footer</h3>
                            <div class="mt-2">
                                <x-input label="Texto botón principal" type="text" name="textButton"
                                    id="textButtonPrimary" placeholder="Ingresa el texto del botón principal" />
                            </div>
                            <div class="mt-2">
                                <x-input label="Texto botón secundario" type="text" name="placeholder_input"
                                    id="textButtonSecondary" placeholder="Ingresa el texto del botón secundario" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <x-button type="button" text="Agregar anuncio" typeButton="primary" icon="add-circle"
                    id="addPopup" />
            </div>

        </div>
    </div>

    <div class="" id="previewPopup"></div>

@endsection
