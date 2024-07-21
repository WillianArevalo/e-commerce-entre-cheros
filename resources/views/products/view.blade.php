@extends('layouts.template')

@section('title', 'Details product')

@section('content')
    <main class="mb-10 w-4/5 mx-auto">
        <section class="mt-32 flex gap-8">
            <div class="flex-1 flex flex-col gap-2 items-center justify-center h-max">
                <img src="{{ Storage::url($product->main_image) }}" alt="Imagen principal del {{ $product->name }}"
                    class="w-full h-96 rounded-xl object-cover">
                <div class="flex gap-2 items-center justify-center">
                    @if ($product->images->count() > 4)
                        <button>
                            <x-icon icon="arrow-left" class="w-5 h-5" />
                        </button>
                    @endif
                    @if ($product->images->count() > 0)
                        @foreach ($product->images as $image)
                            <img src="{{ Storage::url($image->image) }}" alt="Imagen secundaria"
                                class="w-24 h-16 object-cover border border-tertiary rounded-lg">
                        @endforeach
                    @endif
                    @if ($product->images->count() > 4)
                        <button>
                            <x-icon icon="arrow-right" class="w-5 h-5" />
                        </button>
                    @endif
                </div>
                <div class="flex gap-2 mt-4 font-secondary">
                    @if ($product->labels->count() > 0)
                        @foreach ($product->labels as $label)
                            <span
                                class="bg-blue-100 text-blue-800 text-sm font-medium px-4 py-1 rounded-full flex items-center justify-center">
                                {{ $label->name }}
                            </span>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="flex-1 flex flex-col gap-3">
                <div class="flex justify-between">
                    <h1 class="font-bold text-secondary text-4xl font-primary">{{ $product->name }}</h1>
                    <div class="flex gap-2">
                        <button
                            class="group hover:bg-zinc-100 p-2 rounded-lg text-rose-500 flex items-center gap-2 font-secondary bg-zinc-50 text-sm">
                            Guardar
                            <x-icon icon="favourite" class="w-5 h-5 text-current group-hover:fill-rose-500" />
                        </button>
                        <button
                            class="hover:bg-zinc-100 p-2 rounded-lg text-green-500 text-secondary flex items-center gap-2 font-secondary bg-zinc-50 text-sm">
                            Compartir
                            <x-icon icon="share" class="w-6 h-6 text-current" />
                        </button>
                    </div>
                </div>
                <div class="flex gap-2">
                    <x-icon icon="start" class="w-5 h-5 text-secondary" />
                    <x-icon icon="start" class="w-5 h-5 text-secondary" />
                    <x-icon icon="start" class="w-5 h-5 text-secondary" />
                    <x-icon icon="start" class="w-5 h-5 text-secondary" />
                    <x-icon icon="start" class="w-5 h-5 text-secondary" />
                    <p class="font-secondary text-tertiary font-semibold">En stock</p>
                </div>
                <div class="flex gap-2 items-end">
                    @if ($product->offer_price)
                        <span
                            class="text-secondary font-semibold font-secondary text-5xl">${{ $product->offer_price }}</span>
                        <span class="text-gray-400 font-secondary line-through text-2xl">${{ $product->price }}</span>
                        <span
                            class="bg-purple-100 text-purple-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full  font-secondary">
                            En oferta
                        </span>
                    @else
                        <span class="text-secondary font-semibold font-secondary text-5xl">${{ $product->price }}</span>
                    @endif
                </div>
                <p class="font-secondary text-secondary w-2/3">
                    {{ $product->long_description }}
                </p>
                <div class="flex gap-4 flex-col">
                    <div class="flex gap-4 items-center">
                        <div class="flex items-center gap-1">
                            <button
                                class="flex items-center justify-center hover:bg-zinc-100 border border-zinc-300 rounded-full w-10 h-10"
                                id="btn-minus">
                                <x-icon icon="minus" class="w-4 h-4 text-secondary" />
                            </button>
                            <input type="text" name="quantity" id="quantity"
                                class="w-16 h-12 text-center font-secondary border-none rounded-lg focus:outline-none focus:border-none"
                                readonly value="1" min="1" max="{{ $product->stock }}">
                            <button
                                class="flex items-center justify-center hover:bg-zinc-100 border border-zinc-300 rounded-full w-10 h-10"
                                id="btn-plus">
                                <x-icon icon="plus" class="w-4 h-4 text-secondary" />
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-button type="button" typeButton="store-secondary" text="Añadir al carrito"
                            icon="shopping-cart-add" />
                        <x-button type="button" typeButton="store-gradient" text="Comprar" />
                    </div>
                    <div class="font-secondary flex flex-col">
                        <div class="mb-2">
                            <button
                                class="flex justify-between items-center bg-zinc-100 py-3 px-6 rounded-lg w-full hover:bg-zinc-200 accordion-inventario"
                                data-show="#inventario-accordion">
                                Inventario
                                <x-icon icon="plus" class="w-5 h-5 text-current" />
                            </button>
                            <div class="flex flex-col gap-2 accordion-desactive bg-zinc-100 rounded-lg mt-2"
                                id="inventario-accordion">
                                <div class="px-6 pt-4">
                                    <p class="font-bold text-secondary">Stock</p>
                                    <p class="font-secondary text-gray-600 text-sm">{{ $product->stock }} disponible</p>
                                </div>
                                <div class="px-6">
                                    <p class="font-bold text-secondary">Peso</p>
                                    <p class="font-secondary text-gray-600 text-sm">{{ $product->weight }} KG</p>
                                </div>
                                <div class="px-6">
                                    <p class="font-bold text-secondary">Dimensiones</p>
                                    <p class="font-secondary text-gray-600 text-sm">{{ $product->dimensions }}</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button
                                class="flex justify-between items-center bg-zinc-100 py-3 px-6 rounded-lg w-full hover:bg-zinc-200 accordion-inventario"
                                data-show="#inventario-impuestos">
                                Impuestos
                                <x-icon icon="plus" class="w-5 h-5 text-current" />
                            </button>
                            <div class="flex flex-col gap-2 accordion-desactive bg-zinc-100 rounded-lg mt-2"
                                id="inventario-impuestos">
                                @if ($product->taxes->count() > 0)
                                    @foreach ($product->taxes as $tax)
                                        <div class="px-6 @if ($loop->iteration === 1) pt-4 @endif">
                                            <p class="font-bold text-secondary">
                                                {{ $tax->name }}
                                            </p>
                                            <p class="font-secondary text-gray-600 text-sm">
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
                <div class="flex font-primary gap-2 text-xl items-center mt-4">
                    <x-icon icon="start" class="w-6 h-6 text-yellow-400 fill-yellow-400" />
                    <p class="font-bold">4.87</p>
                    <span class="flex items-center">
                        <x-icon icon="minus" class="w-5 h-5" />
                    </span>
                    <p>145 reseñas</p>
                </div>
                <div class="flex flex-col gap-6 mt-6 mb-6">
                    <div class="flex flex-col gap-2">
                        <div class="flex gap-2 items-center">
                            <img src="{{ asset('images/photo.jpg') }}" alt="Imagen de perfil"
                                class="w-12 h-12 rounded-full">
                            <div class="flex justify-between w-full">
                                <div class="flex flex-col">
                                    <p class="font-bold font-primary text-lg">Nombre de usuario</p>
                                    <p class="font-secondary text-sm text-gray-600">21/6/2024</p>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <x-icon icon="start" class="w-5 h-5 text-yellow-400 fill-yellow-400" />
                                    <x-icon icon="start" class="w-5 h-5 text-yellow-400 fill-yellow-400" />
                                    <x-icon icon="start" class="w-5 h-5 text-yellow-400 fill-yellow-400" />
                                    <x-icon icon="start" class="w-5 h-5 text-yellow-400 fill-yellow-400" />
                                    <x-icon icon="start" class="w-5 h-5 text-yellow-400 fill-yellow-400" />
                                </div>
                            </div>
                        </div>
                        <p class="font-secondary text-secondary text-sm">
                            LLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex gap-2 items-center">
                            <img src="{{ asset('images/photo.jpg') }}" alt="Imagen de perfil"
                                class="w-12 h-12 rounded-full">
                            <div class="flex justify-between w-full">
                                <div class="flex flex-col">
                                    <p class="font-bold font-primary text-lg">Nombre de usuario</p>
                                    <p class="font-secondary text-sm text-gray-600">21/6/2024</p>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <x-icon icon="start" class="w-5 h-5 text-yellow-400 fill-yellow-400" />
                                    <x-icon icon="start" class="w-5 h-5 text-yellow-400 fill-yellow-400" />
                                    <x-icon icon="start" class="w-5 h-5 text-yellow-400 fill-yellow-400" />
                                    <x-icon icon="start" class="w-5 h-5 text-yellow-400 fill-yellow-400" />
                                    <x-icon icon="start" class="w-5 h-5 text-yellow-400 fill-yellow-400" />
                                </div>
                            </div>
                        </div>
                        <p class="font-secondary text-secondary text-sm">
                            LLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                </div>
                <x-button type="button" typeButton="store-secondary" text="Ver más reseñas" />
            </div>
            <div class="flex flex-col gap-2 mt-4">
                <label for="" class="font-secondary text-gray-800 font-medium">Reseña:</label>
                <textarea name="review" id="review" cols="30" rows="5" placeholder="Escribe tu reseña"
                    class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-4 focus:ring-blue-200 focus:border-blue-500 block w-full p-2.5 font-secondary"></textarea>
                <x-button type="button" typeButton="store-secondary" text="Agregar reseña" class="ml-auto" />
            </div>
        </section>
        <section class="py-4">
            <div class="flex flex-col gap-4 justify-center w-full text-center">
                <h2 class="uppercase text-3xl font-primary text-secondary font-bold p-4">
                    Tambien te puede interesar
                </h2>
                <div class="flex flex-wrap justify-center items-center w-4/5 mx-auto relative">
                    <button class="button-prev absolute z-40 -left-14 hover:bg-zinc-100 rounded-lg cursor-pointer">
                        <x-icon icon="arrow-left" class="w-12 h-12 text-secondary" />
                    </button>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @if ($products->count() > 0)
                                @foreach ($products as $product)
                                    <div
                                        class="swiper-slide bg-white border border-zinc-300 flex flex-col text-start rounded-lg overflow-hidden w-96 h-max">
                                        <img src="{{ Storage::url($product->main_image) }}" alt=""
                                            class="w-full h-72 object-cover">
                                        <div class="p-4">
                                            <h3 class="text-secondary font-bold text-xl font-primary">
                                                {{ $product->name }}
                                            </h3>
                                            <p class="text-gray-800 font-secondary text-sm text-wrap">
                                                {{ $product->short_description }}
                                            </p>
                                        </div>
                                        <div class="p-4 flex justify-between items-end mt-auto">
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('products.details', $product->id) }}"
                                                    class="px-5 py-3 font-primary rounded-lg bg-secondary text-white flex items-center justify-center">
                                                    <x-icon icon="shopping-cart-add" class="w-5 h-5 text-current" />
                                                </a>
                                                <a href="{{ route('products.details', $product->id) }}"
                                                    class="px-5 py-3 font-primary rounded-lg bg-white text-secondary flex items-center justify-center border border-zinc-300 hover:bg-zinc-100 transition-colors">
                                                    <x-icon icon="arrow-right" class="w-5 h-5 text-current" />
                                                </a>
                                            </div>
                                            <span
                                                class="font-bold text-lg text-secondary font-secondary">${{ $product->price }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <button class="button-next absolute -right-14 z-40 hover:bg-zinc-100 rounded-lg cursor-pointer">
                        <x-icon icon="arrow-right" class="w-12 h-12 text-secondary" />
                    </button>
                </div>
                <a href=""
                    class="rounded-full bg-primary px-5 py-3 mx-auto w-max font-secondary text-white uppercase font-medium  hover:bg-secondary bg-gradient">
                    Ver más
                </a>
            </div>
        </section>
    </main>
@endsection
