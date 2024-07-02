 @if ($categories->count() == 0)
     <tr class="border-b dark:border-gray-700">
         <td colspan="4" class="px-4 py-3 text-center font-medium text-gray-900 dark:text-white">
             No hay categorías
         </td>
     </tr>
 @else
     @foreach ($categories as $categorie)
         <tr class="border-b dark:border-gray-700">
             <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                 <img src="{{ Storage::url($categorie->image) }}" alt="Product 1"
                     class="w-16 h-16 object-cover rounded-lg">
             </th>
             <td class="px-4 py-3">
                 <span>{{ $categorie->name }}</span>
             </td>
             <td class="px-4 py-3">
                 @if ($categorie->subcategories->isNotEmpty())
                     <div class="flex flex-col gap-2">
                         @foreach ($categorie->subcategories as $subcategorie)
                             <div
                                 class="relative flex items-center gap-2 px-3 py-2 rounded-lg dark:bg-gray-700 w-max bg-gray-100">
                                 <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                 {{ $subcategorie->name }}
                                 <button class="dark:text-white text-gray-600 btnDropDown" type="button">
                                     <x-icon icon="more-hortizontal" class="w-5 h-5 text-current" />
                                 </button>
                                 <div
                                     class="hidden absolute top-10 z-30 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 dropDownContent">
                                     <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                         <li>
                                             <a href="{{ route('admin.subcategories.edit', $subcategorie->id) }}"
                                                 class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                 Editar
                                             </a>
                                         </li>
                                     </ul>
                                     <div class="py-1">
                                         <form action="{{ route('admin.subcategories.destroy', $subcategorie->id) }}"
                                             method="POST" id="formDeleteSubCategorie">
                                             @csrf
                                             @method('DELETE')
                                             <button type="button" data-form="formDeleteSubCategorie"
                                                 class="block text-start w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white buttonDelete">
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
                     <a href="{{ route('admin.categories.edit', $categorie->id) }}"
                         class="text-white font-medium bg-emerald-600 p-2.5 rounded-lg flex items-center gap-2 buttonUpdateCategorie hover:bg-emerald-800 transition-colors">
                         <x-icon icon="edit" class="w-5 h-5 text-current" />
                         Editar
                     </a>
                     <form action="{{ route('admin.categories.destroy', $categorie->id) }}" id="formDeleteCategorie"
                         method="POST">
                         @csrf
                         @method('DELETE')
                         <button type="button"
                             class="bg-red-600 text-white p-2.5 rounded-lg flex items-center gap-2 buttonDelete hover:bg-red-800 transition-colors"
                             data-form="formDeleteCategorie">
                             <x-icon icon="delete" class="w-5 h-5 text-current" />
                             Eliminar
                         </button>
                     </form>
                 </div>
             </td>
         </tr>
     @endforeach
 @endif
