@extends('layouts.template')

@section('title', 'Details product')

@section('content')
    <main class="mx-auto mb-10 w-4/5">
        <section class="mt-32 flex gap-8">
            <div class="flex h-max flex-1 flex-col items-center justify-center gap-2">
                <img src="{{ Storage::url($product->main_image) }}" alt="Imagen principal del {{ $product->name }}"
                    class="h-96 w-full rounded-xl object-cover">
                <div class="flex items-center justify-center gap-2">
                    @if ($product->images->count() > 4)
                        <button>
                            <x-icon icon="arrow-left" class="h-5 w-5" />
                        </button>
                    @endif
                    @if ($product->images->count() > 0)
                        @foreach ($product->images as $image)
                            <img src="{{ Storage::url($image->image) }}" alt="Imagen secundaria"
                                class="h-16 w-24 rounded-lg border border-tertiary object-cover">
                        @endforeach
                    @endif
                    @if ($product->images->count() > 4)
                        <button>
                            <x-icon icon="arrow-right" class="h-5 w-5" />
                        </button>
                    @endif
                </div>
                <div class="mt-4 flex gap-2 font-secondary">
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
            <div class="flex flex-1 flex-col gap-3">
                <div class="flex justify-between">
                    <h1 class="font-primary text-4xl font-bold text-secondary">{{ $product->name }}</h1>
                    <div class="flex gap-2">
                        <button
                            class="group flex items-center gap-2 rounded-lg bg-zinc-50 p-2 font-secondary text-sm text-rose-500 hover:bg-zinc-100">
                            Guardar
                            <x-icon-store icon="favourite" class="h-5 w-5 text-current group-hover:fill-rose-500" />
                        </button>
                        <button
                            class="flex items-center gap-2 rounded-lg bg-zinc-50 p-2 font-secondary text-sm text-green-500 hover:bg-zinc-100">
                            Compartir
                            <x-icon-store icon="share" class="h-6 w-6 text-current" />
                        </button>
                    </div>
                </div>
                <div class="flex gap-2">
                    <x-icon icon="start" class="h-5 w-5 text-secondary" />
                    <x-icon icon="start" class="h-5 w-5 text-secondary" />
                    <x-icon icon="start" class="h-5 w-5 text-secondary" />
                    <x-icon icon="start" class="h-5 w-5 text-secondary" />
                    <x-icon icon="start" class="h-5 w-5 text-secondary" />
                    <p class="font-secondary font-semibold text-tertiary">En stock</p>
                </div>
                <div class="flex items-end gap-2">
                    @if ($product->offer_price)
                        <span
                            class="font-secondary text-5xl font-semibold text-secondary">${{ $product->offer_price }}</span>
                        <span class="font-secondary text-2xl text-zinc-400 line-through">${{ $product->price }}</span>
                        <span
                            class="me-2 rounded-full bg-purple-100 px-2.5 py-0.5 font-secondary text-sm font-medium text-purple-800">
                            En oferta
                        </span>
                    @else
                        <span class="font-secondary text-5xl font-semibold text-secondary">${{ $product->price }}</span>
                    @endif
                </div>
                <p class="w-2/3 font-secondary text-secondary">
                    {{ $product->long_description }}
                </p>
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-1">
                            <button
                                class="flex h-10 w-10 items-center justify-center rounded-full border border-zinc-300 hover:bg-zinc-100"
                                id="btn-minus">
                                <x-icon icon="minus" class="h-4 w-4 text-secondary" />
                            </button>
                            <input type="text" name="quantity" id="quantity"
                                class="h-12 w-16 rounded-lg border-none text-center font-secondary focus:border-none focus:outline-none"
                                readonly value="1" min="1" max="{{ $product->stock }}">
                            <button
                                class="flex h-10 w-10 items-center justify-center rounded-full border border-zinc-300 hover:bg-zinc-100"
                                id="btn-plus">
                                <x-icon icon="plus" class="h-4 w-4 text-secondary" />
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-button type="button" typeButton="store-secondary" text="Añadir al carrito"
                            icon="shopping-cart-add" />
                        <x-button type="button" typeButton="store-gradient" text="Comprar" />
                    </div>
                    <div class="flex flex-col font-secondary">
                        <div class="mb-2">
                            <button
                                class="accordion-inventario flex w-full items-center justify-between rounded-lg bg-zinc-100 px-6 py-3 hover:bg-zinc-200"
                                data-show="#inventario-accordion">
                                Inventario
                                <x-icon icon="plus" class="h-5 w-5 text-current" />
                            </button>
                            <div class="accordion-desactive mt-2 flex flex-col gap-2 rounded-lg bg-zinc-100"
                                id="inventario-accordion">
                                <div class="px-6 pt-4">
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
                        <div>
                            <button
                                class="accordion-inventario flex w-full items-center justify-between rounded-lg bg-zinc-100 px-6 py-3 hover:bg-zinc-200"
                                data-show="#inventario-impuestos">
                                Impuestos
                                <x-icon icon="plus" class="h-5 w-5 text-current" />
                            </button>
                            <div class="accordion-desactive mt-2 flex flex-col gap-2 rounded-lg bg-zinc-100"
                                id="inventario-impuestos">
                                @if ($product->taxes->count() > 0)
                                    @foreach ($product->taxes as $tax)
                                        <div class="@if ($loop->iteration === 1) pt-4 @endif px-6">
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
        <section class="mt-4">
            <div>
                <div class="mt-4 flex items-center gap-2 font-primary text-xl">
                    <x-icon icon="start" class="h-6 w-6 fill-yellow-400 text-yellow-400" />
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
                                    <p class="font-primary text-lg font-bold">Nombre de usuario</p>
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
                                    <p class="font-primary text-lg font-bold">Nombre de usuario</p>
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
                <x-button type="button" typeButton="store-secondary" text="Ver más reseñas" />
            </div>
            <div class="mt-4 flex flex-col gap-2">
                <label for="" class="font-secondary font-medium text-zinc-800">Reseña:</label>
                <textarea name="review" id="review" cols="30" rows="5" placeholder="Escribe tu reseña"
                    class="block w-full rounded-lg border-2 border-zinc-300 bg-zinc-50 p-2.5 font-secondary text-sm text-zinc-900 focus:border-blue-500 focus:ring-4 focus:ring-blue-200"></textarea>
                <x-button type="button" typeButton="store-secondary" text="Agregar reseña" class="ml-auto" />
            </div>
        </section>
        <section class="py-4">
            <div class="flex w-full flex-col justify-center gap-4 text-center">
                <h2 class="p-4 font-primary text-3xl font-bold uppercase text-secondary">
                    Tambien te puede interesar
                </h2>
                <div class="relative mx-auto flex w-4/5 flex-wrap items-center justify-center">
                    <button class="button-prev absolute -left-14 z-40 cursor-pointer rounded-lg hover:bg-zinc-100">
                        <x-icon icon="arrow-left" class="h-12 w-12 text-secondary" />
                    </button>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @if ($products->count() > 0)
                                @foreach ($products as $product)
                                    <div
                                        class="swiper-slide flex h-max w-96 flex-col overflow-hidden rounded-lg border border-zinc-300 bg-white text-start">
                                        <img src="{{ Storage::url($product->main_image) }}" alt=""
                                            class="h-72 w-full object-cover">
                                        <div class="p-4">
                                            <h3 class="font-primary text-xl font-bold text-secondary">
                                                {{ $product->name }}
                                            </h3>
                                            <p class="text-wrap font-secondary text-sm text-zinc-800">
                                                {{ $product->short_description }}
                                            </p>
                                        </div>
                                        <div class="mt-auto flex items-end justify-between p-4">
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('products.details', $product->id) }}"
                                                    class="flex items-center justify-center rounded-lg bg-secondary px-5 py-3 font-primary text-white">
                                                    <x-icon icon="shopping-cart-add" class="h-5 w-5 text-current" />
                                                </a>
                                                <a href="{{ route('products.details', $product->id) }}"
                                                    class="flex items-center justify-center rounded-lg border border-zinc-300 bg-white px-5 py-3 font-primary text-secondary transition-colors hover:bg-zinc-100">
                                                    <x-icon icon="arrow-right" class="h-5 w-5 text-current" />
                                                </a>
                                            </div>
                                            <span
                                                class="font-secondary text-lg font-bold text-secondary">${{ $product->price }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <button class="button-next absolute -right-14 z-40 cursor-pointer rounded-lg hover:bg-zinc-100">
                        <x-icon icon="arrow-right" class="h-12 w-12 text-secondary" />
                    </button>
                </div>
                <a href=""
                    class="bg-gradient mx-auto w-max rounded-full bg-primary px-5 py-3 font-secondary font-medium uppercase text-white hover:bg-secondary">
                    Ver más
                </a>
            </div>
        </section>
    </main>
@endsection
