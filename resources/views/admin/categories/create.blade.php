@extends('layouts.admin-template')

@section('title', 'Nueva categoría')

@section('content')
    <div class="p-4 rounded-lg mt-4 border border-gray-200 dark:border-gray-700">
        <div class="dark:bg-gray-800 py-3 px-4 rounded-lg shadow-sm flex items-center gap-2">
            <span class="bg-blue-500 p-2 rounded-lg dark:bg-opacity-15 bg-opacity-40">
                <x-icon icon="bookmark-add" class="w-5 h-5 dark:text-blue-300 text-blue-600" />
            </span>
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Nueva categoría
            </h1>
        </div>
        <div class="bg-white dark:bg-gray-900 mt-4">
            <div class="mx-auto w-full">
                <form action="{{ route('admin.categories.store') }}" class="flex flex-col gap-4" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="flex gap-4">
                        <div class="w-max flex-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tipo de categoría
                            </label>
                            <input type="hidden" id="typeCategorie" name="typeCategorie" value="principal">
                            <div class="relative">
                                <div
                                    class="selected border-2 border-gray-300 bg-gray-50 dark:border-gray-600 rounded-lg py-2.5 dark:bg-gray-700 w-full px-4 dark:text-white text-sm flex items-center justify-between">
                                    <span class="itemSelected">Principal</span>
                                    <x-icon icon="arrow-down" class="w-5 h-5 dark:text-white text-gray-500" />
                                </div>
                                <ul
                                    class="absolute z-10 w-full mt-2 py-1 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 selectOptions hidden">
                                    <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
                                        data-value="principal" data-input="typeCategorie">
                                        Principal
                                    </li>
                                    <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
                                        data-value="secundaria" data-input="typeCategorie">
                                        Secundaria
                                    </li>
                                </ul>
                            </div>
                            @error('typeCategorie')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex-[2]">
                            <div class="w-full hidden" id="categorieParentSelect">
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Categoría padre
                                </label>
                                <input type="hidden" id="categorieParent" name="categorie_id">
                                <div class="relative">
                                    <div
                                        class="selected border-2 border-gray-300 bg-gray-50 dark:border-gray-600 rounded-lg py-2.5 dark:bg-gray-700 w-full px-4 dark:text-white text-sm flex items-center justify-between">
                                        <span class="itemSelected">
                                            Selecciona la categoría principal
                                        </span>
                                        <x-icon icon="arrow-down" class="w-5 h-5 dark:text-white text-gray-500" />
                                    </div>
                                    <ul
                                        class="absolute z-10 w-full mt-2 py-1 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 selectOptions hidden">
                                        @if ($categories->count() > 0)
                                            @foreach ($categories as $categorie)
                                                <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
                                                    data-value="{{ $categorie->id }}" data-input="categorieParent">
                                                    {{ $categorie->name }}
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                @error('categorieParent')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nombre
                        </label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Nombre de la categoría" required="" value="{{ old('name') }}">
                    </div>
                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Imagen
                        </label>
                        <div class="flex items-center justify-center w-full">
                            <label for="imageCategorie"
                                class="flex flex-col items-center justify-center w-full h-80 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-transparent hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-800 @error('image') is-invalid  @enderror">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <x-icon icon="cloud-upload" class="w-12 h-12 text-gray-400 dark:text-gray-500" />
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Clic para agregar </span> o desliza la imagen</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, WEBP</p>
                                </div>
                                <input id="imageCategorie" type="file" class="hidden" name="image" />
                                <img src="" alt="Preview Image" id="previewImage"
                                    class="w-56 h-64 object-cover hidden m-10">
                            </label>
                        </div>
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <button type="submit"
                            class="w-max flex items-center justify-center text-white bg-tertiary hover:bg-blue-600 dark:bg-secondary dark:hover:bg-blue-950 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-3  focus:outline-none dark:focus:ring-primary-800 gap-2">
                            <x-icon icon="plus" class="w-4 h-4 text-current" />
                            Agregar
                        </button>
                        <a href="{{ route('admin.categories.index') }}"
                            class="px-5 py-3 dark:hover:bg-gray-950 bg-gray-200 dark:bg-gray-950 dark:bg-opacity-30 hover:bg-gray-300 rounded-lg dark:text-white text-sm font-medium">
                            Regresar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
