@extends('layouts.login-template')
@section('title', 'Login | Admin')
@section('content')
    <section class="font-secondary flex h-screen w-full items-center justify-center dark:bg-black">
        <div class="w-full bg-zinc-50 dark:bg-black">
            <div class="mx-auto flex flex-col items-center justify-center px-6 py-8 md:h-screen lg:py-0">
                <div
                    class="w-full rounded-lg bg-white shadow dark:border dark:border-zinc-800 dark:bg-zinc-950 sm:max-w-md md:mt-0 xl:p-0">
                    <div class="space-y-4 p-6 sm:p-8 md:space-y-6">
                        <h1
                            class="text-center text-xl font-bold leading-tight tracking-tight text-primary-950 dark:text-white md:text-2xl">
                            Iniciar sesión
                        </h1>
                        <form class="space-y-4 md:space-y-4" action="{{ route('admin.validate') }}" method="POST">
                            @csrf
                            <div>
                                <x-input type="email" id="email" name="email" icon="mail"
                                    label="Correo electrónico" placeholder="name@example.com" />
                            </div>
                            <div>
                                <x-input type="password" id="password" name="password" icon="password" label="Contraseña"
                                    placeholder="Ingresa tu contraseña" />
                            </div>
                            <div class="flex items-center justify-center">
                                <x-button type="submit" text="Iniciar sesión" icon="login" typeButton="primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
