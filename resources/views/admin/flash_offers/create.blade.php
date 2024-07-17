@extends('layouts.admin-template')

@section('title', 'Agregar oferta relámpago')

@section('content')
    @php
        if (session('product')) {
            $id = session('product')->id;
        } else {
            $id = old('product_id');
        }
    @endphp
    <div class="mt-4 bg-black">
        <div class="py-4 px-4 shadow-sm flex flex-col items-start border-y dark:bg-black dark:border-zinc-900">
            <a href="{{ route('admin.flash-offers.index') }}"
                class="text-gray-500 dark:text-gray-400 flex items-center justify-center gap-1 text-sm hover:underline hover:text-gray-600">
                <x-icon icon="arrow-left-02" class="w-4 h-4 text-current" />
                Regresar a ofertas
            </a>
            <h1 class="text-3xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Nueva oferta relámpago
            </h1>
        </div>
        <div class="flex flex-col gap-1 p-4">
            <h2 class="text-gray-700 dark:text-gray-300 text-lg uppercase">Información de la oferta</h2>
            <p class="text-gray-500 dark:text-gray-400 text-sm">
                Los campos marcados con <span class="text-red-500">*</span> son obligatorios
            </p>
        </div>
        <div class="p-4 dark:bg-black bg-white border border-gray-300 dark:border-zinc-900 mx-4 rounded-lg text-sm">
            <form action="{{ route('admin.flash-offers.store') }}" method="POST">
                @csrf
                <div class="flex gap-2">
                    <div class="flex-[2]">
                        <label
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white after:content-['*'] after:ml-0.5 after:text-red-500">
                            Producto
                        </label>
                        <input type="hidden" name="product_id" id="product_id" value="{{ $id }}">
                        <div class="relative">
                            <div
                                class="selected border-2 border-gray-300 bg-gray-50 dark:border-zinc-800 rounded-lg py-2.5 dark:bg-zinc-950 w-full px-4 dark:text-white text-sm flex items-center justify-between @error('categorie_id') is-invalid @enderror h-11">
                                <span class="itemSelected flex items-center gap-2">
                                    @if ($products->count() > 0)
                                        @php
                                            $selectedProduct = $products->firstWhere('id', $id);
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
                                    @endif
                                </span>
                                <x-icon icon="arrow-down" class="w-5 h-5 dark:text-white text-gray-500" />
                            </div>
                            <ul
                                class="absolute z-10 w-full mt-2 py-1 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-zinc-950 dark:border-zinc-900 selectOptions hidden overflow-auto h-60">
                                @if ($products->count() > 0)
                                    @foreach ($products as $product)
                                        <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-900 flex items-center gap-2"
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
                <div class="mt-4">
                    <x-button type="submit" text="Agregar oferta" typeButton="primary" icon="add-circle" />
                </div>
            </form>
        </div>
    </div>

@endsection
