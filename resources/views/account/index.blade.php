@extends('layouts.__partials.store.template-profile')
@section('profile-content')
    <div class="flex items-center justify-between">
        <h2 class="font-primary text-2xl font-bold text-secondary">
            Pedidos
        </h2>
        <a href="{{ Route('orders') }}"
            class="group flex items-center justify-center gap-1 text-sm text-zinc-700 hover:text-blue-500">
            Ver todos
            <x-icon-store icon="arrow-right-02"
                class="h-4 w-4 text-current transition-transform duration-300 ease-in-out group-hover:translate-x-1" />
        </a>
    </div>
    <div class="mt-4 flex items-center justify-around gap-4 border-t border-zinc-200 px-4 pb-4 pt-6 text-sm">
        <a href="#" class="flex flex-col items-center justify-center gap-2">
            <x-icon-store icon="payment-pendient" class="h-8 w-8 text-current text-tertiary" />
            Pendientes
        </a>
        <a href="#" class="flex flex-col items-center justify-center gap-2">
            <x-icon-store icon="shopping-basket-done" class="h-8 w-8 text-current text-tertiary" />
            Procesados
        </a>
        <a href="#" class="flex flex-col items-center justify-center gap-2">
            <x-icon-store icon="shopping-basket-remove" class="h-8 w-8 text-current text-tertiary" />
            Cancelados
        </a>
    </div>
    <div class="mt-4 border-t border-zinc-200 p-2">
        <a href="#" class="flex items-center justify-start gap-2 pt-2 text-sm">
            <x-icon-store icon="dollar-circle" class="h-5 w-5 text-current text-tertiary" />
            Reeeembolsos y devoluciones
        </a>
    </div>
@endsection
