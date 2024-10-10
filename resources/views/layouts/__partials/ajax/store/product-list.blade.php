    @if ($products->count() > 0)
        <div class="grid gap-4 max-[930px]:grid-cols-3 max-[600px]:grid-cols-2 xl:grid-cols-4" id="products-list">
            @foreach ($products as $product)
                <div
                    class="flex h-max w-[180px] flex-col overflow-hidden rounded-3xl border border-zinc-300 bg-white text-start shadow sm:w-[210px] md:w-[250px] lg:w-[290px] xl:w-[280px]">
                    <!-- Card header -->
                    <div>
                        <div class="relative sm:mx-4 sm:mt-4">
                            <img src="{{ Storage::url($product->main_image) }}" alt=""
                                class="h-40 w-full rounded-3xl bg-zinc-50 object-cover xl:h-72">
                            <form action="{{ route('favorites.add', $product->id) }}" method="POST"
                                id="form-add-favorite-{{ $product->id }}">
                                @csrf
                                <button type="button"
                                    class="btn-add-favorite {{ $product->is_favorite ? 'favorite' : '' }} not-favorite absolute right-0 top-0 m-4 flex items-center justify-center rounded-full border p-1 hover:border-rose-600 hover:bg-rose-600 hover:text-white sm:p-2">
                                    <x-icon-store icon="favourite" class="h-3 w-3 text-current sm:h-5 sm:w-5" />
                                </button>
                            </form>
                        </div>
                        <div class="flex h-[60px] flex-col gap-2 p-4 sm:h-[140px]">
                            @if ($product->labels->count() > 0)
                                <div class="hidden flex-wrap gap-2 lg:flex">
                                    @foreach ($product->labels as $label)
                                        <span
                                            class="bg-{{ $label->color }}-100 text-{{ $label->color }}-800 rounded-full px-2 py-0.5 text-[10px] font-semibold">
                                            {{ $label->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                            <a href="{{ Route('products.details', $product->slug) }}"
                                class="mt-2 font-league-spartan text-sm font-bold text-secondary underline underline-offset-4 sm:text-base md:text-xl xl:text-xl">
                                {{ $product->name }}
                            </a>
                            <p
                                class="font-secondary text-wrap line-clamp-3 hidden pb-4 text-xs text-zinc-800 sm:block sm:text-sm">
                                {{ $product->short_description }}
                            </p>
                        </div>
                    </div>
                    <!-- Card end header -->

                    <!-- Card footer -->
                    <div class="mt-auto flex items-center border-t border-zinc-200 bg-zinc-100 px-4 py-2 lg:p-4"
                        id="{{ $product->id }}">
                        <div class="flex w-full flex-col items-center justify-between gap-1 sm:flex-row">
                            <div>
                                @if ($product->offer_price && $product->offer_active === 1)
                                    <span
                                        class="font-secondary text-base font-semibold text-secondary lg:text-xl">${{ $product->offer_price }}</span>
                                    <span
                                        class="font-secondary text-xs text-zinc-500 line-through lg:text-base">${{ $product->price }}</span>
                                @else
                                    <span
                                        class="font-secondary text-base font-semibold text-secondary lg:text-xl">{{ $product->price_in_currency }}
                                    </span>
                                @endif
                            </div>
                            <!-- Add to favorite end -->

                            <!-- Add to cart -->
                            <form action="{{ route('cart.add', $product->id) }}" method="POST"
                                id="form-add-cart-{{ $product->id }}">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button type="button" data-form="#form-add-cart-{{ $product->id }}"
                                    class="add-to-cart flex items-center justify-center rounded-xl bg-secondary px-4 py-2 font-league-spartan text-sm text-white hover:bg-blue-950 sm:rounded-2xl sm:px-4 sm:py-3">
                                    <x-icon-store icon="shopping-cart-add" class="w- h-3 text-current sm:h-5 sm:w-5" />
                                    <span class="ml-2 hidden text-xs sm:block sm:text-sm">
                                        Agregar
                                    </span>
                                </button>
                            </form>
                            <!-- Add to cart end -->
                        </div>
                    </div>
                    <!-- Card end footer -->
                </div>
            @endforeach
        </div>
    @else
        <div class="flex w-full items-center justify-center border-2 border-dashed border-zinc-300 p-20">
            <p class="text-center text-zinc-500">
                No se encontraron productos que coincidan con tu búsqueda.
            </p>
        </div>
    @endif
