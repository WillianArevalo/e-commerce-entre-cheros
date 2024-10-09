@extends('layouts.template')
@section('title', '')
@section('content')
    <div>

        <div class="relative mt-12 h-80 w-full"
            style="background-image:url('{{ asset('images/fondo2.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 290" class="absolute bottom-0 w-full">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,192L60,170.7C120,149,240,107,360,128C480,149,600,235,720,266.7C840,299,960,277,1080,240C1200,203,1320,149,1380,122.7L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>
        </div>

        <section class="mb-8 mt-8 md:mb-20">
            <div class="lg:px-15 flex flex-col gap-4 px-4 md:px-10 xl:px-20">
                <div class="flex flex-col-reverse gap-10 lg:flex-row">
                    <div class="flex flex-1 flex-col gap-4 lg:flex-[2]">
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
                                    <form action="{{ Route('customer.store') }}" class="flex flex-col gap-10"
                                        method="POST">
                                        @csrf
                                        <div class="font-secondary flex flex-col gap-2">
                                            <div>
                                                <h2
                                                    class="font-league-spartan text-base font-bold uppercase text-secondary md:text-xl xl:text-2xl">
                                                    Información del cliente
                                                </h2>
                                            </div>
                                            <div class="flex flex-col gap-4">
                                                <div class="flex w-full flex-col gap-4 sm:flex-row">
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
                                                <div class="flex w-full flex-col gap-4 xl:flex-row">
                                                    <div class="flex flex-1 flex-col gap-2">
                                                        <x-input-store type="email" placeholder="Correo electrónico"
                                                            label="Correo electrónico" value="{{ $user->email ?? '' }}"
                                                            icon="mail" name="email" required />
                                                    </div>
                                                    <div class="flex gap-4 max-[380px]:flex-col">
                                                        <div class="flex flex-1 flex-col gap-2">
                                                            <x-input-store type="text" placeholder="503" label="Código"
                                                                icon="plus" name="area_code"
                                                                value="{{ $customer->area_code ?? '' }}" />
                                                        </div>
                                                        <div class="flex flex-[2] flex-col gap-2 sm:flex-[3]">
                                                            <x-input-store type="text"
                                                                placeholder="Ingresa aquí tu teléfono" label="Teléfono"
                                                                name="phone" value="{{ $customer->phone ?? '' }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="font-secondary flex flex-col gap-2">
                                            <h2
                                                class="font-league-spartan text-base font-bold uppercase text-secondary md:text-xl xl:text-2xl">
                                                Dirección de envio
                                            </h2>
                                            <div class="flex flex-col gap-4">
                                                <div class="flex w-full flex-col gap-4 md:flex-row">
                                                    <div class="flex flex-1 flex-col gap-2">
                                                        <x-select-store label="País" id="country" name="country"
                                                            :options="$countries" required
                                                            selected="{{ $address->country ?? '' }}"
                                                            value="{{ $address->country ?? '' }}" />
                                                    </div>
                                                    <div class="flex flex-[2] flex-col gap-2">
                                                        <x-input-store type="text" name="address_line_1" placeholder=""
                                                            label="Dirección (línea 1)" icon="location"
                                                            value="{{ $address->address_line_1 ?? '' }}" required />
                                                    </div>
                                                </div>
                                                <div class="flex w-full">
                                                    <div class="flex flex-1 flex-col gap-2">
                                                        <x-input-store type="text" placeholder="" name="address_line_2"
                                                            label="Dirección (línea 2)" icon="location"
                                                            value="{{ $address->address_line_2 ?? '' }}" />
                                                    </div>
                                                </div>
                                                <div class="flex w-full flex-col gap-4 md:flex-row">
                                                    <div class="flex flex-1 flex-col gap-2">
                                                        <x-input-store type="text" placeholder="Ingresa el estado"
                                                            label="Estado" name="state"
                                                            value="{{ $address->state ?? '' }}" />
                                                    </div>
                                                    <div class="flex flex-[2] flex-col gap-2">
                                                        <x-input-store type="text" placeholder="Ingresa la ciudad"
                                                            label="Ciudad" name="city" icon="city"
                                                            value="{{ $address->city ?? '' }}" />
                                                    </div>
                                                    <div class="flex flex-1 flex-col gap-2">
                                                        <x-input-store type="text"
                                                            placeholder="Ingresa el código postal    "
                                                            label="Código postal" name="zip_code"
                                                            value="{{ $address->zip_code ?? '' }}" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <x-button-store type="submit" text="Guardar cambios" class="text-sm"
                                                typeButton="primary" />
                                            <x-button-store type="button" id="btn-cancel-user-info" text="Cancelar"
                                                class="text-sm" typeButton="secondary" />
                                        </div>
                                    </form>
                                </div>
                                <div id="user-info">
                                    <div>
                                        <div
                                            class="flex flex-col-reverse items-start gap-4 lg:flex-row lg:justify-between lg:gap-0">
                                            <h2
                                                class="font-league-spartan text-base font-bold uppercase text-secondary md:text-xl xl:text-2xl">
                                                Información del cliente
                                            </h2>
                                            <x-button-store type="button" id="btn-edit-user-info" text="Editar datos"
                                                icon="edit" typeButton="success" size="small" />
                                        </div>
                                        <div class="font-secondary mt-4 flex flex-col gap-4 text-sm lg:text-base">
                                            <div class="flex w-full flex-col gap-4 lg:flex-row">
                                                <div class="flex flex-1 items-center gap-2">
                                                    <label for="name"
                                                        class="text-base font-bold text-secondary lg:text-lg">Nombre:</label>
                                                    <p class="text-zinc-600">{{ $user->name ?? '' }}</p>
                                                </div>
                                                <div class="flex flex-1 items-center gap-2">
                                                    <label for="name"
                                                        class="text-base font-bold text-secondary lg:text-lg">Apellido:</label>
                                                    <p class="text-zinc-600">{{ $user->last_name ?? '' }}</p>
                                                </div>
                                            </div>
                                            <div class="flex w-full gap-4">
                                                <div class="flex flex-1 flex-wrap items-center gap-2">
                                                    <label for="name"
                                                        class="text-base font-bold text-secondary lg:text-lg">
                                                        Correo electrónico:
                                                    </label>
                                                    <p class="text-zinc-600">{{ $user->email ?? '' }}</p>
                                                </div>
                                            </div>
                                            <div class="flex w-full gap-4">
                                                <div class="flex flex-1 gap-4">
                                                    <div class="flex items-center gap-2">
                                                        <label for="name"
                                                            class="text-base font-bold text-secondary lg:text-lg">
                                                            Telefono:
                                                        </label>
                                                        <p class="text-zinc-600">
                                                            @if ($customer)
                                                                + {{ $customer->area_code }}
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
                                    <div class="mt-8 border-t border-zinc-400 pt-4 text-sm lg:text-base">
                                        <h2
                                            class="font-league-spartan text-base font-bold uppercase text-secondary md:text-xl xl:text-2xl">
                                            Dirección de envío
                                        </h2>
                                        @if ($address)
                                            <div class="font-secondary mt-4 flex flex-col gap-4">
                                                <div class="flex w-full gap-4">
                                                    <div class="flex flex-1 items-center gap-2">
                                                        <label for="name"
                                                            class="text-base font-bold text-secondary lg:text-lg">
                                                            País:
                                                        </label>
                                                        <p class="text-zinc-600">
                                                            {{ $address->country ?? '---' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex w-full gap-4">
                                                    <div class="flex flex-1 items-center gap-2">
                                                        <label for="name"
                                                            class="text-base font-bold text-secondary lg:text-lg">
                                                            Dirección:
                                                        </label>
                                                        <p class="text-zinc-600">
                                                            @if ($customer)
                                                                {{ $address->address_line_1 ?? '' }}
                                                                {{ $address->address_line_2 ?? '' }}
                                                            @else
                                                                ---
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex w-full flex-col gap-4 sm:flex-row">
                                                    <div class="flex flex-1 items-center gap-2">
                                                        <label for="name"
                                                            class="text-base font-bold text-secondary lg:text-lg">
                                                            Ciudad:
                                                        </label>
                                                        <p class="text-zinc-600">{{ $address->city ?? '---' }}</p>
                                                    </div>
                                                    <div class="flex flex-1 items-center gap-2">
                                                        <label for="name"
                                                            class="text-base font-bold text-secondary lg:text-lg">
                                                            Estado:
                                                        </label>
                                                        <p class="text-zinc-600">{{ $address->state ?? '---' }}</p>
                                                    </div>
                                                </div>
                                                <div class="flex w-full gap-4">
                                                    <div class="flex flex-1 gap-4">
                                                        <div class="flex items-center gap-2">
                                                            <label for="name"
                                                                class="text-base font-bold text-secondary lg:text-lg">
                                                                Código postal:
                                                            </label>
                                                            <p class="text-zinc-600">
                                                                {{ $address->zip_code ?? '---' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="flex flex-col gap-8 py-10">
                                                <p class="text-zinc-600">No hay dirección de envío registrada</p>
                                                <x-button-store type="a"
                                                    href="{{ Route('account.addresses.create') }}"
                                                    text="Agregar dirección" class="w-max text-sm"
                                                    typeButton="secondary" />
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab info customer -->

                            <!-- Tab payment -->
                            <div class="tab-content hidden" id="tab-payment">
                                <div>
                                    <h2
                                        class="font-league-spartan text-base font-bold uppercase text-secondary md:text-xl xl:text-2xl">
                                        Método de pago
                                    </h2>
                                    <p class="text-sm text-zinc-700 md:text-base">
                                        Selecciona el método de pago que deseas utilizar
                                    </p>
                                    <div>
                                        <form action="{{ Route('cart.apply-payment-method') }}" method="POST">
                                            @csrf
                                            @if ($payment_methods->count() > 0)
                                                @foreach ($payment_methods as $payment_method)
                                                    <label
                                                        class="payment-methods mt-4 flex h-20 w-44 cursor-pointer items-center justify-center gap-4 rounded-xl border"
                                                        style="background-image:url('{{ Storage::url($payment_method->image) }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
                                                        <input type="radio" name="payment_method"
                                                            id="{{ $payment_method->id }}"
                                                            value="{{ $payment_method->id }}"
                                                            class="hidden h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500"
                                                            data-name="{{ $payment_method->name }}">
                                                    </label>
                                                @endforeach
                                            @endif
                                        </form>
                                    </div>
                                    <div>
                                        <div class="credit-card payment-method mt-8 hidden">
                                            <form action="">
                                                <div class="flex flex-col gap-4 sm:flex-row">
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
                                                <div class="mt-4 flex gap-4 max-[430px]:flex-col">
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
                                <div class="mt-8 flex items-center gap-2">
                                    <input type="checkbox" value="0" name="is_default" id="default"
                                        class="h-4 w-4 rounded border border-zinc-400 bg-zinc-100 text-secondary focus:ring-2 focus:ring-secondary">
                                    <label for="default" class="text-sm text-zinc-500 md:text-base">
                                        Guardar como método de pago predeterminado
                                    </label>
                                </div>
                            </div>
                            <!-- End Tab payment -->

                            <!-- Tab confirm order -->
                            <div class="tab-content hidden" id="tab-order">
                                <div>
                                    <div class="flex items-center gap-2">
                                        <span class="rounded-full bg-green-100 p-2.5">
                                            <x-icon-store icon="shopping-basket-done" class="h-6 w-6 text-green-500" />
                                        </span>
                                        <h2
                                            class="font-league-spartan text-lg font-bold uppercase text-green-500 md:text-2xl">
                                            Confirmar pedido
                                        </h2>
                                    </div>
                                    <div class="mt-4">
                                        <!-- Info user -->
                                        <div>
                                            <div
                                                class="flex flex-col-reverse items-start gap-4 lg:flex-row lg:justify-between lg:gap-0">
                                                <h2
                                                    class="font-league-spartan text-base font-bold uppercase text-secondary md:text-xl xl:text-2xl">
                                                    Información del cliente
                                                </h2>
                                            </div>
                                            <div class="font-secondary mt-4 flex flex-col gap-4 text-sm lg:text-base">
                                                <div class="flex w-full flex-col gap-4 lg:flex-row">
                                                    <div class="flex flex-1 items-center gap-2">
                                                        <label for="name"
                                                            class="text-base font-bold text-secondary lg:text-lg">Nombre:</label>
                                                        <p class="text-zinc-600">{{ $user->name ?? '' }}</p>
                                                    </div>
                                                    <div class="flex flex-1 items-center gap-2">
                                                        <label for="name"
                                                            class="text-base font-bold text-secondary lg:text-lg">Apellido:</label>
                                                        <p class="text-zinc-600">{{ $user->last_name ?? '' }}</p>
                                                    </div>
                                                </div>
                                                <div class="flex w-full gap-4">
                                                    <div class="flex flex-1 flex-wrap items-center gap-2">
                                                        <label for="name"
                                                            class="text-base font-bold text-secondary lg:text-lg">
                                                            Correo electrónico:
                                                        </label>
                                                        <p class="text-zinc-600">{{ $user->email ?? '' }}</p>
                                                    </div>
                                                </div>
                                                <div class="flex w-full gap-4">
                                                    <div class="flex flex-1 gap-4">
                                                        <div class="flex items-center gap-2">
                                                            <label for="name"
                                                                class="text-base font-bold text-secondary lg:text-lg">
                                                                Telefono:
                                                            </label>
                                                            <p class="text-zinc-600">
                                                                @if ($customer)
                                                                    + {{ $customer->area_code }}
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
                                        <!-- End info user -->

                                        <!-- Shipping method -->
                                        <div class="mt-8">
                                            <h2
                                                class="font-league-spartan text-base font-bold uppercase text-secondary md:text-xl xl:text-2xl">
                                                Método de envío
                                            </h2>
                                            @if ($cart->shippingMethod)
                                                <div class="mt-4">
                                                    <div>
                                                        <h3 class="text-base font-bold text-secondary lg:text-lg">
                                                            {{ $cart->shippingMethod->name }}
                                                        </h3>
                                                        <p class="text-sm text-zinc-600 lg:text-base">
                                                            {{ $cart->shippingMethod->description }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="flex flex-col gap-8 py-10">
                                                    <p class="text-zinc-600">No hay dirección de envío registrada</p>
                                                    <x-button-store type="a"
                                                        href="{{ Route('account.addresses.create') }}"
                                                        text="Agregar dirección" class="w-full sm:w-max"
                                                        typeButton="secondary" />
                                                </div>
                                            @endif
                                        </div>
                                        <!-- End shipping method -->

                                        <!-- Address shipping -->
                                        <div class="mt-8 text-sm lg:text-base">
                                            <h2
                                                class="font-league-spartan text-base font-bold uppercase text-secondary md:text-xl xl:text-2xl">
                                                Dirección de envío
                                            </h2>
                                            @if ($address)
                                                <div class="font-secondary mt-4 flex flex-col gap-4">
                                                    <div class="flex w-full gap-4">
                                                        <div class="flex flex-1 items-center gap-2">
                                                            <label for="name"
                                                                class="text-base font-bold text-secondary lg:text-lg">
                                                                País:
                                                            </label>
                                                            <p class="text-zinc-600">
                                                                {{ $address->country ?? '---' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="flex w-full gap-4">
                                                        <div class="flex flex-1 items-center gap-2">
                                                            <label for="name"
                                                                class="text-base font-bold text-secondary lg:text-lg">
                                                                Dirección:
                                                            </label>
                                                            <p class="text-zinc-600">
                                                                @if ($customer)
                                                                    {{ $address->address_line_1 ?? '' }}
                                                                    {{ $address->address_line_2 ?? '' }}
                                                                @else
                                                                    ---
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="flex w-full flex-col gap-4 sm:flex-row">
                                                        <div class="flex flex-1 items-center gap-2">
                                                            <label for="name"
                                                                class="text-base font-bold text-secondary lg:text-lg">
                                                                Ciudad:
                                                            </label>
                                                            <p class="text-zinc-600">{{ $address->city ?? '---' }}</p>
                                                        </div>
                                                        <div class="flex flex-1 items-center gap-2">
                                                            <label for="name"
                                                                class="text-base font-bold text-secondary lg:text-lg">
                                                                Estado:
                                                            </label>
                                                            <p class="text-zinc-600">{{ $address->state ?? '---' }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex w-full gap-4">
                                                        <div class="flex flex-1 gap-4">
                                                            <div class="flex items-center gap-2">
                                                                <label for="name"
                                                                    class="text-base font-bold text-secondary lg:text-lg">
                                                                    Código postal:
                                                                </label>
                                                                <p class="text-zinc-600">
                                                                    {{ $address->zip_code ?? '---' }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="flex flex-col gap-8 py-10">
                                                    <p class="text-zinc-600">No hay dirección de envío registrada</p>
                                                    <x-button-store type="a"
                                                        href="{{ Route('account.addresses.create') }}"
                                                        text="Agregar dirección" class="w-max text-sm"
                                                        typeButton="secondary" />
                                                </div>
                                            @endif
                                        </div>
                                        <!-- End address shipping -->

                                        <!-- Payment method -->
                                        <div class="mt-8">
                                            <h2
                                                class="font-league-spartan text-base font-bold uppercase text-secondary md:text-xl xl:text-2xl">
                                                Método de pago
                                            </h2>
                                            <div id="payment-method-selected">
                                                @if ($payment)
                                                    <div class="font-secondary mt-4 flex flex-col gap-4">
                                                        <div class="flex w-full gap-4">
                                                            <div class="flex flex-1 flex-col gap-2">
                                                                <img src="{{ Storage::url($payment->image) }}"
                                                                    alt="{{ $payment->name }}"
                                                                    class="h-20 w-36 rounded-xl object-cover">
                                                                <p class="text-sm text-zinc-600 lg:text-base">
                                                                    {{ $payment->name ?? '---' }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div
                                                        class="mt-4 flex flex-col gap-8 rounded-xl border-2 border-dashed border-zinc-300 p-4 py-10">
                                                        <p class="text-center text-sm text-zinc-600 lg:text-base">
                                                            No hay método de pago seleccionado. Selecciona uno para
                                                            continuar
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End payment method -->
                                    </div>
                                    <div class="mt-4 flex justify-end">
                                        <form action="{{ Route('orders.store') }}" method="POST">
                                            @csrf
                                            <x-button-store type="submit" text="Realizar pedido"
                                                class="w-full text-lg font-bold uppercase md:w-52" typeButton="primary" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab confirm order -->

                            <div class="mt-4 flex justify-between gap-4 border-t border-zinc-400 pt-4">
                                <x-button-store type="a" href="{{ Route('cart') }}" text="Regresar al carrito"
                                    typeButton="secondary" icon="shopping-cart" size="small" class="h-max" />
                                <div class="flex flex-wrap justify-end gap-4">
                                    <x-button-store type="button" text="Regresar" typeButton="secondary" id="prev-step"
                                        size="small" />
                                    <x-button-store type="button" text="Continuar" class="font-bold uppercase"
                                        typeButton="primary" id="next-step" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex-1 md:w-1/2 lg:w-full">
                        <div class="z-10 mt-4 rounded-xl border border-zinc-200 bg-white p-6 shadow-md">
                            <div class="flex items-center justify-between">
                                <h2
                                    class="font-league-spartan font-bold uppercase text-secondary md:text-base lg:text-xl xl:text-3xl">
                                    Su pedido
                                </h2>
                                <x-button-store type="a" typeButton="secondary" text="Editar carrito"
                                    href="{{ Route('cart') }}" size="small" icon="edit" />
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
                                                <h3
                                                    class="font-league-spartan text-sm font-bold text-secondary md:text-base lg:text-xl">
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
                                    <p class="py-10 text-center text-sm text-zinc-600">
                                        No hay productos en el carrito
                                    </p>
                                @endif
                                <div class="font-secondary mt-6 border-t border-zinc-200">
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
                                    <div
                                        class="mt-2 flex justify-between border-t border-zinc-200 pt-4 text-lg font-bold md:text-xl">
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

        <section class="mt-8 p-4 md:mt-0 lg:p-20">
            <div class="flex flex-col items-center justify-center gap-4 text-center">
                <h2
                    class="font-league-spartan text-xl font-bold uppercase text-secondary md:w-2/3 md:text-2xl lg:text-3xl">
                    Haz tu compra aún más especial
                </h2>
                <p class="font-secondary text-sm text-zinc-600 md:w-2/3 md:text-base">
                    Descubre los productos más vendidos y recomendados por nuestros clientes
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
    </div>

    <div class="modalConfirmOrder fixed inset-0 z-50 hidden items-center justify-center bg-zinc-800 bg-opacity-75 transition-opacity"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center px-4 pb-20 pt-4 text-center sm:block sm:p-0">
            <div class="inline-block transform animate-jump-in overflow-hidden rounded-xl bg-white text-left align-bottom shadow-xl transition-all animate-duration-300 animate-once sm:my-8 sm:w-full sm:max-w-lg sm:align-middle"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="flex items-center justify-center">
                        <div
                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 p-2 sm:mx-0 sm:h-20 sm:w-20">
                            <x-icon-store icon="checkmark-circle" class="h-full w-full text-green-600" />
                        </div>
                    </div>
                    <div class="mt-4 sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-headline">
                                Pedio realizado
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500" id="message-modal">
                                    Tu pedido ha sido realizado con éxito. En breve recibirás un correo con los detalles de
                                    tu pedido.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center gap-4 bg-gray-50 px-4 py-3">
                    <x-button-store type="button" text="Aceptar" class="confirmDelete w-max text-sm"
                        typeButton="success" />
                </div>
            </div>
        </div>
    </div>
@endsection
