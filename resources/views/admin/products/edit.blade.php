@extends('layouts.admin-template')
@section('title', 'Editar producto')
@section('content')
    <div>
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Editar producto',
            'text' => 'Regresar a la lista de productos',
            'url' => route('admin.products.index'),
        ])
        <div class="bg-white p-4 dark:bg-black">
            <div class="mx-auto w-full">
                <form action="{{ route('admin.products.update', $product->id) }}"" class="flex flex-col gap-4"
                    enctype="multipart/form-data" method="POST" id="formEditProduct">
                    @csrf
                    @method('PUT')
                    <div>
                        <div class="flex flex-col gap-1">
                            <h2 class="text-sm font-bold uppercase text-zinc-600 dark:text-zinc-300 sm:text-base md:text-lg">
                                Editar información del producto
                            </h2>
                            <x-paragraph>
                                Los campos marcados con <span class="text-red-500">*</span> son obligatorios
                            </x-paragraph>
                        </div>
                        <div class="mt-4 flex flex-col gap-4 lg:flex-row">
                            <!-- Column 1 -->
                            <div class="flex flex-1 flex-col gap-4">

                                <!-- General info -->
                                <div>
                                    <h4
                                        class="mb-2 text-base font-semibold text-primary-800 dark:text-primary-500 md:text-lg">
                                        General
                                    </h4>
                                    <div
                                        class="h-max rounded-lg border border-zinc-400 bg-transparent p-4 dark:border-zinc-800 dark:bg-black">
                                        <div class="flex flex-col gap-4">
                                            <div>
                                                <x-input label="Nombre" type="text" id="name" name="name"
                                                    placeholder="Escribe el nombre del producto aquí" required="required"
                                                    value="{{ $product->name }}" />
                                            </div>
                                            <div>
                                                <x-input label="Descripción corta" type="textarea" id="short_description"
                                                    name="short_description" value="{{ $product->short_description }}"
                                                    required="required"
                                                    placeholder="Escribe la descripción corta del producto aquí" />
                                            </div>
                                            <div>
                                                <x-input label="Descripción larga" type="textarea" name="long_description"
                                                    id="long_description"
                                                    placeholder="Escribe la descripción larga del producto aquí"
                                                    value="{{ $product->long_description }}" />
                                            </div>
                                            <div class="flex flex-col gap-4">
                                                <div>
                                                    <x-input label="Peso(KG)" required="required" name="weight"
                                                        id="weight" type="number" step="0.1" min="1"
                                                        placeholder="0.00" value="{{ $product->weight }}"
                                                        icon="weight-scale" />
                                                </div>
                                                <div>
                                                    <p
                                                        class="mb-2 block text-sm font-medium text-zinc-900 after:ml-0.5 after:text-red-500 after:content-['*'] dark:text-white">
                                                        Dimensiones (cm)
                                                    </p>
                                                    <div class="flex items-center gap-2">
                                                        <div>
                                                            <x-input type="number" label="Largo" id="long"
                                                                name="long" value="{{ $product->length }}"
                                                                placeholder="10" min="1" required="required"
                                                                error="{{ false }}" />
                                                        </div>
                                                        <span
                                                            class="mt-7 rounded-lg border border-zinc-400 bg-zinc-100 p-2 text-zinc-900 dark:border-zinc-800 dark:bg-black dark:text-white">
                                                            <x-icon icon="x"
                                                                class="h-3 w-3 text-current sm:h-4 sm:w-4" />
                                                        </span>
                                                        <div>
                                                            <x-input type="number" label="Ancho" id="width"
                                                                name="width" value="{{ $product->width }}"
                                                                placeholder="20" min="1" required="required"
                                                                error="{{ false }}" />
                                                        </div>
                                                        <span
                                                            class="mt-7 rounded-lg border border-zinc-400 bg-zinc-100 p-2 text-zinc-900 dark:border-zinc-800 dark:bg-black dark:text-white">
                                                            <x-icon icon="x"
                                                                class="h-3 w-3 text-current sm:h-4 sm:w-4" />
                                                        </span>
                                                        <div>
                                                            <x-input type="number" label="Alto" id="height"
                                                                name="height" value="{{ $product->height }}"
                                                                placeholder="10" min="1" required="required"
                                                                error="false" error="{{ false }}" />
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('long') || $errors->has('width') || $errors->has('height'))
                                                        <span class="text-sm text-red-500">
                                                            Las dimensions son obligatorias
                                                        </span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <x-input type="checkbox" name="is_active" id="is_active"
                                                        label="Producto activo" value="{{ $product->is_active }}"
                                                        checked="{{ $product->is_active === 1 }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End general info -->


                                <!-- SEO info -->
                                <div>
                                    <h4
                                        class="mb-2 text-base font-semibold text-primary-800 dark:text-primary-500 md:text-lg">
                                        Categoría y Etiquetas
                                    </h4>
                                    <div
                                        class="h-max rounded-lg border border-zinc-400 bg-transparent p-4 dark:border-zinc-800 dark:bg-black">

                                        <div class="flex flex-col gap-4">
                                            <div class="flex flex-col gap-4 sm:flex-row">
                                                <div class="flex-1">
                                                    <x-select label="Categoría del producto" id="categorie_id"
                                                        name="categorie_id" :options="$categories->pluck('name', 'id')->toArray()"
                                                        value="{{ $product->categorie_id }}"
                                                        selected="{{ $product->categorie_id }}" />
                                                </div>
                                                <div class="flex-1">
                                                    <label
                                                        class="mb-2 block text-sm font-medium text-zinc-900 after:ml-0.5 after:text-red-500 after:content-['*'] dark:text-white">
                                                        Subcategoría del producto
                                                    </label>
                                                    <input type="hidden" name="subcategorie_id" id="subcategorie_id"
                                                        value="{{ old('categorie_id') }}">
                                                    <div class="relative">
                                                        <div
                                                            class="selected @error('subcategorie_id') is-invalid @enderror flex w-full items-center justify-between rounded-lg border border-zinc-400 bg-zinc-50 px-4 py-2.5 text-sm dark:border-zinc-800 dark:bg-zinc-950 dark:text-white">
                                                            <span class="itemSelected" id="selectedSubCategorie">
                                                                Selecciona una subcategoría
                                                            </span>
                                                            <x-icon icon="arrow-down"
                                                                class="h-5 w-5 text-zinc-500 dark:text-white" />
                                                        </div>
                                                        <ul class="selectOptionsSubCategories absolute z-10 mt-2 hidden w-full rounded-lg border border-zinc-400 bg-white p-2 shadow-lg dark:border-zinc-800 dark:bg-zinc-950"
                                                            id="listSubcategories">
                                                            <li class="itemOption rounded-lg px-4 py-2.5 text-sm text-zinc-900 hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-900"
                                                                data-value="" data-input="#subcategorie_id">
                                                                Ninguna categoría principal seleccionada
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    @error('subcategorie_id')
                                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div>
                                                <x-select label="Marca del producto" id="brand_id" name="brand_id"
                                                    :options="$brands->pluck('name', 'id')->toArray()" value="{{ $product->brand_id }}"
                                                    selected="{{ $product->brand_id }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End SEO info -->

                                <!-- Shipping info -->
                                <div>
                                    <h4
                                        class="mb-2 text-base font-semibold text-primary-800 dark:text-primary-500 md:text-lg">
                                        Información de Etiquetas
                                    </h4>
                                    <div
                                        class="h-max rounded-lg border border-zinc-400 bg-transparent dark:border-zinc-800 dark:bg-black">
                                        <div class="flex flex-col">
                                            <div class="p-4">
                                                <div class="flex gap-4">
                                                    <div class="flex-1">
                                                        <x-input label="Precio" icon="dollar" type="number"
                                                            id="price" name="price" step="0.1" min="0.1"
                                                            placeholder="0.00" value="{{ $product->price }}" />
                                                    </div>
                                                    <div class="flex-1">
                                                        <x-input label="Precio de oferta" icon="dollar" type="number"
                                                            id="offer_price" name="offer_price" step="0.1"
                                                            min="0.1" placeholder="0.00"
                                                            value="{{ $product->offer_price }}" />
                                                    </div>
                                                </div>
                                                <div class="mt-4 hidden" id="dateOffer">
                                                    <label
                                                        class="mb-2 block text-sm font-medium text-zinc-900 dark:text-white">
                                                        Fecha de la oferta
                                                    </label>
                                                    <div class="mt-2 flex flex-col items-center gap-2 sm:mt-0 sm:flex-row">
                                                        <div class="w-full flex-1">
                                                            <x-input type="date" name="offer_start_date"
                                                                icon="calendar" value="{{ $product->offer_start_date }}"
                                                                placeholder="Seleccionar fecha de inicio" />
                                                        </div>
                                                        <span class="mx-4 text-zinc-500">a</span>
                                                        <div class="w-full flex-1">
                                                            <x-input type="date" name="offer_end_date" icon="calendar"
                                                                value="{{ $product->offer_end_date }}"
                                                                placeholder="Seleccionar fecha de fin" />
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col gap-1">
                                                        @error('offer_start_date')
                                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                                        @enderror
                                                        @error('offer_end_date')
                                                            <span class="text-sm text-red-500">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mt-4">
                                                        <x-input type="checkbox" name="offer_active" id="offer_active"
                                                            label="Activar oferta" value="{{ $product->offer_active }}"
                                                            checked="{{ $product->offer_active === 1 }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-t border-zinc-400 dark:border-zinc-800">
                                                <div
                                                    class="flex items-center justify-between border-b border-zinc-400 p-4 dark:border-zinc-800">
                                                    <h4 class="text-base font-semibold text-black dark:text-white">
                                                        Impuestos
                                                    </h4>
                                                    <x-button type="button" id="showModalTax" data-modal-target="addTax"
                                                        data-modal-toggle="addTax" text="Nuevo impuesto" icon="plus"
                                                        typeButton="secondary" />
                                                </div>
                                                <div class="mt-4 flex flex-col px-4 pb-4">
                                                    <x-paragraph>
                                                        Lista de impuestos asignados al producto
                                                    </x-paragraph>
                                                    <div class="flex flex-col" id="checkBoxTaxes">
                                                        @if ($taxes->count() > 0)
                                                            @foreach ($taxes as $tax)
                                                                <div class="flex items-center gap-2">
                                                                    <div>
                                                                        <x-input type="checkbox" name="tax_id[]"
                                                                            value="{{ $tax->id }}"
                                                                            id="{{ $tax->name }}"
                                                                            label="{{ $tax->name }}"
                                                                            checked="{{ $product->taxes->contains($tax->id) }}" />
                                                                    </div>
                                                                    <span
                                                                        class="flex items-center text-xs text-primary-600">
                                                                        ({{ $tax->rate }}%)
                                                                    </span>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End shipping info -->
                            </div>
                            <!-- End column 1 -->

                            <!-- Column 2 -->
                            <div class="flex flex-1 flex-col gap-4">
                                <!-- Images -->
                                <div>
                                    <h4
                                        class="mb-2 text-base font-semibold text-primary-800 dark:text-primary-500 md:text-lg">
                                        Etiquetas
                                    </h4>
                                    <div
                                        class="h-max rounded-lg border border-zinc-400 bg-transparent p-4 dark:border-zinc-800 dark:bg-black">
                                        <div>
                                            <x-paragraph
                                                class="mb-2 after:ml-0.5 after:text-red-500 after:content-['*'] dark:text-zinc-400">
                                                Imagen principal
                                            </x-paragraph>
                                            <label for="main_image"
                                                class="dark:hover:bg-bray-800 @error('main_image') is-invalid  @enderror flex h-80 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-zinc-400 bg-zinc-50 hover:bg-zinc-100 dark:border-zinc-800 dark:bg-transparent dark:hover:border-zinc-800 dark:hover:bg-zinc-950">
                                                <div class="hidden flex-col items-center justify-center pb-6 pt-5">
                                                    <x-icon icon="cloud-upload"
                                                        class="h-12 w-12 text-zinc-400 dark:text-zinc-500" />
                                                    <p class="mb-2 text-sm text-zinc-500 dark:text-zinc-400">
                                                        <span class="font-semibold">
                                                            Clic para agregar
                                                        </span>
                                                        o desliza la imagen
                                                    </p>
                                                    <p class="text-xs text-zinc-500 dark:text-zinc-400">
                                                        PNG, JPG, WEBP
                                                    </p>
                                                </div>
                                                <input id="main_image" type="file" class="hidden"
                                                    name="main_image" />
                                                <img src="{{ Storage::url($product->main_image) }}"
                                                    alt="Preview Image {{ $product->name }}" id="previewImage"
                                                    class="m-10 h-64 w-56 object-cover">
                                            </label>
                                        </div>
                                        <div class="mt-4">
                                            <div class="mb-2 flex items-center justify-between">
                                                <div>
                                                    <x-paragraph>
                                                        Galería de imágenes
                                                    </x-paragraph>
                                                    <x-paragraph class="w-48 text-xs">
                                                        Nota: Selecciona todas las imáges de una sola vez.
                                                    </x-paragraph>
                                                </div>
                                                <div class="flex gap-2 text-sm text-zinc-400">
                                                    <label for="gallery_image"
                                                        class="flex cursor-pointer items-center gap-2 rounded-lg border border-zinc-400 px-3.5 py-2.5 text-sm font-medium text-zinc-600 transition-colors hover:bg-zinc-100 dark:border-zinc-800 dark:text-white dark:hover:bg-zinc-900">
                                                        <x-icon icon="image-add" class="h-4 w-4 text-current" />
                                                        <span class="hidden sm:block">
                                                            Seleccionar imágenes
                                                        </span>
                                                    </label>
                                                    <input type="file" name="gallery_image[]" id="gallery_image"
                                                        multiple class="hidden">
                                                    <x-button type="button" id="reloadImages" typeButton="secondary"
                                                        icon="reload" onlyIcon="true" />
                                                </div>
                                            </div>
                                            <div class="@php $product->images->count()>0 ? "h-auto": "h-24" @endphp mt-4 flex flex-wrap justify-start gap-2 rounded-lg border-2 border-dashed border-zinc-400 dark:border-zinc-800"
                                                id="previewImagesContainer">
                                                @if ($product->images->count() > 0)
                                                    @foreach ($product->images as $image)
                                                        <div class="m-2 inline-block">
                                                            <img src="{{ Storage::url($image->image) }}"
                                                                alt="Galería de imágenes {{ $product->name }}"
                                                                class="h-20 w-20 rounded-lg object-cover">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Images -->

                                <!-- Inventory -->
                                <div>
                                    <h4
                                        class="mb-2 text-base font-semibold text-primary-800 dark:text-primary-500 md:text-lg">
                                        Etiquetas
                                    </h4>
                                    <div
                                        class="h-max rounded-lg border border-zinc-400 bg-transparent p-4 dark:border-zinc-800 dark:bg-black">
                                        <div class="flex flex-col gap-4 sm:flex-row">
                                            <div class="flex-1">
                                                <x-input label="SKU" type="text" id="sku" name="sku"
                                                    value="{{ $product->sku }}" placeholder="XXXXXX"
                                                    required="required" />
                                            </div>
                                            <div class="flex-[2]">
                                                <x-input label="Código de barras" type="text" id="barcode"
                                                    name="barcode" value="{{ $product->barcode }}"
                                                    placeholder="Código de barras del producto" required="required" />
                                            </div>
                                        </div>
                                        <div class="mt-4 flex flex-col gap-4 sm:flex-row">
                                            <div class="flex-1">
                                                <x-input label="Cantidad" type="number" id="stock" name="stock"
                                                    value="{{ $product->stock }}" placeholder="#" required="required" />
                                            </div>
                                            <div class="flex-1">
                                                <x-input label="Cantidad máxima" type="number" id="max_stock"
                                                    name="max_stock" value="{{ $product->max_stock }}" placeholder="#"
                                                    required="required" />
                                            </div>
                                            <div class="flex-1">
                                                <x-input label="Cantidad mínima" type="number" id="min_stock"
                                                    name="min_stock" value="{{ $product->min_stock }}" placeholder="#"
                                                    required="required" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End inventory -->

                                <!-- Labels -->
                                <div>
                                    <h4
                                        class="mb-2 text-base font-semibold text-primary-800 dark:text-primary-500 md:text-lg">
                                        Etiquetas
                                    </h4>
                                    <div
                                        class="h-max rounded-lg border border-zinc-400 bg-transparent dark:border-zinc-800 dark:bg-black">
                                        <div
                                            class="mb-4 flex items-center justify-end border-b border-zinc-400 p-4 dark:border-zinc-800">
                                            <x-button type="button" id="showModalLabel" data-modal-target="addLabel"
                                                data-modal-toggle="addLabel" text="Nueva etiqueta" icon="plus"
                                                typeButton="secondary" />
                                        </div>
                                        <div class="flex gap-4 p-4">
                                            <div class="w-full">
                                                <label
                                                    class="mb-2 block text-sm font-medium text-zinc-900 dark:text-white">
                                                    Seleccionar etiquetas para el producto
                                                </label>
                                                <input type="hidden" name="label_id[]" id="label_id">
                                                <div class="relative">
                                                    <div
                                                        class="selected flex w-full items-center justify-between rounded-lg border border-zinc-400 bg-zinc-50 px-4 py-2.5 text-sm dark:border-zinc-800 dark:bg-zinc-950 dark:text-white">
                                                        <span class="itemSelected">Seleccionar etiqueta</span>
                                                        <x-icon icon="arrow-down"
                                                            class="h-5 w-5 text-zinc-500 dark:text-white" />
                                                    </div>
                                                    <ul class="selectOptionsLabels absolute z-10 mt-2 hidden w-full rounded-lg border border-zinc-400 bg-white p-2 shadow-lg dark:border-zinc-800 dark:bg-zinc-950"
                                                        id="labelsList">
                                                        @if ($labels->count() > 0)
                                                            @foreach ($labels as $label)
                                                                <li class="itemOption rounded-lg px-4 py-2.5 text-sm text-zinc-900 hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-900"
                                                                    data-value="{{ $label->name }}"
                                                                    data-input="#label_id">
                                                                    {{ $label->name }}
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <li
                                                                class="itemOption px-4 py-2.5 text-sm text-zinc-900 hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-700">
                                                                Sin etiquetas registradas
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <x-button type="button" typeButton="secondary" icon="arrow-right-02"
                                                id="addLabelSelected" onlyIcon="true" class="mt-7" />
                                        </div>
                                        <input type="hidden" name="labels_ids[]" id="labels_ids"
                                            value="{{ $product->labels->pluck('name')->implode(',') }}">
                                        <div id="hiddenLabelsContainer">
                                            @if ($product->labels->count() > 0)
                                                @foreach ($product->labels as $label)
                                                    <input type="hidden" name="labels[]" value="{{ $label->name }}">
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="px-4 pb-4">
                                            <div class="flex h-auto w-full flex-wrap items-start gap-1 rounded-lg border-2 border-dashed border-zinc-400 bg-zinc-50 p-2 dark:border-zinc-800 dark:bg-transparent"
                                                id="previewLabelsContainer">
                                                @if ($product->labels->count() > 0)
                                                    @foreach ($product->labels as $label)
                                                        <div
                                                            class="me-2 flex items-center justify-between gap-2 rounded-lg border border-zinc-400 bg-white px-4 py-2 text-sm font-medium text-zinc-600 dark:border-zinc-800 dark:bg-black dark:text-white">
                                                            <span>{{ $label->name }}</span>
                                                            <button type="button" class="removeLabelEdit text-white"
                                                                data-label="{{ $label->name }}"
                                                                data-index="{{ $loop->iteration }}">
                                                                <x-icon icon="x"
                                                                    class="h-4 w-4 text-blue-800 dark:text-white" />
                                                            </button>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End labels -->
                            </div>
                            <!-- End column 2 -->
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Editar producto" icon="edit" typeButton="primary" />
                        <x-button type="a" href="{{ route('admin.products.index') }}" text="Cancelar"
                            typeButton="secondary" />
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
            class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black bg-opacity-90 md:inset-0 md:h-full">
            <div class="relative h-full w-full max-w-md p-4 md:h-auto">
                <!-- Modal content -->
                <div class="relative rounded-lg bg-white p-4 shadow dark:bg-zinc-950 sm:p-5">
                    <!-- Modal header -->
                    <div
                        class="mb-4 flex items-center justify-between rounded-t border-b pb-4 dark:border-zinc-800 sm:mb-5">
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
                            Agregar impuesto
                        </h3>
                        <button type="button"
                            class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white"
                            data-modal-toggle="addTax">
                            <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
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
                                <span class="invalid-feedback hidden text-sm text-red-500" id="message-nameTax"></span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <x-input label="Tasa de impuesto" type="number" name="rate" id="rate"
                                    placeholder="0" error="{{ false }}" step="0.1" min="0.1"
                                    icon="percent" data-message="#message-rate" required="required" />
                                <span class="invalid-feedback hidden text-sm text-red-500" id="message-rate"></span>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end gap-2">
                            <x-button type="button" id="addTaxButton" text="Agregar" icon="plus"
                                typeButton="primary" />
                            <x-button type="button" data-modal-toggle="addTax" text="Cancelar"
                                typeButton="secondary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal agregar etiqueta -->
        <div id="addLabel" tabindex="-1" aria-hidden="true"
            class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black bg-opacity-90 md:inset-0 md:h-full">
            <div class="relative h-full w-full max-w-md p-4 md:h-auto">
                <!-- Modal content -->
                <div class="relative rounded-lg bg-white p-4 shadow dark:bg-zinc-950 sm:p-5">
                    <!-- Modal header -->
                    <div
                        class="mb-4 flex items-center justify-between rounded-t border-b pb-4 dark:border-zinc-800 sm:mb-5">
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
                            Agregar etiqueta
                        </h3>
                        <button type="button"
                            class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white"
                            data-modal-toggle="addLabel">
                            <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
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
                                    placeholder="Escribe el nombre de la etiqueta" icon="label" required="required"
                                    type="text" />
                                <span class="invalid-feedback hidden text-sm text-red-500" id="message-nameLabel"></span>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end gap-2">
                            <x-button type="button" id="addLabelButton" text="Agregar" icon="plus"
                                typeButton="primary" />
                            <x-button type="button" data-modal-toggle="addLabel" text="Cancelar"
                                typeButton="secondary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
