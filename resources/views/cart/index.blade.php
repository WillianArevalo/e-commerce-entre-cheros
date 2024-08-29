@extends('layouts.template')
@section('title', 'Cart')
@section('content')

    @php
        $coupon_code = '';
        if (session('coupon') != null) {
            $coupon_code = session('coupon')->code;
        } elseif ($cart != null && $cart->coupon != null) {
            $coupon_code = $cart->coupon->code;
        }
    @endphp

    <div>
        <!-- Header container -->
        <section class="relative h-[450px] w-full text-white"
            style="background-image:url('{{ asset('images/fondo6.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute bottom-0 w-full">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,96L60,106.7C120,117,240,139,360,144C480,149,600,139,720,122.7C840,107,960,85,1080,101.3C1200,117,1320,171,1380,197.3L1440,224L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>
        </section>
        <!-- End Header container -->

        <!-- Cart -->
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
                                    @if ($cart && $cart->items->count())
                                        @foreach ($cart->items as $item)
                                            <tr>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="flex h-16 w-16 flex-shrink-0 items-center justify-center">
                                                            <img class="h-full w-full rounded-lg border border-zinc-100 object-cover"
                                                                src="{{ Storage::url($item->product->main_image) }}"
                                                                alt="{{ $item->product->name }}">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div
                                                                class="font-secondary text-base font-semibold text-secondary">
                                                                {{ $item->product->name ?? 'Sin nombre' }}
                                                            </div>
                                                            <div class="font-secondary text-sm text-zinc-500">
                                                                @if ($item->product->offer_price)
                                                                    <div>
                                                                        <div>
                                                                            <span class="text-sm text-zinc-700">
                                                                                ${{ $item->product->offer_price }}
                                                                            </span>
                                                                            <span class="text-xs line-through">
                                                                                ${{ $item->product->price }}
                                                                            </span>
                                                                        </div>
                                                                        <span
                                                                            class="me-2 mt-1 block rounded-full bg-purple-100 px-2.5 py-0.5 font-secondary text-xs font-medium text-purple-800">
                                                                            En oferta
                                                                        </span>
                                                                    </div>
                                                                @else
                                                                    <span class="text-sm text-zinc-700">
                                                                        {{ $item->product->price_in_currency }}
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 text-sm text-zinc-500">
                                                    <div class="flex items-center">
                                                        <form action="{{ route('cart.update', $item->product->id) }}"
                                                            method="POST" id="form-minus-cart-{{ $item->product->id }}">
                                                            @csrf
                                                            <input type="hidden" name="action" value="minus">
                                                            <button type="button"
                                                                data-form="#form-minus-cart-{{ $item->product->id }}"
                                                                class="btnMinusCart flex h-8 w-8 items-center justify-center rounded-full border border-zinc-300 hover:bg-zinc-100">
                                                                <x-icon-store icon="minus"
                                                                    class="h-4 w-4 text-secondary" />
                                                            </button>
                                                        </form>
                                                        <input type="text" name="quantity" id="quantity"
                                                            class="h-12 w-16 rounded-lg border-none text-center font-secondary text-sm focus:border-none focus:outline-none"
                                                            readonly value="{{ $item->quantity }}" min="1">
                                                        <form action="{{ route('cart.update', $item->product->id) }}"
                                                            method="POST" id="form-plus-cart-{{ $item->product->id }}">
                                                            @csrf
                                                            <input type="hidden" name="action" value="plus">
                                                            <button type="button"
                                                                data-form="#form-plus-cart-{{ $item->product->id }}"
                                                                class="btnPlusCart flex h-8 w-8 items-center justify-center rounded-full border border-zinc-300 hover:bg-zinc-100">
                                                                <x-icon-store icon="plus"
                                                                    class="h-4 w-4 text-secondary" />
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td
                                                    class="whitespace-nowrap px-6 py-4 font-secondary text-sm text-zinc-500">
                                                    ${{ number_format($item->sub_total, 2) }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 text-start text-sm font-medium">
                                                    <form action="{{ route('cart.remove', $item->product->id) }}"
                                                        method="POST" id="form-remove-cart-{{ $item->product->id }}">
                                                        @csrf
                                                        <button type="button"
                                                            data-form="#form-remove-cart-{{ $item->product->id }}"
                                                            class="btnRemoveCart rounded-lg bg-red-100 p-2 text-red-800 hover:bg-red-200">
                                                            <x-icon-store icon="delete" class="h-4 w-4 text-current" />
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
                        <div class="z-10 mt-4 h-max w-full rounded-xl border border-zinc-300 bg-white p-4">
                            <h2 class="pb-2 font-primary text-xl font-bold text-secondary">
                                Resumen pedido
                            </h2>
                            <div class="h-full border-t border-zinc-300 font-secondary">
                                <div class="mt-4 flex justify-between">
                                    <p class="text-secondary">Importe</p>
                                    <p class="font-medium text-tertiary" id="totalPriceCart">
                                        {{ $carts_totals['total'] }}
                                    </p>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <p class="text-secondary">Impuesto</p>
                                    <p class="font-medium text-tertiary" id="totalTaxes">
                                        {{ $carts_totals['taxes'] }}
                                    </p>
                                </div>
                                <div class="mt-10 flex items-center justify-between border-y border-zinc-300 py-4">
                                    <p class="text-secondary">Total con impuestos</p>
                                    <p class="font-medium text-tertiary" id="totalWithTaxes">
                                        {{ $carts_totals['total_with_taxes'] }}
                                    </p>
                                </div>
                                <div class="mt-4" id="form-coupon">
                                    <form
                                        action="{{ $cart && $cart->coupon ? Route('cart.remove-coupon', $cart->coupon->id ?? 0) : Route('cart.apply-coupon') }}"
                                        method="POST" class="flex flex-col gap-2" id="formApplyCoupon">
                                        @csrf
                                        <div class="relative w-full">
                                            <div
                                                class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                                <x-icon-store icon="coupon"
                                                    class="h-5 w-5 text-zinc-500 dark:text-zinc-400" />
                                            </div>
                                            <input type="text"
                                                class="w-full rounded-xl border border-zinc-300 px-6 py-3 pl-12 text-sm text-zinc-700 transition duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-200"
                                                id="code" name="code" value="{{ $coupon_code }}"
                                                placeholder="Código del cupón"
                                                {{ $cart && $cart->coupon ? 'disabled' : '' }}>
                                            <div class="{{ $cart && $cart->coupon ? '' : 'hidden' }}"
                                                id="remove-coupon-container">
                                                <div class="absolute inset-y-0 right-0 flex items-center pr-2">
                                                    <button type="submit"
                                                        class="rounded-xl bg-red-100 p-2 hover:bg-red-200"
                                                        id="remove-coupon">
                                                        <x-icon-store icon="cancel-circle" class="h-4 w-4 text-red-800" />
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <span id="message-coupon"
                                            class="{{ $cart && $cart->coupon ? 'flex' : 'hidden' }} items-center gap-2 text-sm text-green-500">
                                            <x-icon-store icon="checkmark-circle" class="h-4 w-4 text-green-500" />
                                            Cupón aplicado
                                        </span>
                                        @if (!$cart || !$cart->coupon)
                                            <button type="submit" id="apply-coupon"
                                                class="flex w-max items-center justify-center gap-2 rounded-full border border-zinc-300 bg-white px-4 py-3 text-sm uppercase text-zinc-600 transition-colors hover:bg-zinc-100">
                                                Aplicar cupón
                                            </button>
                                        @endif
                                    </form>
                                </div>
                                <div class="mt-4 flex flex-col gap-2 border-y py-4">
                                    <div class="flex justify-between">
                                        <p class="text-secondary">Descuento</p>
                                        <p class="text-red-500" id="discount">
                                            {{ $carts_totals['discount'] }}
                                        </p>
                                    </div>
                                </div>
                                <div class= "mt-4 flex justify-between text-lg font-bold text-secondary">
                                    <p>Subtotal</p>
                                    <p id="subtotal">
                                        {{ $carts_totals['subtotal'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Cart -->

        <!-- Shipping method -->
        @if ($cart)
            <section class="relative -top-16 mx-20 border-t border-zinc-200">
                <div class="mt-10 flex flex-col items-center gap-2">
                    <div class="flex items-center justify-center gap-4">
                        <p>
                            <x-icon-store icon="truck-delivery" class="h-8 w-8 text-secondary" />
                        </p>
                        <h2 class="font-primary text-4xl font-bold uppercase text-secondary">
                            Método de envío
                        </h2>
                    </div>
                    <p class="text-zinc-700">
                        Selecciona el método de envío que prefieras
                    </p>
                </div>
                <div class="mt-8 flex">
                    <div class="flex-1">
                        Recoger en tienda
                    </div>
                    <div class="flex-1">
                        @if ($shipping_methods->count() > 0)
                            <form action="{{ Route('cart.apply-shipping-method') }}" method="POST">
                                @csrf
                                <div class="flex flex-col gap-4">
                                    @foreach ($shipping_methods as $method)
                                        <div
                                            class="shipping-method shipping-method-{{ $method->id ?? '' }} {{ $cart->shippingMethod != null ? ($cart->shippingMethod->id == $method->id ? 'method-shipping-selected' : '') : '' }} grid grid-cols-3 gap-8 rounded-2xl border border-zinc-300 bg-zinc-50 p-4">
                                            <div class="flex items-center justify-start gap-4">
                                                <div class="flex items-center">
                                                    <input type="radio" name="shipping_method" id="shipping_method"
                                                        value="{{ $method->id }}"
                                                        {{ $cart->shippingMethod ? ($cart->shippingMethod->id == $method->id ? 'checked' : '') : '' }}
                                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                                </div>
                                                <p class="font-bold text-secondary">
                                                    {{ $method->name }}
                                                </p>
                                            </div>
                                            <div class="flex items-center justify-start">
                                                <p class="text-sm text-zinc-600">
                                                    {{ $method->time }}
                                                </p>
                                            </div>
                                            <div class="flex items-center justify-end">
                                                <span class="text-lg font-medium uppercase text-tertiary">
                                                    @if ($method->cost == 0)
                                                        Gratis
                                                    @else
                                                        ${{ $method->cost }}
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </section>
        @endif
        <!-- End Shipping method -->

        <!-- Total -->
        <section class="mx-20 border-y border-zinc-200 py-4">
            <div class="flex flex-col items-end gap-4">
                <div class="flex items-center gap-4">
                    <h4 class="pt-1 font-primary text-4xl font-bold uppercase text-secondary">Total</h4>
                    <p id="totalWithShippingMethod" class="font-secondary text-2xl font-semibold text-tertiary">
                        {{ $carts_totals['total_with_shipping'] }}
                    </p>
                </div>
                <div class="w-max">
                    <x-button-store type="a" href="{{ route('checkout') }}" class="w-full px-14 font-semibold"
                        text="Finalizar compra" typeButton="primary" />
                </div>
            </div>
        </section>
        <!-- End Total -->

        <!-- Slider products -->
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
        <!-- End Slider products -->
    </div>
@endsection
