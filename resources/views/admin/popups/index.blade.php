@extends('layouts.admin-template')

@section('title', 'Anuncios')

@section('content')
    <div class=" rounded-lg dark:border-zinc-900 mt-4">
        <div class="dark:bg-black py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-zinc-900">
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Administrar anuncios
            </h1>
            <p class="text-sm text-gray-400">
                Desde aquí puedes administrar los anuncios que se muestran en la página principal
            </p>
        </div>
        <div class="bg-gray-50 dark:bg-black p-4">
            <div class="mx-auto w-full">
                <div
                    class="bg-white dark:bg-black dark:border dark:border-zinc-900 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" action="{{ route('admin.categories.search') }}"
                                id="formSearchCategorie">
                                @csrf
                                <x-input type="text" id="inputSearch" name="inputSearch" data-form="#formSearchCategorie"
                                    data-table="#tableCategorie" placeholder="Buscar" icon="search" />
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <x-button type="a" typeButton="blue" href="{{ route('admin.popups.create') }}"
                                text="Agregar anuncio" icon="add-circle" />
                        </div>
                    </div>
                    <div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-x-auto">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-zinc-900 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">#</th>
                                    <th scope="col" class="px-4 py-3">Nombre</th>
                                    <th scope="col" class="px-4 py-3">Estado</th>
                                    <th scope="col" class="px-4 py-3"></th>
                                    <th scope="col" class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($popups->count() > 0)
                                    @foreach ($popups as $popup)
                                        <tr>
                                            <td class="px-4 py-3">
                                                <span>{{ $loop->iteration }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span>{{ $popup->name }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex gap-2">
                                                    <x-button type="button" class="editCategorie"
                                                        data-href="{{ route('admin.categories.edit', $popup->id) }}"
                                                        data-action="{{ route('admin.categories.update', $popup->id) }}"
                                                        text="Editar" icon="edit" typeButton="success" />
                                                    <form action="{{ route('admin.categories.destroy', $popup->id) }}"
                                                        id="formDeleteCategorie" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button" data-form="formDeleteCategorie"
                                                            text="Eliminar" icon="delete" typeButton="danger"
                                                            class="buttonDelete" />
                                                    </form>
                                                    <x-button type="button" class="showPopup"
                                                        data-action="{{ route('admin.popups.show', $popup->id) }}"
                                                        text="Visualizar" icon="view" typeButton="secondary" />
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar la oferta?"
                message="No podrás recuperar este registro" action="" />
            <div id="previewPopup"
                class="hidden fixed inset-0 z-50 bg-black bg-opacity-70 h-screen items-center justify-center">
            </div>
        </div>
    </div>
@endsection
