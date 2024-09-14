@extends('layouts.admin-template')
@section('title', 'Editar pedido')
@section('content')
    <div>
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Editar pedido',
            'text' => 'Regresar a la lista de pedidos',
            'url' => route('admin.orders.index'),
        ])
        <div class="p-4">
            <div class="mb-4 flex justify-end gap-2">
                <x-button type="button" typeButton="success" icon="shopping-bag-check" text="Completar pedido"
                    data-modal-target="order-completed" data-modal-toggle="order-completed" />
                <x-button type="button" typeButton="danger" icon="shopping-bag-x" text="Cancelar pedido"
                    data-modal-target="order-canceled" data-modal-toggle="order-canceled" />
            </div>
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex gap-4">
                    <div class="flex h-max flex-[2] flex-col gap-4 rounded-xl border border-zinc-400 dark:border-zinc-800">
                        <div class="p-4">
                            <div class="flex gap-4">
                                <div class="flex-1">
                                    <x-input type="text" name="number_order" id="number_order" label="Número de Orden"
                                        value="{{ old('number_order', $order->number_order) }}"
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
                            <div class="mt-4 flex gap-4">
                                <!-- Fechas de Envío y Entrega -->
                                <div class="flex-1">
                                    <x-input type="date" name="shipped_at" icon="calendar-up" id="shipped_at"
                                        label="Fecha de Envío"
                                        value="{{ old('shipped_at', optional($order->shipped_at)->format('Y-m-d')) }}" />
                                </div>
                                <div class="flex-1">
                                    <x-input type="date" icon="calendar-down" name="delivered_at" id="delivered_at"
                                        label="Fecha de Entrega"
                                        value="{{ old('delivered_at', optional($order->delivered_at)->format('Y-m-d')) }}" />
                                </div>
                            </div>
                        </div>
                        <div class="border-t border-zinc-400 p-4 dark:border-zinc-800">
                            <p class="mb-4 font-medium text-zinc-500 dark:text-zinc-300">
                                Método de envío
                            </p>
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
                                    label="Total" value="{{ old('total', $order->total) }}" placeholder="Total del pedido"
                                    required />
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
                    </div>
                </div>
                <!-- Botones de Acción -->
                <div class="mt-4 flex items-center justify-center gap-2">
                    <x-button type="submit" text="Actualizar Pedido" icon="check" typeButton="primary" />
                    <x-button type="a" href="{{ route('admin.orders.index') }}" text="Cancelar"
                        typeButton="secondary" />
                </div>
            </form>

            <!-- Modal order completed -->
            <div id="order-completed" tabindex="-1" aria-hidden="true"
                class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black bg-opacity-50 md:inset-0 md:h-full">
                <div class="relative h-full w-full max-w-md p-4 md:h-auto">
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
                                        value="{{ old('completed_at', optional($order->completed_at)->format('Y-m-d')) }}" />
                                </div>
                            </div>
                            <div class="mt-4 flex justify-end gap-2">
                                <x-button type="button" id="btn-order-completed" text="Completar orden"
                                    icon="shopping-bag-check" typeButton="primary" />
                                <x-button type="button" data-modal-toggle="addLabel" text="Cancelar"
                                    typeButton="secondary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal order canceled -->
            <div id="order-canceled" tabindex="-1" aria-hidden="true"
                class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black bg-opacity-50 md:inset-0 md:h-full">
                <div class="relative h-full w-full max-w-md p-4 md:h-auto">
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
                                        value="{{ old('canceled_at', optional($order->canceled_at)->format('Y-m-d')) }}" />
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
                                <x-button type="button" data-modal-toggle="addLabel" text="Cancelar"
                                    typeButton="secondary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
