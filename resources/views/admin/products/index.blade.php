@extends('layouts.admin-template')

@section('title', 'Brands')

@section('content')
    <div>
        @include('layouts.__partials.admin.header-page', [
            'title' => 'Productos',
            'description' => 'Administrar los productos registrados.',
        ])
        <div class="bg-gray-50 dark:bg-black">
            <div class="mx-auto w-full">
                <div class="relative overflow-hidden bg-white dark:bg-black">
                    <div class="mt-4 flex w-full items-center justify-between gap-2 px-4">
                        <div class="flex items-center gap-10">
                            <span class="font-secondary text-base font-semibold dark:text-gray-200">
                                {{ $count }} producto
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <x-button type="button" icon="import" typeButton="secondary" text="Importar" />
                            <x-button type="button" icon="export" typeButton="secondary" text="Exportar" />
                        </div>
                    </div>
                    <div
                        class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-x-4 md:space-y-0">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" action="{{ route('admin.categories.search') }}"
                                id="formSearchProduct">
                                @csrf
                                <x-input type="text" id="inputSearch" name="inputSearch" data-form="#formSearchProduct"
                                    data-table="#tableProduct" placeholder="Buscar" icon="search" />
                            </form>
                        </div>
                        <div
                            class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0">
                            <x-button type="button" icon="reload" typeButton="secondary" />
                            <div class="flex w-full items-center space-x-3 md:w-auto">
                                <x-button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" type="button"
                                    icon="filter" typeButton="secondary" text="Filtros" />
                                <div id="filterDropdown"
                                    class="z-10 hidden w-48 rounded-lg bg-white p-3 shadow dark:bg-zinc-950">
                                    <form action="{{ route('admin.categories.search') }}" method="POST"
                                        id="formSearchCategorieCheck">
                                        @csrf
                                        <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                                            Filtros
                                        </h6>
                                        <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                            <li class="flex items-center">
                                                <input id="offers" name="filter[]" type="checkbox" value="offers"
                                                    class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-white dark:ring-offset-gray-700 dark:focus:ring-blue-600">
                                                <label for="offers"
                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    Con ofertas
                                                </label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="flash_offers" name="filter[]" type="checkbox"
                                                    value="flash_offers"
                                                    class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-white dark:ring-offset-gray-700 dark:focus:ring-blue-600">
                                                <label for="flash_offers"
                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    Con ofertas flash
                                                </label>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <div>
                                <x-button type="button" id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                                    typeButton="secondary" text="Acciones" icon="arrow-down" />
                                <div id="actionsDropdown" class="z-10 hidden w-60 rounded bg-white shadow dark:bg-zinc-950">
                                    <ul class="p-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="actionsDropdownButton">
                                        <li>
                                            <a href="#"
                                                class="block rounded px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-900 dark:hover:text-white">
                                                Importar seleccionados
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block rounded px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-zinc-900 dark:hover:text-white">
                                                Eliminar seleccionados
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <x-button type="a" href="{{ route('admin.products.create') }}"
                                    text-="Agregar producto" icon="add-circle" typeButton="primary" />
                            </div>
                        </div>
                    </div>
                    <div class="mx-4 mb-4 overflow-hidden rounded-lg border border-gray-200 dark:border-zinc-900">
                        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                            <thead
                                class="border-b border-zinc-200 bg-gray-50 text-xs uppercase text-gray-700 dark:border-zinc-900 dark:bg-black dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="w-10 border-e border-gray-200 px-4 py-3 dark:border-zinc-900">
                                        <input id="default-checkbox" type="checkbox" value=""
                                            class="h-4 w-4 rounded border-2 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-900 dark:bg-zinc-950 dark:ring-offset-gray-800 dark:focus:ring-blue-600">
                                    </th>
                                    <th scope="col" class="border-e border-gray-200 px-4 py-3 dark:border-zinc-900">
                                        Producto</th>
                                    <th scope="col" class="border-e border-gray-200 px-4 py-3 dark:border-zinc-900">
                                        Imagen</th>
                                    <th scope="col" class="border-e border-gray-200 px-4 py-3 dark:border-zinc-900">
                                        Precio</th>
                                    <th scope="col" class="border-e border-gray-200 px-4 py-3 dark:border-zinc-900">SKU
                                    </th>
                                    <th scope="col" class="border-e border-gray-200 px-4 py-3 dark:border-zinc-900">
                                        Inventario</th>
                                    <th scope="col" class="border-e border-gray-200 px-4 py-3 dark:border-zinc-900">
                                        Categoría</th>
                                    <th scope="col" class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tableProduct">
                                @if ($products->count() > 0)
                                    @foreach ($products as $product)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-zinc-950">
                                            <td class="px-4 py-3">
                                                <input id="default-checkbox" type="checkbox" value=""
                                                    class="h-4 w-4 rounded border-2 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-900 dark:bg-zinc-950 dark:ring-offset-gray-800 dark:focus:ring-blue-600">
                                            </td>
                                            <td class="px-4 py-3">
                                                <span>{{ $product->name }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <img src="{{ Storage::url($product->main_image) }}"
                                                    alt="{{ $product->name }}" class="h-16 w-16 rounded-lg object-cover">
                                            </td>
                                            <td class="px-4 py-3">
                                                <span>${{ $product->price }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span>{{ $product->sku }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span>{{ $product->stock }} en stock</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span
                                                    class="rounded-full bg-blue-100 px-3 py-1 font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                                    {{ $product->categories->name }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex items-center space-x-2">
                                                    <x-button type="a" icon="edit" typeButton="success"
                                                        href="{{ route('admin.products.edit', $product->id) }}"
                                                        onlyIcon="true" />
                                                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                        id="formDeleteProduct-{{ $product->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button"
                                                            data-form="formDeleteProduct-{{ $product->id }}"
                                                            icon="delete" typeButton="danger" class="buttonDelete"
                                                            onlyIcon="true" data-modal-target="deleteModal"
                                                            data-modal-toggle="deleteModal" />
                                                    </form>
                                                    <x-button type="a" icon="view" typeButton="secondary"
                                                        href="{{ route('admin.products.show', $product->id) }}"
                                                        onlyIcon="true" />
                                                    <form action="{{ route('admin.flash-offers.add-flash-offer') }}"
                                                        method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product->id }}">
                                                        <x-button type="submit" icon="flash" typeButton="secondary"
                                                            data-tooltip-target="tooltip-default-{{ $product->id }}"
                                                            onlyIcon="true" />
                                                        <div id="tooltip-default-{{ $product->id }}" role="tooltip"
                                                            class="tooltip invisible absolute z-10 inline-block rounded-lg bg-violet-500 px-3 py-2 text-xs font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-violet-700">
                                                            Oferta flash
                                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="px-4 py-3 text-center" colspan="8">
                                            <span>No hay productos registrados</span>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $products->links('vendor.pagination.pagination-custom') }}
                    </div>
                </div>
            </div>
        </div>
        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar el producto?"
            message="No podrás recuperar este registro" action="" />
    </div>
@endsection
