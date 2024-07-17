@extends('layouts.admin-template')

@section('title', 'Ver producto')

@section('content')
    <div class="mt-4">
        <div class="dark:bg-black py-4 px-4 flex flex-col items-start border-y dark:border-zinc-900">
            <a href="{{ route('admin.products.index') }}"
                class="text-gray-500 dark:text-gray-400 flex items-center justify-center gap-1 text-sm hover:underline hover:text-gray-600">
                <x-icon icon="arrow-left-02" class="w-4 h-4 text-current" />
                Regresar a productos
            </a>
            <h1 class="text-3xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Detalles del producto
            </h1>
        </div>
        <div class="flex p-4 gap-4 h-full bg-black">
            <div class="w-1/2">
                <div
                    class="dark:bg-black bg-white border border-gray-300 dark:border-zinc-900 p-4 rounded-lg mb-4 flex justify-between">
                    <h2 class="text-2xl font-bold dark:text-blue-200 text-secondary  uppercase">
                        {{ $product->name }}
                    </h2>
                    <span
                        class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300 flex items-center">
                        {{ Str::ucfirst($product->status) }}
                    </span>
                </div>
                <div
                    class="flex flex-col gap-2 dark:bg-black bg-white border border-gray-300 dark:border-zinc-900 p-4 rounded-lg">
                    <div class="flex flex-col gap-1 mt-2">
                        <h3 class="dark:text-gray-100 text-gray-700 text-sm font-medium">Descripción corta:</h3>
                        <p class="dark:text-gray-400 text-gray-500 text-sm">
                            {{ $product->short_description }}
                        </p>
                    </div>
                    <div class="flex flex-col gap-1 mt-2">
                        <h3 class="dark:text-gray-100 text-gray-700 text-sm font-medium">Descripción larga:</h3>
                        <p class="dark:text-gray-400 text-gray-500 text-sm">
                            {{ $product->long_description ?? 'No hay descripción larga' }}
                        </p>
                    </div>
                </div>
                <div class="dark:bg-black bg-white border border-gray-300 dark:border-zinc-900 p-4 rounded-lg mt-4">
                    <h2 class="text-xl font-bold dark:text-blue-200 text-secondary">Imágenes del producto</h2>
                    <div class="flex gap-4 mt-2 flex-col">
                        <div class="flex gap-2 flex-1 flex-col">
                            <p class="dark:text-gray-100 text-gray-700 text-sm">
                                Imágen principal
                            </p>
                            <img src="{{ Storage::url($product->main_image) }}" alt="product-image"
                                class="w-full h-full rounded-lg object-cover main-image cursor-pointer" />
                        </div>
                        <div class="flex-1">
                            <p class="mb-2 dark:text-gray-100 text-gray-700  text-sm">Galería de imágenes</p>
                            <div class="flex gap-2 flex-wrap">
                                @foreach ($product->images as $image)
                                    <img src="{{ Storage::url($image->image) }}" alt="product-image"
                                        class="w-28 h-28 rounded-lg object-cover main-image cursor-pointer" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <h2
                        class="text-xl font-bold dark:text-blue-200 text-secondary mt-4 border-t dark:border-zinc-900 border-gray-200 pt-2">
                        Inventario
                    </h2>
                    <div class="flex gap-4">
                        <div class="flex gap-1 mt-2">
                            <h3 class="dark:text-gray-100 text-gray-700 text-sm font-medium">SKU:</h3>
                            <p class="dark:text-gray-400 text-gray-500 text-sm">{{ $product->sku }}</p>
                        </div>
                        <div class="flex gap-1 mt-2 mb-2">
                            <h3 class="dark:text-gray-100 text-gray-700 text-sm font-medium">Código de barras:</h3>
                            <p class="dark:text-gray-400 text-gray-500 text-sm">{{ $product->barcode }}</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex gap-1">
                            <h3 class="dark:text-gray-100 text-gray-700 text-sm font-medium">Peso:</h3>
                            <p class="dark:text-gray-400 text-gray-500 text-sm">{{ $product->weight }} KG</p>
                        </div>
                        <div class="flex gap-1">
                            <h3 class="dark:text-gray-100 text-gray-700 text-sm font-medium">Cantidad:</h3>
                            <p class="dark:text-gray-400 text-gray-500 text-sm">{{ $product->stock }}</p>
                        </div>
                    </div>
                    <div class="flex gap-1 mt-2">
                        <h3 class="dark:text-gray-100 text-gray-700 text-sm font-medium">Dimensiones:</h3>
                        <p class="dark:text-gray-400 text-gray-500 text-sm">{{ $product->dimensions }}</p>
                    </div>
                    <div class="p-4 mt-2">
                        <div class="dimension-box">
                            <div class="face front">{{ $product->width }}</div>
                            <div class="face back"></div>
                            <div class="face left"></div>
                            <div class="face right">{{ $product->height }}</div>
                            <div class="face top">{{ $product->length }}</div>
                            <div class="face bottom"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/2 flex flex-col">
                <div class="categorie dark:bg-black bg-white border border-gray-300 dark:border-zinc-900 p-4 rounded-lg">
                    <h2 class="text-xl font-bold dark:text-blue-200 text-secondary">Categoría</h2>
                    <div class="flex flex-col gap-1 mt-2">
                        <h3 class="dark:text-gray-100 text-gray-700 text-sm font-medium">Categoría principal:</h3>
                        <p class="dark:text-gray-400 text-gray-500 text-sm">{{ $product->categories->name }}</p>
                    </div>
                    <div class="flex flex-col gap-1 mt-2 mb-2">
                        <h3 class="dark:text-gray-100 text-gray-700 text-sm font-medium">Subcategoría:</h3>
                        <p class="dark:text-gray-400 text-gray-500 text-sm">{{ $product->subcategories->name }}</p>
                    </div>
                    <h2
                        class="text-xl font-bold dark:text-blue-200 text-secondary border-t dark:border-zinc-900 border-gray-200 pt-2">
                        Precio
                    </h2>
                    <div class="flex flex-col gap-1 mt-">
                        <h3 class="dark:text-gray-100 text-gray-700 text-sm font-medium">Precio normal:</h3>
                        <p class="dark:text-gray-400 text-gray-500 text-sm">${{ $product->price }}</p>
                    </div>
                    @if ($product->offer_price)
                        <div class="flex flex-col gap-1 mt-2">
                            <h3 class="dark:text-gray-100 text-gray-700 text-sm font-medium">Precio de oferta:</h3>
                            <p class="text-gray-500 dark:text-gray-400 text-sm">${{ $product->price }}</p>
                        </div>
                        <div
                            class="flex flex-col gap-1 mt-2 border-2 border-dashed dark:border-gray-700 border-gray-400 p-4 rounded-lg">
                            <h3 class="text-gray-100 text-sm font-medium">Fecha de la oferta:</h3>
                            <div class="timeline-container">
                                <div class="timeline">
                                    <div class="timeline-event start-date">
                                        <div
                                            class="timeline-content p-4 dark:bg-gray-700 bg-gray-200 dark:text-gray-300 text-gray-700 rounded text-sm">
                                            <h3 class="timeline-title">Fecha de inicio</h3>
                                            <p class="timeline-date dark:text-blue-500 text-secondary font-medium">
                                                {{ $product->offer_start_date }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="timeline-event end-date">
                                        <div
                                            class="timeline-content p-4 dark:bg-gray-700 bg-gray-200 dark:text-gray-300 text-gray-700 rounded text-sm">
                                            <h3 class="timeline-title">Fecha de fin</h3>
                                            <p class="timeline-date dark:text-blue-500 text-secondary font-medium">
                                                {{ $product->offer_end_date }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <h2
                        class="text-xl font-bold dark:text-blue-200 text-secondary mt-4 border-t dark:border-zinc-900 border-gray-200 pt-2">
                        Impuestos
                    </h2>
                    <div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <tbody>
                                @if ($product->taxes->count() > 0)
                                    @foreach ($product->taxes as $tax)
                                        <tr class="border-b dark:border-zinc-900 border-gray-200">
                                            <td class="py-2">
                                                <span
                                                    class="bg-green-100 text-green-800 text-sm font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                    {{ $tax->name }}
                                                </span>
                                            </td>
                                            <td class="py-2">{{ $tax->rate }}%</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <h2 class="text-xl font-bold dark:text-blue-200 text-secondary mt-4">
                        Etiquetas
                    </h2>
                    <div class="mt-2 flex gap-2">
                        @if ($product->labels->count() == 0)
                            <p class="dark:text-gray-400 text-gray-500 text-sm">No hay etiquetas</p>
                        @else
                            @foreach ($product->labels as $label)
                                <span
                                    class="bg-blue-100 text-blue-800 text-sm font-medium px-4 py-1 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                    {{ $label->name }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 pb-4 text-sm flex gap-2 items-center justify-between bg-black">
            <x-button type="a" text="Regresar" icon="arrow-left-02" typeButton="danger"
                href="{{ route('admin.products.index') }}" class="w-max" />
            <div class="flex gap-2 items-center">
                @if ($previousProduct)
                    <x-button type="a" text="Anterior producto" icon="arrow-left" iconAlign="left"
                        typeButton="primary" href="{{ route('admin.products.show', $previousProduct->id) }}"
                        class="w-max" />
                @endif
                @if ($nextProduct)
                    <x-button type="a" text="Siguiente producto" icon="arrow-right" iconAlign="right"
                        typeButton="primary" href="{{ route('admin.products.show', $nextProduct->id) }}"
                        class="w-max" />
                @endif
            </div>
        </div>
    </div>

    <div id="modal-image" class="relative">
        <button type="button"
            class="close absolute right-0 dark:bg-gray-700 bg-gray-200 hover:bg-gray-300 dark:hover:bg-gray-800 p-2 m-10 rounded-lg"
            id="close-modal">
            <x-icon icon="cancel" class="w-5 h-5 text-black dark:text-white" />
        </button>
        <div class="flex items-center justify-center h-full" id="container-modal-image">
            <img class="h-4/5 w-4/5 object-contain" id="image-modal" src="{{ asset('images/photo.jpg') }}" />
        </div>
    </div>

@endsection
