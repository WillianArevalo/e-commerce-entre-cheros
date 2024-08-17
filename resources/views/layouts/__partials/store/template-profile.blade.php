@extends('layouts.template')
@section('title', 'Perfil')
@section('content')
    @php
        $user = Auth::user();
    @endphp
    <main>
        <section>
            <div class="relative flex h-[350px] w-full items-center justify-center text-white"
                style="background-image:url('{{ asset('images/fondo7.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
                <svg class="absolute bottom-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#fff" fill-opacity="1"
                        d="M0,192L40,181.3C80,171,160,149,240,165.3C320,181,400,235,480,240C560,245,640,203,720,197.3C800,192,880,224,960,218.7C1040,213,1120,171,1200,149.3C1280,128,1360,128,1400,128L1440,128L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
                    </path>
                </svg>
                <img src="{{ Storage::url($user->profile_photo_path) }}" alt=""
                    class="absolute top-32 h-56 w-56 rounded-full object-cover shadow-md">
            </div>
        </section>
        <section class="mx-auto p-8">
            <div class="mx-auto flex w-3/4 justify-center gap-16 rounded-2xl border border-zinc-300 p-4 font-semibold">
                <a href="{{ Route('favorites') }}"
                    class="flex flex-col items-center justify-center gap-1 text-sm text-rose-500 hover:scale-105">
                    <x-icon-store icon="favourite" class="h-8 w-8 fill-rose-500 text-current" />
                    Favoritos
                </a>
                <a href="{{ Route('cart') }}"
                    class="flex flex-col items-center justify-center gap-1 text-sm text-tertiary hover:scale-105">
                    <x-icon-store icon="shopping-cart" class="h-8 w-8 text-current" />
                    Carrito
                </a>
                <a href="{{ Route('favorites') }}"
                    class="flex flex-col items-center justify-center gap-1 text-sm text-secondary hover:scale-105">
                    <x-icon-store icon="coupon" class="h-8 w-8 fill-secondary text-current" />
                    Cupones
                </a>
            </div>
            <div class="mx-auto mt-8 flex w-3/4 gap-8">
                <div class="h-max flex-1 overflow-hidden rounded-2xl border border-zinc-300">
                    @include('layouts.__partials.store.nav-profile')
                </div>
                <div class="h-max flex-[2] rounded-2xl border border-zinc-300 p-4">
                    @yield('profile-content')
                </div>
        </section>
    </main>
@endsection
