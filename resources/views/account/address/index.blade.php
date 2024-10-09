@extends('layouts.__partials.store.template-profile')
@section('profile-content')
    <div class="flex flex-col">
        <div class="py-2">
            <h2 class="font-league-spartan text-3xl font-bold text-secondary">
                Direcciones
            </h2>
        </div>
        <div class="border-t border-zinc-400">
            @if ($addresses->count() > 0)
                @foreach ($addresses as $address)
                    <div class="mt-6 flex flex-col">
                        <div class="flex items-center justify-between">
                            <h3 class="flex items-center gap-2 text-base font-semibold text-zinc-700 sm:text-lg">
                                <x-icon-store icon="location" class="h-6 w-6 text-zinc-500" />
                                {{ App\Utils\Addresses::getAddress($address->type) }}
                            </h3>
                            <div class="flex items-center gap-6">
                                <form action="{{ Route('account.addresses.destroy', $address->id) }}" method="POST"
                                    id="formDeleteAddress-{{ $address->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="buttonDelete group flex items-center justify-center gap-1 text-sm font-medium text-red-500 transition-transform duration-300 ease-in-out hover:scale-105 hover:font-semibold hover:text-red-700"
                                        data-form="formDeleteAddress-{{ $address->id }}">
                                        Eliminar
                                        <x-icon-store icon="delete" class="h-4 w-4 text-current" />
                                    </button>
                                </form>
                                <a href="{{ Route('account.addresses.edit', $address->slug) }}"
                                    class="group flex items-center justify-center gap-1 text-sm font-medium text-green-500 transition-transform duration-300 ease-in-out hover:scale-105 hover:font-semibold hover:text-green-700">
                                    Editar
                                    <x-icon-store icon="edit-01" class="h-4 w-4 text-current" />
                                </a>
                            </div>
                        </div>
                        <div class="ms-8 mt-4 text-sm sm:text-base">
                            <div class="flex flex-col gap-4">
                                <div class="flex gap-2">
                                    <h4 class="font-medium text-secondary">País:</h4>
                                    <p>{{ $address->country ?? '---' }}</p>
                                </div>
                                <div class="flex gap-2">
                                    <h4 class="font-medium text-secondary">Dirección (línea 1):</h4>
                                    <p>{{ $address->address_line_1 ?? '---' }}</p>
                                </div>
                                <div class="flex gap-2">
                                    <h4 class="font-medium text-secondary">Dirección (línea 2):</h4>
                                    <p>{{ $address->address_line_2 ?? '---' }}</p>
                                </div>
                                <div class="justify-cetner flex gap-8">
                                    <div class="flex gap-2">
                                        <h4 class="font-medium text-secondary">Ciudad:</h4>
                                        <p>{{ $address->city ?? '---' }}</p>
                                    </div>
                                    <div class="flex gap-2">
                                        <h4 class="font-medium text-secondary">Estado:</h4>
                                        <p>{{ $address->state ?? '---' }}</p>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <h4 class="font-medium text-secondary">Código postal:</h4>
                                    <p>{{ $address->zip_code ?? '---' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="my-10 flex flex-col">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base text-zinc-700">
                            No hay direcciones registradas
                        </h3>
                    </div>
                </div>
            @endif
            <div class="mb-4 mt-4 flex justify-center border-t border-zinc-400 pt-4 sm:justify-start">
                <x-button-store type="a" href="{{ Route('account.addresses.create') }}"
                    text="Agregar nueva dirección" icon="plus" class="w-max" typeButton="secondary" />
            </div>
        </div>
    </div>

    <!--Modal -->
    <div class="deleteModal fixed inset-0 z-50 hidden items-center justify-center bg-zinc-800 bg-opacity-75 transition-opacity"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center px-4 pb-20 pt-4 text-center sm:block sm:p-0">
            <div class="inline-block transform animate-jump-in overflow-hidden rounded-xl bg-white text-left align-bottom shadow-xl transition-all animate-duration-300 animate-once sm:my-8 sm:w-full sm:max-w-lg sm:align-middle"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <x-icon-store icon="alert" class="h-6 w-6 text-red-600" />
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-headline">
                                Eliminar dirección
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    ¿Estás seguro de que deseas eliminar esta dirección? Todos los datos relacionados con
                                    esta dirección se eliminarán. Esta acción no se puede deshacer.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-4 bg-gray-50 px-4 py-3">
                    <x-button-store type="button" text="Cancelar" icon="cancel" class="closeModal w-max text-sm"
                        typeButton="secondary" />
                    <x-button-store type="button" text="Sí, eliminar" icon="delete" class="confirmDelete w-max text-sm"
                        typeButton="danger" />
                </div>
            </div>
        </div>
    </div>


@endsection
