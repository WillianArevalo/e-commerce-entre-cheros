 @if ($labels->count() > 0)
     @foreach ($labels as $label)
         <li class="itemOption rounded-lg px-4 py-2.5 text-sm text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-zinc-900"
             data-value="{{ $label->name }}" data-input="#label_id">
             {{ $label->name }}
         </li>
     @endforeach
 @else
     <li class="itemOption px-4 py-2.5 text-sm text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
         Sin etiquetas registradas
     </li>
 @endif
