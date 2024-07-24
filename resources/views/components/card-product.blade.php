  <div
      class="{{ $slide ? 'swiper-slide' : '' }} bg-white border border-zinc-300 flex flex-col text-start rounded-lg overflow-hidden h-max {{ $width }}">
      <div>
          <img src="{{ Storage::url($product->main_image) }}" alt="" class="w-full h-72 object-cover">
          <div class="p-4">
              <h3 class="text-secondary font-bold text-xl font-primary">
                  {{ $product->name }}
              </h3>
              <p class="text-gray-800 font-secondary text-sm text-wrap">
                  {{ $product->short_description }}
              </p>
              <div class="mt-2">
                  @if ($product->offer_price)
                      <span class="text-secondary font-semibold font-secondary text-xl">${{ $product->offer_price }}
                      </span>
                      <span class="text-gray-400 font-secondary line-through text-sm">${{ $product->price }}
                      </span>
                  @else
                      <span class="text-secondary font-semibold font-secondary text-xl">${{ $product->price }}
                      </span>
                  @endif
              </div>
          </div>
          <div class="p-4 flex justify-between items-end mt-auto" id="{{ $product->id }}">
              <div class="flex items-center gap-2">
                  <form action="{{ route('favorites.add', $product->id) }}" method="POST"
                      id="form-add-favorite-{{ $product->id }}">
                      @csrf
                      <label class="ui-like">
                          <input type="checkbox"
                              class="btn-add-favorite {{ $product->is_favorite ? 'favourite' : '' }}"
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
              <form action="{{ route('cart.add', $product->id) }}" method="POST"
                  id="form-add-cart-{{ $product->id }}">
                  @csrf
                  <input type="hidden" name="quantity" value="1">
                  <button type="button" data-form="#form-add-cart-{{ $product->id }}"
                      class="px-5 py-3 font-primary rounded-lg bg-secondary text-white flex items-center justify-center add-to-cart">
                      <x-icon icon="shopping-cart-add" class="w-5 h-5 text-current" />
                  </button>
              </form>
          </div>
      </div>
  </div>
