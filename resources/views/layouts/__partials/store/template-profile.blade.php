@extends('layouts.template')
@section('title', 'Perfil')
@section('content')
    @php
        $user = Auth::user();
    @endphp
    <div>
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
        <section class="mx-auto mt-8 p-0 xl:p-8">
            <div class="sm:ga-8 mx-auto flex w-max justify-center gap-4 rounded-2xl p-4 font-semibold sm:px-10">
                <a href="{{ Route('favorites') }}"
                    class="flex flex-col items-center justify-center gap-1 rounded-2xl border border-zinc-200 p-4 text-xs text-rose-500 hover:scale-105 sm:text-sm">
                    <x-icon-store icon="favourite" class="h-4 w-4 text-current sm:h-6 sm:w-6 md:h-8 md:w-8" />
                    Favoritos
                </a>
                <a href="{{ Route('cart') }}"
                    class="flex flex-col items-center justify-center gap-1 rounded-2xl border border-zinc-200 p-4 text-xs text-primary hover:scale-105 sm:text-sm">
                    <x-icon-store icon="shopping-cart" class="h-4 w-4 text-current sm:h-6 sm:w-6 md:h-8 md:w-8" />
                    Carrito
                </a>
                <a href="{{ Route('favorites') }}"
                    class="flex flex-col items-center justify-center gap-1 rounded-2xl border border-zinc-200 p-4 text-xs text-secondary hover:scale-105 sm:text-sm">
                    <x-icon-store icon="coupon" class="h-4 w-4 text-current sm:h-6 sm:w-6 md:h-8 md:w-8" />
                    Cupones
                </a>
            </div>
            <div class="mx-auto mt-4 flex flex-col px-4 sm:mt-8 sm:flex-row md:gap-4 xl:gap-8 xl:px-20">
                <div
                    class="mx-auto mb-4 h-max w-max overflow-hidden rounded-2xl border border-zinc-200 sm:mx-0 sm:w-auto sm:overflow-auto xl:min-w-[350px]">
                    @include('layouts.__partials.store.nav-profile')
                </div>
                <div class="h-max w-full rounded-2xl">
                    @yield('profile-content')
                </div>
            </div>
        </section>
    </div>
@endsection
