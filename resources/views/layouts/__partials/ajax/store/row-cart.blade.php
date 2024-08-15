+ @if ($cart)
    @foreach ($cart as $product)
        <tr>
            <td class="whitespace-nowrap px-6 py-4">
                <div class="flex items-center">
                    <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center">
                        <img class="h-full w-full rounded-lg border border-zinc-100 object-cover"
                            src="{{ Storage::url($product['image']) }}" alt="{{ $product['name'] }}">
                    </div>
                    <div class="ml-4">
                        <div class="font-secondary text-base font-semibold text-secondary">
                            {{ $product['name'] }}
                        </div>
                        <div class="font-secondary text-sm text-zinc-500">
                            @if ($product['offer_price'])
                                <div>
                                    <div>
                                        <span class="text-sm text-zinc-700">
                                            ${{ $product['offer_price'] }}
                                        </span>
                                        <span class="text-xs line-through">
                                            ${{ $product['price'] }}
                                        </span>
                                    </div>
                                    <span
                                        class="me-2 mt-1 block rounded-full bg-purple-100 px-2.5 py-0.5 font-secondary text-xs font-medium text-purple-800">
                                        En oferta
                                    </span>
                                </div>
                            @else
                                <span class="text-sm text-zinc-700">
                                    ${{ $product['price'] }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </td>
            <td class="whitespace-nowrap px-6 py-4 text-sm text-zinc-500">
                <div class="flex items-center">
                    <form action="{{ route('cart.minus', $product['id']) }}" method="POST"
                        id="form-minus-cart-{{ $product['id'] }}">
                        @csrf
                        <button type="button" data-form="#form-minus-cart-{{ $product['id'] }}"
                            class="btnMinusCart flex h-8 w-8 items-center justify-center rounded-full border border-zinc-300 hover:bg-zinc-100">
                            <x-icon icon="minus" class="h-4 w-4 text-secondary" />
                        </button>
                    </form>
                    <input type="text" name="quantity" id="quantity"
                        class="h-12 w-16 rounded-lg border-none text-center font-secondary text-sm focus:border-none focus:outline-none"
                        readonly value="{{ $product['quantity'] }}" min="1">
                    <form action="{{ route('cart.plus', $product['id']) }}" method="POST"
                        id="form-plus-cart-{{ $product['id'] }}">
                        @csrf
                        <button type="button" data-form="#form-plus-cart-{{ $product['id'] }}"
                            class="btnPlusCart flex h-8 w-8 items-center justify-center rounded-full border border-zinc-300 hover:bg-zinc-100">
                            <x-icon icon="plus" class="h-4 w-4 text-secondary" />
                        </button>
                    </form>
                </div>
            </td>
            <td class="whitespace-nowrap px-6 py-4 font-secondary text-sm text-zinc-500">
                ${{ number_format($product['subtotal'], 2) }}
            </td>
            <td class="whitespace-nowrap px-6 py-4 text-start text-sm font-medium">
                <form action="{{ route('cart.remove', $product['id']) }}" method="POST"
                    id="form-remove-cart-{{ $product['id'] }}">
                    @csrf
                    <button type="button" data-form="#form-remove-cart-{{ $product['id'] }}"
                        class="btnRemoveCart rounded-lg bg-red-100 p-2 text-red-800 hover:bg-red-200">
                        <x-icon icon="delete" class="h-5 w-5 text-current" />
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@else
    <tr class="border-t border-zinc-100">
        <td class="whitespace-nowrap px-6 py-4 text-center font-primary" colspan="4">
            Carrito vacío
        </td>
    </tr>
@endif
