@extends('layouts.admin-template')
@section('title', 'Pedidos')
@section('content')
    <div>
        @include('layouts.__partials.admin.header-page', [
            'title' => 'Pedidos',
            'description' => 'Administra los pedidos de tus clientes',
        ])
        <div class="bg-zinc-50 dark:bg-black">
            <div class="mx-auto w-full">
                <div class="relative bg-white dark:bg-black">
                    <div class="border-b border-zinc-400 p-4 dark:border-zinc-800">
                        <h2 class="text-base font-semibold text-zinc-700 dark:text-zinc-200">
                            Lista de pedidos
                        </h2>
                    </div>
                    <div
                        class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-x-4 md:space-y-0">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" action="{{ route('admin.categories.search') }}"
                                id="formSearchCategorie">
                                @csrf
                                <x-input type="text" id="inputSearch" name="inputSearch" data-form="#formSearchCategorie"
                                    data-table="#tableCategorie" placeholder="Buscar" icon="search" />
                            </form>
                        </div>
                        <div
                            class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0">
                            <x-button type="a" href="{{ route('admin.customers.create') }}" text="Nuevo pedido"
                                icon="plus" typeButton="primary" />
                            <div class="flex w-full items-center space-x-3 md:w-auto">
                                <x-button type="button" typeButton="secondary" id="filterDropdownButton"
                                    data-dropdown-toggle="filterDropdown" text="Filtros" icon="filter" />
                                <div id="filterDropdown"
                                    class="z-10 hidden w-48 rounded-lg bg-white p-3 shadow dark:bg-zinc-950">
                                    <form action="{{ route('admin.categories.search') }}" method="POST"
                                        id="formSearchCategorieCheck">
                                        @csrf
                                        <h6 class="mb-3 text-sm font-medium text-zinc-900 dark:text-white">
                                            Categorías:
                                        </h6>
                                        <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                            <li class="flex items-center">
                                                <input id="no_subcategories" name="filter[]" type="checkbox"
                                                    value="no_subcategories"
                                                    class="h-4 w-4 rounded border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-500 dark:bg-white dark:ring-offset-zinc-700 dark:focus:ring-primary-600">
                                                <label for="no_subcategories"
                                                    class="ml-2 text-sm font-medium text-zinc-900 dark:text-zinc-100">
                                                    Sin subcategorías
                                                </label>
                                            </li>
                                            <li class="flex items-center">
                                                <input id="has_subcategories" name="filter[]" type="checkbox"
                                                    value="has_subcategories"
                                                    class="h-4 w-4 rounded border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-500 dark:bg-white dark:ring-offset-zinc-700 dark:focus:ring-primary-600">
                                                <label for="fitbit"
                                                    class="ml-2 text-sm font-medium text-zinc-900 dark:text-zinc-100">
                                                    Con subcategorías
                                                </label>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mx-4 mb-4">
                        <x-table>
                            <x-slot name="thead">
                                <x-tr>
                                    <x-th class="flex w-12 items-center justify-center">
                                        <input id="default-checkbox" type="checkbox" value=""
                                            class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-primary-600">
                                    </x-th>
                                    <x-th>Cliente</x-th>
                                    <x-th>N° orden</x-th>
                                    <x-th>Total</x-th>
                                    <x-th>
                                        <span class="text-nowrap">
                                            Fecha creado
                                        </span>
                                    </x-th>
                                    <x-th>Estado</x-th>
                                    <x-th>Pago</x-th>
                                    <x-th :last="true">Acciones</x-th>
                                </x-tr>
                            </x-slot>
                            <x-slot name="tbody">
                                @if ($orders->count() > 0)
                                    @foreach ($orders as $order)
                                        <x-tr section="body">
                                            <x-td>
                                                <input id="default-checkbox" type="checkbox" value="{{ $order->id }}"
                                                    class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-primary-600">
                                            </x-td>
                                            <x-td>
                                                <div class="flex gap-4">
                                                    <div>
                                                        <img src="{{ Storage::url($order->customer->user->profile) }}"
                                                            alt="{{ $order->customer->user->name }} profile"
                                                            class="min-h-10 min-w-10 h-10 w-10 rounded-full object-cover">
                                                    </div>
                                                    <div class="flex flex-col items-start justify-center gap-1 text-sm">
                                                        <p>{{ $order->customer->user->name }}</p>
                                                        <p>{{ $order->customer->user->email }}</p>
                                                    </div>
                                                </div>
                                            </x-td>
                                            <x-td>{{ $order->number_order }}</x-td>
                                            <x-td>${{ $order->total }}</x-td>
                                            <x-td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</x-td>
                                            <x-td>
                                                <x-status-badge status="{{ $order->status }}" />
                                            </x-td>
                                            <x-td>
                                                <x-status-badge status="{{ $order->payment_status }}" />
                                            </x-td>
                                            <x-td>
                                                <div class="items center flex justify-center gap-2">
                                                    <x-button type="a" icon="edit" typeButton="success"
                                                        onlyIcon="true"
                                                        href="{{ route('admin.orders.edit', $order->id) }}" />
                                                    <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                                        id="formDeleteOrder-{{ $order->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button"
                                                            data-form="formDeleteOrder-{{ $order->id }}"
                                                            class="buttonDelete" onlyIcon="true" icon="delete"
                                                            typeButton="danger" data-modal-target="deleteModal" />
                                                    </form>
                                                    <x-button type="a" icon="view" typeButton="secondary"
                                                        onlyIcon="true"
                                                        href="{{ route('admin.orders.show', $order->id) }}" />
                                                    <x-button type="button" icon="printer" typeButton="secondary"
                                                        onlyIcon="true" />
                                                    <div class="relative">
                                                        <x-button type="button" icon="refresh" typeButton="secondary"
                                                            onlyIcon="true" class="show-options"
                                                            data-target="#options-order-{{ $order->id }}" />
                                                        <div class="options absolute right-0 top-11 z-10 hidden w-40 animate-jump-in rounded-lg border border-zinc-400 bg-white p-2 animate-duration-200 dark:border-zinc-800 dark:bg-zinc-950"
                                                            id="options-order-{{ $order->id }}">
                                                            <p class="font-semibold text-zinc-800 dark:text-zinc-300">
                                                                Cambiar estado
                                                            </p>
                                                            <form action="{{ Route('admin.orders.status', $order->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" name="status">
                                                                <ul class="mt-2 flex flex-col text-sm">
                                                                    <li>
                                                                        <button type="button"
                                                                            class="change-status-order flex w-full items-center gap-1 rounded-lg px-2 py-2 text-emerald-700 hover:bg-emerald-100 dark:text-emerald-400 dark:hover:bg-emerald-950 dark:hover:bg-opacity-20"
                                                                            data-status="completed">
                                                                            <x-icon icon="check" class="h-4 w-4" />
                                                                            Completado
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button"
                                                                            class="change-status-order flex w-full items-center gap-1 rounded-lg px-2 py-2 text-blue-700 hover:bg-blue-100 dark:text-blue-400 dark:hover:bg-blue-950 dark:hover:bg-opacity-20"
                                                                            data-status="sent">
                                                                            <x-icon icon="package-import"
                                                                                class="h-4 w-4" />
                                                                            Enviado
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button"
                                                                            class="change-status-order flex w-full items-center gap-1 rounded-lg px-2 py-2 text-yellow-700 hover:bg-yellow-100 dark:text-yellow-400 dark:hover:bg-yellow-950 dark:hover:bg-opacity-20"
                                                                            data-status="pending">
                                                                            <x-icon icon="reload" class="h-4 w-4" />
                                                                            Pendiente
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" href="#"
                                                                            class="change-status-order flex w-full items-center gap-1 rounded-lg px-2 py-2 text-red-700 hover:bg-red-100 dark:text-red-400 dark:hover:bg-red-950 dark:hover:bg-opacity-20"
                                                                            data-status="canceled">
                                                                            <x-icon icon="x" class="h-4 w-4" />
                                                                            Cancelado
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </x-td>
                                        </x-tr>
                                    @endforeach
                                @else
                                    <x-tr section="body">
                                        <x-td class="text-center" :colspan="7">
                                            No se encontraron registros
                                        </x-td>
                                    </x-tr>
                                @endif
                            </x-slot>
                        </x-table>
                    </div>
                </div>
            </div>
        </div>
        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar la orden?"
            message="No podrás recuperar este registro" action="" />
    </div>
@endsection
