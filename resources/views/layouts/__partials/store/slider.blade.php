  @if ($products->count() > 3)
      <div class="flex flex-wrap justify-center items-center w-full mx-auto relative mt-4">
          <button
              class="button-prev absolute z-30 -left-14 border border-zinc-300 hover:bg-zinc-100 p-2 rounded-full cursor-pointer flex items-center justify-center">
              <x-icon icon="arrow-left" class="w-6 h-6 text-secondary" />
          </button>
          <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                  @foreach ($products as $product)
                      <x-card-product :product="$product" :slide="true" width="w-auto" />
                  @endforeach
              </div>
          </div>
          <button
              class="button-next absolute -right-14 z-30 border border-zinc-300 p-2 hover:bg-zinc-100 rounded-full cursor-pointer flex items-center justify-center">
              <x-icon icon="arrow-right" class="w-6 h-6 text-secondary" />
          </button>
      </div>
  @else
      <div class="flex gap-4 items-center justify-center mt-4">
          @foreach ($products as $product)
              <x-card-product :product="$product" :slide="false" width="w-96" />
          @endforeach
      </div>
  @endif
