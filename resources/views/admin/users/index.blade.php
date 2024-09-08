@extends('layouts.admin-template')
@section('title', 'Usuarios')
@section('content')
    <div>
        @include('layouts.__partials.admin.header-page', [
            'title' => 'Usuarios',
            'description' => 'Administrar los usuarios registrados en la plataforma',
        ])
        <div class="bg-zinc-50 dark:bg-black">
            <div class="mx-auto w-full">
                <div class="relative bg-white dark:bg-black">
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
                                icon="plus" typeButton="primary" />
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
                    <div class="mx-4">
                        <x-table>
                            <x-slot name="thead">
                                <x-tr>
                                    <x-th class="w-10">
                                        <input id="default-checkbox" type="checkbox" value=""
                                            class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-primary-600">
                                    </x-th>
                                    <x-th>Foto</x-th>
                                    <x-th>Nombre</x-th>
                                    <x-th>Apellido</x-th>
                                    <x-th>Usuario</x-th>
                                    <x-th>Correo</x-th>
                                    <x-th>Rol</x-th>
                                    <x-th>Estado</x-th>
                                    <x-th :last="true">Acciones</x-th>
                                </x-tr>
                            </x-slot>
                            <x-slot name="tbody">
                                @if ($users->isEmpty())
                                    <x-tr section="body">
                                        <x-td colspan="8">
                                            No se encontraron registros
                                        </x-td>
                                    </x-tr>
                                @else
                                    @foreach ($users as $user)
                                        <x-tr section="body">
                                            <x-td>
                                                <input id="default-checkbox" type="checkbox" value="{{ $user->id }}"
                                                    class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-primary-600">
                                            </x-td>
                                            <x-td>
                                                <img src="{{ Storage::url($user->profile) }}"
                                                    alt="Foto de perfil del usuario {{ $user->username }}"
                                                    class="h-10 w-10 rounded-full object-cover">
                                            </x-td>
                                            <x-td>
                                                <span>{{ $user->name }}</span>
                                            </x-td>
                                            <x-td>
                                                <span>{{ $user->last_name }}</span>
                                            </x-td>
                                            <x-td>
                                                <span>{{ $user->username }}</span>
                                            </x-td>
                                            <x-td>
                                                <span>{{ $user->email }}</span>
                                            </x-td>
                                            <x-td>
                                                <span
                                                    class="me-2 rounded-full bg-primary-100 px-3 py-1 font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                                                    {{ Str::ucfirst($user->role) }}
                                                </span>
                                            </x-td>
                                            <x-td>
                                                <x-badge-status status="{{ $user->status }}" />
                                            </x-td>
                                            <x-td>
                                                <div class="flex gap-2">
                                                    <x-button type="a"
                                                        href="{{ route('admin.users.edit', $user->id) }}" onlyIcon="true"
                                                        icon="edit" typeButton="success" />
                                                    <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                        id="formDeleteUser-{{ $user->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button"
                                                            data-form="formDeleteUser-{{ $user->id }}" onlyIcon="true"
                                                            data-modal-target="deleteModal" data-modal-toggle="deleteModal"
                                                            icon="delete" typeButton="danger" class="buttonDelete" />
                                                    </form>
                                                    <x-button type="a"
                                                        href="{{ Route('admin.users.show', $user->id) }}" icon="view"
                                                        typeButton="secondary" onlyIcon="true" />
                                                </div>
                                            </x-td>
                                        </x-tr>
                                    @endforeach
                                @endif
                            </x-slot>
                        </x-table>
                    </div>
                </div>
            </div>
        </div>
        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar el usuario?"
            message="No podrás recuperar este registro" action="" />
    </div>
@endsection
