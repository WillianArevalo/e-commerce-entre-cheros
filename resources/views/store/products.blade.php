@extends('layouts.template')
@section('title', 'Entre Cheros | Tienda')
@section('content')
    <main class="mb-20">
        <section class="relative h-[300px] w-full text-white"
            style="background-image:url('{{ asset('images/fondo3.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute bottom-0 w-full">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,224L34.3,213.3C68.6,203,137,181,206,176C274.3,171,343,181,411,170.7C480,160,549,128,617,133.3C685.7,139,754,181,823,176C891.4,171,960,117,1029,90.7C1097.1,64,1166,64,1234,90.7C1302.9,117,1371,171,1406,197.3L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                </path>
            </svg>
        </section>
        <section class="px-8">
            <div class="font-secondary mt-8 flex xl:gap-8">

                <!-- Filters -->
                <aside
                    class="hidden h-max w-full flex-1 flex-col gap-4 rounded-xl border border-zinc-200 p-4 shadow xl:flex">
                    <form action="{{ Route('products.filter') }}" method="POST" id="form-filters" class="hidden">
                        @csrf
                    </form>
                    <div class="accordion-item">
                        <button
                            class="accordion-header-filter flex w-full items-center justify-between rounded-xl px-4 py-1 hover:bg-zinc-100"
                            data-target="#panel1">
                            <p class="text-sm font-semibold text-zinc-600 md:text-base">Más filtros</p>
                            <x-icon-store icon="arrow-down" class="h-5 w-5 text-zinc-500" />
                        </button>
                        <div id="panel1"
                            class="accordion-content-filter max-h-0 overflow-hidden px-4 transition-all duration-500 ease-in-out">
                            <div class="mt-4 flex flex-col gap-2">
                                <div class="flex items-center">
                                    <input id="offers" type="checkbox" value="offers" name="offert_type"
                                        class="filter-check h-4 w-4 rounded border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="offers" class="ms-2 text-sm font-medium text-zinc-500 md:text-base">
                                        Ofertas
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="flash_offers" type="checkbox" value="flash_offers" name="offert_type"
                                        class="filter-check h-4 w-4 rounded border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="flash_offers" class="ms-2 text-sm font-medium text-zinc-500 md:text-base">
                                        Ofertas relampago
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button
                            class="accordion-header-filter flex w-full items-center justify-between rounded-xl px-4 py-1 hover:bg-zinc-100"
                            data-target="#panel2">
                            <p class="text-sm font-semibold text-zinc-600 md:text-base">
                                Por rango de precio
                            </p>
                            <x-icon-store icon="arrow-down" class="h-5 w-5 text-zinc-500" />
                        </button>
                        <div id="panel2"
                            class="accordion-content-filter max-h-0 overflow-hidden px-4 transition-all duration-500 ease-in-out">
                            <div class="mt-4 flex flex-col gap-2">
                                <div class="flex items-center">
                                    <input id="min-5" type="checkbox" value="min_5" name="price_range"
                                        class="filter-check h-4 w-4 rounded border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="min-5" class="ms-2 text-sm font-medium text-zinc-500 md:text-base">
                                        Menos de $5
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="entre-5-10" type="checkbox" value="entre_5_10" name="price_range"
                                        class="filter-check h-4 w-4 rounded border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="entre-5-10" class="ms-2 text-sm font-medium text-zinc-500 md:text-base">
                                        Entre $5 y $10
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="more-10" type="checkbox" value="more_10" name="price_range"
                                        class="filter-check h-4 w-4 rounded border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                    <label for="more-10" class="ms-2 text-sm font-medium text-zinc-500 md:text-base">
                                        Más de $10
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button
                            class="accordion-header-filter flex w-full items-center justify-between rounded-xl px-4 py-1 hover:bg-zinc-100"
                            data-target="#panel3">
                            <p class="text-sm font-semibold text-zinc-600 md:text-base">Categorías</p>
                            <x-icon-store icon="arrow-down" class="h-5 w-5 text-zinc-500" />
                        </button>
                        <div id="panel3"
                            class="accordion-content-filter max-h-0 overflow-hidden px-4 transition-all duration-500 ease-in-out">
                            <div class="mt-4 flex flex-col gap-2">
                                @if ($categories->count() > 0)
                                    @foreach ($categories as $category)
                                        <div class="flex items-center">
                                            <input id="{{ $category->name }}" type="checkbox" value="{{ $category->id }}"
                                                name="category"
                                                class="filter-check h-4 w-4 rounded border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                            <label for="{{ $category->name }}"
                                                class="ms-2 text-sm font-medium text-zinc-500 md:text-base">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <button
                            class="accordion-header-filter flex w-full items-center justify-between rounded-xl px-4 py-1 hover:bg-zinc-100"
                            data-target="#panel4">
                            <p class="text-sm font-semibold text-zinc-600 md:text-base">Subcategorías</p>
                            <x-icon-store icon="arrow-down" class="h-5 w-5 text-zinc-500" />
                        </button>
                        <div id="panel4"
                            class="accordion-content-filter max-h-0 overflow-hidden px-4 transition-all duration-500 ease-in-out">
                            <div class="mt-4 flex flex-col gap-2">
                                @if ($subcategories->count() > 0)
                                    @foreach ($subcategories as $subcategorie)
                                        <div class="flex items-center">
                                            <input id="{{ $subcategorie->name }}" type="checkbox"
                                                value="{{ $subcategorie->id }}" name="subcategorie"
                                                class="filter-check h-4 w-4 rounded border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                            <label for="{{ $subcategorie->name }}"
                                                class="ms-2 text-sm font-medium text-zinc-500 md:text-base">
                                                {{ $subcategorie->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <button
                            class="accordion-header-filter flex w-full items-center justify-between rounded-xl px-4 py-1 hover:bg-zinc-100"
                            data-target="#panel5">
                            <p class="text-sm font-semibold text-zinc-600 md:text-base">Etiquetas</p>
                            <x-icon-store icon="arrow-down" class="h-5 w-5 text-zinc-500" />
                        </button>
                        <div id="panel5"
                            class="accordion-content-filter max-h-0 overflow-hidden px-4 transition-all duration-500 ease-in-out">
                            <div class="mt-4 flex flex-wrap gap-2">
                                @if ($labels->count() > 0)
                                    @foreach ($labels as $label)
                                        <div class="flex items-center">
                                            <input id="{{ $label->name }}" type="checkbox" value="{{ $label->id }}"
                                                name="label"
                                                class="filter-check h-4 w-4 rounded border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                            <label for="{{ $label->name }}"
                                                class="bg-{{ $label->color }}-100 text-{{ $label->color }}-800 ms-2 rounded-xl p-0.5 px-2 text-sm font-medium text-zinc-900">
                                                {{ $label->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button
                            class="accordion-header-filter flex w-full items-center justify-between rounded-xl px-4 py-1 hover:bg-zinc-100"
                            data-target="#panel6">
                            <p class="text-sm font-semibold text-zinc-600 md:text-base">Marcas</p>
                            <x-icon-store icon="arrow-down" class="h-5 w-5 text-zinc-500" />
                        </button>
                        <div id="panel6"
                            class="accordion-content-filter max-h-0 overflow-hidden px-4 transition-all duration-500 ease-in-out">
                            <div class="mt-4 flex flex-col gap-2">
                                @if ($brands->count() > 0)
                                    @foreach ($brands as $brand)
                                        <div class="flex items-center">
                                            <input id="{{ $brand->name }}" type="checkbox" value="{{ $brand->id }}"
                                                name="brand"
                                                class="filter-check h-4 w-4 rounded border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                            <label for="{{ $brand->name }}"
                                                class="ms-2 text-sm font-medium text-zinc-500 md:text-base">
                                                {{ $brand->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- Products -->
                <div class="flex flex-[5] flex-wrap justify-center gap-4">
                    <div class="flex w-full justify-between gap-4">
                        <div class="font-secondary flex w-1/2 flex-col gap-2">
                            <x-input-store label="Buscar" icon="search" placeholder="Buscar producto..." name="search"
                                id="search" />
                        </div>
                        <div class="font-secondary flex w-80 flex-col gap-2">
                            <x-select-store label="Ordernar por" name="order" id="order" :options="[
                                'recent' => 'Más recientes',
                                'older' => 'Más antiguos',
                                'price_asc' => 'Precio: Menor a mayor',
                                'price_desc' => 'Precio: Mayor a menor',
                                'offer' => 'Descuento',
                            ]" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 justify-center gap-6 lg:grid-cols-2 xl:grid-cols-3" id="products-list">
                        @if ($products->count() > 0)
                            @foreach ($products as $product)
                                <x-card-product :product="$product" :slide="false" width="w-auto" />
                            @endforeach
                        @else
                            <p class="text-sm text-zinc-600 md:text-base">No hay productos que mostrar</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
