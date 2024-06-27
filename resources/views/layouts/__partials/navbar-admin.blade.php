<header>
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="sidebar-multi-level-sidebar"
                        data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar"
                        type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="https://flowbite.com" class="flex ms-2 md:me-24">
                        <img src="{{ asset('images/photo.jpg') }}" class="h-8 me-3 w-8 object-cover rounded-full"
                            alt="Entre Cheros logo" />
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl font-primary whitespace-nowrap dark:text-white">
                            Entre Cheros
                        </span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3 gap-2">
                        <div class="flex items-center justify-center">
                            <button data-dropdown-toggle="dropdown-alerts"
                                class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                                <x-icon icon="notification" class="w-6 h-6 text-gray-700 dark:text-white" />
                            </button>
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600 sm:w-80 w-full"
                                id="dropdown-alerts">
                                <span class="block p-3 text-center text-gray-700 dark:text-gray-300">
                                    Notificaciones
                                </span>
                                <ul role="none">
                                    <li>
                                        <a href="#"
                                            class="flex items-start gap-4 px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">
                                            <img src="{{ asset('images/photo.jpg') }}"
                                                class="w-10 h-10 rounded-full object-cover" alt="">
                                            <div class="flex flex-col gap-2">
                                                Nuevo ticket abierto
                                                <span class="text-xs text-blue-500">Hace 2 minutos</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-start gap-4 px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">
                                            <img src="{{ asset('images/photo.jpg') }}"
                                                class="w-10 h-10 rounded-full object-cover" alt="">
                                            <div class="flex flex-col gap-2">
                                                Nuevo ticket abierto
                                                <span class="text-xs text-blue-500">Hace 2 minutos</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-start gap-4 px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">
                                            <img src="{{ asset('images/photo.jpg') }}"
                                                class="w-10 h-10 rounded-full object-cover" alt="">
                                            <div class="flex flex-col gap-2">
                                                Nuevo ticket abierto
                                                <span class="text-xs text-blue-500">Hace 2 minutos</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex p-3 gap-2 justify-center items-center text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white border-t border-gray-100 dark:border-gray-600"
                                            role="menuitem">
                                            <x-icon icon="view" class="w-5 h-5 text-current" />
                                            Ver todas
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex items-center justify-center">
                            <button id="toggleTheme"
                                class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                                <x-icon icon="moon"
                                    class="w-6 h-6 text-gray-700 dark:text-white icon-moon dark:hidden" />
                                <x-icon icon="sun"
                                    class="w-6 h-6 text-gray-700 dark:block hidden dark:text-white" />
                            </button>
                        </div>
                        <div class="ms-2">
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="{{ asset('images/photo.jpg') }}"
                                    alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    {{ auth()->user()->username }}
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                    {{ auth()->user()->email }}
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="{{ route('admin.index') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Configuración</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Ganancias</a>
                                </li>
                                <li class="border-t border-gray-600">
                                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-start px-4 py-1.5 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">Cerrar sesión</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<aside id="sidebar-multi-level-sidebar"
    class="pt-12 fixed top-0 left-0 z-40 h-screen transition-transform -translate-x-full sm:translate-x-0 w-72 border border-zinc-200 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 mt-2">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('admin.index') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <x-icon icon="dashboard-square"
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-ecommerce">
                    <x-icon icon="shopping-cart-02"
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">E-commerce</span>
                    <x-icon icon="arrow-down" class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                </button>
                <ul id="dropdown-ecommerce" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('admin.categories.index') }}"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Categorías</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Marcas</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Productos</a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-store" data-collapse-toggle="dropdown-store">
                    <x-icon icon="store"
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Tienda</span>
                    <x-icon icon="arrow-down" class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                </button>
                <ul id="dropdown-store" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Ofertas relámpago
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Anuncios
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Estrategia de ventas
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Administrar reseñas
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <x-icon icon="trolley"
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                    <span class="flex-1 ms-3 whitespace-nowrap">Pedidos</span>
                </a>
            </li>
            {{-- <li>
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 18 18">
                        <path
                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Kanban</span>
                    <span
                        class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
                </a>
            </li> --}}
            <li>
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <x-icon icon="wechat"
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                    <span class="flex-1 ms-3 whitespace-nowrap">
                        Live chat
                    </span>
                    <span
                        class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-100 bg-blue-700 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <x-icon icon="user"
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                    <span class="flex-1 ms-3 whitespace-nowrap">Usuarios</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-customers" data-collapse-toggle="dropdown-customers">
                    <x-icon icon="user-group"
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Clientes</span>
                    <x-icon icon="arrow-down" class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                </button>
                <ul id="dropdown-customers" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Clientes registrados
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Tickets de soporte
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Suscripciones
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-settings" data-collapse-toggle="dropdown-settings">
                    <x-icon icon="settings"
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">
                        Configuración
                    </span>
                    <x-icon icon="arrow-down" class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                </button>
                <ul id="dropdown-settings" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Ajustes generales
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Políticas
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Modo mantenimiento
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Preguntas frecuentes
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            Crear páginas
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
