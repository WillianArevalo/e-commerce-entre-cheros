@extends('layouts.admin-template')

@section('title', 'Nuevo cupón')

@section('content')
    <div>
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Editar cupón',
            'text' => 'Regresar a la lista de cupones',
            'url' => route('admin.sales-strategies.index'),
        ])
        <div class="bg-white p-4 dark:bg-black">
            <div class="flex flex-col gap-1">
                <h2 class="text-lg uppercase text-gray-700 dark:text-gray-300">Información del cupón</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Los campos marcados con <span class="text-red-500">*</span> son obligatorios
                </p>
            </div>
            <div class="mx-auto mt-4 w-full">
                <form action="{{ route('admin.sales-strategies.coupon.update', $coupon->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="rounded-lg border p-4 dark:border-zinc-900">
                        <div class="flex flex-col gap-4">
                            <div class="flex gap-4">
                                <div class="flex-[2]">
                                    <x-input type="text" name="code" id="code" label="Código"
                                        value="{{ $coupon->code }}" placeholder="Ingresa el código único del cupón"
                                        required />
                                </div>
                                <div class="flex-1">
                                    <x-input type="number" name="usage_limit" id="usage_limit" label="Límite de uso"
                                        placeholder="Ingresa la cantidad de límite de uso" min="1"
                                        value="{{ $coupon->usage_limit }}" />
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="flex-1">
                                    <x-select label="Tipo de descuento" id="discount_type" name="discount_type"
                                        value="{{ $coupon->discount_type }}" :options="['percentage' => 'Porcentaje', 'fixed' => 'Precio fijo']" required
                                        selected="{{ $coupon->discount_type }}" />
                                </div>
                                <div class="flex-1">
                                    <x-input type="number" step="0.1" min="0.1" name="discount_value"
                                        id="discount_value" label="Valor del descuento"
                                        value="{{ $coupon->discount_value }}" placeholder="Ingresa el valor del descuento"
                                        required />
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="flex-1">
                                    <x-input type="date" name="start_date" id="start_date" label="Fecha de inicio"
                                        icon="calendar" required value="{{ $coupon->start_date }}" />
                                </div>
                                <div class="flex-1">
                                    <x-input type="date" name="end_date" id="end_date" label="Fecha de fin"
                                        icon="calendar" required value="{{ $coupon->end_date }}" />
                                </div>
                                <div class="flex-1">
                                    <input type="hidden" name="predefined_rule" id="predefined_rule"
                                        value="{{ $coupon->rule->predefined_rule }}">
                                    <x-input type="text" name="rule" id="rule" label="Regla" required
                                        value="{{ \App\Utils\CouponRules::getRule($coupon->rule->predefined_rule) }}" />
                                </div>
                            </div>
                            <div class="flex">
                                <div class="rules special_date mb-4 hidden w-72">
                                    <x-input type="date" name="parameters[]" id="parameters_start_date"
                                        label="Fecha especial" icon="calendar" value="{{ $parameter ?? '' }}" />
                                </div>
                                <div class="rules minimum_amount minimun_products mb-4 hidden w-72">
                                    <x-input type="number" name="parameters[]" id="parameters_count"
                                        label="Cantidad mínima" placeholder="Ingresa la cantidad miníma"
                                        value="{{ $parameter ?? '' }}" />
                                </div>
                                <div class="rules time_of_the_day mb-4 hidden w-72">
                                    <x-input type="time" name="parameters[]" id="parameters_time" label="Hora del día"
                                        value="{{ $parameter ?? '' }}" />
                                </div>
                                <div class="rules specific_payment_methods mb-4 hidden w-72">
                                    <div class="flex items-center gap-4">
                                        <x-select label="Productos" id="payment_methods" name="payment_methods"
                                            :options="['tarjeta' => 'Tarjeta', 'paypal' => 'Paypal']" />
                                        <x-button icon="arrow-right-02" class="add-parameter mt-7"
                                            data-input="#payment_methods " type="button" typeButton="primary" />
                                    </div>
                                </div>
                                <div class="rules specific_shipping_methods mb-4 hidden w-72">
                                    <div class="flex items-center gap-4">
                                        <x-select label="Productos" id="shipping_methods" name="shipping_methods"
                                            :options="['tarjeta' => 'Tarjeta', 'paypal' => 'Paypal']" />
                                        <x-button icon="arrow-right-02" class="add-parameter mt-7"
                                            data-input="#shipping_methods" type="button" typeButton="primary" />
                                    </div>
                                </div>
                                <div class="rules specific_products combination_of_products mb-4 hidden w-72">
                                    <div class="flex items-center gap-4">
                                        @if ($products->count() > 0)
                                            <x-select label="Productos" id="products_id" name="products_id"
                                                :options="$products->pluck('name', 'id')->toArray()" />
                                        @endif
                                        <x-button icon="arrow-right-02" class="add-parameter mt-7"
                                            data-input="#products_id" type="button" typeButton="primary" />
                                    </div>
                                </div>
                                <div class="rules specific_labels mb-4 hidden w-72">
                                    <div class="flex items-center gap-4">
                                        @if ($labels->count() > 0)
                                            <x-select label="Etiquetas" id="labels_id" name="labels_id"
                                                :options="$labels->pluck('name', 'id')->toArray()" />
                                        @endif
                                        <x-button icon="arrow-right-02" class="add-parameter mt-7"
                                            data-input="#labels_id" type="button" typeButton="primary" />
                                    </div>
                                </div>
                                <div class="rules specific_categories mb-4 hidden w-72">
                                    <div class="flex items-center gap-4">
                                        @if ($categories->count() > 0)
                                            <x-select label="Categorías" id="categories_id" name="categories_id"
                                                :options="$categories->pluck('name', 'id')->toArray()" />
                                        @endif
                                        <x-button icon="arrow-right-02" class="add-parameter mt-7"
                                            data-input="#categories_id" type="button" typeButton="primary" />
                                    </div>
                                </div>
                                <div class="rules specific_brands mb-4 hidden w-72">
                                    <div class="flex items-center gap-4">
                                        @if ($brands->count() > 0)
                                            <x-select label="Marcas" id="brands_id" name="brands_id" :options="$brands->pluck('name', 'id')->toArray()" />
                                        @endif
                                        <x-button icon="arrow-right-02" class="add-parameter mt-7"
                                            data-input="#brands_id" type="button" typeButton="primary" />
                                    </div>
                                </div>
                                <div class="rules specific_category mb-4 hidden w-72">
                                    <div class="flex items-center gap-4">
                                        @if ($categories->count() > 0)
                                            <x-select label="Categorías" id="parameters_category" name="parameters[]"
                                                :options="$categories->pluck('name', 'id')->toArray()" selected="{{ $parameter ?? '' }}" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Parameters -->
                        <input type="hidden" value="{{ $parameters_ids ?? '' }}" id="parameters_ids">
                        <input type="hidden" value="{{ $parameters_names ?? '' }}" id="parameters_names">
                        <div id="containerParameters" class="hidden">
                            @if ($parameters)
                                @foreach ($parameters as $parameter)
                                    <input type="hidden" name="parameters[]" value="{{ $parameter->id }}">
                                @endforeach
                            @endif
                        </div>
                        <div id="parametersPreview" class="mb-4 flex items-center gap-2">
                            @if ($parameters)
                                @foreach ($parameters as $parameter)
                                    <div
                                        class="me-2 flex w-max items-center justify-between gap-2 rounded-full border border-zinc-300 bg-white px-4 py-2 text-sm font-medium text-zinc-600 dark:border-zinc-900 dark:bg-black dark:text-white">
                                        <span>{{ $parameter->name }}</span>
                                        <button type="button" class="remove-parameter"
                                            data-parameter="{{ $parameter->id }}">
                                            <x-icon icon="x" class="h-4 w-4" />
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <!-- End Parameters -->
                    </div>
                    <div class="mt-4 flex items-center justify-center gap-2">
                        <x-button type="submit" text="Editar cupón" icon="edit" typeButton="primary" />
                        <x-button type="a" href="{{ route('admin.sales-strategies.index') }}" text="Regresar"
                            typeButton="secondary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
