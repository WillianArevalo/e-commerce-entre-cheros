@extends('layouts.__partials.store.template-profile')
@section('profile-content')
    <div class="flex flex-col">
        <div class="mb-4 border-b border-zinc-400">
            <ul class="-mb-px flex flex-wrap text-center text-sm font-medium" id="default-tab"
                data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block rounded-t-lg border-b-2 p-4" id="all-orders" data-tabs-target="#orders"
                        type="button" role="tab" aria-controls="orders" aria-selected="false">
                        Ver todos
                    </button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block rounded-t-lg border-b-2 p-4 hover:border-zinc-400 hover:text-zinc-600"
                        id="pending-orders" data-tabs-target="#pending" type="button" role="tab"
                        aria-controls="pending" aria-selected="false">
                        Pendientes
                    </button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block rounded-t-lg border-b-2 p-4 hover:border-zinc-400 hover:text-zinc-600"
                        id="processed-orders" data-tabs-target="#processed" type="button" role="tab"
                        aria-controls="processed" aria-selected="false">
                        Procesados
                    </button>
                </li>
                <li role="presentation">
                    <button class="inline-block rounded-t-lg border-b-2 p-4 hover:border-zinc-400 hover:text-zinc-600"
                        id="cancelled-orders" data-tabs-target="#cancelled" type="button" role="tab"
                        aria-controls="cancelled" aria-selected="false">
                        Cancelados
                    </button>
                </li>
            </ul>
        </div>
        <div class="mb-4 flex gap-8">
            <div class="flex flex-[2]">
                <x-input-store type="search" icon="search" name="search-order" id="search-order"
                    placeholder="N° de pedido" />
            </div>
            <div class="flex w-80 flex-1 flex-col gap-2 font-secondary">
                <input type="hidden" id="gender" name="gender" value="M">
                <div class="relative">
                    <div
                        class="selected flex items-center justify-between rounded-full border border-zinc-400 px-6 py-3 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-200">
                        <span class="itemSelected">
                            Más reciente
                        </span>
                        <x-icon icon="arrow-down" class="h-5 w-5 text-zinc-600" />
                    </div>
                    <ul
                        class="selectOptions absolute z-10 mt-2 hidden w-full rounded-2xl border border-zinc-400 bg-white py-1 shadow-lg">
                        <li class="itemOption px-4 py-2.5 text-sm text-zinc-900 hover:bg-zinc-100" data-value="M"
                            data-input="#gender">
                            Más reciente
                        </li>
                        <li class="itemOption px-4 py-2.5 text-sm text-zinc-900 hover:bg-zinc-100" data-value="F"
                            data-input="#gender">
                            Más antiguo
                        </li>
                        <li class="itemOption px-4 py-2.5 text-sm text-zinc-900 hover:bg-zinc-100" data-value="F"
                            data-input="#gender">
                            Último mes
                        </li>
                        <li class="itemOption px-4 py-2.5 text-sm text-zinc-900 hover:bg-zinc-100" data-value="F"
                            data-input="#gender">
                            Último año
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="default-tab-content">
            <div class="hidden rounded-lg bg-zinc-50 p-4" id="orders" role="tabpanel" aria-labelledby="all-orders">
                <div class="flex flex-col items-center justify-center gap-2 p-8">
                    <x-icon-store icon="task" class="h-8 w-8 text-current text-zinc-400" />
                    <p class="text-sm text-zinc-400">No hay pedidos</p>
                </div>
            </div>
            <div class="hidden rounded-lg bg-zinc-50 p-4" id="pending" role="tabpanel" aria-labelledby="pending-orders">
                <div class="flex flex-col items-center justify-center gap-2 p-8">
                    <x-icon-store icon="task" class="h-8 w-8 text-current text-zinc-400" />
                    <p class="text-sm text-zinc-400">No hay pedidos</p>
                </div>
            </div>
            <div class="hidden rounded-lg bg-zinc-50 p-4" id="processed" role="tabpanel" aria-labelledby="processed-orders">
                <div class="flex flex-col items-center justify-center gap-2 p-8">
                    <x-icon-store icon="task" class="h-8 w-8 text-current text-zinc-400" />
                    <p class="text-sm text-zinc-400">No hay pedidos</p>
                </div>
            </div>
            <div class="hidden rounded-lg bg-zinc-50 p-4" id="cancelled" role="tabpanel" aria-labelledby="cancelled-orders">
                <div class="flex flex-col items-center justify-center gap-2 p-8">
                    <x-icon-store icon="task" class="h-8 w-8 text-current text-zinc-400" />
                    <p class="text-sm text-zinc-400">No hay pedidos cancelados</p>
                </div>
            </div>
        </div>

    </div>
@endsection
