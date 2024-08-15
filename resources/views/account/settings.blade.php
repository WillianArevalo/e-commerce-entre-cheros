@extends('layouts.__partials.store.template-profile')
@section('profile-content')
    <div class="flex flex-col">
        <div class="py-2">
            <h2 class="font-primary text-2xl font-bold text-secondary">
                Configuración
            </h2>
        </div>
        <div class="border-t border-zinc-200">
            <div class="mt-4 flex flex-col">
                <h3 class="font-semibold text-zinc-700">
                    Datos de seguridad
                </h3>
                <div>
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex gap-2">
                            <h4 class="font-medium text-secondary">Correo electrónico:</h4>
                            <p>{{ $user->email }}</p>
                        </div>
                        <x-button-store type="a" text="Cambiar correo" typeButton="secondary" class="text-xs" />
                    </div>
                    <div>
                        <x-button-store type="a" href="{{ Route('account.change-password') }}"
                            text="Cambiar contraseña" typeButton="secondary" class="w-max px-16 text-xs" />
                    </div>
                </div>
            </div>
            <div class="mt-4 border-t border-zinc-200">
                <div class="flex items-center justify-between pt-4">
                    <h3 class="font-semibold text-zinc-700">Datos personales</h3>
                    <a href="{{ Route('orders') }}"
                        class="group flex items-center justify-center gap-1 text-sm text-zinc-700 hover:font-semibold hover:text-green-500">
                        Editar datos
                        <x-icon-store icon="arrow-right-02"
                            class="h-4 w-4 text-current transition-transform duration-300 ease-in-out group-hover:translate-x-1" />
                    </a>
                </div>
                <div class="mt-2 flex flex-col gap-3 text-sm">
                    <div class="flex justify-between">
                        <div class="flex gap-2">
                            <h4 class="font-medium text-secondary">Usuario:</h4>
                            <p>{{ $user->username }}</p>
                        </div>
                        <div class="flex gap-2">
                            <h4 class="font-medium text-secondary">Nombres:</h4>
                            <p>{{ $user->name }}</p>
                        </div>
                        <div class="flex gap-2">
                            <h4 class="font-medium text-secondary">Apellidos:</h4>
                            <p>{{ $user->last_name }}</p>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex items-center gap-2">
                            <h4 class="font-medium text-secondary">Género:</h4>
                            <span class="flex items-center gap-1">
                                @if ($user->customer)
                                    @if ($user->customer->gender === 'female')
                                        <x-icon-store icon="female" class="h-6 w-6 text-rose-500" />
                                        Femenino
                                    @else
                                        <x-icon-store icon="male" class="h-5 w-5 text-primary" />
                                        Masculino
                                    @endif
                                @else
                                    No definido
                                @endif
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <h4 class="font-medium text-secondary">Telefono:</h4>
                            <p>{{ $user->customer->phone ?? 'No definido' }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <h4 class="font-medium text-secondary">Fecha de nacimiento:</h4>
                            <p>{{ isset($user->customer->birthdate) ? \Carbon\Carbon::parse($user->customer->birthdate)->format('d M, Y') : 'Sin definir' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
