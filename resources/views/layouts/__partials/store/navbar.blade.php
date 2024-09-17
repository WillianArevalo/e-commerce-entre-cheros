<header class="{{ $classHead ?? '' }} glass w-full bg-primary" id="header">
    <nav class="{{ $classNav ?? '' }} mx-auto flex items-center justify-between gap-2 px-6 py-2" id="navbar">
        <div class="flex items-center gap-10">
            <div class="flex items-center">
                <img src="{{ asset('images/logo de entre cheros.png') }}" alt="Logo"
                    class="h-12 w-12 rounded-full object-cover">
            </div>
            <ul class="font-secondary flex gap-6 text-secondary">
                <li class="link-nav {{ Request::is('home') || Request::is('/') ? 'active' : '' }}">
                    <a href="{{ Route('home') }}" class="">Inicio</a>
                </li>
                <li class="link-nav {{ Request::is('store') ? 'active' : '' }}">
                    <a href="{{ Route('store') }}">Tienda</a>
                </li>
                <li class="link-nav {{ Request::is('about') ? 'active' : '' }}">
                    <a href="{{ Route('about') }}">Conócenos</a>
                </li>
                <li class="link-nav {{ Request::is('faq') ? 'active' : '' }}">
                    <a href="{{ Route('faq') }}">
                        Preguntas frecuentes
                    </a>
                </li>
                <li class="link-nav {{ Request::is('contact') ? 'active' : '' }}"><a
                        href="{{ Route('contact') }}">Contactanos</a></li>
            </ul>
        </div>
        <ul class="flex items-center gap-6">
            <li>
                <a href="{{ Route('favorites') }}" class="relative text-rose-500 hover:text-rose-500">
                    <x-icon-store icon="favourite" class="h-6 w-6 text-current hover:fill-rose-500" />
                    <div class="y font-secondary absolute -end-2.5 -top-2.5 inline-flex h-5 w-5 items-center justify-center rounded-full bg-rose-600 text-xs font-bold text-white"
                        id="favorite-count">
                        {{ \App\Helpers\Favorites::count() }}
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ Route('cart') }}" class="group relative">
                    <x-icon-store icon="shopping-cart" class="h-6 w-6 text-secondary" />
                    <div class="font-secondary absolute -end-2.5 -top-2.5 inline-flex h-5 w-5 items-center justify-center rounded-full bg-secondary text-xs font-bold text-white"
                        id="cart-count">
                        {{ \App\Helpers\Cart::count() }}
                    </div>
                </a>
            </li>
            <li class="relative flex items-center">
                @if ($user = auth()->user())
                    <button type="button" class="profile flex items-center justify-center gap-1">
                        <x-icon-store icon="user" class="h-6 w-6 text-secondary" />
                        <div class="flex items-center justify-center gap-1">
                            <span class="block text-sm text-secondary">Hola,</span>
                            <span class="font-meidum truncate text-sm">{{ $user->name }}</span>
                        </div>
                    </button>
                    <div class="font-secondary absolute top-8 z-50 hidden w-52 overflow-hidden rounded-lg bg-white text-sm shadow-md"
                        id="profile-options">
                        <ul class="flex flex-col p-2 font-medium">
                            <li class="mb-2 w-full">
                                <a href="{{ Route('account.index') }}"
                                    class="flex items-center justify-start rounded-xl px-4 py-2 hover:bg-zinc-100">
                                    <img src="{{ Storage::url($user->profile) }}" alt=""
                                        class="min-w-12 h-12 rounded-full object-cover">
                                    <div class="ml-2">
                                        <span class="block text-sm text-secondary">Hola,</span>
                                        <span class="font-meidum block w-28 truncate text-base"
                                            title="{{ $user->name }}">
                                            {{ $user->name }}
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <hr class="border-t border-zinc-200">
                            <li class="mt-2 w-full">
                                <a href="{{ Route('orders.index') }}"
                                    class="flex w-full items-center justify-start rounded-xl px-4 py-2 text-secondary hover:bg-blue-50 hover:text-primary">
                                    <x-icon-store icon="shopping-bag" class="mr-2 inline-block h-4 w-4 text-current" />
                                    Mis pedidos
                                </a>
                            </li>
                            <li class="w-full">
                                <a href=""
                                    class="flex w-full items-center justify-start rounded-xl px-4 py-2 text-secondary hover:bg-blue-50 hover:text-primary">
                                    <x-icon-store icon="credit-card" class="mr-2 inline-block h-4 w-4 text-current" />
                                    Pago
                                </a>
                            </li>
                            <li class="w-full">
                                <a href="{{ Route('mycoupons') }}"
                                    class="group flex w-full items-center justify-start rounded-xl px-4 py-2 text-secondary hover:bg-blue-50 hover:text-primary">
                                    <x-icon-store icon="coupon"
                                        class="mr-2 inline-block h-4 w-4 truncate text-current group-hover:fill-tertiary" />
                                    Mis cupones
                                </a>
                            </li>
                            <li class="mb-2 w-full">
                                <a href="{{ Route('favorites') }}"
                                    class="group flex w-full items-center justify-start rounded-xl px-4 py-2 text-secondary hover:bg-rose-50 hover:text-rose-500">
                                    <x-icon-store icon="favourite"
                                        class="mr-2 inline-block h-4 w-4 text-current group-hover:fill-rose-500" />
                                    Favoritos
                                </a>
                            </li>
                            <hr class="border-t border-zinc-200">
                            <li class="my-2 w-full">
                                <a href="{{ Route('account.settings') }}"
                                    class="flex w-full items-center justify-start rounded-xl px-4 py-2 text-secondary hover:bg-blue-50 hover:text-primary">
                                    <x-icon-store icon="settings" class="mr-2 inline-block h-4 w-4 text-current" />
                                    Configuración
                                </a>
                            </li>
                            <hr class="border-t border-zinc-200">
                            <li class="mt-2 w-full">
                                <form action="{{ Route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="flex w-full items-center justify-start rounded-xl px-4 py-2 text-secondary hover:bg-blue-50 hover:text-primary">
                                        <x-icon-store icon="logout" class="mr-2 inline-block h-4 w-4 text-current" />
                                        Cerrar sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ Route('login') }}" class="font-secondary text-sm">
                        Iniciar sesión
                    </a>
                @endif
            </li>
        </ul>
    </nav>
</header>
