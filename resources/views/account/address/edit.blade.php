@extends('layouts.__partials.store.template-profile')
@section('profile-content')
    <div class="flex flex-col">
        <div class="py-2">
            <h2 class="font-league-spartan text-3xl font-bold text-secondary">
                Editar dirección
            </h2>
        </div>
        <div class="border-t border-zinc-400">
            <form action="{{ Route('account.addresses.update', $address->id) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-4">
                    <div class="flex w-full flex-col gap-4 sm:flex-row">
                        <div class="flex flex-[2] flex-col gap-2">
                            <x-input-store type="text" placeholder="" value="El Salvador" name="country" label="País"
                                value="{{ $address->country }}" required />
                        </div>
                        <div class="flex flex-[2] flex-col gap-2">
                            <x-select-store label="Tipo de dirección" id="type" name="type" :options="$addresses"
                                required value="{{ $address->type }}" selected="{{ $address->type }}" />
                        </div>
                    </div>
                    <div class="flex w-full">
                        <div class="flex flex-1 flex-col gap-2">
                            <x-input-store type="text" name="address_line_1" label="Dirección (línea 1)"
                                value="{{ $address->address_line_1 }}" required />
                        </div>
                    </div>
                    <div class="flex w-full">
                        <div class="flex flex-1 flex-col gap-2">
                            <x-input-store type="text" name="address_line_2" label="Dirección (línea 2)"
                                value="{{ $address->address_line_2 }}" />
                        </div>
                    </div>
                    <div class="flex w-full flex-col gap-4 sm:flex-row">
                        <div class="flex flex-1 flex-col gap-2">
                            <x-input-store type="text" placeholder="Ingresa el estado" label="Estado" name="state"
                                value="{{ $address->state ?? '' }}" />
                        </div>
                        <div class="flex flex-1 flex-col gap-2">
                            <x-input-store type="text" placeholder="Ingresa la ciudad" label="Ciudad" name="city"
                                value="{{ $address->city ?? '' }}" />
                        </div>
                        <div class="flex flex-1 flex-col gap-2">
                            <x-input-store type="text" placeholder="Ingresa el código postal" label="Código postal"
                                name="zip_code" required value="{{ $address->zip_code ?? '' }}" />
                        </div>
                    </div>
                </div>
                <div class="my-4 flex items-center justify-center gap-4">
                    <x-button-store type="submit" text="Editar dirección" icon="edit-01" class="w-max text-sm"
                        typeButton="primary" />
                    <x-button-store type="a" href="{{ Route('account.addresses.index') }}" text="Regresar"
                        icon="return" class="w-max text-sm" typeButton="secondary" />
                </div>
            </form>
        </div>
    @endsection
