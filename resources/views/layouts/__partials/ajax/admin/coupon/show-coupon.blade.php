@if ($coupon)
    <div class="rounded-lg p-4 shadow-md dark:border dark:border-zinc-900">
        <div class="flex items-center gap-4">
            <div
                class="flex h-12 w-12 items-center justify-center rounded-full border border-gray-200 dark:border-zinc-900">
                <x-icon icon="hash" class="h-6 w-6 text-blue-600" />
            </div>
            <div>
                <h2 class="text-lg font-semibold text-blue-600">Código del Cupón</h2>
                <p class="dark:text-grat-200 text-xl font-bold text-gray-500 dark:text-gray-200">
                    {{ $coupon->code }}
                </p>
            </div>
        </div>
        <div class="mt-6">
            <div class="flex items-center gap-4">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full border border-gray-200 dark:border-zinc-900">
                    <x-icon icon="bookmark" class="h-4 w-4 text-blue-600" />
                </div>
                <div>
                    <h2 class="text-sm font-medium text-blue-600">Tipo de Descuento</h2>
                    <p class="text-gray-200">
                        {{ $coupon->discount_type === 'percentage' ? 'Porcentaje' : 'Fijo' }}
                    </p>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-4">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full border border-gray-200 dark:border-zinc-900">
                    <x-icon icon="{{ $coupon->discount_type === 'percentage' ? 'percent' : 'dollar' }}"
                        class="h-4 w-4 text-blue-600" />
                </div>
                <div>
                    <h2 class="text-md font-medium text-blue-600">Valor de Descuento</h2>
                    <p class="text-gray-200">
                        {{ $coupon->discount_value }}
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-4 flex justify-between">
            <div class="flex items-center gap-2">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full border border-gray-200 dark:border-zinc-900">
                    <x-icon icon="calendar-check" class="h-4 w-4 text-green-600" />
                </div>
                <div>
                    <h2 class="text-sm font-medium text-blue-600">Fecha inicio</h2>
                    <p class="text-gray-200">
                        {{ \Carbon\Carbon::parse($coupon->start_date)->format('d M, Y') }}
                    </p>
                </div>
            </div>
            <div class="flex items-center">
                <svg width="100" height="10" class="text-black dark:text-white" viewBox="0 0 100 10"
                    fill="#fff" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 5L100 5" stroke="currentColor" stroke-dasharray="4 2" />
                    <circle cx="0" cy="5" r="3" fill="currentColor" />
                    <circle cx="100" cy="5" r="3" fill="currentColor" />
                </svg>
            </div>
            <div class="flex items-center gap-2">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full border border-gray-200 dark:border-zinc-900">
                    <x-icon icon="calendar-x" class="h-4 w-4 text-red-600" />
                </div>
                <div>
                    <h2 class="text-md font-medium text-blue-600">Fecha fin</h2>
                    <p class="text-gray-200">
                        {{ \Carbon\Carbon::parse($coupon->end_date)->format('d M, Y') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-4 flex items-start gap-4">
            <div
                class="min-h-10 min-w-10 flex items-center justify-center rounded-full border border-gray-200 dark:border-zinc-900">
                <x-icon icon="ruler" class="h-4 w-4 text-blue-600" />
            </div>
            <div>
                <h2 class="text-sm font-medium text-blue-600">
                    Regla: <span
                        class="text-gray-500 dark:text-gray-200">{{ \App\Utils\CouponRules::getRule($coupon->rule->predefined_rule) }}</span>
                </h2>
                <div class="mt-4 flex flex-wrap gap-1 text-sm text-gray-400 dark:text-gray-200">
                    @if (isset($coupon->rule->parameters) && count($coupon->rule->parameters) > 1)
                        @foreach ($coupon->rule->parameters as $parameter)
                            @switch(true)
                                @case($parameter instanceof App\Models\Product)
                                    <div class="flex items-center gap-2 rounded-lg border px-3 py-2 dark:border-zinc-900">
                                        <img src="{{ Storage::url($parameter->main_image) }}" alt="{{ $parameter->name }}"
                                            class="h-8 w-8 rounded-full object-cover">
                                        <span class="text-sm dark:text-gray-200">{{ $parameter->name }}</span>
                                    </div>
                                @break

                                @case($parameter instanceof App\Models\Categorie)
                                    <div class="flex items-center gap-2 rounded-lg border px-3 py-2 dark:border-zinc-900">
                                        <x-icon icon="folder" class="h-4 w-4 text-blue-600" />
                                        <span class="text-sm dark:text-gray-200">{{ $parameter->name }}</span>
                                    </div>
                                @break

                                @case($parameter instanceof App\Models\Label)
                                    <div class="flex items-center gap-2 rounded-lg border px-4 py-2 dark:border-zinc-900">
                                        <x-icon icon="tag" class="h-4 w-4 text-blue-600" />
                                        <span class="text-sm dark:text-gray-200">{{ $parameter->name }}</span>
                                    </div>
                                @break

                                @case($parameter instanceof App\Models\Brand)
                                    <div class="flex items-center gap-2 rounded-lg border px-4 py-2 dark:border-zinc-900">
                                        <span class="text-sm dark:text-gray-200">{{ $parameter->name }}</span>
                                    </div>
                                @break

                                @default
                                    {{ $parameter }}
                            @endswitch
                        @endforeach
                    @else
                        @switch($coupon->rule->predefined_rule)
                            @case('minimum_amount')
                                <span class="flex items-center text-gray-500 dark:text-gray-200">
                                    <x-icon icon="dollar" class="h-4 w-4 text-current" />
                                    {{ $coupon->rule->parameters[0] }}
                                </span>
                            @break

                            @case('special_date')
                                <span class="flex items-center gap-1 text-gray-500 dark:text-gray-200">
                                    <x-icon icon="calendar" class="h-4 w-4 text-blue-600" />
                                    {{ \Carbon\Carbon::parse($coupon->rule->parameters[0])->format('d M, Y') }}
                                </span>
                            @break

                            @case('minimun_products')
                                <span class="flex items-center text-gray-500 dark:text-gray-200">
                                    {{ $coupon->rule->parameters[0] }}
                                </span>
                            @break

                            @case('time_of_the_day')
                                <span class="flex items-center gap-1 text-gray-500 dark:text-gray-200">
                                    <x-icon icon="clock" class="h-4 w-4 text-blue-600" />
                                    {{ \Carbon\Carbon::parse($coupon->rule->parameters[0])->format('h:i A') }}
                                </span>
                            @break

                            @default
                        @endswitch
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 flex items-center justify-center gap-2">
        <x-button type="a" icon="edit" typeButton="primary" text="Editar"
            href="{{ route('admin.sales-strategies.coupon.edit', $coupon->id) }}" />
        <x-button type="button" class="close-drawer" data-drawer="#drawer-show-coupon" typeButton="secondary"
            text="Cerrar" />
    </div>
@endif
