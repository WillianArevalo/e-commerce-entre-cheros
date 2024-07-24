@extends('layouts.admin-template')

@section('title', 'Categorías')

@section('content')
    <div class="rounded-lg dark:border-zinc-900 mt-4">
        <div class="dark:bg-black py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-zinc-900">
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Preguntas frecuentes
            </h1>
            <p class="text-sm text-gray-400">
                Administra las preguntas frecuentes de la aplicación
            </p>
        </div>
        <div class="bg-gray-50 dark:bg-black p-4">
            <div class="mx-auto w-full">
                <div class="bg-white dark:bg-black relative shadow-md sm:rounded-lg dark:border dark:border-zinc-900">
                    <div class="p-4 border-b dark:border-zinc-900 border-gray-200">
                        <h2 class="dark:text-gray-200 text-base font-semibold text-gray-700">
                            Lista de preguntas
                        </h2>
                    </div>
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
                            <x-button id="new-faq" type="button" text="Nueva pregunta" icon="add-circle"
                                typeButton="primary" />
                        </div>
                    </div>
                    <div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-zinc-900 dark:text-gray-300">
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
                                            <td class="px-4 py-3 text-start font-medium text-gray-900 dark:text-white">
                                                {{ $faq->id }}
                                            </td>
                                            <td class="px-4 py-3 text-start font-medium text-gray-900 dark:text-white">
                                                {{ $faq->question }}
                                            </td>
                                            <td class="px-4 py-3 text-start font-medium text-gray-900 dark:text-white">
                                                {{ $faq->answer }}
                                            </td>
                                            <td class="px-4 py-3 text-start font-medium text-gray-900 dark:text-white">
                                                <div class="flex gap-2">
                                                    <x-button type="button" class="editFaq"
                                                        data-href="{{ route('admin.faq.edit', $faq->id) }}"
                                                        data-action="{{ route('admin.faq.update', $faq->id) }}"
                                                        onlyIcon="true" icon="edit" typeButton="success" />
                                                    <form action="{{ route('admin.faq.destroy', $faq->id) }}"
                                                        id="formDeleteFaq" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button" data-form="formDeleteFaq" onlyIcon="true"
                                                            icon="delete" typeButton="danger" class="buttonDelete" />
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="border-b dark:border-zinc-900">
                                        <td colspan="4"
                                            class="px-4 py-3 text-center font-medium text-gray-900 dark:text-white">
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
            class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[500px] dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-new-faq">
            <h5 id="drawer-new-faq-label"
                class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                Nueva pregunta
            </h5>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white close-drawer-faq">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
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
                        <x-button type="a" href="{{ route('admin.faq.index') }}" text="Cancelar"
                            typeButton="secondary" />
                    </div>
                </form>
            </div>
        </div>

        <div id="drawer-edit-faq"
            class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-[500px] dark:bg-black"
            tabindex="-1" aria-labelledby="drawer-edit-faq">
            <h5 id="drawer-edit-faq-label"
                class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                Editar pregunta
            </h5>
            <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white close-drawer-faq">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
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
                        <x-button type="a" href="{{ route('admin.faq.index') }}" icon="cancel" text="Cancelar"
                            typeButton="secondary" />
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
