@extends('layouts.template')
@section('title', 'Detalles del producto')
@section('content')
    <div class="mx-auto mb-10 w-4/5">
        <!-- Section details product -->
        <section class="mt-32 flex gap-32">
            <div class="flex h-max flex-1 flex-col items-center justify-center gap-2">
                <div class="flex items-center justify-center">
                    <img id="main-image" src="{{ Storage::url($product->main_image) }}"
                        alt="Imagen principal del {{ $product->name }}" class="h-[400px] w-[550px] rounded-2xl object-cover">
                </div>
                <!-- Images secondarys -->
                <div class="flex h-20 w-max items-center justify-center gap-2 py-20">
                    @if ($product->images->count() > 4)
                        <button class="button-prev-images cursor-pointer rounded-full bg-zinc-100 p-1 hover:bg-zinc-200">
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
                        <button class="button-next-images cursor-pointer rounded-full bg-zinc-100 p-1 hover:bg-zinc-200">
                            <x-icon-store icon="arrow-right" class="h-5 w-5" />
                        </button>
                    @endif
                </div>
                <!-- End Images secondarys -->

                <div class="flex items-center gap-2">
                    <form action="{{ route('favorites.add', $product->id) }}" method="POST"
                        id="form-add-favorite-{{ $product->id }}">
                        @csrf
                        <label
                            class="ui-like font-secondary group flex h-max cursor-pointer items-center gap-2 rounded-full border border-rose-100 p-2 px-4 text-sm text-rose-500 hover:bg-rose-50 hover:text-rose-500">
                            <input type="checkbox" class="btn-add-favorite {{ $product->is_favorite ? 'favourite' : '' }}"
                                data-form="#form-add-favorite-{{ $product->id }}" data-card="#{{ $product->id }}">
                            Guardar
                            <div class="like">
                                <x-icon-store icon="favourite" class="h-5 w-5 text-current group-hover:fill-current" />
                            </div>
                        </label>
                    </form>
                    <button
                        class="font-secondary group flex h-max items-center gap-2 rounded-full border border-green-100 p-2 px-4 text-sm text-green-500 hover:bg-green-50 hover:text-green-500">
                        Compartir
                        <x-icon-store icon="share" class="h-5 w-5 text-current" />
                    </button>
                </div>

            </div>
            <div class="flex flex-1 flex-col gap-4">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <h1 class="font-league-spartan text-5xl font-bold text-secondary">
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
                            class="font-secondary text-5xl font-semibold text-secondary">${{ $product->offer_price }}</span>
                        <span class="font-secondary text-2xl text-zinc-400 line-through">${{ $product->price }}</span>
                        <span
                            class="font-secondary me-2 rounded-full bg-purple-100 px-2.5 py-0.5 text-sm font-medium text-purple-800">
                            En oferta
                        </span>
                    @else
                        <span class="font-secondary text-5xl font-semibold text-secondary">${{ $product->price }}</span>
                    @endif
                </div>
                <p class="font-secondary w-2/3 text-base text-zinc-500">
                    {{ $product->short_description }}
                </p>
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-2">
                        <button
                            class="flex h-10 w-10 items-center justify-center rounded-full border border-zinc-400 hover:bg-zinc-100"
                            id="btn-minus">
                            <x-icon icon="minus" class="h-4 w-4 text-secondary" />
                        </button>
                        <input type="text" name="quantity" id="quantity"
                            class="font-secondary h-12 w-16 rounded-lg border-none text-center focus:border-none focus:outline-none"
                            readonly value="1" min="1" max="{{ $product->stock }}">
                        <button
                            class="flex h-10 w-10 items-center justify-center rounded-full border border-zinc-400 hover:bg-zinc-100"
                            id="btn-plus">
                            <x-icon-store icon="plus" class="h-4 w-4 text-secondary" />
                        </button>
                    </div>
                    <!-- Container button -->
                    <div class="flex items-center gap-4">
                        <div class="flex-1">
                            <x-button-store type="button" typeButton="secondary" text="Añadir al carrito"
                                icon="shopping-cart-add" class="w-full" />
                        </div>
                        <div class="flex-1">
                            <x-button-store type="button" typeButton="primary" text="Comprar" class="w-full font-bold" />
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

                @if ($purchase)
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
                        <span class="font-secondary text-sm text-zinc-600">
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
                        <x-input-store type="textarea" name="comment" label="Comentario" id="review" cols="30"
                            rows="5" placeholder="Escribe tu reseña..." />
                        <span id="message-review" class="hidden text-xs text-red-600"></span>
                        <x-button-store type="submit" typeButton="primary" text="Enviar reseña" class="ml-auto mt-4"
                            icon="send" />
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
                        class="review-user-current mt-8 flex flex-col gap-2 rounded-2xl border border-zinc-100 bg-zinc-50 p-4 shadow-sm">
                        <div class="flex items-center gap-2">
                            <img src="{{ Storage::url($userReview->user->profile) }}"
                                alt="Imagen de perfil {{ $userReview->user->name }}"
                                class="h-12 w-12 rounded-full object-cover">
                            <div class="flex w-full justify-between">
                                <div class="flex flex-col">
                                    <p class="font-league-spartan text-lg font-bold text-secondary">
                                        Tú
                                    </p>
                                    <p class="font-secondary text-sm text-zinc-600">
                                        {{ $userReview->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <div class="flex items-center gap-2">
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
                        <p class="font-secondary ms-14 text-base text-secondary">
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
                            class="mt-2 flex w-max items-center rounded-md border border-yellow-300 bg-yellow-100 px-4 py-2 text-yellow-800">
                            <x-icon-store icon="information-circle" class="mr-2 h-4 w-4 text-current" />
                            <span class="text-sm font-medium">Tú comentario está pendiente de aprobación.</span>
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
                                <span class="font-secondary text-sm text-zinc-600">
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
                                <x-button-store type="submit" typeButton="primary" text="Editar reseña"
                                    class="ml-auto mt-4" icon="edit" />
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
                                        <p class="font-league-spartan text-lg font-bold text-secondary">
                                            @if (auth()->user())
                                                {{ $review->user->name === $user->name ? 'Tú' : $review->user->name }}
                                            @else
                                                {{ $review->user->name }}
                                            @endif
                                        </p>
                                        <p class="font-secondary text-sm text-zinc-600">
                                            {{ $review->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-2">
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
                            <p class="font-secondary ms-14 text-base text-secondary">
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
                        <div class="flex items-center justify-center gap-2 rounded-3xl bg-zinc-50 p-20">
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
    <section class="w-full px-20 pb-10">
        <div class="flex w-full flex-col justify-center text-center">
            <h2 class="p-4 font-league-spartan text-3xl font-bold uppercase text-secondary">
                Tambien te puede interesar
            </h2>
            @if ($products)
                <div id="slider">
                    @include('layouts.__partials.store.slider', [
                        'products' => $products,
                    ])
                </div>
            @endif
            <div class="mx-auto mt-8 w-max">
                <x-button-store type="a" href="{{ Route('store') }}" typeButton="primary" text="Ver más" />
            </div>
        </div>
    </section>
    <!-- End Section related products -->
@endsection
