<div class="{{ $styles }} flex flex-col gap-2 overflow-hidden rounded-xl border p-4 shadow">
    <div class="flex justify-between">
        <h3 class="flex items-center gap-1 text-lg font-bold text-secondary sm:text-xl">
            <x-icon-store icon="shopping-bag" class="h-5 w-5 text-current" />
            {{ $order->number_order }}
        </h3>
        <span
            class="{{ $statusBorder }} ml-auto flex items-center gap-1 rounded-xl border px-2 py-1 text-xs font-medium text-white">
            <x-icon-store :icon="$statusIcon" class="h-4 w-4 text-white" />
            {{ ucfirst($order->status) }}
        </span>
    </div>
    <div class="flex items-center gap-2">
        <span class="text-sm text-zinc-600">N° de seguimiento:</span>
        <span class="text-sm text-zinc-600">{{ $order->tracking_number }}</span>
    </div>
    <div class="flex justify-end">
        <div class="flex flex-col items-end gap-2">
            <span class="text-sm text-zinc-600">Fecha de compra:</span>
            <span
                class="text-xs text-zinc-600">{{ $order->created_at->setTimeZone(auth()->timezone ?? 'UTC')->format('F y, Y, g:i A') }}</span>
        </div>
    </div>
    <div class="flex items-center justify-between gap-2">
        <div class="flex flex-col">
            <span class="text-sm text-zinc-600">Total:</span>
            <span class="text-lg font-bold text-secondary">${{ $order->total }}</span>
        </div>
        <div class="flex items-center gap-2">
            <x-button-store icon="view" type="a" href="{{ Route('orders.show', $order->number_order) }}"
                typeButton="secondary" onlyIcon="true" class="w-max" />
            @if ($order->status !== 'completed' && $order->status !== 'canceled' && $order->status !== 'sent')
                <div>
                    <form action="{{ Route('order.cancel', $order->id) }}" method="POST"
                        id="formCancelOrder-{{ $order->id }}">
                        @csrf
                        <x-button-store icon="cancel-circle" type="button"
                            href="{{ Route('account.tickets.show', $order->id) }}" typeButton="danger" onlyIcon="true"
                            class="buttonDelete w-max" data-tooltip-target="tooltip-cancel-ticket"
                            data-form="formCancelOrder-{{ $order->id }}" />
                    </form>
                    <div id="tooltip-cancel-ticket" role="tooltip"
                        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-red-500 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300">
                        Cancelar pedido
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
