@extends('layouts.admin-template')

@section('title', 'Categorías')

@section('content')
    <div class="rounded-lg  mt-4">
        <div class="dark:bg-black py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-zinc-900">
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Administrar usuarios
            </h1>
            <p class="text-sm text-gray-400">
                Administra los usuarios de tu sistema
            </p>
        </div>
        <div class="bg-gray-50 dark:bg-black p-4">
            <div class="mx-auto w-full">
                <div class="bg-white dark:bg-black dark:border dark:border-zinc-900 relative shadow-md sm:rounded-lg">
                    <div class="p-4 border-b dark:border-zinc-900 border-gray-200">
                        <h2 class="dark:text-gray-200 text-base font-semibold text-gray-700">
                            Lista de usuarios registrados
                        </h2>
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
                            <x-button type="a" href="{{ route('admin.users.create') }}" text="Nuevo usuario"
                                icon="add-circle" typeButton="primary" />
                            <div class="flex items-center space-x-3 w-full md:w-auto">
                                <x-button type="button" id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                    typeButton="secondary" icon="filter" text="Filtros" />
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
                        </div>
                    </div>
                    <div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-zinc-900 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-4 py-3">ID</th>
                                    <th scope="col" class="px-4 py-3">Foto</th>
                                    <th scope="col" class="px-4 py-3">Nombre</th>
                                    <th scope="col" class="px-4 py-3">Apellido</th>
                                    <th scope="col" class="px-4 py-3">Usuario</th>
                                    <th scope="col" class="px-4 py-3">Correo</th>
                                    <th scope="col" class="px-4 py-3">Rol</th>
                                    <th scope="col" class="px-4 py-3">Estado</th>
                                    <th scope="col" class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-4 py-3">
                                            <span>{{ $user->id }}</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <img src="{{ Storage::url($user->profile_photo_path) }}"
                                                alt="Foto de perfil del usuario {{ $user->username }}"
                                                class="w-10 h-10 rounded-full object-cover">
                                        </td>
                                        <td class="px-4 py-3">
                                            <span>{{ $user->name }}</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span>{{ $user->last_name }}</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span>{{ $user->username }}</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span>{{ $user->email }}</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="bg-blue-100 text-blue-800 font-medium me-2 px-3 py-1 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                                {{ Str::ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="bg-green-100 text-green-800 font-medium me-2 px-3 py-1 rounded-full dark:bg-green-900 dark:text-green-300">
                                                {{ Str::ucfirst($user->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex gap-2">
                                                <x-button type="a" href="{{ route('admin.users.edit', $user->id) }}"
                                                    onlyIcon="true" icon="edit" typeButton="success" />
                                                <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                    id="formDeleteUser" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-button type="button" data-form="formDeleteUser" onlyIcon="true"
                                                        icon="delete" typeButton="danger" class="buttonDelete" />
                                                </form>
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
        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar el usuario?"
            message="No podrás recuperar este registro" action="" />
    </div>
@endsection
