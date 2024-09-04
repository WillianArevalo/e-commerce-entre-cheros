 @if ($status === 1)
     <span
         class="inline-block rounded-full bg-green-100 px-2 py-1 text-xs font-semibold uppercase text-green-500 dark:bg-green-900 dark:text-green-300"">
         Activo
     </span>
 @else
     <span
         class="inline-block rounded-full bg-red-100 px-2 py-1 text-xs font-semibold uppercase text-red-500 dark:bg-red-900 dark:text-red-300"">
         Inactivo
     </span>
 @endif
