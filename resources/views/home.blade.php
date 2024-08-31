@extends('layouts.template')
@section('title', 'Home')
@section('content')
    <main>
        <section class="home__header relative w-full text-white"
            style="background-image:url('{{ asset('images/fondo.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
            <div class="relative left-20 top-32 flex w-2/3 flex-col gap-4" data-aos="fade-right">
                <h1 class="text-start font-league-spartan text-6xl font-bold uppercase">
                    ¡Bienvenido a tu <span class="block">rincón salvadoreño!</span>
                </h1>
                <p class="font-secondary w-2/4 text-start text-lg font-semibold">
                    Explora una selcción de productos auténticos que te harán sentir más cerca de El Salvador.
                </p>
            </div>
            <x-button-store typeButton="primary" type="a" href="{{ Route('store.products') }}" text="Comprar ahora"
                class="absolute bottom-14 left-48 z-20 px-12 py-5 font-bold" icon="store" data-aos="fade-right" />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 290" class="absolute bottom-0 w-full">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,192L60,170.7C120,149,240,107,360,128C480,149,600,235,720,266.7C840,299,960,277,1080,240C1200,203,1320,149,1380,122.7L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>
        </section>
        <section class="mt-4">
            <h2 class="p-4 text-center font-league-spartan text-3xl font-bold text-secondary">
                Categorías
            </h2>
            <div class="flex justify-center gap-2">
                @if ($categories->count() > 0)
                    @foreach ($categories as $category)
                        <x-button-store type="a" typeButton="secondary" text="{{ $category->name }}"
                            href="{{ route('store.search', ['search' => 'categorie_id', 'value' => $category->id]) }}" />
                    @endforeach
                @endif
            </div>
        </section>
        @if ($flashOffers->count() > 0)
            <section class="px-20 py-4">
                <div class="flex w-full flex-col justify-center gap-4 text-center">
                    <h2 class="p-4 font-league-spartan text-3xl font-bold uppercase text-secondary">
                        Ofertas relampago
                    </h2>
                    @if ($flashOffers->count() > 3)
                        @include('layouts.__partials.store.slider', [
                            'products' => $flashOffers,
                        ])
                    @else
                        <div class="flex items-center justify-center gap-4">
                            @foreach ($flashOffers as $product)
                                <x-card-product :product="$product" :slide="false" width="w-96" />
                            @endforeach
                        </div>
                    @endif
                    <a href=""
                        class="bg-gradient font-secondary mx-auto w-max rounded-full bg-primary px-5 py-3 font-medium uppercase text-white hover:bg-secondary">
                        Ver más
                    </a>
                </div>
            </section>
        @endif
        <section class="mt-8 w-full bg-tertiary px-20 py-10">
            <div class="mx-auto flex w-full items-center justify-center gap-4">
                <div class="flex flex-1 flex-col gap-4" data-aos="fade-right">
                    <h2 class="font-league-spartan text-4xl font-bold uppercase text-white">
                        Descubre el sabor y la tradición de El Salvador con nuestra variedad de productos únicos
                    </h2>
                    <x-button-store type="button" typeButton="secondary" text="Comprar ahora" class="w-max" />
                </div>
                <div class="flex w-full flex-1 items-center justify-center" data-aos="zoom-in-left">
                    <img src="{{ asset('images/imagen1.png') }}" alt="" class="h-64 w-72">
                </div>
            </div>
        </section>
        <section class="p-20">
            <div class="flex flex-col items-center justify-center gap-4 text-center">
                <h2 class="w-2/3 font-league-spartan text-5xl font-bold uppercase text-secondary">
                    Descubre todo lo que traemos de El Salvador para ti
                </h2>
                <p class="w-1/2 text-zinc-600">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat.
                </p>
            </div>
            @if ($products)
                <div id="slider">
                    @include('layouts.__partials.store.slider', [
                        'products' => $products,
                    ])
                </div>
            @endif
        </section>
        <section class="px-40" data-aos="zoom-in">
            <div style="background-image:url('{{ asset('images/fondo.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover; height: 600px; border-radius:70px"
                class="relative w-full">
                <h2
                    class="text-wrap absolute right-20 top-20 w-3/6 text-end font-league-spartan text-4xl font-semibold uppercase text-secondary">
                    Disfruta de un pedacito de
                    <br>
                    <span class="text-6xl font-bold">
                        El Salvador
                    </span>
                </h2>
                <x-button-store type="a" typeButton="primary" text="Tienda" icon="store"
                    class="absolute bottom-20 left-20" />
            </div>
        </section>
        <section class="mt-8 w-full bg-tertiary px-20 py-10">
            <div class="mx-auto flex w-3/4 items-center justify-center gap-4" data-aos="zoom-in-right">
                <div class="flex w-full items-center justify-center">
                    <img src="{{ asset('images/imagen2.png') }}" alt="" class="h-64 w-72">
                </div>
                <div class="flex w-max flex-col justify-end gap-4" data-aos="fade-left">
                    <h2 class="text-end font-league-spartan text-4xl font-bold uppercase text-white">
                        Conecta con tus raíces salvadoreñas los mejores productos auténticos y tradicionales a tu alcance
                    </h2>
                    <x-button-store type="a" typeButton="secondary" text="Comprar ahora" class="ml-auto" />
                </div>
            </div>
        </section>
    </main>
@endsection
