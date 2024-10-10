@extends('layouts.__partials.store.template-profile')
@section('profile-content')
    <div class="flex flex-col">
        <!-- Tabs titles -->
        <div>
            <div class="mb-4 border-b border-zinc-400">
                <ul class="-mb-px flex flex-wrap text-center text-xs font-medium sm:text-base" id="default-tab"
                    data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="flex items-center gap-2 rounded-t-lg border-b-2 p-4" id="all-orders"
                            data-tabs-target="#orders" type="button" role="tab" aria-controls="orders"
                            aria-selected="false">
                            <x-icon-store icon="shopping-bag" class="h-5 w-5 text-current" />
                            <span class="hidden sm:block">
                                Todos
                            </span>
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="flex items-center gap-2 rounded-t-lg border-b-2 p-4 hover:border-zinc-400 hover:text-zinc-600"
                            id="pending-orders" data-tabs-target="#pending" type="button" role="tab"
                            aria-controls="pending" aria-selected="false">
                            <x-icon-store icon="clock" class="h-5 w-5 text-current" />
                            <span class="hidden sm:block">
                                Pendientes
                            </span>
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="flex items-center gap-2 rounded-t-lg border-b-2 p-4 hover:border-zinc-400 hover:text-zinc-600"
                            id="processed-orders" data-tabs-target="#processed" type="button" role="tab"
                            aria-controls="processed" aria-selected="false">
                            <x-icon-store icon="shopping-bag-check" class="h-5 w-5 text-current" />
                            <span class="hidden sm:block">
                                Procesados
                            </span>
                        </button>
                    </li>
                    <li role="presentation">
                        <button
                            class="flex items-center gap-2 rounded-t-lg border-b-2 p-4 hover:border-zinc-400 hover:text-zinc-600"
                            id="cancelled-orders" data-tabs-target="#cancelled" type="button" role="tab"
                            aria-controls="cancelled" aria-selected="false">
                            <x-icon-store icon="shopping-bag-remove" class="h-5 w-5 text-current" />
                            <span class="hidden sm:block">
                                Cancelados
                            </span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Tabs titles -->

        <!-- Filter orders -->
        <div class="mb-4 flex w-full flex-col flex-wrap gap-4 sm:flex-row sm:gap-8">
            <div class="flex w-full flex-[2]">
                <x-input-store type="search" icon="search" name="search-order" id="search-order"
                    placeholder="Buscar pedido..." />
            </div>
            <div class="font-secondary flex w-full flex-1 flex-col gap-2 sm:w-80">
                <x-select-store label="" id="status-order" name="status-order" :options="[
                    'mas_reciente' => 'Más reciente',
                    'mas_antiguo' => 'Más antiguo',
                    'ultimo_mes' => 'Último mes',
                    'ultimo_año' => 'Último año',
                ]"
                    value="{{ old('status-order') }}" selected="{{ old('status-order') }}" />
            </div>
        </div>
        <!-- End Filter orders -->
    </div>
    <div id="default-tab-content">
        <!-- All orders -->
        <div class="hidden" id="orders" role="tabpanel" aria-labelledby="all-orders">
            @if ($orders->count() > 0)
                <div
                    class="hidden flex-col items-center justify-center gap-2 rounded-xl border border-zinc-200 px-4 pb-4 shadow-sm lg:flex">
                    <div class="w-full">
                        <table class="w-full table-auto overflow-x-auto font-league-spartan">
                            <thead>
                                <tr class="border-b border-zinc-200">
                                    <th scope="col"
                                        class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                        N° de pedido
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                        N° de seguimiento
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                        Total
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                        Fecha de compra
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                        Estado
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-200 bg-white">
                                @foreach ($orders as $order)
                                    <tr class="hover:bg-zinc-50">
                                        <td class="whitespace-nowrap px-4 py-4">
                                            <span
                                                class="font-secondary rounded-full bg-blue-100 px-4 py-1 text-sm font-semibold text-secondary">
                                                {{ $order->number_order }}
                                            </span>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-4">
                                            <span class="font-secondary text-sm text-zinc-500">
                                                {{ $order->tracking_number }}
                                            </span>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-4">
                                            <span
                                                class="rounded-full bg-blue-100 px-4 py-1 text-xs font-medium text-blue-700">
                                                {{ $order->total }}
                                            </span>
                                        </td>
                                        <td class="whitespace nowrap px-4 py-4 text-sm text-zinc-500">
                                            {{ $order->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-4 text-sm text-zinc-500">
                                            @switch($order->status)
                                                @case('pending')
                                                    <span
                                                        class="rounded-full bg-yellow-100 px-4 py-1 text-xs font-medium text-yellow-700">
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                @break

                                                @case('sent')
                                                    <span
                                                        class="rounded-full bg-blue-100 px-4 py-1 text-xs font-medium text-blue-700">
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                @break

                                                @case('completed')
                                                    <span
                                                        class="rounded-full bg-green-100 px-4 py-1 text-xs font-medium text-green-700">
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                @break

                                                @case('canceled')
                                                    <span
                                                        class="rounded-full bg-red-100 px-4 py-1 text-xs font-medium text-red-700">
                                                        {{ ucfirst($order->status) }}
                                                    </span>
                                                @break

                                                @default
                                            @endswitch
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-4 text-sm">
                                            <div class="flex items-center gap-2">
                                                <x-button-store icon="view" type="a"
                                                    href="{{ Route('orders.show', $order->number_order) }}"
                                                    typeButton="secondary" onlyIcon="true" class="w-max" />
                                                @if ($order->status !== 'completed' && $order->status !== 'canceled' && $order->status !== 'sent')
                                                    <div>
                                                        <form action="{{ Route('order.cancel', $order->id) }}"
                                                            method="POST" id="formCancelOrder-{{ $order->id }}">
                                                            @csrf
                                                            <x-button-store icon="cancel-circle" type="button"
                                                                href="{{ Route('account.tickets.show', $order->id) }}"
                                                                typeButton="danger" onlyIcon="true"
                                                                class="buttonDelete w-max"
                                                                data-tooltip-target="tooltip-cancel-ticket"
                                                                data-form="formCancelOrder-{{ $order->id }}" />
                                                        </form>
                                                        <div id="tooltip-cancel-ticket" role="tooltip"
                                                            class="tooltip invisible absolute z-10 inline-block rounded-lg bg-red-500 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300">
                                                            Cancelar pedido
                                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Cards mobile -->
                <div class="mb-4 flex flex-col gap-4 lg:hidden">
                    @foreach ($orders as $order)
                        <x-order-card :order="$order" />
                    @endforeach
                </div>
            @else
                <div
                    class="mb-4 flex items-center justify-center gap-2 rounded-xl border-2 border-dashed border-zinc-300 p-20 text-sm">
                    <x-icon-store icon="information-circle" class="h-6 w-6 text-zinc-500" />
                    <p class="text-center text-zinc-800">
                        No tienes pedidos realizados
                    </p>
                </div>
            @endif
        </div>
        <!-- End All orders -->

        <!-- Pending orders -->
        <div class="hidden" id="pending" role="tabpanel" aria-labelledby="pending-orders">
            @if ($ordersPending->count() > 0)
                <div
                    class="hidden flex-col items-center justify-center gap-2 overflow-x-auto rounded-xl border border-zinc-200 px-4 pb-4 shadow-sm lg:flex">
                    <div class="w-full overflow-x-auto">
                        <table class="table-auto font-league-spartan">
                            <thead>
                                <tr class="border-b border-zinc-200">
                                    <th scope="col"
                                        class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                        N° de pedido
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                        N° de seguimiento
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                        Total
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                        Fecha de compra
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                        Estado
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-200 bg-white">
                                @foreach ($ordersPending as $order)
                                    <tr class="hover:bg-zinc-50">
                                        <td class="whitespace-nowrap px-4 py-4">
                                            <span
                                                class="font-secondary rounded-full bg-blue-100 px-4 py-1 text-sm font-semibold text-secondary">
                                                {{ $order->number_order }}
                                            </span>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-4">
                                            <span class="font-secondary text-sm text-zinc-500">
                                                {{ $order->tracking_number }}
                                            </span>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-4">
                                            <span
                                                class="rounded-full bg-blue-100 px-4 py-1 text-xs font-medium text-blue-700">
                                                {{ $order->total }}
                                            </span>
                                        </td>
                                        <td class="whitespace nowrap px-4 py-4 text-sm text-zinc-500">
                                            {{ $order->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-4 text-sm text-zinc-500">
                                            <span
                                                class="rounded-full bg-yellow-100 px-4 py-1 text-xs font-medium text-yellow-700">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-4 text-sm">
                                            <div class="flex items-center gap-2">
                                                <x-button-store icon="view" type="a"
                                                    href="{{ Route('orders.show', $order->number_order) }}"
                                                    typeButton="secondary" onlyIcon="true" class="w-max" />
                                                <div>
                                                    <form action="{{ Route('order.cancel', $order->id) }}" method="POST"
                                                        id="formCancelOrder-{{ $order->id }}">
                                                        @csrf
                                                        <x-button-store icon="cancel-circle" type="button"
                                                            href="{{ Route('account.tickets.show', $order->id) }}"
                                                            typeButton="danger" onlyIcon="true"
                                                            class="buttonDelete w-max"
                                                            data-tooltip-target="tooltip-cancel-ticket"
                                                            data-form="formCancelOrder-{{ $order->id }}" />
                                                    </form>
                                                    <div id="tooltip-cancel-ticket" role="tooltip"
                                                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-red-500 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300">
                                                        Cancelar pedido
                                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Cards mobile -->
                <div class="mb-4 flex flex-col gap-4 lg:hidden">
                    @foreach ($ordersPending as $order)
                        <x-order-card :order="$order" />
                    @endforeach
                </div>
            @else
                <div
                    class="mb-4 flex items-center justify-center gap-2 rounded-xl border-2 border-dashed border-zinc-300 p-20 text-sm">
                    <x-icon-store icon="information-circle" class="h-6 w-6 text-zinc-500" />
                    <p class="text-center text-zinc-800">
                        No tienes pedidos pendientes
                    </p>
                </div>
            @endif

        </div>
        <!-- End Pending orders -->

        <!-- Processed orders -->
        <div class="hidden" id="processed" role="tabpanel" aria-labelledby="processed-orders">
            @if ($ordersApproved->count() > 0)
                <div
                    class="hidden flex-col items-center justify-center gap-2 overflow-x-auto rounded-xl border border-zinc-200 px-4 pb-4 shadow-sm lg:flex">
                    <table class="w-full font-league-spartan">
                        <thead>
                            <tr class="border-b border-zinc-200">
                                <th scope="col"
                                    class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                    N° de pedido
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                    N° de seguimiento
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                    Total
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                    Fecha de compra
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                    Estado
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-200 bg-white">
                            @foreach ($ordersApproved as $order)
                                <tr class="hover:bg-zinc-50">
                                    <td class="whitespace-nowrap px-4 py-4">
                                        <span
                                            class="font-secondary rounded-full bg-blue-100 px-4 py-1 text-sm font-semibold text-secondary">
                                            {{ $order->number_order }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4">
                                        <span class="font-secondary text-sm text-zinc-500">
                                            {{ $order->tracking_number }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4">
                                        <span class="rounded-full bg-blue-100 px-4 py-1 text-xs font-medium text-blue-700">
                                            {{ $order->total }}
                                        </span>
                                    </td>
                                    <td class="whitespace nowrap px-4 py-4 text-sm text-zinc-500">
                                        {{ $order->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-sm text-zinc-500">
                                        @if ($order->status === 'completed')
                                            <span
                                                class="rounded-full bg-green-100 px-4 py-1 text-xs font-medium text-green-700">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        @elseif($order->status === 'sent')
                                            <span
                                                class="rounded-full bg-blue-100 px-4 py-1 text-xs font-medium text-blue-700">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-sm">
                                        <div class="flex items-center gap-2">
                                            <x-button-store icon="view" type="a"
                                                href="{{ Route('orders.show', $order->number_order) }}"
                                                typeButton="secondary" onlyIcon="true" class="w-max" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Cards mobile -->
                <div class="mb-4 flex flex-col gap-4 lg:hidden">
                    @foreach ($ordersApproved as $order)
                        <x-order-card :order="$order" />
                    @endforeach
                </div>
            @else
                <div
                    class="mb-4 flex items-center justify-center gap-2 rounded-xl border-2 border-dashed border-zinc-300 p-20 text-sm">
                    <x-icon-store icon="information-circle" class="h-6 w-6 text-zinc-500" />
                    <p class="text-center text-zinc-800">
                        No tienes pedidos completados
                    </p>
                </div>
            @endif

        </div>
        <!-- End Processed orders -->

        <!-- Cancelled orders -->
        <div class="hidden" id="cancelled" role="tabpanel" aria-labelledby="cancelled-orders">
            @if ($ordersRejected->count() > 0)
                <div
                    class="hidden flex-col items-center justify-center gap-2 overflow-x-auto rounded-xl border border-zinc-200 px-4 pb-4 shadow-sm lg:flex">
                    <table class="w-full font-league-spartan">
                        <thead>
                            <tr class="border-b border-zinc-200">
                                <th scope="col"
                                    class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                    N° de pedido
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                    N° de seguimiento
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                    Total
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                    Fecha de compra
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                    Estado
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left font-league-spartan text-xs font-medium uppercase tracking-wider text-zinc-500">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-200 bg-white">
                            @foreach ($ordersRejected as $order)
                                <tr class="hover:bg-zinc-50">
                                    <td class="whitespace-nowrap px-4 py-4">
                                        <span
                                            class="font-secondary rounded-full bg-blue-100 px-4 py-1 text-sm font-semibold text-secondary">
                                            {{ $order->number_order }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4">
                                        <span class="font-secondary text-sm text-zinc-500">
                                            {{ $order->tracking_number }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4">
                                        <span class="rounded-full bg-blue-100 px-4 py-1 text-xs font-medium text-blue-700">
                                            {{ $order->total }}
                                        </span>
                                    </td>
                                    <td class="whitespace nowrap px-4 py-4 text-sm text-zinc-500">
                                        {{ $order->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-sm text-zinc-500">
                                        <span class="rounded-full bg-red-100 px-4 py-1 text-xs font-medium text-red-700">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-4 text-sm">
                                        <div class="flex items-center gap-2">
                                            <x-button-store icon="view" type="a"
                                                href="{{ Route('orders.show', $order->number_order) }}"
                                                typeButton="secondary" onlyIcon="true" class="w-max" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Cards mobile -->
                <div class="mb-4 flex flex-col gap-4 lg:hidden">
                    @foreach ($ordersRejected as $order)
                        <x-order-card :order="$order" />
                    @endforeach
                </div>
            @else
                <div
                    class="mb-4 flex items-center justify-center gap-2 rounded-xl border-2 border-dashed border-zinc-300 p-20 text-sm">
                    <x-icon-store icon="information-circle" class="h-6 w-6 text-zinc-500" />
                    <p class="text-center text-zinc-800">
                        No tienes pedidos cancelados
                    </p>
                </div>
            @endif

        </div>
        <!-- End Cancelled orders -->

        <!-- Delete Modal -->
        <div class="deleteModal fixed inset-0 z-50 hidden items-center justify-center bg-zinc-800 bg-opacity-75 transition-opacity"
            aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center px-4 pb-20 pt-4 text-center sm:block sm:p-0">
                <div class="inline-block transform animate-jump-in overflow-hidden rounded-xl bg-white text-left align-bottom shadow-xl transition-all animate-duration-300 animate-once sm:my-8 sm:w-full sm:max-w-lg sm:align-middle"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <x-icon-store icon="alert" class="h-6 w-6 text-red-600" />
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-headline">
                                    Cancelar pedido
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        ¿Estás seguro de que deseas cancelar el pedido? Esta acción no se puede deshacer.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-4 bg-gray-50 px-4 py-3">
                        <x-button-store type="button" text="Cerrar" class="closeModal w-max text-sm"
                            typeButton="secondary" />
                        <x-button-store type="button" text="Si, cancelar pedido" icon="cancel-circle"
                            class="confirmDelete w-max text-sm" typeButton="danger" />
                    </div>
                </div>
            </div>
        </div>
        <!-- End Delete Modal -->

    @endsection
