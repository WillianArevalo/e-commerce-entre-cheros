@extends('layouts.admin-template')

@section('title', 'Categorías')

@section('content')
    <div class="rounded-lg dark:border-gray-700 mt-4">
        <div class="dark:bg-gray-800 py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-gray-700">
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Administrar categorías
            </h1>
            <p class="text-sm text-gray-400">
                Administra las categorías de tu tienda
            </p>
        </div>
        <div class="bg-gray-50 dark:bg-gray-900 p-4">
            <div class="mx-auto w-full">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
                    <div class="p-4 border-b dark:border-gray-700 border-gray-200">
                        <h2 class="dark:text-gray-200 text-base font-semibold text-gray-700">
                            Lista de categorías
                        </h2>
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
                                        class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Buscar" required="">
                                </div>
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <x-button type="a" href="{{ route('admin.categories.create') }}" text="Nueva categoría"
                                icon="add-circle" typeClass="primary" />
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
                                            Categorías:
                                        </h6>
                                        <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                            <li class="flex items-center">
                                                <input id="no_subcategories" name="filter[]" type="checkbox"
                                                    value="no_subcategories"
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="no_subcategories"
                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    Sin subcategorías
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
                        </div>
                    </div>
                    <div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Imagen</th>
                                    <th scope="col" class="px-4 py-3">Nombre</th>
                                    <th scope="col" class="px-4 py-3">Subcategorías</th>
                                    <th scope="col" class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tableCategorie">
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
                                                                class="relative flex items-center gap-2 px-3 py-2 rounded-2xl dark:bg-gray-700 w-max bg-gray-100">
                                                                <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                                                {{ $subcategorie->name }}
                                                                <button class="dark:text-white text-gray-600 btnDropDown"
                                                                    type="button">
                                                                    <x-icon icon="more-hortizontal"
                                                                        class="w-5 h-5 text-current" />
                                                                </button>
                                                                <div
                                                                    class="hidden absolute top-10 z-30 w-44 bg-white divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 dropDownContent">
                                                                    <ul
                                                                        class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                                                        <li>
                                                                            <a href="{{ route('admin.subcategories.edit', $subcategorie->id) }}"
                                                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                                                Editar
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="py-1">
                                                                        <form
                                                                            action="{{ route('admin.subcategories.destroy', $subcategorie->id) }}"
                                                                            method="POST" id="formDeleteSubCategorie">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="button"
                                                                                data-form="formDeleteSubCategorie"
                                                                                class="block text-start w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white buttonDelete">
                                                                                Eliminar
                                                                            </button>
                                                                        </form>
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
                                                    <x-button type="a"
                                                        href="{{ route('admin.categories.edit', $categorie->id) }}"
                                                        text="Editar" icon="edit" typeButton="success" />
                                                    <form action="{{ route('admin.categories.destroy', $categorie->id) }}"
                                                        id="formDeleteCategorie" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button" data-form="formDeleteCategorie"
                                                            text="Eliminar" icon="delete" typeButton="danger"
                                                            class="buttonDelete" />
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    {{ $categories->links('vendor.pagination.pagination-custom') }}
                </div>
            </div>
        </div>
        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar la categoría/subcategoría?"
            message="No podrás recuperar este registro" action="" />
    </div>
@endsection
