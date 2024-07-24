@extends('layouts.admin-template')

@section('title', 'Categorías')

@section('content')
    <div class="rounded-lg mt-4">
        <div class="dark:bg-black py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-zinc-900">
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Administrar clientes
            </h1>
            <p class="text-sm text-gray-400">
                Administra tus clientes registrados
            </p>
        </div>
        <div class="bg-gray-50 dark:bg-black p-4">
            <div class="mx-auto w-full">
                <div class="bg-white dark:bg-black dark:border dark:border-zinc-900 relative shadow-md sm:rounded-lg">
                    <div class="p-4 border-b dark:border-zinc-900 border-gray-200">
                        <h2 class="dark:text-gray-200 text-base font-semibold text-gray-700">
                            Lista de clientes registrados
                        </h2>
                    </div>
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" action="{{ route('admin.categories.search') }}"
                                id="formSearchCategorie">
                                @csrf
                                <x-input type="text" id="inputSearch" name="inputSearch" data-form="#formSearchCategorie"
                                    data-table="#tableCategorie" placeholder="Buscar" icon="search" />
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <x-button type="a" href="{{ route('admin.customers.create') }}" text="Nuevo cliente"
                                icon="add-circle" typeButton="primary" />
                            <div class="flex items-center space-x-3 w-full md:w-auto">
                                <x-button type="button" typeButton="secondary" id="filterDropdownButton"
                                    data-dropdown-toggle="filterDropdown" text="Filtros" icon="filter" />
                                <div id="filterDropdown"
                                    class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-zinc-950">
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
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-white dark:border-gray-500">
                                                <label for="no_subcategories"
                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    Sin subcategorías
                                                </label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="has_subcategories" name="filter[]" type="checkbox"
                                                    value="has_subcategories"
                                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-white dark:border-gray-500">
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
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-zinc-900 dark:text-gray-300">
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
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td class="px-4 py-3">
                                            <img src="{{ Storage::url($customer->user->profile_photo_path) }}"
                                                alt="Foto de perfil del usuario {{ $customer->user->username }}"
                                                class="h-10 w-10 rounded-full object-cover  ">
                                        </td>
                                        <td class="px-4 py-3">
                                            <span>{{ $customer->user->name }}</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span>{{ $customer->user->last_name }}</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span>{{ $customer->user->email }}</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span>{{ $customer->phone }}</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="bg-blue-100 text-blue-800 font-medium me-2 px-3 py-1 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                                {{ Str::ucfirst($customer->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex gap-2">
                                                <x-button type="a"
                                                    href="{{ route('admin.customers.edit', $customer->id) }}"
                                                    icon="edit" typeButton="success" onlyIcon="true" />
                                                <form action="{{ route('admin.customers.destroy', $customer->id) }}"
                                                    id="formDeleteCustomer" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-button type="button" data-form="formDeleteCustomer" icon="delete"
                                                        typeButton="danger" class="buttonDelete" onlyIcon="true" />
                                                </form>
                                                <x-button type="a"
                                                    href="{{ route('admin.customers.edit', $customer->id) }}"
                                                    icon="view" typeButton="secondary" onlyIcon="true" />
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
