<header class="{{ $classHead ?? '' }} w-full">
    <nav
        class="items-centermx-auto {{ $classNav ?? '' }} glass m-4 flex justify-between gap-2 rounded-full bg-primary px-6 py-2">
        <div class="flex items-center gap-10">
            <div class="flex items-center">
                <img src="{{ asset('images/logo de entre cheros.png') }}" alt="Logo"
                    class="h-12 w-12 rounded-full object-cover">
            </div>
            <ul class="flex gap-6 font-secondary text-secondary">
                <li class="link-nav {{ Request::is('home') || Request::is('/') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="">Inicio</a>
                </li>
                <li class="link-nav {{ Request::is('store') ? 'active' : '' }}"><a
                        href="{{ route('store') }}">Tienda</a>
                </li>
                <li class="link-nav"><a href="">Conócenos</a></li>
                <li class="link-nav"><a href="">Preguntas frecuentes</a></li>
                <li class="link-nav"><a href="">Contactanos</a></li>
            </ul>
        </div>
        <ul class="flex items-center gap-6">
            <li>
                <a href="{{ route('favorites') }}" class="text-secondary hover:text-rose-500">
                    <x-icon-store icon="favourite" class="h-6 w-6 text-current hover:fill-rose-500" />
                </a>
            </li>
            <li>
                <a href="{{ route('cart') }}" class="relative">
                    <x-icon-store icon="shopping-cart" class="h-6 w-6 text-secondary" />
                    <div class="absolute -end-2 -top-2 inline-flex h-5 w-5 items-center justify-center rounded-full bg-secondary font-secondary text-xs font-bold text-white"
                        id="cart-count">
                        {{ \App\Helpers\Cart::count() }}
                    </div>
                </a>
            </li>
            <li class="group relative flex items-center">
                @if ($user = auth()->user())
                    <button type="button">
                        <img src="{{ Storage::url($user->profile_photo_path) }}" alt=""
                            class="h-10 w-10 rounded-full object-cover">
                    </button>
                    <div
                        class="absolute top-10 hidden w-40 overflow-hidden rounded-lg bg-white font-secondary text-sm shadow-md group-hover:block">
                        <ul class="flex flex-col">
                            <li class="w-full px-4 py-2 hover:bg-zinc-100">
                                <a href="" class="block w-full">Perfil</a>
                            </li>
                            <li class="w-full px-4 py-2 hover:bg-zinc-100">
                                <a href="{{ route('favorites') }}" class="block w-full">Favoritos</a>
                            </li>
                            <li class="w-full px-4 py-2 hover:bg-zinc-100">
                                <a href="" class="block w-full">Pedidos</a>
                            </li>
                            <li class="w-full border-t border-zinc-200 px-4 py-2 hover:bg-zinc-100">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block w-full text-start">Cerrar sesión</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="font-secondary text-sm">
                        Iniciar sesión
                    </a>
                @endif
            </li>
        </ul>
    </nav>
</header>
