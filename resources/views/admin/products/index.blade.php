@extends('layouts.admin-template')

@section('title', 'Brands')

@section('content')
    <div class=" rounded-lg dark:border-gray-700">
        <div class="dark:bg-black py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-zinc-900">
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Administrar productos
            </h1>
            <p class="text-sm text-gray-400">
                Administra todos los productos de tu tienda
            </p>
        </div>
        <div class="bg-gray-50 dark:bg-black p-4">
            <div class="mx-auto w-full">
                <div
                    class="bg-white dark:bg-black dark:border dark:border-zinc-900 relative shadow-md rounded-lg overflow-hidden">
                    <div class="w-full flex gap-2 mt-4 px-4 justify-between items-center">
                        <div class="flex gap-10 items-center">
                            <span class="dark:text-gray-200 font-secondary font-semibold text-base">100 productos</span>
                        </div>
                        <div class="flex gap-2 items-center">
                            <x-button type="button" icon="import" typeButton="secondary" text="Importar" />
                            <x-button type="button" icon="export" typeButton="secondary" text="Exportar" />
                        </div>
                    </div>
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" action="{{ route('admin.categories.search') }}"
                                id="formSearchProduct">
                                @csrf
                                <x-input type="text" id="inputSearch" name="inputSearch" data-form="#formSearchProduct"
                                    data-table="#tableProduct" placeholder="Buscar" icon="search" />
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <x-button type="button" icon="reload" typeButton="secondary" />
                            <div class="flex items-center space-x-3 w-full md:w-auto">
                                <x-button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" type="button"
                                    icon="filter" typeButton="secondary" text="Filtros" />
                                <div id="filterDropdown"
                                    class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-zinc-950">
                                    <form action="{{ route('admin.categories.search') }}" method="POST"
                                        id="formSearchCategorieCheck">
                                        @csrf
                                        <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                                            Filtros
                                        </h6>
                                        <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                            <li class="flex items-center">
                                                <input id="offers" name="filter[]" type="checkbox" value="offers"
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-white dark:border-gray-500">
                                                <label for="offers"
                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    Con ofertas
                                                </label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="flash_offers" name="filter[]" type="checkbox"
                                                    value="flash_offers"
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-white dark:border-gray-500">
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
                                <div id="actionsDropdown" class="z-10 hidden bg-white rounded shadow w-60 dark:bg-zinc-950">
                                    <ul class="p-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="actionsDropdownButton">
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-900 dark:hover:text-white rounded">
                                                Importar seleccionados
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-zinc-900 dark:text-gray-200 dark:hover:text-white rounded">
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
                    <div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-x-auto">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-zinc-900 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-4 py-3">
                                        <input id="default-checkbox" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-gray-600">
                                    </th>
                                    <th scope="col" class="px-4 py-3">Producto</th>
                                    <th scope="col" class="px-4 py-3">Imagen</th>
                                    <th scope="col" class="px-4 py-3">Precio</th>
                                    <th scope="col" class="px-4 py-3">SKU</th>
                                    <th scope="col" class="px-4 py-3">Inventario</th>
                                    <th scope="col" class="px-4 py-3">Categoría</th>
                                    <th scope="col" class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tableProduct">
                                @if ($products->count() > 0)
                                    @foreach ($products as $product)
                                        <tr class="border-b dark:border-zinc-900">
                                            <td class="px-4 py-3">
                                                <input id="default-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-gray-600">
                                            </td>
                                            <td class="px-4 py-3">
                                                <span>{{ $product->name }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <img src="{{ Storage::url($product->main_image) }}"
                                                    alt="{{ $product->name }}" class="w-16 h-16 rounded-lg object-cover">
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
                                                    class="bg-blue-100 text-blue-800 font-medium px-3 py-1 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                                    {{ $product->categories->name }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex items-center space-x-2">
                                                    <x-button type="a" icon="edit" typeButton="success"
                                                        href="{{ route('admin.products.edit', $product->id) }}"
                                                        onlyIcon="true" />
                                                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                        id="formDeleteCategorie" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button" data-form="formDeleteCategorie"
                                                            icon="delete" typeButton="danger" class="buttonDelete"
                                                            onlyIcon="true" />
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
                                                            class="absolute z-10 invisible inline-block px-3 py-2 font-medium text-white transition-opacity duration-300 bg-violet-500 rounded-lg shadow-sm opacity-0 tooltip dark:bg-violet-700 text-xs">
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
