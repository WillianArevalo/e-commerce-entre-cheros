@extends('layouts.login-template')
@section('title', 'Registrate')
@section('content')
    <section class="flex h-screen w-full items-center justify-center">
        <div class="flex h-full w-full items-center justify-center">
            <div
                class="top-20 mb-4 flex h-auto w-full flex-1 flex-col rounded-t-3xl bg-white text-center max-[900px]:absolute max-[900px]:h-full max-[900px]:pt-5">
                <div class="px-10">
                    <div class="hidden max-[900px]:block">
                        <img src="{{ asset('images/logo de entre cheros.png') }}" alt=""
                            class="mx-auto h-28 w-28 object-cover">
                    </div>
                    <h1 class="font-league-spartan text-2xl font-bold text-secondary lg:text-3xl xl:text-5xl">
                        Registrate
                    </h1>
                </div>
                <div class="font-secondary mx-auto mt-8 w-full px-4 sm:px-6 xl:w-4/5 xl:px-0">
                    <form action="{{ Route('register.post') }}" id="form-register" method="POST">
                        @csrf
                        <div class="flex flex-col gap-4 sm:flex-row">
                            <div class="flex flex-1 flex-col gap-2">
                                <x-input-store name="name" id="name" label="Nombre"
                                    placeholder="Ingresa tu nombre aquí" autocomplete="off" type="text" />
                            </div>
                            <div class="flex flex-1 flex-col gap-2">
                                <x-input-store name="last_name" id="last_name" label="Apellido"
                                    placeholder="Ingresa tu apellido aquí" autocomplete="off" type="text" />
                            </div>
                        </div>
                        <div class="mt-4 flex flex-1 flex-col gap-2">
                            <x-input-store type="email" name="email" id="email"
                                placeholder="Ingresa tu correo eletrónico" label="Correo electrónico" icon="mail" />
                        </div>
                        <div class="mt-4 flex flex-col gap-4 sm:flex-row">
                            <div class="flex flex-1 flex-col gap-2">
                                <x-input-store type="password" name="password" id="password-register"
                                    placeholder="Ingresa la contraseña" icon="password" label="Contraseña" />
                                <ul id="password-requirements" class="hidden text-start text-xs">
                                    <li id="char-length" class="text-red-500">Debe tener al menos 8 caracteres</li>
                                    <li id="upper-case" class="text-red-500">Debe tener al menos una letra mayúscula</li>
                                    <li id="number" class="text-red-500">Debe tener al menos un número</li>
                                    <li id="special-char" class="text-red-500">
                                        Debe tener al menos un carácter especial (@,
                                        #, $, etc.)
                                    </li>
                                </ul>
                            </div>
                            <div class="flex flex-1 flex-col gap-2">
                                <x-input-store type="password" name="password_confirmation" id="confirm-password"
                                    placeholder="Ingresa la contraseña" icon="password-validation"
                                    label="Confirmar contraseña" />
                                <span id="password-match" class="hidden text-start text-xs text-red-500">
                                    Las contraseñas no coinciden
                                </span>
                            </div>
                        </div>
                        <div class="mt-8 flex items-center justify-center">
                            <x-button-store type="submit" typeButton="primary" class="w-full px-11 font-bold sm:w-auto"
                                text="Registrarte" />
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
                        <div class="mb-4 mt-4 flex flex-col">
                            <span class="mt-2 text-sm text-zinc-500">¿Ya tienes una cuenta?
                                <a href="{{ route('login') }}"
                                    class="text-sm font-semibold text-blue-500 underline hover:text-blue-700">
                                    Iniciar sesión
                                </a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex h-full flex-1 items-center justify-center"
                style="background-image:url('{{ asset('images/fondo7.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
                <img src="{{ asset('images/logo de entre cheros.png') }}" alt="" class="h-80 w-80 object-cover">
            </div>
        </div>
    </section>
@endsection
