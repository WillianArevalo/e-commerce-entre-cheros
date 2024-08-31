@extends('layouts.login-template')

@section('title', 'Iniciar sesión')

@section('content')
    <section class="flex h-screen w-full items-center justify-center">
        <div class="flex h-full w-full items-center justify-center">
            <div class="flex h-full flex-1 items-center justify-center"
                style="background-image:url('{{ asset('images/fondo2.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
                <img src="{{ asset('images/logo de entre cheros.png') }}" alt="" class="h-80 w-80 object-cover">
            </div>
            <div class="relative flex flex-1 flex-col text-center">
                <div class="px-10">
                    <h1 class="font-league-spartan text-5xl font-bold text-secondary">Inicia sesión</h1>
                </div>
                <div class="font-secondary mx-auto mt-4 w-3/5">
                    <form action="{{ route('login.validate') }}" method="POST">
                        @csrf
                        <div class="flex flex-col items-start gap-2">
                            <x-input-store label="Correo electrónico" id="email" name="email" type="email"
                                placeholder="example@example.com" autocomplete="off" icon="mail"
                                value="{{ old('email') }}" />
                        </div>
                        <div class="mt-4 flex flex-col items-start gap-2">
                            <x-input-store type="password" name="password" id="password" label="Contraseña"
                                value="{{ old('password') }}" placeholder="Ingresa tu contraseña" autocomplete="off"
                                icon="password" />
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="flex items-center">
                                <input checked id="checked-checkbox" type="checkbox" value=""
                                    class="h-5 w-5 rounded border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-zinc-600">
                                    Recuerdame
                                </label>
                            </div>
                            <a href="" class="text-sm font-semibold text-blue-500 underline hover:text-blue-700">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                        <div class="mt-8 flex items-center justify-center">
                            <x-button-store type="submit" typeButton="primary" text="Iniciar sesión" class="font-bold"
                                icon="login" />
                        </div>
                        <div class="mt-4">
                            <span class="text-sm text-zinc-500">O inicia sesión con</span>
                            <div class="mt-4 flex gap-2">
                                <a href=""
                                    class="flex w-1/2 items-center justify-center rounded-full bg-blue-500 px-4 py-2 text-sm text-white hover:bg-blue-700">
                                    <x-icon-store icon="facebook" class="h-5 w-5 text-current" />
                                    <span class="ms-2">Facebook</span>
                                </a>
                                <a href=""
                                    class="flex w-1/2 items-center justify-center rounded-full bg-red-500 px-4 py-2 text-sm text-white hover:bg-red-700">
                                    <x-icon-store icon="google" class="h-5 w-5 text-current" />
                                    <span class="ms-2">Google</span>
                                </a>
                                <a href=""
                                    class="flex w-1/2 items-center justify-center rounded-full bg-rose-500 px-4 py-2 text-sm text-white hover:bg-rose-700">
                                    <x-icon-store icon="instagram" class="h-5 w-5 text-current" />
                                    <span class="ms-2">Instagram</span>
                                </a>
                                <a href=""
                                    class="flex w-1/2 items-center justify-center rounded-full bg-black px-4 py-2 text-sm text-white">
                                    <x-icon-store icon="twitter" class="h-5 w-5 text-current" />
                                    <span class="ms-2">Twitter</span>
                                </a>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-col">
                            <span class="mt-2 text-sm text-zinc-500">¿No tienes una cuenta?
                                <a href="{{ route('register') }}"
                                    class="text-sm font-semibold text-blue-500 underline hover:text-blue-700">Registrate</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
