@extends('layouts.admin-template')

@section('title', 'Categorías')

@section('content')
    <div class="mt-4 rounded-lg dark:border-gray-700">
        <div class="flex flex-col items-start border-y px-4 py-4 shadow-sm dark:border-zinc-900 dark:bg-black">
            <h1 class="font-secondary text-2xl font-bold text-secondary dark:text-blue-400">
                Administrar categorías
            </h1>
            <p class="text-sm text-gray-400">
                Administra las categorías de tu tienda
            </p>
        </div>
        <div class="bg-gray-50 p-4 dark:bg-black">
            <div class="mx-auto w-full">
                <div class="relative rounded-lg bg-white shadow-md dark:border dark:border-zinc-900 dark:bg-black">
                    <div class="border-b border-gray-200 p-4 dark:border-zinc-900">
                        <h2 class="text-base font-semibold text-gray-700 dark:text-gray-200">
                            Lista de categorías
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
                            <x-button data-drawer="#drawer-new-categorie" class="open-drawer" type="button"
                                text="Nueva categoría" icon="add-circle" typeButton="primary" />
                            <div class="flex w-full items-center space-x-3 md:w-auto">
                                <x-button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" type="button"
                                    typeButton="secondary" icon="filter" text="Filtros" />
                                <div id="filterDropdown"
                                    class="z-10 hidden w-48 rounded-lg bg-white p-3 shadow dark:bg-zinc-950">
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
                                                    class="text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 h-4 w-4 rounded border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-white dark:ring-offset-gray-700">
                                                <label for="no_subcategories"
                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                                    Sin subcategorías
                                                </label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="has_subcategories" name="filter[]" type="checkbox"
                                                    value="has_subcategories"
                                                    class="text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 h-4 w-4 rounded border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-white dark:ring-offset-gray-700">
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
                        <table class="bg- w-full text-left text-sm text-gray-500 dark:text-gray-400">
                            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-zinc-900 dark:text-gray-300">
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
                                                class="whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white">
                                                <img src="{{ Storage::url($category->image) }}" alt="Product 1"
                                                    class="h-16 w-16 rounded-lg object-cover">
                                            </th>
                                            <td class="px-4 py-3">
                                                <span>{{ $category->name }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                @if ($category->subcategories->isNotEmpty())
                                                    <div class="flex flex-col gap-2">
                                                        @foreach ($category->subcategories as $subcategorie)
                                                            <div
                                                                class="relative flex w-max items-center gap-2 rounded-2xl bg-blue-100 px-3 py-2 text-blue-900 dark:bg-blue-900 dark:bg-opacity-30 dark:text-blue-300">
                                                                {{ $subcategorie->name }}
                                                                <button class="btnDropDown text-gray-600 dark:text-white"
                                                                    type="button">
                                                                    <x-icon icon="more-hortizontal"
                                                                        class="h-5 w-5 text-current" />
                                                                </button>
                                                                <div
                                                                    class="dropDownContent absolute top-10 z-30 hidden w-44 overflow-hidden rounded-lg bg-white shadow dark:bg-zinc-950">
                                                                    <ul
                                                                        class="p-2 text-sm text-gray-700 dark:text-gray-200">
                                                                        <li>
                                                                            <button type="button"
                                                                                data-href="{{ route('admin.subcategories.edit', $subcategorie->id) }}"
                                                                                data-action="{{ route('admin.subcategories.update', $subcategorie->id) }}"
                                                                                class="editCategorie flex w-full items-center gap-2 rounded-lg px-4 py-2 text-start hover:bg-gray-100 dark:hover:bg-zinc-900 dark:hover:text-white">
                                                                                <x-icon icon="edit"
                                                                                    class="h-4 w-4 text-current" />
                                                                                Editar
                                                                            </button>
                                                                        </li>
                                                                        <li>
                                                                            <form
                                                                                action="{{ route('admin.subcategories.destroy', $subcategorie->id) }}"
                                                                                method="POST" id="formDeleteSubCategorie">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="button"
                                                                                    data-form="formDeleteSubCategorie"
                                                                                    class="buttonDelete flex w-full items-center gap-2 rounded-lg px-4 py-2 text-start hover:bg-gray-100 dark:text-white dark:hover:bg-zinc-900">
                                                                                    <x-icon icon="delete"
                                                                                        class="h-4 w-4 text-current" />
                                                                                    Eliminar
                                                                                </button>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
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
                                                    <x-button type="button" class="editCategorie" onlyIcon="true"
                                                        data-href="{{ route('admin.categories.edit', $category->id) }}"
                                                        data-action="{{ route('admin.categories.update', $category->id) }}"
                                                        icon="edit" typeButton="success" />
                                                    <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                        id="formDeleteCategorie" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button" data-form="formDeleteCategorie"
                                                            onlyIcon="true" icon="delete" typeButton="danger"
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
            class="drawer fixed right-0 top-0 z-40 h-screen w-[500px] translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-new-categorie">
            <h5 id="drawer-new-categorie-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-gray-500 dark:text-gray-400">
                Nueva categoría
            </h5>
            <button type="button" data-drawer="#drawer-new-categorie"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
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
                            <div class="hidden w-full" id="categorieParentSelect">
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
                        <label for="image" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                            Imagen
                        </label>
                        <div class="flex w-full items-center justify-center">
                            <label for="imageCategorie"
                                class="dark:hover:bg-bray-800 @error('image') is-invalid  @enderror flex h-80 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 dark:border-gray-600 dark:bg-transparent dark:hover:border-gray-500 dark:hover:bg-zinc-950">
                                <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                    <x-icon icon="cloud-upload" class="h-12 w-12 text-gray-400 dark:text-gray-500" />
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Clic para agregar </span> o desliza la imagen</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, WEBP</p>
                                </div>
                                <input id="imageCategorie" type="file" class="hidden" name="image" />
                                <img src="" alt="Preview Image" id="previewImage"
                                    class="m-10 hidden h-64 w-56 object-cover">
                            </label>
                        </div>
                        @error('image')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Agregar categoría" icon="add-circle" typeButton="primary" />
                        <x-button type="button" data-drawer="#drawer-new-categorie" class="close-drawer"
                            text="Cancelar" typeButton="secondary" />
                    </div>
                </form>
            </div>
        </div>

        <div id="drawer-edit-categorie"
            class="drawer fixed right-0 top-0 z-40 h-screen w-[500px] translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-edit-categorie">
            <h5 id="drawer-new-categorie-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-gray-500 dark:text-gray-400">
                Editar categoría
            </h5>
            <button type="button" data-drawer="#drawer-edit-categorie"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
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
                            placeholder="Ingresa el nombre de la categoría" label="Nombre" icon="bookmark" />
                    </div>
                    <div>
                        <label for="image" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                            Imagen
                        </label>
                        <div class="flex w-full items-center justify-center">
                            <label for="edit-image-categorie"
                                class="dark:hover:bg-bray-800 @error('image') is-invalid  @enderror flex h-80 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 dark:border-gray-600 dark:bg-transparent dark:hover:border-gray-500 dark:hover:bg-zinc-950">
                                <div class="hidden flex-col items-center justify-center pb-6 pt-5">
                                    <x-icon icon="cloud-upload" class="h-12 w-12 text-gray-400 dark:text-gray-500" />
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Clic para agregar </span> o desliza la imagen</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, WEBP</p>
                                </div>
                                <input id="edit-image-categorie" type="file" class="hidden" name="image" />
                                <img src="" alt="Preview Image" id="previewImageEdit"
                                    class="m-10 h-64 w-56 object-cover">
                            </label>
                        </div>
                        @error('image')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Editar categoría" icon="edit" typeButton="primary" />
                        <x-button type="button" class="close-drawer" data-drawer="#drawer-edit-categorie"
                            text="Cancelar" typeButton="secondary" />
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
