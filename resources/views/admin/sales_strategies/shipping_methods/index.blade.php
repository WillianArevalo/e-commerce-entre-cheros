@extends('layouts.admin-template')

@section('title', 'Tickets de soporte')

@section('content')
    <div class="mt-4 rounded-lg">
        @include('layouts.__partials.admin.header-page', [
            'title' => 'Estrategias de venta',
            'description' =>
                'Administrar los cupones de descuento, métodos de envío, método de pagos y cambio de divisas',
        ])
        <div class="flex bg-gray-50 dark:bg-black">
            @include('layouts.__partials.admin.nav-sales-strategies')
            <div class="mx-auto ms-60 w-full">
                <h2 class="px-4 pt-4 font-secondary text-xl font-medium text-gray-600 dark:text-gray-200">
                    Métodos de envío
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
                                <x-button type="button" class="open-drawer" data-drawer="#drawer-new-method"
                                    typeButton="primary" text="Agregar método" icon="add-circle" />
                            </div>
                        </div>
                        <div class="mx-4 mb-4 overflow-hidden rounded-lg border border-gray-200 dark:border-zinc-900">
                            <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                                <thead
                                    class="border-b border-zinc-200 bg-gray-50 text-xs uppercase text-gray-700 dark:border-zinc-900 dark:bg-black dark:text-gray-300">
                                    <tr>
                                        <th scope="col" class="border-e border-gray-200 px-4 py-3 dark:border-zinc-900">
                                            Nombre
                                        </th>
                                        <th scope="col" class="border-e border-gray-200 px-4 py-3 dark:border-zinc-900">
                                            Estado</th>
                                        <th scope="col" class="border-e border-gray-200 px-4 py-3 dark:border-zinc-900">
                                            Costo</th>
                                        <th scope="col" class="px-4 py-3">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($methods->count() == 0)
                                        <tr>
                                            <td colspan="4"
                                                class="px-4 py-3 text-center font-medium text-gray-900 dark:text-white">
                                                No hay cupones registrados
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($methods as $method)
                                            <tr class="hover:bg-gray-100 dark:hover:bg-zinc-950">
                                                <th scope="row"
                                                    class="whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white">
                                                    {{ $method->name }}
                                                </th>
                                                <td class="px-4 py-3">
                                                    <span>
                                                        {{ $method->is_active === 1 ? 'Active' : 'Desactive' }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <span>
                                                        {{ '12.00' }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="flex gap-2">
                                                        <x-button type="a"
                                                            href="{{ route('admin.sales-strategies.coupon.edit', $method->id) }}"
                                                            typeButton="success" icon="edit" onlyIcon="true" />
                                                        <form
                                                            action="{{ route('admin.sales-strategies.coupon.destroy', $method->id) }}"
                                                            id="formDeleteCoupon" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <x-button type="button" data-form="formDeleteCoupon"
                                                                class="buttonDelete" onlyIcon="true" icon="delete"
                                                                typeButton="danger" data-modal-target="deleteModal"
                                                                data-modal-toggle="deleteModal" />
                                                        </form>
                                                        <x-button type="button" class="showCoupon"
                                                            data-href="{{ route('admin.sales-strategies.coupon.show', $method->id) }}"
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

        <!-- Drawer new shipping method  -->
        <div id="drawer-new-method"
            class="drawer fixed right-0 top-0 z-40 h-screen w-[500px] translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-new-method">
            <h5 id="drawer-new-method-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-gray-500 dark:text-gray-400">
                Nuevo método de envío
            </h5>
            <button type="button" data-drawer="#drawer-new-method"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <form action="{{ route('admin.categories.store') }}" class="flex flex-col gap-4"
                    enctype="multipart/form-data" method="POST" id="formAddCategorie">
                    @csrf
                    <div class="w-full">
                        <x-input type="text" name="name" id="name_method" required
                            placeholder="Ingresa el nombre del método" label="Nombre" value="{{ old('name') }}" />
                    </div>
                    <div class="w-full">
                        <x-input type="textarea" name="description" id="description_method" required
                            placeholder="Ingresa la descripción del método" label="Descripción"
                            value="{{ old('description') }}" />
                    </div>
                    <div class="w-full">
                        <input id="is_active" type="checkbox" value="" name="is_active"
                            class="h-4 w-4 rounded border-2 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-900 dark:bg-zinc-950 dark:ring-offset-gray-800 dark:focus:ring-blue-600">
                        <label for="is_active" class="text-sm text-gray-500 dark:text-gray-400">Activo</label>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-1">
                            <x-input type="number" name="min_weight" id="min_weight" required placeholder="KG"
                                icon="weight-scale" label="Peso mínimo" value="{{ old('description') }}" />
                        </div>
                        <div class="flex-1">
                            <x-input type="number" name="max_weight" id="max_weight" required icon="weight-scale"
                                placeholder="KG" label="Peso máximo" value="{{ old('description') }}" />
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Agregar categoría" icon="add-circle" typeButton="primary" />
                        <x-button type="button" data-drawer="#drawer-new-method" class="close-drawer" text="Cancelar"
                            typeButton="secondary" />
                    </div>
                </form>
            </div>
        </div>
        <!-- End Drawer new shipping method -->
    </div>
@endsection
