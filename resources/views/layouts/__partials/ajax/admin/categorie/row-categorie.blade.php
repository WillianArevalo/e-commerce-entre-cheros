  @if ($categories->count() == 0)
      <tr>
          <td colspan="4" class="px-4 py-3 text-center font-medium text-zinc-900 dark:text-white">
              No hay categorías
          </td>
      </tr>
  @else
      @foreach ($categories as $category)
          <tr class="hover:bg-zinc-100 dark:hover:bg-zinc-950">
              <th scope="row" class="whitespace-nowrap px-4 py-3 font-medium text-zinc-900 dark:text-white">
                  <img src="{{ Storage::url($category->image) }}" alt="Product 1"
                      class="h-16 w-16 rounded-lg object-cover">
              </th>
              <td class="px-4 py-3">
                  <span>{{ $category->name }}</span>
              </td>
              <td class="px-4 py-3">
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
                                      class="dropDownContent absolute top-10 z-30 hidden w-44 overflow-hidden rounded-lg bg-white shadow dark:bg-zinc-900">
                                      <ul class="p-2 text-sm text-zinc-700 dark:text-zinc-200">
                                          <li>
                                              <button type="button"
                                                  data-href="{{ route('admin.subcategories.edit', $subcategorie->id) }}"
                                                  data-action="{{ route('admin.subcategories.update', $subcategorie->id) }}"
                                                  class="editCategorie flex w-full items-center gap-2 rounded-lg px-4 py-2 text-start hover:bg-zinc-100 dark:hover:bg-zinc-800 dark:hover:text-white">
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
                                                      class="buttonDelete flex w-full items-center gap-2 rounded-lg px-4 py-2 text-start hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-800">
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
              </td>
              <td class="px-4 py-3">
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
              </td>
          </tr>
      @endforeach
  @endif
