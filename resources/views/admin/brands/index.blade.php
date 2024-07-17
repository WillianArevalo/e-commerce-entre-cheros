@extends('layouts.admin-template')

@section('title', 'Marcas')

@section('content')
    <div class=" rounded-lg dark:border-gray-700 mt-4">
        <div class="dark:bg-black py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-zinc-900">
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Administrar marcas
            </h1>
            <p class="text-sm text-gray-400">
                Administra las marcas de los productos de tu tienda
            </p>
        </div>
        <div class="bg-gray-50 dark:bg-black p-4">
            <div class="mx-auto w-full">
                <div
                    class="bg-white dark:bg-black dark:border dark:border-zinc-900 relative shadow-md rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" action="{{ route('admin.brands.search') }}" id="formSearchBrand">
                                @csrf
                                <x-input type="text" id="inputSearch" name="inputSearch" data-form="#formSearchBrand"
                                    data-table="#tableBrand" placeholder="Buscar" icon="search" />
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <x-button type="button" id="new-brand" typeButton="primary" text="Agregar marca"
                                icon="add-circle" />
                        </div>
                    </div>
                    <div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-x-auto">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-zinc-900 dark:text-gray-300">
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
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                                                        typeButton="success" icon="edit" text="Editar"
                                                        class="editBrand" />

                                                    <form action="{{ route('admin.brands.destroy', $brand->id) }}"
                                                        id="formDeleteCategorie" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button" data-form="formDeleteCategorie"
                                                            class="buttonDelete" text="Eliminar" icon="delete"
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
            class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[500px] dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-new-categorie">
            <h5 id="drawer-new-categorie-label"
                class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                Nueva marca
            </h5>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-zinc-900 dark:hover:text-white close-drawer-brand">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
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
                    <div class="flex justify-end gap-2 mt-4">
                        <x-button type="submit" typeButton="primary" text="Agregar" icon="add-circle" />
                        <x-button type="button" data-modal-toggle="addBrandModal" typeButton="danger"
                            text="Cancelar" />
                    </div>
                </form>
            </div>
        </div>

        <div id="drawer-edit-brand"
            class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[500px] dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-new-categorie">
            <h5 id="drawer-new-categorie-label"
                class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                Editar marca
            </h5>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-zinc-900 dark:hover:text-white close-drawer-brand">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
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
                    <div class="flex justify-end gap-2 mt-4">
                        <x-button type="submit" typeButton="success" text="Editar" icon="edit" />
                        <x-button type="button" data-modal-toggle="addBrandModal" typeButton="danger"
                            text="Cancelar" />
                    </div>
                </form>
            </div>
        </div>

        <div id="editBrandModal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full bg-black bg-opacity-40">
            <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Editar marca
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white closeModalEdit"
                            data-modal-toggle="editBrandModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('admin.brands.update', '') }}" id="formUpdateBrand" method="POST"
                        data-base-action="{{ route('admin.brands.update', '') }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="brand_id">
                        <div class="flex flex-col gap-4">
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                <input type="text" name="name" id="name_edit"
                                    class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-4 focus:ring-blue-200 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-900 dark:focus:border-blue-500"
                                    placeholder="Escribe el nombre de la marca">
                                <span class="text-red-500 text-sm hidden"></span>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                                <textarea id="description_edit" rows="4" name="description"
                                    class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-4 focus:ring-blue-200 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-900 dark:focus:border-blue-500"
                                    placeholder="Escribe la descripción de la marca"></textarea>
                                <span class="text-red-500 text-sm hidden"></span>
                            </div>
                        </div>
                        <div class="flex justify-end gap-2 mt-4">
                            <x-button type="button" id="editBrandButton" typeButton="success" text="Editar"
                                icon="edit" />
                            <x-button type="button" class="closeModalEdit" typeButton="danger" text="Cancelar" />
                        </div>
                    </form>
                </div>
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
