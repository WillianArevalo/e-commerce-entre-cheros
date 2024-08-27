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
                        <ol class="flex">
                            <li class="steps flex w-full flex-[7] items-center text-blue-600 after:inline-block after:h-1 after:w-full after:border-4 after:border-b after:border-zinc-100 after:content-['']"
                                title="Información del cliente steps">
                                <span
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-zinc-100 text-zinc-600 lg:h-12 lg:w-12">
                                    <x-icon-store icon="user-info" class="h-6 w-6 text-current" />
                                </span>
                            </li>
                            <li class="steps flex w-full flex-[7] items-center after:inline-block after:h-1 after:w-full after:border-4 after:border-b after:border-zinc-100 after:content-['']"
                                title="Información del pago">
                                <span
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-zinc-100 text-zinc-600 lg:h-12 lg:w-12">
                                    <x-icon-store icon="payment" class="h-6 w-6 text-current" />
                                </span>
                            </li>
                            <li class="steps flex w-full flex-1 items-center" title="Confirmar datos">
                                <span
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-zinc-100 text-zinc-600 lg:h-12 lg:w-12">
                                    <x-icon-store icon="shopping-basket-done" class="h-6 w-6 text-current" />
                                </span>
                            </li>
                        </ol>
                        <div class="mt-4 flex flex-col gap-4">
                            <!-- Tab info customer -->
                            <div class="tab-content" id="tab-user-info">
                                <div id="form-user-info" class="hidden">
                                    <form action="{{ Route('orders.add-info') }}" class="flex flex-col gap-10"
                                        method="POST">
                                        @csrf
                                        <div class="flex flex-col gap-2 font-secondary">
                                            <h2 class="font-primary text-2xl font-bold uppercase text-secondary">
                                                Información del cliente
                                            </h2>
                                            <div class="flex flex-col gap-4">
                                                <div class="flex w-full gap-4">
                                                    <div class="flex flex-1 flex-col gap-2">
                                                        <x-input-store type="text" placeholder="Ingresa aquí tu nombre"
                                                            value="{{ $user->name ?? '' }}" label="Nombre" name="name"
                                                            required />
                                                    </div>
                                                    <div class="flex flex-1 flex-col gap-2">
                                                        <x-input-store type="text" placeholder="Ingresa aquí tu apellido"
                                                            value="{{ $user->last_name ?? '' }}" label="Apellido"
                                                            name="last_name" required />
                                                    </div>
                                                </div>
                                                <div class="flex w-full gap-4">
                                                    <div class="flex flex-1 flex-col gap-2">
                                                        <x-input-store type="email" placeholder="Correo electrónico"
                                                            label="Correo electrónico" value="{{ $user->email ?? '' }}"
                                                            icon="mail" name="email" required />
                                                    </div>
                                                    <div class="flex gap-4">
                                                        <div class="flex flex-1 flex-col gap-2">
                                                            <x-input-store type="text" placeholder="503" label="Código"
                                                                icon="plus" name="area_code"
                                                                value="{{ $customer->address->area_code ?? '' }}" />
                                                        </div>
                                                        <div class="flex flex-[3] flex-col gap-2">
                                                            <x-input-store type="text"
                                                                placeholder="Ingresa aquí tu teléfono" label="Teléfono"
                                                                name="phone" value="{{ $customer->phone ?? '' }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-2 font-secondary">
                                            <h2 class="font-primary text-2xl font-bold uppercase text-secondary">
                                                Dirección de envio
                                            </h2>
                                            <div class="flex flex-col gap-4">
                                                <div class="flex w-full gap-4">
                                                    <div class="flex flex-1 flex-col gap-2">
                                                        <x-select-store label="País" id="country" name="country"
                                                            :options="$countries" required
                                                            selected="{{ $customer->address->country ?? '' }}"
                                                            value="{{ $customer->address->country ?? '' }}" />
                                                    </div>
                                                    <div class="flex flex-[2] flex-col gap-2">
                                                        <x-input-store type="text" name="address_line_1" placeholder=""
                                                            label="Dirección (línea 1)"
                                                            value="{{ $customer->address->address_line_1 ?? '' }}"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="flex w-full">
                                                    <div class="flex flex-1 flex-col gap-2">
                                                        <x-input-store type="text" placeholder="" name="address_line_2"
                                                            label="Dirección (línea 2)"
                                                            value="{{ $customer->address->address_line_2 ?? '' }}" />
                                                    </div>
                                                </div>
                                                <div class="flex w-full gap-4">
                                                    <div class="flex flex-1 flex-col gap-2">
                                                        <x-input-store type="text" placeholder="Ingresa el estado"
                                                            label="Estado" name="state"
                                                            value="{{ $customer->address->state ?? '' }}" />
                                                    </div>
                                                    <div class="flex flex-[2] flex-col gap-2">
                                                        <x-input-store type="text" placeholder="Ingresa la ciudad"
                                                            label="Ciudad" name="city"
                                                            value="{{ $customer->address->city ?? '' }}" />
                                                    </div>
                                                    <div class="flex flex-1 flex-col gap-2">
                                                        <x-input-store type="text"
                                                            placeholder="Ingresa el código postal    "
                                                            label="Código postal" name="zip_code"
                                                            value="{{ $customer->address->zip_code ?? '' }}" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-between">
                                            <x-button-store type="submit" text="Guardar cambios" class="text-sm"
                                                typeButton="secondary" />
                                        </div>
                                    </form>
                                </div>
                                <div id="user-info">
                                    <div>
                                        <h1 class="font-primary text-2xl font-bold uppercase text-secondary">
                                            Información del cliente
                                        </h1>
                                        <div class="mt-4 flex flex-col gap-4 font-secondary">
                                            <div class="flex w-full gap-4">
                                                <div class="flex flex-1 items-center gap-2">
                                                    <label for="name"
                                                        class="text-lg font-bold text-secondary">Nombre:</label>
                                                    <p class="text-zinc-600">{{ $user->name ?? '' }}</p>
                                                </div>
                                                <div class="flex flex-1 items-center gap-2">
                                                    <label for="name"
                                                        class="text-lg font-bold text-secondary">Apellido:</label>
                                                    <p class="text-zinc-600">{{ $user->last_name ?? '' }}</p>
                                                </div>
                                            </div>
                                            <div class="flex w-full gap-4">
                                                <div class="flex flex-1 items-center gap-2">
                                                    <label for="name" class="text-lg font-bold text-secondary">
                                                        Correo electrónico:
                                                    </label>
                                                    <p class="text-zinc-600">{{ $user->email ?? '' }}</p>
                                                </div>
                                            </div>
                                            <div class="flex w-full gap-4">
                                                <div class="flex flex-1 gap-4">
                                                    <div class="flex items-center gap-2">
                                                        <label for="name" class="text-lg font-bold text-secondary">
                                                            Telefono:
                                                        </label>
                                                        <p class="text-zinc-600">
                                                            @if ($customer)
                                                                + {{ $customer->address->area_code }}
                                                                {{ $customer->phone }}
                                                            @else
                                                                ---
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-8 border-t border-zinc-300 pt-4">
                                        <h1 class="font-primary text-2xl font-bold uppercase text-secondary">
                                            Dirección de envío
                                        </h1>
                                        <div class="mt-4 flex flex-col gap-4 font-secondary">
                                            <div class="flex w-full gap-4">
                                                <div class="flex flex-1 items-center gap-2">
                                                    <label for="name" class="text-lg font-bold text-secondary">
                                                        País:
                                                    </label>
                                                    <p class="text-zinc-600">
                                                        {{ $customer->address->country ?? '---' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex w-full gap-4">
                                                <div class="flex flex-1 items-center gap-2">
                                                    <label for="name" class="text-lg font-bold text-secondary">
                                                        Dirección:
                                                    </label>
                                                    <p class="text-zinc-600">
                                                        @if ($customer)
                                                            {{ $customer->address->address_line_1 ?? '' }}
                                                            {{ $customer->address->address_line_2 ?? '' }}
                                                        @else
                                                            ---
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex w-full gap-4">
                                                <div class="flex flex-1 items-center gap-2">
                                                    <label for="name" class="text-lg font-bold text-secondary">
                                                        Ciudad:
                                                    </label>
                                                    <p class="text-zinc-600">{{ $customer->address->city ?? '---' }}</p>
                                                </div>
                                                <div class="flex flex-1 items-center gap-2">
                                                    <label for="name" class="text-lg font-bold text-secondary">
                                                        Estado:
                                                    </label>
                                                    <p class="text-zinc-600">{{ $customer->address->state ?? '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="flex w-full gap-4">
                                                <div class="flex flex-1 gap-4">
                                                    <div class="flex items-center gap-2">
                                                        <label for="name" class="text-lg font-bold text-secondary">
                                                            Código postal:
                                                        </label>
                                                        <p class="text-zinc-600">
                                                            {{ $customer->address->zip_code ?? '---' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <x-button-store type="button" text="Editar datos" class="mt-4 text-sm"
                                        id="btn-edit-user-info" typeButton="secondary" />
                                </div>
                            </div>
                            <!-- End Tab info customer -->

                            <!-- Tab payment -->
                            <div class="tab-content hidden" id="tab-payment">
                                <div>
                                    <h2 class="font-primary text-2xl font-bold uppercase text-secondary">
                                        Método de pago
                                    </h2>
                                    <div>
                                        @if ($payment_methods->count() > 0)
                                            @foreach ($payment_methods as $payment_method)
                                                <div class="mt-4 flex items-center gap-4">
                                                    <div class="flex items-center gap-4">
                                                        <input type="radio" name="payment_method"
                                                            id="{{ $payment_method->id }}"
                                                            value="{{ $payment_method->id }}"
                                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500"
                                                            data-name="{{ $payment_method->name }}">
                                                        <label for="{{ $payment_method->id }}"
                                                            class="text-lg font-bold text-secondary">
                                                            {{ $payment_method->name }}
                                                        </label>
                                                    </div>
                                                    <div class="flex flex-1 items-center gap-4">
                                                        <img src="{{ Storage::url($payment_method->image) }}"
                                                            alt="" class="h-10 w-20">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div>
                                        <div class="credit-card payment-method mt-8 hidden">
                                            <form action="">
                                                <div class="flex gap-4">
                                                    <div class="flex flex-1 flex-col gap-2">
                                                        <x-input-store type="text" name="card_number" icon="card"
                                                            id="card_number" placeholder="#### #### #### ####"
                                                            label="Número de tarjeta" />
                                                    </div>
                                                    <div class="flex flex-1 flex-col gap-2">
                                                        <x-input-store type="text" name="titular"
                                                            placeholder="Nombre del titular" label="Titular" />
                                                    </div>
                                                </div>
                                                <div class="mt-4 flex gap-4">
                                                    <div class="flex flex-col gap-2">
                                                        <x-input-store type="text" name="expiration_date"
                                                            placeholder="00/00" label="Fecha de expiración" />
                                                    </div>
                                                    <div class="flex flex-col gap-2">
                                                        <x-input-store type="text" name="cvv" placeholder="###"
                                                            label="CVV" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab payment -->

                            <!-- Tab order -->
                            <div class="tab-content hidden" id="tab-order">
                                <div>
                                    <h2 class="font-primary text-2xl font-bold uppercase text-secondary">
                                        Confirmar pedido
                                    </h2>
                                    <div>
                                        <div class="mt-4 flex flex-col gap-4">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab order -->

                            <div class="mt-4 flex justify-between border-t border-zinc-300 pt-4">
                                <x-button-store type="a" href="{{ Route('cart') }}" text="Regresar al carrito"
                                    class="text-sm" typeButton="secondary" icon="arrow-left" />
                                <div class="flex gap-4">
                                    <x-button-store type="button" text="Regresar" class="text-sm"
                                        typeButton="secondary" id="prev-step" />
                                    <x-button-store type="button" text="Continuar" class="text-sm font-bold"
                                        typeButton="primary" id="next-step" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex-1">
                        <div class="z-10 mt-4 rounded-xl border border-zinc-300 bg-white p-6">
                            <div class="flex items-center justify-between">
                                <h2 class="font-primary text-3xl font-bold uppercase text-secondary">
                                    Su pedido
                                </h2>
                                <x-button-store type="a" typeButton="secondary" text="Editar carrito"
                                    class="text-xs" href="{{ Route('cart') }}" />
                            </div>
                            <div class="mt-6 flex flex-col gap-4">
                                @if ($cart && $cart->items->count())
                                    @foreach ($cart->items as $item)
                                        <div class="flex gap-4">
                                            <div class="flex flex-1 flex-col items-center justify-center gap-2">
                                                <img src="{{ Storage::url($item->product->main_image) }}" alt=""
                                                    class="h-20 w-20 rounded-xl border border-zinc-100">
                                            </div>
                                            <div class="flex flex-[2] flex-col justify-center">
                                                <h3 class="font-primary text-xl font-bold text-secondary">
                                                    {{ $item->product->name }}
                                                </h3>
                                                <p class="font-secondary text-sm">
                                                    {{ $item->product->price ? $item->product->price : $item->product->offer_price }}
                                                </p>
                                                <a href="{{ route('products.details', $item->product->slug) }}"
                                                    class="font-secondary text-xs text-zinc-600">
                                                    Mostrar detalles
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="py-10 text-center text-sm text-zinc-600">No hay productos en el carrito
                                    </p>
                                @endif
                                <div class="mt-6 border-t border-zinc-300 font-secondary">
                                    <div class="mt-2 flex justify-between text-sm">
                                        <p class="text-secondary">Subtotal</p>
                                        <p class="text-secondary">
                                            {{ $carts_totals['total'] }}
                                        </p>
                                    </div>
                                    <div class="mt-2 flex justify-between text-sm">
                                        <p class="text-secondary">Impuesto</p>
                                        <p class="text-secondary">
                                            {{ $carts_totals['subtotal'] }}
                                        </p>
                                    </div>
                                    <div class="mt-2 flex justify-between text-sm">
                                        <p class="text-secondary">Envió</p>
                                        <p class="text-secondary">
                                            {{ $carts_totals['shipping'] }}
                                        </p>
                                    </div>
                                    <div class="mt-2 flex justify-between text-sm">
                                        <p class="text-secondary">Descuento</p>
                                        <p class="text-secondary">
                                            {{ $carts_totals['discount'] }}
                                        </p>
                                    </div>
                                    <div class="mt-2 flex justify-between text-xl font-bold">
                                        <p class="text-secondary">Total pedido</p>
                                        <p class="text-secondary">
                                            {{ $carts_totals['total_with_shipping'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-10 px-20 py-4">
            <div class="flex w-full flex-col justify-center gap-4 text-start">
                <h2 class="border-b border-zinc-300 pb-4 font-primary text-3xl font-bold uppercase text-secondary">
                    Haz tu compra aún más especial
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
    </main>

@endsection
