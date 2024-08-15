@extends('layouts.admin-template')

@section('title', 'Categorías')

@section('content')
    <div class="mt-4 rounded-lg dark:border-zinc-900">
        @include('layouts.__partials.admin.header-page', [
            'title' => 'Preguntas frecuentes',
            'description' => 'Administra las preguntas frecuentes de tu aplicación',
        ])
        <div class="bg-zinc-50 p-4 dark:bg-black">
            <div class="mx-auto w-full">
                <div class="relative bg-white shadow-md dark:border dark:border-zinc-900 dark:bg-black sm:rounded-lg">
                    <div class="border-b border-zinc-200 p-4 dark:border-zinc-900">
                        <h2 class="text-base font-semibold text-zinc-700 dark:text-zinc-200">
                            Lista de preguntas
                        </h2>
                    </div>
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
                            <x-button data-drawer="#drawer-new-faq" class="open-drawer" type="button" text="Nueva pregunta"
                                icon="add-circle" typeButton="primary" />
                        </div>
                    </div>
                    <div>
                        <table class="w-full text-left text-sm text-zinc-500 dark:text-zinc-400">
                            <thead class="bg-zinc-50 text-xs uppercase text-zinc-700 dark:bg-zinc-900 dark:text-zinc-300">
                                <tr>
                                    <th scope="col" class="px-4 py-3">#</th>
                                    <th scope="col" class="px-4 py-3">Pregunta</th>
                                    <th scope="col" class="px-4 py-3">Respuesta</th>
                                    <th scope="col" class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($faqs->count() > 0)
                                    @foreach ($faqs as $faq)
                                        <tr class="border-b dark:border-zinc-900">
                                            <td class="px-4 py-3 text-start font-medium text-zinc-900 dark:text-white">
                                                {{ $faq->id }}
                                            </td>
                                            <td class="px-4 py-3 text-start font-medium text-zinc-900 dark:text-white">
                                                {{ $faq->question }}
                                            </td>
                                            <td class="px-4 py-3 text-start font-medium text-zinc-900 dark:text-white">
                                                {{ $faq->answer }}
                                            </td>
                                            <td class="px-4 py-3 text-start font-medium text-zinc-900 dark:text-white">
                                                <div class="flex gap-2">
                                                    <x-button type="button" class="editFaq"
                                                        data-href="{{ route('admin.faq.edit', $faq->id) }}"
                                                        data-action="{{ route('admin.faq.update', $faq->id) }}"
                                                        onlyIcon="true" icon="edit" typeButton="success" />
                                                    <form action="{{ route('admin.faq.destroy', $faq->id) }}"
                                                        id="formDeleteFaq-{{ $faq->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button"
                                                            data-form="formDeleteFaq-{{ $faq->id }}" onlyIcon="true"
                                                            icon="delete" typeButton="danger" class="buttonDelete"
                                                            data-modal-target="deleteModal"
                                                            data-modal-toggle="deleteModal" />
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="border-b dark:border-zinc-900">
                                        <td colspan="4"
                                            class="px-4 py-3 text-center font-medium text-zinc-900 dark:text-white">
                                            No hay preguntas registradas
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar la pregunta?"
            message="No podrás recuperar este registro" action="" />

        <div id="drawer-new-faq"
            class="drawer fixed right-0 top-0 z-40 h-screen w-[500px] translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-new-faq">
            <h5 id="drawer-new-faq-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-zinc-500 dark:text-zinc-400">
                Nueva pregunta
            </h5>
            <button type="button" data-drawer="#drawer-new-faq"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <form action="{{ route('admin.faq.store') }}" class="flex flex-col gap-4" enctype="multipart/form-data"
                    method="POST" id="formAddFaq">
                    @csrf
                    <div class="w-full">
                        <x-input type="text" name="question" id="question" placeholder="Ingresa la pregunta"
                            icon="question" label="Pregunta" value="{{ old('question') }}" />
                    </div>
                    <div>
                        <x-input type="textarea" name="answer" id="answer" placeholder="Ingresa la respuesta"
                            label="Respuesta" value="{{ old('answer') }}" />
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Agregar pregunta" icon="add-circle" typeButton="primary" />
                        <x-button type="button" class="close-drawer" data-drawer="#drawer-new-faq" text="Cancelar"
                            typeButton="secondary" />
                    </div>
                </form>
            </div>
        </div>

        <div id="drawer-edit-faq"
            class="fixed right-0 top-0 z-40 h-screen w-[500px] translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-edit-faq">
            <h5 id="drawer-edit-faq-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-zinc-500 dark:text-zinc-400">
                Editar pregunta
            </h5>
            <button type="button" data-drawer="#drawer-edit-faq"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <form action="{{ route('admin.faq.store') }}" class="flex flex-col gap-4" enctype="multipart/form-data"
                    method="POST" id="formEditFaq">
                    @csrf
                    @method('PUT')
                    <div class="w-full">
                        <x-input type="text" name="question" id="question_edit" placeholder="Ingresa la pregunta"
                            icon="question" label="Pregunta" value="{{ old('question') }}" />
                    </div>
                    <div>
                        <x-input type="textarea" name="answer" id="answer_edit" placeholder="Ingresa la respuesta"
                            label="Respuesta" value="{{ old('answer') }}" />
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" text="Editar" icon="edit" typeButton="primary" />
                        <x-button type="button" class="close-drawer" data-drawer="#drawer-edit-faq" icon="cancel"
                            text="Cancelar" typeButton="secondary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Comprueba si hay errores de validación en la sesión
            @if ($errors->any())
                $("#drawer-new-faq").removeClass("translate-x-full");
                $("#overlay").removeClass("hidden");
            @endif
        });
    </script>
@endsection
