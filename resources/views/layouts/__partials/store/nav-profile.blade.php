<div class="mx-auto flex w-max justify-center sm:hidden">
    <a href="{{ Route('account.index') }}" data-tooltip-target="tooltip-general"
        class="link-profile {{ Route::is('account.index') ? 'active' : '' }} relative flex items-center p-2 ps-4 text-secondary">
        <x-icon-store icon="home" class="me-2 h-5 w-5 text-current" />
        <span class="hidden xl:block">General</span>
    </a>
    <div id="tooltip-general" role="tooltip"
        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300">
        General
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>

    <a href="{{ Route('orders.index') }}" data-tooltip-target="tooltip-orders"
        class="link-profile {{ Route::is('orders') ? 'active' : '' }} relative flex items-center p-2 ps-4 text-secondary">
        <x-icon-store icon="shopping-bag" class="me-2 h-5 w-5 text-current" />
        <span class="hidden xl:block">Pedidos</span>
    </a>
    <div id="tooltip-orders" role="tooltip"
        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300">
        Pedidos
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>

    <a href="#" data-tooltip-target="tooltip-payments"
        class="link-profile relative flex items-center p-2 ps-4 text-secondary">
        <x-icon-store icon="credit-card" class="me-2 h-5 w-5 text-current" />
        <span class="hidden xl:block">Pagos</span>
    </a>
    <div id="tooltip-payments" role="tooltip"
        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300">
        Pagos
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>

    <a href="{{ Route('account.settings') }}" data-tooltip-target="tooltip-settings"
        class="link-profile {{ Route::is('account.settings') ? 'active' : '' }} relative flex items-center p-2 ps-4 text-secondary">
        <x-icon-store icon="settings" class="me-2 h-5 w-5 text-current" />
        <span class="hidden xl:block">Configuración</span>
    </a>
    <div id="tooltip-settings" role="tooltip"
        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300">
        Configuración
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>

    <a href="{{ Route('account.addresses.index') }}" data-tooltip-target="tooltip-addresses"
        class="{{ Route::is('account.addresses.index') ? 'active' : '' }} link-profile relative flex items-center p-2 ps-4 text-secondary">
        <x-icon-store icon="location" class="me-2 h-5 w-5 text-current" />
        <span class="hidden xl:block">Direcciones</span>
    </a>
    <div id="tooltip-addresses" role="tooltip"
        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300">
        Direcciones
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>

    <a href="{{ Route('account.tickets.index') }}" data-tooltip-target="tooltip-tickets"
        class="{{ Route::is('account.tickets.index') ? 'active' : '' }} link-profile relative flex items-center p-2 ps-4 text-secondary">
        <x-icon-store icon="ticket-02" class="me-2 h-5 w-5 text-current" />
        <span class="hidden xl:block">Tickets</span>
    </a>
    <div id="tooltip-tickets" role="tooltip"
        class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300">
        Tickets
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</div>

<div class="hidden sm:flex sm:flex-col">
    <h2 class="flex items-center gap-2 px-4 pt-4 font-league-spartan text-2xl font-bold text-secondary">
        <x-icon-store icon="user" class="h-5 w-5 text-current" />
        <span class="hidden xl:block">Mi cuenta</span>
    </h2>
    <div class="mb-4 mt-4 flex flex-col xl:mt-0">
        <a href="{{ Route('account.index') }}"
            class="link-profile {{ Route::is('account.index') ? 'active' : '' }} relative flex items-center p-2 ps-4 text-secondary">
            <x-icon-store icon="home" class="me-2 h-5 w-5 text-current" />
            <span class="hidden xl:block">General</span>
        </a>
        <a href="{{ Route('orders.index') }}"
            class="link-profile {{ Route::is('orders') ? 'active' : '' }} relative flex items-center p-2 ps-4 text-secondary">
            <x-icon-store icon="shopping-bag" class="me-2 h-5 w-5 text-current" />
            <span class="hidden xl:block">Pedidos</span>
        </a>
        <a href="#" class="link-profile relative flex items-center p-2 ps-4 text-secondary">
            <x-icon-store icon="credit-card" class="me-2 h-5 w-5 text-current" />
            <span class="hidden xl:block">Pagos</span>
        </a>
        <a href="{{ Route('account.settings') }}"
            class="link-profile {{ Route::is('account.settings') ? 'active' : '' }} relative flex items-center p-2 ps-4 text-secondary">
            <x-icon-store icon="settings" class="me-2 h-5 w-5 text-current" />
            <span class="hidden xl:block">Configuración</span>
        </a>
        <a href="{{ Route('account.addresses.index') }}"
            class="{{ Route::is('account.addresses.index') ? 'active' : '' }} link-profile relative flex items-center p-2 ps-4 text-secondary">
            <x-icon-store icon="location" class="me-2 h-5 w-5 text-current" />
            <span class="hidden xl:block">Direcciones</span>
        </a>
        <a href="{{ Route('account.tickets.index') }}"
            class="{{ Route::is('account.tickets.index') ? 'active' : '' }} link-profile relative flex items-center p-2 ps-4 text-secondary">
            <x-icon-store icon="ticket-02" class="me-2 h-5 w-5 text-current" />
            <span class="hidden xl:block">Tickets</span>
        </a>
    </div>
</div>
