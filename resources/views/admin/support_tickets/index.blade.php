@extends('layouts.admin-template')

@section('title', 'Tickets de soporte')

@section('content')
    <div class="mt-4 rounded-lg">
        <div class="flex flex-col items-start border-y px-4 py-4 shadow-sm dark:border-zinc-800 dark:bg-black">
            <h1 class="font-secondary text-2xl font-bold text-secondary dark:text-blue-400">
                Tickets de soporte
            </h1>
            <p class="text-sm text-zinc-400">
                Administra los tickets de soporte de los usuarios
            </p>
        </div>
        <div class="bg-zinc-50 p-4 dark:bg-black">
            <div class="mx-auto w-full">
                <div class="relative bg-white shadow-md dark:border dark:border-zinc-800 dark:bg-black sm:rounded-lg">
                    <div class="mb-4 border-b border-zinc-400 dark:border-zinc-800">
                        <ul class="-mb-px flex flex-wrap text-center text-sm font-medium" id="default-tab"
                            data-tabs-toggle="#default-tab-content" role="tablist">
                            <li class="me-2" role="presentation">
                                <button class="inline-block rounded-t-lg border-b-2 p-4" id="profile-tab"
                                    data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">
                                    <div
                                        class="flex items-center justify-center gap-2 rounded-full bg-black px-3 py-2 text-white dark:bg-white dark:text-black">
                                        Todos los tickets
                                        <span
                                            class="flex h-6 w-6 items-center justify-center rounded-full bg-red-500 text-white">
                                            2
                                        </span>
                                    </div>
                                </button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button
                                    class="inline-block rounded-t-lg border-b-2 p-4 hover:border-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-300"
                                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                    aria-controls="dashboard" aria-selected="false">
                                    <div
                                        class="flex items-center justify-center gap-2 rounded-full border border-zinc-400 bg-white px-3 py-2 text-black dark:border-zinc-800 dark:bg-black dark:text-white">
                                        Asignados a mí
                                        <span
                                            class="flex h-6 w-6 items-center justify-center rounded-full bg-blue-500 text-white">
                                            0
                                        </span>
                                    </div>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div id="default-tab-content">
                        <div class="hidden" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div
                                class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-x-4 md:space-y-0">
                                <div class="w-full md:w-1/2">
                                    <form class="flex items-center" action="{{ route('admin.categories.search') }}"
                                        id="formSearchProduct">
                                        @csrf
                                        <x-input type="text" id="inputSearch" name="inputSearch"
                                            data-form="#formSearchProduct" data-table="#tableProduct" placeholder="Buscar"
                                            icon="search" />
                                    </form>
                                </div>
                                <div
                                    class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0">
                                    <div class="flex w-full items-center space-x-3 md:w-auto">
                                        <div class="w-32">
                                            <x-select label="" id="priority" name="priority" selected=""
                                                text="Prioridad" value="" :options="[
                                                    'low' => 'Baja',
                                                    ',medium' => 'Media',
                                                    'high' => 'Alta',
                                                    'urgent' => 'Urgente',
                                                ]" />
                                        </div>
                                        <div class="w-36">
                                            <x-select label="" id="status" name="status" selected=""
                                                text="Estado" value="" :options="[
                                                    'open' => 'Abierto',
                                                    ',in_progress' => 'En progreso',
                                                    'resolved' => 'Resuelto',
                                                    'closed' => 'Cerrado',
                                                ]" />
                                        </div>
                                        <div class="w-36">
                                            <x-select label="" id="category" name="category" selected=""
                                                text="Categoría" value="" :options="[
                                                    'billing' => 'Facturación',
                                                    'system' => 'Sistema',
                                                    'buy' => 'Compra',
                                                    'general' => 'General',
                                                ]" />
                                        </div>
                                        <div class="w-48">
                                            <x-select label="" id="asigned_to" name="asigned_to" selected=""
                                                text="Asignado a" value="" :options="$users->pluck('name', 'id')->toArray()" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="w-full text-left text-sm text-zinc-500 dark:text-zinc-400">
                                <thead
                                    class="bg-zinc-50 text-xs uppercase text-zinc-700 dark:bg-zinc-900 dark:text-zinc-300">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">#</th>
                                        <th scope="col" class="px-4 py-3">Asunto</th>
                                        <th scope="col" class="px-4 py-3">Estado</th>
                                        <th scope="col" class="px-4 py-3">Prioridad</th>
                                        <th scope="col" class="px-4 py-3">Categoría</th>
                                        <th scope="col" class="px-4 py-3">Asignado a</th>
                                        <th scope="col" class="px-4 py-3">Fecha de creación</th>
                                        <th scope="col" class="px-4 py-3">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="font-secondary text-sm">
                                    <tr>
                                        <td class="px-4 py-3">
                                            <span class="font-medium">1</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="font-medium">Problema con la factura</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="font-medium">Abierto</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="font-medium">Alta</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="font-medium">Facturación</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="font-medium">Juan Pérez</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="font-medium">12/12/2021</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-2">
                                                <x-button type="a" icon="edit" typeButton="success"
                                                    href="" onlyIcon="true" />
                                                <form action="" id="formDeleteCategorie" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-button type="button" data-form="formDeleteCategorie"
                                                        icon="delete" typeButton="danger" class="buttonDelete"
                                                        onlyIcon="true" />
                                                </form>
                                                <x-button type="a" icon="view" typeButton="secondary"
                                                    href="{{ route('admin.support-tickets.show', 1) }}" onlyIcon="true" />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="hidden" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <div
                                class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-x-4 md:space-y-0">
                                <div class="w-full md:w-1/2">
                                    <form class="flex items-center" action="{{ route('admin.categories.search') }}"
                                        id="formSearchProduct">
                                        @csrf
                                        <x-input type="text" id="inputSearch" name="inputSearch"
                                            data-form="#formSearchProduct" data-table="#tableProduct"
                                            placeholder="Buscar" icon="search" />
                                    </form>
                                </div>
                                <div
                                    class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0">
                                    <div class="flex w-full items-center space-x-3 md:w-auto">
                                        <div class="w-32">
                                            <x-select label="" id="priority" name="priority" selected=""
                                                text="Prioridad" value="" :options="[
                                                    'low' => 'Baja',
                                                    ',medium' => 'Media',
                                                    'high' => 'Alta',
                                                    'urgent' => 'Urgente',
                                                ]" />
                                        </div>
                                        <div class="w-36">
                                            <x-select label="" id="status" name="status" selected=""
                                                text="Estado" value="" :options="[
                                                    'open' => 'Abierto',
                                                    ',in_progress' => 'En progreso',
                                                    'resolved' => 'Resuelto',
                                                    'closed' => 'Cerrado',
                                                ]" />
                                        </div>
                                        <div class="w-36">
                                            <x-select label="" id="category" name="category" selected=""
                                                text="Categoría" value="" :options="[
                                                    'billing' => 'Facturación',
                                                    'system' => 'Sistema',
                                                    'buy' => 'Compra',
                                                    'general' => 'General',
                                                ]" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="w-full text-left text-sm text-zinc-500 dark:text-zinc-400">
                                <thead
                                    class="bg-zinc-50 text-xs uppercase text-zinc-700 dark:bg-zinc-900 dark:text-zinc-300">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">#</th>
                                        <th scope="col" class="px-4 py-3">Asunto</th>
                                        <th scope="col" class="px-4 py-3">Estado</th>
                                        <th scope="col" class="px-4 py-3">Prioridad</th>
                                        <th scope="col" class="px-4 py-3">Categoría</th>
                                        <th scope="col" class="px-4 py-3">Asignado a</th>
                                        <th scope="col" class="px-4 py-3">Fecha de creación</th>
                                        <th scope="col" class="px-4 py-3">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="font-secondary text-sm">
                                    <tr>
                                        <td class="px-4 py-3">
                                            <span class="font-medium">1</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="font-medium">Problema con la factura</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="font-medium">Abierto</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="font-medium">Alta</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="font-medium">Facturación</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="font-medium">Juan Pérez</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="font-medium">12/12/2021</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-2">
                                                <x-button type="a" icon="edit" typeButton="success"
                                                    href="" onlyIcon="true" />
                                                <form action="" id="formDeleteCategorie" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-button type="button" data-form="formDeleteCategorie"
                                                        icon="delete" typeButton="danger" class="buttonDelete"
                                                        onlyIcon="true" />
                                                </form>
                                                <x-button type="a" icon="view" typeButton="secondary"
                                                    href="{{ route('admin.support-tickets.show', 1) }}" onlyIcon="true" />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar el usuario?"
            message="No podrás recuperar este registro" action="" />
    </div>
@endsection
