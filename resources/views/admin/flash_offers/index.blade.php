@extends('layouts.admin-template')

@section('title', 'Marcas')

@section('content')
    <div class="rounded-lg mt-4">
        <div class="dark:bg-black py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-zinc-900">
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Administrar ofertas relámpago
            </h1>
            <p class="text-sm text-gray-400">
                Desde aquí puedes administrar ofertas relámpago que se muestran en la página de inicio
            </p>
        </div>
        <div class="bg-gray-50 dark:bg-black p-4">
            <div class="mx-auto w-full">
                <div
                    class="bg-white dark:bg-black dark:border dark:border-gray-900 relative shadow-md sm:rounded-lg overflow-hidden">
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
                            <x-button type="button" id="new-flash-offer" typeButton="primary"
                                text="Agregar oferta relámpago" icon="add-circle" />
                        </div>
                    </div>
                    <div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-x-auto">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-zinc-900 dark:text-gray-300">
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
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td class="px-4 py-3">
                                                <a href="{{ route('admin.products.show', $offer->product->id) }}"
                                                    class="flex gap-2 items-center dark:hover:bg-zinc-950 hover:bg-gray-100 p-2 rounded-lg w-max">
                                                    <img src="{{ Storage::url($offer->product->main_image) }}"
                                                        alt="" class="w-12 h-12 rounded-lg object-cover">
                                                    <div class="flex flex-col">
                                                        <span>{{ $offer->product->name }}</span>
                                                        <span
                                                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300 w-max">
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
                                                    <label class="inline-flex items-center cursor-pointe"
                                                        for="{{ $offer->id }}">
                                                        <input type="hidden" name="id" value="{{ $offer->id }}">
                                                        <input id="{{ $offer->id }}" type="checkbox" name="is_showing"
                                                            data-form="#formChangeShow-{{ $offer->id }}"
                                                            data-change="show" value=""
                                                            class="sr-only peer toggleShow"
                                                            {{ $offer->is_showing === 1 ? 'checked' : '' }}>
                                                        <div
                                                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
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
                                                    <label class="inline-flex items-center cursor-pointe"
                                                        for="active-{{ $offer->id }}">
                                                        <input type="hidden" name="id" value="{{ $offer->id }}">
                                                        <input id="active-{{ $offer->id }}" type="checkbox"
                                                            name="is_active"
                                                            data-form="#formChangeActive-{{ $offer->id }}"
                                                            data-change="active" value=""
                                                            class="sr-only peer toggleShow"
                                                            {{ $offer->is_active === 1 ? 'checked' : '' }}>
                                                        <div
                                                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
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
                class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[500px] dark:bg-black"
                tabindex="-1" aria-labelledby="drawer-new-categorie">
                <h5 id="drawer-new-categorie-label"
                    class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                    Nueva oferta relámpago
                </h5>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-zinc-900 dark:hover:text-white close-drawer-offer">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
                <div>
                    <form action="{{ route('admin.flash-offers.store') }}" method="POST">
                        @csrf
                        <div class="flex gap-4 flex-col">
                            <div class="flex-[2]">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white after:content-['*'] after:ml-0.5 after:text-red-500">
                                    Producto
                                </label>
                                <input type="hidden" name="product_id" id="product_id"
                                    value="{{ isset(session('product')->id) ? session('product')->id : old('product_id') }}">
                                <div class="relative">
                                    <div
                                        class="selected border border-gray-300 bg-gray-50 dark:border-zinc-800 rounded py-2.5 dark:bg-zinc-950 w-full px-4 dark:text-white text-sm flex items-center justify-between @error('product_id') is-invalid @enderror h-11">
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
                                                        class="w-8 h-8 object-cover rounded-lg">
                                                    <span>{{ $selectedProduct->name }}</span>
                                                    <span
                                                        class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                                        ${{ $selectedProduct->price }}
                                                    </span>
                                                @else
                                                    Selecciona un producto
                                                @endif
                                            @else
                                                Ingresa un nuevo
                                            @endif
                                        </span>
                                        <x-icon icon="arrow-down" class="w-5 h-5 dark:text-white text-gray-500" />
                                    </div>
                                    <ul
                                        class="absolute z-10 w-full mt-2 p-2 bg-white border border-gray-200 rounded shadow-lg dark:bg-zinc-950 dark:border-zinc-900 selectOptions hidden overflow-auto {{ $products->count() > 6 ? 'h-60' : '' }}">
                                        @if ($products->count() > 0)
                                            @foreach ($products as $product)
                                                <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-900 flex items-center gap-2 rounded"
                                                    data-value="{{ $product->id }}" data-input="#product_id">
                                                    <img src="{{ Storage::url($product->main_image) }}"
                                                        alt="Imagen principal de {{ $product->name }}"
                                                        class="w-8 h-8 object-cover rounded-lg">
                                                    <span>{{ $product->name }}</span>
                                                    <span
                                                        class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                                        ${{ $product->price }}
                                                    </span>
                                                </li>
                                            @endforeach
                                        @else
                                            <li class="text-gray-500 dark:text-gray-400 text-sm px-4 py-2">
                                                No hay productos disponibles
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                @error('categorie_id')
                                    <span class="text-red-500 text-subcategorie_idsm">{{ $message }}</span>
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
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="is_showing" class="sr-only peer" name="is_showing">
                                    <div
                                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                    </div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Mostrar en la página principal
                                    </span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="is_active" class="sr-only peer" name="is_active">
                                    <div
                                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                    </div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Activo
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-center gap-2">
                            <x-button type="submit" text="Agregar oferta" typeButton="primary" icon="add-circle" />
                            <x-button type="button" text="Cancelar" typeButton="secondary"
                                class="close-drawer-offer" />
                        </div>
                    </form>
                </div>
            </div>

            <div id="drawer-edit-flash-offer"
                class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[500px] dark:bg-black"
                tabindex="-1" aria-labelledby="drawer-new-categorie">
                <h5 id="drawer-new-categorie-label"
                    class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                    Editar oferta relámpago
                </h5>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-zinc-900 dark:hover:text-white close-drawer-offer">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
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
                        <div class="flex gap-4 flex-col">
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
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="is_showing" class="sr-only peer" name="is_showing"
                                        id="is_showing_edit">
                                    <div
                                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                    </div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Mostrar en la página principal
                                    </span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="is_active" class="sr-only peer" name="is_active"
                                        id="is_active_edit">
                                    <div
                                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                    </div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Activo
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-center gap-2">
                            <x-button type="submit" text="Editar oferta" typeButton="primary" icon="add-circle" />
                            <x-button type="button" text="Cancelar" typeButton="secondary"
                                class="close-drawer-offer" />
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
