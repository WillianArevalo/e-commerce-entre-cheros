@extends('layouts.admin-template')
@section('title', 'Detalles del producto')
@section('content')
    <div>
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Detalles del producto',
            'text' => 'Regresar a la lista de productos',
            'url' => route('admin.products.index'),
        ])
        <div class="h-full bg-white p-4 dark:bg-black">

            <div class="mb-4 flex w-full items-center justify-end gap-2">
                <x-button type="a" text="Editar" icon="edit" typeButton="primary"
                    href="{{ route('admin.products.edit', $product->id) }}" class="flex-1 sm:flex-none" />
                <form action="{{ route('admin.products.destroy', $product->id) }}" id="formDeleteProduct-{{ $product->id }}"
                    class="flex-1 sm:flex-none" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button type="button" data-form="formDeleteProduct-{{ $product->id }}" icon="delete"
                        typeButton="secondary" class="buttonDelete w-full sm:w-auto" text="Eliminar"
                        data-modal-target="deleteModal" data-modal-toggle="deleteModal" />
                </form>
            </div>

            <div class="flex flex-col gap-4 lg:flex-row">
                <!-- Column 1 -->
                <div class="lg:w-1/2">
                    <!-- General info -->
                    <div
                        class="mb-4 flex justify-between overflow-hidden rounded-xl border border-zinc-400 bg-white dark:border-zinc-800 dark:bg-black">
                        <div>
                            <div class="flex items-center justify-between bg-zinc-50 p-4 dark:bg-zinc-950">
                                <h2
                                    class="text-lg font-bold uppercase text-secondary text-zinc-800 dark:text-zinc-300 md:text-xl lg:text-2xl">
                                    {{ $product->name }}
                                </h2>
                                <div>
                                    <x-badge-status :status="$product->is_active" />
                                </div>
                            </div>
                            <div class="flex flex-col gap-4 border-t border-zinc-400 px-4 pb-4 dark:border-zinc-800">
                                <div class="mt-2 flex flex-col gap-1">
                                    <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Descripción corta:</h3>
                                    <x-paragraph>
                                        {{ $product->short_description }}
                                    </x-paragraph>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Descripción larga:</h3>
                                    <x-paragraph>
                                        {{ $product->long_description ?? 'No hay descripción larga' }}
                                    </x-paragraph>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End General info -->

                    <!--  Images and Inventory -->
                    <div
                        class="mt-4 overflow-hidden rounded-xl border border-zinc-400 bg-white dark:border-zinc-800 dark:bg-black">
                        <div
                            class="flex justify-between border-b border-zinc-400 bg-zinc-50 p-4 dark:border-zinc-800 dark:bg-zinc-950">
                            <h2 class="text-medium font-medium text-secondary text-zinc-700 dark:text-zinc-400">
                                Imágenes del producto
                            </h2>
                            <x-icon icon="image" class="h-6 w-6 text-zinc-700 dark:text-zinc-300" />
                        </div>
                        <div class="p-4">
                            <div class="mt-2 flex flex-col md:flex-row">
                                <div class="flex flex-1 flex-col items-center gap-2 sm:items-start">
                                    <x-paragraph>
                                        Imágen principal
                                    </x-paragraph>
                                    <div class="w-max rounded-xl dark:hover:bg-zinc-950">
                                        <img src="{{ Storage::url($product->main_image) }}" alt="product-image"
                                            class="main-image h-60 w-60 cursor-pointer rounded-xl object-cover" />
                                    </div>
                                </div>
                                <div class="mt-4 flex-1 sm:mt-0">
                                    <x-paragraph class="mb-2">
                                        Galería de imágenes
                                    </x-paragraph>
                                    <div class="flex flex-wrap items-center justify-center gap-2 sm:items-start">
                                        @foreach ($product->images as $image)
                                            <img src="{{ Storage::url($image->image) }}" alt="product-image"
                                                class="main-image h-20 w-20 cursor-pointer rounded-lg object-cover" />
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-t border-zinc-400 dark:border-zinc-800">
                            <div
                                class="flex justify-between border-b border-zinc-400 bg-zinc-50 p-4 dark:border-zinc-800 dark:bg-zinc-950">
                                <h2 class="text-medium font-medium text-secondary text-zinc-700 dark:text-zinc-400">
                                    Inventario
                                </h2>
                                <x-icon icon="cube" class="h-6 w-6 text-zinc-700 dark:text-zinc-300" />
                            </div>
                            <div class="px-4 pb-4">
                                <div class="flex justify-between">
                                    <div>
                                        <div class="mt-4 flex flex-col gap-2 sm:flex-row sm:gap-4">
                                            <div class="flex gap-1">
                                                <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">SKU:</h3>
                                                <x-paragraph>
                                                    {{ $product->sku }}</x-paragraph>
                                            </div>
                                            <div class="flex gap-1">
                                                <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Código de
                                                    barras:
                                                </h3>
                                                <x-paragraph>
                                                    {{ $product->barcode }}
                                                </x-paragraph>
                                            </div>
                                        </div>
                                        <div class="mt-2 flex gap-4">
                                            <div class="flex gap-1">
                                                <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Peso:</h3>
                                                <x-paragraph>
                                                    {{ $product->weight }} KG
                                                </x-paragraph>
                                            </div>
                                            <div class="flex gap-1">
                                                <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Cantidad:
                                                </h3>
                                                <x-paragraph>
                                                    {{ $product->stock }}
                                                </x-paragraph>
                                            </div>
                                        </div>
                                        <div class="mt-2 flex gap-1">
                                            <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Dimensiones:
                                            </h3>
                                            <x-paragraph>{{ $product->dimensions }}</x-paragraph>
                                        </div>
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
                        </div>
                    </div>
                    <!-- End Images and Inventory -->
                </div>
                <!-- End Column 1 -->

                <!-- Columun 2 -->
                <div class="flex flex-col lg:w-1/2">
                    <!-- Categories and Price -->
                    <div
                        class="categorie overflow-hidden rounded-lg border border-zinc-400 bg-white dark:border-zinc-800 dark:bg-black">
                        <div>
                            <div
                                class="flex justify-between border-b border-zinc-400 bg-zinc-50 p-4 dark:border-zinc-800 dark:bg-zinc-950">
                                <h2 class="text-medium font-medium text-secondary text-zinc-700 dark:text-zinc-400">
                                    Categoría
                                </h2>
                                <x-icon icon="bookmark" class="h-6 w-6 text-zinc-700 dark:text-zinc-300" />
                            </div>
                            <div class="p-4">
                                <div class="mt-2 flex flex-col gap-1">
                                    <div class="flex items-center gap-2">
                                        <x-icon icon="folder" class="h-6 w-6 text-zinc-700 dark:text-zinc-300" />
                                        <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">
                                            Categoría principal:
                                        </h3>
                                    </div>
                                    <div class="ms-8">
                                        <x-paragraph>
                                            {{ $product->categories->name }}
                                        </x-paragraph>
                                    </div>
                                </div>
                                <div class="mb-2 ms-12 mt-4 flex flex-col gap-1">
                                    <div class="flex items-center gap-2">
                                        <x-icon icon="folder-open" class="h-6 w-6 text-zinc-700 dark:text-zinc-300" />
                                        <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">Subcategoría:</h3>
                                    </div>
                                    <div class="ms-8">
                                        <x-paragraph>
                                            {{ $product->subcategories->name }}
                                        </x-paragraph>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div
                                class="flex justify-between border-y border-zinc-400 bg-zinc-50 p-4 dark:border-zinc-800 dark:bg-zinc-950">
                                <h2 class="text-medium font-medium text-secondary text-zinc-700 dark:text-zinc-400">
                                    Precio
                                </h2>
                                <x-icon icon="dollar" class="h-6 w-6 text-zinc-700 dark:text-zinc-300" />
                            </div>
                            <div class="p-4">
                                <div class="mt- flex flex-col gap-1">
                                    <h3 class="text-base font-medium text-zinc-700 dark:text-zinc-100">
                                        Precio normal:
                                    </h3>
                                    <x-paragraph>
                                        ${{ $product->price }}
                                    </x-paragraph>
                                </div>
                                @if ($product->offer_price)
                                    <div class="mt-2 flex justify-between">
                                        <div class="flex flex-col gap-1">
                                            <h3 class="text-base font-medium text-zinc-700 dark:text-zinc-100">
                                                Precio de oferta:
                                            </h3>
                                            <x-paragraph>${{ $product->offer_price }}</x-paragraph>
                                        </div>
                                        <div>
                                            <x-badge-status :status="$product->offer_active" />
                                        </div>
                                    </div>
                                    <div class="mt-2 flex flex-col">
                                        <h3 class="text-base font-medium text-zinc-700 dark:text-zinc-100">
                                            Fecha de la oferta:
                                        </h3>
                                        <div class="mt-2 flex justify-between">
                                            <div class="flex flex-col gap-2">
                                                <x-paragraph>
                                                    Inicia:
                                                </x-paragraph>
                                                <div class="flex items-center gap-2">
                                                    <x-icon icon="calendar-up"
                                                        class="h-6 w-6 text-green-700 dark:text-green-500" />
                                                    <x-paragraph>
                                                        {{ \Carbon\Carbon::parse($product->offer_start_date)->format('d M, Y') }}
                                                    </x-paragraph>
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-2">
                                                <x-paragraph>
                                                    Finaliza:
                                                </x-paragraph>
                                                <div class="flex items-center gap-2">
                                                    <x-icon icon="calendar-down"
                                                        class="h-6 w-6 text-red-700 dark:text-red-500" />
                                                    <x-paragraph>
                                                        {{ \Carbon\Carbon::parse($product->offer_end_date)->format('d M, Y') }}
                                                    </x-paragraph>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- End Categories and Price -->

                    <!-- Taxes and Labels -->
                    <div
                        class="categorie mt-4 overflow-hidden rounded-xl border border-zinc-400 bg-white dark:border-zinc-800 dark:bg-black">
                        <div>
                            <div class="border-b border-zinc-400 bg-zinc-50 p-4 dark:border-zinc-800 dark:bg-zinc-950">
                                <h2 class="text-medium font-medium text-secondary text-zinc-700 dark:text-zinc-400">
                                    Impuestos
                                </h2>
                            </div>
                            <div>
                                <table class="w-full text-left text-sm text-zinc-500 dark:text-zinc-400">
                                    <tbody>
                                        @if ($product->taxes->count() > 0)
                                            @foreach ($product->taxes as $tax)
                                                <tr
                                                    class="border-b border-zinc-400 hover:bg-zinc-100 dark:border-zinc-800 dark:hover:bg-zinc-950">
                                                    <td class="p-4">
                                                        <span
                                                            class="rounded-full bg-primary-100 px-2.5 py-0.5 text-sm font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
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
                        </div>
                        <div>
                            <div class="border-b border-zinc-400 bg-zinc-50 p-4 dark:border-zinc-800 dark:bg-zinc-950">
                                <h2 class="text-medium font-medium text-secondary text-zinc-700 dark:text-zinc-400">
                                    Etiquetas
                                </h2>
                            </div>
                            <div class="flex gap-2 p-4">
                                @if ($product->labels->count() == 0)
                                    <x-paragraph>No hay etiquetas</x-paragraph>
                                @else
                                    @foreach ($product->labels as $label)
                                        <span
                                            class="bg-{{ $label->color }}-100 text-{{ $label->color }}-800 dark:bg-{{ $label->color }}-900 dark:text-{{ $label->color }}-300 rounded-full px-3 py-1 text-xs font-semibold dark:bg-opacity-20">
                                            {{ $label->name }}
                                        </span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- End Taxes and Labels -->
                </div>
                <!-- End Column 2 -->
            </div>
        </div>

        <div class="mb-4 px-4">
            <x-heading class="flex items-center gap-2">
                <x-icon icon="message" class="h-6 w-6 text-current" />
                Comentarios
            </x-heading>
            <div class="flex flex-wrap gap-4">
                @if ($product->reviews->count() > 0)
                    @foreach ($product->reviews as $review)
                        <div
                            class="mt-4 flex w-max flex-col gap-4 rounded-xl border border-zinc-400 p-4 dark:border-zinc-800">
                            <div class="items center flex gap-2">
                                <img src="{{ Storage::url($review->user->profile) }}" alt="user-image"
                                    class="h-12 w-12 rounded-full object-cover" />
                                <div>
                                    <h3 class="text-sm font-medium text-zinc-700 dark:text-zinc-100">
                                        {{ $review->user->name }}
                                    </h3>
                                    <x-paragraph class="text-xs text-zinc-500 dark:text-zinc-400">
                                        {{ $review->created_at->diffForHumans() }}
                                    </x-paragraph>
                                    <div class="mt-2 flex-1">
                                        <x-paragraph>
                                            {{ $review->comment }}
                                        </x-paragraph>
                                    </div>
                                    <div class="mt-1">
                                        <span class="flex items-center gap-2 text-sm text-zinc-800 dark:text-zinc-400">
                                            <x-icon icon="star" class="h-5 w-5 text-yellow-500" />
                                            {{ number_format($review->rating, 1) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="ms-4">
                                    @if ($review->is_approved)
                                        <span
                                            class="flex items-center gap-1 rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800 dark:bg-green-900 dark:bg-opacity-20 dark:text-green-300">
                                            <x-icon icon="check" class="h-3 w-3 text-green-500" />
                                            Aprobado
                                        </span>
                                    @else
                                        <span
                                            class="flex items-center gap-1 rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-800 dark:bg-red-900 dark:bg-opacity-20 dark:text-red-300">
                                            <x-icon icon="x" class="h-3 w-3 text-red-500" />
                                            Pendiente
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @endforeach
                @else
                    <x-paragraph>
                        No hay comentarios
                    </x-paragraph>
                @endif
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
            <img class="block h-72 w-96 animate-jump-in rounded-xl object-cover animate-duration-300 md:h-4/5 md:w-2/5"
                id="image-modal" src="{{ asset('images/photo.jpg') }}" />
        </div>
    </div>
    <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar el producto?"
        message="No podrás recuperar este registro" action="" />
@endsection
