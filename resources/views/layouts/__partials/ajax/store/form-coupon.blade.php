 <form action="{{ $cart->coupon ? Route('cart.remove-coupon', $cart->coupon->id ?? 0) : Route('cart.apply-coupon') }}"
     method="POST" class="flex flex-col gap-2" id="formApplyCoupon">
     @csrf
     <div class="relative w-full">
         <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
             <x-icon-store icon="coupon" class="h-5 w-5 text-zinc-500 dark:text-zinc-400" />
         </div>
         <input type="text"
             class="w-full rounded-xl border border-zinc-400 px-6 py-3 pl-12 text-sm text-zinc-700 transition duration-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-200"
             id="code" name="code" value="{{ $cart->coupon ? $cart->coupon->code : '' }}"
             placeholder="Código del cupón" {{ $cart->coupon ? 'disabled' : '' }}>
         <div class="{{ !$cart->coupon ? 'hidden' : '' }}" id="remove-coupon-container">
             <div class="absolute inset-y-0 right-0 flex items-center pr-2">
                 <button type="submit" class="rounded-xl bg-red-100 p-2 hover:bg-red-200" id="remove-coupon">
                     <x-icon-store icon="cancel-circle" class="h-4 w-4 text-red-800" />
                 </button>
             </div>
         </div>
     </div>
     <span id="message-coupon"
         class="{{ $cart->coupon ? 'flex' : 'hidden' }} items-center gap-2 text-sm text-green-500">
         <x-icon-store icon="checkmark-circle" class="h-4 w-4 text-green-500" />
         Cupón aplicado
     </span>
     @if (!$cart->coupon)
         <button type="submit" id="apply-coupon"
             class="flex w-max items-center justify-center gap-2 rounded-full border border-zinc-400 bg-white px-4 py-3 text-sm uppercase text-zinc-600 transition-colors hover:bg-zinc-100">
             Aplicar cupón
         </button>
     @endif
 </form>
