<header class=" w-full {{ $classHead ?? '' }}">
    <nav
        class="bg-primary m-4 flex gap-2 justify-between py-2 px-4 rounded-full items-centermx-auto {{ $classNav ?? '' }}">
        <div class="flex items-center gap-10">
            <div class="flex items-center">
                <img src="{{ asset('images/photo.jpg') }}" alt="Logo" class="object-cover rounded-full w-12 h-12">
            </div>
            <ul class="flex gap-6 text-secondary font-extrabold font-secondary">
                <li><a href="{{ route('home') }}" class="uppercase">Inicio</a></li>
                <li><a href="" class="uppercase">Tienda</a></li>
                <li><a href="" class="uppercase">Conócenos</a></li>
                <li><a href="" class="uppercase">Preguntas frecuentes</a></li>
                <li><a href="" class="uppercase">Contactanos</a></li>
            </ul>
        </div>
        <ul class="flex gap-4 items-center">
            <li>
                <a href="">
                    <x-icon icon="search" class="w-6 h-6 text-secondary" />
                </a>
            </li>
            <li>
                <a href="{{ route('cart') }}">
                    <x-icon icon="shopping-cart" class="w-6 h-6 text-secondary" />
                </a>
            </li>
            <li>
                <a href="">
                    <x-icon icon="user-circle" class="w-6 h-6 text-secondary" />
                </a>
            </li>
        </ul>
    </nav>
</header>
