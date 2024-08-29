@if ($payment)
    <div class="mt-4 flex flex-col gap-4 font-secondary">
        <div class="flex w-full gap-4">
            <div class="flex flex-1 flex-col gap-2">
                <img src="{{ Storage::url($payment->image) }}" alt="{{ $payment->name }}"
                    class="h-20 w-36 rounded-xl object-cover">
                <p class="text-zinc-600">
                    {{ $payment->name ?? '---' }}
                </p>
            </div>
        </div>
    </div>
@else
    <div class="flex flex-col gap-8 py-10">
        <p class="text-zinc-600">
            No hay método de pago seleccionado. Selecciona uno para
            continuar
        </p>
    </div>
@endif
