@extends('layouts.__partials.store.template-profile')
@section('profile-content')
    <div class="mb-4 flex flex-col">
        <div class="py-2">
            <h2 class="font-league-spartan text-3xl font-bold text-secondary">
                Editar datos
            </h2>
        </div>
        <div class="border-t border-zinc-400">
            <form action="{{ route('account.settings-update') }}" method="POST" class="mt-4">
                @csrf
                <div class="flex">
                    <div class="flex flex-1 flex-col gap-2">
                        <x-input-store type="text" label="Nombre" placeholder="Nombre" value="{{ $user->name }}"
                            name="name" />
                    </div>
                </div>
                <div class="mt-4 flex">
                    <div class="flex flex-1 flex-col gap-2">
                        <x-input-store type="text" label="Apellido" placeholder="Apellido" value="{{ $user->last_name }}"
                            name="last_name" />
                    </div>
                </div>
                <div class="mt-4 flex flex-col gap-4 md:flex-row">
                    <div class="flex flex-1 flex-col gap-2">
                        <x-input-store type="text" label="Usuario" placeholder="Usuario" value="{{ $user->username }}"
                            icon="user" name="username" />
                    </div>
                    <div class="flex flex-1 flex-col gap-4 sm:flex-row">
                        <div class="flex flex-1 flex-col gap-2">
                            <x-input-store type="text" placeholder="503" label="Código" icon="plus" name="area_code"
                                value="{{ optional($user->customer)->area_code ?? '' }}" />
                        </div>
                        <div class="flex flex-[2] flex-col gap-2">
                            <x-input-store type="text" placeholder="Teléfono" label="Teléfono" name="phone"
                                value="{{ optional($user->customer)->phone ?? '' }}" icon="call" />
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex flex-col gap-4 md:flex-row">
                    <div class="flex flex-1 flex-col gap-2">
                        <x-select-store label="Género" id="gender" name="gender" :options="['male' => 'Masculino', 'female' => 'Femenino']"
                            value="{{ optional($user->customer)->gender ?? '' }}"
                            selected="{{ optional($user->customer)->gender ?? '' }}" />
                    </div>
                    <div class="relative flex flex-1 flex-col gap-2">
                        <x-input-store type="text" label="Fecha de nacimiento" placeholder="Fecha de nacimiento"
                            value="{{ optional($user->customer)->birthdate ?? '' }}" icon="calendar" id="date-input"
                            autocomplete="off" name="birthdate" />
                        <div id="calendar"
                            class="absolute top-20 z-50 mt-2 hidden rounded-md border bg-white p-4 shadow-lg">
                        </div>
                    </div>
                </div>
                <div class="flex justify-center md:justify-start">
                    <x-button-store type="submit" text="Guardar cambios" typeButton="primary"
                        class="mt-4 w-max font-semibold" />
                </div>
            </form>
        </div>
    </div>
@endsection
