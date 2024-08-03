@extends('layouts.admin-template')

@section('title', 'Marcas')

@section('content')
    <div class="mt-4 rounded-lg">
        @include('layouts.__partials.admin.header-page', [
            'title' => '    Ofertas relámpago',
            'description' => 'Administra las ofertas relámpago que se muestran en la página de inicio.',
        ])
        <div class="bg-gray-50 p-4 dark:bg-black">
            <div class="mx-auto w-full">
                <div
                    class="relative overflow-hidden bg-white shadow-md dark:border dark:border-gray-900 dark:bg-black sm:rounded-lg">
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
                            <x-button type="button" data-drawer="#drawer-new-flash-offer" class="open-drawer"
                                typeButton="primary" text="Agregar oferta relámpago" icon="add-circle" />
                        </div>
                    </div>
                    <div>
                        <table class="w-full overflow-x-auto text-left text-sm text-gray-500 dark:text-gray-400">
                            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-zinc-900 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-4 py-3">#</th>
                                    <th scope="col" class="px-4 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Fecha de inicio
                                    </th>
                                    <th scope="col" class="px-4 py-3">Fecha de fin</th>
                                    <th scope="col" class="px-4 py-3">Visualización</th>
                                    <th scope="col" class="px-4 py-3">Estado</th>
                                    <th scope="col" class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($offers->count() == 0)
                                    <tr class="border-b dark:border-zinc-900">
                                        <td colspan="7"
                                            class="px-4 py-3 text-center font-medium text-gray-900 dark:text-white">
                                            No hay ofertas relámpago registradas
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($offers as $offer)
                                        <tr class="border-b dark:border-zinc-900">
                                            <th scope="row"
                                                class="whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td class="px-4 py-3">
                                                <a href="{{ route('admin.products.show', $offer->product->id) }}"
                                                    class="flex w-max items-center gap-2 rounded-lg p-2 hover:bg-gray-100 dark:hover:bg-zinc-950">
                                                    <img src="{{ Storage::url($offer->product->main_image) }}"
                                                        alt="" class="h-12 w-12 rounded-lg object-cover">
                                                    <div class="flex flex-col">
                                                        <span>{{ $offer->product->name }}</span>
                                                        <span
                                                            class="me-2 w-max rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                                                            ${{ $offer->product->offer_price }}
                                                        </span>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span>{{ $offer->start_date }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span>{{ $offer->end_date }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <form action="{{ route('admin.flash-offers.changeStatus') }}"
                                                    id="formChangeShow-{{ $offer->id }}" method="POST">
                                                    @csrf
                                                    <label class="cursor-pointe inline-flex items-center"
                                                        for="{{ $offer->id }}">
                                                        <input type="hidden" name="id" value="{{ $offer->id }}">
                                                        <input id="{{ $offer->id }}" type="checkbox" name="is_showing"
                                                            data-form="#formChangeShow-{{ $offer->id }}"
                                                            data-change="show" value=""
                                                            class="toggleShow peer sr-only"
                                                            {{ $offer->is_showing === 1 ? 'checked' : '' }}>
                                                        <div
                                                            class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800">
                                                        </div>
                                                        <span
                                                            class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                            Activo
                                                        </span>
                                                    </label>
                                                </form>
                                            </td>
                                            <td class="px-4 py-3">
                                                <form action="{{ route('admin.flash-offers.changeStatus') }}"
                                                    id="formChangeActive-{{ $offer->id }}" method="POST">
                                                    @csrf
                                                    <label class="cursor-pointe inline-flex items-center"
                                                        for="active-{{ $offer->id }}">
                                                        <input type="hidden" name="id" value="{{ $offer->id }}">
                                                        <input id="active-{{ $offer->id }}" type="checkbox"
                                                            name="is_active"
                                                            data-form="#formChangeActive-{{ $offer->id }}"
                                                            data-change="active" value=""
                                                            class="toggleShow peer sr-only"
                                                            {{ $offer->is_active === 1 ? 'checked' : '' }}>
                                                        <div
                                                            class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800">
                                                        </div>
                                                        <span
                                                            class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                            Activar
                                                        </span>
                                                    </label>
                                                </form>
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex gap-2">
                                                    <x-button type="button"
                                                        data-href="{{ route('admin.flash-offers.edit', $offer->id) }}"
                                                        data-action="{{ route('admin.flash-offers.update', $offer->id) }}"
                                                        typeButton="success" icon="edit" onlyIcon="true"
                                                        class="editFlashOffer" />

                                                    <form action="{{ route('admin.flash-offers.destroy', $offer->id) }}"
                                                        id="formDeleteCategorie" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button" data-form="formDeleteCategorie"
                                                            class="buttonDelete" onlyIcon="true" icon="delete"
                                                            typeButton="danger" data-modal-target="deleteModal" />
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

            <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar la oferta?"
                message="No podrás recuperar este registro" action="" />

            <div id="drawer-new-flash-offer"
                class="drawer fixed right-0 top-0 z-40 h-screen w-[500px] translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black"
                tabindex="-1" aria-labelledby="drawer-new-categorie">
                <h5 id="drawer-new-categorie-label"
                    class="mb-4 inline-flex items-center text-base font-semibold text-gray-500 dark:text-gray-400">
                    Nueva oferta relámpago
                </h5>
                <button type="button" data-drawer="#drawer-new-flash-offer"
                    class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
                <div>
                    <form action="{{ route('admin.flash-offers.store') }}" method="POST">
                        @csrf
                        <div class="flex flex-col gap-4">
                            <div class="flex-[2]">
                                <label
                                    class="mb-2 block text-sm font-medium text-gray-900 after:ml-0.5 after:text-red-500 after:content-['*'] dark:text-white">
                                    Producto
                                </label>
                                <input type="hidden" name="product_id" id="product_id"
                                    value="{{ isset(session('product')->id) ? session('product')->id : old('product_id') }}">
                                <div class="relative">
                                    <div
                                        class="selected @error('product_id') is-invalid @enderror flex h-11 w-full items-center justify-between rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm dark:border-zinc-800 dark:bg-zinc-950 dark:text-white">
                                        <span class="itemSelected flex items-center gap-2">
                                            @if ($products->count() > 0)
                                                @php

                                                    $selectedProduct = $products->firstWhere(
                                                        'id',
                                                        isset(session('product')->id)
                                                            ? session('product')->id
                                                            : old('product_id'),
                                                    );
                                                @endphp
                                                @if ($selectedProduct)
                                                    <img src="{{ Storage::url($selectedProduct->main_image) }}"
                                                        alt="Imagen principal de {{ $selectedProduct->name }}"
                                                        class="h-8 w-8 rounded-lg object-cover">
                                                    <span>{{ $selectedProduct->name }}</span>
                                                    <span
                                                        class="rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                                        ${{ $selectedProduct->price }}
                                                    </span>
                                                @else
                                                    Selecciona un producto
                                                @endif
                                            @else
                                                Ingresa un nuevo
                                            @endif
                                        </span>
                                        <x-icon icon="arrow-down" class="h-5 w-5 text-gray-500 dark:text-white" />
                                    </div>
                                    <ul
                                        class="selectOptions {{ $products->count() > 6 ? 'h-60' : '' }} absolute z-10 mt-2 hidden w-full overflow-auto rounded-lg border border-gray-200 bg-white p-2 shadow-lg dark:border-zinc-900 dark:bg-zinc-950">
                                        @if ($products->count() > 0)
                                            @foreach ($products as $product)
                                                <li class="itemOption flex items-center gap-2 rounded-lg px-4 py-2 text-sm text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-zinc-900"
                                                    data-value="{{ $product->id }}" data-input="#product_id">
                                                    <img src="{{ Storage::url($product->main_image) }}"
                                                        alt="Imagen principal de {{ $product->name }}"
                                                        class="h-8 w-8 rounded-lg object-cover">
                                                    <span>{{ $product->name }}</span>
                                                    <span
                                                        class="rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                                        ${{ $product->price }}
                                                    </span>
                                                </li>
                                            @endforeach
                                        @else
                                            <li class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400">
                                                No hay productos disponibles
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                @error('categorie_id')
                                    <span class="text-subcategorie_idsm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex-1">
                                <x-input label="Precio de la oferta" type="number" name="offer_price" id="offer_price"
                                    step="0.1" min="0.1" placeholder="Precio de la oferta" icon="dollar" />
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex gap-2">
                                <div class="flex-1">
                                    <x-input label="Fecha de inicio" type="date" name="start_date" id="start_date"
                                        placeholder="Fecha de inicio" icon="calendar" />
                                </div>
                                <div class="flex-1">
                                    <x-input label="Fecha de fin" type="date" name="end_date" id="end_date"
                                        placeholder="Fecha de fin" icon="calendar" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex gap-4">
                                <label class="inline-flex cursor-pointer items-center">
                                    <input type="checkbox" value="is_showing" class="peer sr-only" name="is_showing">
                                    <div
                                        class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800">
                                    </div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Mostrar en la página principal
                                    </span>
                                </label>
                                <label class="inline-flex cursor-pointer items-center">
                                    <input type="checkbox" value="is_active" class="peer sr-only" name="is_active">
                                    <div
                                        class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800">
                                    </div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Activo
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-center gap-2">
                            <x-button type="submit" text="Agregar oferta" typeButton="primary" icon="add-circle" />
                            <x-button type="button" text="Cancelar" typeButton="secondary" class="close-drawer"
                                data-drawer="#drawer-new-flash-offer" />
                        </div>
                    </form>
                </div>
            </div>

            <div id="drawer-edit-flash-offer"
                class="drawer fixed right-0 top-0 z-40 h-screen w-[500px] translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black"
                tabindex="-1" aria-labelledby="drawer-new-categorie">
                <h5 id="drawer-new-categorie-label"
                    class="mb-4 inline-flex items-center text-base font-semibold text-gray-500 dark:text-gray-400">
                    Editar oferta relámpago
                </h5>
                <button type="button" data-drawer="#drawer-edit-flash-offer"
                    class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
                <div>
                    <form action="" method="POST" id="formEditFlashOffer">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col gap-4">
                            <div class="flex-[2]">
                                <x-input type="hidden" name="product_id" id="product_id" readonly />
                                <x-input label="Producto" type="text" name="product_name" id="product_name"
                                    readonly />
                            </div>
                            <div class="flex-1">
                                <x-input label="Precio de la oferta" type="number" name="offer_price"
                                    id="offer_price_edit" step="0.1" min="0.1"
                                    placeholder="Precio de la oferta" icon="dollar" />
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex gap-2">
                                <div class="flex-1">
                                    <x-input label="Fecha de inicio" type="date" name="start_date"
                                        id="start_date_edit" placeholder="Fecha de inicio" icon="calendar" />
                                </div>
                                <div class="flex-1">
                                    <x-input label="Fecha de fin" type="date" name="end_date" id="end_date_edit"
                                        placeholder="Fecha de fin" icon="calendar" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex gap-4">
                                <label class="inline-flex cursor-pointer items-center">
                                    <input type="checkbox" value="is_showing" class="peer sr-only" name="is_showing"
                                        id="is_showing_edit">
                                    <div
                                        class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800">
                                    </div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Mostrar en la página principal
                                    </span>
                                </label>
                                <label class="inline-flex cursor-pointer items-center">
                                    <input type="checkbox" value="is_active" class="peer sr-only" name="is_active"
                                        id="is_active_edit">
                                    <div
                                        class="peer relative h-6 w-11 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800">
                                    </div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Activo
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-center gap-2">
                            <x-button type="submit" text="Editar oferta" typeButton="primary" icon="add-circle" />
                            <x-button type="button" text="Cancelar" typeButton="secondary" class="close-drawer"
                                data-drawer="#drawer-edit-flash-offer" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($errors->any() || isset(session('product')->id))
                $("#drawer-new-flash-offer").removeClass("translate-x-full");
                $("#overlay").removeClass("hidden");
            @endif
        });
    </script>
@endsection
