@extends('layouts.template')
@section('title', 'Preguntas frecuentes')
@section('content')
    <main>
        <section class="mt-32">
            <div class="container mx-auto px-4">
                <h1 class="mt-10 block text-center font-mystical text-5xl font-normal uppercase text-secondary"
                    data-aos="fade-down">
                    Preguntas frecuentes
                </h1>
                <div class="mx-auto mt-10 flex w-1/2 flex-col">
                    @foreach ($faqs as $faq)
                        <div class="mt-4 flex flex-col overflow-hidden rounded-xl border border-zinc-400 bg-white"
                            data-aos="fade-down" data-aos-delay="{{ $loop->iteration * 100 }}">
                            <button class="show-question flex items-center justify-between px-6 py-2 hover:bg-zinc-100">
                                <span class="flex items-center justify-center gap-2">
                                    <x-icon-store icon="bird" class="h-8 w-8 text-secondary" />
                                    <h2 class="mt-1 font-league-spartan text-2xl font-semibold text-secondary">
                                        {{ $faq->question }}
                                    </h2>
                                </span>
                                <x-icon-store icon="arrow-down" class="h-8 w-8 text-secondary" />
                            </button>
                            <div class="hidden animate-fade-down border-t border-zinc-400 py-4">
                                <p class="text-wrap font-secondary ms-16 w-4/5 text-sm text-secondary">{{ $faq->answer }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="mt-8 w-full bg-primary px-20 py-10">
            <div class="mx-auto flex w-full items-center justify-center gap-4">
                <div class="flex flex-1 flex-col gap-4" data-aos="fade-right">
                    <h2 class="font-league-spartan text-4xl font-bold uppercase text-white">
                        Descubre el sabor y la tradición de El Salvador con nuestra variedad de productos únicos
                    </h2>
                    <x-button-store type="a" href="{{ Route('store.products') }}" typeButton="secondary"
                        text="Comprar ahora" class="w-max" />
                </div>
                <div class="flex w-full flex-1 items-center justify-center" data-aos="zoom-in-left">
                    <img src="{{ asset('images/imagen1.png') }}" alt="" class="h-64 w-72">
                </div>
            </div>
        </section>
    </main>
@endsection
