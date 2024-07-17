@extends('layouts.admin-template')

@section('title', 'Categorías')

@section('content')
    <div class="rounded-lg dark:border-gray-700 mt-4">
        <div class="dark:bg-black py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-zinc-900">
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Administrar categorías
            </h1>
            <p class="text-sm text-gray-400">
                Administra las categorías de tu tienda
            </p>
        </div>
        <div class="bg-gray-50 dark:bg-black p-4">
            <div class="mx-auto w-full">
                <div class="bg-white dark:bg-black relative shadow-md rounded-lg dark:border dark:border-zinc-900 ">
                    <div class="p-4 border-b dark:border-zinc-900 border-gray-200">
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
                                <x-input type="text" id="inputSearch" name="inputSearch" data-form="#formSearchCategorie"
                                    data-table="#tableCategorie" placeholder="Buscar" icon="search" />
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <x-button id="new-categorie" type="button" text="Nueva categoría" icon="add-circle"
                                typeClass="primary" />
                            <div class="flex items-center space-x-3 w-full md:w-auto">
                                <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                    class="w-full md:w-auto flex items-center justify-center py-2.5 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-zinc-500"
                                    type="button">
                                    <x-icon icon="filter" class="h-4 w-4 mr-2 text-gray-400" />
                                    Filtros
                                    <x-icon icon="arrow-down" class="-mr-1 ml-1.5 w-4 h-4 text-current" />
                                </button>
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
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bg-">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-zinc-900 dark:text-gray-300">
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
                                    @foreach ($categories as $category)
                                        <tr class="border-b dark:border-zinc-900">
                                            <th scope="row"
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <img src="{{ Storage::url($category->image) }}" alt="Product 1"
                                                    class="w-16 h-16 object-cover rounded-lg">
                                            </th>
                                            <td class="px-4 py-3">
                                                <span>{{ $category->name }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                @if ($category->subcategories->isNotEmpty())
                                                    <div class="flex flex-col gap-2">
                                                        @foreach ($category->subcategories as $subcategorie)
                                                            <div
                                                                class="relative flex items-center gap-2 px-3 py-2 rounded-2xl bg-blue-100 text-blue-900 dark:bg-blue-900 dark:text-blue-300 dark:bg-opacity-30 w-max">
                                                                {{ $subcategorie->name }}
                                                                <button class="dark:text-white text-gray-600 btnDropDown"
                                                                    type="button">
                                                                    <x-icon icon="more-hortizontal"
                                                                        class="w-5 h-5 text-current" />
                                                                </button>
                                                                <div
                                                                    class="hidden absolute top-10 z-30 w-44 bg-white divide-y divide-gray-100 shadow dark:bg-zinc-950 dark:divide-zinc-800 dropDownContent rounded-lg overflow-hidden">
                                                                    <ul
                                                                        class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                                                        <li>
                                                                            <button type="button"
                                                                                data-href="{{ route('admin.subcategories.edit', $subcategorie->id) }}"
                                                                                data-action="{{ route('admin.subcategories.update', $subcategorie->id) }}"
                                                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-zinc-900 dark:hover:text-white w-full text-start editCategorie">
                                                                                Editar
                                                                            </button>
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
                                                                                class="block text-start w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-zinc-900 dark:text-white buttonDelete">
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
                                                    <x-button type="button" class="editCategorie"
                                                        data-href="{{ route('admin.categories.edit', $category->id) }}"
                                                        data-action="{{ route('admin.categories.update', $category->id) }}"
                                                        text="Editar" icon="edit" typeButton="success" />
                                                    <form action="{{ route('admin.categories.destroy', $category->id) }}"
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

        <div id="drawer-new-categorie"
            class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[500px] dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-new-categorie">
            <h5 id="drawer-new-categorie-label"
                class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                Nueva categoría
            </h5>
            <button type="button" id="close-drawer-new-categorie"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <form action="{{ route('admin.categories.store') }}" class="flex flex-col gap-4"
                    enctype="multipart/form-data" method="POST" id="formAddCategorie">
                    @csrf
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <x-select label="Tipo de categoría" id="typeCategorie" name="typeCategorie"
                                value="principal" :options="['principal' => 'Principal', 'secundaria' => 'Secundaria']" selected="principal" />
                        </div>
                        <div class="flex-[2]">
                            <div class="w-full hidden" id="categorieParentSelect">
                                <x-select label="Categoría padre" id="categorieParent" name="categorie_id"
                                    :options="$categories->pluck('name', 'id')->toArray()" value="" selected="" />
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <x-input type="text" name="name" id="name_categorie"
                            placeholder="Ingresa el nombre de la categoría" label="Nombre" icon="bookmark"
                            value="{{ old('name') }}" />
                    </div>
                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Imagen
                        </label>
                        <div class="flex items-center justify-center w-full">
                            <label for="imageCategorie"
                                class="flex flex-col items-center justify-center w-full h-80 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-transparent hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-zinc-950 @error('image') is-invalid  @enderror">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <x-icon icon="cloud-upload" class="w-12 h-12 text-gray-400 dark:text-gray-500" />
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Clic para agregar </span> o desliza la imagen</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, WEBP</p>
                                </div>
                                <input id="imageCategorie" type="file" class="hidden" name="image" />
                                <img src="" alt="Preview Image" id="previewImage"
                                    class="w-56 h-64 object-cover hidden m-10">
                            </label>
                        </div>
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Agregar categoría" icon="add-circle" typeButton="primary" />
                        <x-button type="a" href="{{ route('admin.categories.index') }}" icon="cancel"
                            text="Cancelar" typeButton="danger" />
                    </div>
                </form>
            </div>
        </div>

        <div id="drawer-edit-categorie"
            class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[500px] dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-edit-categorie">
            <h5 id="drawer-new-categorie-label"
                class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                Editar categoría
            </h5>
            <button type="button" id="close-drawer-edit-categorie"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <form action="" class="flex flex-col gap-4" enctype="multipart/form-data" method="POST"
                    id="formEditCategorie">
                    @csrf
                    @method('PUT')
                    <div class="w-full">
                        <x-input type="text" name="name" id="edit_name_categorie"
                            placeholder="Ingresa el nombre de la categoría" label="Nombre" icon="bookmark"
                            value="" />
                    </div>
                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Imagen
                        </label>
                        <div class="flex items-center justify-center w-full">
                            <label for="edit-image-categorie"
                                class="flex flex-col items-center justify-center w-full h-80 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-transparent hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-zinc-950 @error('image') is-invalid  @enderror">
                                <div class="flex-col items-center justify-center pt-5 pb-6 hidden">
                                    <x-icon icon="cloud-upload" class="w-12 h-12 text-gray-400 dark:text-gray-500" />
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Clic para agregar </span> o desliza la imagen</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, WEBP</p>
                                </div>
                                <input id="edit-image-categorie" type="file" class="hidden" name="image" />
                                <img src="" alt="Preview Image" id="previewImageEdit"
                                    class="w-56 h-64 object-cover  m-10">
                            </label>
                        </div>
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Editar categoría" icon="edit" typeButton="success" />
                        <x-button type="a" href="{{ route('admin.categories.index') }}" icon="cancel"
                            text="Cancelar" typeButton="danger" />
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Comprueba si hay errores de validación en la sesión
            @if ($errors->any())
                $("#drawer-new-categorie").removeClass("translate-x-full");
                $("#overlay").removeClass("hidden");
            @endif
        });
    </script>
@endsection
