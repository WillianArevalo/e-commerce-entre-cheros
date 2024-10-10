@extends('layouts.template')
@section('title', 'Detalles del producto')
@section('content')
    <div class="mx-auto mb-10 w-full overflow-x-hidden px-4 md:w-4/5 md:px-0">
        <!-- Section details product -->
        <section class="mt-32">
            <div class="flex flex-col gap-4 xl:flex-row xl:gap-32">
                <div class="flex h-max flex-1 flex-col items-center justify-center gap-2">
                    <div class="flex items-center justify-center">
                        <img id="main-image" src="{{ Storage::url($product->main_image) }}"
                            alt="Imagen principal del {{ $product->name }}"
                            class="h-80 w-full rounded-2xl object-cover sm:h-[400px] sm:w-[550px]">
                    </div>
                    <!-- Images secondarys -->
                    <div class="flex h-20 w-max items-center justify-center gap-2 py-20">
                        @if ($product->images->count() > 4)
                            <button
                                class="button-prev-images cursor-pointer rounded-full bg-zinc-100 p-1 hover:bg-zinc-200">
                                <x-icon-store icon="arrow-left" class="h-5 w-5" />
                            </button>
                        @endif
                        @if ($product->images->count() > 0)
                            <div class="swiper swiper-images-secondarys max-w-[450px]">
                                <div class="swiper-wrapper">
                                    @foreach ($product->images as $image)
                                        <div
                                            class="swiper-slide container-secondary-image {{ $loop->iteration === 1 ? 'selected' : '' }} cursor-pointer overflow-hidden rounded-lg">
                                            <img src="{{ Storage::url($image->image) }}" alt="Imagen secundaria"
                                                class="secondary-image h-20 w-full object-cover">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if ($product->images->count() > 4)
                            <button
                                class="button-next-images cursor-pointer rounded-full bg-zinc-100 p-1 hover:bg-zinc-200">
                                <x-icon-store icon="arrow-right" class="h-5 w-5" />
                            </button>
                        @endif
                    </div>
                    <!-- End Images secondarys -->
                    <div class="flex items-center gap-2">
                        <form action="{{ route('favorites.add', $product->id) }}" method="POST"
                            id="form-add-favorite-{{ $product->id }}">
                            @csrf
                            <button type="button"
                                class="btn-add-favorite {{ $product->is_favorite ? 'favorite' : '' }} not-favorite m-4 flex items-center justify-center gap-2 rounded-full border px-4 py-2 hover:border-rose-600 hover:bg-rose-600 hover:text-white">
                                <span class="text-xs font-semibold" id="favorite-text">
                                    {{ $product->is_favorite ? 'Favorito' : 'Agregar a favoritos' }}
                                </span>
                                <x-icon-store icon="favourite" class="h-5 w-5 text-current" />
                            </button>
                        </form>
                        <button
                            class="font-secondary group flex h-max items-center gap-2 rounded-full border border-green-500 p-2 px-4 text-sm text-green-500 hover:bg-green-50 hover:text-green-500">
                            <span class="text-xs font-semibold" id="favorite-text">
                                Compartir
                            </span>
                            <x-icon-store icon="share" class="h-5 w-5 text-current" />
                        </button>
                    </div>
                </div>
                <div class="flex flex-1 flex-col gap-4">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <h1
                            class="font-league-spartan text-2xl font-bold text-secondary sm:text-3xl md:text-4xl lg:text-5xl">
                            {{ $product->name }}
                        </h1>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-icon-store icon="star" class="h-7 w-7 text-yellow-400" />
                        <x-icon-store icon="star" class="h-7 w-7 text-yellow-400" />
                        <x-icon-store icon="star" class="h-7 w-7 text-yellow-400" />
                        <x-icon-store icon="star" class="h-7 w-7 text-yellow-400" />
                        <x-icon-store icon="star" class="h-7 w-7 text-yellow-400" />
                        <p class="font-secondary font-semibold text-secondary">
                            Calificación ({{ $product->reviews->count() }})
                        </p>
                    </div>
                    <div class="flex items-end gap-2">
                        @if ($product->offer_price)
                            <span
                                class="font-secondary lg:text-5x text-2xl font-semibold text-secondary sm:text-3xl md:text-4xl">${{ $product->offer_price }}</span>
                            <span
                                class="font-secondary text-base text-zinc-400 line-through sm:text-lg lg:text-xl xl:text-2xl">${{ $product->price }}</span>
                            <span
                                class="font-secondary me-2 rounded-full bg-purple-100 px-2.5 py-0.5 text-sm font-medium text-purple-800">
                                En oferta
                            </span>
                        @else
                            <span
                                class="font-secondary lg:text-5x text-2xl font-semibold text-secondary sm:text-3xl md:text-4xl">${{ $product->price }}</span>
                        @endif
                    </div>
                    <p class="font-secondary w-full text-sm text-zinc-500 md:w-2/3 md:text-base">
                        {{ $product->short_description }}
                    </p>
                    <form action="{{ route('cart.add', $product->id) }}" id="add-cart">
                        @csrf
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-center gap-2 py-4 md:justify-normal">
                                <button type="button"
                                    class="flex h-10 w-10 items-center justify-center rounded-full border border-zinc-400 hover:bg-zinc-100"
                                    id="btn-minus">
                                    <x-icon icon="minus" class="h-4 w-4 text-secondary" />
                                </button>
                                <input type="text" name="quantity" id="quantity"
                                    class="font-secondary h-12 w-16 rounded-lg border-none text-center focus:border-none focus:outline-none"
                                    readonly value="1" min="1" max="{{ $product->stock }}">
                                <button type="button"
                                    class="flex h-10 w-10 items-center justify-center rounded-full border border-zinc-400 hover:bg-zinc-100"
                                    id="btn-plus">
                                    <x-icon-store icon="plus" class="h-4 w-4 text-secondary" />
                                </button>
                            </div>
                            <!-- Container button -->
                            <div class="flex items-center gap-4 max-[540px]:flex-col">
                                <div class="w-full flex-1">
                                    <x-button-store type="button" data-form="#add-cart" typeButton="secondary"
                                        text="Añadir al carrito" icon="shopping-cart-add" class="add-to-cart w-full" />
                                </div>
                                <div class="w-full flex-1">
                                    <x-button-store type="button" typeButton="primary" text="Comprar"
                                        class="w-full font-bold" />
                                </div>
                            </div>
                            <!-- End Container button -->
                            <div class="font-secondary mt-4 flex gap-2">
                                @if ($product->labels->count() > 0)
                                    @foreach ($product->labels as $label)
                                        <span
                                            class="bg-{{ $label->color }}-100 text-{{ $label->color }}-800 flex items-center justify-center rounded-full px-4 py-1 text-sm font-medium">
                                            {{ $label->name }}
                                        </span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="accordion mt-8">
                <!-- Panel 1 -->
                <div class="accordion-item mb-2 overflow-hidden rounded-xl border border-gray-200">
                    <button
                        class="accordion-header flex w-full cursor-pointer items-center justify-between bg-zinc-50 p-4 text-start font-semibold text-zinc-800 hover:bg-zinc-100"
                        data-target="#panel1">
                        <div class="flex items-center gap-2">
                            <x-icon-store icon="description" class="h-5 w-5 text-zinc-800" />
                            Descripción
                        </div>
                        <x-icon-store icon="arrow-down"
                            class="h-5 w-5 transform text-zinc-800 transition-transform duration-300 ease-in-out"
                            id="icon-panel1" />
                    </button>
                    <div id="panel1"
                        class="accordion-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <div class="p-6">
                            <p class="text-sm text-zinc-700 sm:text-base">
                                {{ $product->long_description }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Panel 2 -->
                <div class="accordion-item mb-2 overflow-hidden rounded-xl border border-gray-200">
                    <button
                        class="accordion-header flex w-full cursor-pointer items-center justify-between bg-zinc-50 p-4 text-start font-semibold text-zinc-800 hover:bg-zinc-100"
                        data-target="#panel2">
                        <div class="flex items-center gap-2">
                            <x-icon-store icon="information-circle" class="h-5 w-5 text-zinc-800" />
                            Información adicional
                        </div>
                        <x-icon-store icon="arrow-down" class="h-5 w-5 text-zinc-800" />
                    </button>
                    <div id="panel2"
                        class="accordion-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                        <div class="p-6">
                            <div
                                class="flex flex-col flex-wrap items-start justify-center gap-4 sm:flex-row sm:justify-start">
                                <div
                                    class="flex w-full flex-col items-start rounded-2xl border border-zinc-200 bg-white p-7 shadow-md sm:w-max">
                                    <div class="flex items-center gap-2">
                                        <span class="rounded-full bg-green-100 p-2 text-green-600">
                                            <x-icon-store icon="arrow-up-02" class="h-4 w-4 text-current sm:h-6 sm:w-6" />
                                        </span>
                                        <h3 class="font-league-spartan text-base font-semibold text-green-600 md:text-xl">
                                            En stock
                                        </h3>
                                    </div>
                                </div>
                                <div
                                    class="flex w-full flex-col items-start rounded-2xl border border-zinc-200 bg-white px-6 py-4 shadow-md sm:w-max">
                                    <div class="flex items-center gap-2">
                                        <span class="rounded-full bg-blue-100 p-2 text-blue-600">
                                            <x-icon-store icon="bookmark" class="h-4 w-4 text-current sm:h-6 sm:w-6" />
                                        </span>
                                        <h3 class="font-league-spartan text-base font-semibold text-secondary md:text-xl">
                                            Categoría
                                        </h3>
                                    </div>
                                    <p class="font-secondary ms-12 text-sm font-semibold text-zinc-600 md:text-base">
                                        {{ $product->categories->name }}
                                    </p>
                                </div>
                                <div
                                    class="flex w-full flex-col items-start rounded-2xl border border-zinc-200 bg-white px-6 py-4 shadow-md sm:w-max">
                                    <div class="flex items-center gap-2">
                                        <span class="rounded-full bg-purple-100 p-2 text-purple-600">
                                            <x-icon-store icon="weight" class="h-4 w-4 text-current sm:h-6 sm:w-6" />
                                        </span>
                                        <h3 class="font-league-spartan text-base font-semibold text-secondary md:text-xl">
                                            Peso
                                        </h3>
                                    </div>
                                    <p class="font-secondary ms-12 text-sm font-semibold text-zinc-600 md:text-base">
                                        {{ $product->weight }} kg
                                    </p>
                                </div>
                                <div
                                    class="flex w-full flex-col items-start rounded-2xl border border-zinc-200 bg-white px-6 py-4 shadow-md sm:w-max">
                                    <div class="flex items-center gap-2">
                                        <span class="rounded-full bg-amber-100 p-2 text-amber-600">
                                            <x-icon-store icon="package" class="h-4 w-4 text-current sm:h-6 sm:w-6" />
                                        </span>
                                        <h3 class="font-league-spartan text-base font-semibold text-secondary md:text-xl">
                                            Dimensiones
                                        </h3>
                                    </div>
                                    <p class="font-secondary ms-12 text-sm font-semibold text-zinc-600 md:text-base">
                                        {{ $product->dimensions }}
                                    </p>
                                    <div class="my-6 mt-2 flex w-full items-center justify-center p-4">
                                        <div class="dimension-box-store">
                                            <div class="face front">{{ $product->width }}</div>
                                            <div class="face back"></div>
                                            <div class="face left"></div>
                                            <div class="face right">{{ $product->height }}</div>
                                            <div class="face top">{{ $product->length }}</div>
                                            <div class="face bottom"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($purchase && !$userReview)
                    <div class="mt-4 flex justify-end">
                        <x-button-store type="button" typeButton="secondary" text="Agregar reseña" id="btn-review"
                            class="text-sm" icon="comment-add" />
                    </div>
                @endif

            </div>
        </section>
        <!-- End Section details product -->

        <!-- Section reviews product -->
        <section>
            <!-- Add review -->
            <div id="review-container" class="mt-8 hidden">
                <h2 class="font-league-spartan text-3xl font-bold text-secondary">
                    Añadir reseña
                </h2>
                <div class="flex flex-col">
                    <div class="flex items-center gap-4">
                        <span class="text-start text-sm font-medium text-zinc-600 md:text-base">
                            Calificación
                        </span>
                        <div class="my-2 flex items-center gap-1" id="star-rating">
                            <button data-value="1" class="star start-unselected">
                                <x-icon-store icon="star" class="h-7 w-7" />
                            </button>
                            <button data-value="2" class="star start-unselected">
                                <x-icon-store icon="star" class="h-7 w-7" />
                            </button>
                            <button data-value="3" class="star start-unselected">
                                <x-icon-store icon="star" class="h-7 w-7" />
                            </button>
                            <button data-value="4" class="star start-unselected">
                                <x-icon-store icon="star" class="h-7 w-7" />
                            </button>
                            <button data-value="5" class="star start-unselected">
                                <x-icon-store icon="star" class="h-7 w-7" />
                            </button>
                        </div>
                    </div>
                    <form action="{{ Route('reviews.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="rating" id="rating-value">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="flex flex-col gap-2">
                            <x-input-store type="textarea" name="comment" label="Comentario" id="review"
                                cols="30" rows="5" placeholder="Escribe tu reseña..." />
                        </div>
                        <span id="message-review" class="hidden text-xs text-red-600"></span>
                        <div class="mt-4 flex items-center justify-end gap-4">
                            <x-button-store type="button" typeButton="secondary" text="Cancelar"
                                id="btn-cancel-review" />
                            <x-button-store type="submit" typeButton="primary" text="Enviar reseña" icon="send" />
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Add review -->

            <!-- Reviews -->
            <div class="mt-12">
                <h2 class="font-league-spartan text-4xl font-bold text-secondary">Reseñas</h2>
                <div class="mt-4 flex items-center gap-2 font-league-spartan text-xl">
                    <x-icon-store icon="star" class="h-6 w-6 fill-yellow-300 text-yellow-400" />
                    <p class="font-bold">4.87</p>
                    <span class="flex items-center">
                        <x-icon icon="minus" class="h-5 w-5" />
                    </span>
                    <p>
                        {{ $product->reviews->count() }}
                    </p>
                </div>

                @if ($userReview && $userReview->is_approved === 0)
                    <div
                        class="review-user-current mt-8 flex flex-col gap-2 rounded-2xl border border-zinc-100 bg-zinc-100 p-4 shadow-sm">
                        <div class="flex items-center gap-2">
                            <img src="{{ Storage::url($userReview->user->profile) }}"
                                alt="Imagen de perfil {{ $userReview->user->name }}"
                                class="h-12 w-12 rounded-full object-cover">
                            <div class="flex w-full justify-between">
                                <div class="flex flex-col">
                                    <p class="font-league-spartan text-base font-bold text-secondary sm:text-lg">
                                        Tú
                                    </p>
                                    <p class="font-secondary text-xs text-zinc-600 sm:text-sm">
                                        {{ $userReview->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <div class="flex items-center gap-1 sm:gap-2">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $userReview->rating)
                                            <x-icon-store icon="star"
                                                class="h-5 w-5 fill-yellow-300 text-yellow-400" />
                                        @else
                                            <x-icon-store icon="star" class="h-5 w-5 fill-zinc-300 text-zinc-400" />
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <p class="font-secondary ms-14 text-sm text-secondary md:text-base">
                            {{ $userReview->comment }}
                        </p>
                        <div>
                            @if (auth()->check() && $user->id === $userReview->user_id)
                                <div class="ms-14 mt-2 flex items-center gap-2">
                                    <button id="btn-edit-review" type="button"
                                        class="flex items-center justify-center rounded-xl border border-zinc-300 p-2 text-zinc-400 hover:bg-zinc-50">
                                        <x-icon-store icon="edit" class="h-5 w-5 text-current" />
                                    </button>
                                    <form action="{{ route('reviews.destroy', $userReview->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="flex items-center justify-center rounded-xl border border-red-300 p-2 text-red-400 hover:bg-red-50">
                                            <x-icon-store icon="delete" class="h-5 w-5 text-current" />
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                        <div
                            class="mt-2 flex w-max items-center rounded-lg border border-yellow-300 bg-yellow-100 px-4 py-2 text-yellow-800">
                            <x-icon-store icon="information-circle" class="mr-2 h-4 w-4 text-current" />
                            <span class="text-xs font-medium sm:text-sm">Tú comentario está pendiente de aprobación.</span>
                        </div>
                    </div>
                @endif

                <!-- Edit review -->
                @if ($userReview)
                    <div id="edit-review-container" class="mt-8 hidden">
                        <h2 class="font-league-spartan text-xl font-bold text-secondary">
                            Editar reseña
                        </h2>
                        <div class="flex flex-col">
                            <div class="flex items-center gap-4">
                                <span class="text-start text-sm font-medium text-zinc-600 md:text-base">
                                    Calificación
                                </span>
                                <div class="my-2 flex items-center gap-1" id="star-rating-edit">
                                    <button data-value="1" class="star star-edit start-unselected">
                                        <x-icon-store icon="star" class="h-7 w-7" />
                                    </button>
                                    <button data-value="2" class="star star-edit start-unselected">
                                        <x-icon-store icon="star" class="h-7 w-7" />
                                    </button>
                                    <button data-value="3" class="star star-edit start-unselected">
                                        <x-icon-store icon="star" class="h-7 w-7" />
                                    </button>
                                    <button data-value="4" class="star star-edit start-unselected">
                                        <x-icon-store icon="star" class="h-7 w-7" />
                                    </button>
                                    <button data-value="5" class="star star-edit start-unselected">
                                        <x-icon-store icon="star" class="h-7 w-7" />
                                    </button>
                                </div>
                            </div>
                            <form action="{{ Route('reviews.update', $userReview->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="rating" id="rating-value-edit"
                                    value="{{ $userReview->rating }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <x-input-store type="textarea" name="comment" label="Comentario" id="review"
                                    cols="30" rows="5" value="{{ $userReview->comment }}"
                                    placeholder="Escribe tu reseña..." />
                                <span id="message-review-edit" class="text-sn hidden text-sm text-red-600"></span>
                                <div class="mt-4 flex items-center justify-end gap-4">
                                    <x-button-store type="button" typeButton="secondary" text="Cancelar"
                                        id="btn-cancel-edit-review" />
                                    <x-button-store type="submit" typeButton="primary" text="Editar reseña"
                                        icon="edit" />
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
                <!-- End Edit review -->

                <div class="mb-6 mt-6 flex flex-col gap-6">
                    @forelse($reviews as $review)
                        <!-- Reviews approved -->
                        <div
                            class="{{ $userReview && $userReview->user_id === $review->user_id ? 'review-user-current' : '' }} flex flex-col gap-2">
                            <div class="flex items-center gap-2">
                                <img src="{{ Storage::url($review->user->profile) }}"
                                    alt="Imagen de perfil {{ $review->user->name }}"
                                    class="h-12 w-12 rounded-full object-cover">
                                <div class="flex w-full justify-between">
                                    <div class="flex flex-col">
                                        <p class="font-league-spartan text-base font-bold text-secondary md:text-lg">
                                            @if (auth()->user())
                                                {{ $review->user->name === $user->name ? 'Tú' : $review->user->name }}
                                            @else
                                                {{ $review->user->name }}
                                            @endif
                                        </p>
                                        <p class="font-secondary text-xs text-zinc-600 sm:text-sm">
                                            {{ $review->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-1 sm:gap-2">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $review->rating)
                                                <x-icon-store icon="star"
                                                    class="h-5 w-5 fill-yellow-300 text-yellow-400" />
                                            @else
                                                <x-icon-store icon="star"
                                                    class="h-5 w-5 fill-zinc-300 text-zinc-400" />
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <p class="font-secondary md::text-base ms-14 text-sm text-secondary">
                                {{ $review->comment }}
                            </p>
                            <div>
                                @if (auth()->check() && $user->id === $review->user_id)
                                    <div class="ms-14 mt-2 flex items-center gap-2">
                                        <button id="btn-edit-review" type="button"
                                            class="flex items-center justify-center rounded-xl border border-zinc-300 p-2 text-zinc-400 hover:bg-zinc-50">
                                            <x-icon-store icon="edit" class="h-5 w-5 text-current" />
                                        </button>
                                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="flex items-center justify-center rounded-xl border border-red-300 p-2 text-red-400 hover:bg-red-50">
                                                <x-icon-store icon="delete" class="h-5 w-5 text-current" />
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- End reviews approved -->
                    @empty
                        <div
                            class="flex items-center justify-center gap-2 rounded-2xl border-2 border-dashed bg-zinc-50 p-20">
                            <x-icon-store icon="comment" class="h-5 w-5 text-zinc-600" />
                            <p class="font-secondary text-sm text-zinc-600">
                                No hay reseñas para este producto.
                            </p>
                        </div>
                    @endforelse
                </div>
                @if ($product->reviews->count() > 10)
                    <div>
                        <x-button-store type="button" typeButton="secondary" class="text-sm" text="Ver más reseñas" />
                    </div>
                @endif
            </div>
            <!-- End Reviews -->
        </section>
        <!-- End Section reviews product -->
    </div>
    <!-- Section related products -->
    <!-- Slider products -->
    <section class="mt-8 p-4 md:mt-0 lg:p-20">
        <div class="flex flex-col items-center justify-center gap-4 text-center">
            <h2 class="font-league-spartan text-xl font-bold uppercase text-secondary md:w-2/3 md:text-3xl lg:text-5xl">
                También te puede interesar
            </h2>
        </div>
        @if ($products)
            <div id="slider">
                @include('layouts.__partials.store.slider', [
                    'products' => $products,
                ])
            </div>
        @endif
    </section>
    <!-- End Slider products -->
    <!-- End Section related products -->
@endsection
