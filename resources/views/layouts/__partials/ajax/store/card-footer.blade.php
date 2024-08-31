 <div class="flex items-center gap-2">
     <form action="{{ route('favorites.add', $product->id) }}" method="POST" id="form-add-favorite-{{ $product->id }}">
         @csrf
         <label class="ui-like">
             <input type="checkbox" class="btn-add-favorite {{ $product->is_favorite ? 'favourite' : '' }}"
                 data-form="#form-add-favorite-{{ $product->id }}" data-card="#{{ $product->id }}">
             <div class="like">
                 <x-icon-store icon="favourite" class="text-rose-600" fill="" />
             </div>
         </label>
     </form>
     <a href="{{ route('products.details', $product->id) }}"
         class="flex items-center justify-center rounded-lg border border-zinc-400 bg-white px-5 py-3 font-league-spartan text-secondary transition-colors hover:bg-zinc-100">
         <x-icon-store icon="arrow-right" class="h-5 w-5 text-current" />
     </a>
 </div>
 <form action="{{ route('cart.add', $product->id) }}" method="POST" id="form-add-cart-{{ $product->id }}">
     @csrf
     <input type="hidden" name="quantity" value="1">
     <button type="button" data-form="#form-add-cart-{{ $product->id }}"
         class="add-to-cart flex items-center justify-center rounded-lg bg-secondary px-5 py-3 font-league-spartan text-white">
         <x-icon-store icon="shopping-cart-add" class="h-5 w-5 text-current" />
     </button>
 </form>
