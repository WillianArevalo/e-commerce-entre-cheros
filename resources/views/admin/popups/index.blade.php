@extends('layouts.admin-template')

@section('title', 'Anuncios')

@section('content')
    <div class=" rounded-lg dark:border-gray-700 mt-4">
        <div class="dark:bg-gray-800 py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-gray-700">
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Administrar anuncios
            </h1>
            <p class="text-sm text-gray-400">
                Desde aquí puedes administrar los anuncios que se muestran en la página principal
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
                            <x-button type="a" typeButton="blue" href="{{ route('admin.popups.create') }}"
                                text="Agregar anuncio" icon="add-circle" />
                        </div>
                    </div>
                    <div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-x-auto">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">#</th>
                                    <th scope="col" class="px-4 py-3">Producto asignado</th>
                                    <th scope="col" class="px-4 py-3">Fecha de inicio</th>
                                    <th scope="col" class="px-4 py-3">Fecha de fin</th>
                                    <th scope="col" class="px-4 py-3">Visualizar en el home</th>
                                    <th scope="col" class="px-4 py-3">Estado</th>
                                    <th scope="col" class="px-4 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

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
