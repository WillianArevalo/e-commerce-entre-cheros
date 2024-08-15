@extends('layouts.login-template')

@section('title', 'Iniciar sesión')

@section('content')
    <section class="flex h-screen w-full items-center justify-center">
        <div class="flex h-full w-full items-center justify-center">
            <div class="flex flex-1 flex-col text-center">
                <div class="px-10">
                    <h1 class="font-primary text-5xl font-bold text-secondary">Registrate</h1>
                </div>
                <div class="mx-auto mt-4 w-4/5 font-secondary">
                    <form action="">
                        <div class="flex gap-4">
                            <div class="flex flex-1 flex-col gap-2">
                                <x-input-store name="name" id="name" label="Nombre"
                                    placeholder="Ingresa tu nombre aquí" autocomplete="off" type="text" />
                            </div>
                            <div class="flex flex-1 flex-col gap-2">
                                <x-input-store name="last_name" id="last_name" label="Apellido"
                                    placeholder="Ingresa tu apellido aquí" autocomplete="off" type="text" />
                            </div>
                        </div>
                        <div class="mt-4 flex gap-4">
                            <div class="flex flex-1 flex-col gap-2">
                                <x-input-store id="birthdate" name="birthdate" autocomplete="off" type="date"
                                    label="Fecha de nacimiento" />
                            </div>
                            <div class="flex flex-1 flex-col gap-2">
                                <x-input-store id="phone" type="text" name="phone"
                                    placeholder="Ingresa tu telefono aquí" label="Telefono" icon="call" />
                            </div>
                            <div class="flex flex-1 flex-col gap-2">
                                <x-select-store label="Género" id="gender" name="gender" :options="['male' => 'Masculino', 'female' => 'Femenino']" />
                            </div>
                        </div>
                        <div class="mt-4 flex flex-1 flex-col gap-2">
                            <x-input-store type="email" name="email" id="email"
                                placeholder="Ingresa tu correo eletrónico" label="Correo electrónico" icon="mail" />
                        </div>
                        <div class="mt-4 flex gap-4">
                            <div class="flex flex-1 flex-col gap-2">
                                <x-input-store type="password" name="password" id="password"
                                    placeholder="Ingresa la contraseña" icon="password" label="Contraseña" />
                            </div>
                            <div class="flex flex-1 flex-col gap-2">
                                <x-input-store type="password" name="confirm-password" id="confirm-password"
                                    placeholder="Ingresa la contraseña" icon="password-validation"
                                    label="Confirmar contraseña" />
                            </div>
                        </div>
                        <div class="mt-8 flex items-center justify-center">
                            <x-button-store type="submit" typeButton="primary" class="px-11 font-bold"
                                text="Registrarte" />
                        </div>
                        <div class="mt-4 flex flex-col">
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
                style="background-image:url('{{ asset('images/fondo2.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
                <img src="{{ asset('images/logo de entre cheros.png') }}" alt="" class="h-80 w-80 object-cover">
            </div>
        </div>
    </section>
@endsection
