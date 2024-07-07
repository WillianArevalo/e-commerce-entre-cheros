@extends('layouts.admin-template')

@section('title', 'Nuevo producto')

@section('content')
    <div class="mt-4">
        <div class="dark:bg-gray-800 py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-gray-700">
            <a href="{{ route('admin.products.index') }}"
                class="text-gray-500 dark:text-gray-400 flex items-center justify-center gap-1 text-sm hover:underline hover:text-gray-600">
                <x-icon icon="arrow-left-02" class="w-4 h-4 text-current" />
                Regresar a productos
            </a>
            <h1 class="text-3xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Nuevo producto
            </h1>
        </div>
        <div class="bg-white dark:bg-gray-900 p-4">
            <div class="mx-auto w-full">
                <form action="{{ route('admin.products.store') }}" class="flex flex-col gap-4" enctype="multipart/form-data"
                    method="POST" id="formAddProduct">
                    @csrf
                    <div>
                        <div class="flex flex-col gap-1">
                            <h2 class="text-gray-700 dark:text-gray-300 text-lg uppercase">Información del producto</h2>
                            <p class="text-gray-500 dark:text-gray-400 text-sm">
                                Los campos marcados con <span class="text-red-500">*</span> son obligatorios
                            </p>
                        </div>
                        <div class="flex gap-4 mt-4 flex-col lg:flex-row">
                            <div class="flex-1 flex flex-col gap-4">
                                <div
                                    class="p-4 dark:bg-gray-800 bg-transparent border border-gray-200 dark:border-transparent rounded-lg h-max">
                                    <h4 class="text-base mb-2 dark:text-blue-400 text-blue-700 font-semibold">General</h4>
                                    <div class="flex gap-4 flex-col">
                                        <div>
                                            <x-input label="Nombre" type="text" id="name" name="name"
                                                placeholder="Escribe el nombre del producto aquí" required="required"
                                                value="{{ old('name') }}" />
                                        </div>
                                        <div>
                                            <x-input label="Descripción corta" type="text" id="short_description"
                                                name="short_description" value="{{ old('short_description') }}"
                                                required="required"
                                                placeholder="Escribe la descripción corta del producto aquí" />
                                        </div>
                                        <div>
                                            <x-input label="Descripción larga" type="textarea" name="long_description"
                                                id="long_description"
                                                placeholder="Escribe la descripción larga del producto aquí"
                                                value="{{ old('long_description') }}" />
                                        </div>
                                        <div class="flex gap-4 flex-col">
                                            <div class="flex-1">
                                                <x-input label="Peso(KG)" required="required" name="weight" id="weight"
                                                    type="number" step="0.1" min="1" placeholder="0.00"
                                                    value="{{ old('weight') }}" icon="weight-scale" />
                                            </div>
                                            <div class="flex-[4]">
                                                <p
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white after:content-['*'] after:ml-0.5 after:text-red-500">
                                                    Dimensiones (cm)
                                                </p>
                                                <div class="flex gap-2 items-center">
                                                    <div>
                                                        <x-input type="number" label="Largo" id="long" name="long"
                                                            value="{{ old('long') }}" placeholder="10" min="1"
                                                            required="required" error="{{ false }}" />
                                                    </div>
                                                    <span
                                                        class="p-2 dark:bg-gray-700 bg-gray-100 dark:text-white text-gray-900 rounded-lg border-2 mt-7 dark:border-gray-600 border-gray-300">
                                                        <x-icon icon="cancel" class="w-4 h-4 text-current" />
                                                    </span>
                                                    <div>
                                                        <x-input type="number" label="Ancho" id="width" name="width"
                                                            value="{{ old('width') }}" placeholder="20" min="1"
                                                            required="required" error="{{ false }}" />
                                                    </div>
                                                    <span
                                                        class="p-2 dark:bg-gray-700 bg-gray-100 dark:text-white text-gray-900 rounded-lg border-2 mt-7 dark:border-gray-600 border-gray-300">
                                                        <x-icon icon="cancel" class="w-4 h-4 text-current" />
                                                    </span>
                                                    <div>
                                                        <x-input type="number" label="Alto" id="height" name="height"
                                                            value="{{ old('height') }}" placeholder="10" min="1"
                                                            required="required" error="false"
                                                            error="{{ false }}" />
                                                    </div>
                                                </div>
                                                @if ($errors->has('long') || $errors->has('width') || $errors->has('height'))
                                                    <span class="text-red-500 text-sm">
                                                        Las dimensions son obligatorias
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="p-4 dark:bg-gray-800 bg-transparent border border-gray-200 dark:border-transparent rounded-lg h-max">
                                    <h4 class="text-base mb-2 dark:text-blue-400 text-blue-700 font-semibold">
                                        Categoría y marca
                                    </h4>
                                    <div class="flex gap-4 flex-col">
                                        <div class="flex gap-4">
                                            <div class="flex-1">
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white after:content-['*'] after:ml-0.5 after:text-red-500">
                                                    Categoría del producto
                                                </label>
                                                <input type="hidden" name="categorie_id" id="categorie_id"
                                                    value="{{ old('categorie_id') }}">
                                                <div class="relative">
                                                    <div
                                                        class="selected border-2 border-gray-300 bg-gray-50 dark:border-gray-600 rounded-lg py-2.5 dark:bg-gray-700 w-full px-4 dark:text-white text-sm flex items-center justify-between @error('categorie_id') is-invalid @enderror">
                                                        <span class="itemSelected">
                                                            @if ($categories->count() > 0)
                                                                @php
                                                                    $selectedCategorie = $categories->firstWhere(
                                                                        'id',
                                                                        old('categorie_id'),
                                                                    );
                                                                @endphp
                                                                @if ($selectedCategorie)
                                                                    {{ $selectedCategorie->name }}
                                                                @else
                                                                    Selecciona una categoría
                                                                @endif
                                                            @endif
                                                        </span>
                                                        <x-icon icon="arrow-down"
                                                            class="w-5 h-5 dark:text-white text-gray-500" />
                                                    </div>
                                                    <ul
                                                        class="absolute z-10 w-full mt-2 py-1 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 selectOptions hidden">
                                                        @if ($categories->count() > 0)
                                                            @foreach ($categories as $categorie)
                                                                <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
                                                                    data-value="{{ $categorie->id }}"
                                                                    data-input="#categorie_id">
                                                                    {{ $categorie->name }}
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                                @error('categorie_id')
                                                    <span
                                                        class="text-red-500 text-subcategorie_idsm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="flex-1">
                                                <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white after:content-['*'] after:ml-0.5 after:text-red-500">
                                                    Subcategoría del producto
                                                </label>
                                                <input type="hidden" name="subcategorie_id" id="subcategorie_id"
                                                    value="{{ old('categorie_id') }}">
                                                <div class="relative">
                                                    <div
                                                        class="selected border-2 border-gray-300 bg-gray-50 dark:border-gray-600 rounded-lg py-2.5 dark:bg-gray-700 w-full px-4 dark:text-white text-sm flex items-center justify-between @error('subcategorie_id') is-invalid @enderror">
                                                        <span class="itemSelected" id="selectedSubCategorie">
                                                            Selecciona una subcategoría
                                                        </span>
                                                        <x-icon icon="arrow-down"
                                                            class="w-5 h-5 dark:text-white text-gray-500" />
                                                    </div>
                                                    <ul class="absolute z-10 w-full mt-2 py-1 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 selectOptionsSubCategories hidden"
                                                        id="listSubcategories">
                                                        <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
                                                            data-value="" data-input="#subcategorie_id">
                                                            Ninguna categoría principal seleccionada
                                                        </li>
                                                    </ul>
                                                </div>
                                                @error('subcategorie_id')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white after:content-['*'] after:ml-0.5 after:text-red-500">
                                                Marca del producto
                                            </label>
                                            <input type="hidden" name="brand_id" id="brand_id"
                                                value="{{ old('brand_id') }}">
                                            <div class="relative">
                                                <div
                                                    class="selected border-2 border-gray-300 bg-gray-50 dark:border-gray-600 rounded-lg py-2.5 dark:bg-gray-700 w-full px-4 dark:text-white text-sm flex items-center justify-between @error('brand_id') is-invalid @enderror">
                                                    <span class="itemSelected">
                                                        @if ($brands->count() > 0)
                                                            @php
                                                                $selectedBrand = $brands->firstWhere(
                                                                    'id',
                                                                    old('brand_id'),
                                                                );
                                                            @endphp
                                                            @if ($selectedBrand)
                                                                {{ $selectedBrand->name }}
                                                            @else
                                                                Selecciona una marca
                                                            @endif
                                                        @endif
                                                    </span>
                                                    <x-icon icon="arrow-down"
                                                        class="w-5 h-5 dark:text-white text-gray-500" />
                                                </div>
                                                <ul
                                                    class="absolute z-10 w-full mt-2 py-1 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 selectOptions hidden">
                                                    @if ($brands->count() > 0)
                                                        @foreach ($brands as $brand)
                                                            <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
                                                                data-value="{{ $brand->id }}" data-input="#brand_id">
                                                                {{ $brand->name }}
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                            @error('brand_id')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="p-4 dark:bg-gray-800 bg-transparent border border-gray-200 dark:border-transparent rounded-lg h-max">
                                    <h4 class="text-base mb-2 dark:text-blue-400 text-blue-700 font-semibold">
                                        Información de venta
                                    </h4>
                                    <div class="flex flex-col">
                                        <div class="flex gap-4">
                                            <div class="flex-1">
                                                <x-input label="Precio" icon="dollar" type="number" id="price"
                                                    name="price" step="0.1" min="0.1" placeholder="0.00"
                                                    value="{{ old('price') }}" />
                                            </div>
                                            <div class="flex-1">
                                                <x-input label="Precio de oferta" icon="dollar" type="number"
                                                    id="offer_price" name="offer_price" step="0.1" min="0.1"
                                                    placeholder="0.00" value="{{ old('offer_price') }}" />
                                            </div>
                                        </div>
                                        <div class="hidden mt-4" id="dateOffer">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Fecha de la oferta
                                            </label>
                                            <div class="flex items-center">
                                                <div class="relative flex-1">
                                                    <div
                                                        class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                        <x-icon icon="calendar"
                                                            class="w-4 h-4 text-gray-500 dark:text-gray-400" />
                                                    </div>
                                                    <input name="offer_start_date" type="date"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        value="{{ old('offer_start_date') }}"
                                                        placeholder="Seleccionar fecha de inicio">
                                                </div>
                                                <span class="mx-4 text-gray-500">a</span>
                                                <div class="relative flex-1">
                                                    <div
                                                        class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                        <x-icon icon="calendar"
                                                            class="w-4 h-4 text-gray-500 dark:text-gray-400" />
                                                    </div>
                                                    <input name="offer_end_date" type="date"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        value="{{ old('offer_end_date') }}"
                                                        placeholder="Seleccionar fecha de fin">
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-1">
                                                @error('offer_start_date')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                                @error('offer_end_date')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="flex justify-between items-center">
                                                <p class="block text-base dark:text-blue-400 text-blue-700 font-semibold">
                                                    Impuestos
                                                </p>
                                                <x-button type="button" id="showModalTax" data-modal-target="addTax"
                                                    data-modal-toggle="addTax" text="Nuevo impuesto" icon="add-circle"
                                                    typeButton="success" />
                                            </div>
                                            <div class="flex flex-col mt-4">
                                                <p for="price" class="block text-sm font-medium text-white">
                                                    Lista de impuestos asignados al producto
                                                </p>
                                                <div class="flex flex-col" id="checkBoxTaxes">
                                                    @if ($taxes->count() > 0)
                                                        @foreach ($taxes as $tax)
                                                            <div>
                                                                <input id="{{ $tax->name }}" type="checkbox"
                                                                    value="{{ $tax->id }}" name="tax_id[]"
                                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                <label for="{{ $tax->name }}"
                                                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                                    {{ $tax->name }}
                                                                    <span
                                                                        class="text-xs text-blue-700 dark:text-blue-400">({{ $tax->rate }}%)</span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-1 flex flex-col gap-4">
                                <div
                                    class="p-4 dark:bg-gray-800 bg-transparent border border-gray-200 dark:border-transparent rounded-lg h-max">
                                    <h4 class="text-base mb-2 dark:text-blue-400 text-blue-700 font-semibold">Imágenes</h4>
                                    <div>
                                        <p
                                            class="dark:text-gray-400 text-black text-sm mb-2 after:content-['*'] after:ml-0.5 after:text-red-500">
                                            Imagen principal
                                        </p>
                                        <label for="main_image"
                                            class="flex flex-col items-center justify-center w-full h-80 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-transparent hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-800 @error('main_image') is-invalid  @enderror">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <x-icon icon="cloud-upload"
                                                    class="w-12 h-12 text-gray-400 dark:text-gray-500" />
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                    <span class="font-semibold">
                                                        Clic para agregar
                                                    </span>
                                                    o desliza la imagen
                                                </p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                    PNG, JPG, WEBP
                                                </p>
                                            </div>
                                            <input id="main_image" type="file" class="hidden" name="main_image" />
                                            <img src="" alt="Preview Image" id="previewImage"
                                                class="w-56 h-64 object-cover hidden m-10">
                                        </label>
                                    </div>
                                    <div class="mt-4">
                                        <div class="flex justify-between items-center mb-2">
                                            <div>
                                                <p class="dark:text-gray-400  text-black text-sm">Galería de imágenes</p>
                                                <p class="dark:text-gray-400  text-black text-xs w-64">
                                                    Nota: Selecciona todas las imáges de una sola vez.
                                                </p>
                                            </div>
                                            <div class="text-sm text-gray-400 flex gap-2">
                                                <label for="gallery_image"
                                                    class="flex items-center justify-center gap-1 px-4 py-2 bg-blue-600 text-white rounded-lg cursor-pointer hover:bg-blue-800 transition-colors">
                                                    <x-icon icon="image-add" class="w-4 h-4 text-current" />
                                                    Seleccionar imágenes
                                                </label>
                                                <input type="file" name="gallery_image[]" id="gallery_image" multiple
                                                    class="hidden">
                                                <button type="button" id="reloadImages"
                                                    class="dark:bg-gray-700 dark:text-white p-2 rounded-lg dark:hover:bg-gray-600 bg-gray-200 hover:bg-gray-300 text-gray-700">
                                                    <x-icon icon="reload" class="w-5 h-5 text-current" />
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex gap-2 h-24 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg mt-4 flex-wrap justify-start"
                                            id="previewImagesContainer">
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="p-4 dark:bg-gray-800 bg-transparent border border-gray-200 dark:border-transparent rounded-lg h-max">
                                    <h4 class="text-base mb-2 dark:text-blue-400 text-blue-700 font-semibold">Inventario
                                    </h4>
                                    <div class="flex gap-4">
                                        <div class="flex-1">
                                            <x-input label="SKU" type="text" id="sku" name="sku"
                                                value="{{ old('sku') }}" placeholder="XXXXXX" required="required" />
                                        </div>
                                        <div class="flex-1">
                                            <x-input label="Cantidad" type="number" id="stock" name="stock"
                                                value="{{ old('stock') }}" placeholder="#" required="required" />
                                        </div>
                                        <div class="flex-[2]">
                                            <x-input label="Código de barras" type="text" id="barcode"
                                                name="barcode" value="{{ old('barcode') }}"
                                                placeholder="Código de barras del producto" required="required" />
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="p-4 dark:bg-gray-800 bg-transparent border border-gray-200 dark:border-transparent rounded-lg h-max">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-base mb-2 dark:text-blue-400 text-blue-700 font-semibold">
                                            Etiquetas
                                        </h4>
                                        <x-button type="button" id="showModalLabel" data-modal-target="addLabel"
                                            data-modal-toggle="addLabel" text="Nueva etiqueta" icon="add-circle"
                                            typeButton="success" />
                                    </div>
                                    <div class="flex gap-4">
                                        <div class="w-full">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Seleccionar etiquetas para el producto
                                            </label>
                                            <input type="hidden" name="label_id[]" id="label_id">
                                            <div class="relative">
                                                <div
                                                    class="selected border-2 border-gray-300 bg-gray-50 dark:border-gray-600 rounded-lg py-2.5 dark:bg-gray-700 w-full px-4 dark:text-white text-sm flex items-center justify-between">
                                                    <span class="itemSelected">Seleccionar etiqueta</span>
                                                    <x-icon icon="arrow-down"
                                                        class="w-5 h-5 dark:text-white text-gray-500" />
                                                </div>
                                                <ul class="absolute z-10 w-full mt-2 py-1 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 selectOptionsLabels hidden"
                                                    id="labelsList">
                                                    @if ($labels->count() > 0)
                                                        @foreach ($labels as $label)
                                                            <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
                                                                data-value="{{ $label->name }}" data-input="#label_id">
                                                                {{ $label->name }}
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li
                                                            class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                            Sin etiquetas registradas
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <x-button type="button" typeButton="primary" icon="arrow-right-02"
                                            id="addLabelSelected" class="mt-7" />
                                    </div>
                                    <input type="hidden" name="labels_ids[]" id="labels_ids">
                                    <div id="hiddenLabelsContainer"></div>
                                    <div class="mt-4 w-full h-20 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50  dark:bg-transparent dark:border-gray-600 flex flex-wrap items-start p-2 gap-1"
                                        id="previewLabelsContainer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-center">
                        <x-button type="submit" text="Agregar producto" icon="add-circle" typeButton="primary"
                            id="addButtonProduct" />
                    </div>
                </form>
                <form action="{{ route('admin.subcategories.search') }}" id="formSearchSubcategorie" method="POST">
                    @csrf
                    <input type="hidden" name="categorie_id" id="categorieIdSearch">
                </form>
            </div>
        </div>

        <!-- Modal agregar impuesto -->
        <div id="addTax" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full bg-black bg-opacity-40">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Agregar impuesto
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="addTax">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('admin.taxes.store') }}" id="formAddTax" method="POST">
                        @csrf
                        <div class="flex flex-col gap-4">
                            <div>
                                <x-input label="Nombre" type="text" name="name" id="name_tax"
                                    placeholder="Escribe el nombre del impuesto" error="{{ false }}"
                                    data-message="#message-nameTax" required="required" />
                                <span class="text-red-500 text-sm hidden invalid-feedback" id="message-nameTax"></span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <x-input label="Tasa de impuesto" type="number" name="rate" id="rate"
                                    placeholder="0" error="{{ false }}" step="0.1" min="0.1"
                                    icon="percent" data-message="#message-rate" required="required" />
                                <span class="text-red-500 text-sm hidden invalid-feedback" id="message-rate"></span>
                            </div>
                        </div>
                        <div class="flex justify-end gap-2 mt-4">
                            <x-button type="button" id="addTaxButton" text="Agregar" icon="add-circle"
                                typeButton="primary" />
                            <x-button type="button" data-modal-toggle="addTax" text="Cancelar" typeButton="danger" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal agregar etiqueta -->
        <div id="addLabel" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full bg-black bg-opacity-40">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Agregar etiqueta
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="addLabel">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('admin.labels.store') }}" id="formAddLabel" method="POST">
                        @csrf
                        <div class="flex flex-col gap-4">
                            <div>
                                <x-input label="Nombre" id="name_label" name="name" data-message="#message-nameLabel"
                                    placeholder="Escribe el nombre del impuesto" required="required" type="text" />
                                <span class="text-red-500 text-sm hidden invalid-feedback" id="message-nameLabel"></span>
                            </div>
                        </div>
                        <div class="flex justify-end gap-2 mt-4">
                            <x-button type="button" id="addLabelButton" text="Agregar" icon="add-circle"
                                typeButton="primary" />
                            <x-button type="button" data-modal-toggle="addLabel" text="Cancelar" typeButton="danger" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
