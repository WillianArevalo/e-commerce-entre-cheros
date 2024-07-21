@extends('layouts.login-template')

@section('title', 'Iniciar sesión')

@section('content')
    <section class="h-screen w-full flex items-center justify-center">
        <div class="flex h-full items-center justify-center w-full">
            <div class="h-full flex items-center justify-center flex-1"
                style="background-image:url('{{ asset('images/fondo2.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
                <img src="{{ asset('images/logo de entre cheros.png') }}" alt="" class="w-80 h-80 object-cover">
            </div>
            <div class="flex-1 flex flex-col text-center">
                <div class="px-10">
                    <h1 class="text-5xl font-primary text-secondary font-bold">Inicia sesión</h1>
                </div>
                <div class="w-3/5 mx-auto mt-4 font-secondary">
                    <form action="{{ route('login.validate') }}" method="POST">
                        @csrf
                        <div class="flex flex-col gap-2">
                            <label for="" class="text-start text-zinc-600 text-sm">Correo electronico</label>
                            <input type="text" name="email"
                                class="text-sm px-6 py-3 border border-zinc-300 rounded-full focus:ring-4 focus:ring-blue-200 focus:border-blue-500"
                                value="{{ old('email') }}" placeholder="Ingresa tu email aquí" autocomplete="off">
                            @error('email')
                                <span class="text-red-500 text-sm text-start">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-2 mt-4">
                            <label for="" class="text-start text-zinc-600 text-sm">Contraseña</label>
                            <input type="password" name="password"
                                class="text-sm px-6 py-3 border border-zinc-300 rounded-full focus:ring-4 focus:ring-blue-200 focus:border-blue-500"
                                value="{{ old('password') }}" placeholder="Ingresa tu contraseña aquí" autocomplete="off">
                            @error('password')
                                <span class="text-red-500 text-sm text-start">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <div class="flex items-center">
                                <input checked id="checked-checkbox" type="checkbox" value=""
                                    class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2">
                                <label for="checked-checkbox" class="ms-2 text-sm font-medium text-zinc-600">
                                    Recuerdame
                                </label>
                            </div>
                            <a href="" class="text-sm text-blue-500 underline font-semibold hover:text-blue-700">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                        <div class="mt-8 flex items-center justify-center">
                            <x-button type="submit" typeButton="store-gradient" text="Iniciar sesión" icon="login" />
                        </div>
                        <div class="mt-4">
                            <span class="text-sm text-zinc-500">O inicia sesión con</span>
                            <div class="flex gap-2 mt-4">
                                <a href=""
                                    class="flex items-center justify-center w-1/2 py-2 px-4 text-sm text-white bg-blue-500 rounded-full hover:bg-blue-700">
                                    <x-icon icon="facebook" class="w-5 h-5 text-current" />
                                    <span class="ms-2">Facebook</span>
                                </a>
                                <a href=""
                                    class="flex items-center justify-center w-1/2 py-2 px-4 text-sm text-white bg-red-500 rounded-full hover:bg-red-700">
                                    <x-icon icon="google" class="w-5 h-5 text-current" />
                                    <span class="ms-2">Google</span>
                                </a>
                                <a href=""
                                    class="flex items-center justify-center w-1/2 py-2 px-4 text-sm text-white bg-rose-500 rounded-full hover:bg-rose-700">
                                    <x-icon icon="instagram" class="w-5 h-5 text-current" />
                                    <span class="ms-2">Instagram</span>
                                </a>
                                <a href=""
                                    class="flex items-center justify-center w-1/2 py-2 px-4 text-sm text-white bg-black rounded-full">
                                    <x-icon icon="twitter" class="w-5 h-5 text-current" />
                                    <span class="ms-2">Twitter</span>
                                </a>
                            </div>
                        </div>
                        <div class="mt-4
                                flex flex-col">
                            <span class="text-sm text-zinc-500 mt-2">¿No tienes una cuenta?
                                <a href="{{ route('register') }}"
                                    class="text-sm text-blue-500 hover:text-blue-700 underline font-semibold">Registrate</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
