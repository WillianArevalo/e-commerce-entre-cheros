@extends('layouts.template')

@section('title', 'Checkout')

@section('content')
    <main>
        <div class="relative mt-12 h-80 w-full"
            style="background-image:url('{{ asset('images/fondo2.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 290" class="absolute bottom-0 w-full">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,192L60,170.7C120,149,240,107,360,128C480,149,600,235,720,266.7C840,299,960,277,1080,240C1200,203,1320,149,1380,122.7L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>
        </div>
        <section class="mb-20">
            <div class="flex flex-col gap-4 px-20">
                <div class="flex gap-10">
                    <div class="flex flex-[2] flex-col gap-4">
                        <ol class="flex items-center">
                            <li class="flex w-full items-center text-blue-600 after:inline-block after:h-1 after:w-full after:border-4 after:border-b after:border-blue-100 after:content-[''] dark:text-blue-500 dark:after:border-tertiary"
                                title="Información del cliente">
                                <span
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-100 dark:bg-tertiary lg:h-12 lg:w-12">
                                    <x-icon icon="user-info" class="h-6 w-6 text-white" />
                                </span>
                            </li>
                            <li
                                class="flex w-full items-center after:inline-block after:h-1 after:w-full after:border-4 after:border-b after:border-zinc-100 after:content-[''] dark:after:border-zinc-700">
                                <span
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-zinc-100 dark:bg-zinc-700 lg:h-12 lg:w-12">
                                    <x-icon icon="payment" class="h-6 w-6 text-white" />
                                </span>
                            </li>
                            <li class="flex w-full items-center">
                                <span
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-zinc-100 dark:bg-zinc-700 lg:h-12 lg:w-12">
                                    <svg class="h-4 w-4 text-zinc-500 dark:text-zinc-100 lg:h-5 lg:w-5" aria-hidden="true"
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
                                    <h1 class="font-primary text-2xl font-bold uppercase text-secondary">
                                        Información del cliente
                                    </h1>
                                    <div class="flex flex-col gap-4">
                                        <div class="flex w-full gap-4">
                                            <div class="flex flex-1 flex-col gap-2">
                                                <label for="">Nombre del cliente</label>
                                                <input type="text"
                                                    class="rounded-lg border-2 border-tertiary px-3 py-2 focus:border-secondary focus:outline-none"
                                                    placeholder="Ingresa aquí tu nombre">
                                            </div>
                                            <div class="flex flex-1 flex-col gap-2">
                                                <label for="">Apellido del cliente</label>
                                                <input type="text"
                                                    class="rounded-lg border-2 border-tertiary px-3 py-2 focus:border-secondary focus:outline-none"
                                                    placeholder="Ingresa aquí tu apellido">
                                            </div>
                                        </div>
                                        <div class="flex w-full gap-4">
                                            <div class="flex flex-1 flex-col gap-2">
                                                <label for="">Correo electrónico</label>
                                                <input type="email"
                                                    class="rounded-lg border-2 border-tertiary px-3 py-2 focus:border-secondary focus:outline-none"
                                                    placeholder="Ingresa aquí tu correo electrónico">
                                            </div>
                                            <div class="flex flex-1 flex-col gap-2">
                                                <label for="">Telefono</label>
                                                <input type="text"
                                                    class="rounded-lg border-2 border-tertiary px-3 py-2 focus:border-secondary focus:outline-none"
                                                    placeholder="Ingresa aquí tu telefono">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2 font-secondary">
                                    <h1 class="font-primary text-2xl font-bold uppercase text-secondary">
                                        Dirección de envio
                                    </h1>
                                    <div class="flex flex-col gap-4">
                                        <div class="flex w-full gap-4">
                                            <div class="flex flex-1 flex-col gap-2">
                                                <label for="">País</label>
                                                <input type="text"
                                                    class="rounded-lg border-2 border-tertiary px-3 py-2 focus:border-secondary focus:outline-none"
                                                    placeholder="Ingresa aquí tu nombre">
                                            </div>
                                            <div class="flex flex-1 flex-col gap-2">
                                                <label for="">Dirección</label>
                                                <input type="text"
                                                    class="rounded-lg border-2 border-tertiary px-3 py-2 focus:border-secondary focus:outline-none"
                                                    placeholder="Ingresa aquí tu apellido">
                                            </div>
                                        </div>
                                        <div class="flex w-full gap-4">
                                            <div class="flex flex-1 flex-col gap-2">
                                                <label for="">Código postal</label>
                                                <input type="email"
                                                    class="rounded-lg border-2 border-tertiary px-3 py-2 focus:border-secondary focus:outline-none"
                                                    placeholder="Ingresa aquí tu correo electrónico">
                                            </div>
                                            <div class="flex flex-1 flex-col gap-2">
                                                <label for="">Ciudad</label>
                                                <input type="text"
                                                    class="rounded-lg border-2 border-tertiary px-3 py-2 focus:border-secondary focus:outline-none"
                                                    placeholder="Ingresa aquí tu telefono">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between">
                                    <a href="{{ route('cart') }}"
                                        class="flex w-max items-center gap-2 rounded-lg bg-zinc-300 px-4 py-2 font-secondary text-black hover:bg-zinc-900 hover:text-white">
                                        <x-icon icon="shopping-cart" class="h-5 w-5 text-current" />
                                        Regresar al carrito
                                    </a>
                                    <button
                                        class="flex items-center gap-2 rounded-lg bg-secondary px-4 py-2 font-secondary text-base text-white hover:bg-tertiary">
                                        Continuar
                                        <x-icon icon="arrow-right" class="h-5 w-5 text-current" />
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="w-full flex-1">
                        <div class="z-10 mt-4 rounded-xl border-2 border-tertiary bg-white p-6">
                            <div class="flex justify-between">
                                <h2 class="font-primary text-3xl font-bold uppercase text-secondary">
                                    Su pedido
                                </h2>
                                <a href="{{ route('cart') }}"
                                    class="flex items-center justify-center rounded-xl bg-quaternary px-3 py-1 font-secondary text-sm hover:bg-tertiary hover:text-white">
                                    Editar carrito
                                </a>
                            </div>
                            <div class="mt-6 flex flex-col gap-4">
                                <div class="flex gap-4">
                                    <div class="flex flex-1 flex-col items-center justify-center gap-2">
                                        <img src="{{ asset('images/photo.jpg') }}" alt=""
                                            class="h-32 w-32 rounded-xl">
                                        <a href="" class="font-secondary text-xs text-zinc-600">Mostrar
                                            detalles</a>
                                    </div>
                                    <div class="flex-[2]">
                                        <h3 class="font-primary text-lg font-bold text-secondary">Product name</h3>
                                        <p class="font-secondary">$.4.50</p>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex flex-1 flex-col items-center justify-center gap-2">
                                        <img src="{{ asset('images/photo.jpg') }}" alt=""
                                            class="h-32 w-32 rounded-xl">
                                        <a href="" class="font-secondary text-xs text-zinc-600">Mostrar
                                            detalles</a>
                                    </div>
                                    <div class="flex-[2]">
                                        <h3 class="font-primary text-lg font-bold text-secondary">Product name</h3>
                                        <p class="font-secondary">$.4.50</p>
                                    </div>
                                </div>
                                <div class="mt-6 border-t-2 border-tertiary font-secondary">
                                    <div class="mt-2 flex justify-between">
                                        <p class="text-secondary">Subtotal</p>
                                        <p class="text-secondary">$4.50</p>
                                    </div>
                                    <div class="mt-2 flex justify-between">
                                        <p class="text-secondary">Impuesto</p>
                                        <p class="text-secondary">$4.50</p>
                                    </div>
                                    <div class="mt-2 flex justify-between">
                                        <p class="text-secondary">Envió</p>
                                        <p class="text-secondary">$4.50</p>
                                    </div>
                                    <div class="mt-2 flex justify-between text-lg font-bold">
                                        <p class="text-secondary">Total pedido</p>
                                        <p class="text-secondary">$4.50</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <section class="mb-20 mt-10 px-20 py-4">
            <div class="flex w-full flex-col justify-center gap-4 text-start">
                <h2 class="ml-16 border-b-2 border-tertiary pb-4 font-primary text-3xl font-bold uppercase text-secondary">
                    ¡Haz tu compra aún más especial!
                </h2>
                <div class="flex justify-center gap-6">
                    <button>
                        <x-icon icon="arrow-left" class="h-12 w-12 text-secondary" />
                    </button>
                    <div class="card flex w-96 flex-col overflow-hidden rounded-2xl bg-primary text-start">
                        <img src="{{ asset('images/photo.jpg') }}" alt="" class="h-72 w-full object-cover">
                        <div class="p-4">
                            <h3 class="font-primary text-xl font-bold text-secondary">Product name</h3>
                            <p class="text-wrap font-secondary text-sm text-zinc-800">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua
                            </p>
                        </div>
                        <div class="mt-auto flex items-end justify-between p-4">
                            <a href=""
                                class="flex items-center justify-center rounded-xl bg-secondary px-5 py-3 text-white">
                                <x-icon icon="arrow-right" class="h-5 w-5 text-current" />
                            </a>
                            <span class="font-secondary text-lg font-bold text-secondary">$4.50</span>
                        </div>
                    </div>
                    <div class="card flex w-96 flex-col overflow-hidden rounded-2xl bg-primary text-start">
                        <img src="{{ asset('images/photo.jpg') }}" alt="" class="h-72 w-full object-cover">
                        <div class="p-4">
                            <h3 class="font-primary text-xl font-bold text-secondary">Product name</h3>
                            <p class="text-wrap font-secondary text-sm text-zinc-800">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua
                            </p>
                        </div>
                        <div class="mt-auto flex items-end justify-between p-4">
                            <a href=""
                                class="flex items-center justify-center rounded-xl bg-secondary px-5 py-3 text-white">
                                <x-icon icon="arrow-right" class="h-5 w-5 text-current" />
                            </a>
                            <span class="font-secondary text-lg font-bold text-secondary">$4.50</span>
                        </div>
                    </div>
                    <div class="card flex w-96 flex-col overflow-hidden rounded-2xl bg-primary text-start">
                        <img src="{{ asset('images/photo.jpg') }}" alt="" class="h-72 w-full object-cover">
                        <div class="p-4">
                            <h3 class="font-primary text-xl font-bold text-secondary">Product name</h3>
                            <p class="text-wrap font-secondary text-sm text-zinc-800">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua
                            </p>
                        </div>
                        <div class="mt-auto flex items-end justify-between p-4">
                            <a href="{{ route('products.details', 12) }}"
                                class="flex items-center justify-center rounded-xl bg-secondary px-5 py-3 text-white">
                                <x-icon icon="arrow-right" class="h-5 w-5 text-current" />
                            </a>
                            <span class="font-secondary text-lg font-bold text-secondary">$4.50</span>
                        </div>
                    </div>
                    <button>
                        <x-icon icon="arrow-right" class="h-12 w-12 text-secondary" />
                    </button>
                </div>
            </div>
        </section>
    </main>

@endsection
