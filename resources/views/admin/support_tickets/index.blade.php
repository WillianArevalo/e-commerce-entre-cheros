@extends('layouts.admin-template')
@section('title', 'Tickets de soporte')
@section('content')
    <div class="rounded-lg">
        @include('layouts.__partials.admin.header-page', [
            'title' => 'Tickets de soporte',
            'description' => 'Administra los tickets de soporte de tu plataforma',
        ])
        <div class="bg-zinc-50 p-4 dark:bg-black">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="-mb-px flex flex-wrap text-center text-sm font-medium" id="default-styled-tab"
                    data-tabs-toggle="#default-styled-tab-content"
                    data-tabs-active-classes="text-primary-600 hover:text-primary-600 dark:text-primary-500 dark:hover:text-primary-500 border-primary-600 dark:border-primary-500"
                    data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                    role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block rounded-t-lg border-b-2 p-4" id="profile-styled-tab"
                            data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
                            aria-selected="false">
                            Todos los tickets
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block rounded-t-lg border-b-2 p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300"
                            id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">
                            Tickets abiertos
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="inline-block rounded-t-lg border-b-2 p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300"
                            id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab"
                            aria-controls="settings" aria-selected="false">
                            Mis tickets
                        </button>
                    </li>
                    <li role="presentation">
                        <button
                            class="inline-block rounded-t-lg border-b-2 p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300"
                            id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button" role="tab"
                            aria-controls="contacts" aria-selected="false">Contacts</button>
                    </li>
                </ul>
            </div>
            <div id="default-styled-tab-content">
                <div class="hidden" id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
                    <x-table>
                        <x-slot name="thead">
                            <x-th class="w-10">
                                <input id="default-checkbox" type="checkbox" value=""
                                    class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-primary-600">
                            </x-th>
                            <x-th>
                                Número de ticket
                            </x-th>
                            <x-th>Asunto</x-th>
                            <x-th>Usuario</x-th>
                            <x-th>Estado</x-th>
                            <x-th>Prioridad</x-th>
                            <x-th>Categoría</x-th>
                            <x-th>Asignado a</x-th>
                            <x-th last>Acciones</x-th>
                        </x-slot>
                        <x-slot name="tbody">
                            @if ($tickets->count() > 0)
                                @foreach ($tickets as $ticket)
                                    <x-tr>
                                        <x-td>
                                            <input id="default-checkbox" type="checkbox" value=""
                                                class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-primary-600">
                                        </x-td>
                                        <x-td>
                                            {{ $ticket->ticket_number }}
                                        </x-td>
                                        <x-td>
                                            {{ $ticket->subject }}
                                        </x-td>
                                        <x-td>
                                            <div>
                                                <img src="{{ Storage::url($ticket->user->profile) }}"
                                                    alt="{{ $ticket->user->name }} profile"
                                                    class="h-8 w-8 rounded-full object-cover"
                                                    data-tooltip-target="tooltip-user-{{ $ticket->user->id }}">
                                            </div>
                                            <div id="tooltip-user-{{ $ticket->user->id }}" role="tooltip"
                                                class="tooltip invisible absolute z-10 rounded-lg border border-zinc-400 bg-zinc-100 px-3 py-2 text-xs font-medium text-zinc-800 opacity-0 shadow-sm transition-opacity duration-300 dark:border-zinc-800 dark:bg-zinc-950 dark:text-white">
                                                <div class="flex flex-col items-center gap-1">
                                                    <p>
                                                        {{ $ticket->user->name }}
                                                    </p>
                                                    <p>
                                                        {{ $ticket->user->email }}
                                                    </p>
                                                </div>
                                                <div class="tooltip-arrow" data-popper-arrow>
                                                </div>
                                            </div>
                                        </x-td>
                                        <x-td>
                                            <x-status-badge status="{{ $ticket->status }}" />
                                        </x-td>
                                        <x-td>
                                            <x-status-badge status="{{ $ticket->priority }}" />
                                        </x-td>
                                        <x-td>
                                            {{ App\Utils\CategoryTickets::getCategory($ticket->category) }}
                                        </x-td>
                                        <x-td>
                                            {{ $ticket->assigned_to }}
                                        </x-td>
                                        <x-td>
                                            <div class="flex items-center gap-2">

                                                <x-button icon="view" type="a"
                                                    href="{{ Route('admin.support-tickets.show', $ticket->id) }}" onlyIcon
                                                    typeButton="secondary" />
                                                <x-button icon="message" type="a"
                                                    href="{{ Route('admin.support-tickets.show', $ticket->id) }}"
                                                    typeButton="secondary" onlyIcon />
                                                <div class="relative">
                                                    <x-button type="button" icon="user-star" typeButton="secondary"
                                                        onlyIcon="true" class="show-options" />
                                                    <div
                                                        class="options absolute right-0 top-11 z-10 hidden w-max rounded-lg border border-zinc-400 bg-white p-2 dark:border-zinc-800 dark:bg-zinc-950">
                                                        <p class="font-semibold text-zinc-800 dark:text-zinc-300">
                                                            Asignar ticket a
                                                        </p>
                                                        <form
                                                            action="{{ Route('admin.support-tickets.asign', $ticket->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <ul class="mt-2 flex flex-col text-sm">
                                                                @foreach ($users as $user)
                                                                    <li class="w-full">
                                                                        <button type="button"
                                                                            class="assign-ticket flex w-full items-center gap-1 rounded-lg px-2 py-2 text-zinc-700 hover:bg-zinc-100 dark:text-zinc-400 dark:hover:bg-zinc-900 dark:hover:bg-opacity-70"
                                                                            data-user="{{ $user->id }}">
                                                                            <img src="{{ Storage::url($user->profile) }}"
                                                                                alt="{{ $user->name }} profile"
                                                                                class="h-6 w-6 rounded-full object-cover">
                                                                            {{ $user->name }}
                                                                        </button>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </form>
                                                    </div>
                                                </div>
                                                <form action="{{ route('admin.support-tickets.destroy', $ticket->id) }}"
                                                    id="formDeleteTicket-{{ $ticket->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-button type="button"
                                                        data-form="formDeleteTicket-{{ $ticket->id }}"
                                                        class="buttonDelete" onlyIcon="true" icon="delete"
                                                        typeButton="danger" data-modal-target="deleteModal"
                                                        data-modal-toggle="deleteModal" />
                                                </form>
                                            </div>
                                        </x-td>
                                    </x-tr>
                                @endforeach
                            @else
                                <x-tr>
                                    <x-td colspan="9">
                                        <div class="flex items-center justify-center space-x-2 p-8">
                                            <x-icon icon="alert-circle"
                                                class="h-6 w-6 text-zinc-500 dark:text-zinc-400" />
                                            <span class="text-zinc-500 dark:text-zinc-400">
                                                No se encontraron registros
                                            </span>
                                        </div>
                                    </x-td>
                                </x-tr>
                            @endif
                        </x-slot>
                    </x-table>
                </div>
                <div class="hidden p-4" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">

                </div>
                <div class="hidden p-4" id="styled-settings" role="tabpanel" aria-labelledby="settings-tab">

                </div>
                <div class="hidden p-4" id="styled-contacts" role="tabpanel" aria-labelledby="contacts-tab">

                </div>
            </div>
        </div>

        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar el ticket de soporte?"
            message="No podrás recuperar este registro" action="" />
    </div>
@endsection
