 @if ($status === 1)
     <span
         class="rounded-full border-2 border-green-300 bg-green-200 px-4 py-1 font-secondary text-xs font-medium text-green-800 dark:border-green-400 dark:bg-green-800 dark:text-green-100">
         Activo
     </span>
 @else
     <span
         class="rounded-full border-2 border-red-300 bg-red-200 px-4 py-1 font-secondary text-xs font-medium text-red-800 dark:border-red-400 dark:bg-red-800 dark:text-red-100">
         Inactivo
     </span>
 @endif
