@extends('layouts.admin-template')
@section('title', 'Tickets de soporte')
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
                <h2 class="font-secondary px-4 pt-4 text-lg font-medium text-zinc-600 dark:text-zinc-200 md:text-xl">
                    Cupones de descuento
                </h2>
                <div class="mx-auto w-full">
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
                                <x-button type="a" href="{{ route('admin.sales-strategies.coupon.create') }}"
                                    typeButton="primary" text="Agregar cupon" icon="plus" />
                            </div>
                        </div>
                        <div class="mx-4 mb-4">
                            <x-table>
                                <x-slot name="thead">
                                    <x-tr>
                                        <x-th class="w-10">
                                            <input id="default-checkbox" type="checkbox" value=""
                                                class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-blue-600">
                                        </x-th>
                                        <x-th>
                                            Código
                                        </x-th>
                                        <x-th>
                                            Tipo de descuento
                                        </x-th>
                                        <x-th>
                                            Valor de descuento
                                        </x-th>
                                        <x-th>
                                            Regla
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
                                    @if ($coupons->count() == 0)
                                        <x-tr>
                                            <x-td colspan="7">
                                                No hay cupones registrados
                                            </x-td>
                                        </x-tr>
                                    @else
                                        @foreach ($coupons as $coupon)
                                            <x-tr>
                                                <x-td>
                                                    <input id="default-checkbox" type="checkbox" value=""
                                                        class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-blue-600">
                                                </x-td>
                                                <x-td>
                                                    {{ $coupon->code }}
                                                </x-td>
                                                <x-td>
                                                    <span>
                                                        {{ $coupon->discount_type === 'percentage' ? 'Porcentaje' : 'Fijo' }}
                                                    </span>
                                                </x-td>
                                                <x-td>
                                                    <span class="flex items-center gap-1">
                                                        @if ($coupon->discount_type === 'percentage')
                                                            {{ $coupon->discount_value }}
                                                            <x-icon icon="percent" class="h-4 w-4 text-zinc-500" />
                                                        @else
                                                            <x-icon icon="dollar" class="h-4 w-4 text-zinc-500" />
                                                            {{ $coupon->discount_value }}
                                                        @endif
                                                    </span>
                                                </x-td>
                                                <x-td>
                                                    {{ \App\Utils\CouponRules::getRule($coupon->rule->predefined_rule) }}
                                                </x-td>
                                                <x-td>
                                                    <x-badge-status status="{{ $coupon->active }}" />
                                                </x-td>
                                                <x-td>
                                                    <div class="flex gap-2">
                                                        <x-button type="a"
                                                            href="{{ route('admin.sales-strategies.coupon.edit', $coupon->id) }}"
                                                            typeButton="success" icon="edit" onlyIcon="true" />
                                                        <form
                                                            action="{{ route('admin.sales-strategies.coupon.destroy', $coupon->id) }}"
                                                            id="formDeleteCoupon" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <x-button type="button" data-form="formDeleteCoupon"
                                                                class="buttonDelete" onlyIcon="true" icon="delete"
                                                                typeButton="danger" data-modal-target="deleteModal"
                                                                data-modal-toggle="deleteModal" />
                                                        </form>
                                                        <x-button type="button" class="showCoupon"
                                                            data-href="{{ route('admin.sales-strategies.coupon.show', $coupon->id) }}"
                                                            typeButton="secondary" icon="view" onlyIcon="true"
                                                            data-drawer="#drawer-details-coupon" />
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
        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar el cupón?"
            message="No podrás recuperar este registro" action="" />
        <!-- End Delete modal -->

        <!-- Drawer details coupon -->
        <div id="drawer-show-coupon"
            class="drawer fixed right-0 top-0 z-40 h-screen w-[500px] translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-show-coupon">
            <h5 id="drawer-show-coupon-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-zinc-500 dark:text-zinc-400">
                Detalles del cupón
            </h5>
            <button type="button" data-drawer="#drawer-show-coupon"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div class="font-secondary text-sm" id="show-coupon-content">
            </div>
        </div>
        <!-- End Drawer details coupon -->
    </div>
@endsection
