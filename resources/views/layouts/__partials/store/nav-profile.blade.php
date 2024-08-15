<div class="flex flex-col">
    <h2 class="px-4 pt-4 font-primary text-xl font-bold text-secondary">Mi cuenta</h2>
    <div class="mb-4 flex flex-col text-sm">
        <a href="{{ Route('account') }}"
            class="link-profile {{ Route::is('account') ? 'active' : '' }} relative flex items-center p-2 ps-4 text-secondary">
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
        <a href="#" class="link-profile relative flex items-center p-2 ps-4 text-secondary">
            Dirección de envío
        </a>
        <a href="#" class="link-profile relative flex items-center p-2 ps-4 text-secondary">Mensajes</a>
    </div>
</div>
