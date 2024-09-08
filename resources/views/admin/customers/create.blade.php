@extends('layouts.admin-template')
@section('title', 'Nuevo cliente')
@section('content')
    <div>
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Nuevo cliente',
            'text' => 'Regresar a la lista de clientes',
            'url' => route('admin.customers.index'),
        ])
        <div class="bg-white p-4 dark:bg-black">
            <div class="mx-auto w-full">
                <div class="flex flex-col gap-1">
                    <h2 class="text-lg font-bold uppercase text-zinc-700 dark:text-zinc-300">Información del cliente</h2>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">
                        Los campos marcados con <span class="text-red-500">*</span> son obligatorios
                    </p>
                </div>
                <div class="mt-4 flex flex-col">
                    <form action="{{ route('admin.customers.store') }}" class="flex flex-col gap-4"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="flex flex-1 flex-col gap-4">
                            <div
                                class="flex flex-col gap-4 rounded-lg border border-zinc-400 bg-white p-4 dark:border-zinc-800 dark:bg-black">
                                <div class="w-3/12">
                                    <x-select label="Usuario" text="Seleccionar usuario existente" id="user_id"
                                        name="user_id" required :options="$users->pluck('email', 'id')->toArray()" />
                                </div>
                                <div class="w-max">
                                    <x-button type="a" href="{{ Route('admin.users.create') }}" icon="user-plus"
                                        text="Crear usuario" typeButton="secondary" />
                                </div>
                            </div>
                            <div class="rounded-lg border border-zinc-400 bg-white p-4 dark:border-zinc-800 dark:bg-black">
                                <h2 class="mb-2 text-base font-semibold text-black dark:text-white">
                                    Información general
                                </h2>
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <x-input label="Nombre" type="text" id="name" name="name"
                                            placeholder="Ingresa el nombre del cliente" value="{{ old('name') }}"
                                            required />
                                    </div>
                                    <div class="flex-1">
                                        <x-input label="Apellido" type="text" id="last_name" name="last_name"
                                            placeholder="Ingresa el apellido del cliente" value="{{ old('last_name') }}"
                                            required />
                                    </div>
                                </div>
                                <div class="mt-4 flex gap-4">
                                    <div class="flex-1">
                                        <x-input icon="calendar" label="Fecha de nacimiento" type="date" id="birthdate"
                                            name="birthdate" value="{{ old('birthdate') }}" required />
                                    </div>
                                    <div class="flex flex-[2] gap-4">
                                        <div class="flex-1">
                                            <x-input label="Código de área" type="text" icon="plus" name="area_code"
                                                value="{{ old('area_code') }}" placeholder="503" required />
                                        </div>
                                        <div class="flex-[2]">
                                            <x-input label="Telefono" type="text" id="phone" name="phone"
                                                value="{{ old('phone') }}" icon="phone"
                                                placeholder="Ingresa el telefono del cliente" required />
                                        </div>
                                    </div>
                                    <div class="w-max flex-1">
                                        <x-select label="Sexo" id="gender" name="gender" value="male" selected=""
                                            :options="['male' => 'Masculino', 'female' => 'Femenino']" />
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-lg border border-zinc-400 bg-white p-4 dark:border-zinc-800 dark:bg-black">
                                <h2 class="mb-2 text-base font-semibold text-black dark:text-white">
                                    Dirección
                                </h2>
                                <div class="flex flex-col gap-4">
                                    <div class="flex flex-1 gap-4">
                                        <div class="flex-1">
                                            <x-select label="Tipo de dirección" id="address_type" name="type" required
                                                :options="$addresses" />
                                        </div>
                                        <div class="flex-[3]">
                                            <x-input label="Dirección (línea 1)" type="text" id="address_line_1"
                                                name="address_line_1" icon="location"
                                                placeholder="Ingresa la primera línea de la dirección" required />
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <x-input label="Dirección (línea 2)" type="text" id="address_line_2"
                                            name="address_line_2" icon="location"
                                            placeholder="Ingresa la segunda línea de la dirección" required />
                                    </div>
                                </div>
                                <div class="mt-4 flex gap-4">
                                    <div class="flex-[2]">
                                        <x-select type="text" label="País" id="country" name="country"
                                            :options="$countries" required />
                                    </div>
                                    <div class="w-max flex-[2]">
                                        <x-input type="text" label="Estado" id="state" name="state"
                                            placeholder="Ingresa el estado del país" required />
                                    </div>
                                    <div class="flex-1">
                                        <x-input label="Código postal" type="text" id="zip_code" name="zip_code"
                                            placeholder="####" required />
                                    </div>
                                </div>
                                <div class="mt-4 flex gap-4">
                                    <div class="w-1/2">
                                        <x-input type="text" label="Ciudad" id="city" name="city"
                                            placeholder="Ingresa la ciudad del país" required />
                                    </div>
                                </div>
                                <div class="mt-4 flex gap-10">
                                    <div>
                                        <x-input type="checkbox" label="Dirección por defecto" id="default"
                                            name="default" />
                                    </div>
                                    <div>
                                        <x-input type="checkbox" label="Activa" id="status" name="status" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center gap-2">
                            <x-button type="submit" text="Agregar cliente" icon="plus" typeButton="primary" />
                            <x-button type="a" href="{{ url()->previous() }}" text="Regresar"
                                typeButton="secondary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
