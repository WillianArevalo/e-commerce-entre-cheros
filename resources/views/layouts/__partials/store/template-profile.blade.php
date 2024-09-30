@extends('layouts.template')
@section('title', 'Perfil')
@section('content')
    @php
        $user = Auth::user();
    @endphp
    <main>
        <section>
            <div class="relative flex h-[320px] w-full items-center justify-center text-white"
                style="background-image:url('{{ asset('images/fondo7.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
                <svg class="absolute bottom-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#fff" fill-opacity="1"
                        d="M0,256L60,229.3C120,203,240,149,360,128C480,107,600,117,720,138.7C840,160,960,192,1080,202.7C1200,213,1320,203,1380,197.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                    </path>
                </svg>
                <img src="{{ $user->google_id ? $user->google_profile : Storage::url($user->profile) }}" alt="Profile picture"
                    class="absolute top-32 h-56 w-56 rounded-full object-cover shadow-md">
            </div>
        </section>
        <section class="mx-auto mt-4 p-8">
            <div class="mx-auto flex w-max justify-center gap-16 rounded-2xl p-4 px-10 font-semibold">
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
            <div class="mx-auto mt-8 flex gap-8 px-20">
                <div class="h-max min-w-[350px] rounded-2xl border border-zinc-200">
                    @include('layouts.__partials.store.nav-profile')
                </div>
                <div class="h-max w-full rounded-2xl">
                    @yield('profile-content')
                </div>
            </div>
        </section>
    </main>
@endsection
