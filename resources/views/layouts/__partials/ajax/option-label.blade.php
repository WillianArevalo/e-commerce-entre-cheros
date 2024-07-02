   @if ($labels->count() > 0)
       @foreach ($labels as $label)
           <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700"
               data-value="{{ $label->name }}" data-input="label_id">
               {{ $label->name }}
           </li>
       @endforeach
   @else
       <li class="itemOption text-sm text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-gray-700">
           Sin etiquetas registradas
       </li>
   @endif
