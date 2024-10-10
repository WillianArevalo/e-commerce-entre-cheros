 @if ($categories->count() == 0)
     <x-tr>
         <x-td colspan="4">
             <div class="p-10 text-center">
                 No hay categorías
             </div>
         </x-td>
     </x-tr>
 @else
     @foreach ($categories as $category)
         <x-tr section="body">
             <x-td>
                 <img src="{{ Storage::url($category->image) }}" alt="Product 1"
                     class="h-10 w-10 rounded-lg object-cover sm:h-16 sm:w-16">
             </x-td>
             <x-td>
                 <span class="text-nowrap">{{ $category->name }}</span>
             </x-td>
             <x-td>
                 @if ($category->subcategories->isNotEmpty())
                     <div class="flex flex-col gap-2">
                         @foreach ($category->subcategories as $subcategorie)
                             <div
                                 class="relative flex w-max items-center gap-2 rounded-lg border px-4 py-2 dark:border-zinc-800">
                                 {{ $subcategorie->name }}
                                 <button class="btnDropDown text-zinc-600 dark:text-white" type="button">
                                     <x-icon icon="more-hortizontal" class="h-5 w-5 text-current" />
                                 </button>
                                 <div
                                     class="dropDownContent absolute right-0 top-11 z-30 hidden w-28 rounded-lg border border-zinc-400 bg-white p-2 dark:border-zinc-800 dark:bg-zinc-950">
                                     <ul class="text-sm text-zinc-700 dark:text-zinc-200">
                                         <li>
                                             <button type="button"
                                                 data-href="{{ route('admin.subcategories.edit', $subcategorie->id) }}"
                                                 data-action="{{ route('admin.subcategories.update', $subcategorie->id) }}"
                                                 class="editCategorie flex w-full items-center gap-1 rounded-lg px-2 py-2 text-emerald-700 hover:bg-emerald-100 dark:text-emerald-400 dark:hover:bg-emerald-950 dark:hover:bg-opacity-20">
                                                 <x-icon icon="edit" class="h-4 w-4 text-current" />
                                                 Editar
                                             </button>
                                         </li>
                                         <li>
                                             <form
                                                 action="{{ route('admin.subcategories.destroy', $subcategorie->id) }}"
                                                 method="POST" id="formDeleteSubCategorie-{{ $subcategorie->id }}">
                                                 @csrf
                                                 @method('DELETE')
                                                 <button type="button"
                                                     data-form="formDeleteSubCategorie-{{ $subcategorie->id }}"
                                                     data-modal-target="deleteModal" data-modal-toggle="deleteModal"
                                                     class="buttonDelete flex w-full items-center gap-1 rounded-lg px-2 py-2 text-red-700 hover:bg-red-100 dark:text-red-400 dark:hover:bg-red-950 dark:hover:bg-opacity-20">
                                                     <x-icon icon="delete" class="h-4 w-4 text-current" />
                                                     Eliminar
                                                 </button>
                                             </form>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         @endforeach
                     </div>
                 @else
                     <span>No hay subcategorías</span>
                 @endif
             </x-td>
             <x-td>
                 <div class="flex gap-2">
                     <x-button type="button" class="editCategorie" onlyIcon="true"
                         data-href="{{ route('admin.categories.edit', $category->id) }}"
                         data-action="{{ route('admin.categories.update', $category->id) }}" icon="edit"
                         typeButton="success" />
                     <form action="{{ route('admin.categories.destroy', $category->id) }}"
                         id="formDeleteCategorie-{{ $category->id }}" method="POST">
                         @csrf
                         @method('DELETE')
                         <x-button type="button" data-form="formDeleteCategorie-{{ $category->id }}" onlyIcon="true"
                             icon="delete" typeButton="danger" data-modal-target="deleteModal"
                             data-modal-toggle="deleteModal" class="buttonDelete" />
                     </form>
                 </div>
             </x-td>
         </x-tr>
     @endforeach
 @endif
