 @if ($cart && $cart->items->count())
     @foreach ($cart->items as $item)
         <tr>
             <td class="whitespace-nowrap px-6 py-4">
                 <div class="flex items-center">
                     <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center">
                         <img class="h-full w-full rounded-lg border border-zinc-100 object-cover"
                             src="{{ Storage::url($item->product->main_image) }}" alt="{{ $item->product->name }}">
                     </div>
                     <div class="ml-4">
                         <div class="font-secondary text-base font-semibold text-secondary">
                             {{ $item->product->name ?? 'Sin nombre' }}
                         </div>
                         <div class="font-secondary text-sm text-zinc-500">
                             @if ($item->product->offer_price)
                                 <div>
                                     <div>
                                         <span class="text-sm text-zinc-700">
                                             ${{ $item->product->offer_price }}
                                         </span>
                                         <span class="text-xs line-through">
                                             ${{ $item->product->price }}
                                         </span>
                                     </div>
                                     <span
                                         class="font-secondary me-2 mt-1 block w-max rounded-full bg-purple-100 px-2.5 py-0.5 text-xs font-semibold text-purple-800">
                                         En oferta
                                     </span>
                                 </div>
                             @else
                                 <span class="text-sm text-zinc-700">
                                     {{ $item->product->price_in_currency }}
                                 </span>
                             @endif
                         </div>
                     </div>
                 </div>
             </td>
             <td class="whitespace-nowrap px-6 py-4 text-sm text-zinc-500">
                 <div class="flex items-center">
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
                         class="font-secondary h-12 w-16 rounded-lg border-none text-center text-sm focus:border-none focus:outline-none"
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
             </td>
             <td class="font-secondary whitespace-nowrap px-6 py-4 text-sm text-zinc-500">
                 ${{ number_format($item->sub_total, 2) }}
             </td>
             <td class="whitespace-nowrap px-6 py-4 text-start text-sm font-medium">
                 <form action="{{ route('cart.remove', $item->product->id) }}" method="POST"
                     id="form-remove-cart-{{ $item->product->id }}">
                     @csrf
                     <x-button-store type="button" typeButton="danger"
                         data-form="#form-remove-cart-{{ $item->product->id }}" onlyIcon="true" icon="delete"
                         id="btnRemoveCart-{{ $item->product->id }}" class="btnRemoveCart" size="small" />
                 </form>
             </td>
         </tr>
     @endforeach
 @else
     <tr class="border-t border-zinc-100">
         <td class="whitespace-nowrap px-6 py-4 text-center font-league-spartan text-sm text-zinc-500" colspan="4">
             Carrito vacío
         </td>
     </tr>
 @endif
