@extends('layouts.admin-template')
@section('title', 'Marcas')
@section('content')
    <div>
        @include('layouts.__partials.admin.header-page', [
            'title' => 'Marcas',
            'description' => 'Administrar marcas registradas.',
        ])
        <div class="bg-zinc-50 dark:bg-black">
            <div class="mx-auto w-full">
                <div class="bg-e relative overflow-hidden bg-white dark:bg-black">
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
                                typeButton="primary" text="Agregar marca" icon="plus" />
                        </div>
                    </div>
                    <div class="mx-4">
                        <x-table>
                            <x-slot name="thead">
                                <x-tr>
                                    <x-th>#</x-th>
                                    <x-th>Logo</x-th>
                                    <x-th>Banner</x-th>
                                    <x-th>Nombre</x-th>
                                    <x-th>Descripción</x-th>
                                    <x-th last="true">Acciones</x-th>
                                </x-tr>
                            </x-slot>
                            <x-slot name="tbody" id="tableBrand">
                                @if ($brands->count() == 0)
                                    <x-tr>
                                        <x-td>
                                            No hay marcas
                                        </x-td>
                                    </x-tr>
                                @else
                                    @foreach ($brands as $brand)
                                        <x-tr section="body">
                                            <x-td>
                                                {{ $loop->iteration }}
                                            </x-td>
                                            <x-td>
                                                <img src="{{ Storage::url($brand->logo) }}" alt="Logo {{ $brand->name }}"
                                                    class="min-w-14 h-14 w-14 rounded-lg object-cover">
                                            </x-td>
                                            <x-td>
                                                <img src="{{ Storage::url($brand->banner) }}"
                                                    alt="Banner {{ $brand->name }}"
                                                    class="min-w-36 h-14 w-36 rounded-lg object-cover">
                                            </x-td>
                                            <x-td>
                                                <span class="text-nowrap">{{ $brand->name }}</span>
                                            </x-td>
                                            <x-td>
                                                <span class="text-xs sm:text-sm">
                                                    @if ($brand->description != null)
                                                        {{ $brand->description }}
                                                    @else
                                                        No hay descripción
                                                    @endif
                                                </span>
                                            </x-td>
                                            <x-td>
                                                <div class="flex gap-2">
                                                    <x-button type="button"
                                                        data-href="{{ route('admin.brands.edit', $brand->id) }}"
                                                        data-action="{{ route('admin.brands.update', $brand->id) }}"
                                                        typeButton="success" icon="edit" onlyIcon="true"
                                                        class="editBrand" />
                                                    <form action="{{ route('admin.brands.destroy', $brand->id) }}"
                                                        id="formDeleteBrand-{{ $brand->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button"
                                                            data-form="formDeleteBrand-{{ $brand->id }}"
                                                            class="buttonDelete" onlyIcon="true" icon="delete"
                                                            typeButton="danger" data-modal-target="deleteModal"
                                                            data-modal-toggle="deleteModal" />
                                                    </form>
                                                    <x-button type="a" typeButton="secondary"
                                                        href="{{ $brand->website }}" target="_blank" icon="link"
                                                        onlyIcon="true" />
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

        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar la marca?"
            message="No podrás recuperar este registro" action="" />

        <!-- Drawer new brand -->
        <div id="drawer-new-brand"
            class="drawer fixed right-0 top-0 z-[70] h-screen w-full translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black sm:w-[500px]"
            tabindex="-1" aria-labelledby="drawer-new-categorie">
            <h5 id="drawer-new-categorie-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-zinc-500 dark:text-zinc-400">
                Nueva marca
            </h5>
            <button type="button" data-drawer="#drawer-new-brand"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <form action="{{ route('admin.brands.store') }}" id="formAddBrand" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <div>
                            <x-input type="text" name="name" label="Nombre"
                                placeholder="Ingresa el nombre de la marca" value="{{ old('name') }}" required />
                        </div>
                        <div class="flex flex-col gap-4 sm:flex-row">
                            <div class="flex-1">
                                <p class="mb-2 text-sm font-medium text-zinc-500 dark:text-zinc-300">Logo</p>
                                <label for="logo"
                                    class="flex cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-zinc-400 dark:border-zinc-800 dark:hover:border-zinc-700 dark:hover:bg-zinc-950">
                                    <div class="flex flex-col items-center justify-center p-8 text-center">
                                        <x-icon icon="cloud-plus" class="h-10 w-10 text-zinc-400 dark:text-zinc-500" />
                                        <p class="mt-2 text-xs text-zinc-500 dark:text-zinc-400">
                                            PNG, JPG, WEBP
                                        </p>
                                    </div>
                                    <img src="{{ asset('images/photo.jpg') }}" alt="Preview logo" id="preview-logo"
                                        class="m-4 hidden h-28 w-28 rounded-lg">
                                    <input type="file" class="hidden" name="logo" id="logo"
                                        accept=".png, .jpg, .webp">
                                </label>
                            </div>
                            <div class="flex-[2]">
                                <p class="mb-2 text-sm font-medium text-zinc-500 dark:text-zinc-300">
                                    Banner
                                </p>
                                <label for="banner"
                                    class="flex cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-zinc-400 p-4 dark:border-zinc-800 dark:hover:border-zinc-700 dark:hover:bg-zinc-950">
                                    <div class="flex flex-col items-center justify-center p-4 text-center">
                                        <x-icon icon="cloud-plus" class="h-10 w-10 text-zinc-400 dark:text-zinc-500" />
                                        <p class="mt-2 text-xs text-zinc-500 dark:text-zinc-400">
                                            PNG, JPG, WEBP
                                        </p>
                                    </div>
                                    <img src="{{ asset('images/photo.jpg') }}" alt="Preview banner" id="preview-banner"
                                        class="m-4 hidden h-28 w-full rounded-lg object-cover">
                                    <input type="file" class="hidden" name="banner" id="banner"
                                        accept=".png, .jpg, .webp">
                                </label>
                            </div>
                        </div>
                        <div>
                            <x-input type="text" name="website" label="Website" icon="link"
                                placeholder="Ingresa la URL del sitio web" value="{{ old('website') }}" required />
                        </div>
                        <div>
                            <x-input type="textarea" name="description" label="Descripción"
                                placeholder="Ingresa la descripción de la marca" value="{{ old('description') }}" />
                        </div>
                    </div>
                    <div class="mt-4 flex justify-center gap-2">
                        <x-button type="submit" typeButton="primary" text="Agregar" icon="plus" />
                        <x-button type="button" data-drawer="#drawer-new-brand" class="close-drawer"
                            typeButton="secondary" text="Cancelar" />
                    </div>
                </form>
            </div>
        </div>
        <!-- End Drawer new brand -->

        <!-- Drawer edit brand -->
        <div id="drawer-edit-brand"
            class="drawer fixed right-0 top-0 z-[70] h-screen w-full translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black sm:w-[500px]"
            tabindex="-1" aria-labelledby="drawer-new-categorie">
            <h5 id="drawer-new-categorie-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-zinc-500 dark:text-zinc-400">
                Editar marca
            </h5>
            <button type="button" data-drawer="#drawer-edit-brand"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <form action="" id="formEditBrand" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col gap-4">
                        <div>
                            <x-input type="text" name="name" label="Nombre" id="name"
                                placeholder="Ingresa el nombre de la marca" value="{{ old('name') }}" required />
                        </div>
                        <div class="flex flex-col gap-4 sm:flex-row">
                            <div class="flex-1">
                                <p class="mb-2 text-sm font-medium text-zinc-500 dark:text-zinc-300">Logo</p>
                                <label for="logo-edit"
                                    class="flex cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-zinc-400 dark:border-zinc-800 dark:hover:border-zinc-700 dark:hover:bg-zinc-950">
                                    <div class="hidden flex-col items-center justify-center p-8 text-center">
                                        <x-icon icon="cloud-plus" class="h-10 w-10 text-zinc-400 dark:text-zinc-500" />
                                        <p class="mt-2 text-xs text-zinc-500 dark:text-zinc-400">
                                            PNG, JPG, WEBP
                                        </p>
                                    </div>
                                    <img src="{{ asset('images/photo.jpg') }}" alt="Preview logo" id="preview-logo-edit"
                                        class="m-4 h-28 w-28 rounded-lg object-cover">
                                    <input type="file" class="hidden" name="logo" id="logo-edit"
                                        accept=".png, .jpg, .webp">
                                </label>
                            </div>
                            <div class="flex-[2]">
                                <p class="mb-2 text-sm font-medium text-zinc-500 dark:text-zinc-300">
                                    Banner
                                </p>
                                <label for="banner-edit"
                                    class="flex cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-zinc-400 p-4 dark:border-zinc-800 dark:hover:border-zinc-700 dark:hover:bg-zinc-950">
                                    <div class="hidden flex-col items-center justify-center p-4 text-center">
                                        <x-icon icon="cloud-plus" class="h-10 w-10 text-zinc-400 dark:text-zinc-500" />
                                        <p class="mt-2 text-xs text-zinc-500 dark:text-zinc-400">
                                            PNG, JPG, WEBP
                                        </p>
                                    </div>
                                    <img src="{{ asset('images/photo.jpg') }}" alt="Preview banner"
                                        id="preview-banner-edit" class="m-4 h-28 w-full rounded-lg object-cover">
                                    <input type="file" class="hidden" name="banner" id="banner-edit"
                                        accept=".png, .jpg, .webp">
                                </label>
                            </div>
                        </div>
                        <div>
                            <x-input type="text" name="website" label="Website" icon="link" id="website"
                                placeholder="Ingresa la URL del sitio web" value="{{ old('website') }}" required />
                        </div>
                        <div>
                            <x-input type="textarea" name="description" label="Descripción" id="description"
                                placeholder="Ingresa la descripción de la marca" value="{{ old('description') }}" />
                        </div>
                    </div>
                    <div class="mt-4 flex justify-center gap-2">
                        <x-button type="submit" typeButton="primary" text="Editar" icon="edit" />
                        <x-button type="button" data-drawer="#drawer-edit-brand" class="close-drawer"
                            typeButton="secondary" text="Cancelar" />
                    </div>
                </form>
            </div>
        </div>
        <!--  End Drawer edit brand -->

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
