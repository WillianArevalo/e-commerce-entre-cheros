@extends('layouts.template')
@section('title', 'Cart')
@section('content')
    <div>
        <section class="relative h-[450px] w-full text-white"
            style="background-image:url('{{ asset('images/fondo6.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute bottom-0 w-full">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,96L60,106.7C120,117,240,139,360,144C480,149,600,139,720,122.7C840,107,960,85,1080,101.3C1200,117,1320,171,1380,197.3L1440,224L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>
        </section>
        <section class="relative -top-24">
            <div class="px-20">
                <h1 class="text-start font-tertiary text-5xl font-normal uppercase text-secondary" data-aos="fade-right">
                    Carrito de compras
                </h1>
                <div class="mt-4 flex gap-10">
                    <div class="relative flex-[2]" data-aos="fade-right">
                        <div class="min-h-96 z-10 mt-4 rounded-xl border border-zinc-300 bg-white p-4">
                            <table class="min-w-full font-primary">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left font-primary text-xs font-medium uppercase tracking-wider text-zinc-500">
                                            Producto
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left font-primary text-xs font-medium uppercase tracking-wider text-zinc-500">
                                            Cantidad
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left font-primary text-xs font-medium uppercase tracking-wider text-zinc-500">
                                            Total
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left font-primary text-xs font-medium uppercase tracking-wider text-zinc-500">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-zinc-200 bg-white" id="tableCart">
                                    @if ($cart)
                                        @foreach ($cart as $product)
                                            <tr>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex h-16 w-16 flex-shrink-0 items-center justify-center">
                                                            <img class="h-full w-full rounded-lg border border-zinc-100 object-cover"
                                                                src="{{ Storage::url($product['image']) }}"
                                                                alt="{{ $product['name'] }}">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div
                                                                class="font-secondary text-base font-semibold text-secondary">
                                                                {{ $product['name'] }}
                                                            </div>
                                                            <div class="font-secondary text-sm text-zinc-500">
                                                                @if ($product['offer_price'])
                                                                    <div>
                                                                        <div>
                                                                            <span class="text-sm text-zinc-700">
                                                                                ${{ $product['offer_price'] }}
                                                                            </span>
                                                                            <span class="text-xs line-through">
                                                                                ${{ $product['price'] }}
                                                                            </span>
                                                                        </div>
                                                                        <span
                                                                            class="me-2 mt-1 block rounded-full bg-purple-100 px-2.5 py-0.5 font-secondary text-xs font-medium text-purple-800">
                                                                            En oferta
                                                                        </span>
                                                                    </div>
                                                                @else
                                                                    <span class="text-sm text-zinc-700">
                                                                        ${{ $product['price'] }}
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 text-sm text-zinc-500">
                                                    <div class="flex items-center">
                                                        <form action="{{ route('cart.minus', $product['id']) }}"
                                                            method="POST" id="form-minus-cart-{{ $product['id'] }}">
                                                            @csrf
                                                            <button type="button"
                                                                data-form="#form-minus-cart-{{ $product['id'] }}"
                                                                class="btnMinusCart flex h-8 w-8 items-center justify-center rounded-full border border-zinc-300 hover:bg-zinc-100">
                                                                <x-icon icon="minus" class="h-4 w-4 text-secondary" />
                                                            </button>
                                                        </form>
                                                        <input type="text" name="quantity" id="quantity"
                                                            class="h-12 w-16 rounded-lg border-none text-center font-secondary text-sm focus:border-none focus:outline-none"
                                                            readonly value="{{ $product['quantity'] }}" min="1">
                                                        <form action="{{ route('cart.plus', $product['id']) }}"
                                                            method="POST" id="form-plus-cart-{{ $product['id'] }}">
                                                            @csrf
                                                            <button type="button"
                                                                data-form="#form-plus-cart-{{ $product['id'] }}"
                                                                class="btnPlusCart flex h-8 w-8 items-center justify-center rounded-full border border-zinc-300 hover:bg-zinc-100">
                                                                <x-icon icon="plus" class="h-4 w-4 text-secondary" />
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-6 py-4 font-secondary text-sm text-zinc-500">
                                                    ${{ number_format($product['subtotal'], 2) }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 text-start text-sm font-medium">
                                                    <form action="{{ route('cart.remove', $product['id']) }}"
                                                        method="POST" id="form-remove-cart-{{ $product['id'] }}">
                                                        @csrf
                                                        <button type="button"
                                                            data-form="#form-remove-cart-{{ $product['id'] }}"
                                                            class="btnRemoveCart rounded-lg bg-red-100 p-2 text-red-800 hover:bg-red-200">
                                                            <x-icon icon="delete" class="h-5 w-5 text-current" />
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="border-t border-zinc-100">
                                            <td class="whitespace-nowrap px-6 py-4 text-center font-primary" colspan="4">
                                                Carrito vacío
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="relative flex-1" data-aos="fade-left">
                        <div class="z-10 mt-4 h-max w-96 rounded-xl border border-zinc-300 bg-white p-4">
                            <h2 class="pb-2 font-primary text-xl font-bold text-secondary">
                                Resumen pedido
                            </h2>
                            <div class="h-full border-t border-zinc-300 font-secondary">
                                <div class="mt-4 flex justify-between">
                                    <p class="text-secondary">Importe</p>
                                    <p class="font-medium text-tertiary" id="totalPriceCart">
                                        ${{ number_format($totalCart, 2) }}
                                    </p>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <p class="text-secondary">Impuesto</p>
                                    <p class="id= font-medium text-tertiary"totalTaxes">
                                        ${{ number_format($totalTaxes, 2) }}
                                    </p>
                                </div>
                                <div class="mt-10 flex items-center justify-between border-y border-zinc-300 py-4">
                                    <p class="text-secondary">Total con impuestos</p>
                                    <p class="font-medium text-tertiary" id="totalWithTaxes">
                                        ${{ number_format($totalWithTaxes, 2) }}
                                    </p>
                                </div>
                                <div class="mt-2 flex flex-col gap-2">
                                    <x-input-store type="text" name="coupon" placeholder="Código de cupón"
                                        class="w-full" />
                                    <x-button type="button" text="Aplicar cupón" typeButton="store-secondary"
                                        class="w-max text-sm" />
                                </div>
                                <div class="mt-4 flex flex-col gap-2 border-y py-4">
                                    <div class="flex justify-between">
                                        <p class="text-secondary">Descuento</p>
                                        <p class="text-red-500" id="discount"> - ${{ number_format($totalDiscount, 2) }}
                                        </p>
                                    </div>
                                </div>
                                <div class= "mt-4 flex justify-between text-lg font-bold text-secondary">
                                    <p>Subtotal</p>
                                    <p id="subtotal">${{ $subtotal }}</p>
                                </div>
                                <div>
                                    <x-button type="a" text="Finalizar compra" typeButton="store-gradient"
                                        class="mt-10 w-full" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mx-20 border-t border-zinc-300">
            <div class="mt-10 flex items-center justify-center">
                <h2 class="font-primary text-4xl font-bold text-secondary">Método de envío</h2>
            </div>
            <div class="mt-8 flex">
                <div class="flex-1">
                    Recoger en tienda
                </div>
                <div class="flex-1">
                    <div class="flex flex-col gap-4">
                        <div class="grid grid-cols-3 gap-8 rounded-2xl bg-zinc-50 p-4">
                            <div class="flex items-center justify-start gap-4">
                                <input type="radio" name="send" />
                                <p class="font-bold text-secondary">Recoger en tienda</p>
                            </div>
                            <div class="flex items-center justify-start">
                                <p class="text-zinc-600">En 2 - 5 días laborales</p>
                            </div>
                            <div class="flex items-center justify-end">
                                <span class="uppercase text-zinc-600">
                                    Gratuito
                                </span>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-8 rounded-2xl bg-zinc-50 p-4">
                            <div class="flex items-center justify-start gap-4">
                                <input type="radio" name="send" />
                                <p class="font-bold text-secondary">Estándar a domicilio</p>
                            </div>
                            <div class="flex items-center justify-start">
                                <p class="text-zinc-600">En 2 - 3 días laborales</p>
                            </div>
                            <div class="flex items-center justify-end">
                                <span class="uppercase text-zinc-600">
                                    $2.00
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section class="mb-10 px-20 py-4">
            <div class="flex w-full flex-col justify-center gap-4 text-start">
                <h2 class="border-b-2 border-zinc-300 pb-4 font-primary text-3xl font-bold uppercase text-secondary">
                    No te quedes con las ganas
                </h2>
                <div>
                    @if ($products)
                        <div id="slider">
                            @include('layouts.__partials.store.slider', [
                                'products' => $products,
                            ])
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
