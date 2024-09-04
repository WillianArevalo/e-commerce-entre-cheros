@extends('layouts.admin-template')
@section('title', 'Políticas')
@section('content')
    <div class="mt-4 dark:border-zinc-800 dark:bg-black">
        <div class="flex flex-col items-start border-y px-4 py-4 shadow-sm dark:border-zinc-800 dark:bg-black">
            <h1 class="font-secondary text-secondary text-2xl font-bold dark:text-blue-400">
                Políticas
            </h1>
            <p class="text-sm text-zinc-700 dark:text-zinc-400">
                Administra:
            </p>
            <ul class="mt-2 flex flex-col gap-2 text-sm text-zinc-700 dark:text-zinc-400">
                <li class="flex items-center gap-2">
                    <span class="block h-2 w-2 rounded-full bg-blue-500"></span>
                    Políticas de privacidad
                </li>
                <li class="flex items-center gap-2">
                    <span class="block h-2 w-2 rounded-full bg-blue-500"></span>
                    Políticas de compra
                </li>
                <li class="flex items-center gap-2">
                    <span class="block h-2 w-2 rounded-full bg-blue-500"></span>
                    Políticas de pago con tarjeta
                </li>
                <li class="flex items-center gap-2">
                    <span class="block h-2 w-2 rounded-full bg-blue-500"></span>
                    Políticas de envío
                </li>
                <li class="flex items-center gap-2">
                    <span class="block h-2 w-2 rounded-full bg-blue-500"></span>
                    Términos y condiciones
                </li>
            </ul>
        </div>
        <div class="bg-zinc-50 dark:bg-black">
            <div class="mx-auto w-full">
                <div class="relative bg-white shadow-md dark:bg-black">
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
                            <x-button data-drawer="#drawer-new-policie" class="open-drawer" type="button"
                                text="Nueva política" icon="plus" typeButton="primary" />
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
                                        Nombre
                                    </th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Path
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($policies->count() > 0)
                                    @foreach ($policies as $policy)
                                        <tr class="hover:bg-zinc-100 dark:hover:bg-zinc-950">
                                            <td class="px-4 py-3">
                                                <input id="default-checkbox" type="checkbox" value="{{ $policy->id }}"
                                                    class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-blue-600">
                                            </td>
                                            <td class="px-4 py-3">
                                                <span>{{ $policy->name }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span>{{ $policy->file_path }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex gap-2">
                                                    <form action="{{ route('admin.policies.destroy', $policy->id) }}"
                                                        id="formDeletePolicie-{{ $policy->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button"
                                                            data-form="formDeletePolicie-{{ $policy->id }}"
                                                            onlyIcon="true" icon="delete" typeButton="danger"
                                                            class="buttonDelete" />
                                                    </form>
                                                    <x-button type="a" href="{{ Storage::url($policy->file_path) }}"
                                                        target="_blank" onlyIcon="true" icon="view"
                                                        typeButton="secondary" />
                                                    <form action="{{ Route('admin.policies.download', $policy->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <x-button type="submit" onlyIcon="true" icon="import"
                                                            typeButton="success" />
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="px-4 py-3 text-center" colspan="4">
                                            No hay políticas registradas
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar la política?"
            message="No podrás recuperar este registro" action="" />

        <div id="drawer-new-policie"
            class="drawer fixed right-0 top-0 z-40 h-screen w-[500px] translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-new-policie">
            <h5 id="drawer-new-policie-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-zinc-500 dark:text-zinc-400">
                Nueva política
            </h5>
            <button type="button" data-drawer="#drawer-new-policie"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <form action="{{ route('admin.policies.store') }}" class="flex flex-col gap-4"
                    enctype="multipart/form-data" method="POST" id="formAddCategorie">
                    @csrf
                    <div class="w-full">
                        <x-input type="text" name="name" placeholder="Ingresa el nombre de la política"
                            label="Nombre" value="{{ old('name') }}" />
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-medium text-zinc-900 dark:text-white">
                            Archivo
                        </label>
                        <div class="flex w-full items-center justify-center">
                            <label for="file-policie"
                                class="dark:hover:bg-bray-800 @error('path') is-invalid  @enderror flex w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-zinc-400 bg-zinc-50 p-4 hover:bg-zinc-100 dark:border-zinc-600 dark:bg-transparent dark:hover:border-zinc-500 dark:hover:bg-zinc-950">
                                <p>
                                    <span
                                        class="flex items-center justify-center gap-4 text-sm text-zinc-500 dark:text-zinc-400">
                                        <x-icon icon="cloud-upload" class="h-6 w-6" />
                                        Selecciona un archivo
                                    </span>
                                </p>
                                <input id="file-policie" type="file" class="hidden" name="file_path"
                                    accept="application/pdf" />
                            </label>
                        </div>
                        @error('image')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror

                        <!-- Contenedor para la vista previa del PDF -->
                        <div id="pdf-preview" class="mt-4 hidden h-80 w-full">
                            <iframe id="pdf-frame" class="h-full w-full" frameborder="0"></iframe>
                        </div>
                    </div>

                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Agregar política" icon="plus" typeButton="primary" />
                        <x-button type="button" data-drawer="#drawer-new-policie" class="close-drawer" text="Cancelar"
                            typeButton="secondary" />
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
