@extends('layouts.login-template')
@section('title', 'Iniciar sesión')
@section('content')
    <section class="flex h-screen w-full items-center justify-center">
        <div class="flex h-full w-full items-center justify-center">
            <div class="flex h-full flex-1 items-center justify-center"
                style="background-image:url('{{ asset('images/fondo3.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
                <img src="{{ asset('images/logo de entre cheros.png') }}" alt="" class="h-80 w-80 object-cover">
            </div>
            <div
                class="top-20 flex h-auto w-full flex-1 flex-col rounded-t-3xl bg-white text-center max-[900px]:absolute max-[900px]:h-full max-[900px]:pt-10">
                <div class="px-10">
                    <div class="hidden max-[900px]:block">
                        <img src="{{ asset('images/logo de entre cheros.png') }}" alt=""
                            class="mx-auto h-28 w-28 object-cover">
                    </div>
                    <h1 class="font-league-spartan text-2xl font-bold text-secondary lg:text-3xl xl:text-5xl">
                        Inicia sesión
                    </h1>
                </div>
                <div class="font-secondary mx-auto mt-8 w-full px-4 sm:px-6 lg:w-3/5 lg:px-0">
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
                                <input checked id="checked-checkbox" type="checkbox" name="remember"
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
                            <x-button-store type="submit" typeButton="primary" text="Iniciar sesión"
                                class="w-full font-bold sm:w-max" icon="login" />
                        </div>
                        <div class="mt-4">
                            <span class="text-sm text-zinc-500">O</span>
                            <div class="mt-4 flex justify-center gap-2">
                                <a href="{{ Route('auth.google') }}"
                                    class="flex w-full items-center justify-center gap-2 rounded-xl border border-zinc-300 px-6 py-3 text-sm text-zinc-700 hover:bg-zinc-100 sm:w-auto">
                                    <x-icon-store icon="google" class="h-5 w-5 text-current" />
                                    <span class="ms-2">
                                        Continuar con Google
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-col">
                            <span class="mt-2 text-sm text-zinc-500">¿No tienes una cuenta?
                                <a href="{{ route('register') }}"
                                    class="text-sm font-semibold text-blue-500 underline hover:text-blue-700">
                                    Registrate
                                </a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
