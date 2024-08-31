@if ($coupon)
    <div class="p-4">
        <div class="flex justify-between rounded-lg border border-zinc-400 px-4 py-2 dark:border-zinc-800">
            <div class="flex items-center gap-2">
                <h2 class="text-lg font-medium text-zinc-500 dark:text-zinc-200">Código:</h2>
                <span class="text-base font-bold dark:text-blue-600">
                    {{ $coupon->code }}
                </span>
            </div>
            <div class="flex items-center">
                <x-badge-status status="{{ $coupon->active }}" />
            </div>
        </div>
        <div class="mt-2 overflow-hidden rounded-lg border border-zinc-400 dark:border-zinc-800">
            <table class="w-full text-left text-sm text-zinc-500 dark:text-zinc-400">
                <thead
                    class="border-b border-zinc-400 bg-zinc-50 text-xs uppercase text-zinc-700 dark:border-zinc-800 dark:bg-black dark:text-zinc-300">
                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                        Tipo de descuento
                    </th>
                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                        Valor de descuento
                    </th>
                </thead>
                <tbody>
                    <tr class="hover:bg-zinc-100 dark:hover:bg-zinc-950">
                        <td class="px-4 py-3">
                            {{ $coupon->discount_type === 'percentage' ? 'Porcentaje' : 'Fijo' }}
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
                    </tr>
                </tbody>
            </table>
            <table class="w-full border-t text-left text-sm text-zinc-500 dark:border-zinc-800 dark:text-zinc-400">
                <thead
                    class="border-b border-zinc-400 bg-zinc-50 text-xs uppercase text-zinc-700 dark:border-zinc-800 dark:bg-black dark:text-zinc-300">
                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                        Fecha de inicio
                    </th>
                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                        Fecha de fin
                    </th>
                </thead>
                <tbody>
                    <tr class="hover:bg-zinc-100 dark:hover:bg-zinc-950">

                        <td class="px-4 py-3">
                            <span class="flex items-center gap-2">
                                <x-icon icon="calendar-check" class="h-4 w-4 text-green-600" />
                                {{ \Carbon\Carbon::parse($coupon->start_date)->format('d M, Y') }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="flex items-center gap-2">
                                <x-icon icon="calendar-x" class="h-4 w-4 text-red-600" />
                                {{ \Carbon\Carbon::parse($coupon->end_date)->format('d M, Y') }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="w-full border-t text-left text-sm text-zinc-500 dark:border-zinc-800 dark:text-zinc-400">
                <thead
                    class="border-b border-zinc-400 bg-zinc-50 text-xs uppercase text-zinc-700 dark:border-zinc-800 dark:bg-black dark:text-zinc-300">
                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                        Tipo
                    </th>
                </thead>
                <tbody>
                    <tr class="hover:bg-zinc-100 dark:hover:bg-zinc-950">
                        <td class="px-4 py-3">
                            {{ ucfirst($coupon->type) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-2 rounded-lg border border-zinc-400 p-4 dark:border-zinc-800">
            <div class="flex items-center gap-2">
                <h2 class="font-medium dark:text-white">Regla:</h2>
                <span class="text-sm text-zinc-600 dark:text-zinc-300">
                    {{ \App\Utils\CouponRules::getRule($coupon->rule->predefined_rule) }}
                </span>
            </div>
            <div class="mt-2">
                @if ($type === 'model')
                    <ul class="ms-10 flex flex-col items-start gap-2 py-2">
                        @foreach ($parameters as $param)
                            <li class="relative flex items-center gap-2 ps-6 text-white">
                                <x-icon icon="square" class="h-4 w-4 text-blue-600" />
                                {{ $param->name }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="mt-2 flex items-center gap-2 text-zinc-300">
                        <p class="font-medium text-black dark:text-white">Parametro:</p>
                        <p class="text-zinc-300 dark:text-zinc-500">
                            {{ $parameters[0] ?? 'Sin ningún parametro' }}
                        </p>
                    </div>
                @endif
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
