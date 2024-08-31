@extends('layouts.template')
@section('title', 'Conócenos')
@section('content')
    <div class="mb-20">
        <section>
            <div class="relative flex h-[500px] w-full items-center justify-center text-white"
                style="background-image:url('{{ asset('images/fondo3.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute bottom-0 w-full" viewBox="0 0 1440 320">
                    <path fill="#fff" fill-opacity="1"
                        d="M0,192L48,197.3C96,203,192,213,288,208C384,203,480,181,576,181.3C672,181,768,203,864,224C960,245,1056,267,1152,266.7C1248,267,1344,245,1392,234.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>
                <h1 class="mb-16 font-mystical text-5xl font-normal uppercase text-white" data-aos="zoom-in">Acerca de
                    nosotros</h1>
                <div class="absolute bottom-0 flex items-center gap-4">
                    <img src="{{ asset('images/photo.jpg') }}" alt="Image about" class="h-48 w-48 rounded-3xl object-cover"
                        data-aos="fade-right">
                    <img src="{{ asset('images/photo.jpg') }}" alt="Image about" class="h-32 w-52 rounded-3xl object-cover"
                        data-aos="zoom-in">
                    <img src="{{ asset('images/photo.jpg') }}" alt="Image about" class="h-48 w-48 rounded-3xl object-cover"
                        data-aos="zoom-in">
                    <img src="{{ asset('images/photo.jpg') }}" alt="Image about" class="h-32 w-52 rounded-3xl object-cover"
                        data-aos="fade-left">
                </div>
            </div>
            <div class="mt-8 flex items-center justify-center">
                <x-button type="a" text="Contactanos" class="w-60 pt-4 font-league-spartan font-bold"
                    typeButton="store-gradient" />
            </div>
        </section>
        <section class="relative mt-10 flex flex-col items-center justify-center gap-4 p-20">
            <h2 class="font-league-spartan text-5xl font-bold text-secondary">
                ¿Quiénes somos?
            </h2>
            <span class="absolute left-10 top-0">
                <x-icon-store icon="sun-store" class="h-52 w-52 fill-secondary" />
            </span>
            <span class="absolute bottom-0 right-0">
                <x-icon-store icon="sun-store" class="h-52 w-52 fill-secondary" />
            </span>
            <p class="font-secondary w-3/5 text-center text-sm text-black">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga voluptatibus totam et ipsum? Cumque odio iste
                minus exercitationem, vel dolore.

                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga voluptatibus totam et ipsum? Cumque odio iste
                minus exercitationem, vel dolore.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque voluptatem, eaque sunt quaerat aliquid
                voluptatum cumque, totam quasi provident esse id nostrum fugit nulla deserunt? Ea reprehenderit temporibus
                assumenda impedit?
            </p>
        </section>
        <section class="mt-10"
            style="background-image: linear-gradient(to left, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0)), url('{{ asset('images/fondo3.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
            <div class="flex">
                <div class="ms-20 flex w-1/2 items-center justify-center">
                    <img src="{{ asset('images/photo.jpg') }}" alt="Image about"
                        class="h-96 w-[600px] rounded-3xl object-cover" data-aos="fade-right">
                </div>
                <div class="flex w-1/2 flex-col items-center justify-center gap-4 p-20" data-aos="fade-left">
                    <h2 class="font-league-spartan text-5xl font-bold text-white">
                        Nuestra historia
                    </h2>
                    <p class="font-secondary w-3/5 text-center text-sm text-zinc-100">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga voluptatibus totam et ipsum? Cumque
                        odio
                        iste minus exercitationem, vel dolore.

                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga voluptatibus totam et ipsum? Cumque
                        odio
                        iste minus exercitationem, vel dolore.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque voluptatem, eaque sunt quaerat
                        aliquid
                        voluptatum cumque, totam quasi provident esse id nostrum fugit nulla deserunt? Ea reprehenderit
                        temporibus
                        assumenda impedit?
                    </p>
                </div>
            </div>
        </section>
        <section class="mx-auto w-4/5 py-20">
            <div class="flex gap-8">
                <div class="relative flex flex-col items-center justify-center gap-4 rounded-3xl bg-zinc-100 px-8 py-16"style="background: linear-gradient(#011b4e,#138fdc)"
                    data-aos="zoom-in-right">
                    <h3 class="font-mystical text-3xl uppercase text-white">Misión</h3>
                    <p class="font-secondary text-center text-sm text-zinc-100">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque voluptatem, eaque sunt quaerat
                        aliquid
                        voluptatum cumque, totam quasi provident esse id nostrum fugit nulla deserunt? Ea reprehenderit
                        temporibus assumenda impedit?
                    </p>
                    <span class="absolute left-0 top-0">
                        <x-icon-store icon="sun-store" class="h-14 w-14 fill-white" />
                    </span>
                    <span class="absolute right-0 top-0">
                        <x-icon-store icon="sun-store" class="h-14 w-14 fill-white" />
                    </span>
                    <span class="absolute bottom-0 left-0">
                        <x-icon-store icon="sun-store" class="h-14 w-14 fill-white" />
                    </span>
                    <span class="absolute bottom-0 right-0">
                        <x-icon-store icon="sun-store" class="h-14 w-14 fill-white" />
                    </span>
                </div>
                <div class="relative flex flex-col items-center justify-center gap-4 rounded-3xl bg-zinc-100 px-8 py-16"
                    style="background: linear-gradient(#011b4e,#138fdc)" data-aos="zoom-in-left">
                    <h3 class="font-mystical text-3xl uppercase text-white">Visión</h3>
                    <p class="font-secondary text-center text-sm text-zinc-100">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque voluptatem, eaque sunt quaerat
                        aliquid
                        voluptatum cumque, totam quasi provident esse id nostrum fugit nulla deserunt? Ea reprehenderit
                        temporibus assumenda impedit?
                    </p>
                    <span class="absolute left-0 top-0">
                        <x-icon-store icon="sun-store" class="h-14 w-14 fill-white" />
                    </span>
                    <span class="absolute right-0 top-0">
                        <x-icon-store icon="sun-store" class="h-14 w-14 fill-white" />
                    </span>
                    <span class="absolute bottom-0 left-0">
                        <x-icon-store icon="sun-store" class="h-14 w-14 fill-white" />
                    </span>
                    <span class="absolute bottom-0 right-0">
                        <x-icon-store icon="sun-store" class="h-14 w-14 fill-white" />
                    </span>
                </div>
            </div>
        </section>
        <section class="mx-auto w-4/5">
            <div class="flex flex-col gap-4">
                <h3 class="text-center font-league-spartan text-5xl font-bold text-secondary">Galería de imágenes</h3>
                <div class="flex h-full w-full items-center justify-center">
                    <div class="grid h-full w-full grid-cols-4 grid-rows-4 gap-4">

                        <div class="col-span-2 row-span-1 flex items-center justify-center">
                            <img src="{{ asset('images/fondo.jpg') }}" alt="Image about"
                                class="h-48 w-full rounded-3xl object-cover">
                        </div>

                        <div class="col-span-2 row-span-1 flex items-center justify-center">
                            <img src="{{ asset('images/fondo2.jpg') }}" alt="Image about"
                                class="h-48 w-full rounded-3xl object-cover">
                        </div>

                        <div class="col-span-1 row-span-4 flex items-center justify-center">
                            <img src="{{ asset('images/fondo7.jpg') }}" alt="Image about"
                                class="h-full w-full rounded-3xl object-cover">
                        </div>

                        <div class="bg-tan-200 col-span-2 row-span-2 flex items-center justify-center">
                            <img src="{{ asset('images/fondo4.jpg') }}" alt="Image about"
                                class="h-full w-full rounded-3xl object-cover">
                        </div>

                        <div class="col-span-1 row-span-2 flex items-center justify-center">
                            <img src="{{ asset('images/fondo5.jpg') }}" alt="Image about"
                                class="h-full w-full rounded-3xl object-cover">
                        </div>

                        <div class="col-span-3 row-span-2 flex items-center justify-center">
                            <img src="{{ asset('images/fondo6.jpg') }}" alt="Image about"
                                class="h-48 w-full rounded-3xl object-cover">
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
