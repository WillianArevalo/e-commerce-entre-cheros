@extends('layouts.login-template')
@section('title', 'Cambiar contraseña')
@section('content')
    <div class="relative flex h-screen items-center justify-center"
        style="background-image:url('{{ asset('images/fondo6.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
        <section class="z-10 w-4/12 rounded-3xl bg-white p-4 py-10 shadow-lg">
            <div class="text-center">
                <h1 class="text-2xl font-bold text-secondary">Cambiar contraseña</h1>
            </div>
            <form action="{{ Route('account.edit-password') }}" method="POST" class="mx-auto mt-4 flex w-3/4 flex-col gap-4"
                id="formChangePassword">
                @csrf
                <div class="flex flex-col gap-2">
                    <x-input-store type="password" id="password" name="password" label="Contraseña actual"
                        placeholder="Ingresa tu contraseña actual" class="text-zinc-800" icon="password" />
                </div>
                <div class="flex flex-col gap-2">
                    <x-input-store type="password" id="new-password" name="new-password" label="Nueva contraseña"
                        placeholder="Ingresa la nueva contraseña" class="text-zinc-800" icon="password" />
                </div>
                <div class="flex flex-col gap-2">
                    <x-input-store type="password" id="confirm-password" name="confirm-password" label="Confirma contraseña"
                        icon="password-validation" placeholder="Confirma la contraseña" class="text-zinc-800" />
                </div>
                <div class="my-2 flex items-center justify-center">
                    <a href="" class="text-sm font-semibold text-blue-500 underline hover:text-blue-700">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
                <div class="flex items-center justify-center">
                    <x-button-store typeButton="primary" id="btn-change-password" type="button" text="Cambiar contraseña"
                        class="font-medium" icon="reset-password" />
                </div>
            </form>
        </section>
    @endsection
