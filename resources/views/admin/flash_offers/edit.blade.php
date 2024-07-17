@extends('layouts.admin-template')

@section('title', 'Agregar oferta relámpago')

@section('content')
    <div class="mt-4 mb-4 bg-black">
        <div class="dark:bg-black py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-zinc-900">
            <a href="{{ route('admin.products.index') }}"
                class="text-gray-500 dark:text-gray-400 flex items-center justify-center gap-1 text-sm hover:underline hover:text-gray-600">
                <x-icon icon="arrow-left-02" class="w-4 h-4 text-current" />
                Regresar a ofertas
            </a>
            <h1 class="text-3xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Editar oferta relámpago
            </h1>
        </div>
        <div class="flex flex-col gap-1 p-4">
            <h2 class="text-gray-700 dark:text-gray-300 text-lg uppercase">Editar información de la oferta</h2>
            <p class="text-gray-500 dark:text-gray-400 text-sm">
                Los campos marcados con <span class="text-red-500">*</span> son obligatorios
            </p>
        </div>
        <form action="{{ route('admin.flash-offers.update', $offer->id) }}" method="POST">
            <div class="p-4 dark:bg-black bg-white border border-gray-300 dark:border-zinc-900 mx-4 rounded-lg text-sm">
                @csrf
                @method('PUT')
                <div class="flex gap-2">
                    <div class="flex-1">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Producto:
                        </label>
                        <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                        <div class="relative">
                            <div class="w-full dark:text-white text-sm flex flex-col gap-4">
                                @if ($product)
                                    <img src="{{ Storage::url($product->main_image) }}"
                                        alt="Imagen principal de {{ $product->name }}"
                                        class="mx-auto w-80 rounded-full h-80 object-cover">
                                    <div
                                        class="flex flex-col gap-2 border boder-gray-300 dark:border-zinc-900 p-4 rounded-lg">
                                        <span class="text-lg font-medium">{{ $product->name }}</span>
                                        <span class="text-sm">{{ $product->short_description }}</span>
                                        <div class="flex gap-2 items-center">
                                            <p>Precio normal:</p>
                                            <span
                                                class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full dark:bg-blue-900 dark:text-blue-300 w-max">
                                                ${{ $product->price }}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @error('categorie_id')
                            <span class="text-red-500 text-subcategorie_idsm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-[2] px-4">
                        <x-input label="Precio de la oferta" type="number" name="offer_price" id="offer_price"
                            step="0.1" min="0.1" placeholder="Precio de la oferta" required icon="dollar"
                            value="{{ $offer->product->offer_price }}" />
                        <div class="mt-4">
                            <div class="flex flex-col gap-4">
                                <div class="flex-1">
                                    <x-input label="Fecha de inicio" type="date" name="start_date" id="start_date"
                                        placeholder="Fecha de inicio" icon="calendar" required
                                        value="{{ $offer->start_date }}" />
                                </div>
                                <div class="flex-1">
                                    <x-input label="Fecha de fin" type="date" name="end_date" id="end_date"
                                        placeholder="Fecha de fin" icon="calendar" required
                                        value="{{ $offer->end_date }}" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex gap-4">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="is_showing" class="sr-only peer" name="is_showing"
                                        {{ $offer->is_showing === 1 ? 'checked' : '' }}>
                                    <div
                                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                    </div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Mostrar en la página principal
                                    </span>
                                </label>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="is_active" class="sr-only peer" name="is_active"
                                        {{ $offer->is_active === 1 ? 'checked' : '' }}>
                                    <div
                                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                    </div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Activo
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex gap-2 items-center justify-center">
                <x-button type="submit" text="Editar oferta" typeButton="success" icon="edit" />
                <x-button type="a" href="{{ route('admin.flash-offers.index') }}" text="Cancelar" typeButton="danger"
                    icon="cancel" />
            </div>
        </form>
    </div>
@endsection
