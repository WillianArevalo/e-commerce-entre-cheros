@extends('layouts.admin-template')

@section('title', 'Ver producto')

@section('content')
    <div class="mt-4">
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Detalles del producto',
            'text' => 'Regresar a la lista de productos',
            'url' => route('admin.products.index'),
        ])
        <div class="flex h-full gap-4 bg-white p-4 dark:bg-black">
            <div class="w-1/2">
                <div
                    class="mb-4 flex justify-between rounded-lg border border-zinc-400 bg-white p-4 dark:border-zinc-800 dark:bg-black">
                    <h2 class="text-2xl font-bold uppercase text-secondary dark:text-blue-200">
                        {{ $product->name }}
                    </h2>
                    <span
                        class="me-2 flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-sm font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                        {{ Str::ucfirst($product->status) }}
                    </span>
                </div>
                <div
                    class="flex flex-col gap-2 rounded-lg border border-zinc-400 bg-white p-4 dark:border-zinc-800 dark:bg-black">
                    <div class="mt-2 flex flex-col gap-1">
                        <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Descripción corta:</h3>
                        <x-paragraph>
                            {{ $product->short_description }}
                        </x-paragraph>
                    </div>
                    <div class="mt-2 flex flex-col gap-1">
                        <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Descripción larga:</h3>
                        <x-paragraph>
                            {{ $product->long_description ?? 'No hay descripción larga' }}
                        </x-paragraph>
                    </div>
                </div>
                <div class="mt-4 rounded-lg border border-zinc-400 bg-white p-4 dark:border-zinc-800 dark:bg-black">
                    <h2 class="text-xl font-bold text-secondary dark:text-blue-200">Imágenes del producto</h2>
                    <div class="mt-2 flex flex-col gap-4">
                        <div class="flex flex-1 flex-col gap-2">
                            <x-paragraph>
                                Imágen principal
                            </x-paragraph>
                            <img src="{{ Storage::url($product->main_image) }}" alt="product-image"
                                class="main-image h-full w-full cursor-pointer rounded-lg object-cover" />
                        </div>
                        <div class="flex-1">
                            <x-paragraph class="mb-2">
                                Galería de imágenes
                            </x-paragraph>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($product->images as $image)
                                    <img src="{{ Storage::url($image->image) }}" alt="product-image"
                                        class="main-image h-28 w-28 cursor-pointer rounded-lg object-cover" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <h2
                        class="mt-4 border-t border-zinc-400 pt-2 text-xl font-bold text-secondary dark:border-zinc-800 dark:text-blue-200">
                        Inventario
                    </h2>
                    <div class="flex gap-4">
                        <div class="mt-2 flex gap-1">
                            <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">SKU:</h3>
                            <x-paragraph>
                                {{ $product->sku }}</x-paragraph>
                        </div>
                        <div class="mb-2 mt-2 flex gap-1">
                            <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Código de barras:</h3>
                            <x-paragraph>
                                {{ $product->barcode }}
                            </x-paragraph>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex gap-1">
                            <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Peso:</h3>
                            <x-paragraph>
                                {{ $product->weight }} KG
                            </x-paragraph>
                        </div>
                        <div class="flex gap-1">
                            <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Cantidad:</h3>
                            <x-paragraph>
                                {{ $product->stock }}
                            </x-paragraph>
                        </div>
                    </div>
                    <div class="mt-2 flex gap-1">
                        <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Dimensiones:</h3>
                        <x-paragraph>{{ $product->dimensions }}</x-paragraph>
                    </div>
                    <div class="mt-2 p-4">
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
            <div class="flex w-1/2 flex-col">
                <div class="categorie rounded-lg border border-zinc-400 bg-white p-4 dark:border-zinc-800 dark:bg-black">
                    <h2 class="text-xl font-bold text-secondary dark:text-blue-200">Categoría</h2>
                    <div class="mt-2 flex flex-col gap-1">
                        <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Categoría principal:</h3>
                        <x-paragraph>
                            {{ $product->categories->name }}
                        </x-paragraph>
                    </div>
                    <div class="mb-2 mt-2 flex flex-col gap-1">
                        <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Subcategoría:</h3>
                        <x-paragraph>
                            {{ $product->subcategories->name }}
                        </x-paragraph>
                    </div>
                    <h2
                        class="border-t border-zinc-400 pt-2 text-xl font-bold text-secondary dark:border-zinc-800 dark:text-blue-200">
                        Precio
                    </h2>
                    <div class="mt- flex flex-col gap-1">
                        <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Precio normal:</h3>
                        <x-paragraph>
                            ${{ $product->price }}
                        </x-paragraph>
                    </div>
                    @if ($product->offer_price)
                        <div class="mt-2 flex flex-col gap-1">
                            <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Precio de oferta:</h3>
                            <x-paragraph>${{ $product->offer_price }}</x-paragraph>
                        </div>
                        <div
                            class="mt-2 flex flex-col gap-1 rounded-lg border-2 border-dashed border-zinc-400 p-4 dark:border-zinc-800">
                            <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Fecha de la oferta:</h3>
                            <div class="timeline-container">
                                <div class="timeline">
                                    <div class="timeline-event start-date">
                                        <div
                                            class="timeline-content border-zinc-400dark:text-zinc-300 rounded border bg-white p-4 text-sm text-zinc-700 dark:border-zinc-800 dark:bg-black">
                                            <h3 class="timeline-title text-zinc-700 dark:text-zinc-300">Fecha de inicio</h3>
                                            <x-paragraph class="timeline-date">
                                                {{ \Carbon\Carbon::parse($product->offer_start_date)->format('d M, Y') }}
                                            </x-paragraph>
                                        </div>
                                    </div>
                                    <div class="timeline-event end-date">
                                        <div
                                            class="timeline-content rounded border border-zinc-400 bg-white p-4 text-sm text-zinc-700 dark:border-zinc-800 dark:bg-black dark:text-zinc-300">
                                            <h3 class="timeline-title text-zinc-700 dark:text-zinc-300">Fecha de fin</h3>
                                            <x-paragraph class="timeline-date">
                                                {{ \Carbon\Carbon::parse($product->offer_end_date)->format('d M, Y') }}
                                            </x-paragraph>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <h2
                        class="mt-4 border-t border-zinc-400 pt-2 text-xl font-bold text-secondary dark:border-zinc-800 dark:text-blue-200">
                        Impuestos
                    </h2>
                    <div>
                        <table class="w-full text-left text-sm text-zinc-500 dark:text-zinc-400">
                            <tbody>
                                @if ($product->taxes->count() > 0)
                                    @foreach ($product->taxes as $tax)
                                        <tr class="border-b border-zinc-400 dark:border-zinc-800">
                                            <td class="py-2">
                                                <span
                                                    class="rounded-full bg-green-100 px-2.5 py-0.5 text-sm font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
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
                    <h2 class="mt-4 text-xl font-bold text-secondary dark:text-blue-200">
                        Etiquetas
                    </h2>
                    <div class="mt-2 flex gap-2">
                        @if ($product->labels->count() == 0)
                            <x-paragraph>No hay etiquetas</x-paragraph>
                        @else
                            @foreach ($product->labels as $label)
                                <span
                                    class="me-2 flex items-center justify-between gap-2 rounded-full border border-zinc-400 bg-white px-4 py-2 text-sm font-medium text-zinc-600 dark:border-zinc-800 dark:bg-black dark:text-white">
                                    {{ $label->name }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between gap-2 px-4 pb-4 text-sm dark:bg-black">
            <x-button type="a" text="Regresar" icon="arrow-left-02" typeButton="secondary"
                href="{{ route('admin.products.index') }}" class="w-max" />
            <div class="flex items-center gap-2">
                @if ($previousProduct)
                    <x-button type="a" text="Anterior producto" icon="arrow-left" iconAlign="left"
                        typeButton="secondary" href="{{ route('admin.products.show', $previousProduct->id) }}"
                        class="w-max" />
                @endif
                @if ($nextProduct)
                    <x-button type="a" text="Siguiente producto" icon="arrow-right" iconAlign="right"
                        typeButton="secondary" href="{{ route('admin.products.show', $nextProduct->id) }}"
                        class="w-max" />
                @endif
            </div>
        </div>
    </div>

    <div id="modal-image" class="relative">
        <button type="button"
            class="close absolute right-0 m-10 rounded-lg bg-zinc-200 p-2 hover:bg-zinc-300 dark:bg-zinc-700 dark:hover:bg-zinc-800"
            id="close-modal">
            <x-icon icon="x" class="h-5 w-5 text-black dark:text-white" />
        </button>
        <div class="flex h-full items-center justify-center" id="container-modal-image">
            <img class="h-4/5 w-4/5 object-contain" id="image-modal" src="{{ asset('images/photo.jpg') }}" />
        </div>
    </div>

@endsection
