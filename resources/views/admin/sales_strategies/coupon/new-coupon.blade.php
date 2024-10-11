@extends('layouts.admin-template')
@section('title', 'Nuevo cupón')
@section('content')
    <div>
        <div class="lg:ms-60">
            @include('layouts.__partials.admin.header-crud-page', [
                'title' => 'Nuevo cupón',
                'text' => 'Regresar a la lista de cupones',
                'url' => route('admin.sales-strategies.index'),
            ])
        </div>
        <div class="flex bg-zinc-50 dark:bg-black">
            @include('layouts.__partials.admin.nav-sales-strategies')
            <div class="mx-auto w-full p-4 lg:ms-60">
                <div class="flex flex-col gap-1">
                    <h2 class="text-sm font-bold uppercase text-zinc-600 dark:text-zinc-300 sm:text-base md:text-lg">
                        Información del cupón
                    </h2>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">
                        Los campos marcados con <span class="text-red-500">*</span> son obligatorios
                    </p>
                </div>
                <div class="mx-auto mt-4 w-full">
                    <form action="{{ route('admin.sales-strategies.coupon.store') }}" method="POST">
                        @csrf
                        <div>
                            <div class="flex flex-col gap-4">
                                <div class="flex gap-4">
                                    <div class="flex-[2]">
                                        <x-input type="text" name="code" id="code" label="Código"
                                            value="{{ old('code') }}" placeholder="Código único del cupón" required />
                                    </div>
                                    <div class="flex-1">
                                        <x-input type="number" name="usage_limit" id="usage_limit" label="Límite de uso"
                                            placeholder="#" min="1" value="{{ old('usage_limit') }}" />
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <x-select label="Tipo de descuento" id="discount_type" name="discount_type"
                                            value="{{ old('discount_type') }}" :options="['percentage' => 'Porcentaje', 'fixed' => 'Precio fijo']" required />
                                    </div>
                                    <div class="flex-1">
                                        <x-input type="number" step="0.1" min="0.1" name="discount_value"
                                            id="discount_value" label="Valor del descuento"
                                            value="{{ old('discount_value') }}" placeholder="Valor del descuento"
                                            required />
                                    </div>
                                </div>
                                <div class="flex flex-col gap-4 sm:flex-row">
                                    <div class="flex-1">
                                        <x-input type="date" name="start_date" id="start_date" label="Fecha de inicio"
                                            icon="calendar" required value="{{ old('start_date') }}" />
                                    </div>
                                    <div class="flex-1">
                                        <x-input type="date" name="end_date" id="end_date" label="Fecha de fin"
                                            icon="calendar" required value="{{ old('end_date') }}" />
                                    </div>
                                    <div class="flex-1">
                                        <x-select label="Tipo" id="type" name="type" required :options="[
                                            'general' => 'General',
                                            'category' => 'Categoría',
                                            'product' => 'Producto',
                                            'label' => 'Etiqueta',
                                            'cart' => 'Carrito',
                                            'brand' => 'Marca',
                                        ]" />
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <x-input type="checkbox" id="active" name="active" value="0" label="Activo" />
                                </div>
                                <div class="flex flex-col gap-4 sm:flex-row">
                                    <div class="flex-1">
                                        <x-select label="Reglas" id="predefined_rule" name="predefined_rule"
                                            :options="$rules" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="rules special_date mb-4 hidden w-full">
                                            <x-input type="date" name="parameters[]" id="parameters_date"
                                                label="Fecha especial" icon="calendar" />
                                        </div>
                                        <div class="rules minimum_amount minimun_products mb-4 hidden w-full">
                                            <x-input type="number" name="parameters[]" id="parameters_count"
                                                label="Cantidad mínima" placeholder="Ingresa la cantidad miníma" />
                                        </div>
                                        <div class="rules time_of_the_day mb-4 hidden w-full">
                                            <x-input type="time" name="parameters[]" id="parameters_time"
                                                label="Hora del día" />
                                        </div>
                                        <div class="rules specific_payment_methods mb-4 hidden w-full">
                                            <div class="flex items-center gap-4">
                                                <x-select label="Productos" id="payment_methods" name="payment_methods"
                                                    :options="['tarjeta' => 'Tarjeta', 'paypal' => 'Paypal']" />
                                                <x-button icon="arrow-right-02" class="add-parameter mt-7"
                                                    data-input="#payment_methods" onlyIcon="true" type="button"
                                                    typeButton="primary" />
                                            </div>
                                        </div>
                                        <div class="rules specific_shipping_methods mb-4 hidden w-full">
                                            <div class="flex items-center gap-4">
                                                <x-select label="Productos" id="shipping_methods" name="shipping_methods"
                                                    :options="['tarjeta' => 'Tarjeta', 'paypal' => 'Paypal']" />
                                                <x-button icon="arrow-right-02" class="add-parameter mt-7"
                                                    data-input="#shipping_methods" onlyIcon="true" type="button"
                                                    typeButton="primary" />
                                            </div>
                                        </div>
                                        <div class="rules specific_products combination_of_products mb-4 hidden w-full">
                                            <div class="flex items-center gap-4">
                                                @if ($products->count() > 0)
                                                    <x-select label="Productos" id="products_id" name="products_id"
                                                        :options="$products->pluck('name', 'id')->toArray()" />
                                                @endif
                                                <x-button icon="arrow-right-02" class="add-parameter mt-7"
                                                    data-input="#products_id" type="button" onlyIcon="true"
                                                    typeButton="primary" />
                                            </div>
                                        </div>
                                        <div class="rules specific_labels mb-4 hidden w-full">
                                            <div class="flex items-center gap-4">
                                                @if ($labels->count() > 0)
                                                    <x-select label="Etiquetas" id="labels_id" name="labels_id"
                                                        :options="$labels->pluck('name', 'id')->toArray()" />
                                                @endif
                                                <x-button icon="arrow-right-02" class="add-parameter mt-7"
                                                    data-input="#labels_id" onlyIcon="true" type="button"
                                                    typeButton="primary" />
                                            </div>
                                        </div>
                                        <div class="rules specific_categories mb-4 hidden w-full">
                                            <div class="flex items-center gap-4">
                                                @if ($categories->count() > 0)
                                                    <x-select label="Categorías" id="categories_id" name="categories_id"
                                                        :options="$categories->pluck('name', 'id')->toArray()" />
                                                @endif
                                                <x-button icon="arrow-right-02" class="add-parameter mt-7"
                                                    data-input="#categories_id" onlyIcon="true" type="button"
                                                    typeButton="primary" />
                                            </div>
                                        </div>
                                        <div class="rules specific_brands mb-4 hidden w-full">
                                            <div class="flex items-center gap-4">
                                                @if ($brands->count() > 0)
                                                    <x-select label="Marcas" id="brands_id" name="brands_id"
                                                        :options="$brands->pluck('name', 'id')->toArray()" />
                                                @endif
                                                <x-button icon="arrow-right-02" class="add-parameter mt-7"
                                                    data-input="#brands_id" onlyIcon="true" type="button"
                                                    typeButton="primary" />
                                            </div>
                                        </div>
                                        <div class="rules specific_category mb-4 hidden w-full">
                                            <div class="flex items-center gap-4">
                                                @if ($categories->count() > 0)
                                                    <x-select label="Categorías" id="parameters_category"
                                                        name="parameters[]" :options="$categories->pluck('name', 'id')->toArray()" />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="containerParameters" class="hidden"></div>
                            <div id="parametersPreview" class="mb-4 hidden items-center gap-2"></div>
                        </div>
                        <div class="mt-4 flex items-center justify-center gap-2">
                            <x-button type="submit" text="Agregar cupón" icon="plus" typeButton="primary" />
                            <x-button type="a" href="{{ route('admin.sales-strategies.index') }}" text="Regresar"
                                typeButton="secondary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
