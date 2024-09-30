<div class="flex flex-col">
    <h2 class="px-4 pt-4 font-league-spartan text-2xl font-bold text-secondary">Mi cuenta</h2>
    <div class="mb-4 flex flex-col">
        <a href="{{ Route('account.index') }}"
            class="link-profile {{ Route::is('account.index') ? 'active' : '' }} relative flex items-center p-2 ps-4 text-secondary">
            <x-icon-store icon="home" class="me-2 h-5 w-5 text-current" />
            General
        </a>
        <a href="{{ Route('orders.index') }}"
            class="link-profile {{ Route::is('orders') ? 'active' : '' }} relative flex items-center p-2 ps-4 text-secondary">
            <x-icon-store icon="shopping-bag" class="me-2 h-5 w-5 text-current" />
            Pedidos
        </a>
        <a href="#" class="link-profile relative flex items-center p-2 ps-4 text-secondary">
            <x-icon-store icon="credit-card" class="me-2 h-5 w-5 text-current" />
            Pagos
        </a>
        <a href="#" class="link-profile relative flex items-center p-2 ps-4 text-secondary">
            <x-icon-store icon="delivery-return" class="me-2 h-5 w-5 text-current" />
            Reembolsos y devoluciones
        </a>
        <a href="{{ Route('account.settings') }}"
            class="link-profile {{ Route::is('account.settings') ? 'active' : '' }} relative flex items-center p-2 ps-4 text-secondary">
            <x-icon-store icon="settings" class="me-2 h-5 w-5 text-current" />
            Configuración
        </a>
        <a href="{{ Route('account.addresses.index') }}"
            class="{{ Route::is('account.addresses.index') ? 'active' : '' }} link-profile relative flex items-center p-2 ps-4 text-secondary">
            <x-icon-store icon="location" class="me-2 h-5 w-5 text-current" />
            Direcciones
        </a>
        <a href="#" class="link-profile relative flex items-center p-2 ps-4 text-secondary">
            <x-icon-store icon="messages" class="me-2 h-5 w-5 text-current" />
            Mensajes
        </a>
        <a href="{{ Route('account.tickets.index') }}"
            class="{{ Route::is('account.tickets.index') ? 'active' : '' }} link-profile relative flex items-center p-2 ps-4 text-secondary">
            <x-icon-store icon="customer-service" class="me-2 h-5 w-5 text-current" />
            Soporte técnico
        </a>
    </div>
</div>
