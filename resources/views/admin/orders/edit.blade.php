@extends('layouts.admin-template')
@section('title', 'Editar pedido')
@section('content')
    @php
        $date = now()->format('Y-m-d');
    @endphp
    <div>
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Editar pedido',
            'text' => 'Regresar a la lista de pedidos',
            'url' => route('admin.orders.index'),
        ])
        <div class="p-4">
            <div class="mb-4 flex flex-col justify-end gap-2 sm:flex-row">
                @if ($order->status != 'completed' && $order->status != 'canceled')
                    <x-button type="button" typeButton="success" icon="shopping-bag-check" text="Completar pedido"
                        data-modal-target="order-completed" data-modal-toggle="order-completed" />
                @endif
                @if ($order->status === 'pending')
                    <x-button type="button" typeButton="danger" icon="shopping-bag-x" text="Cancelar pedido"
                        data-modal-target="order-canceled" data-modal-toggle="order-canceled" />
                    <form action="{{ Route('admin.orders.status', $order->id) }}" method="POST" class="w-full">
                        @csrf
                        <input type="hidden" name="status" value="sent">
                        <x-button type="submit" typeButton="primary" icon="truck" text="Enviar pedido" class="w-full" />
                    </form>
                @endif
                @if ($order->status === 'canceled')
                    <x-button type="a" href="{{ route('admin.orders.index') }}" text="Regresar" typeButton="secondary"
                        icon="return" />
                @endif
            </div>
            <div class="mb-4 flex gap-2 rounded-xl border border-zinc-400 p-4 dark:border-zinc-800">
                <div class="w-full">
                    @switch($order->status)
                        @case('pending')
                            <div class="flex flex-col justify-between gap-2 md:flex-row">
                                <div class="flex items-center gap-2 text-sm">
                                    <p class="font-medium text-zinc-800 dark:text-zinc-300">Estado del pedido:</p>
                                    <span class="text-lg font-bold text-yellow-400 dark:text-yellow-500">
                                        Pendiente
                                    </span>
                                </div>
                                <div class="flex items-center gap-2 text-sm">
                                    <p class="flex items-center gap-2 font-medium text-zinc-800 dark:text-zinc-300">
                                        <span class="text-yellow-500">
                                            <x-icon icon="calendar-plus" class="h-5 w-5" />
                                        </span>
                                        Fecha de creación del pedido:
                                    </p>
                                    <span class="text-zinc-500 dark:text-zinc-300">
                                        {{ $order->created_at->format('F j, Y') }}
                                    </span>
                                </div>
                            </div>
                        @break

                        @case('sent')
                            <div class="flex flex-col justify-between gap-2 md:flex-row">
                                <div class="flex items-center gap-2 text-sm">
                                    <p class="font-medium text-zinc-800 dark:text-zinc-300">Estado del pedido:</p>
                                    <span class="text-lg font-bold text-blue-400 dark:text-blue-500">
                                        Enviado
                                    </span>
                                </div>
                                <div class="flex items-center gap-2 text-sm">
                                    <p class="flex items-center gap-2 font-medium text-zinc-800 dark:text-zinc-300">
                                        <span class="text-blue-500">
                                            <x-icon icon="calendar-up" class="h-5 w-5" />
                                        </span>
                                        Fecha de envío:
                                    </p>
                                    <span class="text-zinc-500 dark:text-zinc-300">
                                        {{ $order->shipped_at->setTimeZone(auth()->user()->timezone ?? 'UTC')->format('F j, Y, g:i a') }}
                                    </span>
                                </div>
                            </div>
                        @break

                        @case('completed')
                            <span class="text-green-500 dark:text-green-400">Entregado</span>
                        @break

                        @case('canceled')
                            <div class="flex flex-col justify-between gap-2 md:flex-row">
                                <div class="flex items-center gap-2 text-sm">
                                    <p class="font-medium text-zinc-800 dark:text-zinc-300">Estado del pedido:</p>
                                    <span class="text-lg font-bold text-red-400 dark:text-red-500">Cancelado</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm">
                                    <p class="flex items-center gap-2 font-medium text-zinc-800 dark:text-zinc-300">
                                        <span class="text-red-500">
                                            <x-icon icon="calendar-x" class="h-5 w-5" />
                                        </span>
                                        Fecha de cancelación:
                                    </p>
                                    <span class="text-zinc-500 dark:text-zinc-300">
                                        {{ $order->cancelled_at->format('F j, Y') }}
                                    </span>
                                </div>
                            </div>
                            <div class="mt-2">
                                <x-input type="textarea" label="Razón de cancelación" name="reason_canceled" id="reason_canceled"
                                    value="{{ old('reason_canceled', $order->reason_canceled) }}"
                                    placeholder="Ingresa la razón de la cancelación del pedido" readonly />
                            </div>
                        @break

                        @case('returned')
                            <span class="text-red-500 dark:text-red-400">Devuelto</span>
                        @break

                        @default
                    @endswitch
                </div>
            </div>
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-4 md:flex-row">
                    <div class="flex-1 lg:flex-[2]">
                        <div class="flex h-max flex-col gap-4 rounded-xl border border-zinc-400 dark:border-zinc-800">
                            <div class="p-4">
                                <div class="flex flex-col gap-4 lg:flex-row">
                                    <div class="flex-1">
                                        <x-input type="text" name="number_order" id="number_order"
                                            label="Número de Orden" value="{{ old('number_order', $order->number_order) }}"
                                            placeholder="Número único de la orden" readonly />
                                    </div>
                                    <!-- Número de Tracking -->
                                    <div class="flex-1">
                                        <x-input type="text" name="tracking_number" id="tracking_number"
                                            label="Número de Tracking"
                                            value="{{ old('tracking_number', $order->tracking_number) }}"
                                            placeholder="Ingresa el número de tracking del pedido" />
                                    </div>
                                </div>
                                <div class="mt-4 flex flex-col gap-4 lg:flex-row">
                                    <!-- Fechas de Envío y Entrega -->
                                    <div class="flex-1">
                                        <x-input type="date" name="shipped_at" icon="calendar-up" id="shipped_at"
                                            label="Fecha de Envío"
                                            value="{{ old('shipped_at', optional($order->shipped_at)->format('Y-m-d')) }}" />
                                    </div>
                                    <div class="flex-1">
                                        <x-input type="date" icon="calendar-down" name="delivered_at"
                                            id="delivered_at" label="Fecha de Entrega"
                                            value="{{ old('delivered_at', optional($order->delivered_at)->format('Y-m-d')) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="border-t border-zinc-400 p-4 dark:border-zinc-800">
                                <p class="mb-4 font-medium text-zinc-500 dark:text-zinc-300">
                                    Método de envío
                                </p>
                                <div>
                                    <div class="flex flex-col gap-2">
                                        @if (!empty($shippingMethods))
                                            @foreach ($shippingMethods as $shippingMethod)
                                                <label
                                                    class="flex items-center justify-between gap-2 rounded-xl border border-zinc-400 p-4 text-sm text-zinc-700 dark:border-zinc-800 dark:text-zinc-300">
                                                    <div class="flex gap-2">
                                                        <input type="radio" name="payment_method_id"
                                                            value="{{ $shippingMethod->id }}"
                                                            {{ $order->payment_method_id == $shippingMethod->id ? 'checked' : '' }}
                                                            class="border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-primary-600">
                                                        <p> {{ $shippingMethod->name }}</p>
                                                    </div>
                                                    <span class="text-base font-semibold dark:text-primary-600">
                                                        @if ($shippingMethod->cost == 0)
                                                            Gratuito
                                                        @else
                                                            {{ $order->currency->symbol . $shippingMethod->cost }}
                                                        @endif
                                                    </span>
                                                </label>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="mt-4">
                                        <x-input label="Tiempo estimado de entrega" name="estimated_delivery"
                                            value="{{ old('estimated_delivery', $order->estimated_delivery) }}"
                                            placeholder="Ingresa el tiempo estimado de entrega" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 rounded-xl border border-zinc-400 p-4 dark:border-zinc-800">
                            <div>
                                <p class="mb-4 font-medium text-zinc-500 dark:text-zinc-300">
                                    Comentarios
                                </p>
                                <div class="flex flex-col">
                                    <x-input type="textarea" name="admin_notes" id="admin_notes"
                                        value="{{ old('admin_notes', $order->admin_notes) }}"
                                        label="Notas del Administrador"
                                        placeholder="Ingresa un comentario para el cliente" />
                                </div>
                                <div class="mt-4 flex flex-col">
                                    <x-input type="textarea" name="customer_notes" id="customer_notes"
                                        value="{{ old('customer_notes', $order->customer_notes) }}"
                                        label="Notas del Cliente" readonly
                                        placeholder="Ingresa un comentario para el administrador" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1">
                        <!-- Subtotal, Descuento, Impuesto, Total -->
                        <div class="flex flex-col gap-4 rounded-xl border border-zinc-400 p-4 dark:border-zinc-800">
                            <div class="flex-1">
                                <x-input icon="dollar" type="number" step="0.01" name="subtotal" id="subtotal"
                                    label="Subtotal" value="{{ old('subtotal', $order->subtotal) }}"
                                    placeholder="Subtotal del pedido" required />
                            </div>
                            <div class="flex-1">
                                <x-input icon="dollar" type="number" step="0.01" name="discount" id="discount"
                                    label="Descuento" value="{{ old('discount', $order->discount) }}"
                                    placeholder="Descuento aplicado" />
                            </div>
                            <div class="flex-1">
                                <x-input icon="dollar" type="number" step="0.01" name="tax" id="tax"
                                    label="Impuesto" value="{{ old('tax', $order->tax) }}"
                                    placeholder="Impuesto aplicado" />
                            </div>
                            <div class="flex-1">
                                <x-input icon="dollar" type="number" step="0.01" name="total" id="total"
                                    label="Total" value="{{ old('total', $order->total) }}"
                                    placeholder="Total del pedido" required />
                            </div>
                        </div>
                        <div class="mt-4 gap-4 rounded-xl border border-zinc-400 p-4 dark:border-zinc-800">
                            <div>
                                <h3 class="text-lg font-semibold text-zinc-500 dark:text-zinc-400">Cliente</h3>
                            </div>
                            <div class="mt-2 flex items-center gap-4">
                                <div>
                                    <img src="{{ Storage::url($order->customer->user->profile) }}" alt=""
                                        class="h-20 w-20 rounded-xl object-cover">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <div class="flex gap-2 text-sm text-zinc-800 dark:text-zinc-300">
                                        <x-icon icon="user" class="h-5 w-5" />
                                        <x-paragraph>
                                            {{ $order->user->name . ' ' . $order->user->last_name }}
                                        </x-paragraph>
                                    </div>
                                    <div class="flex gap-2 text-sm text-zinc-800 dark:text-zinc-300">
                                        <x-icon icon="mail" class="h-5 w-5" />
                                        <x-paragraph>
                                            {{ $order->user->email }}
                                        </x-paragraph>
                                    </div>
                                    <div class="w-max">
                                        <x-button type="a"
                                            href="{{ route('admin.customers.edit', $order->customer->id) }}"
                                            text="Editar cliente" icon="edit" typeButton="secondary"
                                            size="small" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="relative mt-4 rounded-xl border border-zinc-400 p-4 dark:border-zinc-800">
                            <div>
                                <h3 class="text-lg font-semibold text-zinc-500 dark:text-zinc-400">
                                    Pago
                                </h3>
                            </div>
                            <div>
                                <p class="text-sm text-zinc-500 dark:text-zinc-300">
                                    Método de pago: {{ $order->payment_method->name }}
                                </p>
                                <img src="{{ Storage::url($order->payment_method->image) }}"
                                    alt="{{ $order->payment_method->name }}"
                                    class="w-30 mt-2 aspect-auto h-20 rounded-xl object-cover">
                            </div>
                            <div>
                                <p class="mt-4 text-sm text-zinc-500 dark:text-zinc-300">
                                    Estado del pago:
                                    <x-status-badge :status="$order->payment_status" size="medium" />
                                </p>
                            </div>
                            <div class="absolute right-0 top-0 m-4">
                                <div class="relative w-max">
                                    <x-button type="button" icon="refresh" typeButton="secondary" onlyIcon="true"
                                        class="show-options" />
                                    <div
                                        class="options absolute right-0 top-11 z-10 hidden w-40 rounded-lg border border-zinc-400 bg-white p-2 dark:border-zinc-800 dark:bg-zinc-950">
                                        <p class="font-semibold text-zinc-800 dark:text-zinc-300">
                                            Cambiar estado
                                        </p>
                                        <ul class="mt-2 flex flex-col text-sm">
                                            <li>
                                                <button type="button"
                                                    class="change-status-payment flex w-full items-center gap-1 rounded-lg px-2 py-2 text-emerald-700 hover:bg-emerald-100 dark:text-emerald-400 dark:hover:bg-emerald-950 dark:hover:bg-opacity-20"
                                                    data-status="paid">
                                                    <x-icon icon="check-circle" class="h-4 w-4" />
                                                    Pagado
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button"
                                                    class="change-status-payment flex w-full items-center gap-1 rounded-lg px-2 py-2 text-blue-700 hover:bg-blue-100 dark:text-blue-400 dark:hover:bg-blue-950 dark:hover:bg-opacity-20"
                                                    data-status="refunded">
                                                    <x-icon icon="credit-card-refund" class="h-4 w-4" />
                                                    Reembolsado
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button"
                                                    class="change-status-payment flex w-full items-center gap-1 rounded-lg px-2 py-2 text-yellow-700 hover:bg-yellow-100 dark:text-yellow-400 dark:hover:bg-yellow-950 dark:hover:bg-opacity-20"
                                                    data-status="pending">
                                                    <x-icon icon="clock" class="h-4 w-4" />
                                                    Pendiente
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" href="#"
                                                    class="change-status-payment flex w-full items-center gap-1 rounded-lg px-2 py-2 text-red-700 hover:bg-red-100 dark:text-red-400 dark:hover:bg-red-950 dark:hover:bg-opacity-20"
                                                    data-status="failed">
                                                    <x-icon icon="circle-x" class="h-4 w-4" />
                                                    Cancelado
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Botones de Acción -->
                <div class="mt-4 flex flex-col items-center justify-center gap-2 sm:flex-row">
                    <x-button class="w-full sm:w-auto" type="submit" text="Actualizar Pedido" icon="check"
                        typeButton="primary" />
                    <x-button type="a" class="w-full sm:w-auto" href="{{ route('admin.orders.index') }}"
                        text="Cancelar" typeButton="secondary" />
                </div>
            </form>

            <form action="{{ Route('admin.orders.payment-status', $order->id) }}" method="POST"
                id="form-change-payment-status">
                @csrf
                <input type="hidden" name="status">
            </form>

            <!-- Modal order completed -->
            <div id="order-completed" tabindex="-1" aria-hidden="true"
                class="fixed inset-0 left-0 right-0 top-0 z-50 hidden h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black bg-opacity-50">
                <div class="relative flex h-full w-full max-w-md items-center justify-center p-4 md:h-auto">
                    <!-- Modal content -->
                    <div
                        class="relative animate-jump-in rounded-lg bg-white p-4 shadow animate-duration-300 dark:bg-zinc-950 sm:p-5">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between rounded-t">
                            <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
                                Completar pedido
                            </h3>
                            <button type="button"
                                class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white"
                                data-modal-toggle="order-completed">
                                <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form action="{{ route('admin.labels.store') }}" id="form-order-completed" method="POST">
                            @csrf
                            <div class="mt-4 flex flex-col gap-4">
                                <div>
                                    <x-input label="Estado del pedido" name="status" value="Completado"
                                        icon="check-circle" required type="text" readonly />
                                </div>
                                <!-- Fecha de Completado -->
                                <div class="flex-1">
                                    <x-input type="date" name="completed_at" icon="calendar-check" id="completed_at"
                                        label="Fecha de completado" required
                                        value="{{ $order->completed_at ? $order->completed_at->format('Y-m-d') : $date }}" />
                                </div>
                            </div>
                            <div class="mt-4 flex justify-end gap-2">
                                <x-button type="button" id="btn-order-completed" text="Completar orden"
                                    icon="shopping-bag-check" typeButton="primary" />
                                <x-button type="button" data-modal-toggle="order-completed" text="Cancelar"
                                    typeButton="secondary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal order canceled -->
            <div id="order-canceled" tabindex="-1" aria-hidden="true"
                class="fixed inset-0 left-0 right-0 top-0 z-50 hidden h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black bg-opacity-50">
                <div class="relative flex h-full w-full max-w-md items-center justify-center p-4 md:h-auto">
                    <!-- Modal content -->
                    <div
                        class="relative animate-jump-in rounded-lg bg-white p-4 shadow animate-duration-300 dark:bg-zinc-950 sm:p-5">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between rounded-t">
                            <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
                                Cancelar pedido
                            </h3>
                            <button type="button"
                                class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white"
                                data-modal-toggle="order-canceled">
                                <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form action="{{ route('admin.labels.store') }}" id="form-order-canceled" method="POST">
                            @csrf
                            <div class="mt-4 flex flex-col gap-4">
                                <div>
                                    <x-input label="Estado del pedido" name="status" value="Cancelado" icon="circle-x"
                                        required type="text" readonly />
                                </div>
                                <!-- Fecha de Cancelado -->
                                <div class="flex-1">
                                    <x-input type="date" name="canceled_at" icon="calendar-x" id="canceled_at"
                                        label="Fecha de Cancelación"
                                        value="{{ $order->cancelled_at ? $order->cancelled_at->format('Y-m-d') : $date }}" />
                                </div>
                                <div class="flex-1">
                                    <x-input type="textarea" name="reason_canceled" label="Razón de la cancelación"
                                        placeholder="Ingresa la razón de la cancelación del pedido"
                                        value="{{ old('reason_canceled', optional($order->reason_canceled)->format('Y-m-d')) }}" />
                                </div>
                            </div>
                            <div class="mt-4 flex justify-end gap-2">
                                <x-button type="button" id="btn-order-canceled" text="Cancelar orden"
                                    icon="shopping-bag-x" typeButton="primary" />
                                <x-button type="button" data-modal-toggle="order-canceled" text="Cancelar"
                                    typeButton="secondary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
