@extends('layouts.template')
@section('title', 'Home')
@section('content')
    <div class="overflow-x-hidden">
        <section class="relative h-[400px] w-full text-white md:h-[500px] lg:h-[600px]"
            style="background-image:url('{{ asset('images/fondo.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
            <div class="flex w-full flex-col gap-4" data-aos="fade-right">
                <h1
                    class="mx-10 mt-20 text-start font-league-spartan text-2xl font-bold uppercase md:text-3xl lg:text-4xl xl:mt-36 xl:text-6xl">
                    ¡Bienvenido a tu <span class="block">rincón salvadoreño!</span>
                </h1>
                <p class="font-secondary text-wrap mx-10 inline-block text-start text-sm font-semibold md:text-lg">
                    Explora una selcción de productos auténticos que te harán <br> sentir más cerca de El Salvador.
                </p>
            </div>
            <div class="flex items-center justify-center xl:block">
                <x-button-store typeButton="primary" type="a" href="{{ Route('store.products') }}" text="Comprar ahora"
                    class="absolute bottom-0 z-20 font-bold lg:px-12 lg:py-5 xl:bottom-14 xl:left-48" icon="store"
                    data-aos="fade-right" />
            </div>
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
            <div class="flex flex-wrap justify-center gap-2">
                @if ($categories->count() > 0)
                    @foreach ($categories as $category)
                        <x-button-store type="a" typeButton="secondary" text="{{ $category->name }}"
                            href="{{ route('store.search', ['search' => 'categorie_id', 'value' => $category->id]) }}" />
                    @endforeach
                @endif
            </div>
        </section>
        @if ($flashOffers->count() > 0)
            <section class="px-4 py-4 sm:px-10 md:px-20">
                <div class="flex w-full flex-col justify-center gap-4 text-center">
                    <h2 class="p-4 font-league-spartan text-2xl font-bold uppercase text-secondary md:text-3xl">
                        Ofertas relampago
                    </h2>
                    @if ($flashOffers->count() > 3)
                        @include('layouts.__partials.store.slider', [
                            'products' => $flashOffers,
                        ])
                    @else
                        <div class="flex items-center justify-center gap-4">
                            @foreach ($flashOffers as $product)
                                <x-card-product :product="$product" :slide="false" width="w-auto md:w-96" />
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

        <section class="mt-8 w-full bg-primary px-4 py-10 md:px-20">
            <div class="mx-auto flex w-full flex-col items-center justify-center gap-4 md:flex-row">
                <div class="flex flex-1 flex-col items-center gap-4 md:items-start" data-aos="fade-right">
                    <h2
                        class="text-center font-league-spartan text-xl font-bold uppercase text-white md:text-left md:text-2xl lg:text-4xl">
                        Descubre el sabor y la tradición de El Salvador con nuestra variedad de productos únicos
                    </h2>
                    <x-button-store type="button" typeButton="secondary" text="Comprar ahora" class="w-max" />
                </div>
                <div class="flex w-full flex-1 items-center justify-center" data-aos="zoom-in-left">
                    <img src="{{ asset('images/imagen1.png') }}" alt="" class="h-full w-full md:h-64 md:w-72">
                </div>
            </div>
        </section>

        <section class="mt-8 p-4 md:mt-0 lg:p-20">
            <div class="flex flex-col items-center justify-center gap-4 text-center">
                <h2 class="font-league-spartan text-xl font-bold uppercase text-secondary md:w-2/3 md:text-3xl lg:text-5xl">
                    Descubre todo lo que traemos de El Salvador para ti
                </h2>
                <p class="text-sm text-zinc-600 md:text-base lg:w-1/2">
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

        <section class="mt-8 xl:mt-0 xl:px-40" data-aos="zoom-in">
            <div style="background-image:url('{{ asset('images/fondo.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;"
                class="relative h-[300px] w-full lg:h-[600px] xl:rounded-[72px]">
                <h2
                    class="text-wrap absolute right-10 top-10 w-3/6 text-end font-league-spartan text-xl font-semibold uppercase text-secondary sm:text-2xl md:text-2xl lg:text-4xl xl:right-20 xl:top-20">
                    Disfruta de un pedacito de
                    <br>
                    <span class="text-2xl font-bold md:text-4xl lg:text-6xl">
                        El Salvador
                    </span>
                </h2>
                <x-button-store type="a" typeButton="primary" text="Tienda" icon="store"
                    class="absolute bottom-0 mb-4 ms-4 xl:bottom-20 xl:left-20 xl:mb-0 xl:ms-0" />
            </div>
        </section>

        <section class="w-full bg-primary px-4 py-10 md:px-10 lg:mt-8 lg:px-20">
            <div class="mx-auto flex w-full flex-col items-center justify-center gap-4 md:flex-row"
                data-aos="zoom-in-right">
                <div class="flex w-full flex-1 items-center justify-center">
                    <img src="{{ asset('images/imagen2.png') }}" alt="" class="h-full w-full md:h-64 md:w-72">
                </div>
                <div class="flex flex-1 flex-col items-center gap-4 md:items-start" data-aos="fade-left">
                    <h2
                        class="text-center font-league-spartan text-xl font-bold uppercase text-white md:text-right md:text-2xl lg:text-4xl">
                        Conecta con tus raíces salvadoreñas los mejores productos auténticos y tradicionales a tu alcance
                    </h2>
                    <x-button-store type="a" typeButton="secondary" text="Comprar ahora" class="ml-auto" />
                </div>
            </div>
        </section>
    </div>
@endsection
