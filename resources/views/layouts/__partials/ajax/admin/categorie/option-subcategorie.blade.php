 @if ($subcategories->count() > 0)
     @foreach ($subcategories as $subcategorie)
         <li class="itemOption rounded-lg px-4 py-2.5 text-sm text-zinc-900 hover:bg-zinc-100 dark:text-white dark:hover:bg-zinc-900"
             data-value="{{ $subcategorie->id }}" data-input="#subcategorie_id">
             {{ $subcategorie->name }}
         </li>
     @endforeach
 @endif
