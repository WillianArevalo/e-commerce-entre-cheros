@extends('layouts.admin-template')
@section('title', 'Tickets de soporte')
@section('content')
    <div>
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Detalles del ticket',
            'text' => 'Regresar a la lista de tickets',
            'url' => route('admin.support-tickets.index'),
        ])
        <div>
            <div class="px-4 pt-4">
                <div class="flex gap-4">
                    <div class="flex-[2] rounded-xl border border-zinc-400 dark:border-zinc-800">
                        <div class="flex items-center justify-between px-4 py-4">
                            <div class="flex flex-col justify-center gap-2">
                                <h1 class="text-2xl font-bold text-zinc-800 dark:text-zinc-200">
                                    {{ $ticket->ticket_number }}
                                </h1>
                                <h2 class="text-lg font-medium text-zinc-700 dark:text-white">
                                    Asunto: {{ $ticket->subject }}
                                </h2>
                            </div>
                            <x-status-badge status="{{ $ticket->status }}" />
                        </div>
                        <div class="flex border-t border-zinc-400 dark:border-zinc-800">
                            <div
                                class="flex flex-1 flex-col items-center justify-center gap-2 border-e border-zinc-400 p-4 dark:border-zinc-800">
                                <p class="text-sm text-zinc-700 dark:text-zinc-300">Prioridad:</p>
                                <x-status-badge status="{{ $ticket->priority }}" />
                            </div>
                            <div
                                class="flex flex-1 flex-col items-center justify-center gap-1 border-e border-zinc-400 p-4 dark:border-zinc-800">
                                <p class="text-sm text-zinc-700 dark:text-zinc-300">Categoría:</p>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">
                                    {{ App\Utils\CategoryTickets::getCategory($ticket->category) }}
                                </p>
                            </div>
                            <div class="flex flex-1 flex-col items-center justify-center gap-2 p-4">
                                <p class="text-sm text-zinc-700 dark:text-zinc-300">Asignado a:</p>
                                @if ($ticket->assigned_to)
                                    <div class="flex items-center gap-2">
                                        <img src="{{ Storage::url($ticket->assignedTo->profile) }}"
                                            alt="Profile picture {{ $ticket->assignedTo->name }}"
                                            class="h-12 w-12 rounded-full object-cover">
                                        <div class="flex flex-col gap-1 text-sm">
                                            <p class="text-zinc-600 dark:text-zinc-400">
                                                {{ $ticket->assignedTo->username }}
                                            </p>
                                            <span class="rounded-full bg-blue-500 px-3 py-1 text-xs text-white">
                                                {{ $ticket->assignedTo->role }}
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Sin asignar</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 rounded-xl border border-zinc-400 px-4 py-4 dark:border-zinc-800">
                        <div class="flex flex-col gap-3">
                            <div class="flex items-center gap-4">
                                <h2 class="font-bold text-zinc-800 dark:text-zinc-300">
                                    Información del usuario
                                </h2>
                            </div>
                            <div class="flex items-center gap-4">
                                <img src="{{ Storage::url($ticket->user->profile) }}"
                                    alt="Profile photo {{ $ticket->user->name }}"
                                    class="h-14 w-14 rounded-full object-cover">
                                <div class="flex flex-col text-sm">
                                    <p class="font-medium text-zinc-600 dark:text-zinc-400">
                                        {{ $ticket->user->name }}
                                    </p>
                                    <p class="text-zinc-600 dark:text-zinc-400">
                                        {{ $ticket->user->email }}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div
                                    class="flex w-max items-center gap-2 rounded-xl bg-blue-100 px-4 py-2 text-sm font-medium text-blue-600 dark:bg-blue-950 dark:bg-opacity-20 dark:text-blue-400">
                                    <p>Fecha de creación:</p>
                                    <p>
                                        {{ $ticket->created_at->toFormattedDateString() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="mt-4 h-max w-max rounded-xl border border-zinc-400 p-6 dark:border-zinc-800">
                        <div class="flex gap-10">
                            <div class="flex flex-col items-start gap-2">
                                <h2 class="font-bold text-zinc-700 dark:text-zinc-300">Descripción</h2>
                                <p class="w-96 text-sm text-zinc-600 dark:text-zinc-400">
                                    {{ $ticket->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @if ($ticket->lastRepliedBy)
                        <div
                            class="mt-4 flex flex-1 justify-between gap-4 rounded-xl border border-zinc-400 px-4 py-4 dark:border-zinc-800">
                            <div class="flex flex-col gap-3">
                                <div class="flex gap-4">
                                    <h2 class="font-bold text-zinc-800 dark:text-zinc-300">
                                        Última actualización
                                    </h2>
                                </div>
                                <div class="flex items-center gap-4">

                                    <img src="{{ Storage::url($ticket->lastRepliedBy->profile) }}"
                                        alt="Profile photo {{ $ticket->lastRepliedBy->name }}"
                                        class="h-14 w-14 rounded-full object-cover">
                                    <div class="flex flex-col text-sm">
                                        <p class="font-medium text-zinc-600 dark:text-zinc-400">
                                            {{ $ticket->lastRepliedBy->name }}
                                        </p>
                                        <p class="text-zinc-600 dark:text-zinc-400">
                                            {{ $ticket->lastRepliedBy->email }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="flex flex-col items-end gap-1">
                                <div
                                    class="flex w-max items-center gap-1 rounded-xl bg-green-100 px-4 py-2 text-sm font-medium text-green-600 dark:bg-green-950 dark:bg-opacity-20 dark:text-green-400">
                                    <x-icon icon="calendar" class="h-4 w-4" />
                                    <p>Fecha:
                                        {{ $ticket->last_replied_at->toFormattedDateString() }}
                                    </p>
                                </div>
                                <div
                                    class="flex w-max items-center gap-1 rounded-xl bg-green-100 px-4 py-2 text-sm font-medium text-green-600 dark:bg-green-950 dark:bg-opacity-20 dark:text-green-400">
                                    <x-icon icon="clock" class="h-4 w-4" />
                                    <p>Hora:
                                        {{ $ticket->last_replied_at->setTimezone(auth()->user()->timezone ?? 'UTC')->format('h:i A') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="mt-4 border-t border-zinc-400 p-4 dark:border-zinc-800">
                <h2 class="text-xl font-bold uppercase text-zinc-800 dark:text-zinc-400">
                    Comentarios
                </h2>
                @forelse ($ticket->comments as $comment)
                    <div class="p-8">
                        <div class="flex flex-col gap-4">
                            <div class="{{ $comment->type_user === 'admin' ? 'justify-end' : 'justify-start' }} flex">
                                <div class="flex items-start gap-2.5">

                                    @if ($comment->type_user === 'admin')
                                        <button id="dropdownMenuIconButton-{{ $comment->type_user . '-' . $comment->id }}"
                                            data-dropdown-toggle="dropdownDots-{{ $comment->type_user . '-' . $comment->id }}"
                                            data-dropdown-placement="bottom-start"
                                            class="inline-flex items-center self-center rounded-lg bg-zinc-200 p-2 text-center text-sm font-medium text-zinc-950 hover:bg-zinc-300 focus:outline-none focus:ring-4 focus:ring-zinc-400 focus:ring-opacity-70 dark:bg-zinc-950 dark:text-white dark:hover:bg-zinc-900 dark:focus:ring-zinc-900 dark:focus:ring-opacity-70"
                                            type="button">
                                            <svg class="h-4 w-4 text-current" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                <path
                                                    d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                            </svg>
                                        </button>
                                        <div id="dropdownDots-{{ $comment->type_user . '-' . $comment->id }}"
                                            class="z-10 hidden w-40 rounded-xl border border-zinc-400 bg-white shadow dark:border-zinc-800 dark:bg-zinc-950">
                                            <ul class="p-2 text-sm text-zinc-700 dark:text-gray-200"
                                                aria-labelledby="dropdownMenuIconButton-{{ $comment->type_user . '-' . $comment->id }}">
                                                <li>
                                                    <a href="#"
                                                        class="flex items-center gap-1 rounded-lg p-2 hover:bg-gray-200 dark:hover:bg-zinc-900 dark:hover:text-white">
                                                        <x-icon icon="edit" class="h-4 w-4" />
                                                        Editar
                                                    </a>
                                                </li>
                                                <li>
                                                    <form
                                                        action="{{ Route('admin.ticket-comment.destroy', $comment->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="flex w-full items-center gap-1 rounded-lg p-2 hover:bg-gray-200 dark:hover:bg-zinc-900 dark:hover:text-white">
                                                            <x-icon icon="delete" class="h-4 w-4" />
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @else
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Storage::url($comment->user->profile) }}"
                                            alt="Profile image {{ $comment->user->username }}">
                                    @endif

                                    <div
                                        class="leading-1.5 {{ $comment->type_user === 'admin' ? 'rounded-s-xl rounded-ee-xl' : 'rounded-e-xl rounded-es-xl' }} flex w-full max-w-[400px] flex-col border border-zinc-200 bg-zinc-100 p-4 dark:border-zinc-900 dark:bg-zinc-950">
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                            <span class="text-sm font-semibold text-zinc-800 dark:text-zinc-300">
                                                {{ $comment->user->username }}
                                            </span>
                                            <span class="text-xs font-normal text-zinc-500 dark:text-zinc-400">
                                                {{ $comment->created_at->setTimezone(auth()->user()->timezone ?? 'UTC')->format('F j, Y, g:i A') }}
                                            </span>
                                        </div>
                                        <p class="py-2.5 text-sm font-normal text-zinc-900 dark:text-white">
                                            {{ $comment->comment }}
                                        </p>
                                        @if ($comment->attachments)
                                            <div
                                                class="{{ count($comment->attachments) > 1 ? 'grid grid-cols-2 gap-4' : '' }} my-2.5">
                                                @foreach ($comment->attachments as $attachment)
                                                    <div class="group relative my-2.5">
                                                        <div
                                                            class="absolute flex h-full w-full items-center justify-center rounded-lg bg-zinc-900/50 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                                            <button type="button"
                                                                class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 hover:bg-white/50 focus:outline-none focus:ring-4 focus:ring-zinc-950 focus:ring-opacity-40 dark:text-white">
                                                                <x-icon icon="import" class="h-5 w-5 text-white" />
                                                            </button>
                                                        </div>
                                                        <img src="{{ Storage::url($attachment['path']) }}" alt="Image"
                                                            class="w-fill h-28 rounded-xl object-cover" />
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    @if ($comment->type_user === 'admin')
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Storage::url($comment->user->profile) }}"
                                            alt="Profile image {{ $comment->user->username }}">
                                    @else
                                        <button id="dropdownMenuIconButton-{{ $comment->type_user . '-' . $comment->id }}"
                                            data-dropdown-toggle="dropdownDots-{{ $comment->type_user . '-' . $comment->id }}"
                                            data-dropdown-placement="bottom-start"
                                            class="inline-flex items-center self-center rounded-lg bg-zinc-200 p-2 text-center text-sm font-medium text-zinc-950 hover:bg-zinc-300 focus:outline-none focus:ring-4 focus:ring-zinc-400 focus:ring-opacity-70 dark:bg-zinc-950 dark:text-white dark:hover:bg-zinc-900 dark:focus:ring-zinc-900 dark:focus:ring-opacity-70"
                                            type="button">
                                            <svg class="h-4 w-4 text-current" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 4 15">
                                                <path
                                                    d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                            </svg>
                                        </button>
                                        <div id="dropdownDots-{{ $comment->type_user . '-' . $comment->id }}"
                                            class="z-10 hidden w-40 rounded-xl border border-zinc-400 bg-white shadow dark:border-zinc-800 dark:bg-zinc-950">
                                            <ul class="p-2 text-sm text-zinc-700 dark:text-gray-200"
                                                aria-labelledby="dropdownMenuIconButton-{{ $comment->type_user . '-' . $comment->id }}">
                                                <li>
                                                    <a href="#"
                                                        class="flex items-center gap-1 rounded-lg p-2 hover:bg-gray-200 dark:hover:bg-zinc-900 dark:hover:text-white">
                                                        <x-icon icon="edit" class="h-4 w-4" />
                                                        Editar
                                                    </a>
                                                </li>
                                                <li>
                                                    <form
                                                        action="{{ Route('admin.ticket-comment.destroy', $comment->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="flex w-full items-center gap-1 rounded-lg p-2 hover:bg-gray-200 dark:hover:bg-zinc-900 dark:hover:text-white">
                                                            <x-icon icon="delete" class="h-4 w-4" />
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div
                        class="my-4 flex items-center justify-center gap-2 rounded-xl border-2 border-dashed border-zinc-400 p-10 dark:border-zinc-800">
                        <x-icon icon="message-off" class="h-6 w-6 text-zinc-400 dark:text-zinc-600" />
                        <p class="text-sm text-zinc-600 dark:text-zinc-400">No hay comentarios</p>
                    </div>
                @endforelse
                <form action="{{ Route('admin.ticket-comment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                    <div
                        class="mb-4 w-full rounded-lg border border-zinc-400 bg-zinc-100 dark:border-zinc-800 dark:bg-zinc-900">
                        <div
                            class="flex items-center justify-between border-b border-zinc-400 px-3 py-2 dark:border-zinc-800">
                            <div
                                class="flex flex-wrap items-center divide-zinc-200 dark:divide-zinc-600 sm:divide-x sm:rtl:divide-x-reverse">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse sm:pe-4">
                                    <label for="attachments"
                                        class="cursor-pointer rounded-lg p-2 text-zinc-500 hover:bg-zinc-200 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-zinc-800 dark:hover:text-white">
                                        <x-icon icon="paperclip" class="h-4 w-4" />
                                        <span class="sr-only">Attach file</span>
                                        <input id="attachments" type="file" class="hidden" name="attachments[]"
                                            multiple />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-b-lg bg-white px-4 py-2 dark:bg-zinc-950">
                            <label for="editor" class="sr-only">Publish post</label>
                            <textarea id="comment" name="comment" rows="8"
                                class="block w-full border-0 bg-white px-0 text-sm text-zinc-800 focus:ring-0 dark:bg-zinc-950 dark:text-white dark:placeholder-zinc-500"
                                placeholder="Escribe tu comentario aquí..." required></textarea>
                        </div>
                    </div>
                    @error('comment')
                        <span class="text-xs italic text-red-500">{{ $message }}</span>
                    @enderror
                    <x-button type="submit" typeButton="primary" text="Enviar comentario" icon="send" />
                </form>
            </div>
        </div>
    </div>
@endsection
