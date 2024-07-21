@extends('layouts.template')

@section('title', 'Home')

@section('content')
    <main>
        <section class="home__header text-white w-full relative"
            style="background-image:url('{{ asset('images/fondo.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
            <div class="relative top-32 w-2/3 flex gap-4 flex-col left-20">
                <h1 class="text-6xl font-primary font-bold uppercase text-start">
                    ¡Bienvenido a tu <span class="block">rincón salvadoreño!</span>
                </h1>
                <p class="text-start font-semibold font-secondary w-2/4 text-lg">
                    Explora una selcción de productos auténticos que te harán sentir más cerca de El Salvador.
                </p>
            </div>
            <button
                class="rounded-full font-medium bg-primary px-5 py-3 absolute bottom-14 z-20 left-52 font-secondary text-white uppercase hover:bg-secondary flex items-center justify-center gap-2 bg-gradient">
                <x-icon icon="store" class="w-5 h-5 text-current" />
                Comprar ahora
            </button>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 290" class="w-full absolute bottom-0">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,192L60,170.7C120,149,240,107,360,128C480,149,600,235,720,266.7C840,299,960,277,1080,240C1200,203,1320,149,1380,122.7L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>
        </section>
        <section class="mt-4">
            <h2 class="text-center text-3xl font-primary text-secondary font-bold p-4">
                Categorías
            </h2>
            <div class="flex justify-center gap-2">
                @if ($categories->count() > 0)
                    @foreach ($categories as $category)
                        <x-button type="a" typeButton="store-secondary" text="{{ $category->name }}" href="" />
                    @endforeach
                @endif
            </div>
        </section>
        <section class="home__body px-20 py-4">
            <div class="flex flex-col gap-4 justify-center w-full text-center">
                <h2 class="uppercase text-3xl font-primary text-secondary font-bold p-4">
                    Ofertas relampago
                </h2>
                @if ($flashOffers->count() > 3)
                    @include('layouts.__partials.slider', [
                        'products' => $flashOffers,
                    ])
                @else
                    <div class="flex gap-4 items-center justify-center">
                        @foreach ($flashOffers as $product)
                            <x-card-product :product="$product" :slide="false" />
                        @endforeach
                    </div>
                @endif
                <a href=""
                    class="rounded-full bg-primary px-5 py-3 mx-auto w-max font-secondary text-white uppercase font-medium  hover:bg-secondary bg-gradient">
                    Ver más
                </a>
            </div>
        </section>
        <section class="w-full bg-tertiary px-20 py-10 mt-8">
            <div class="flex gap-4 justify-center items-center w-full mx-auto">
                <div class="flex flex-col gap-4 flex-1">
                    <h2 class="font-bold text-white text-4xl font-primary uppercase">
                        Descubre el sabor y la tradición de El Salvador con nuestra variedad de productos únicos
                    </h2>
                    <x-button type="button" typeButton="store-secondary" text="Comprar ahora" />
                </div>
                <div class="w-full flex items-center justify-center  flex-1">
                    <img src="{{ asset('images/imagen1.png') }}" alt="" class="w-72 h-64">
                </div>
            </div>
        </section>
        <section class="p-20">
            <div class="flex flex-col gap-4 justify-center text-center items-center">
                <h2 class="font-primary text-secondary text-5xl w-2/3 uppercase font-bold">
                    Descubre todo lo que traemos de El Salvador para ti
                </h2>
                <p class="w-1/2 text-gray-600">
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
        <section class="px-40">
            <div style="background-image:url('{{ asset('images/fondo.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover; height: 600px; border-radius:70px"
                class="w-full relative">
                <h2
                    class="absolute right-20 top-20 uppercase w-3/6 text-wrap text-end text-4xl text-secondary font-semibold font-primary">
                    Disfruta de un pedacito de
                    <br>
                    <span class="text-6xl font-bold">
                        El Salvador
                    </span>
                </h2>

                <x-button type="a" typeButton="store-gradient" text="Tienda" icon="store"
                    class=" absolute  left-20 bottom-20 " />
            </div>
        </section>
        <section class="w-full bg-tertiary px-20 py-10 mt-8">
            <div class="flex gap-4 justify-center items-center w-3/4 mx-auto">
                <div class="w-full flex items-center justify-center">
                    <img src="{{ asset('images/imagen2.png') }}" alt="" class="w-72 h-64">
                </div>
                <div class="flex flex-col gap-4 w-max justify-end">
                    <h2 class="font-bold text-white text-4xl font-primary uppercase text-end">
                        Conecta con tus raíces salvadoreñas los mejores productos auténticos y tradicionales a tu alcance
                    </h2>
                    <x-button type="a" typeButton="store-secondary" text="Comprar ahora" class="ml-auto" />
                </div>
            </div>
        </section>
    </main>
@endsection
