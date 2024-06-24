@extends('layouts.template')

@section('title', 'Home')

@section('content')
    <main>
        <section class="home__header text-white w-full mt-12 relative"
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
                class="rounded-2xl font-medium bg-primary px-5 py-3 absolute bottom-14 z-20 left-52 font-secondary text-secondary uppercase border-2 border-secondary hover:bg-secondary hover:text-white flex items-center justify-center gap-2">
                <x-icon icon="store" class="w-5 h-5 text-current" />
                Comprar ahora
            </button>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 290" class="w-full absolute bottom-0">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,192L60,170.7C120,149,240,107,360,128C480,149,600,235,720,266.7C840,299,960,277,1080,240C1200,203,1320,149,1380,122.7L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>
        </section>
        <section class="home__body px-20 py-4">
            <div class="flex flex-col gap-4 justify-center w-full text-center">
                <h2 class="uppercase text-3xl font-primary text-secondary font-bold p-4">Productos más vendidos</h2>
                <div class="flex flex-wrap justify-center gap-6">
                    <div class="card bg-primary flex flex-col text-start rounded-2xl overflow-hidden w-96">
                        <img src="{{ asset('images/photo.jpg') }}" alt="" class="w-full h-72 object-cover">
                        <div class="p-4">
                            <h3 class="text-secondary font-bold text-xl font-primary">Product name</h3>
                            <p class="text-gray-800 font-secondary text-sm text-wrap">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua
                            </p>
                        </div>
                        <div class="p-4 flex justify-between items-end mt-auto">
                            <a href="{{ route('products.details', 12) }}"
                                class="px-5 py-3 font-primary rounded-xl bg-secondary text-white flex items-center justify-center">
                                <x-icon icon="arrow-right" class="w-5 h-5 text-current" />
                            </a>
                            <span class="font-bold text-lg text-secondary font-secondary">$4.50</span>
                        </div>
                    </div>
                    <div class="card bg-primary flex flex-col text-start rounded-2xl overflow-hidden w-96">
                        <img src="{{ asset('images/photo.jpg') }}" alt="" class="w-full h-72 object-cover">
                        <div class="p-4">
                            <h3 class="text-secondary font-bold text-xl font-primary">Product name</h3>
                            <p class="text-gray-800 font-secondary text-sm text-wrap">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua
                            </p>
                        </div>
                        <div class="p-4 flex justify-between items-end mt-auto">
                            <a href=""
                                class="px-5 py-3 font-primary rounded-xl bg-secondary text-white flex items-center justify-center">
                                <x-icon icon="arrow-right" class="w-5 h-5 text-current" />
                            </a>
                            <span class="font-bold text-lg text-secondary font-secondary">$4.50</span>
                        </div>
                    </div>
                    <div class="card bg-primary flex flex-col text-start rounded-2xl overflow-hidden w-96">
                        <img src="{{ asset('images/photo.jpg') }}" alt="" class="w-full h-72 object-cover">
                        <div class="p-4">
                            <h3 class="text-secondary font-bold text-xl font-primary">Product name</h3>
                            <p class="text-gray-800 font-secondary text-sm text-wrap">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua
                            </p>
                        </div>
                        <div class="p-4 flex justify-between items-end mt-auto">
                            <a href=""
                                class="px-5 py-3 font-primary rounded-xl bg-secondary text-white flex items-center justify-center">
                                <x-icon icon="arrow-right" class="w-5 h-5 text-current" />
                            </a>
                            <span class="font-bold text-lg text-secondary font-secondary">$4.50</span>
                        </div>
                    </div>
                </div>
                <a href=""
                    class="rounded-2xl bg-primary px-5 py-3 mx-auto w-max font-secondary text-secondary uppercase font-medium border-secondary border-2 hover:bg-secondary hover:text-white">
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
                    <button
                        class="rounded-2xl bg-primary px-5 py-3 w-max font-secondary text-secondary uppercase font-medium border-secondary border-2 hover:bg-secondary hover:text-white">
                        Comprar ahora
                    </button>
                </div>
                <div class="w-full flex items-center justify-center  flex-1">
                    <img src="{{ asset('images/photo.jpg') }}" alt="" class="w-72 h-64">
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
            <div class="flex gap-4 mt-10">
                <button>
                    <x-icon icon="arrow-left" class="w-12 h-12 text-secondary" />
                </button>
                <div
                    class="card border-2 border-primary relative flex flex-col text-start rounded-2xl overflow-hidden w-96 p-6 gap-4">
                    <img src="{{ asset('images/photo.jpg') }}" alt=""
                        class="w-full h-72 object-cover rounded-2xl border-2 border-primary">
                    <div class="flex flex-col gap-2">
                        <h3 class="text-secondary font-bold text-2xl font-primary">Product name</h3>
                        <p class="text-gray-800 font-secondary text-sm text-wrap">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua
                        </p>
                        <span class="font-bold text-lg text-secondary font-primary">$4.50</span>
                    </div>
                    <div class="bg-primary w-20 py-1 px-2 font-secondary font-bold absolute top-80 right-0">20%</div>
                    <div class="flex justify-between items-center mt-auto">
                        <a href=""
                            class="px-5 py-3 font-primary rounded-xl bg-secondary text-white flex items-center justify-center">
                            <x-icon icon="shopping-cart" class="w-5 h-5 text-current" />
                        </a>
                        <a href=""
                            class="px-5 py-3 font-primary rounded-xl bg-secondary text-white flex items-center justify-center">
                            <x-icon icon="arrow-right" class="w-5 h-5 text-current" />
                        </a>
                    </div>
                </div>
                <div
                    class="card border-2 border-primary relative flex flex-col text-start rounded-2xl overflow-hidden w-96 p-6 gap-4">
                    <img src="{{ asset('images/photo.jpg') }}" alt=""
                        class="w-full h-72 object-cover rounded-2xl border-2 border-primary">
                    <div class="flex flex-col gap-2">
                        <h3 class="text-secondary font-bold text-2xl font-primary">Product name</h3>
                        <p class="text-gray-800 font-secondary text-sm text-wrap">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua
                        </p>
                        <span class="font-bold text-lg text-secondary font-primary">$4.50</span>
                    </div>
                    <div class="bg-primary w-20 py-1 px-2 font-secondary font-bold absolute top-80 right-0">20%</div>
                    <div class="flex justify-between items-center mt-auto">
                        <a href=""
                            class="px-5 py-3 font-primary rounded-xl bg-secondary text-white flex items-center justify-center">
                            <x-icon icon="shopping-cart" class="w-5 h-5 text-current" />
                        </a>
                        <a href=""
                            class="px-5 py-3 font-primary rounded-xl bg-secondary text-white flex items-center justify-center">
                            <x-icon icon="arrow-right" class="w-5 h-5 text-current" />
                        </a>
                    </div>
                </div>
                <div
                    class="card border-2 border-primary relative flex flex-col text-start rounded-2xl overflow-hidden w-96 p-6 gap-4">
                    <img src="{{ asset('images/photo.jpg') }}" alt=""
                        class="w-full h-72 object-cover rounded-2xl border-2 border-primary">
                    <div class="flex flex-col gap-2">
                        <h3 class="text-secondary font-bold text-2xl font-primary">Product name</h3>
                        <p class="text-gray-800 font-secondary text-sm text-wrap">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua
                        </p>
                        <span class="font-bold text-lg text-secondary font-primary">$4.50</span>
                    </div>
                    <div class="bg-primary w-20 py-1 px-2 font-secondary font-bold absolute top-80 right-0">20%</div>
                    <div class="flex justify-between items-center mt-auto">
                        <a href=""
                            class="px-5 py-3 font-primary rounded-xl bg-secondary text-white flex items-center justify-center">
                            <x-icon icon="shopping-cart" class="w-5 h-5 text-current" />
                        </a>
                        <a href=""
                            class="px-5 py-3 font-primary rounded-xl bg-secondary text-white flex items-center justify-center">
                            <x-icon icon="arrow-right" class="w-5 h-5 text-current" />
                        </a>
                    </div>
                </div>
                <button>
                    <x-icon icon="arrow-right" class="w-12 h-12 text-secondary" />
                </button>
            </div>
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
                <button
                    class="rounded-2xl bg-primary px-5 py-3 absolute  left-20 bottom-20 font-secondary text-secondary uppercase font-medium flex items-center gap-2 hover:bg-secondary hover:text-white">
                    <x-icon icon="store" class="w-5 h-5 text-current" />
                    Tienda
                </button>
            </div>
        </section>
        <section class="w-full bg-tertiary px-20 py-10 mt-8">
            <div class="flex gap-4 justify-center items-center w-3/4 mx-auto">
                <div class="w-full flex items-center justify-center">
                    <img src="{{ asset('images/photo.jpg') }}" alt="" class="w-72 h-64">
                </div>
                <div class="flex flex-col gap-4 w-max justify-end">
                    <h2 class="font-bold text-white text-4xl font-primary uppercase text-end">
                        Conecta con tus raíces salvadoreñas los mejores productos auténticos y tradicionales a tu alcance
                    </h2>
                    <button
                        class="rounded-2xl bg-primary px-5 py-3 w-max font-secondary text-secondary uppercase font-medium border-secondary border-2 hover:bg-secondary hover:text-white ml-auto">
                        Comprar ahora
                    </button>
                </div>
            </div>
        </section>
    </main>
@endsection
