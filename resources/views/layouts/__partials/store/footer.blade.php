<footer class="w-full">
    <div class="footer relative bg-secondary px-20 pb-10">
        <div class="flex items-center justify-between gap-4 py-8">
            <div class="flex items-center gap-2">
                <img src="{{ asset('/images/logo de entre cheros.png') }}" alt="" class="h-32 w-32 object-cover">
                <h2 class="font-tertiary text-3xl uppercase text-white">Entre cheros</h2>
            </div>
            <div class="flex flex-col gap-4 px-10">
                <div class="flex items-center gap-2">
                    <div class="flex items-center gap-2">
                        <x-icon-store icon="location" class="h-5 w-5 text-primary" />
                        <h4 class="text-primary">Dirección:</h4>
                    </div>
                    <div>
                        <p class="text-white">El Salvador</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <div class="flex items-center gap-2">
                        <x-icon-store icon="mail" class="h-5 w-5 text-primary" />
                        <h4 class="text-primary">Correo electrónico:</h4>
                    </div>
                    <div>
                        <p class="text-white">contact@entrecheros.com</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <div class="flex items-center gap-2">
                        <x-icon-store icon="call" class="h-5 w-5 text-primary" />
                        <h4 class="text-primary">Telefono:</h4>
                    </div>
                    <div>
                        <p class="text-white">+503 7545 6642</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 flex w-full justify-between">
            <div class="flex gap-20">
                <div>
                    <ul class="flex w-52 flex-col gap-2 font-primary text-primary">
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('home') }}" class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="arrow-right-02" class="h-5 w-5 text-current" />
                                </span>
                                Incio
                            </a>
                        </li>
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('store') }}" class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="arrow-right-02" class="h-5 w-5 text-current" />
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
                <div>
                    <h3 class="font-primary text-3xl font-bold text-white">Información</h3>
                    <ul class="mt-2 flex w-40 flex-col gap-2 text-primary">
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('account') }}"
                                class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="arrow-right-02" class="h-5 w-5 text-current" />
                                </span>
                                Cuenta
                            </a>
                        </li>
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('favorites') }}"
                                class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="arrow-right-02" class="h-5 w-5 text-current" />
                                </span>
                                Favoritos
                            </a>
                        </li>
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('login') }}" class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="arrow-right-02" class="h-5 w-5 text-current" />
                                </span>
                                Iniciar sesión
                            </a>
                        </li>
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('register') }}"
                                class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="arrow-right-02" class="h-5 w-5 text-current" />
                                </span>
                                Registrarte
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="font-secondary">
                    <h3 class="font-primary text-3xl font-bold text-white">Legal</h3>
                    <ul class="mt-2 flex flex-col gap-2 text-white">
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('faq') }}" class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="arrow-right-02" class="h-5 w-5 text-current" />
                                </span>
                                Términos y condiciones
                            </a>
                        </li>
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('faq') }}" class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="arrow-right-02" class="h-5 w-5 text-current" />
                                </span>
                                Políticas de privacidad
                            </a>
                        </li>
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('faq') }}"
                                class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="arrow-right-02" class="h-5 w-5 text-current" />
                                </span>
                                Políticas de envío
                            </a>
                        </li>
                        <li class="footer-item group group w-max">
                            <a href="{{ Route('faq') }}"
                                class="footer-link flex items-center justify-between gap-2">
                                <span class="arrow-icon">
                                    <x-icon-store icon="arrow-right-02" class="h-5 w-5 text-current" />
                                </span>
                                Cookies
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <h2 class="font-primary text-xl font-bold uppercase text-white">Sigamos en contacto</h2>
                <div>
                    <div class="relative w-full">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                            <x-icon-store icon="mail" class="h-5 w-5 text-zinc-500 dark:text-zinc-400" />
                        </div>
                        <input type="email" name="mail" id="mail"
                            placeholder="Ingresa tu correo electrónico"
                            class="w-full rounded-xl border border-zinc-300 px-6 py-3 pl-12 text-sm transition duration-300 focus:border-blue-500">
                    </div>
                    <small class="mt-1 block w-4/5 text-zinc-200">
                        Ingresa tu correo electrónico para estar al tanto de nuestras ofertas
                    </small>
                </div>
                <div class="mt-4 flex items-center justify-end gap-4">
                    <a href=""
                        class="rounded-full bg-tertiary p-3 text-white transition duration-300 hover:scale-110">
                        <x-icon-store icon="facebook" class="h-6 w-6 text-current" />
                    </a>
                    <a href=""
                        class="rounded-full bg-tertiary p-3 text-white transition duration-300 hover:scale-110">
                        <x-icon-store icon="twitter" class="h-6 w-6 text-current" />
                    </a>
                    <a href=""
                        class="rounded-full bg-tertiary p-3 text-white transition duration-300 hover:scale-110">
                        <x-icon-store icon="instagram" class="h-6 w-6 text-current" />
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="flex items-center gap-4">
                <img src="{{ asset('/images/paypal.webp') }}" alt="" class="h-14 w-28 object-contain">
                <img src="{{ asset('/images/mastercard-visa.jpg') }}" alt=""
                    class="h-14 w-28 object-contain">
            </div>
        </div>
    </div>
    <div class="flex w-full items-center justify-between gap-4 bg-secondary px-20 py-4">
        <div class="flex items-center justify-center">
            <p class="text-center text-sm text-white">&copy;2024 Entre cheros.</p>
        </div>
        <div class="flex gap-4">
            <div class="w-40">
                <div class="flex flex-col gap-2 font-secondary">
                    <input type="hidden" id="lang" name="lang" value="es">
                    <div class="relative">
                        <div
                            class="selected flex items-center justify-between rounded-full border border-zinc-300 px-6 py-3 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-200">
                            <span class="itemSelected flex items-center gap-2 text-zinc-300">
                                Español
                            </span>
                            <x-icon icon="arrow-down" class="h-5 w-6 text-zinc-300" />
                        </div>
                        <ul
                            class="selectOptions absolute z-10 mt-2 hidden w-full overflow-hidden rounded-2xl border border-zinc-300 bg-secondary py-1 shadow-lg">
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
                <div class="flex flex-col gap-2 font-secondary">
                    <input type="hidden" id="divisa" name="divisa" value="dollar-estadounidense">
                    <div class="relative">
                        <div
                            class="selected flex items-center justify-between rounded-full border border-zinc-300 px-6 py-3 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-200">
                            <span class="itemSelected flex items-center gap-2 text-zinc-300">
                                $ USD - Dólar estadounidense
                            </span>
                            <x-icon icon="arrow-down" class="h-5 w-6 text-zinc-300" />
                        </div>
                        <ul
                            class="selectOptions absolute z-10 mt-2 hidden w-full overflow-hidden rounded-2xl border border-zinc-300 bg-secondary py-1 shadow-lg">
                            <li class="itemOption flex items-center gap-2 px-4 py-2.5 text-sm text-white hover:bg-blue-950"
                                data-value="dollar-estadounidense" data-input="#divisa">
                                $ USD - Dólar estadounidense
                            </li>
                            <li class="itemOption flex items-center gap-2 px-4 py-2.5 text-sm text-white hover:bg-blue-950"
                                data-value="euro" data-input="#divisa">
                                € EURO - Euro
                            </li>
                            <li class="itemOption flex items-center gap-2 px-4 py-2.5 text-sm text-white hover:bg-blue-950"
                                data-value="peso-mexicano" data-input="#divisa">
                                $ MXN - Peso mexicano
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
