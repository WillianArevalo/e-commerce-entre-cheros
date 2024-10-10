 @if ($cart && $cart->items->count())
     @foreach ($cart->items as $item)
         <div class="mb-4 rounded-xl border border-zinc-200 bg-white shadow-md">
             <!-- Producto e Imagen -->
             <div
                 class="flex flex-wrap items-center justify-between gap-4 px-4 pt-4 max-[360px]:flex-col max-[360px]:items-start">
                 <div class="flex items-center gap-4">
                     <div class="flex-shrink-0">
                         <img class="h-20 w-20 rounded-lg border border-zinc-100 object-cover"
                             src="{{ Storage::url($item->product->main_image) }}" alt="{{ $item->product->name }}">
                     </div>
                     <div class="ml-4 flex-1 max-[360px]:ml-0 max-[360px]:mt-4">
                         <h3 class="font-secondary text-base font-semibold text-secondary">
                             {{ $item->product->name ?? 'Sin nombre' }}
                         </h3>
                         <div class="font-secondary mt-1 text-sm text-zinc-500">
                             @if ($item->product->offer_price)
                                 <div>
                                     <span class="text-lg text-zinc-700">
                                         ${{ $item->product->offer_price }}
                                     </span>
                                     <span class="text-sm line-through">
                                         ${{ $item->product->price }}
                                     </span>
                                     <span
                                         class="font-secondary mt-1 block w-max rounded-full bg-purple-100 px-2.5 py-0.5 text-xs font-semibold text-purple-800">
                                         En oferta
                                     </span>
                                 </div>
                             @else
                                 <span class="text-lg text-zinc-700">
                                     {{ $item->product->price_in_currency }}
                                 </span>
                             @endif
                         </div>
                     </div>
                 </div>
                 <div class="mx-auto px-4">
                     <div class="flex items-center justify-center">
                         <form action="{{ route('cart.update', $item->product->id) }}" method="POST"
                             id="form-minus-cart-{{ $item->product->id }}">
                             @csrf
                             <input type="hidden" name="action" value="minus">
                             <button type="button" data-form="#form-minus-cart-{{ $item->product->id }}"
                                 class="btnMinusCart flex h-8 w-8 items-center justify-center rounded-full border border-zinc-400 hover:bg-zinc-100">
                                 <x-icon-store icon="minus" class="h-4 w-4 text-secondary" />
                             </button>
                         </form>
                         <input type="text" name="quantity" id="quantity"
                             class="font-secondary mx-2 h-10 w-14 rounded-lg border-none text-center text-sm focus:border-none focus:outline-none"
                             readonly value="{{ $item->quantity }}" min="1">
                         <form action="{{ route('cart.update', $item->product->id) }}" method="POST"
                             id="form-plus-cart-{{ $item->product->id }}">
                             @csrf
                             <input type="hidden" name="action" value="plus">
                             <button type="button" data-form="#form-plus-cart-{{ $item->product->id }}"
                                 class="btnPlusCart flex h-8 w-8 items-center justify-center rounded-full border border-zinc-400 hover:bg-zinc-100">
                                 <x-icon-store icon="plus" class="h-4 w-4 text-secondary" />
                             </button>
                         </form>
                     </div>
                 </div>
             </div>
             <!-- Cantidad -->


             <!-- Total y Botón Eliminar -->
             <div class="mt-4 flex items-center justify-between border-t border-zinc-200 p-4">
                 <div class="text-lg font-semibold text-secondary">
                     Total: ${{ number_format($item->sub_total, 2) }}
                 </div>
                 <form action="{{ route('cart.remove', $item->product->id) }}" method="POST"
                     id="form-remove-cart-{{ $item->product->id }}">
                     @csrf
                     <x-button-store type="button" typeButton="danger"
                         data-form="#form-remove-cart-{{ $item->product->id }}" onlyIcon="true" icon="delete"
                         id="btnRemoveCart-{{ $item->product->id }}" class="btnRemoveCart" />
                 </form>
             </div>
         </div>
     @endforeach
 @else
     <div
         class="flex flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-zinc-300 bg-white p-20 text-center text-sm text-zinc-500">
         Carrito vacío
         <x-button-store type="a" typeButton="secondary" size="small" icon="store" text="Ir a la tienda"
             href="{{ Route('store') }}" class="w-max" />
     </div>
 @endif
