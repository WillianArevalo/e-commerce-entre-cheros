@extends('layouts.admin-template')

@section('title', 'Categorías')

@section('content')
    <div class="mt-4 rounded-lg">
        @include('layouts.__partials.admin.header-page', [
            'title' => 'Usuarios',
            'description' => 'Administrar los usuarios registrados en la plataforma',
        ])
        <div class="bg-gray-50 p-4 dark:bg-black">
            <div class="mx-auto w-full">
                <div class="relative bg-white shadow-md dark:border dark:border-zinc-900 dark:bg-black sm:rounded-lg">
                    <div class="border-b border-gray-200 p-4 dark:border-zinc-900">
                        <h2 class="text-base font-semibold text-gray-700 dark:text-gray-200">
                            Lista de usuarios registrados
                        </h2>
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
                            <x-button type="a" href="{{ route('admin.users.create') }}" text="Nuevo usuario"
                                icon="add-circle" typeButton="primary" />
                            <div class="flex w-full items-center space-x-3 md:w-auto">
                                <x-button type="button" id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                    typeButton="secondary" icon="filter" text="Filtros" />
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
                        </div>
                    </div>
                    <div>
                        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-zinc-900 dark:text-gray-300">
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
                                                class="h-10 w-10 rounded-full object-cover">
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
                                                class="me-2 rounded-full bg-blue-100 px-3 py-1 font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                                {{ Str::ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="me-2 rounded-full bg-green-100 px-3 py-1 font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
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
