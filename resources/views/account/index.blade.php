@extends('layouts.__partials.store.template-profile')
@section('profile-content')
    <div class="flex items-center justify-between">
        <h2 class="font-league-spartan text-3xl font-bold text-secondary">
            Pedidos
        </h2>
        <div class="link-item mt-2 w-max">
            <a href="{{ Route('orders.index') }}"
                class="link-item-content flex items-center justify-between gap-2 text-sm text-blue-500 hover:font-bold">
                Ver todos
                <span class="icon-link">
                    <x-icon-store icon="arrow-right-02" class="h-5 w-5 text-current" />
                </span>
            </a>
        </div>
    </div>
    <div class="mt-4 flex items-center gap-4 border-t border-zinc-400 px-4 pb-4 pt-8 text-sm">
        <a href="#"
            class="flex flex-col items-center justify-center gap-2 rounded-xl border border-zinc-400 p-6 text-zinc-800 hover:border-blue-300 hover:bg-blue-100 hover:text-blue-500">
            <x-icon-store icon="payment-pendient" class="h-8 w-8 text-current" />
            Pendientes
        </a>
        <a href="#"
            class="flex flex-col items-center justify-center gap-2 rounded-xl border border-zinc-400 p-6 text-zinc-800 hover:border-green-300 hover:bg-green-100 hover:text-green-500">
            <x-icon-store icon="shopping-basket-done" class="h-8 w-8 text-current" />
            Procesados
        </a>
        <a href="#"
            class="flex flex-col items-center justify-center gap-2 rounded-xl border border-zinc-400 p-6 text-zinc-800 hover:border-red-300 hover:bg-red-100 hover:text-red-500">
            <x-icon-store icon="shopping-basket-remove" class="h-8 w-8 text-current" />
            Cancelados
        </a>
    </div>
    <div class="mt-4 border-t border-zinc-400 p-2">
        <a href="#" class="flex items-center justify-start gap-2 pt-2 text-sm">
            <x-icon-store icon="dollar-circle" class="h-5 w-5 text-current" />
            Reeeembolsos y devoluciones
        </a>
    </div>
@endsection
