@extends('layouts.admin-template')

@section('title', 'Tickets de soporte')

@section('content')
    <div class="rounded-lg  mt-4">
        <div class="dark:bg-black py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-zinc-900">
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Tickets de soporte
            </h1>
            <p class="text-sm text-gray-400">
                Administra los tickets de soporte de los usuarios
            </p>
        </div>
        <div class="bg-gray-50 dark:bg-black p-4">
            <div class="mx-auto w-full">
                <div class="bg-white dark:bg-black dark:border dark:border-zinc-900 relative shadow-md sm:rounded-lg">
                    <div class="mb-4 border-b border-gray-200 dark:border-zinc-900">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                            data-tabs-toggle="#default-tab-content" role="tablist">
                            <li class="me-2" role="presentation">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                                    data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">
                                    <div
                                        class="flex items-center gap-2 justify-center bg-black text-white px-3 py-2 rounded-full dark:bg-white dark:text-black">
                                        Todos los tickets
                                        <span
                                            class="flex items-center justify-center bg-red-500 text-white rounded-full  w-6 h-6">
                                            2
                                        </span>
                                    </div>
                                </button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button
                                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                    aria-controls="dashboard" aria-selected="false">
                                    <div
                                        class="flex items-center gap-2 justify-center bg-white text-black px-3 py-2 rounded-full dark:bg-black dark:text-white border border-gray-300 dark:border-zinc-800">
                                        Asignados a mí
                                        <span
                                            class="flex items-center justify-center bg-blue-500 text-white rounded-full  w-6 h-6">
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
                                class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
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
                                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                    <div class="flex items-center space-x-3 w-full md:w-auto">
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
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-zinc-900 dark:text-gray-300">
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
                                class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
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
                                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                    <div class="flex items-center space-x-3 w-full md:w-auto">
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
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-zinc-900 dark:text-gray-300">
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
