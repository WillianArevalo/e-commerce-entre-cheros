@extends('layouts.template')
@section('title', 'Preguntas frecuentes')
@section('content')
    <div>
        <section class="mt-32">
            <div class="container mx-auto px-4">
                <h1 class="mt-5 block text-center font-mystical text-2xl font-normal uppercase text-secondary md:mt-10 md:text-3xl xl:text-5xl"
                    data-aos="fade-down">
                    Preguntas frecuentes
                </h1>
                <div class="mx-auto mt-10 flex w-full flex-col md:w-3/4 lg:w-2/3 xl:w-1/2">
                    @foreach ($faqs as $faq)
                        <div class="mt-4 flex flex-col overflow-hidden rounded-xl border border-zinc-400 bg-white"
                            data-aos="fade-down" data-aos-delay="{{ $loop->iteration * 100 }}">
                            <button
                                class="show-question flex items-center justify-between px-2 py-2 hover:bg-zinc-100 md:px-4 xl:px-6">
                                <span class="flex items-center justify-center gap-2">
                                    <x-icon-store icon="bird" class="h-6 w-6 text-secondary md:h-8 md:w-8" />
                                    <h2
                                        class="mt-1 font-league-spartan text-sm font-semibold text-secondary sm:text-base md:text-xl xl:text-2xl">
                                        {{ $faq->question }}
                                    </h2>
                                </span>
                                <x-icon-store icon="arrow-down" class="h-8 w-8 text-secondary" />
                            </button>
                            <div class="hidden animate-fade-down border-t border-zinc-400 py-4">
                                <p
                                    class="text-wrap font-secondary ms-4 w-4/5 text-xs text-secondary md:ms-16 md:text-sm xl:text-base">
                                    {{ $faq->answer }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="mt-8 w-full bg-primary px-4 py-10 md:px-20">
            <div class="mx-auto flex w-full flex-col items-center justify-center gap-4 md:flex-row">
                <div class="flex flex-1 flex-col items-center gap-4 md:items-start" data-aos="fade-right">
                    <h2
                        class="text-center font-league-spartan text-xl font-bold uppercase text-white md:text-left md:text-2xl lg:text-4xl">
                        Descubre el sabor y la tradición de El Salvador con nuestra variedad de productos únicos
                    </h2>
                    <x-button-store type="button" typeButton="secondary" text="Comprar ahora" class="w-max" />
                </div>
                <div class="flex w-full flex-1 items-center justify-center" data-aos="zoom-in-left">
                    <img src="{{ asset('images/imagen1.png') }}" alt="" class="h-full w-full md:h-64 md:w-72">
                </div>
            </div>
        </section>

    </div>
@endsection
