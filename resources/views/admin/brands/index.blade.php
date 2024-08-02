@extends('layouts.admin-template')

@section('title', 'Marcas')

@section('content')
    <div class="mt-4 rounded-lg dark:border-gray-700">
        <div class="flex flex-col items-start border-y px-4 py-4 shadow-sm dark:border-zinc-900 dark:bg-black">
            <h1 class="font-secondary text-2xl font-bold text-secondary dark:text-blue-400">
                Administrar marcas
            </h1>
            <p class="text-sm text-gray-400">
                Administra las marcas de los productos de tu tienda
            </p>
        </div>
        <div class="bg-gray-50 p-4 dark:bg-black">
            <div class="mx-auto w-full">
                <div
                    class="relative overflow-hidden rounded-lg bg-white shadow-md dark:border dark:border-zinc-900 dark:bg-black">
                    <div
                        class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-x-4 md:space-y-0">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" action="{{ route('admin.brands.search') }}" id="formSearchBrand">
                                @csrf
                                <x-input type="text" id="inputSearch" name="inputSearch" data-form="#formSearchBrand"
                                    data-table="#tableBrand" placeholder="Buscar" icon="search" />
                            </form>
                        </div>
                        <div
                            class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0">
                            <x-button type="button" class="open-drawer" data-drawer="#drawer-new-brand"
                                typeButton="primary" text="Agregar marca" icon="add-circle" />
                        </div>
                    </div>
                    <div>
                        <table class="w-full overflow-x-auto text-left text-sm text-gray-500 dark:text-gray-400">
                            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-zinc-900 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-4 py-3">#</th>
                                    <th scope="col" class="px-4 py-3">Nombre</th>
                                    <th scope="col" class="px-4 py-3">Descripción</th>
                                    <th scope="col" class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tableBrand">
                                @if ($brands->count() == 0)
                                    <tr>
                                        <td colspan="4"
                                            class="px-4 py-3 text-center font-medium text-gray-900 dark:text-white">
                                            No hay marcas
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($brands as $brand)
                                        <tr class="border-b dark:border-zinc-900">
                                            <th scope="row"
                                                class="whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td class="px-4 py-3">
                                                <span>{{ $brand->name }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span>
                                                    @if ($brand->description != null)
                                                        {{ $brand->description }}
                                                    @else
                                                        <span class="text-gray-500">No hay descripción</span>
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex gap-2">
                                                    <x-button type="button"
                                                        data-href="{{ route('admin.brands.edit', $brand->id) }}"
                                                        data-action="{{ route('admin.brands.update', $brand->id) }}"
                                                        typeButton="success" icon="edit" onlyIcon="true"
                                                        class="editBrand" />

                                                    <form action="{{ route('admin.brands.destroy', $brand->id) }}"
                                                        id="formDeleteCategorie" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button" data-form="formDeleteCategorie"
                                                            class="buttonDelete" onlyIcon="true" icon="delete"
                                                            typeButton="danger" />
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar la marca?"
            message="No podrás recuperar este registro" action="" />

        <div id="drawer-new-brand"
            class="drawer fixed right-0 top-0 z-40 h-screen w-[500px] translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-new-categorie">
            <h5 id="drawer-new-categorie-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-gray-500 dark:text-gray-400">
                Nueva marca
            </h5>
            <button type="button" data-drawer="#drawer-new-brand"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <form action="{{ route('admin.brands.store') }}" id="formAddBrand" method="POST">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <div>
                            <x-input type="text" name="name" id="name" label="Nombre"
                                placeholder="Ingresa el nombre de la marca" value="{{ old('name') }}" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <x-input type="textarea" name="description" id="description" label="Descripción"
                                placeholder="Ingresa la descripción de la marca" value="{{ old('description') }}" />
                        </div>
                    </div>
                    <div class="mt-4 flex justify-end gap-2">
                        <x-button type="submit" typeButton="primary" text="Agregar" icon="add-circle" />
                        <x-button type="button" data-drawer="#drawer-new-brand" class="close-drawer"
                            typeButton="secondary" text="Cancelar" />
                    </div>
                </form>
            </div>
        </div>

        <div id="drawer-edit-brand"
            class="drawer fixed right-0 top-0 z-40 h-screen w-[500px] translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-new-categorie">
            <h5 id="drawer-new-categorie-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-gray-500 dark:text-gray-400">
                Editar marca
            </h5>
            <button type="button" data-drawer="#drawer-edit-brand"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <form action="" id="formEditBrand" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col gap-4">
                        <div>
                            <x-input type="text" name="name" id="edit_name_brand" label="Nombre"
                                placeholder="Ingresa el nombre de la marca" value="{{ old('name') }}" required />
                        </div>
                        <div class="flex flex-col gap-2">
                            <x-input type="textarea" name="description" id="edit_description_brand" label="Descripción"
                                placeholder="Ingresa la descripción de la marca" value="{{ old('description') }}" />
                        </div>
                    </div>
                    <div class="mt-4 flex justify-end gap-2">
                        <x-button type="submit" typeButton="primary" text="Editar" icon="edit" />
                        <x-button type="button" data-drawer="#drawer-edit-brand" class="close-drawer"
                            typeButton="secondary" text="Cancelar" />
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->any())
                $("#drawer-new-brand").removeClass("translate-x-full");
                $("#overlay").removeClass("hidden");
            @endif
        });
    </script>
@endsection
