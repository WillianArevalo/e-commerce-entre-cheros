 @if ($subcategories->count() > 0)
     @foreach ($subcategories as $subcategorie)
         <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-zinc-900"
             data-value="{{ $subcategorie->id }}" data-input="#subcategorie_id">
             {{ $subcategorie->name }}
         </li>
     @endforeach
 @endif
