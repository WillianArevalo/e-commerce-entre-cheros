@extends('layouts.admin-template')

@section('title', 'Editar categoría')

@section('content')
    <div class="mt-4">
        <div class="dark:bg-gray-800 py-4 px-4 shadow-sm flex flex-col items-start border-y dark:border-gray-700">
            <a href="{{ route('admin.categories.index') }}"
                class="text-gray-500 dark:text-gray-400 flex items-center justify-center gap-1 text-sm hover:underline hover:text-gray-600">
                <x-icon icon="arrow-left-02" class="w-4 h-4 text-current" />
                Regresar a categorías
            </a>
            <h1 class="text-2xl dark:text-blue-400 font-secondary text-secondary font-bold">
                Editar categoría
            </h1>
        </div>
        <div class="bg-white dark:bg-gray-900 p-4">
            <div class="mx-auto w-full">
                <form action="{{ route('admin.categories.update', $categorie->id) }}" class="flex flex-col gap-4"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex gap-4">
                        <div class="w-max flex-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tipo de categoría
                            </label>
                            <input type="hidden" id="typeCategorie" name="typeCategorie"
                                @if (isset($type)) value="{{ $type }}" @endif>
                            <div class="relative">
                                <div
                                    class="selected border-2 border-gray-300 bg-gray-50 dark:border-gray-600 rounded-lg py-2.5 dark:bg-gray-700 w-full px-4 dark:text-white text-sm flex items-center justify-between">
                                    <span class="itemSelected">
                                        @if (isset($type))
                                            Secundaria
                                        @else
                                            Principal
                                        @endif
                                    </span>
                                    <x-icon icon="arrow-down" class="w-5 h-5 dark:text-white text-gray-500" />
                                </div>
                                <ul
                                    class="absolute z-10 w-full mt-2 py-1 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 selectOptions hidden">
                                    <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
                                        data-value="principal" data-input="#typeCategorie">
                                        Principal
                                    </li>
                                    <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
                                        data-value="secundaria" data-input="#typeCategorie">
                                        Secundaria
                                    </li>
                                </ul>
                            </div>
                            @error('typeCategorie')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex-[2]">
                            <div class="w-full @if (isset($type)) block @else opacity-0 @endif"
                                id="categorieParentSelect">
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Categoría padre
                                </label>
                                <input type="hidden" id="categorieParent" name="categorie_id"
                                    @if (isset($type)) value="{{ $categorie->categorie_id }}" @endif>
                                <div class="relative">
                                    <div
                                        class="selected border-2 border-gray-300 bg-gray-50 dark:border-gray-600 rounded-lg py-2.5 dark:bg-gray-700 w-full px-4 dark:text-white text-sm flex items-center justify-between">
                                        <span class="itemSelected">
                                            @if (isset($categorie->categorie->name))
                                                {{ $categorie->categorie->name }}
                                            @else
                                                Selecciona la categoría principal
                                            @endif
                                        </span>
                                        <x-icon icon="arrow-down" class="w-5 h-5 dark:text-white text-gray-500" />
                                    </div>
                                    <ul
                                        class="absolute z-10 w-full mt-2 py-1 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 selectOptions hidden">
                                        @if ($categories->count() > 0)
                                            @foreach ($categories as $category)
                                                <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
                                                    data-value="{{ $category->id }}" data-input="#categorieParent">
                                                    {{ $category->name }}
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
                            placeholder="Nombre de la categoría" required="" value="{{ $categorie->name }}">
                    </div>
                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Imagen
                        </label>
                        <div class="flex items-center justify-center w-full">
                            <label for="imageCategorie"
                                class="flex flex-col items-center justify-center w-full h-80 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-transparent hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-800 @error('image') is-invalid  @enderror">
                                <div class="flex-col items-center justify-center pt-5 pb-6 hidden">
                                    <x-icon icon="cloud-upload" class="w-12 h-12 text-gray-400 dark:text-gray-500" />
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Clic para agregar </span> o desliza la imagen</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, WEBP</p>
                                </div>
                                <input id="imageCategorie" type="file" class="hidden" name="image" />
                                <img src="{{ Storage::url($categorie->image) }}" alt="Preview Image" id="previewImage"
                                    class="w-56 h-64 object-cover m-10">
                            </label>
                        </div>
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <x-button type="submit" icon="edit" typeButton="success" text="Editar categoría" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
