  @if ($products->count() > 3)
      <div class="relative mx-auto mt-4 flex w-full flex-wrap items-center justify-center">
          <button
              class="button-prev absolute -left-14 z-30 flex cursor-pointer items-center justify-center rounded-full border border-zinc-400 p-2 hover:bg-zinc-100">
              <x-icon icon="arrow-left" class="h-6 w-6 text-secondary" />
          </button>
          <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                  @foreach ($products as $product)
                      <x-card-product :product="$product" :slide="true" width="w-auto" />
                  @endforeach
              </div>
          </div>
          <button
              class="button-next absolute -right-14 z-30 flex cursor-pointer items-center justify-center rounded-full border border-zinc-400 p-2 hover:bg-zinc-100">
              <x-icon icon="arrow-right" class="h-6 w-6 text-secondary" />
          </button>
      </div>
  @else
      <div class="mt-4 flex items-center justify-center gap-4">
          @foreach ($products as $product)
              <x-card-product :product="$product" :slide="false" width="w-96" />
          @endforeach
      </div>
  @endif
