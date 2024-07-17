    @if ($categories->count() == 0)
        <tr class="border-b dark:border-gray-700">
            <td colspan="4" class="px-4 py-3 text-center font-medium text-gray-900 dark:text-white">
                No hay categorías
            </td>
        </tr>
    @else
        @foreach ($categories as $category)
            <tr class="border-b dark:border-zinc-900">
                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <img src="{{ Storage::url($category->image) }}" alt="Product 1"
                        class="w-16 h-16 object-cover rounded-lg">
                </th>
                <td class="px-4 py-3">
                    <span>{{ $category->name }}</span>
                </td>
                <td class="px-4 py-3">
                    @if ($category->subcategories->isNotEmpty())
                        <div class="flex flex-col gap-2">
                            @foreach ($category->subcategories as $subcategorie)
                                <div
                                    class="relative flex items-center gap-2 px-3 py-2 rounded-2xl bg-blue-100 text-blue-900 dark:bg-blue-900 dark:text-blue-300 dark:bg-opacity-30 w-max">
                                    {{ $subcategorie->name }}
                                    <button class="dark:text-white text-gray-600 btnDropDown" type="button">
                                        <x-icon icon="more-hortizontal" class="w-5 h-5 text-current" />
                                    </button>
                                    <div
                                        class="hidden absolute top-10 z-30 w-44 bg-white divide-y divide-gray-100 shadow dark:bg-zinc-950 dark:divide-zinc-800 dropDownContent rounded-lg overflow-hidden">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                            <li>
                                                <button type="button"
                                                    data-href="{{ route('admin.subcategories.edit', $subcategorie->id) }}"
                                                    data-action="{{ route('admin.subcategories.update', $subcategorie->id) }}"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-zinc-900 dark:hover:text-white w-full text-start editCategorie">
                                                    Editar
                                                </button>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <form action="{{ route('admin.subcategories.destroy', $subcategorie->id) }}"
                                                method="POST" id="formDeleteSubCategorie">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" data-form="formDeleteSubCategorie"
                                                    class="block text-start w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-zinc-900 dark:text-white buttonDelete">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <span>No hay subcategorías</span>
                    @endif
                </td>
                <td class="px-4 py-3">
                    <div class="flex gap-2">
                        <x-button type="button" class="editCategorie"
                            data-href="{{ route('admin.categories.edit', $category->id) }}"
                            data-action="{{ route('admin.categories.update', $category->id) }}" text="Editar"
                            icon="edit" typeButton="success" />
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" id="formDeleteCategorie"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button type="button" data-form="formDeleteCategorie" text="Eliminar" icon="delete"
                                typeButton="danger" class="buttonDelete" />
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    @endif
