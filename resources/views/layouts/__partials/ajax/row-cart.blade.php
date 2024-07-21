+ @if ($cart)
    @foreach ($cart as $product)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-start">
                    <div class="flex-shrink-0 h-14 w-14">
                        <img class="h-full w-full rounded-lg object-cover" src="{{ Storage::url($product['image']) }}"
                            alt="{{ $product['name'] }}">
                    </div>
                    <div class="ml-4">
                        <div class="text-sm text-secondary font-semibold font-secondary">
                            {{ $product['name'] }}
                        </div>
                        <div class="text-sm text-gray-500 font-secondary">
                            ${{ $product['price'] }}
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <div class="flex items-center">
                    <form action="{{ route('cart.minus', $product['id']) }}" method="POST"
                        id="form-minus-cart-{{ $product['id'] }}">
                        @csrf
                        <button type="button" data-form="#form-minus-cart-{{ $product['id'] }}"
                            class="flex items-center justify-center hover:bg-zinc-100 border border-zinc-300 rounded-full w-8 h-8 btnMinusCart">
                            <x-icon icon="minus" class="w-4 h-4 text-secondary" />
                        </button>
                    </form>
                    <input type="text" name="quantity" id="quantity"
                        class="w-16 h-12 text-center font-secondary border-none rounded-lg focus:outline-none focus:border-none text-sm"
                        readonly value="{{ $product['quantity'] }}" min="1">
                    <form action="{{ route('cart.plus', $product['id']) }}" method="POST"
                        id="form-plus-cart-{{ $product['id'] }}">
                        @csrf
                        <button type="button" data-form="#form-plus-cart-{{ $product['id'] }}"
                            class="flex items-center justify-center hover:bg-zinc-100 border border-zinc-300 rounded-full w-8 h-8 btnPlusCart">
                            <x-icon icon="plus" class="w-4 h-4 text-secondary" />
                        </button>
                    </form>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-secondary">
                ${{ $product['subtotal'] }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-start text-sm font-medium">
                <form action="{{ route('cart.remove', $product['id']) }}" method="POST"
                    id="form-remove-cart-{{ $product['id'] }}">
                    @csrf
                    <button type="button" data-form="#form-remove-cart-{{ $product['id'] }}"
                        class="p-2 rounded-lg bg-red-100 text-red-800 hover:bg-red-200 btnRemoveCart">
                        <x-icon icon="delete" class="w-5 h-5 text-current" />
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td class="px-6 py-4 whitespace-nowrap text-center" colspan="4">
            Carrito vacío
        </td>
    </tr>
@endif
