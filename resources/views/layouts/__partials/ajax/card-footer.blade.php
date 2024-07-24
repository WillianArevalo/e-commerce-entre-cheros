 <div class="flex items-center gap-2">
     <form action="{{ route('favorites.add', $product->id) }}" method="POST" id="form-add-favorite-{{ $product->id }}">
         @csrf
         <label class="ui-like">
             <input type="checkbox" class="btn-add-favorite {{ $product->is_favorite ? 'favourite' : '' }}"
                 data-form="#form-add-favorite-{{ $product->id }}" data-card="#{{ $product->id }}">
             <div class="like">
                 <x-icon icon="favourite" class="text-rose-600" fill="" />
             </div>
         </label>
     </form>
     <a href="{{ route('products.details', $product->id) }}"
         class="px-5 py-3 font-primary rounded-lg bg-white text-secondary flex items-center justify-center border border-zinc-300 hover:bg-zinc-100 transition-colors">
         <x-icon icon="arrow-right" class="w-5 h-5 text-current" />
     </a>
 </div>
 <form action="{{ route('cart.add', $product->id) }}" method="POST" id="form-add-cart-{{ $product->id }}">
     @csrf
     <input type="hidden" name="quantity" value="1">
     <button type="button" data-form="#form-add-cart-{{ $product->id }}"
         class="px-5 py-3 font-primary rounded-lg bg-secondary text-white flex items-center justify-center add-to-cart">
         <x-icon icon="shopping-cart-add" class="w-5 h-5 text-current" />
     </button>
 </form>
