@extends('layouts.admin-template')

@section('title', 'Ver producto')

@section('content')
    <div class="mt-4">
        <div class="dark:bg-gray-800 py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-gray-700">
            <a href="{{ route('admin.products.index') }}"
                class="text-gray-500 dark:text-gray-400 flex items-center justify-center gap-1 text-sm hover:underline hover:text-gray-600">
                <x-icon icon="arrow-left-02" class="w-4 h-4 text-current" />
                Regresar a productos
            </a>
            <h1 class="text-3xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Detalles del producto
            </h1>
        </div>
        <div class="flex p-4 gap-4 h-full">
            <div class="w-1/2">
                <div class="flex flex-col gap-2 dark:bg-gray-800 bg-gray-100 p-4 rounded-lg">
                    <h2 class="text-2xl font-bold dark:text-blue-200 text-secondary">Nombre del producto</h2>
                    <div class="flex flex-col gap-1 mt-2">
                        <h3 class="dark:text-gray-100 text-gray-700 text-sm font-medium">Descripción corta:</h3>
                        <p class="dark:text-gray-400 text-gray-500 text-sm">Descripción del producto</p>
                    </div>
                    <div class="flex flex-col gap-1 mt-2">
                        <h3 class="dark:text-gray-100 text-gray-700 text-sm font-medium">Descripción larga:</h3>
                        <p class="dark:text-gray-400 text-gray-500 text-sm">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt aspernatur error ducimus
                            minima, doloribus ipsum quia optio, illum rem suscipit sit praesentium pariatur mollitia
                            inventore aut eligendi dignissimos esse est.
                        </p>
                    </div>
                </div>
                <div class="dark:bg-gray-800 bg-gray-100 p-4 rounded-lg mt-4">
                    <h2 class="text-xl font-bold dark:text-blue-200 text-secondary">Imágenes del producto</h2>
                    <div class="flex gap-4 mt-2">
                        <div class="flex gap-2 flex-1 flex-col">
                            <p class="dark:text-gray-100 text-gray-700 text-sm">
                                Imágen principal
                            </p>
                            <img src="{{ Storage::url($product->main_image) }}" alt="product-image"
                                class="w-full h-full rounded-lg object-cover" />
                        </div>
                        <div class="flex-1">
                            <p class="mb-2 dark:text-gray-100 text-gray-700  text-sm">Galería de imágenes</p>
                            <div class="flex gap-2 flex-wrap">
                                <img src="{{ asset('images/photo.jpg') }}" alt="product-image"
                                    class="w-20 h-20 rounded-lg object-cover" />
                                <img src="{{ asset('images/photo.jpg') }}" alt="product-image"
                                    class="w-20 h-20 rounded-lg object-cover" />
                                <img src="{{ asset('images/photo.jpg') }}" alt="product-image"
                                    class="w-20 h-20 rounded-lg object-cover" />
                                <img src="{{ asset('images/photo.jpg') }}" alt="product-image"
                                    class="w-20 h-20 rounded-lg object-cover" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/2 flex flex-col">
                <div class="categorie dark:bg-gray-800 bg-gray-100 p-4 rounded-lg">
                    <h2 class="text-xl font-bold dark:text-blue-200 text-secondary">Categoría</h2>
                    <div class="flex flex-col gap-1 mt-2">
                        <h3 class="dark:text-gray-100 text-gray-700 text-sm font-medium">Categoría principal:</h3>
                        <p class="dark:text-gray-400 text-gray-500 text-sm">{{ $product->categories->name }}</p>
                    </div>
                    <div class="flex flex-col gap-1 mt-2">
                        <h3 class="dark:text-gray-100 text-gray-700 text-sm font-medium">Subcategoría:</h3>
                        <p class="dark:text-gray-400 text-gray-500 text-sm">{{ $product->subcategories->name }}</p>
                    </div>
                </div>
                <div class="p-4 rounded-lg dark:bg-gray-800 bg-gray-100 mt-4">
                    <div class="flex flex-col gap-1 mt-2">
                        <h3 class="dark:text-gray-100 text-gray-700 text-sm font-medium">Precio normal:</h3>
                        <p class="dark:text-gray-400 text-gray-500 text-sm">${{ $product->price }}</p>
                    </div>
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
                </div>
            </div>
        </div>
    </div>
@endsection
