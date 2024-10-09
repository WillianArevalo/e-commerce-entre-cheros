<footer class="w-full">
    <div class="footer relative bg-secondary px-10 pb-10 text-sm sm:text-base md:px-20">
        <div class="flex flex-col items-center justify-between gap-4 py-8 md:text-center lg:flex-row">
            <div class="flex items-center gap-2">
                <img src="{{ asset('/images/logo de entre cheros.png') }}" alt="" class="h-32 w-32 object-cover">
                <h2 class="font-mystical text-3xl uppercase text-white">Entre cheros</h2>
            </div>
            <div class="flex flex-col gap-4 px-10">
                <div class="flex flex-wrap items-center justify-center gap-2 lg:justify-start">
                    <div class="flex items-center gap-2 md:text-center">
                        <x-icon-store icon="location" class="h-5 w-5 text-tertiary" />
                        <h4 class="text-tertiary">Dirección:</h4>
                    </div>
                    <div>
                        <p class="text-white">El Salvador</p>
                    </div>
                </div>
                <div class="flex flex-wrap items-center justify-center gap-2 lg:justify-start">
                    <div class="flex items-center gap-2">
                        <x-icon-store icon="mail" class="h-5 w-5 text-tertiary" />
                        <h4 class="text-tertiary">Correo electrónico:</h4>
                    </div>
                    <div>
                        <p class="text-white">contact@entrecheros.com</p>
                    </div>
                </div>
                <div class="flex flex-wrap items-center justify-center gap-2 lg:justify-start">
                    <div class="flex items-center gap-2">
                        <x-icon-store icon="call" class="h-5 w-5 text-tertiary" />
                        <h4 class="text-tertiary">Telefono:</h4>
                    </div>
                    <div>
                        <p class="text-white">+503 7545 6642</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 flex w-full flex-wrap justify-between">
            <div class="flex w-full flex-wrap justify-around gap-10 lg:w-auto lg:gap-20">
                <div>
                    <ul
                        class="flex w-52 flex-col items-center gap-2 font-league-spartan text-primary sm:items-baseline">
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('home') }}" class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="home" class="h-5 w-5 text-current" />
                                </span>
                                Incio
                            </a>
                        </li>
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('store') }}" class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="store" class="h-5 w-5 text-current" />
                                </span>
                                Tienda
                            </a>
                        </li>
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('about') }}" class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="arrow-right-02" class="h-5 w-5 text-current" />
                                </span>
                                Conócenos
                            </a>
                        </li>
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('faq') }}" class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="arrow-right-02" class="h-5 w-5 text-current" />
                                </span>
                                Preguntas frecuentes
                            </a>
                        </li>
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('about') }}" class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="arrow-right-02" class="h-5 w-5 text-current" />
                                </span>
                                Contáctanos
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="text-center sm:text-left">
                    <h3 class="font-league-spartan text-3xl font-bold text-white">Información</h3>
                    <ul class="mt-2 flex w-40 flex-col items-center gap-2 text-primary sm:items-baseline">
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('account.index') }}"
                                class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="user" class="h-5 w-5 text-current" />
                                </span>
                                Cuenta
                            </a>
                        </li>
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('favorites') }}"
                                class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="favourite" class="h-5 w-5 text-current" />
                                </span>
                                Favoritos
                            </a>
                        </li>
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('login') }}" class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="login-02" class="h-5 w-5 text-current" />
                                </span>
                                Iniciar sesión
                            </a>
                        </li>
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('register') }}"
                                class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="user-add" class="h-5 w-5 text-current" />
                                </span>
                                Registrarte
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="font-secondary">
                    <h3 class="font-league-spartan text-3xl font-bold text-white">Legal</h3>
                    <ul class="mt-2 flex flex-col gap-2 text-white">
                        @if ($policies->count() > 0)
                            @foreach ($policies as $policy)
                                <li class="footer-item group group w-max">
                                    <a href="{{ Route('policies.show', $policy->slug) }}"
                                        class="footer-link flex items-center justify-between gap-2">
                                        <span class="arrow-icon">
                                            <x-icon-store icon="arrow-right-02" class="h-5 w-5 text-current" />
                                        </span>
                                        {{ $policy->name }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('faq') }}" class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="cookie" class="h-5 w-5 text-current" />
                                </span>
                                Cookies
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mx-auto mt-10 flex flex-col gap-2 lg:mx-0 lg:mt-0">
                <h2 class="text-center font-league-spartan text-xl font-bold uppercase text-white lg:text-left">
                    Sigamos en contacto
                </h2>
                <div>
                    <div class="relative w-full">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                            <x-icon-store icon="mail" class="h-5 w-5 text-white" />
                        </div>
                        <input type="email" name="mail" id="mail"
                            placeholder="Ingresa tu correo electrónico"
                            class="w-full rounded-xl border border-white bg-transparent px-6 py-3 pl-12 text-sm transition duration-300 placeholder:text-zinc-200 focus:border-blue-500">
                    </div>
                    <small class="mt-1 block w-full text-center text-zinc-200 lg:w-4/5 lg:text-left">
                        Ingresa tu correo electrónico para estar al tanto de nuestras ofertas
                    </small>
                </div>
                <div class="mb-8 mt-4 flex items-center justify-center gap-4 lg:mb-0 lg:justify-end">
                    <a href=""
                        class="rounded-full bg-primary p-3 text-white transition duration-300 hover:scale-110">
                        <x-icon-store icon="facebook" class="h-6 w-6 text-current" />
                    </a>
                    <a href=""
                        class="rounded-full bg-primary p-3 text-white transition duration-300 hover:scale-110">
                        <x-icon-store icon="twitter" class="h-6 w-6 text-current" />
                    </a>
                    <a href=""
                        class="rounded-full bg-primary p-3 text-white transition duration-300 hover:scale-110">
                        <x-icon-store icon="instagram" class="h-6 w-6 text-current" />
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="flex items-center justify-center gap-4 lg:justify-start">
                @if ($paymentMethods)
                    @foreach ($paymentMethods as $paymentMethod)
                        <img src="{{ Storage::url($paymentMethod->image) }}" alt="{{ $paymentMethod->name }}"
                            class="h-14 w-28 rounded-xl object-cover">
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="flex w-full flex-col-reverse items-center justify-between gap-4 bg-secondary px-20 py-4 sm:flex-row">
        <div class="flex items-center justify-center">
            <p class="text-center text-sm text-white">&copy;2024 Entre cheros.</p>
        </div>
        <div class="flex flex-col items-center gap-4 sm:flex-row sm:justify-end">
            <div class="w-40">
                <div class="font-secondary flex flex-col gap-2">
                    <input type="hidden" id="lang" name="lang" value="es">
                    <div class="relative">
                        <div
                            class="selected flex items-center justify-between rounded-full border border-zinc-400 px-6 py-3 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-200">
                            <span class="itemSelected flex items-center gap-2 text-zinc-300">
                                Español
                            </span>
                            <x-icon-store icon="arrow-down" class="h-5 w-6 text-zinc-300" />
                        </div>

                        <ul
                            class="selectOptions absolute z-10 mt-2 hidden w-full overflow-hidden rounded-2xl border border-zinc-400 bg-secondary py-1 shadow-lg">
                            <li class="itemOption flex items-center gap-2 px-4 py-2.5 text-sm text-white hover:bg-blue-950"
                                data-value="en" data-input="#lang">
                                Inglés
                            </li>
                            <li class="itemOption flex items-center gap-2 px-4 py-2.5 text-sm text-white hover:bg-blue-950"
                                data-value="es" data-input="#lang">
                                Español
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="w-72">
                <div class="font-secondary flex flex-col gap-2">
                    <input type="hidden" id="current-currency" name="current-currency"
                        value="{{ $currencyDefault->id ?? 0 }}">
                    <div class="relative">
                        <div
                            class="selected flex items-center justify-between rounded-full border border-zinc-400 px-6 py-3 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-200">
                            <span class="itemSelected flex items-center gap-2 text-zinc-300">
                                @if ($currencyDefault)
                                    {{ $currencyDefault->symbol }} {{ $currencyDefault->code }} -
                                    {{ $currencyDefault->name }}
                                @else
                                    Sin moneda especificada
                                @endif
                            </span>
                            <x-icon-store icon="arrow-down" class="h-5 w-6 text-zinc-300" />
                        </div>
                        @if ($currencies)
                            <ul
                                class="selectOptions absolute z-10 mt-2 hidden w-full overflow-hidden rounded-2xl border border-zinc-400 bg-secondary py-1 shadow-lg">
                                @foreach ($currencies as $currency)
                                    <li class="itemOption flex items-center gap-2 px-4 py-2.5 text-sm text-white hover:bg-blue-950"
                                        data-value="{{ $currency->id }}" data-input="#current-currency">
                                        {{ $currency->symbol }} {{ $currency->code }} - {{ $currency->name }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
