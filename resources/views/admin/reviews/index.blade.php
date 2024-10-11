@extends('layouts.admin-template')
@section('title', 'Reseñas')
@section('content')
    <div>
        @include('layouts.__partials.admin.header-page', [
            'title' => 'Reseñas',
            'description' => 'Administra las reseñas de los productos',
        ])
        <div class="bg-zinc-50 dark:bg-black">
            <div class="mx-auto w-full">
                <div class="relative bg-white dark:bg-black">
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
                    </div>
                    <div class="mx-4 mb-4">
                        <x-table class="w-full text-left text-sm text-zinc-500 dark:text-zinc-400">
                            <x-slot name="thead">
                                <x-tr>
                                    <x-th class="flex w-12 items-center justify-center">
                                        <input id="default-checkbox" type="checkbox" value=""
                                            class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-primary-600">
                                    </x-th>
                                    <x-th>
                                        Usuario
                                    </x-th>
                                    <x-th>
                                        Producto
                                    </x-th>
                                    <x-th>
                                        Calificación
                                    </x-th>
                                    <x-th>
                                        Estado
                                    </x-th>
                                    <x-th>
                                        <span class="text-nowrap">
                                            Fecha de creación
                                        </span>
                                    </x-th>
                                    <x-th last="true">
                                        Acciones
                                    </x-th>
                                </x-tr>
                            </x-slot>
                            <x-slot name="tbody">
                                @forelse($reviews as $review)
                                    <x-tr>
                                        <x-td>
                                            <input id="default-checkbox" type="checkbox" value="{{ $review->id }}"
                                                class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-primary-600">
                                        </x-td>
                                        <x-td>
                                            <div class="flex gap-4">
                                                <div>
                                                    <img src="{{ Storage::url($review->user->profile) }}"
                                                        alt="{{ $review->user->name }} profile"
                                                        class="h-10 w-10 rounded-full object-cover">
                                                </div>
                                                <div class="flex flex-col items-start justify-center gap-1 text-sm">
                                                    <p class="font-medium">{{ $review->user->name }}</p>
                                                    <p class="text-xs">{{ $review->user->email }}</p>
                                                </div>
                                            </div>
                                        </x-td>
                                        <x-td>
                                            <a href="{{ route('admin.products.show', $review->product->id) }}"
                                                class="flex w-max items-center gap-2 rounded-lg p-2">
                                                <img src="{{ Storage::url($review->product->main_image) }}" alt=""
                                                    class="h-12 w-12 rounded-lg object-cover">
                                                <div class="flex flex-col">
                                                    <span>{{ $review->product->name }}</span>
                                                    <span
                                                        class="me-2 w-max rounded-full bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:bg-opacity-10 dark:text-primary-300">
                                                        ${{ $review->product->price }}
                                                    </span>
                                                </div>
                                            </a>
                                        </x-td>
                                        <x-td>
                                            <div class="flex items-center gap-1">
                                                @for ($i = 0; $i < 5; $i++)
                                                    @if ($i < $review->rating)
                                                        <x-icon icon="star"
                                                            class="h-4 w-4 fill-yellow-300 text-yellow-400" />
                                                    @else
                                                        <x-icon icon="star"
                                                            class="h-4 w-4 fill-zinc-300 text-zinc-400 dark:fill-zinc-800" />
                                                    @endif
                                                @endfor
                                            </div>
                                        </x-td>
                                        <x-td>
                                            @if ($review->is_approved === 0)
                                                <span
                                                    class="w-max rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:bg-opacity-20 dark:text-yellow-300">
                                                    Pendiente
                                                </span>
                                            @elseif($review->is_approved === 2)
                                                <span
                                                    class="w-max rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:bg-opacity-20 dark:text-red-300">
                                                    Rechazado
                                                </span>
                                            @else
                                                <span
                                                    class="w-max rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:bg-opacity-20 dark:text-green-300">
                                                    Aprobado
                                                </span>
                                            @endif
                                        </x-td>
                                        <x-td>
                                            {{ $review->created_at->format('d M, Y') }}
                                        </x-td>
                                        <x-td last="true">
                                            <div class="flex items-center justify-start gap-2">
                                                <form action="{{ route('admin.reviews.destroy', $review->first()->id) }}"
                                                    method="POST" id="formDeleteReview-{{ $review->first()->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-button type="button"
                                                        data-form="formDeleteReview-{{ $review->first()->id }}"
                                                        onlyIcon="true" icon="delete" typeButton="danger"
                                                        data-modal-target="deleteModal" data-modal-toggle="deleteModal"
                                                        class="buttonDelete" />
                                                </form>
                                                <div class="relative">
                                                    <x-button type="button" icon="refresh" typeButton="secondary"
                                                        onlyIcon="true" class="show-options"
                                                        data-target="#options-reviews-{{ $review->id }}" />
                                                    <div class="options absolute right-0 top-11 z-10 hidden w-40 animate-jump-in rounded-lg border border-zinc-400 bg-white p-2 animate-duration-200 dark:border-zinc-800 dark:bg-zinc-950"
                                                        id="options-reviews-{{ $review->id }}">
                                                        <p class="font-semibold text-zinc-800 dark:text-zinc-300">
                                                            Cambiar estado
                                                        </p>
                                                        <form action="{{ Route('admin.reviews.status', $review->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="status">
                                                            <ul class="mt-2 flex flex-col text-sm">
                                                                <li>
                                                                    <button type="button"
                                                                        class="change-status-review flex w-full items-center gap-1 rounded-lg px-2 py-2 text-emerald-700 hover:bg-emerald-100 dark:text-emerald-400 dark:hover:bg-emerald-950 dark:hover:bg-opacity-20"
                                                                        data-status="1">
                                                                        <x-icon icon="check" class="h-4 w-4" />
                                                                        Aprobado
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button"
                                                                        class="change-status-review flex w-full items-center gap-1 rounded-lg px-2 py-2 text-yellow-700 hover:bg-yellow-100 dark:text-yellow-400 dark:hover:bg-yellow-950 dark:hover:bg-opacity-20"
                                                                        data-status="0">
                                                                        <x-icon icon="reload" class="h-4 w-4" />
                                                                        Pendiente
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" href="#"
                                                                        class="change-status-review flex w-full items-center gap-1 rounded-lg px-2 py-2 text-red-700 hover:bg-red-100 dark:text-red-400 dark:hover:bg-red-950 dark:hover:bg-opacity-20"
                                                                        data-status="2">
                                                                        <x-icon icon="x" class="h-4 w-4" />
                                                                        Rechazado
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </form>
                                                    </div>
                                                </div>
                                                <x-button type="button" class="showReview"
                                                    data-href="{{ route('admin.reviews.show', $review->id) }}"
                                                    typeButton="secondary" icon="view" onlyIcon="true"
                                                    data-drawer="#drawer-show-review" />
                                                @if ($review->is_approved === 2)
                                                    <x-button data-modal-target="add-reason-reject" class="editReview"
                                                        data-action="{{ Route('admin.reviews.update', $review->id) }}"
                                                        data-href="{{ Route('admin.reviews.edit', $review->id) }}"
                                                        data-modal-toggle="add-reason-reject" type="button"
                                                        onlyIcon="true" icon="message" typeButton="secondary" />
                                                @endif
                                            </div>
                                        </x-td>
                                    </x-tr>
                                @empty
                                    <x-tr>
                                        <x-td colspan="7">
                                            <div class="flex items-center justify-center space-x-2 p-8">
                                                <x-icon icon="alert-circle"
                                                    class="h-6 w-6 text-zinc-500 dark:text-zinc-400" />
                                                <span class="text-zinc-500 dark:text-zinc-400">
                                                    No se encontraron registros
                                                </span>
                                            </div>
                                        </x-td>
                                    </x-tr>
                                @endforelse
                            </x-slot>
                        </x-table>
                    </div>
                </div>
            </div>
        </div>

        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar la reseña?"
            message="No podrás recuperar este registro" action="" />

        <div id="drawer-show-review"
            class="drawer fixed right-0 top-0 z-[70] h-screen w-full translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-black sm:w-[500px]"
            tabindex="-1" aria-labelledby="drawer-show-review">
            <h5 id="drawer-show-review-label"
                class="mb-4 inline-flex items-center text-base font-semibold text-zinc-500 dark:text-zinc-400">
                Detalles de la reseña
            </h5>
            <button type="button" data-drawer="#drawer-show-review"
                class="close-drawer absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div>
                <div id="show-review-content"></div>
            </div>
        </div>

        <div id="add-reason-reject" tabindex="-1" aria-hidden="true"
            class="fixed left-0 right-0 top-0 z-[70] hidden h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black bg-opacity-90">
            <div class="relative flex h-full w-full max-w-md items-center justify-center p-4 md:h-auto">
                <!-- Modal content -->
                <div
                    class="relative w-full animate-jump-in rounded-xl bg-white shadow animate-duration-300 dark:bg-zinc-950">
                    <!-- Modal header -->
                    <div
                        class="mb-4 flex items-center justify-between rounded-t-xl border-b border-zinc-300 p-4 pb-4 dark:border-zinc-800">
                        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">
                            Agregar razón de rechazo
                        </h3>
                        <button type="button"
                            class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-zinc-400 hover:bg-zinc-200 hover:text-zinc-900 dark:hover:bg-zinc-900 dark:hover:text-white"
                            data-modal-toggle="add-reason-reject">
                            <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form id="formReasonReject" method="POST" class="p-4">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col gap-4">
                            <div>
                                <x-input label="Razón" type="textarea" name="reason" id="reason"
                                    placeholder="Escribe la razón por la cual se rechazo la reseña"
                                    error="{{ false }}" data-message="#message-reason" required="required" />
                                <span class="invalid-feedback hidden text-sm text-red-500" id="message-reason"></span>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end gap-2">
                            <x-button type="button" id="btn-add-reason-reject" text="Agregar" icon="plus"
                                typeButton="primary" />
                            <x-button type="button" data-modal-toggle="add-reason-reject" text="Cancelar"
                                typeButton="secondary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
