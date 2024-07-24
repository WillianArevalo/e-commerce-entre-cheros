<header class=" w-full {{ $classHead ?? '' }}">
    <nav
        class="bg-primary m-4 flex gap-2 justify-between py-2 px-6 rounded-full items-centermx-auto {{ $classNav ?? '' }}  glass">
        <div class="flex items-center gap-10">
            <div class="flex items-center">
                <img src="{{ asset('images/logo de entre cheros.png') }}" alt="Logo"
                    class="object-cover rounded-full w-12 h-12">
            </div>
            <ul class="flex gap-6 text-secondary font-secondary">
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
        <ul class="flex gap-6 items-center">
            <li>
                <a href="{{ route('favorites') }}" class="text-secondary hover:text-rose-500">
                    <x-icon icon="favourite" class="w-6 h-6 text-current hover:fill-rose-500" />
                </a>
            </li>
            <li>
                <a href="{{ route('cart') }}" class="relative">
                    <x-icon icon="shopping-cart" class="w-6 h-6 text-secondary" />
                    <div class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-secondary rounded-full -top-2 -end-2 font-secondary"
                        id="cart-count">
                        {{ \App\Helpers\Cart::count() }}
                    </div>
                </a>
            </li>
            <li class="relative group flex items-center">
                @if ($user = auth()->user())
                    <button type="button">
                        <img src="{{ Storage::url($user->profile_photo_path) }}" alt=""
                            class="w-10 h-10 object-cover rounded-full">
                    </button>
                    <div
                        class="absolute bg-white rounded-lg w-40 font-secondary text-sm overflow-hidden hidden group-hover:block shadow-md top-10">
                        <ul class="flex flex-col">
                            <li class="px-4 py-2 hover:bg-zinc-100 w-full">
                                <a href="" class="block w-full">Perfil</a>
                            </li>
                            <li class="px-4 py-2 hover:bg-zinc-100 w-full">
                                <a href="{{ route('favorites') }}" class="block w-full">Favoritos</a>
                            </li>
                            <li class="px-4 py-2 hover:bg-zinc-100 w-full">
                                <a href="" class="block w-full">Pedidos</a>
                            </li>
                            <li class="px-4 py-2 hover:bg-zinc-100 w-full border-t border-zinc-200">
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
