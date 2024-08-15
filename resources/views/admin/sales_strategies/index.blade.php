@extends('layouts.admin-template')

@section('title', 'Tickets de soporte')

@section('content')
    <div class="mt-4 rounded-lg">
        <div class="ms-60">
            @include('layouts.__partials.admin.header-page', [
                'title' => 'Estrategias de venta',
                'description' =>
                    'Administrar los cupones de descuento, métodos de envío, método de pagos y cambio de divisas',
            ])
        </div>
        <div class="flex bg-zinc-50 dark:bg-black">
            @include('layouts.__partials.admin.nav-sales-strategies')
            <div class="mx-auto ms-60 w-full">
                <h2 class="px-4 pt-4 font-secondary text-xl font-medium text-zinc-600 dark:text-zinc-200">
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
                                    typeButton="primary" text="Agregar cupon" icon="add-circle" />
                            </div>
                        </div>
                        <div class="mx-4 mb-4 overflow-hidden rounded-lg border border-zinc-200 dark:border-zinc-900">
                            <table class="w-full text-left text-sm text-zinc-500 dark:text-zinc-400">
                                <thead
                                    class="border-b border-zinc-200 bg-zinc-50 text-xs uppercase text-zinc-700 dark:border-zinc-900 dark:bg-black dark:text-zinc-300">
                                    <tr>
                                        <th scope="col"
                                            class="w-10 border-e border-zinc-200 px-4 py-3 dark:border-zinc-900">
                                            <input id="default-checkbox" type="checkbox" value=""
                                                class="h-4 w-4 rounded border-2 border-zinc-300 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-900 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-blue-600">
                                        </th>
                                        <th scope="col" class="border-e border-zinc-200 px-4 py-3 dark:border-zinc-900">
                                            Código</th>
                                        <th scope="col" class="border-e border-zinc-200 px-4 py-3 dark:border-zinc-900">
                                            Tipo de descuento</th>
                                        <th scope="col" class="border-e border-zinc-200 px-4 py-3 dark:border-zinc-900">
                                            Valor de descuento</th>
                                        <th scope="col" class="border-e border-zinc-200 px-4 py-3 dark:border-zinc-900">
                                            Regla</th>
                                        <th scope="col" class="px-4 py-3">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($coupons->count() == 0)
                                        <tr>
                                            <td colspan="4"
                                                class="px-4 py-3 text-center font-medium text-zinc-900 dark:text-white">
                                                No hay cupones registrados
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($coupons as $coupon)
                                            <tr class="hover:bg-zinc-100 dark:hover:bg-zinc-950">
                                                <td class="px-4 py-3">
                                                    <input id="default-checkbox" type="checkbox" value=""
                                                        class="h-4 w-4 rounded border-2 border-zinc-300 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-900 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-blue-600">
                                                </td>
                                                <th scope="row"
                                                    class="whitespace-nowrap px-4 py-3 font-medium text-zinc-900 dark:text-white">
                                                    {{ $coupon->code }}
                                                </th>
                                                <td class="px-4 py-3">
                                                    <span>
                                                        {{ $coupon->discount_type === 'percentage' ? 'Porcentaje' : 'Fijo' }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3">
                                                    @if ($coupon->discount_type === 'percentage')
                                                        <span class="flex items-center gap-1">
                                                            <x-icon icon="percent" class="h-4 w-4 text-zinc-500" />
                                                            {{ $coupon->discount_value }}
                                                        </span>
                                                    @else
                                                        <span class="flex items-center gap-1">
                                                            <x-icon icon="dollar" class="h-4 w-4 text-zinc-500" />
                                                            {{ $coupon->discount_value }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-3">
                                                    {{ \App\Utils\CouponRules::getRule($coupon->rule->predefined_rule) }}
                                                </td>
                                                <td class="px-4 py-3">
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
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
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
