@extends('layouts.admin-template')

@section('title', 'Marcas')

@section('content')
    <div class=" rounded-lg dark:border-gray-700 mt-4">
        <div class="dark:bg-gray-800 py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-gray-700">
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Administrar ofertas relámpago
            </h1>
            <p class="text-sm text-gray-400">
                Desde aquí puedes administrar ofertas relámpago que se muestran en la página de inicio
            </p>
        </div>
        <div class="bg-gray-50 dark:bg-gray-900 p-4">
            <div class="mx-auto w-full">
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center" action="{{ route('admin.categories.search') }}"
                                id="formSearchCategorie">
                                @csrf
                                <label for="simple-search" class="sr-only">
                                    Buscar
                                </label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <x-icon icon="search" class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                                    </div>
                                    <input type="text" id="inputSearchCategorie" name="searchCategorie"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Buscar" required="">
                                </div>
                            </form>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <x-button type="a" typeButton="blue" href="{{ route('admin.flash-offers.create') }}"
                                text="Agregar oferta relámpago" icon="add-circle" />
                        </div>
                    </div>
                    <div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-x-auto">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">#</th>
                                    <th scope="col" class="px-4 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Fecha de inicio
                                    </th>
                                    <th scope="col" class="px-4 py-3">Fecha de fin</th>
                                    <th scope="col" class="px-4 py-3">Visualización</th>
                                    <th scope="col" class="px-4 py-3">Estado</th>
                                    <th scope="col" class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($offers->count() == 0)
                                    <tr class="border-b dark:border-gray-700">
                                        <td colspan="4"
                                            class="px-4 py-3 text-center font-medium text-gray-900 dark:text-white">
                                            No hay ofertas relámpago registradas
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($offers as $offer)
                                        <tr class="border-b dark:border-gray-700">
                                            <th scope="row"
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td class="px-4 py-3">
                                                <a href="{{ route('admin.products.show', $offer->product->id) }}"
                                                    class="flex gap-2 items-center dark:hover:bg-gray-700 hover:bg-gray-100 p-2 rounded-lg w-max">
                                                    <img src="{{ Storage::url($offer->product->main_image) }}"
                                                        alt="" class="w-12 h-12 rounded-lg object-cover">
                                                    <div class="flex flex-col">
                                                        <span>{{ $offer->product->name }}</span>
                                                        <span
                                                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300 w-max">
                                                            ${{ $offer->product->offer_price }}
                                                        </span>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span>{{ $offer->start_date }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span>{{ $offer->end_date }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <form action="{{ route('admin.flash-offers.changeStatus') }}"
                                                    id="formChangeShow-{{ $offer->id }}" method="POST">
                                                    @csrf
                                                    <label class="inline-flex items-center cursor-pointe"
                                                        for="{{ $offer->id }}">
                                                        <input type="hidden" name="id" value="{{ $offer->id }}">
                                                        <input id="{{ $offer->id }}" type="checkbox" name="is_showing"
                                                            data-form="#formChangeShow-{{ $offer->id }}"
                                                            data-change="show" value=""
                                                            class="sr-only peer toggleShow"
                                                            {{ $offer->is_showing === 1 ? 'checked' : '' }}>
                                                        <div
                                                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                        </div>
                                                        <span
                                                            class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                            Activo
                                                        </span>
                                                    </label>
                                                </form>
                                            </td>
                                            <td class="px-4 py-3">
                                                <form action="{{ route('admin.flash-offers.changeStatus') }}"
                                                    id="formChangeActive-{{ $offer->id }}" method="POST">
                                                    @csrf
                                                    <label class="inline-flex items-center cursor-pointe"
                                                        for="active-{{ $offer->id }}">
                                                        <input type="hidden" name="id" value="{{ $offer->id }}">
                                                        <input id="active-{{ $offer->id }}" type="checkbox"
                                                            name="is_active"
                                                            data-form="#formChangeActive-{{ $offer->id }}"
                                                            data-change="active" value=""
                                                            class="sr-only peer toggleShow"
                                                            {{ $offer->is_active === 1 ? 'checked' : '' }}>
                                                        <div
                                                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                        </div>
                                                        <span
                                                            class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                            Activar
                                                        </span>
                                                    </label>
                                                </form>
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex gap-2">
                                                    <x-button type="a"
                                                        href="{{ route('admin.flash-offers.edit', $offer->id) }}"
                                                        typeButton="success" icon="edit" text="Editar" />

                                                    <form action="{{ route('admin.flash-offers.destroy', $offer->id) }}"
                                                        id="formDeleteCategorie" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button type="button" data-form="formDeleteCategorie"
                                                            class="buttonDelete" text="Eliminar" icon="delete"
                                                            typeButton="danger" data-modal-target="deleteModal" />
                                                    </form>
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
        </div>
    </div>
@endsection
