<div class="fixed bottom-0 left-0 z-[70] m-4 block text-center lg:hidden">
    <x-button type="button" icon="menu-02" typeButton="secondary" class="bg-zinc-200 dark:bg-black" onlyIcon="true"
        id="btn-nav-sales" />
</div>

<div id="drawer-sales"
    class="fixed left-0 top-0 z-50 h-screen w-80 -translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black"
    tabindex="-1" aria-labelledby="drawer-label">
    <button type="button"
        class="absolute end-2.5 top-2.5 flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-950 dark:hover:text-white">
        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <ul class="mt-14 space-y-2 p-2 text-sm">
        <li>
            <a href="{{ route('admin.sales-strategies.index') }}"
                class="{{ \App\Helpers\RouteHelper::isActive([
                    'admin.sales-strategies.index',
                    'admin.sales-strategies.coupon.create',
                    'admin.sales-strategies.coupon.edit',
                ]) }} flex items-center gap-2 rounded-lg p-2 text-zinc-900 hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-950">
                <x-icon icon="coupon"
                    class="h-5 w-5 flex-shrink-0 text-current text-zinc-500 transition duration-75" />
                Cupones de descuento
            </a>
        </li>
        <li>
            <a href="{{ route('admin.sales-strategies.shipping-methods.index') }}"
                class="{{ \App\Helpers\RouteHelper::isActive(['admin.sales-strategies.shipping-methods.index']) }} flex items-center gap-2 rounded-lg p-2 text-zinc-900 hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-950">
                <x-icon icon="package-import"
                    class="h-5 w-5 flex-shrink-0 text-current text-zinc-500 transition duration-75" />
                Metodos de envío
            </a>
        </li>
        <li>
            <a href="{{ route('admin.sales-strategies.payment-methods.index') }}"
                class="{{ \App\Helpers\RouteHelper::isActive(['admin.sales-strategies.payment-methods.index']) }} flex items-center gap-2 rounded-lg p-2 text-zinc-900 hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-950">
                <x-icon icon="payment"
                    class="h-5 w-5 flex-shrink-0 text-zinc-500 transition duration-75 group-hover:text-zinc-900 dark:text-zinc-400 dark:group-hover:text-white" />
                Metodos de pago
            </a>
        </li>
        <li>
            <a href="{{ route('admin.sales-strategies.currencies.index') }}"
                class="{{ \App\Helpers\RouteHelper::isActive(['admin.sales-strategies.currencies.index']) }} flex items-center gap-2 rounded-lg p-2 text-zinc-900 hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-950">
                <x-icon icon="cash"
                    class="h-5 w-5 flex-shrink-0 text-zinc-500 transition duration-75 group-hover:text-zinc-900 dark:text-zinc-400 dark:group-hover:text-white" />
                Cambio de divisas
            </a>
        </li>
    </ul>
</div>

<div class="fixed top-0 mt-[70px] hidden h-screen w-60 border-e border-zinc-400 dark:border-zinc-800 lg:block">
    <ul class="space-y-2 p-2 text-sm">
        <li>
            <a href="{{ route('admin.sales-strategies.index') }}"
                class="{{ \App\Helpers\RouteHelper::isActive([
                    'admin.sales-strategies.index',
                    'admin.sales-strategies.coupon.create',
                    'admin.sales-strategies.coupon.edit',
                ]) }} flex items-center gap-2 rounded-lg p-2 text-zinc-900 hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-950">
                <x-icon icon="coupon"
                    class="h-5 w-5 flex-shrink-0 text-current text-zinc-500 transition duration-75" />
                Cupones de descuento
            </a>
        </li>
        <li>
            <a href="{{ route('admin.sales-strategies.shipping-methods.index') }}"
                class="{{ \App\Helpers\RouteHelper::isActive(['admin.sales-strategies.shipping-methods.index']) }} flex items-center gap-2 rounded-lg p-2 text-zinc-900 hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-950">
                <x-icon icon="package-import"
                    class="h-5 w-5 flex-shrink-0 text-current text-zinc-500 transition duration-75" />
                Metodos de envío
            </a>
        </li>
        <li>
            <a href="{{ route('admin.sales-strategies.payment-methods.index') }}"
                class="{{ \App\Helpers\RouteHelper::isActive(['admin.sales-strategies.payment-methods.index']) }} flex items-center gap-2 rounded-lg p-2 text-zinc-900 hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-950">
                <x-icon icon="payment"
                    class="h-5 w-5 flex-shrink-0 text-zinc-500 transition duration-75 group-hover:text-zinc-900 dark:text-zinc-400 dark:group-hover:text-white" />
                Metodos de pago
            </a>
        </li>
        <li>
            <a href="{{ route('admin.sales-strategies.currencies.index') }}"
                class="{{ \App\Helpers\RouteHelper::isActive(['admin.sales-strategies.currencies.index']) }} flex items-center gap-2 rounded-lg p-2 text-zinc-900 hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-950">
                <x-icon icon="cash"
                    class="h-5 w-5 flex-shrink-0 text-zinc-500 transition duration-75 group-hover:text-zinc-900 dark:text-zinc-400 dark:group-hover:text-white" />
                Cambio de divisas
            </a>
        </li>
    </ul>
</div>
