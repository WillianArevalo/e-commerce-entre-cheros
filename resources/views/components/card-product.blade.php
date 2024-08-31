<div
    class="{{ $slide ? 'swiper-slide' : '' }} {{ $width }} flex h-[530px] flex-col overflow-hidden rounded-lg border border-zinc-400 bg-white text-start">
    <div class="flex-grow">
        <img src="{{ Storage::url($product->main_image) }}" alt="" class="h-72 w-full object-cover">
        <div class="p-4">
            <h3 class="font-league-spartan text-2xl font-bold text-secondary">
                {{ $product->name }}
            </h3>
            <p class="text-wrap font-secondary text-sm text-zinc-800">
                {{ $product->short_description }}
            </p>
            <div class="mt-2">
                @if ($product->offer_price)
                    <span class="font-secondary text-xl font-semibold text-secondary">${{ $product->offer_price }}</span>
                    <span class="font-secondary text-sm text-zinc-400 line-through">${{ $product->price }}</span>
                @else
                    <span
                        class="font-secondary text-xl font-semibold text-secondary">{{ $product->price_in_currency }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="mt-auto flex items-end justify-between border-t p-4" id="{{ $product->id }}">
        <div class="flex items-center gap-2">
            <form action="{{ route('favorites.add', $product->id) }}" method="POST"
                id="form-add-favorite-{{ $product->id }}">
                @csrf
                <label class="ui-like">
                    <input type="checkbox" class="btn-add-favorite {{ $product->is_favorite ? 'favourite' : '' }}"
                        data-form="#form-add-favorite-{{ $product->id }}" data-card="#{{ $product->id }}">
                    <div class="like">
                        <x-icon-store icon="favourite" class="text-rose-600" fill="" />
                    </div>
                </label>
            </form>
            <a href="{{ route('products.details', $product->slug) }}"
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
    </div>
</div>
