@extends('layouts.template')

@section('title', 'Cart')

@section('content')
    <main>
        <section class="mt-32">
            <div class="px-20 mb-20">
                <h1 class="text-start font-bold text-3xl font-primary text-secondary uppercase">Carrito de compras</h1>
                <div class="flex gap-20">
                    <div class="flex-[2] relative">
                        <div class="border-2 border-tertiary p-4 rounded-xl mt-4 z-10 bg-white min-h-96">
                            <table class="min-w-full font-primary">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="font-primary px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Producto
                                        </th>

                                        <th scope="col"
                                            class="font-primary px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Cantidad
                                        </th>
                                        <th scope="col"
                                            class="font-primary px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Total
                                        </th>
                                        <th scope="col"
                                            class="font-primary px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <!-- Ejemplo de fila -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-start">
                                                <div class="flex-shrink-0 h-24 w-24">
                                                    <img class="h-full w-full" src="{{ asset('images/photo.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm text-secondary font-semibold font-secondary">
                                                        Nombre del producto
                                                    </div>
                                                    <div class="text-sm text-gray-500 font-secondary">
                                                        $4.50
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="flex items-center  border-2 border-tertiary w-max rounded-xl">
                                                <button class="flex items-center justify-center px-3 py-2">
                                                    <x-icon icon="minus" class="w-5 h-5 text-secondary" />
                                                </button>
                                                <input type="text" name="quantity" id="quantity"
                                                    class="w-16 h-9 border-x-2 border-tertiary text-center font-primary"
                                                    readonly value="1" min="1">
                                                <button class="flex items-center justify-center px-3 py-2">
                                                    <x-icon icon="plus" class="w-5 h-5 text-secondary" />
                                                </button>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            $4.50
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-start text-sm font-medium">
                                            <button class="text-indigo-600 hover:text-indigo-900">
                                                <x-icon icon="delete" class="w-5 h-5 text-secondary" />
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="absolute h-full w-full top-5 -left-5 bg-tertiary -z-10 rounded-xl"></div>
                    </div>
                    <div class="flex-1 relative">
                        <div class="border-2 border-tertiary p-4 rounded-xl mt-4 z-10 bg-white h-96 w-96">
                            <h2 class="text-secondary text-lg font-secondary font-bold border-b-2 border-tertiary pb-2">
                                Resumen pedido
                            </h2>
                            <div class="h-96 font-secondary">
                                <div class="flex justify-between mt-4">
                                    <p class="text-secondary">Subtotal</p>
                                    <p class="text-secondary">$4.50</p>
                                </div>
                                <div class="flex justify-between mt-4">
                                    <p class="text-secondary">Impuesto</p>
                                    <p class="text-secondary">$4.50</p>
                                </div>
                                <div class="flex justify-between mt-4">
                                    <p class="text-secondary">Envió</p>
                                    <p class="text-secondary">$4.50</p>
                                </div>
                                <div class="flex justify-between border-t-2 border-tertiary pt-4 mt-10">
                                    <p class="text-secondary">Total pedido</p>
                                    <p class="text-secondary">$4.50</p>
                                </div>
                                <div class="mt-16">
                                    <a href="{{ route('checkout') }}"
                                        class="block w-full text-center bg-secondary text-white font-secondary font-medium px-3 py-2 rounded-xl hover:bg-tertiary">
                                        Finalizar compra
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="absolute h-96 w-96 top-10 -left-5 bg-tertiary -z-10 rounded-xl"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="px-20 py-4 mt-10 mb-10">
            <div class="flex flex-col gap-4 justify-center w-full text-start">
                <h2 class="uppercase text-3xl font-primary text-secondary font-bold ml-16 border-b-2 pb-4 border-tertiary">
                    No te quedes con las ganas
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
