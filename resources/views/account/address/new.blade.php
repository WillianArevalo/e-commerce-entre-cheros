@extends('layouts.__partials.store.template-profile')
@section('profile-content')
    <div class="flex flex-col">
        <div class="flex justify-between py-2">
            <h2 class="font-league-spartan text-3xl font-bold text-secondary">
                Nueva dirección
            </h2>
            <a href="{{ Route('account.addresses.index') }}"
                class="group flex items-center justify-center gap-1 text-sm font-medium text-zinc-500 transition-transform duration-300 ease-in-out hover:scale-105 hover:font-semibold hover:text-zinc-700">
                <x-icon-store icon="return" class="h-4 w-4 text-current" />
                Regresar
            </a>
        </div>
        <div class="border-t border-zinc-400">
            <form action="{{ Route('account.addresses.store') }}" method="POST" class="mt-4">
                @csrf
                <div class="flex flex-col gap-4">
                    <div class="flex w-full flex-col gap-4 sm:flex-row">
                        <div class="flex flex-[2] flex-col gap-2">
                            <x-input-store type="text" placeholder="" value="El Salvador" name="country" label="País"
                                value="{{ old('country') }}" required />
                        </div>
                        <div class="flex flex-[2] flex-col gap-2">
                            <x-select-store label="Tipo de dirección" id="type" name="type" :options="$addresses"
                                required value="{{ old('type') }}" selected="{{ old('type') }}" />
                        </div>
                    </div>
                    <div class="flex w-full">
                        <div class="flex flex-1 flex-col gap-2">
                            <x-input-store type="text" name="address_line_1" label="Dirección (línea 1)"
                                value="{{ old('address_line_1') }}" required />
                        </div>
                    </div>
                    <div class="flex w-full">
                        <div class="flex flex-1 flex-col gap-2">
                            <x-input-store type="text" name="address_line_2" label="Dirección (línea 2)"
                                value="{{ old('address_line_2') }}" />
                        </div>
                    </div>
                    <div class="flex w-full flex-col gap-4 sm:flex-row">
                        <div class="flex flex-1 flex-col gap-2">
                            <x-input-store type="text" placeholder="Ingresa el estado" label="Estado" name="state"
                                value="{{ old('state') }}" />
                        </div>
                        <div class="flex flex-1 flex-col gap-2">
                            <x-input-store type="text" placeholder="Ingresa la ciudad" label="Ciudad" name="city"
                                value="{{ old('city') }}" />
                        </div>
                        <div class="flex flex-1 flex-col gap-2">
                            <x-input-store type="text" placeholder="Ingresa el código postal" label="Código postal"
                                name="zip_code" required value="{{ old('zip_code') }}" />
                        </div>
                    </div>
                </div>
                <div class="my-4 flex items-center justify-center sm:justify-start">
                    <x-button-store type="submit" text="Guardar dirección" icon="check" class="w-max font-bold"
                        typeButton="primary" />
                </div>
            </form>
        </div>
    @endsection
