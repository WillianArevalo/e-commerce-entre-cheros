<div
    class="{{ $slide ? 'swiper-slide' : '' }} {{ $width }} flex h-max flex-col overflow-hidden rounded-3xl border border-zinc-400 bg-white text-start">
    <!-- Card header -->
    <div>
        <div class="relative mx-4 mt-4">
            <img src="{{ Storage::url($product->main_image) }}" alt=""
                class="h-72 w-full rounded-3xl bg-zinc-50 object-cover">

            <form action="{{ route('favorites.add', $product->id) }}" method="POST"
                id="form-add-favorite-{{ $product->id }}">
                @csrf
                <button type="button"
                    class="btn-add-favorite {{ $product->is_favorite ? 'favorite' : '' }} not-favorite absolute right-0 top-0 m-4 flex items-center justify-center rounded-full border p-2 hover:border-rose-600 hover:bg-rose-600 hover:text-white">
                    <x-icon-store icon="favourite" class="h-5 w-5 text-current" />
                </button>
            </form>

        </div>
        <div class="flex h-[120px] flex-col gap-2 p-4">
            @if ($product->labels->count() > 0)
                <div class="flex gap-2">
                    @foreach ($product->labels as $label)
                        <span
                            class="bg-{{ $label->color }}-100 text-{{ $label->color }}-800 rounded-full px-3 py-1 text-xs font-semibold">
                            {{ $label->name }}
                        </span>
                    @endforeach
                </div>
            @endif
            <a href="{{ Route('products.details', $product->slug) }}"
                class="font-league-spartan text-2xl font-bold text-secondary underline underline-offset-4">
                {{ $product->name }}
            </a>
            <p class="text-truncate-multiline font-secondary text-sm text-zinc-800">
                {{ $product->short_description }}
            </p>
        </div>
    </div>
    <!-- Card end header -->

    <!-- Card footer -->
    <div class="mt-auto flex items-center border-t border-zinc-400 bg-zinc-100 p-4" id="{{ $product->id }}">
        <div class="flex w-full items-center justify-between gap-2">

            <!-- Add to favorite -->
            {{-- <form action="{{ route('favorites.add', $product->id) }}" method="POST"
                id="form-add-favorite-{{ $product->id }}">
                @csrf
                <label class="ui-like">
                    <input type="checkbox" class="btn-add-favorite {{ $product->is_favorite ? 'favourite' : '' }}"
                        data-form="#form-add-favorite-{{ $product->id }}" data-card="#{{ $product->id }}">
                    <div class="like">
                        <x-icon-store icon="favourite" class="text-rose-600" fill="" />
                    </div>
                </label>
            </form> --}}
            <div>
                @if ($product->offer_price)
                    <span
                        class="font-secondary text-2xl font-semibold text-secondary">${{ $product->offer_price }}</span>
                    <span class="font-secondary text-base text-zinc-500 line-through">${{ $product->price }}</span>
                @else
                    <span
                        class="font-secondary text-2xl font-semibold text-secondary">{{ $product->price_in_currency }}</span>
                @endif
            </div>
            <!-- Add to favorite end -->

            <!-- Add to cart -->
            <form action="{{ route('cart.add', $product->id) }}" method="POST"
                id="form-add-cart-{{ $product->id }}">
                @csrf
                <input type="hidden" name="quantity" value="1">
                <button type="button" data-form="#form-add-cart-{{ $product->id }}"
                    class="add-to-cart flex items-center justify-center rounded-2xl bg-secondary px-4 py-3 font-league-spartan text-sm text-white hover:bg-blue-950">
                    <x-icon-store icon="shopping-cart-add" class="h-5 w-5 text-current" />
                    <span class="ml-2">
                        Agregar al carrito
                    </span>
                </button>
            </form>
            <!-- Add to cart end -->
        </div>
    </div>
    <!-- Card end footer -->
</div>
