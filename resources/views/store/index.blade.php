@extends('layouts.template')

@section('title', 'Home')

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
        <section class="relative -top-24" data-aos="zoom-in">
            <div class="relative mx-auto flex w-4/5 items-center justify-center">
                <button
                    class="button-prev-home absolute -left-14 z-30 flex cursor-pointer items-center justify-center rounded-full border border-zinc-400 p-2 hover:bg-zinc-100">
                    <x-icon icon="arrow-left" class="h-6 w-6 text-secondary" />
                </button>
                <div class="swiper swiper-home rounded-lg">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{ asset('images/fondo4.jpg') }}" alt=""
                                class="h-[500px] w-full object-cover">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('images/fondo5.jpg') }}" alt=""
                                class="h-[500px] w-full object-cover">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('images/fondo6.jpg') }}" alt=""
                                class="h-[500px] w-full object-cover">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('images/fondo7.jpg') }}" alt=""
                                class="h-[500px] w-full object-cover">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('images/fondo.jpg') }}" alt="" class="h-[500px] w-full object-cover">
                        </div>
                    </div>
                </div>
                <button
                    class="button-next-home absolute -right-14 z-30 flex cursor-pointer items-center justify-center rounded-full border border-zinc-400 p-2 hover:bg-zinc-100">
                    <x-icon icon="arrow-right" class="h-6 w-6 text-secondary" />
                </button>
            </div>
        </section>
        <section class="px-20">
            <div class="mb-8 flex flex-col items-center justify-center gap-4 text-center" data-aos="fade-up">
                <h2 class="w-2/3 font-league-spartan text-5xl font-bold uppercase text-secondary">
                    Lo mejor de <span class="font-mystical">Entre Cheros</span>
                </h2>
                <p class="font-secondary w-1/2 text-zinc-600">
                    Encuentra los mejores productos de la región, hechos con amor y calidad.
                </p>
            </div>
            @if ($products->count() > 3)
                @include('layouts.__partials.store.slider', [
                    'products' => $products,
                ])
            @else
                <div class="mt-4 flex items-center justify-center gap-4">
                    @foreach ($products as $product)
                        <x-card-product :product="$product" :slide="false" />
                    @endforeach
                </div>
            @endif
        </section>
        <section class="mt-16 px-20">
            <div class="flex justify-center gap-6">
                @if ($categories->count() > 0)
                    @foreach ($categories as $category)
                        <a href="{{ route('store.search', ['search' => 'categorie_id', 'value' => $category->id]) }}"
                            class="font-secondary flex flex-col items-center justify-center gap-2" data-aos="zoom-in">
                            <img src="{{ Storage::url($category->image) }}" alt=""
                                class="h-40 w-40 rounded-full object-cover">
                            {{ $category->name }}
                        </a>
                    @endforeach
                @endif
            </div>
        </section>
    </div>
@endsection
