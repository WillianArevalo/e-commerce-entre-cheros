@extends('layouts.template')

@section('title', 'Contactanos')

@section('content')
    <main>
        <section>
            <div class="relative flex h-[400px] w-full items-center justify-center text-white"
                style="background-image:url('{{ asset('images/fondo7.jpg') }}'); background-position:center; background-repeat: no-repeat; background-size: cover;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute bottom-0 w-full">
                    <path fill="#fff" fill-opacity="1"
                        d="M0,96L34.3,117.3C68.6,139,137,181,206,208C274.3,235,343,245,411,229.3C480,213,549,171,617,170.7C685.7,171,754,213,823,229.3C891.4,245,960,235,1029,202.7C1097.1,171,1166,117,1234,101.3C1302.9,85,1371,107,1406,117.3L1440,128L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                    </path>
                </svg>
                <h1 class="mb-16 block font-tertiary text-5xl font-normal uppercase text-white" data-aos="zoom-in">
                    Contactanos
                </h1>
            </div>
        </section>
        <section class="mx-auto w-4/5">
            <div class="flex gap-8">
                <div class="flex flex-1 items-center justify-center" data-aos="fade-right">
                    <div>
                        <p class="font-secondary text-sm font-medium text-zinc-800">
                            Si tienes alguna duda, comentario o sugerencia, no dudes en contactarnos.
                        </p>
                        <form action="{{ route('contact') }}" method="POST" class="mt-4">
                            @csrf
                            <div class="flex w-full flex-col gap-4">
                                <div class="flex flex-col gap-2">
                                    <x-input-store type="text" icon="user" label="Nombre" name="name"
                                        id="name" placeholder="Ingresa aquí tu nombre" />
                                </div>
                                <div class="flex flex-col gap-2">
                                    <x-input-store type="email" icon="mail" name="email" label="Correo electrónico"
                                        id="email" placeholder="Ingresa aquí tu correo electrónico" />
                                </div>
                                <div class="flex flex-col gap-2">
                                    <x-input-store type="textarea" name="message" label="Mensaje" id="message"
                                        placeholder="Ingresa aquí tu mensaje" />
                                </div>
                                <div class="flex items-center justify-center">
                                    <x-button-store typeButton="primary" class="px-10" icon="send" text="Enviar" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="flex-1" data-aos="fade-left">
                    <div class="flex flex-col gap-4">
                        <h2 class="font-primary text-4xl font-bold text-secondary">Contacta con nosotros</h2>
                        <p class="font-secondary text-sm text-zinc-600">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut error ab, aspernatur ex voluptatem,
                            sunt ducimus laudantium debitis natus explicabo architecto animi possimus nisi voluptatibus!
                        </p>
                    </div>
                    <div class="mt-4 grid grid-cols-2 gap-4">
                        <div class="flex flex-col items-start rounded-3xl bg-zinc-100 p-4">
                            <div class="flex items-center gap-2">
                                <x-icon-store icon="call" class="h-8 w-8 text-tertiary" />
                                <h3 class="font-primary text-xl font-semibold text-secondary">Telefono</h3>
                            </div>
                            <p class="ms-10 font-secondary text-sm text-zinc-600">+503 7545 6642</p>
                        </div>
                        <div class="flex flex-col items-start rounded-3xl bg-zinc-100 p-4">
                            <div class="flex items-center gap-2">
                                <x-icon-store icon="mail" class="h-8 w-8 text-tertiary" />
                                <h3 class="font-primary text-xl font-semibold text-secondary">
                                    Correo electrónico
                                </h3>
                            </div>
                            <p class="ms-10 font-secondary text-sm text-zinc-600">
                                contact@entrecheros.com
                            </p>
                        </div>
                        <div class="flex flex-col items-start rounded-3xl bg-zinc-100 p-4">
                            <div class="flex items-center gap-2">
                                <x-icon-store icon="location" class="h-8 w-8 text-tertiary" />
                                <h3 class="font-primary text-xl font-semibold text-secondary">
                                    Dirección
                                </h3>
                            </div>
                            <p class="ms-10 font-secondary text-sm text-zinc-600">
                                4a Calle Poniente, San Salvador, El Salvador
                            </p>
                        </div>
                    </div>
                </div>
        </section>
        <section class="mt-20">
            <div id="map" class="h-[500px] w-full">
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer>
    </script>
    <script>
        class Location {
            constructor(callback) {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition((position) => {
                        this.latitude = position.coords.latitude;
                        this.longitude = position.coords.longitude;
                        callback();
                    });
                } else {
                    alert("Tu navegador no soporta geolocalización");
                }
            }
        }

        function initMap() {
            const location = new Location(() => {
                const options = {
                    center: {
                        lat: location.latitude,
                        lng: location.longitude,
                    },
                    zoom: 15,
                };

                var map = document.getElementById("map");
                const googleMap = new google.maps.Map(map, options);
            });
        }
    </script>
@endpush
