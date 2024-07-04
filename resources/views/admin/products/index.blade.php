@extends('layouts.admin-template')

@section('title', 'Brands')

@section('content')
    <div class=" rounded-lg dark:border-gray-700">
        <div class="dark:bg-gray-800 py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-gray-700">
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Administrar productos
            </h1>
            <p class="text-sm text-gray-400">
                Administra todos los productos de tu tienda
            </p>
        </div>
        <div class="bg-gray-50 dark:bg-gray-900 p-4">
            <div class="mx-auto w-full">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div class="w-full flex gap-2 mt-4 px-4 justify-between items-center">
                        <div class="flex gap-10 items-center">
                            <span class="dark:text-gray-200 font-secondary font-semibold text-base">100 productos</span>
                            <div class="flex items-center gap-2">
                                <label for="show" class="block text-sm font-medium text-gray-900 dark:text-white">
                                    Mostrar
                                </label>
                                <input type="hidden" id="show" name="show" value="10">
                                <div class="relative">
                                    <div
                                        class="selected border border-gray-300 bg-gray-50 dark:border-gray-600 rounded-lg py-2 dark:bg-gray-700 w-20 px-4 dark:text-white text-sm flex items-center justify-between">
                                        <span class="itemSelected">10</span>
                                        <x-icon icon="arrow-down" class="w-5 h-5 dark:text-white text-gray-500" />
                                    </div>
                                    <ul
                                        class="absolute z-10 w-full mt-2 py-1 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 selectOptions hidden">
                                        <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
                                            data-value="secundaria" data-input="show">
                                            25
                                        </li>
                                        <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
                                            data-value="secundaria" data-input="show">
                                            50
                                        </li>
                                        <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
                                            data-value="secundaria" data-input="show">
                                            100
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-2 items-center">
                            <button id="importDropdownButton" data-dropdown-toggle="importDropdown"
                                class="flex items-center border border-blue-600 hover:bg-blue-600 text-blue-600 hover:text-white px-4 py-2.5 rounded-lg text-sm">
                                <x-icon icon="import" class="h-5 w-5 mr-2 text-current" />
                                Importar
                            </button>
                            <button href=""
                                class="flex items-center border border-blue-600 hover:bg-blue-600 text-blue-600 hover:text-white px-4 py-2.5 rounded-lg text-sm">
                                <x-icon icon="export" class="h-5 w-5 mr-2 text-current" />
                                Exportar
                            </button>
                        </div>
                    </div>
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" action="{{ route('admin.categories.search') }}"
                                id="formSearchCategorie">
                                @csrf
                                <label for="simple-search" class="sr-only">
                                    Buscar
                                </label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <x-icon icon="search" class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                                    </div>
                                    <input type="text" id="inputSearchCategorie" name="searchCategorie"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Buscar" required="">
                                </div>
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <button
                                class="w-full md:w-auto flex items-center justify-center py-3 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                type="button">
                                <x-icon icon="reload" class="h-4 w-4 text-current" />
                            </button>
                            <div class="flex items-center space-x-3 w-full md:w-auto">
                                <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                    class="w-full md:w-auto flex items-center justify-center py-2.5 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                    type="button">
                                    <x-icon icon="filter" class="h-4 w-4 mr-2 text-gray-400" />
                                    Filtros
                                    <x-icon icon="arrow-down" class="-mr-1 ml-1.5 w-4 h-4 text-current" />
                                </button>
                                <div id="filterDropdown"
                                    class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                    <form action="{{ route('admin.categories.search') }}" method="POST"
                                        id="formSearchCategorieCheck">
                                        @csrf
                                        <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                                            Filtros
                                        </h6>
                                        <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                            <li class="flex items-center">
                                                <input id="no_subcategories" name="filter[]" type="checkbox"
                                                    value="no_subcategories"
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="no_subcategories"
                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    Con ofertas
                                                </label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="has_subcategories" name="filter[]" type="checkbox"
                                                    value="has_subcategories"
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="fitbit"
                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    Con subcategorías
                                                </label>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <div>
                                <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                                    class="flex items-center justify-center w-full px-4 py-2.5 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                    type="button">
                                    <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                    </svg>
                                    Acciones
                                </button>
                                <div id="actionsDropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-60 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="actionsDropdownButton">
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Importar seleccionados
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <a href="#"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                            Eliminar seleccionados
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('admin.products.create') }}"
                                    class="flex items-center border border-blue-600 bg-blue-600  hover:bg-blue-800 hover:border-blue-800 text-white hover:text-white px-4 py-2.5 rounded-lg text-sm dark:bg-blue-600 dark:text-white dark:border-blue-600 dark:hover:bg-blue-800 dark:hover:border-blue-800">
                                    <x-icon icon="add-circle" class="h-5 w-5 mr-2 text-current" />
                                    Agregar producto
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-x-auto">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">
                                        <input id="default-checkbox" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
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
                                        <tr>
                                            <td class="px-4 py-3">
                                                <input id="default-checkbox" type="checkbox" value=""
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            </td>
                                            <td class="px-4 py-3">
                                                <span>{{ $product->name }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <img src="{{ Storage::url($product->main_image) }}" alt=""
                                                    class="w-16 h-16 rounded-lg object-cover">
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
                                                        href="{{ route('admin.products.edit', $product->id) }}" />
                                                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                        id="formDeleteCategorie" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button" data-form="formDeleteCategorie"
                                                            icon="delete" typeButton="danger" class="buttonDelete" />
                                                    </form>
                                                    <x-button type="a" icon="view" typeButton="secondary"
                                                        href="{{ route('admin.products.show', $product->id) }}" />
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
