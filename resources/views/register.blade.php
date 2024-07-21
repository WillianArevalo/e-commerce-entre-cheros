@extends('layouts.login-template')

@section('title', 'Iniciar sesión')

@section('content')
    <section class="h-screen w-full flex items-center justify-center">
        <div class="flex h-full items-center justify-center w-full">
            <div class="flex-1 flex flex-col text-center">
                <div class="px-10">
                    <h1 class="text-5xl font-primary text-secondary font-bold">Registrate</h1>
                </div>
                <div class="w-4/5 mx-auto mt-4 font-secondary">
                    <form action="">
                        <div class="flex gap-4">
                            <div class="flex flex-col gap-2 flex-1">
                                <label for="name" class="text-start text-zinc-600 text-sm">Nombre</label>
                                <input type="text" name="name" id="name"
                                    class="text-sm px-6 py-3 border border-zinc-300 rounded-full focus:ring-4 focus:ring-blue-200 focus:border-blue-500"
                                    placeholder="Ingresa tu nombre aquí" autocomplete="off">
                            </div>
                            <div class="flex flex-col gap-2 flex-1">
                                <label for="last_name" class="text-start text-zinc-600 text-sm">Apellido</label>
                                <input type="text" name="last_name" id="last_name"
                                    class="text-sm px-6 py-3 border border-zinc-300 rounded-full focus:ring-4 focus:ring-blue-200 focus:border-blue-500"
                                    placeholder="Ingresa tu apellido aquí" autocomplete="off">
                            </div>
                        </div>
                        <div class="flex gap-4 mt-4">
                            <div class="flex flex-col gap-2 flex-1">
                                <label for="birthdate" class="text-start text-zinc-600 text-sm">Fecha de nacimiento</label>
                                <input type="date" name="birthdate" id="birthdate"
                                    class="text-sm px-6 py-3 border border-zinc-300 rounded-full focus:ring-4 focus:ring-blue-200 focus:border-blue-500"
                                    autocomplete="off">
                            </div>
                            <div class="flex flex-col gap-2 flex-1">
                                <label for="phone" class="text-start text-zinc-600 text-sm">Telefono</label>
                                <input type="text" name="phone" id="phone"
                                    class="text-sm px-6 py-3 border border-zinc-300 rounded-full focus:ring-4 focus:ring-blue-200 focus:border-blue-500"
                                    placeholder="Ingresa tu telefono aquí" autocomplete="off">
                            </div>
                            <div class="flex flex-col gap-2 flex-1">
                                <label for="gender" class="text-start text-zinc-600 text-sm">Sexo</label>
                                <input type="hidden" id="gender" name="gender" value="M">
                                <div class="relative">
                                    <div
                                        class="selected text-sm px-6 py-3 border border-zinc-300 rounded-full focus:ring-4 focus:ring-blue-200 focus:border-blue-500 flex items-center justify-between">
                                        <span class="itemSelected">
                                            Masculino
                                        </span>
                                        <x-icon icon="arrow-down" class="w-5 h-5 text-zinc-600" />
                                    </div>
                                    <ul
                                        class="absolute z-10 w-full mt-2 py-1 bg-white border border-gray-200 rounded-2xl shadow-lg selectOptions hidden">
                                        <li class="itemOption text-sm text-zinc-900 px-4 py-2.5 hover:bg-gray-100"
                                            data-value="M" data-input="#gender">
                                            Masculino
                                        </li>
                                        <li class="itemOption text-sm text-zinc-900 px-4 py-2.5 hover:bg-gray-100"
                                            data-value="F" data-input="#gender">
                                            Femenino
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 flex-1 mt-4">
                            <label for="email" class="text-start text-zinc-600 text-sm">Correo electronico</label>
                            <input type="text" name="email" id="email"
                                class="text-sm px-6 py-3 border border-zinc-300 rounded-full focus:ring-4 focus:ring-blue-200 focus:border-blue-500"
                                placeholder="Ingresa tu email aquí" autocomplete="off">
                        </div>
                        <div class="flex gap-4 mt-4">
                            <div class="flex flex-col gap-2 flex-1">
                                <label for="password" class="text-start text-zinc-600 text-sm">Contraseña</label>
                                <input type="text" name="password" id="password"
                                    class="text-sm px-6 py-3 border border-zinc-300 rounded-full focus:ring-4 focus:ring-blue-200 focus:border-blue-500"
                                    placeholder="Ingresa tu contraseña aquí" autocomplete="off">
                            </div>
                            <div class="flex flex-col gap-2 flex-1">
                                <label for="confirm_password" class="text-start text-zinc-600 text-sm">Confirmar
                                    contraseña</label>
                                <input type="text" name="confirm_password" id="confirm_password"
                                    class="text-sm px-6 py-3 border border-zinc-300 rounded-full focus:ring-4 focus:ring-blue-200 focus:border-blue-500"
                                    placeholder="Confirma tu contraseña aquí" autocomplete="off">
                            </div>
                        </div>
                        <div class="mt-8 flex items-center justify-center">
                            <x-button type="submit" typeButton="store-gradient" text="Registrarte" />
                        </div>
                        <div class="mt-4
                                flex flex-col">
                            <span class="text-sm text-zinc-500 mt-2">¿Ya tienes una cuenta?
                                <a href="{{ route('login') }}"
                                    class="text-sm text-blue-500 hover:text-blue-700 underline font-semibold">
                                    Iniciar sesión
                                </a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="h-full flex items-center justify-center flex-1"
                style="background-image:url('{{ asset('images/fondo2.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
                <img src="{{ asset('images/logo de entre cheros.png') }}" alt="" class="w-80 h-80 object-cover">
            </div>
        </div>
    </section>
@endsection
