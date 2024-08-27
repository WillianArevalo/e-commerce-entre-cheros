        <div class="fixed top-0 mt-[70px] h-screen w-60 border-e border-zinc-200 dark:border-zinc-900">
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
                        <x-icon icon="container-truck"
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
                        <x-icon icon="save-money-dollar"
                            class="h-5 w-5 flex-shrink-0 text-zinc-500 transition duration-75 group-hover:text-zinc-900 dark:text-zinc-400 dark:group-hover:text-white" />
                        Cambio de divisas
                    </a>
                </li>
            </ul>
        </div>
