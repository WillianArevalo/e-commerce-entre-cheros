        <div class="fixed h-screen w-60 border-e border-gray-200 dark:border-zinc-900">
            <ul class="space-y-2 p-2 text-sm">
                <li>
                    <a href="{{ route('admin.sales-strategies.index') }}"
                        class="group flex items-center gap-2 rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-zinc-950">
                        <x-icon icon="coupon"
                            class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                        Cupones de descuento
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.sales-strategies.shipping-methods.index') }}"
                        class="group flex items-center gap-2 rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-zinc-950">
                        <x-icon icon="container-truck"
                            class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                        Metodos de envío
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.flash-offers.index') }}"
                        class="group flex items-center gap-2 rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-zinc-950">
                        <x-icon icon="payment"
                            class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                        Metodos de pago
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.flash-offers.index') }}"
                        class="group flex items-center gap-2 rounded-lg p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-zinc-950">
                        <x-icon icon="save-money-dollar"
                            class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                        Cambio de divisas
                    </a>
                </li>
            </ul>
        </div>
