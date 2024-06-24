@extends('layouts.template')

@section('title', 'Checkout')

@section('content')
    <main>
        <div class="w-full h-80 mt-12 relative"
            style="background-image:url('{{ asset('images/fondo2.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 290" class="w-full absolute bottom-0">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,192L60,170.7C120,149,240,107,360,128C480,149,600,235,720,266.7C840,299,960,277,1080,240C1200,203,1320,149,1380,122.7L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>
        </div>
        <section class="mb-20">
            <div class="px-20 flex flex-col gap-4">
                <div class="flex gap-10">
                    <div class="flex-[2] flex gap-4 flex-col">
                        <ol class="flex items-center">
                            <li class="flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-tertiary"
                                title="Información del cliente">
                                <span
                                    class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-tertiary shrink-0">
                                    <x-icon icon="user-info" class="w-6 h-6 text-white" />
                                </span>
                            </li>
                            <li
                                class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                                <span
                                    class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                    <x-icon icon="payment" class="w-6 h-6 text-white" />
                                </span>
                            </li>
                            <li class="flex items-center w-full">
                                <span
                                    class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                                    <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-100" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path
                                            d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z" />
                                    </svg>
                                </span>
                            </li>
                        </ol>
                        <div class="flex flex-col gap-4">
                            <form action="" class="flex flex-col gap-10">
                                <div class="flex flex-col gap-2 font-secondary">
                                    <h1 class="font-primary font-bold uppercase text-2xl text-secondary">
                                        Información del cliente
                                    </h1>
                                    <div class="flex flex-col gap-4">
                                        <div class="flex w-full gap-4">
                                            <div class="flex flex-col gap-2 flex-1">
                                                <label for="">Nombre del cliente</label>
                                                <input type="text"
                                                    class="border-2 border-tertiary rounded-lg px-3 py-2 focus:outline-none focus:border-secondary"
                                                    placeholder="Ingresa aquí tu nombre">
                                            </div>
                                            <div class="flex flex-col gap-2  flex-1">
                                                <label for="">Apellido del cliente</label>
                                                <input type="text"
                                                    class="border-2 border-tertiary rounded-lg px-3 py-2 focus:outline-none focus:border-secondary"
                                                    placeholder="Ingresa aquí tu apellido">
                                            </div>
                                        </div>
                                        <div class="flex w-full gap-4">
                                            <div class="flex flex-col gap-2 flex-1">
                                                <label for="">Correo electrónico</label>
                                                <input type="email"
                                                    class="border-2 border-tertiary rounded-lg px-3 py-2 focus:outline-none focus:border-secondary"
                                                    placeholder="Ingresa aquí tu correo electrónico">
                                            </div>
                                            <div class="flex flex-col gap-2  flex-1">
                                                <label for="">Telefono</label>
                                                <input type="text"
                                                    class="border-2 border-tertiary rounded-lg px-3 py-2 focus:outline-none focus:border-secondary"
                                                    placeholder="Ingresa aquí tu telefono">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2 font-secondary">
                                    <h1 class="font-primary font-bold uppercase text-2xl text-secondary">
                                        Dirección de envio
                                    </h1>
                                    <div class="flex flex-col gap-4">
                                        <div class="flex w-full gap-4">
                                            <div class="flex flex-col gap-2 flex-1">
                                                <label for="">País</label>
                                                <input type="text"
                                                    class="border-2 border-tertiary rounded-lg px-3 py-2 focus:outline-none focus:border-secondary"
                                                    placeholder="Ingresa aquí tu nombre">
                                            </div>
                                            <div class="flex flex-col gap-2  flex-1">
                                                <label for="">Dirección</label>
                                                <input type="text"
                                                    class="border-2 border-tertiary rounded-lg px-3 py-2 focus:outline-none focus:border-secondary"
                                                    placeholder="Ingresa aquí tu apellido">
                                            </div>
                                        </div>
                                        <div class="flex w-full gap-4">
                                            <div class="flex flex-col gap-2 flex-1">
                                                <label for="">Código postal</label>
                                                <input type="email"
                                                    class="border-2 border-tertiary rounded-lg px-3 py-2 focus:outline-none focus:border-secondary"
                                                    placeholder="Ingresa aquí tu correo electrónico">
                                            </div>
                                            <div class="flex flex-col gap-2  flex-1">
                                                <label for="">Ciudad</label>
                                                <input type="text"
                                                    class="border-2 border-tertiary rounded-lg px-3 py-2 focus:outline-none focus:border-secondary"
                                                    placeholder="Ingresa aquí tu telefono">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <a href="{{ route('cart') }}"
                                        class="w-max bg-gray-300 text-black font-secondary flex items-center py-2 px-4 rounded-lg hover:bg-gray-900 hover:text-white gap-2">
                                        <x-icon icon="shopping-cart" class="w-5 h-5 text-current" />
                                        Regresar al carrito
                                    </a>
                                    <button
                                        class="bg-secondary text-white font-secondary text-base py-2 px-4 rounded-lg hover:bg-tertiary flex items-center gap-2">
                                        Continuar
                                        <x-icon icon="arrow-right" class="w-5 h-5 text-current" />
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="w-full flex-1">
                        <div class="border-2 border-tertiary p-6 rounded-xl mt-4 z-10 bg-white">
                            <div class="flex justify-between">
                                <h2 class="text-secondary text-3xl font-primary uppercase font-bold">
                                    Su pedido
                                </h2>
                                <a href="{{ route('cart') }}"
                                    class="font-secondary text-sm flex items-center justify-center bg-quaternary px-3 py-1 rounded-xl hover:bg-tertiary hover:text-white">
                                    Editar carrito
                                </a>
                            </div>
                            <div class="flex gap-4 flex-col mt-6">
                                <div class="flex gap-4">
                                    <div class="flex-1 flex flex-col items-center justify-center gap-2">
                                        <img src="{{ asset('images/photo.jpg') }}" alt=""
                                            class="w-32 h-32 rounded-xl">
                                        <a href="" class="text-xs font-secondary text-gray-600">Mostrar
                                            detalles</a>
                                    </div>
                                    <div class="flex-[2]">
                                        <h3 class="font-primary font-bold text-secondary text-lg">Product name</h3>
                                        <p class="font-secondary">$.4.50</p>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex-1 flex flex-col items-center justify-center gap-2">
                                        <img src="{{ asset('images/photo.jpg') }}" alt=""
                                            class="w-32 h-32 rounded-xl">
                                        <a href="" class="text-xs font-secondary text-gray-600">Mostrar
                                            detalles</a>
                                    </div>
                                    <div class="flex-[2]">
                                        <h3 class="font-primary font-bold text-secondary text-lg">Product name</h3>
                                        <p class="font-secondary">$.4.50</p>
                                    </div>
                                </div>
                                <div class="border-t-2 border-tertiary mt-6 font-secondary">
                                    <div class="flex justify-between mt-2">
                                        <p class="text-secondary">Subtotal</p>
                                        <p class="text-secondary">$4.50</p>
                                    </div>
                                    <div class="flex justify-between mt-2">
                                        <p class="text-secondary">Impuesto</p>
                                        <p class="text-secondary">$4.50</p>
                                    </div>
                                    <div class="flex justify-between mt-2">
                                        <p class="text-secondary">Envió</p>
                                        <p class="text-secondary">$4.50</p>
                                    </div>
                                    <div class="flex justify-between mt-2 font-bold text-lg">
                                        <p class="text-secondary">Total pedido</p>
                                        <p class="text-secondary">$4.50</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <section class="px-20 py-4 mt-10 mb-20">
            <div class="flex flex-col gap-4 justify-center w-full text-start">
                <h2 class="uppercase text-3xl font-primary text-secondary font-bold ml-16 border-b-2 pb-4 border-tertiary">
                    ¡Haz tu compra aún más especial!
                </h2>
                <div class="flex justify-center gap-6">
                    <button>
                        <x-icon icon="arrow-left" class="w-12 h-12 text-secondary" />
                    </button>
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
                                class="px-5 py-3 rounded-xl bg-secondary text-white flex items-center justify-center">
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
                                class="px-5 py-3 rounded-xl bg-secondary text-white flex items-center justify-center">
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
                            <a href="{{ route('products.details', 12) }}"
                                class="px-5 py-3 rounded-xl bg-secondary text-white flex items-center justify-center">
                                <x-icon icon="arrow-right" class="w-5 h-5 text-current" />
                            </a>
                            <span class="font-bold text-lg text-secondary font-secondary">$4.50</span>
                        </div>
                    </div>
                    <button>
                        <x-icon icon="arrow-right" class="w-12 h-12 text-secondary" />
                    </button>
                </div>
            </div>
        </section>
    </main>

@endsection
