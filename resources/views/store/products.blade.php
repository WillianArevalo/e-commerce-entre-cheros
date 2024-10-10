@extends('layouts.template')
@section('title', 'Entre Cheros | Tienda')
@section('content')
    <div class="mb-20">
        <section class="relative h-[300px] w-full text-white"
            style="background-image:url('{{ asset('images/fondo3.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute bottom-0 w-full">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,224L34.3,213.3C68.6,203,137,181,206,176C274.3,171,343,181,411,170.7C480,160,549,128,617,133.3C685.7,139,754,181,823,176C891.4,171,960,117,1029,90.7C1097.1,64,1166,64,1234,90.7C1302.9,117,1371,171,1406,197.3L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                </path>
            </svg>
        </section>
        <section class="px-4 xl:px-8">
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
                <div class="flex flex-[5] flex-wrap justify-center gap-4 xl:justify-start">
                    <div class="flex w-full flex-col items-start justify-between gap-4 sm:flex-row">
                        <div class="block text-center sm:hidden">
                            <div class="flex justify-end gap-2">
                                <x-button-store type="button" text="Filtrar por" class="text-sm" typeButton="secondary"
                                    icon="filter" data-drawer-target="drawer-right-example"
                                    data-drawer-show="drawer-right-example" data-drawer-placement="right"
                                    aria-controls="drawer-right-example" />
                            </div>
                        </div>
                        <div class="font-secondary flex w-full flex-col gap-2 sm:w-1/2">
                            <form action="{{ Route('products.search') }}" method="POST" id="form-search-product">
                                @csrf
                                <x-input-store label="Buscar" icon="search" placeholder="Buscar producto..."
                                    name="search" id="search" />
                            </form>
                        </div>
                        <div class="flex items-center gap-4">
                            <x-button-store type="button" typeButton="secondary" icon="filter-reset" onlyIcon="true"
                                class="px-4" id="reset-filters" class="hidden sm:mt-6" />
                            <div class="font-secondary flex w-full flex-col gap-2 sm:mt-6 sm:w-80">
                                <x-select-store label="" name="order" id="order" :options="[
                                    'recent' => 'Más recientes',
                                    'older' => 'Más antiguos',
                                    'price_asc' => 'Precio: Menor a mayor',
                                    'price_desc' => 'Precio: Mayor a menor',
                                    'offer' => 'Descuento',
                                ]" />
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <div id="loading-overlay"
                            class="absolute inset-0 z-10 hidden items-center justify-center bg-white bg-opacity-75">
                            <div
                                class="loader h-8 w-8 animate-spin rounded-full border-4 border-blue-500 border-t-transparent">
                            </div>
                        </div>

                        <div id="products-list">
                            @if ($products->count() > 0)
                                <div
                                    class="relative grid gap-4 max-[930px]:grid-cols-3 max-[600px]:grid-cols-2 xl:grid-cols-4">
                                    @foreach ($products as $product)
                                        <div
                                            class="flex h-max w-[180px] flex-col overflow-hidden rounded-3xl border border-zinc-300 bg-white text-start shadow sm:w-[210px] md:w-[250px] lg:w-[290px] xl:w-[280px]">
                                            <!-- Card header -->
                                            <div>
                                                <div class="relative sm:mx-4 sm:mt-4">
                                                    <img src="{{ Storage::url($product->main_image) }}" alt=""
                                                        class="h-40 w-full rounded-3xl bg-zinc-50 object-cover xl:h-72">
                                                    <form action="{{ route('favorites.add', $product->id) }}"
                                                        method="POST" id="form-add-favorite-{{ $product->id }}">
                                                        @csrf
                                                        <button type="button"
                                                            class="btn-add-favorite {{ $product->is_favorite ? 'favorite' : '' }} not-favorite absolute right-0 top-0 m-4 flex items-center justify-center rounded-full border p-1 hover:border-rose-600 hover:bg-rose-600 hover:text-white sm:p-2">
                                                            <x-icon-store icon="favourite"
                                                                class="h-3 w-3 text-current sm:h-5 sm:w-5" />
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="flex h-[60px] flex-col gap-2 p-4 sm:h-[140px]">
                                                    @if ($product->labels->count() > 0)
                                                        <div class="hidden flex-wrap gap-2 lg:flex">
                                                            @foreach ($product->labels as $label)
                                                                <span
                                                                    class="bg-{{ $label->color }}-100 text-{{ $label->color }}-800 rounded-full px-2 py-0.5 text-[10px] font-semibold">
                                                                    {{ $label->name }}
                                                                </span>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    <a href="{{ Route('products.details', $product->slug) }}"
                                                        class="mt-2 font-league-spartan text-sm font-bold text-secondary underline underline-offset-4 sm:text-base md:text-xl xl:text-xl">
                                                        {{ $product->name }}
                                                    </a>
                                                    <p
                                                        class="font-secondary text-wrap line-clamp-3 hidden pb-4 text-xs text-zinc-800 sm:block sm:text-sm">
                                                        {{ $product->short_description }}
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- Card end header -->

                                            <!-- Card footer -->
                                            <div class="mt-auto flex items-center border-t border-zinc-200 bg-zinc-100 px-4 py-2 lg:p-4"
                                                id="{{ $product->id }}">
                                                <div
                                                    class="flex w-full flex-col items-center justify-between gap-1 sm:flex-row">
                                                    <div>
                                                        @if ($product->offer_price && $product->offer_active === 1)
                                                            <span
                                                                class="font-secondary text-base font-semibold text-secondary lg:text-xl">${{ $product->offer_price }}</span>
                                                            <span
                                                                class="font-secondary text-xs text-zinc-500 line-through lg:text-base">${{ $product->price }}</span>
                                                        @else
                                                            <span
                                                                class="font-secondary text-base font-semibold text-secondary lg:text-xl">{{ $product->price_in_currency }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <!-- Add to favorite end -->

                                                    <!-- Add to cart -->
                                                    <form action="{{ route('cart.add', $product->id) }}" method="POST"
                                                        id="form-add-cart-{{ $product->id }}">
                                                        @csrf
                                                        <input type="hidden" name="quantity" value="1">
                                                        <button type="button"
                                                            data-form="#form-add-cart-{{ $product->id }}"
                                                            class="add-to-cart flex items-center justify-center rounded-xl bg-secondary px-4 py-2 font-league-spartan text-sm text-white hover:bg-blue-950 sm:rounded-2xl sm:px-4 sm:py-3">
                                                            <x-icon-store icon="shopping-cart-add"
                                                                class="w- h-3 text-current sm:h-5 sm:w-5" />
                                                            <span class="ml-2 hidden text-xs sm:block sm:text-sm">
                                                                Agregar
                                                            </span>
                                                        </button>
                                                    </form>
                                                    <!-- Add to cart end -->
                                                </div>
                                            </div>
                                            <!-- Card end footer -->
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="">
                                    <p class="text-center text-zinc-500">No se encontraron productos</p>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="drawer-right-example"
        class="fixed right-0 top-0 z-50 h-screen w-80 translate-x-full overflow-y-auto bg-white p-4 transition-transform"
        tabindex="-1" aria-labelledby="drawer-right-label">
        <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example"
            class="absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900">
            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <div class="mt-4 flex h-max w-full flex-1 flex-col gap-8">
            <form action="{{ Route('products.filter') }}" method="POST" id="form-filters" class="hidden">
                @csrf
            </form>
            <div>
                <p class="text-sm font-semibold text-zinc-600 md:text-base">Más filtros</p>
                <div class="mt-2 flex flex-col gap-2">
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
            <div>
                <p class="text-sm font-semibold text-zinc-600 md:text-base">
                    Por rango de precio
                </p>
                <div class="mt-2 flex flex-col gap-2">
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
            <div>
                <p class="text-sm font-semibold text-zinc-600 md:text-base">Categorías</p>
                <div class="mt-2 flex flex-col gap-2">
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
            <div>
                <p class="text-sm font-semibold text-zinc-600 md:text-base">Subcategorías</p>
                <div class="mt-2 flex flex-col gap-2">
                    @if ($subcategories->count() > 0)
                        @foreach ($subcategories as $subcategorie)
                            <div class="flex items-center">
                                <input id="{{ $subcategorie->name }}" type="checkbox" value="{{ $subcategorie->id }}"
                                    name="subcategorie"
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
            <div>
                <p class="text-sm font-semibold text-zinc-600 md:text-base">Etiquetas</p>
                <div class="mt-2 flex flex-wrap gap-2">
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
            <div>
                <p class="text-sm font-semibold text-zinc-600 md:text-base">Marcas</p>
                <div class="mt-2 flex flex-col gap-2">
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
    </div>
@endsection
