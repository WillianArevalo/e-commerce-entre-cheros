@extends('layouts.template')

@section('title', 'Home')

@section('content')
    <main class="mb-20">
        <section class="h-[300px] text-white w-full relative"
            style="background-image:url('{{ asset('images/fondo3.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full absolute bottom-0">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,224L34.3,213.3C68.6,203,137,181,206,176C274.3,171,343,181,411,170.7C480,160,549,128,617,133.3C685.7,139,754,181,823,176C891.4,171,960,117,1029,90.7C1097.1,64,1166,64,1234,90.7C1302.9,117,1371,171,1406,197.3L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                </path>
            </svg>
        </section>
        <section class="px-20">
            <div class="flex justify-end">
                <div class="flex flex-col gap-2 w-80 font-secondary">
                    <label for="gender" class="text-start text-zinc-600 text-sm">Ordenar por</label>
                    <input type="hidden" id="gender" name="gender" value="M">
                    <div class="relative">
                        <div
                            class="selected text-sm px-6 py-3 border border-zinc-300 rounded-full focus:ring-4 focus:ring-blue-200 focus:border-blue-500 flex items-center justify-between">
                            <span class="itemSelected">
                                Precio más alto
                            </span>
                            <x-icon icon="arrow-down" class="w-5 h-5 text-zinc-600" />
                        </div>
                        <ul
                            class="absolute z-10 w-full mt-2 py-1 bg-white border border-gray-200 rounded-2xl shadow-lg selectOptions hidden">
                            <li class="itemOption text-sm text-zinc-900 px-4 py-2.5 hover:bg-gray-100" data-value="M"
                                data-input="#gender">
                                Relevancia
                            </li>
                            <li class="itemOption text-sm text-zinc-900 px-4 py-2.5 hover:bg-gray-100" data-value="F"
                                data-input="#gender">
                                Más vendido
                            </li>
                            <li class="itemOption text-sm text-zinc-900 px-4 py-2.5 hover:bg-gray-100" data-value="F"
                                data-input="#gender">
                                Descuento
                            </li>
                            <li class="itemOption text-sm text-zinc-900 px-4 py-2.5 hover:bg-gray-100" data-value="F"
                                data-input="#gender">
                                Precio más bajo
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex gap-4 mt-8 font-secondary">
                <div class="flex-1 w-full flex flex-col gap-8 border border-zinc-200 p-4 rounded-lg">
                    <div>
                        <p class="text-zinc-600 text-sm mb-2">Más filtros</p>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input id="offers" type="checkbox" value=""
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                <label for="offers" class="ms-2 text-sm font-medium text-gray-900">
                                    Ofertas
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="flash_offers" type="checkbox" value=""
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                <label for="flash_offers" class="ms-2 text-sm font-medium text-gray-900">
                                    Ofertas relampago
                                </label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-zinc-600 text-sm mb-2">Por rango de precio</p>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input id="min-5" type="checkbox" value=""
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                <label for="min-5" class="ms-2 text-sm font-medium text-gray-900">
                                    Menos de $5
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="entre-5-10" type="checkbox" value=""
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                <label for="entre-5-10" class="ms-2 text-sm font-medium text-gray-900">
                                    Entre $5 y $10
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="more-10" type="checkbox" value=""
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                <label for="more-10" class="ms-2 text-sm font-medium text-gray-900">
                                    Más de $10
                                </label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-zinc-600 text-sm mb-2">Categorías</p>
                        <div class="flex flex-col gap-2">
                            @if ($categories->count() > 0)
                                @foreach ($categories as $category)
                                    <div class="flex items-center">
                                        <input id="{{ $category->name }}" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                        <label for="{{ $category->name }}" class="ms-2 text-sm font-medium text-gray-900">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div>
                        <p class="text-zinc-600 text-sm mb-2">Subcategorías</p>
                        <div class="flex flex-col gap-2">
                            @if ($subcategories->count() > 0)
                                @foreach ($subcategories as $subcategorie)
                                    <div class="flex items-center">
                                        <input id="{{ $subcategorie->name }}" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                        <label for="{{ $subcategorie->name }}"
                                            class="ms-2 text-sm font-medium text-gray-900">
                                            {{ $subcategorie->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div>
                        <p class="text-zinc-600 text-sm mb-2">Etiquetas</p>
                        <div class="flex flex-wrap gap-2">
                            @if ($labels->count() > 0)
                                @foreach ($labels as $label)
                                    <div class="flex items-center">
                                        <input id="{{ $label->name }}" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                        <label for="{{ $label->name }}" class="ms-2 text-sm font-medium text-gray-900">
                                            {{ $label->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div>
                        <p class="text-zinc-600 text-sm mb-2">Marcas</p>
                        <div class="flex flex-col gap-2">
                            @if ($brands->count() > 0)
                                @foreach ($brands as $brand)
                                    <div class="flex items-center">
                                        <input id="{{ $brand->name }}" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                        <label for="{{ $brand->name }}" class="ms-2 text-sm font-medium text-gray-900">
                                            {{ $brand->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex-[5] flex gap-4 flex-wrap">
                    <div class="grid grid-cols-3 gap-4">
                        @if ($products->count() > 0)
                            @foreach ($products as $product)
                                <x-card-product :product="$product" :slide="false" width="w-auto" />
                            @endforeach
                        @else
                            <p class="text-sm text-zinc-600">No hay productos que mostrar</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
