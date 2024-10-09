@extends('layouts.__partials.store.template-profile')
@section('profile-content')
    <div class="mb-6 flex flex-col">
        <div class="py-2">
            <h2 class="font-league-spartan text-3xl font-bold text-secondary">
                Configuración
            </h2>
        </div>
        <div class="border-t border-zinc-400">
            <div class="mt-4 flex flex-col">
                <h3 class="text-base font-semibold text-zinc-700 sm:text-lg">
                    Datos de seguridad
                </h3>
                <div class="mt-2">
                    <div class="flex flex-col text-sm sm:text-base">
                        <div class="flex gap-2">
                            <h4 class="font-medium text-secondary">Correo electrónico:</h4>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="mt-2">
                            <x-button-store type="a" icon="recovery-mail" text="Cambiar correo" typeButton="secondary"
                                class="w-max" />
                        </div>
                    </div>
                    <div class="mt-4 text-sm sm:text-base">
                        <div class="flex items-center gap-2">
                            <h4 class="font-medium text-secondary">Contraseña:</h4>
                            <div class="flex items-center gap-1">
                                <div class="h-1.5 w-1.5 rounded-full bg-zinc-800"></div>
                                <div class="h-1.5 w-1.5 rounded-full bg-zinc-800"></div>
                                <div class="h-1.5 w-1.5 rounded-full bg-zinc-800"></div>
                                <div class="h-1.5 w-1.5 rounded-full bg-zinc-800"></div>
                                <div class="h-1.5 w-1.5 rounded-full bg-zinc-800"></div>
                                <div class="h-1.5 w-1.5 rounded-full bg-zinc-800"></div>
                                <div class="h-1.5 w-1.5 rounded-full bg-zinc-800"></div>
                                <div class="h-1.5 w-1.5 rounded-full bg-zinc-800"></div>
                            </div>
                        </div>
                        <div class="mt-1">
                            <p class="text-xs text-zinc-600">
                                Última actualización:
                                {{ $user->updated_at->diffForHumans() }}
                            </p>
                        </div>
                        <div class="mt-4">
                            <x-button-store type="a" href="{{ Route('account.change-password') }}"
                                text="Cambiar contraseña" icon="reset-password" typeButton="secondary"
                                class="w-max px-16" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 border-t border-zinc-400">
                <div class="flex items-center justify-between pt-4">
                    <h3 class="text-base font-semibold text-zinc-700 sm:text-lg">Datos personales</h3>
                    <a href="{{ Route('account.settings-edit') }}"
                        class="group flex items-center justify-center gap-1 text-sm text-zinc-700 hover:font-semibold hover:text-green-500">
                        Editar datos
                        <x-icon-store icon="arrow-right-02"
                            class="h-4 w-4 text-current transition-transform duration-300 ease-in-out group-hover:translate-x-1" />
                    </a>
                </div>
                <div class="mt-2 flex flex-col gap-3 text-sm sm:text-base">
                    <div class="flex gap-2">
                        <h4 class="font-medium text-secondary">Usuario:</h4>
                        <p class="text-zinc-800">{{ $user->username }}</p>
                    </div>
                    <div class="flex gap-2">
                        <h4 class="font-medium text-secondary">Nombres:</h4>
                        <p class="text-zinc-800">{{ $user->name }}</p>
                    </div>
                    <div class="flex gap-2">
                        <h4 class="font-medium text-secondary">Apellidos:</h4>
                        <p class="text-zinc-800">{{ $user->last_name }}</p>
                    </div>
                    <div class="flex flex-col justify-between gap-2 sm:flex-row sm:gap-0">
                        <div class="flex items-center gap-2">
                            <h4 class="font-medium text-secondary">Género:</h4>
                            <span class="flex items-center gap-1 text-zinc-800">
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
                            <p class="text-zinc-800">{{ $user->customer->phone ?? 'No definido' }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <h4 class="font-medium text-secondary">Fecha de nacimiento:</h4>
                            <p class="text-zinc-800">
                                {{ isset($user->customer->birthdate) ? \Carbon\Carbon::parse($user->customer->birthdate)->format('d M, Y') : 'Sin definir' }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="flex items-center justify-between pt-4">
                            <h3 class="text-base font-semibold text-zinc-700 sm:text-lg">
                                Dirección
                            </h3>
                            @if ($user->customer && $user->customer->address)
                                <a href="{{ Route('account.addresses.index') }}"
                                    class="group flex items-center justify-center gap-1 text-sm text-zinc-700 hover:font-semibold hover:text-green-500">
                                    Editar dirección
                                    <x-icon-store icon="arrow-right-02"
                                        class="h-4 w-4 text-current transition-transform duration-300 ease-in-out group-hover:translate-x-1" />
                                </a>
                            @else
                                <a href="{{ Route('account.addresses.create') }}"
                                    class="group flex items-center justify-center gap-1 text-sm text-zinc-700 hover:font-semibold hover:text-blue-500">
                                    Agregar dirección
                                    <x-icon-store icon="arrow-right-02"
                                        class="h-4 w-4 text-current transition-transform duration-300 ease-in-out group-hover:translate-x-1" />
                                </a>
                            @endif

                        </div>
                        @if ($user->customer && $user->customer->address)
                            <div class="mt-3 flex gap-2">
                                <h4 class="font-medium text-secondary">País:</h4>
                                <p class="text-zinc-800">
                                    {{ $user->customer->address->country }}
                                </p>
                            </div>
                            <div class="mt-3 flex gap-2">
                                <h4 class="font-medium text-secondary">Dirección:</h4>
                                <p class="text-zinc-800">
                                    {{ $user->customer->address->address_line_1 . ', ' . $user->customer->address->address_line_2 }}
                                </p>
                            </div>
                            <div class="mt-3 flex gap-2">
                                <h4 class="font-medium text-secondary">Código postal:</h4>
                                <p class="text-zinc-800">
                                    {{ $user->customer->address->zip_code }}
                                </p>
                            </div>
                            <div class="mt-3 flex gap-2">
                                <h4 class="font-medium text-secondary">Estado:</h4>
                                <p class="text-zinc-800">
                                    {{ $user->customer->address->state ?? '---' }}
                                </p>
                            </div>
                            <div class="mt-3 flex gap-2">
                                <h4 class="font-medium text-secondary">Ciudad:</h4>
                                <p class="text-zinc-800">
                                    {{ $user->customer->address->city ?? '---' }}
                                </p>
                            </div>
                        @else
                            <div class="mt-3 rounded-xl border-2 border-dashed border-zinc-300 bg-zinc-100 p-8 text-sm">
                                <p class="text-center text-zinc-800">
                                    No has definido una dirección
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
