@extends('layouts.template')
@section('title', 'Details product')
@section('content')
    <main class="mx-auto mb-10 w-4/5">
        <section class="mt-32 flex gap-32">
            <div class="flex h-max flex-1 flex-col items-center justify-center gap-2">
                <div>
                    <img id="main-image" src="{{ Storage::url($product->main_image) }}"
                        alt="Imagen principal del {{ $product->name }}" class="mb-4 h-96 w-full rounded-xl object-cover">
                </div>
                <!-- Images secondarys -->
                <div class="flex h-20 w-max items-center justify-center gap-2 py-20">
                    @if ($product->images->count() > 4)
                        <button class="button-prev-images cursor-pointer rounded-full bg-zinc-100 p-1 hover:bg-zinc-200">
                            <x-icon icon="arrow-left" class="h-5 w-5" />
                        </button>
                    @endif
                    @if ($product->images->count() > 0)
                        <div class="swiper swiper-images-secondarys max-w-[450px]">
                            <div class="swiper-wrapper">
                                @foreach ($product->images as $image)
                                    <div
                                        class="swiper-slide container-secondary-image {{ $loop->iteration === 1 ? 'selected' : '' }} cursor-pointer overflow-hidden rounded-lg">
                                        <img src="{{ Storage::url($image->image) }}" alt="Imagen secundaria"
                                            class="secondary-image h-20 w-full object-cover">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if ($product->images->count() > 4)
                        <button class="button-next-images cursor-pointer rounded-full bg-zinc-100 p-1 hover:bg-zinc-200">
                            <x-icon icon="arrow-right" class="h-5 w-5" />
                        </button>
                    @endif
                </div>
                <!-- End Images secondarys -->
            </div>
            <div class="flex flex-1 flex-col gap-3">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <h1 class="font-league-spartan text-6xl font-bold text-secondary">
                        {{ $product->name }}
                    </h1>
                    <div class="flex items-center gap-2">
                        <form action="{{ route('favorites.add', $product->id) }}" method="POST"
                            id="form-add-favorite-{{ $product->id }}">
                            @csrf
                            <label
                                class="ui-like font-secondary group flex h-max cursor-pointer items-center gap-2 rounded-full border border-rose-100 p-2 px-4 text-sm text-rose-500 hover:bg-rose-50 hover:text-rose-500">
                                <input type="checkbox"
                                    class="btn-add-favorite {{ $product->is_favorite ? 'favourite' : '' }}"
                                    data-form="#form-add-favorite-{{ $product->id }}" data-card="#{{ $product->id }}">
                                Guardar
                                <div class="like">
                                    <x-icon-store icon="favourite" class="h-5 w-5 text-current group-hover:fill-current" />
                                </div>
                            </label>
                        </form>
                        <button
                            class="font-secondary group flex h-max items-center gap-2 rounded-full border border-green-100 p-2 px-4 text-sm text-green-500 hover:bg-green-50 hover:text-green-500">
                            Compartir
                            <x-icon-store icon="share" class="h-5 w-5 text-current" />
                        </button>
                    </div>
                </div>
                <div class="flex gap-2">
                    <x-icon-store icon="start" class="h-5 w-5 text-secondary" />
                    <x-icon-store icon="start" class="h-5 w-5 text-secondary" />
                    <x-icon-store icon="start" class="h-5 w-5 text-secondary" />
                    <x-icon-store icon="start" class="h-5 w-5 text-secondary" />
                    <x-icon-store icon="start" class="h-5 w-5 text-secondary" />
                    <p class="font-secondary font-semibold text-tertiary">En stock</p>
                </div>
                <div class="flex items-end gap-2">
                    @if ($product->offer_price)
                        <span
                            class="font-secondary text-5xl font-semibold text-secondary">${{ $product->offer_price }}</span>
                        <span class="font-secondary text-2xl text-zinc-400 line-through">${{ $product->price }}</span>
                        <span
                            class="font-secondary me-2 rounded-full bg-purple-100 px-2.5 py-0.5 text-sm font-medium text-purple-800">
                            En oferta
                        </span>
                    @else
                        <span class="font-secondary text-5xl font-semibold text-secondary">${{ $product->price }}</span>
                    @endif
                </div>
                <p class="font-secondary w-2/3 text-sm text-zinc-500">
                    {{ $product->long_description }}
                </p>
                <div class="flex flex-col gap-6">
                    <div class="flex items-center gap-2">
                        <button
                            class="flex h-10 w-10 items-center justify-center rounded-full border border-zinc-400 hover:bg-zinc-100"
                            id="btn-minus">
                            <x-icon icon="minus" class="h-4 w-4 text-secondary" />
                        </button>
                        <input type="text" name="quantity" id="quantity"
                            class="font-secondary h-12 w-16 rounded-lg border-none text-center focus:border-none focus:outline-none"
                            readonly value="1" min="1" max="{{ $product->stock }}">
                        <button
                            class="flex h-10 w-10 items-center justify-center rounded-full border border-zinc-400 hover:bg-zinc-100"
                            id="btn-plus">
                            <x-icon-store icon="plus" class="h-4 w-4 text-secondary" />
                        </button>
                    </div>
                    <!-- Container button -->
                    <div class="flex items-center gap-2">
                        <x-button-store type="button" typeButton="secondary" text="Añadir al carrito"
                            icon="shopping-cart-add" />
                        <x-button-store type="button" typeButton="primary" text="Comprar" />
                    </div>
                    <!-- End Container button -->
                    <div class="font-secondary flex gap-2">
                        @if ($product->labels->count() > 0)
                            @foreach ($product->labels as $label)
                                <span
                                    class="flex items-center justify-center rounded-full bg-blue-100 px-4 py-1 text-sm font-medium text-blue-800">
                                    {{ $label->name }}
                                </span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="font-secondary mt-4 flex flex-col">
                    <div class="mb-2">
                        <button
                            class="accordion-inventario flex w-full items-center justify-between rounded-xl bg-zinc-50 px-6 py-3 font-bold uppercase text-secondary hover:bg-zinc-100"
                            data-show="#inventario-accordion">
                            Inventario
                            <x-icon icon="plus" class="h-5 w-5 text-current" />
                        </button>
                        <div class="mt-2 hidden animate-fade-down" id="inventario-accordion">
                            <div class="flex flex-col gap-2 rounded-xl bg-zinc-50 py-4">
                                <div class="px-6">
                                    <p class="font-bold text-secondary">Stock</p>
                                    <p class="font-secondary text-sm text-zinc-600">{{ $product->stock }} disponible</p>
                                </div>
                                <div class="px-6">
                                    <p class="font-bold text-secondary">Peso</p>
                                    <p class="font-secondary text-sm text-zinc-600">{{ $product->weight }} KG</p>
                                </div>
                                <div class="px-6">
                                    <p class="font-bold text-secondary">Dimensiones</p>
                                    <p class="font-secondary text-sm text-zinc-600">{{ $product->dimensions }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button
                            class="accordion-inventario flex w-full items-center justify-between rounded-xl bg-zinc-50 px-6 py-3 font-bold uppercase text-secondary hover:bg-zinc-100"
                            data-show="#inventario-impuestos">
                            Impuestos
                            <x-icon icon="plus" class="h-5 w-5 text-current" />
                        </button>
                        <div id="inventario-impuestos" class="mt-2 hidden animate-fade-down">
                            <div class="flex flex-col gap-2 rounded-xl bg-zinc-50 py-4">
                                @if ($product->taxes->count() > 0)
                                    @foreach ($product->taxes as $tax)
                                        <div class="px-6">
                                            <p class="font-bold text-secondary">
                                                {{ $tax->name }}
                                            </p>
                                            <p class="font-secondary text-sm text-zinc-600">
                                                {{ $tax->rate }}%
                                            </p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-20">
            <div>
                <div class="mt-4 flex items-center gap-2 font-league-spartan text-xl">
                    <x-icon-store icon="start" class="h-6 w-6 fill-yellow-300 text-yellow-400" />
                    <p class="font-bold">4.87</p>
                    <span class="flex items-center">
                        <x-icon icon="minus" class="h-5 w-5" />
                    </span>
                    <p>145 reseñas</p>
                </div>
                <div class="mb-6 mt-6 flex flex-col gap-6">
                    <div class="flex flex-col gap-2">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('images/photo.jpg') }}" alt="Imagen de perfil"
                                class="h-12 w-12 rounded-full">
                            <div class="flex w-full justify-between">
                                <div class="flex flex-col">
                                    <p class="font-league-spartan text-lg font-bold">Nombre de usuario</p>
                                    <p class="font-secondary text-sm text-zinc-600">21/6/2024</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <x-icon icon="start" class="h-5 w-5 fill-yellow-400 text-yellow-400" />
                                    <x-icon icon="start" class="h-5 w-5 fill-yellow-400 text-yellow-400" />
                                    <x-icon icon="start" class="h-5 w-5 fill-yellow-400 text-yellow-400" />
                                    <x-icon icon="start" class="h-5 w-5 fill-yellow-400 text-yellow-400" />
                                    <x-icon icon="start" class="h-5 w-5 fill-yellow-400 text-yellow-400" />
                                </div>
                            </div>
                        </div>
                        <p class="font-secondary text-sm text-secondary">
                            LLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('images/photo.jpg') }}" alt="Imagen de perfil"
                                class="h-12 w-12 rounded-full">
                            <div class="flex w-full justify-between">
                                <div class="flex flex-col">
                                    <p class="font-league-spartan text-lg font-bold">Nombre de usuario</p>
                                    <p class="font-secondary text-sm text-zinc-600">21/6/2024</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <x-icon icon="start" class="h-5 w-5 fill-yellow-400 text-yellow-400" />
                                    <x-icon icon="start" class="h-5 w-5 fill-yellow-400 text-yellow-400" />
                                    <x-icon icon="start" class="h-5 w-5 fill-yellow-400 text-yellow-400" />
                                    <x-icon icon="start" class="h-5 w-5 fill-yellow-400 text-yellow-400" />
                                    <x-icon icon="start" class="h-5 w-5 fill-yellow-400 text-yellow-400" />
                                </div>
                            </div>
                        </div>
                        <p class="font-secondary text-sm text-secondary">
                            LLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                </div>
                <x-button-store type="button" typeButton="secondary" class="text-sm" text="Ver más reseñas" />
            </div>
            <div class="mt-8 flex flex-col gap-2">
                <x-input-store type="textarea" name="review" label="Reseña" id="review" cols="30"
                    rows="5" placeholder="Escribe tu reseña..." />
                <span id="message-review" class="text-sn hidden text-sm text-red-600"></span>
                <x-button-store id="add-review" type="button" typeButton="secondary" text="Agregar reseña"
                    class="ml-auto mt-4 text-sm" />

            </div>
        </section>
        <section class="py-4">
            <div class="flex w-full flex-col justify-center text-center">
                <h2 class="p-4 font-league-spartan text-3xl font-bold uppercase text-secondary">
                    Tambien te puede interesar
                </h2>
                @if ($products)
                    <div id="slider">
                        @include('layouts.__partials.store.slider', [
                            'products' => $products,
                        ])
                    </div>
                @endif
                <div class="mx-auto mt-8 w-max">
                    <x-button-store type="a" href="{{ Route('store') }}" typeButton="primary" text="Ver más" />
                </div>
            </div>
        </section>
    </main>
@endsection
