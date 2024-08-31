@extends('layouts.template')
@section('title', 'Home')
@section('content')
    <main>
        <section class="relative h-[300px] w-full text-white"
            style="background-image:url('{{ asset('images/fondo3.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute bottom-0 w-full">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,192L30,170.7C60,149,120,107,180,90.7C240,75,300,85,360,117.3C420,149,480,203,540,197.3C600,192,660,128,720,128C780,128,840,192,900,202.7C960,213,1020,171,1080,138.7C1140,107,1200,85,1260,80C1320,75,1380,85,1410,90.7L1440,96L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
                </path>
            </svg>
        </section>
        <section class="relative -top-28 px-20 py-4">
            <div class="flex w-full flex-col justify-center gap-4 text-center">
                <h2 class="p-4 font-mystical text-5xl uppercase text-secondary" data-aos="fade-up">
                    Favoritos
                </h2>
                @if ($favorites->count() > 0)
                    <div class="mx-auto flex flex-wrap justify-center gap-4">
                        @foreach ($favorites as $product)
                            <x-card-product :product="$product" :slide="false" width="w-auto" />
                        @endforeach
                    </div>
                @else
                    <p class="font-secondary p-20 text-center text-lg font-medium">No hay productos favoritos</p>
                @endif
                <div class="mt-8 flex w-full items-center justify-center">
                    <x-button-store type="a" href="{{ route('store.products') }}" text="Ver más productos"
                        typeButton="primary" />
                </div>
            </div>
        </section>
    </main>
@endsection
