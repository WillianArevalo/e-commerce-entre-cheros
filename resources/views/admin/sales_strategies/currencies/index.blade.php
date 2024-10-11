@extends('layouts.admin-template')
@section('title', 'Monedas')
@section('content')
    <div>
        <div class="lg:ms-60">
            @include('layouts.__partials.admin.header-page', [
                'title' => 'Estrategias de venta',
                'description' =>
                    'Administrar los cupones de descuento, métodos de envío, método de pagos y cambio de divisas',
            ])
        </div>
        <div class="flex bg-zinc-50 dark:bg-black">
            @include('layouts.__partials.admin.nav-sales-strategies')
            <div class="mx-auto w-full lg:ms-60">
                <div class="mb-4">
                    <h2 class="font-secondary px-4 pt-4 text-lg font-medium text-zinc-600 dark:text-zinc-200 md:text-xl">
                        Monedas
                    </h2>
                </div>
                <div class="mx-auto w-full border-t border-zinc-400 dark:border-zinc-800">
                    <div class="relative overflow-hidden bg-white dark:bg-black">
                        <div
                            class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-x-4 md:space-y-0">
                            <div class="w-full md:w-1/2">
                                <form class="flex items-center" action="{{ route('admin.brands.search') }}"
                                    id="formSearchBrand">
                                    @csrf
                                    <x-input type="text" id="inputSearch" name="inputSearch" data-form="#formSearchBrand"
                                        data-table="#tableBrand" placeholder="Buscar" icon="search" />
                                </form>
                            </div>
                            <div
                                class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0">
                                <x-button type="button" class="open-drawer" data-drawer="#drawer-new-currency"
                                    typeButton="primary" text="Nueva moneda" icon="plus" />
                            </div>
                        </div>
                        <div class="mx-4 mb-4">
                            <x-table>
                                <x-slot name="thead">
                                    <x-tr>
                                        <x-th class="w-10">
                                        </x-th>
                                        <x-th>
                                            Nombre
                                        </x-th>
                                        <x-th>
                                            Código
                                        </x-th>
                                        <x-th>
                                            Simbolo
                                        </x-th>
                                        <x-th>
                                            <span class="text-nowrap">
                                                Tasa de cambio
                                            </span>
                                        </x-th>
                                        <x-th>
                                            Estado
                                        </x-th>
                                        <x-th :last="true">
                                            Acciones
                                        </x-th>
                                    </x-tr>
                                </x-slot>
                                <x-slot name="tbody">
                                    @if ($currencies->count() == 0)
                                        <x-tr>
                                            <x-td colspan="7">
                                                No hay monedas registradas
                                            </x-td>
                                        </x-tr>
                                    @else
                                        @foreach ($currencies as $currency)
                                            <x-tr>
                                                <x-td>
                                                    @if ($currency->is_default === 1)
                                                        <span data-tooltip-target="tooltip-default" type="button">
                                                            <x-icon icon="badge-check" class="h-5 w-5 text-green-600" />
                                                        </span>
                                                        <div id="tooltip-default" role="tooltip"
                                                            class="tooltip invisible absolute z-10 inline-block rounded-lg bg-zinc-50 px-3 py-2 text-xs font-medium text-zinc-700 opacity-0 shadow-sm transition-opacity duration-300 dark:bg-blue-600 dark:text-white">
                                                            Moneda predefinida
                                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                                        </div>
                                                    @endif
                                                </x-td>
                                                <x-td>
                                                    {{ $currency->name }}
                                                </x-td>
                                                <x-td class="px-4 py-3">
                                                    {{ $currency->code }}
                                                </x-td>
                                                <x-td class="px-4 py-3">
                                                    {{ $currency->symbol }}
                                                </x-td>
                                                <x-td class="px-4 py-3">
                                                    {{ $currency->exchange_rate }}
                                                </x-td>
                                                <x-td class="px-4 py-3">
                                                    <x-badge-status :status="$currency->active" />
                                                </x-td>
                                                <x-td class="px-4 py-3">
                                                    <div class="flex gap-2">
                                                        <x-button type="button" class="btnEditCurrency"
                                                            data-href="{{ route('admin.sales-strategies.currencies.edit', $currency->id) }}"
                                                            data-action="{{ route('admin.sales-strategies.currencies.update', $currency->id) }}"
                                                            typeButton="success" icon="edit" onlyIcon="true" />
                                                        <form
                                                            action="{{ route('admin.sales-strategies.currencies.destroy', $currency->id) }}"
                                                            id="formDeleteCurrency-{{ $currency->id }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <x-button type="button"
                                                                data-form="formDeleteCurrency-{{ $currency->id }}"
                                                                class="buttonDelete" onlyIcon="true" icon="delete"
                                                                typeButton="danger" data-modal-target="deleteModal"
                                                                data-modal-toggle="deleteModal" />
                                                        </form>
                                                    </div>
                                                </x-td>
                                            </x-tr>
                                        @endforeach
                                    @endif
                                </x-slot>
                            </x-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete modal -->
        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar el método de pago?"
            message="No podrás recuperar este registro" action="" />
        <!-- End Delete modal -->

        <!-- Drawer new currency  -->
        <div id="drawer-new-currency"
            class="drawer fixed right-0 top-0 z-[70] h-screen w-full translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black sm:w-[500px]"
            tabindex="-1" aria-labelledby="drawer-new-currency">
            <h5 id="drawer-new-currency-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-zinc-500 dark:text-zinc-400">
                Nueva moneda
            </h5>
            <button type="button" data-drawer="#drawer-new-currency"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <form action="{{ route('admin.sales-strategies.currencies.store') }}" class="flex flex-col gap-4"
                    method="POST">
                    @csrf
                    <div class="w-full">
                        <x-input type="text" name="code" required placeholder="Ej. USD, EUR, MXN" label="Abreviatura"
                            value="{{ old('code') }}" />
                    </div>
                    <div class="w-full">
                        <x-input type="text" name="symbol" required placeholder="Ej. $, €" label="Símbolo"
                            value="{{ old('symbol') }}" />
                    </div>
                    <div class="w-full">
                        <x-input type="text" name="name" required placeholder="Ingresa el nombre de la moneda"
                            label="Nombre" value="{{ old('name') }}" />
                    </div>
                    <div class="w-full">
                        <x-input type="number" step="0.01" name="exchange_rate" required
                            placeholder="Ingresa la tasa de cambio respecto a la divisa" label="Tasa de cambio"
                            value="{{ old('exchange_rate') }}" />
                    </div>
                    <div class="flex w-full flex-wrap items-center gap-4">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" value="0" name="is_default" id="default"
                                class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-primary-600">
                            <label for="default" class="text-sm text-zinc-500 dark:text-zinc-400">
                                Divisa por defecto
                            </label>
                            <span
                                class="me-2 inline-flex h-6 w-6 items-center justify-center rounded-full bg-zinc-200 text-sm font-semibold text-zinc-700 dark:bg-zinc-900 dark:text-white"
                                data-popover-target="popover-description" data-popover-placement="bottom-end">
                                <x-icon icon="information-circle" class="h-4 w-4" />
                                <span class="sr-only">Icon description</span>
                            </span>
                            <!-- Popover -->
                            <div data-popover id="popover-description" role="tooltip"
                                class="invisible absolute z-10 inline-block w-72 rounded-lg border border-gray-200 bg-white text-sm text-gray-500 opacity-0 shadow-sm transition-opacity duration-300 dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-400">
                                <div class="space-y-2 p-3">
                                    <h3 class="font-semibold text-zinc-900 dark:text-white">
                                        Divisa por defecto
                                    </h3>
                                    <p>
                                        La divisa por defecto es la divisa predeterminada que se muestra en la tienda.
                                    </p>
                                    <p>
                                        Si la activas, la anterior divisa que esta por defecto se cambiará, y la nueva sera
                                        la determinada.
                                    </p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                            <!-- End Popover -->
                        </div>
                        <div>
                            <input type="checkbox" value="0" name="auto_update" id="update"
                                class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-primary-600">
                            <label for="update" class="text-sm text-zinc-500 dark:text-zinc-400">
                                Actualización automática
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" value="0" name="active"
                                class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-primary-600">
                            <label for="active" class="text-sm text-zinc-500 dark:text-zinc-400">
                                Activa
                            </label>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-center gap-2">
                        <x-button type="submit" text="Agregar moneda" icon="plus" typeButton="primary" />
                        <x-button type="button" data-drawer="#drawer-new-currency" class="close-drawer" text="Cancelar"
                            typeButton="secondary" icon="cancel" />
                    </div>
                </form>
            </div>
        </div>
        <!-- End Drawer new currency -->

        <!-- Drawer edit currency -->
        <div id="drawer-edit-currency"
            class="drawer fixed right-0 top-0 z-[70] h-screen w-full translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black sm:w-[500px]"
            tabindex="-1" aria-labelledby="drawer-edit-currency">
            <h5 id="drawer-edit-currency-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-zinc-500 dark:text-zinc-400">
                Editar moneda
            </h5>
            <button type="button" data-drawer="#drawer-edit-currency"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <form action="" class="flex flex-col gap-4" method="POST" id="formEditCurrency">
                    @csrf
                    @method('PUT')
                    <div class="w-full">
                        <x-input type="text" name="code" id="code" required placeholder="Ej. USD, EUR, MXN"
                            label="Abreviatura" value="{{ old('code') }}" />
                    </div>
                    <div class="w-full">
                        <x-input type="text" name="symbol" id="symbol" required placeholder="Ej. $, €"
                            label="Símbolo" value="{{ old('symbol') }}" />
                    </div>
                    <div class="w-full">
                        <x-input type="text" name="name" id="name" required
                            placeholder="Ingresa el nombre de la moneda" label="Nombre" value="{{ old('name') }}" />
                    </div>
                    <div class="w-full">
                        <x-input type="number" step="0.01" id="exchange_rate" name="exchange_rate" required
                            placeholder="Ingresa la tasa de cambio respecto a la divisa" label="Tasa de cambio"
                            value="{{ old('exchange_rate') }}" />
                    </div>
                    <div class="flex w-full flex-wrap items-center gap-4">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="is_default" id="is_default"
                                class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-primary-600">
                            <label for="is_default" class="text-sm text-zinc-500 dark:text-zinc-400">
                                Divisa por defecto
                            </label>
                            <span
                                class="me-2 inline-flex h-6 w-6 items-center justify-center rounded-full bg-zinc-200 text-sm font-semibold text-zinc-700 dark:bg-zinc-900 dark:text-white"
                                data-popover-target="popover-description-2" data-popover-placement="bottom-end">
                                <x-icon icon="information-circle" class="h-4 w-4" />
                                <span class="sr-only">Icon description</span>
                            </span>
                            <!-- Popover -->
                            <div data-popover id="popover-description-2" role="tooltip"
                                class="invisible absolute z-10 inline-block w-72 rounded-lg border border-gray-200 bg-white text-sm text-gray-500 opacity-0 shadow-sm transition-opacity duration-300 dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-400">
                                <div class="space-y-2 p-3">
                                    <h3 class="font-semibold text-zinc-900 dark:text-white">
                                        Divisa por defecto
                                    </h3>
                                    <p>
                                        La divisa por defecto es la divisa predeterminada que se muestra en la tienda.
                                    </p>
                                    <p>
                                        Si la activas, la anterior divisa que esta por defecto se cambiará, y la nueva sera
                                        la determinada.
                                    </p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                            <!-- End Popover -->
                        </div>
                        <div>
                            <input type="checkbox" value="0" name="auto_update" id="auto_update"
                                class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-primary-600">
                            <label for="auto_update" class="text-sm text-zinc-500 dark:text-zinc-400">
                                Actualización automática
                            </label>
                        </div>
                        <div>
                            <input type="checkbox" value="0" name="active" id="active"
                                class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-primary-600">
                            <label for="active" class="text-sm text-zinc-500 dark:text-zinc-400">
                                Activa
                            </label>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-center gap-2">
                        <x-button type="submit" text="Editar moneda" icon="edit" typeButton="primary" />
                        <x-button type="button" data-drawer="#drawer-edit-currency" class="close-drawer"
                            text="Cancelar" typeButton="secondary" icon="cancel" />
                    </div>
                </form>
            </div>
        </div>
        <!-- End Drawer edit currency -->

        <!-- Drawer details currency -->
        <div id="drawer-details-method"
            class="drawer fixed right-0 top-0 z-40 h-screen w-[500px] translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-details-method">
            <h5 id="drawer-details-method-label"
                class="ms-4 inline-flex items-center text-base font-semibold text-zinc-500 dark:text-zinc-400">
                Detalles del método de envío
            </h5>
            <button type="button" data-drawer="#drawer-details-method"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="font-secondary text-sm" id="show-method-content">
            </div>
        </div>
        <!-- End Drawer details payment method -->
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Comprueba si hay errores de validación en la sesión
            @if ($errors->any())
                @if (old('method') === 'POST')
                    $("#drawer-new-currency").removeClass("translate-x-full");
                @elseif (old('method') === 'UPDATE')
                    $("#drawer-edit-method").removeClass("translate-x-full");
                @endif
                $("#overlay").removeClass("hidden");
            @endif
        });
    </script>
@endsection
