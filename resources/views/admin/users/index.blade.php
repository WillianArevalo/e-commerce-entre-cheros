@extends('layouts.admin-template')

@section('title', 'Categorías')

@section('content')
    <div class="mt-4 rounded-lg">
        @include('layouts.__partials.admin.header-page', [
            'title' => 'Usuarios',
            'description' => 'Administrar los usuarios registrados en la plataforma',
        ])
        <div class="bg-zinc-50 dark:bg-black">
            <div class="mx-auto w-full">
                <div class="relative bg-white shadow-md dark:bg-black">
                    <div class="border-b border-zinc-400 p-4 dark:border-zinc-800">
                        <h2 class="text-base font-semibold text-zinc-700 dark:text-zinc-200">
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
                                        <h6 class="mb-3 text-sm font-medium text-zinc-900 dark:text-white">
                                            Filtros
                                        </h6>
                                        <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                            <li class="flex items-center">
                                                <input id="offers" name="filter[]" type="checkbox" value="offers"
                                                    class="h-4 w-4 rounded border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-500 dark:bg-white dark:ring-offset-zinc-700 dark:focus:ring-blue-600">
                                                <label for="offers"
                                                    class="ml-2 text-sm font-medium text-zinc-900 dark:text-zinc-100">
                                                    Con ofertas
                                                </label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="flash_offers" name="filter[]" type="checkbox"
                                                    value="flash_offers"
                                                    class="h-4 w-4 rounded border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-500 dark:bg-white dark:ring-offset-zinc-700 dark:focus:ring-blue-600">
                                                <label for="flash_offers"
                                                    class="ml-2 text-sm font-medium text-zinc-900 dark:text-zinc-100">
                                                    Con ofertas flash
                                                </label>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mx-4 mb-4 overflow-hidden rounded-lg border border-zinc-400 dark:border-zinc-800">
                        <table class="w-full text-left text-sm text-zinc-500 dark:text-zinc-400">
                            <thead
                                class="border-b border-zinc-400 bg-zinc-50 text-xs uppercase text-zinc-700 dark:border-zinc-800 dark:bg-black dark:text-zinc-300">
                                <tr>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        <input id="default-checkbox" type="checkbox" value=""
                                            class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-blue-600">
                                    </th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Foto
                                    </th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Nombre
                                    </th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Apellido
                                    </th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Usuario
                                    </th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Correo
                                    </th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Rol
                                    </th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Estado
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="hover:bg-zinc-100 dark:hover:bg-zinc-950">
                                        <td class="px-4 py-3">
                                            <input id="default-checkbox" type="checkbox" value="{{ $user->id }}"
                                                class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-blue-600">
                                        </td>
                                        <td class="px-4 py-3">
                                            <img src="{{ Storage::url($user->profile) }}"
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
                                                <x-button type="a"
                                                    href="{{ route('admin.users.edit', $user->id) }}" onlyIcon="true"
                                                    icon="edit" typeButton="success" />
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
