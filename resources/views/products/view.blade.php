@extends('layouts.template')

@section('title', 'Details product')

@section('content')
    <main class="mb-10">
        <section class="mt-32 px-20 flex">
            <div class="flex-1 flex flex-col gap-2  items-center justify-center">
                <img src="{{ asset('images/photo.jpg') }}" alt="Imagen principal" class="w-96 h-96 rounded-xl">
                <div class="flex gap-2 items-center justify-center">
                    <button>
                        <x-icon icon="arrow-left" class="w-5 h-5" />
                    </button>
                    <img src="{{ asset('images/photo.jpg') }}" alt="Imagen secundaria"
                        class="w-24 h-16 object-cover border border-tertiary rounded-lg">
                    <img src="{{ asset('images/photo.jpg') }}" alt="Imagen secundaria"
                        class="w-24 h-16 object-cover border border-tertiary rounded-lg">
                    <img src="{{ asset('images/photo.jpg') }}" alt="Imagen secundaria"
                        class="w-24 h-16 object-cover border border-tertiary rounded-lg">
                    <button>
                        <x-icon icon="arrow-right" class="w-5 h-5" />
                    </button>
                </div>
            </div>
            <div class="flex-[2] flex flex-col gap-3">
                <h1 class="font-bold text-secondary text-3xl font-primary">Product name</h1>
                <div class="flex gap-2">
                    <x-icon icon="start" class="w-5 h-5 text-secondary" />
                    <x-icon icon="start" class="w-5 h-5 text-secondary" />
                    <x-icon icon="start" class="w-5 h-5 text-secondary" />
                    <x-icon icon="start" class="w-5 h-5 text-secondary" />
                    <x-icon icon="start" class="w-5 h-5 text-secondary" />
                    <p class="font-secondary text-tertiary font-semibold">En stock</p>
                </div>
                <span class="text-secondary font-semibold font-primary text-5xl">$4.50</span>
                <p class="font-secondary text-secondary w-2/3">
                    LLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat.
                </p>
                <div class="flex items-center gap-2">
                    <div class="flex items-center  border-2 border-tertiary w-max rounded-xl">
                        <button class="flex items-center justify-center px-3 py-2">
                            <x-icon icon="minus" class="w-5 h-5 text-secondary" />
                        </button>
                        <input type="text" name="quantity" id="quantity"
                            class="w-16 h-9 border-x-2 border-tertiary text-center font-primary" readonly value="1"
                            min="1">
                        <button class="flex items-center justify-center px-3 py-2">
                            <x-icon icon="plus" class="w-5 h-5 text-secondary" />
                        </button>
                    </div>
                    <button
                        class="px-3 py-2 bg-tertiary rounded-xl flex items-center gap-2 font-secondary text-white font-medium hover:bg-primary hover:text-black">
                        <x-icon icon="shopping-cart" class="w-5 h-5 text-current" />
                        Añadir al carrito
                    </button>
                    <button
                        class="px-3 py-2 bg-secondary rounded-xl flex items-center gap-2 font-secondary text-white font-medium">
                        Comprar
                    </button>
                </div>
            </div>
        </section>
        <section class="px-20 mt-10">
            <div class="flex flex-col gap-2">
                <label for="" class="font-secondary text-gray-800 font-medium">Reseña:</label>
                <textarea name="review" id="review" cols="30" rows="5" placeholder="Escribe tu reseña"
                    class="w-full p-3 border-tertiary border-2 rounded-xl font-secondary placeholder:text-gray-600 focus:border-secondary focus:outline-none"></textarea>
                <button
                    class="rounded-xl bg-primary px-4 py-2 w-max font-secondary text-secondary font-medium border-secondary border-2 hover:bg-secondary hover:text-white ml-auto">
                    Agregar reseña
                </button>
            </div>
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
                <button
                    class="rounded-xl bg-gray-200 px-5 py-2 w-max font-secondary text-gray-700 font-medium hover:bg-gray-800 hover:text-white ml-auto">
                    Mostrar todas las reseñas
                </button>
            </div>
        </section>
        <section class="px-20 py-4 mt-10">
            <div class="flex flex-col gap-4 justify-center w-full text-start">
                <h2 class="uppercase text-3xl font-primary text-secondary font-bold ml-16 border-b-2 pb-4 border-tertiary">
                    También te puede gustar</h2>
                <div class="flex justify-center gap-6">
                    <button>
                        <x-icon icon="arrow-left" class="w-12 h-12 text-secondary" />
                    </button>
                    <div class="card bg-primary flex flex-col text-start rounded-2xl overflow-hidden w-96">
                        <img src="{{ asset('images/photo.jpg') }}" alt="" class="w-full h-72 object-cover">
                        <div class="p-4">
                            <h3 class="text-secondary font-bold text-2xl font-primary">Product name</h3>
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
                            <h3 class="text-secondary font-bold text-2xl font-primary">Product name</h3>
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
                            <h3 class="text-secondary font-bold text-2xl font-primary">Product name</h3>
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
                    <button>
                        <x-icon icon="arrow-right" class="w-12 h-12 text-secondary" />
                    </button>
                </div>
            </div>
        </section>
    </main>
@endsection
