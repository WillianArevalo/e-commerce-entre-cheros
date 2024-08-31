<div class="flex flex-col">
    <h2 class="px-4 pt-4 font-league-spartan text-2xl font-bold text-secondary">Mi cuenta</h2>
    <div class="mb-4 flex flex-col">
        <a href="{{ Route('account.index') }}"
            class="link-profile {{ Route::is('account.index') ? 'active' : '' }} relative flex items-center p-2 ps-4 text-secondary">
            General
        </a>
        <a href="{{ Route('orders') }}"
            class="link-profile {{ Route::is('orders') ? 'active' : '' }} relative flex items-center p-2 ps-4 text-secondary">
            Pedidos
        </a>
        <a href="#" class="link-profile relative flex items-center p-2 ps-4 text-secondary">Pagos</a>
        <a href="#" class="link-profile relative flex items-center p-2 ps-4 text-secondary">
            Reembolsos y devoluciones
        </a>
        <a href="{{ Route('account.settings') }}"
            class="link-profile {{ Route::is('account.settings') ? 'active' : '' }} relative flex items-center p-2 ps-4 text-secondary">
            Configuración
        </a>
        <a href="{{ Route('account.addresses.index') }}"
            class="{{ Route::is('account.addresses.index') ? 'active' : '' }} link-profile relative flex items-center p-2 ps-4 text-secondary">
            Direcciones
        </a>
        <a href="#" class="link-profile relative flex items-center p-2 ps-4 text-secondary">Mensajes</a>
    </div>
</div>
