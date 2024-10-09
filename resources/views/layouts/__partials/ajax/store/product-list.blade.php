 @if ($products->count() > 0)
     @foreach ($products as $product)
         <x-card-product :product="$product" :slide="false" width="w-auto" />
     @endforeach
 @else
     <p class="text-sm text-zinc-600 md:text-base">No hay productos que mostrar</p>
 @endif
