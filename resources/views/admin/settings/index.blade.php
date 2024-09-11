@extends('layouts.admin-template')
@section('title', 'Configuración')
@section('content')
    <main class="border-t dark:border-zinc-800">
        <section class="p-4 dark:bg-black">
            <h1 class="dark:text-primary-dark mb-3 bg-opacity-95 text-3xl font-bold uppercase text-primary-600">
                Mi cuenta
            </h1>
            <div class="mb-4 border-b border-zinc-400 dark:border-zinc-800">
                <ul class="-mb-px flex flex-wrap text-center text-sm font-medium" id="default-styled-tab"
                    data-tabs-toggle="#default-styled-tab-content"
                    data-tabs-active-classes="text-primary-600 hover:text-primary-600 dark:text-primary-500 dark:hover:text-primary-500 border-primary-600 dark:border-primary-500"
                    data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                    role="tablist">
                    <li role="presentation">
                        <button class="inline-block rounded-t-lg border-b-4 border-zinc-400 p-4" id="profile-styled-tab"
                            data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">
                            Perfil
                        </button>
                    </li>
                    <li role="presentation">
                        <button
                            class="inline-block rounded-t-lg border-b-4 border-zinc-400 p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300"
                            id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">
                            Cuenta
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block rounded-t-lg border-b-4 border-zinc-400 p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300"
                            id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab"
                            aria-controls="settings" aria-selected="false">
                            Apariencia
                        </button>
                    </li>
                </ul>
            </div>
            <div id="default-styled-tab-content">
                <div class="hidden rounded-lg bg-white dark:bg-black" id="styled-profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    <div class="flex flex-col gap-4 p-4">
                        <h2 class="text-xl font-semibold text-zinc-600 dark:text-zinc-300">
                            Foto de perfil
                        </h2>
                        <div class="flex gap-4">
                            <div class="group relative h-36 w-36 rounded-xl">
                                <img src="{{ Storage::url($user->profile) }}" alt="Photo profile {{ $user->name }}"
                                    class="h-full w-full rounded-full object-cover" id="image-profile">
                                <form action="{{ Route('admin.settings.change-profile') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="photo-profile"
                                        class="absolute inset-0 flex cursor-pointer items-center justify-center rounded-full bg-black bg-opacity-50 text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                        <x-icon icon="edit" class="h-5 w-5" />
                                        <input type="file" name="profile" id="photo-profile" class="hidden" />
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-zinc-400 p-4 dark:border-zinc-800">
                        <h2 class="text-xl font-semibold text-zinc-600 dark:text-zinc-300">
                            Información de seguridad
                        </h2>
                        <div class="mt-4">
                            <h2 class="font-semibold text-zinc-600 dark:text-zinc-200">Correo electrónico</h2>
                            <div class="mt-2 flex gap-2">
                                <div class="w-80">
                                    <x-input type="email" icon="mail" name="email" class=""
                                        value="{{ $user->email }}" />
                                </div>
                                <x-button type="secondary" typeButton="secondary" text="Cambiar correo"
                                    icon="mail-forward" />
                            </div>
                        </div>
                        <div class="mt-4">
                            <h2 class="font-semibold text-zinc-600 dark:text-zinc-200">
                                Contraseña
                            </h2>
                            <div class="mt-2 flex gap-2">
                                <x-button type="button" typeButton="primary" text="Cambiar contraseña"
                                    icon="password-user" />
                            </div>
                            <div class="mt-2">
                                <span class="text-xs uppercase text-zinc-600 dark:text-zinc-200">
                                    Ultima actualización:
                                    {{ $user->updated_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden rounded-lg bg-white dark:bg-black" id="styled-dashboard" role="tabpanel"
                    aria-labelledby="dashboard-tab">
                    <div class="border-t border-zinc-400 dark:border-zinc-800">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold text-zinc-600 dark:text-zinc-300">
                                Información personal
                            </h2>
                            <form action="">
                                <div class="mt-4">
                                    <div class="mt-2">
                                        <div class="w-96">
                                            <x-input type="text" icon="user" name="username"
                                                value="{{ $user->username }}" label="Nombre de usuario" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="flex gap-4">
                                        <div class="flex flex-1 flex-col">
                                            <x-input type="text" name="name" value="{{ $user->name }}"
                                                label="Nombres" />
                                        </div>
                                        <div class="flex flex-1 flex-col">
                                            <x-input type="text" name="last_name" value="{{ $user->last_name }}"
                                                label="Apellidos" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="flex gap-4">
                                        <div class="flex flex-1 flex-col">
                                            <x-input type="text" placeholder="503" label="Código" icon="plus"
                                                name="area_code" value="{{ $user->customer->area_code ?? '' }}" />
                                        </div>
                                        <div class="flex flex-[2] flex-col">
                                            <x-input type="text" placeholder="Telefono" label="Teléfono"
                                                name="phone" value="{{ $user->customer->phone ?? '' }}"
                                                icon="phone" />
                                        </div>
                                        <div class="flex flex-1 flex-col">
                                            <x-input type="date" label="Fecha de cumpleaños" icon="calendar"
                                                name="birthdate" value="{{ $user->customer->birthdate ?? '' }}" />
                                        </div>
                                        <div class="flex flex-1 flex-col">
                                            <x-select label="Género" id="gender" name="gender" :options="['male' => 'Masculino', 'female' => 'Femenino']"
                                                value="{{ $user->customer->gender ?? '' }}"
                                                selected="{{ $user->customer->gender ?? '' }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 flex flex-col gap-4">
                                    <div class="flex w-full gap-4">
                                        <div class="flex flex-[2] flex-col">
                                            <x-input type="text" placeholder="" value="El Salvador" name="country"
                                                label="País" value="{{ old('country') }}" required />
                                        </div>
                                        <div class="flex flex-[2] flex-col">
                                            <x-select label="Tipo de dirección" id="type" name="type"
                                                :options="$addresses" required value="{{ old('type') }}"
                                                selected="{{ old('type') }}" />
                                        </div>
                                    </div>
                                    <div class="flex w-full">
                                        <div class="flex flex-1 flex-col">
                                            <x-input type="text" name="address_line_1" label="Dirección (línea 1)"
                                                value="{{ old('address_line_1') }}" required />
                                        </div>
                                    </div>
                                    <div class="flex w-full">
                                        <div class="flex flex-1 flex-col">
                                            <x-input type="text" name="address_line_2" label="Dirección (línea 2)"
                                                value="{{ old('address_line_2') }}" />
                                        </div>
                                    </div>
                                    <div class="flex w-full gap-4">
                                        <div class="flex flex-1 flex-col">
                                            <x-input type="text" placeholder="Ingresa el estado" label="Estado"
                                                name="state" value="{{ old('state') }}" />
                                        </div>
                                        <div class="flex flex-1 flex-col">
                                            <x-input type="text" placeholder="Ingresa la ciudad" label="Ciudad"
                                                name="city" value="{{ old('city') }}" />
                                        </div>
                                        <div class="flex flex-1 flex-col">
                                            <x-input type="text" placeholder="Ingresa el código postal"
                                                label="Código postal" name="zip_code" required
                                                value="{{ old('zip_code') }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <x-button type="submit" text="Guardar cambios" typeButton="primary"
                                        icon="save" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="hidden rounded-lg bg-white dark:bg-black" id="styled-settings" role="tabpanel"
                    aria-labelledby="settings-tab">
                    <div class="border-t border-zinc-400 dark:border-zinc-800">
                        <div class="ms-4 py-4">
                            <h2 class="text-xl font-semibold text-zinc-600 dark:text-zinc-300">
                                Preferencias
                            </h2>
                            <div class="mt-2 flex gap-2">
                                <div>
                                    <label for="light-theme"
                                        class="flex cursor-pointer items-center gap-2 rounded-lg border border-zinc-400 px-3.5 py-2.5 text-sm font-medium text-zinc-600 transition-colors duration-300 hover:bg-zinc-100 dark:border-zinc-800 dark:text-white dark:hover:bg-zinc-900">
                                        <input type="radio" name="theme" id="light-theme" class="hidden">
                                        <x-icon icon="sun" class="h-5 w-5" />
                                        Claro
                                    </label>
                                </div>
                                <div>
                                    <label for="dark-theme"
                                        class="flex cursor-pointer items-center gap-2 rounded-lg border border-zinc-400 px-3.5 py-2.5 text-sm font-medium text-zinc-600 transition-colors duration-300 hover:bg-zinc-100 dark:border-zinc-800 dark:text-white dark:hover:bg-zinc-900">
                                        <input type="radio" name="theme" id="dark-theme" class="hidden">
                                        <x-icon icon="moon" class="h-5 w-5" />
                                        Oscuro
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 flex gap-2">
                                <div class="flex items-center gap-4">
                                    <p class="text-sm text-zinc-600 dark:text-zinc-300">
                                        Cambiar color de la interfaz:
                                    </p>
                                    <div class="ms-8">
                                        <form action="{{ Route('admin.settings.change-color') }}" method="POST"
                                            class="flex items-center gap-4">
                                            @csrf
                                            <button type="button"
                                                class="theme-button inline-block h-8 w-8 rounded-full bg-[#011b4e] dark:bg-[#138fdc]"
                                                data-color="blue">
                                            </button>
                                            <button type="button" data-color="red"
                                                class="theme-button inline-block h-8 w-8 rounded-full bg-red-600">
                                            </button>
                                            <button type="button"
                                                class="theme-button inline-block h-8 w-8 rounded-full bg-violet-600"
                                                data-color="purple">
                                            </button>
                                            <button type="button" data-color="orange"
                                                class="theme-button inline-block h-8 w-8 rounded-full bg-orange-600">
                                            </button>
                                            <button type="button" data-color="yellow"
                                                class="theme-button inline-block h-8 w-8 rounded-full bg-[#ffe81c]">
                                            </button>
                                            <button type="button" data-color="green"
                                                class="theme-button inline-block h-8 w-8 rounded-full bg-[#34d399]">
                                            </button>
                                            <button type="button" data-color="pink"
                                                class="theme-button inline-block h-8 w-8 rounded-full bg-[#f43f5e]">
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 flex items-center gap-4">
                                <div class="w-60">
                                    <x-select label="Lenguaje" name="language" id="language"
                                        value="{{ $user->locale ?? '' }}" label="Idioma" class="w-80"
                                        :options="[
                                            'en' => 'Inglés',
                                            'es' => 'Epañol',
                                        ]" selected="{{ $user->locale ?? '' }}" />
                                </div>
                                <div class="w-60">
                                    <x-select label="Moneda" name="currency" id="currency"
                                        value="{{ $user->currency ?? '' }}" label="Moneda" class="w-80"
                                        :options="[
                                            'usd' => 'USD',
                                            'euro' => 'Euro',
                                        ]" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
