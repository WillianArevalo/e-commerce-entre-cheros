@extends('layouts.template')

@section('title', 'Home')

@section('content')
    <section class="h-[300px] text-white w-full relative"
        style="background-image:url('{{ asset('images/fondo3.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full absolute bottom-0">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,224L34.3,213.3C68.6,203,137,181,206,176C274.3,171,343,181,411,170.7C480,160,549,128,617,133.3C685.7,139,754,181,823,176C891.4,171,960,117,1029,90.7C1097.1,64,1166,64,1234,90.7C1302.9,117,1371,171,1406,197.3L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
            </path>
        </svg>
    </section>
    <section class="relative -top-24">
        <div class="w-4/5 flex items-center justify-center mx-auto relative">
            <button
                class="button-prev-home absolute z-30 -left-14 border border-zinc-300 hover:bg-zinc-100 p-2 rounded-full cursor-pointer flex items-center justify-center">
                <x-icon icon="arrow-left" class="w-6 h-6 text-secondary" />
            </button>
            <div class="swiper swiper-home rounded-lg">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('images/banner.png') }}" alt="" class="h-[500px] w-full object-cover">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/banner2.jpg') }}" alt="" class="h-[500px] w-full object-cover">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/imagen6.png') }}" alt="" class="h-[500px] w-full object-cover">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/photo.jpg') }}" alt="" class="h-[500px] w-full object-cover">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/fondo.jpg') }}" alt="" class="h-[500px] w-full object-cover">
                    </div>
                </div>
            </div>
            <button
                class="button-next-home absolute -right-14 z-30 border border-zinc-300 p-2 hover:bg-zinc-100 rounded-full cursor-pointer flex items-center justify-center">
                <x-icon icon="arrow-right" class="w-6 h-6 text-secondary" />
            </button>
        </div>
    </section>
    <section class="px-20">
        <div class="flex flex-col gap-4 justify-center text-center items-center">
            <h2 class="font-primary text-secondary text-5xl w-2/3 uppercase font-bold">
                Lo mejor de <span class="font-tertiary">Entre Cheros</span>
            </h2>
            <p class="w-1/2 text-gray-600 font-secondary">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat.
            </p>
        </div>
        @if ($products->count() > 3)
            @include('layouts.__partials.slider', [
                'products' => $products,
            ])
        @else
            <div class="flex gap-4 items-center justify-center mt-4">
                @foreach ($products as $product)
                    <x-card-product :product="$product" :slide="false" />
                @endforeach
            </div>
        @endif
    </section>
@endsection
