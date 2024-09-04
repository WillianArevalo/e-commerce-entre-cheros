@extends('layouts.__partials.store.template-profile')
@section('profile-content')
    <div class="flex flex-col">
        <div class="py-2">
            <h2 class="text-secondary font-league-spartan text-3xl font-bold">
                Editar datos
            </h2>
        </div>
        <div class="border-t border-zinc-400">
            <form action="{{ Route('account.settings-update') }}" method="POST" class="mt-4">
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
                <div class="mt-4 flex gap-4">
                    <div class="flex flex-1 flex-col gap-2">
                        <x-input-store type="text" label="Usuario" placeholder="Usuario" value="{{ $user->username }}"
                            icon="user" name="username" />
                    </div>
                    <div class="flex flex-1 gap-4">
                        <div class="flex flex-1 flex-col gap-2">
                            <x-input-store type="text" placeholder="503" label="Código" icon="plus" name="area_code"
                                value="{{ $user->customer->area_code ?? '' }}" />
                        </div>
                        <div class="flex flex-[2] flex-col gap-2">
                            <x-input-store type="text" placeholder="Telefono" label="Teléfono" name="phone"
                                value="{{ $user->customer->phone ?? '' }}" icon="call" />
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex gap-4">
                    <div class="flex flex-1 flex-col gap-2">
                        <x-select-store label="Género" id="gender" name="gender" :options="['male' => 'Masculino', 'female' => 'Femenino']"
                            value="{{ $user->customer->gender }}" selected="{{ $user->customer->gender }}" />
                    </div>
                    <div class="relative flex flex-1 flex-col gap-2">
                        <x-input-store type="text" label="Fecha de nacimiento" placeholder="Fecha de nacimiento"
                            value="{{ $user->customer->birthdate ?? '' }}" icon="calendar" id="date-input"
                            autocomplete="off" name="birthdate" />
                        <div id="calendar"
                            class="absolute top-20 z-50 mt-2 hidden rounded-md border bg-white p-4 shadow-lg">
                        </div>
                    </div>
                </div>
                <div class="">
                    <x-button-store type="submit" text="Guardar cambios" typeButton="primary"
                        class="mt-4 w-max font-semibold" />
                </div>
            </form>
        </div>
    </div>
@endsection
