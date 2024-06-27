@extends('layouts.admin-template')

@section('title', 'Categories')

@section('content')
    <div class="p-4 border border-gray-200 rounded-lg dark:border-gray-700 mt-4">
        <div class="dark:bg-gray-800 py-3 px-4 rounded-lg shadow-sm">
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">Administrar categorías</h1>
        </div>
        <div class="bg-gray-50 dark:bg-gray-900 mt-4">
            <div class="mx-auto w-full">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <x-icon icon="search" class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                                    </div>
                                    <input type="text" id="simple-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Search" required="">
                                </div>
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <a href="{{ route('admin.categories.create') }}"
                                class="flex items-center justify-center text-white bg-tertiary hover:bg-blue-600 dark:bg-secondary dark:hover:bg-blue-950 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2  focus:outline-none dark:focus:ring-primary-800">
                                <x-icon icon="plus" class="h-3.5 w-3.5 mr-2 text-current" />
                                Agregar categoría
                            </a>
                            <div class="flex items-center space-x-3 w-full md:w-auto">
                                <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                    class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                    type="button">
                                    <x-icon icon="filter" class="h-4 w-4 mr-2 text-gray-400" />
                                    Filtros
                                    <x-icon icon="arrow-down" class="-mr-1 ml-1.5 w-4 h-4 text-current" />
                                </button>
                                <div id="filterDropdown"
                                    class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                    <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Choose brand</h6>
                                    <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                        <li class="flex items-center">
                                            <input id="apple" type="checkbox" value=""
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="apple"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Apple
                                                (56)</label>
                                        </li>
                                        <li class="flex items-center">
                                            <input id="fitbit" type="checkbox" value=""
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="fitbit"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Microsoft
                                                (16)</label>
                                        </li>
                                        <li class="flex items-center">
                                            <input id="razor" type="checkbox" value=""
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="razor"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Razor
                                                (49)</label>
                                        </li>
                                        <li class="flex items-center">
                                            <input id="nikon" type="checkbox" value=""
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="nikon"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Nikon
                                                (12)</label>
                                        </li>
                                        <li class="flex items-center">
                                            <input id="benq" type="checkbox" value=""
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="benq"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">BenQ
                                                (74)</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Imagen</th>
                                    <th scope="col" class="px-4 py-3">Nombre</th>
                                    <th scope="col" class="px-4 py-3">Subcategorías</th>
                                    <th scope="col" class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($categories->count() == 0)
                                    <tr class="border-b dark:border-gray-700">
                                        <td colspan="4"
                                            class="px-4 py-3 text-center font-medium text-gray-900 dark:text-white">
                                            No hay categorías
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($categories as $categorie)
                                        <tr class="border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <img src="{{ Storage::url($categorie->image) }}" alt="Product 1"
                                                    class="w-16 h-16 object-cover rounded-lg">
                                            </th>
                                            <td class="px-4 py-3">
                                                <span>{{ $categorie->name }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                @if ($categorie->subcategories->isNotEmpty())
                                                    <div class="flex flex-col gap-2">
                                                        @foreach ($categorie->subcategories as $subcategorie)
                                                            <div
                                                                class="flex items-center gap-2 px-3 py-2 rounded-lg dark:bg-gray-700 w-max bg-gray-100">
                                                                <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                                                {{ $subcategorie->name }}
                                                                <button class="dark:text-white text-gray-600"
                                                                    id="{{ $subcategorie->id }}-dropdown-button"
                                                                    data-dropdown-toggle="{{ $subcategorie->id }}-dropdown"
                                                                    type="button">
                                                                    <x-icon icon="more-hortizontal"
                                                                        class="w-5 h-5 text-current" />
                                                                </button>
                                                                <div id="{{ $subcategorie->id }}-dropdown"
                                                                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                                        aria-labelledby="{{ $subcategorie->id }}-dropdown-button">
                                                                        <li>
                                                                            <a href="{{ route('admin.subcategories.edit', $subcategorie->id) }}"
                                                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                                Editar
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="py-1">
                                                                        <button data-id="{{ $subcategorie->id }}"
                                                                            data-modal-target="deleteModalSubCategorie"
                                                                            data-modal-toggle="deleteModalSubCategorie"
                                                                            type="button"
                                                                            class="block text-start w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white buttonDelete">
                                                                            Eliminar
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <span>No hay subcategorías</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex gap-2">
                                                    <a href="{{ route('admin.categories.edit', $categorie->id) }}"
                                                        class="text-green-800 bg-green-300 bg-opacity-75 hover:text-white hover:bg-green-800 dark:text-green-300 font-medium dark:bg-green-700 dark:bg-opacity-20 p-2.5 rounded-lg flex items-center gap-2 dark:hover:bg-opacity-40 buttonUpdateCategorie">
                                                        <x-icon icon="edit" class="w-5 h-5 text-current" />
                                                        Editar
                                                    </a>
                                                    <button data-id="{{ $categorie->id }}"
                                                        data-modal-target="deleteModalCategorie"
                                                        data-modal-toggle="deleteModalCategorie" type="button"
                                                        class="text-red-800 hover:bg-red-800 bg-opacity-75 hover:text-white bg-red-300 dark:text-red-300 font-medium dark:bg-red-700 dark:bg-opacity-20 p-2.5 rounded-lg flex items-center gap-2 dark:hover:bg-opacity-40 buttonDelete">
                                                        <x-icon icon="delete" class="w-5 h-5 text-current" />
                                                        Eliminar
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                        aria-label="Table navigation">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                            Showing
                            <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                            of
                            <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                        </span>
                        <ul class="inline-flex items-stretch -space-x-px">
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Previous</span>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page"
                                    class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <x-delete-modal modalId="deleteModalCategorie" title="¿Estás seguro de eliminar la categoría?"
            message="No podrás recuperar este registro" action="{{ route('admin.categories.destroy', '') }}" />

        <x-delete-modal modalId="deleteModalSubCategorie" title="¿Estás seguro de eliminar la subcategoría?"
            message="No podrás recuperar este registro" action="{{ route('admin.subcategories.destroy', '') }}" />

    </div>
@endsection
