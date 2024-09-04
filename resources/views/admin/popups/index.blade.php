@extends('layouts.admin-template')

@section('title', 'Anuncios')

@section('content')
    <div>
        @include('layouts.__partials.admin.header-page', [
            'title' => 'Anuncios',
            'description' => 'Administrar los anuncios (popups) que se muestran al abrir la página.',
        ])
        <div class="bg-zinc-50 dark:bg-black">
            <div class="mx-auto w-full">
                <div class="relative overflow-hidden bg-white dark:bg-black">
                    <div
                        class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-x-4 md:space-y-0">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" action="{{ route('admin.categories.search') }}"
                                id="formSearchCategorie">
                                @csrf
                                <x-input type="text" id="inputSearch" name="inputSearch" data-form="#formSearchCategorie"
                                    data-table="#tableCategorie" placeholder="Buscar" icon="search" />
                            </form>
                        </div>
                        <div
                            class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0">
                            <x-button type="a" typeButton="primary" href="{{ route('admin.popups.create') }}"
                                text="Agregar anuncio" icon="plus" />
                        </div>
                    </div>
                    <div class="mx-4 mb-4 overflow-hidden rounded-lg border border-zinc-400 dark:border-zinc-800">
                        <table class="w-full text-left text-sm text-zinc-500 dark:text-zinc-400">
                            <thead
                                class="border-b border-zinc-400 bg-zinc-50 text-xs uppercase text-zinc-700 dark:border-zinc-800 dark:bg-black dark:text-zinc-300">
                                <tr>
                                    <th scope="col" class="w-10 border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        <x-icon icon="hash" class="h-4 w-4" />
                                    </th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Nombre</th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Estado</th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">Tipo
                                    </th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">Link
                                    </th>
                                    <th scope="col" class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($popups->count() > 0)
                                    @foreach ($popups as $popup)
                                        <tr class="hover:bg-zinc-100 dark:hover:bg-zinc-950">
                                            <td class="px-4 py-3">
                                                <span>{{ $loop->iteration }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span>{{ $popup->name }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                @if ($popup->active === 1)
                                                    <span
                                                        class="font-secondary rounded-full border-2 border-green-300 bg-green-200 px-4 py-1 text-xs font-medium text-green-800 dark:border-green-400 dark:bg-green-800 dark:text-green-100">Activo</span>
                                                @else
                                                    <span
                                                        class="font-secondary rounded-full border-2 border-red-300 bg-red-200 px-4 py-1 text-xs font-medium text-red-800 dark:border-red-400 dark:bg-red-800 dark:text-red-100">
                                                        Inactivo
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-3">
                                                @if ($popup->type === 'redirect')
                                                    Redirección
                                                @else
                                                    Post
                                                @endif
                                            </td>
                                            <td class="px-4 py-3">
                                                <span>{{ $popup->link }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex gap-2">
                                                    <x-button type="button" class="editPopup"
                                                        data-href="{{ route('admin.categories.edit', $popup->id) }}"
                                                        data-action="{{ route('admin.categories.update', $popup->id) }}"
                                                        onlyIcon="true" icon="edit" typeButton="success" />
                                                    <form action="{{ route('admin.popups.destroy', $popup->id) }}"
                                                        id="formDeletePopup-{{ $popup->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button"
                                                            data-form="formDeletePopup-{{ $popup->id }}" onlyIcon="true"
                                                            icon="delete" typeButton="danger" class="buttonDelete" />
                                                    </form>
                                                    <x-button type="button" class="showPopup"
                                                        data-action="{{ route('admin.popups.show', $popup->id) }}"
                                                        onlyIcon="true" icon="view" typeButton="secondary" />
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="px-4 py-3 text-center">
                                            <span>No hay anuncios registrados</span>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar el anuncio?"
                message="No podrás recuperar este registro" action="" />
            <div id="previewPopup"
                class="fixed inset-0 z-50 hidden h-screen items-center justify-center bg-black bg-opacity-70">
            </div>
        </div>
    </div>
@endsection
