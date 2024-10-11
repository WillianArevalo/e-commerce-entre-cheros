@extends('layouts.admin-template')
@section('title', 'Detalles del pedido')
@section('content')
    <div>
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Detalles del pedido',
            'text' => 'Regresar a la lista de pedidos',
            'url' => route('admin.orders.index'),
        ])
        <div class="h-full bg-white p-4 dark:bg-black">
            <div>
                <div class="flex flex-col-reverse justify-between sm:flex-row sm:items-center">
                    <div class="flex flex-col gap-2">
                        <h2 class="flex items-center gap-1 text-3xl font-bold text-zinc-800 dark:text-white">
                            <x-icon icon="hash" class="h-6 w-6" />
                            {{ $order->number_order }}
                        </h2>
                        <div class="text-sm uppercase text-zinc-500 dark:text-zinc-400">
                            <span>Fecha de creación:</span>
                            {{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y H:i') }}
                        </div>
                        <div class="text-sm uppercase text-zinc-500 dark:text-zinc-400">
                            <span>Número de seguimiento:</span>
                            {{ $order->tracking_number }}
                        </div>
                    </div>
                    <div class="mb-4 flex flex-col gap-2 sm:mb-0">
                        <div class="flex justify-end gap-2">
                            <x-button type="button" icon="printer" text="Imprimir" typeButton="secondary"
                                class="h-max w-full sm:w-auto" />
                            <x-button type="button" icon="truck" text="Enviar" typeButton="primary"
                                class="h-max w-full sm:w-auto" />
                        </div>
                        <div class="flex justify-end gap-2">
                            <x-button type="a" href="{{ Route('admin.orders.edit', $order->id) }}" icon="edit"
                                typeButton="success" class="h-max" onlyIcon="true" />
                            <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                id="formDeleteOrder-{{ $order->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-button type="button" data-form="formDeleteOrder-{{ $order->id }}"
                                    class="buttonDelete" onlyIcon="true" icon="delete" typeButton="danger"
                                    data-modal-target="deleteModal" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex flex-col gap-4 lg:flex-row">
                        <div class="flex-[2]">
                            <x-table>

                                <x-slot name="thead">
                                    <x-th class="flex w-14">
                                        <x-icon icon="hash" class="h-4 w-4" />
                                    </x-th>
                                    <x-th>Producto</x-th>
                                    <x-th>Cantidad</x-th>
                                    <x-th>Precio</x-th>
                                    <x-th last="true">Subtotal</x-th>
                                </x-slot>
                                <x-slot name="tbody">
                                    @foreach ($order->items as $item)
                                        <x-tr section="body">
                                            <x-td>
                                                <div class="text-sm text-zinc-900 dark:text-white">
                                                    {{ $loop->iteration }}
                                                </div>
                                            </x-td>
                                            <x-td>
                                                <div class="flex items-center">
                                                    <div
                                                        class="h-14 w-14 flex-shrink-0 rounded-lg border dark:border-zinc-900">
                                                        <img class="h-full w-full"
                                                            src="{{ Storage::url($item->product->main_image) }}"
                                                            alt="{{ $item->product->name }}">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div
                                                            class="text-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                                            {{ $item->product->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </x-td>
                                            <x-td>
                                                <div class="text-sm text-gray-900 dark:text-white">
                                                    {{ $item->quantity }}
                                                </div>
                                            </x-td>
                                            <x-td>
                                                <div class="text-sm text-gray-900 dark:text-white">
                                                    ${{ $item->price }}
                                                </div>
                                            </x-td>
                                            <x-td>
                                                <div class="text-sm text-gray-900 dark:text-white">
                                                    ${{ $item->quantity * $item->price }}
                                                </div>
                                            </x-td>
                                        </x-tr>
                                    @endforeach
                                </x-slot>
                            </x-table>
                            <div class="mt-4 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                                <div class="flex flex-col items-center gap-4 sm:items-start">
                                    <h4 class="text-lg font-semibold text-zinc-700 dark:text-zinc-200">
                                        Detalles del cliente
                                    </h4>
                                    <div class="flex flex-col gap-4">
                                        <div
                                            class="flex flex-col items-center gap-2 text-sm text-zinc-800 dark:text-zinc-300 sm:items-baseline">
                                            <span class="flex items-center gap-2">
                                                <x-icon icon="user" class="h-5 w-5" />
                                                Nombre completo:
                                            </span>
                                            <x-paragraph
                                                class="sm:ms-7">{{ $order->user->name . ' ' . $order->user->last_name }}
                                            </x-paragraph>
                                        </div>
                                        <div
                                            class="flex flex-col items-center gap-2 text-sm text-zinc-800 dark:text-zinc-300 sm:items-baseline">
                                            <span class="flex items-center gap-2">
                                                <x-icon icon="mail" class="h-5 w-5" />
                                                Email:
                                            </span>
                                            <x-paragraph class="sm:ms-7">{{ $order->user->email }}</x-paragraph>
                                        </div>
                                        <div
                                            class="flex flex-col items-center gap-2 text-sm text-zinc-800 dark:text-zinc-300 sm:items-baseline">
                                            <span class="flex items-center gap-2">
                                                <x-icon icon="phone" class="h-5 w-5" />
                                                Telefono:
                                            </span>
                                            <x-paragraph class="sm:ms-7">+
                                                {{ $order->customer->area_code . ' ' . $order->customer->phone }}
                                            </x-paragraph>
                                        </div>
                                        <div
                                            class="flex flex-col items-center gap-2 text-sm text-zinc-800 dark:text-zinc-300 sm:items-baseline">
                                            <span class="flex gap-2 sm:items-baseline">
                                                <x-icon icon="home" class="h-5 w-5" />
                                                Dirección:
                                            </span>
                                            <x-paragraph class="w-52 text-center sm:ms-7 sm:text-left">
                                                {{ $order->address->address_line_1 .
                                                    ', ' .
                                                    $order->address->address_line_2 .
                                                    ', ' .
                                                    $order->address->city .
                                                    ', ' .
                                                    $order->address->state .
                                                    $order->address->country }}
                                            </x-paragraph>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center gap-4 sm:items-start">
                                    <h4 class="text-lg font-semibold text-zinc-700 dark:text-zinc-200">
                                        Detalles de envío
                                    </h4>
                                    <div class="flex flex-col gap-4">
                                        <div
                                            class="flex flex-col items-center gap-2 text-sm text-zinc-800 dark:text-zinc-300 sm:items-baseline">
                                            <span class="flex items-center gap-2">
                                                <x-icon icon="truck" class="h-5 w-5" />
                                                Envío:
                                            </span>
                                            <x-paragraph class="sm:ms-7">
                                                {{ $order->shipping_method->name }}
                                            </x-paragraph>
                                        </div>
                                        <div
                                            class="flex flex-col items-center gap-2 text-sm text-zinc-800 dark:text-zinc-300 sm:items-baseline">
                                            <span class="flex items-center gap-2">
                                                <x-icon icon="clock" class="h-5 w-5" />
                                                Tiempo de entrega:
                                            </span>
                                            <x-paragraph class="sm:ms-7">
                                                {{ $order->shipping_method->time }}
                                            </x-paragraph>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center gap-4 sm:items-start">
                                    <h4 class="text-lg font-semibold text-zinc-700 dark:text-zinc-200">
                                        Detalles de pago
                                    </h4>
                                    <div class="flex flex-col gap-4">
                                        <div
                                            class="flex flex-col items-center gap-2 text-sm text-zinc-800 dark:text-zinc-300 sm:items-baseline">
                                            <span class="flex items-center gap-2">
                                                <x-icon icon="credit-card" class="h-5 w-5" />
                                                Método de pago:
                                            </span>
                                            <x-paragraph class="ms-7">
                                                {{ $order->payment_method->name }}
                                            </x-paragraph>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="flex-1">
                            <div class="overflow-hidden rounded-xl border border-zinc-400 dark:border-zinc-800">
                                <div
                                    class="border-b border-zinc-400 bg-zinc-100 p-4 dark:border-zinc-800 dark:bg-zinc-950">
                                    <h3 class="text-xl font-bold text-zinc-800 dark:text-zinc-300">
                                        Resumen
                                    </h3>
                                </div>
                                <div class="flex flex-col gap-4 p-4">

                                    <div class="flex justify-between">
                                        <div class="text-sm text-zinc-800 dark:text-zinc-300">
                                            Subtotal de artículos
                                        </div>
                                        <div class="text-sm text-zinc-800 dark:text-zinc-300">
                                            ${{ $order->subtotal }}
                                        </div>
                                    </div>


                                    <div class="flex justify-between">
                                        <div class="text-sm text-zinc-800 dark:text-zinc-300">
                                            Descuento
                                        </div>
                                        <div class="text-sm text-red-800 dark:text-red-500">
                                            -${{ $order->discount }}
                                        </div>
                                    </div>

                                    <div class="flex justify-between">
                                        <div class="text-sm text-zinc-800 dark:text-zinc-300">
                                            Impuesto
                                        </div>
                                        <div class="text-sm text-zinc-800 dark:text-zinc-300">
                                            ${{ $order->tax }}
                                        </div>
                                    </div>


                                    <div class="flex justify-between">
                                        <div class="text-sm text-zinc-800 dark:text-zinc-300">
                                            Monto de envío
                                        </div>
                                        <div class="text-sm text-zinc-800 dark:text-zinc-300">
                                            ${{ $order->shipping_method->cost }}
                                        </div>
                                    </div>

                                    <div
                                        class="flex justify-between border-t border-dashed border-zinc-400 pt-4 font-semibold dark:border-zinc-800">
                                        <div class="text-lg text-zinc-950 dark:text-zinc-100">
                                            Total
                                        </div>
                                        <div class="text-lg text-zinc-950 dark:text-zinc-100">
                                            ${{ $order->total }}
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="mt-4 rounded-xl border border-zinc-400 p-4 dark:border-zinc-800">
                                <h3 class="text-xl font-bold text-zinc-800 dark:text-zinc-300">
                                    Estado del pedido
                                </h3>
                                <div class="mt-2 flex flex-col gap-4">
                                    <div>
                                        <x-status-badge status="{{ $order->status }}" color="yellow" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar la orden?"
        message="No podrás recuperar este registro" action="" />
@endsection
