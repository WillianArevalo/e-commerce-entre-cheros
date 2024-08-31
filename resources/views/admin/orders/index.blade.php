@extends('layouts.admin-template')

@section('title', 'Categorías')

@section('content')
    <div class="mt-4 rounded-lg">
        <div class="flex flex-col items-start border-y px-4 py-4 shadow-sm dark:border-zinc-800 dark:bg-black">
            <h1 class="font-secondary text-2xl font-bold text-secondary dark:text-blue-400">
                Administrar pedidos
            </h1>
            <p class="text-sm text-zinc-400">
                Administra los pedidos
            </p>
        </div>
        <div class="bg-zinc-50 p-4 dark:bg-black">
            <div class="mx-auto w-full">
                <div class="relative bg-white shadow-md dark:border dark:border-zinc-800 dark:bg-black sm:rounded-lg">
                    <div class="border-b border-zinc-400 p-4 dark:border-zinc-800">
                        <h2 class="text-base font-semibold text-zinc-700 dark:text-zinc-200">
                            Lista de pedidos
                        </h2>
                    </div>
                    <div
                        class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-x-4 md:space-y-0">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" action="{{ route('admin.categories.search') }}"
                                id="formSearchCategorie">
                                @csrf
                                <x-input type="text" id="inputSearch" name="inputSearch" data-form="#formSearchCategorie"
                                    data-table="#tableCategorie" placeholder="Buscar" icon="search" />
                            </form>
                        </div>
                        <div
                            class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0">
                            <x-button type="a" href="{{ route('admin.customers.create') }}" text="Nuevo cliente"
                                icon="add-circle" typeButton="primary" />
                            <div class="flex w-full items-center space-x-3 md:w-auto">
                                <x-button type="button" typeButton="secondary" id="filterDropdownButton"
                                    data-dropdown-toggle="filterDropdown" text="Filtros" icon="filter" />
                                <div id="filterDropdown"
                                    class="z-10 hidden w-48 rounded-lg bg-white p-3 shadow dark:bg-zinc-950">
                                    <form action="{{ route('admin.categories.search') }}" method="POST"
                                        id="formSearchCategorieCheck">
                                        @csrf
                                        <h6 class="mb-3 text-sm font-medium text-zinc-900 dark:text-white">
                                            Categorías:
                                        </h6>
                                        <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                            <li class="flex items-center">
                                                <input id="no_subcategories" name="filter[]" type="checkbox"
                                                    value="no_subcategories"
                                                    class="text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 h-4 w-4 rounded border-zinc-400 bg-zinc-100 focus:ring-2 dark:border-zinc-500 dark:bg-white dark:ring-offset-zinc-700">
                                                <label for="no_subcategories"
                                                    class="ml-2 text-sm font-medium text-zinc-900 dark:text-zinc-100">
                                                    Sin subcategorías
                                                </label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="has_subcategories" name="filter[]" type="checkbox"
                                                    value="has_subcategories"
                                                    class="text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 h-4 w-4 rounded border-zinc-400 bg-zinc-100 focus:ring-2 dark:border-zinc-500 dark:bg-white dark:ring-offset-zinc-700">
                                                <label for="fitbit"
                                                    class="ml-2 text-sm font-medium text-zinc-900 dark:text-zinc-100">
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
                        <table class="w-full text-left text-sm text-zinc-500 dark:text-zinc-400">
                            <thead class="bg-zinc-50 text-xs uppercase text-zinc-700 dark:bg-zinc-900 dark:text-zinc-300">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Foto</th>
                                    <th scope="col" class="px-4 py-3">Nombre</th>
                                    <th scope="col" class="px-4 py-3">Apellido</th>
                                    <th scope="col" class="px-4 py-3">Correo</th>
                                    <th scope="col" class="px-4 py-3">Telefono</th>
                                    <th scope="col" class="px-4 py-3">Estado</th>
                                    <th scope="col" class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar el cliente?"
            message="No podrás recuperar este registro" action="" />
    </div>
@endsection
