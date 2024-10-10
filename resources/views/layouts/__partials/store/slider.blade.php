  @if ($products->count() > 3)
      <div class="w-100 relative mx-auto mt-4 flex flex-wrap items-center justify-center lg:w-[91%]">
          <button
              class="button-prev absolute -left-2 z-30 flex cursor-pointer items-center justify-center rounded-full border border-zinc-400 bg-white p-2 hover:bg-zinc-100 lg:-left-14">
              <x-icon-store icon="arrow-left" class="h-4 w-4 text-secondary sm:h-6 sm:w-6" />
          </button>
          <div class="swiper mySwiper">
              <div class="swiper-wrapper">
                  @foreach ($products as $product)
                      <x-card-product :product="$product" :slide="true" width="w-auto" />
                  @endforeach
              </div>
          </div>
          <button
              class="button-next absolute -right-2 z-30 flex cursor-pointer items-center justify-center rounded-full border border-zinc-400 bg-white p-2 hover:bg-zinc-100 lg:-right-14">
              <x-icon-store icon="arrow-right" class="h-4 w-4 text-secondary sm:h-6 sm:w-6" />
          </button>
      </div>
  @else
      <div class="mt-4 flex items-center justify-center gap-4">
          @foreach ($products as $product)
              <x-card-product :product="$product" :slide="false" width="w-96" />
          @endforeach
      </div>
  @endif
