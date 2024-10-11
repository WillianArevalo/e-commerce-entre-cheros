@extends('layouts.admin-template')
@section('title', 'Nuevo cupón')
@section('content')
    <div>
        <div class="lg:ms-60">
            @include('layouts.__partials.admin.header-crud-page', [
                'title' => 'Editar cupón',
                'text' => 'Regresar a la lista de cupones',
                'url' => route('admin.sales-strategies.index'),
            ])
        </div>
        <div class="flex bg-zinc-50 dark:bg-black">
            @include('layouts.__partials.admin.nav-sales-strategies')
            <div class="mx-auto w-full p-4 lg:ms-60">
                <div class="flex flex-col gap-1">
                    <h2 class="text-sm font-bold uppercase text-zinc-600 dark:text-zinc-300 sm:text-base md:text-lg">
                        Editar información del cupón
                    </h2>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">
                        Los campos marcados con <span class="text-red-500">*</span> son obligatorios
                    </p>
                </div>
                <div class="mx-auto mt-4 w-full">
                    <form action="{{ route('admin.sales-strategies.coupon.update', $coupon->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @if ($errors->any())
                            @foreach ($errors as $error)
                                <span class="dark:text-white">
                                    {{ $error }}
                                </span>
                            @endforeach
                        @endif
                        <div>
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
                                            value="{{ $coupon->discount_value }}"
                                            placeholder="Ingresa el valor del descuento" required />
                                    </div>
                                </div>

                                <div class="flex flex-col gap-4 sm:flex-row">
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
                                        <input type="hidden" name="type" value="{{ $coupon->type }}">
                                        <x-input type="text" name="rule" id="rule" label="Regla" required
                                            value="{{ \App\Utils\CouponRules::getRule($coupon->rule->predefined_rule) }}"
                                            readonly />
                                    </div>
                                </div>
                                <div>
                                    <x-input type="checkbox" id="active" name="active" value="{{ $coupon->active }}"
                                        label="Activo" :checked="$coupon->active === 1" />
                                </div>
                                @if ($parameters && $type === 'data')
                                    <div class="flex-1">
                                        <x-input type="text" name="parameters[]" label="Parametro" required
                                            value="{{ $parameters }}" />
                                    </div>
                                @endif
                                <div class="flex items-center gap-4">
                                    @if ($type === 'model' && $data)
                                        @if ($data->count() > 0)
                                            <x-select label="Seleccionar" id="ids" name="ids" :options="$data->pluck('name', 'id')->toArray()" />
                                        @endif
                                        <x-button icon="arrow-right-02" class="add-parameter mt-7" data-input="#ids"
                                            type="button" typeButton="primary" />
                                    @endif
                                </div>
                            </div>

                            <!-- Parameters -->
                            <input type="hidden" value="{{ $ids ?? '' }}" id="parameters_ids">
                            <input type="hidden" value="{{ $names ?? '' }}" id="parameters_names">
                            <div id="containerParameters" class="hidden">
                                @if ($parameters && $type === 'model')
                                    @foreach ($parameters as $parameter)
                                        <input type="hidden" name="parameters[]" value="{{ $parameter->id }}">
                                    @endforeach
                                @endif
                            </div>
                            <div id="parametersPreview" class="mb-4 mt-4 flex items-center gap-2">
                                @if ($parameters && $type === 'model')
                                    @foreach ($parameters as $parameter)
                                        <div
                                            class="me-2 flex w-max items-center justify-between gap-2 rounded-full border border-zinc-400 bg-white px-4 py-2 text-sm font-medium text-zinc-600 dark:border-zinc-800 dark:bg-black dark:text-white">
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
    </div>
@endsection
