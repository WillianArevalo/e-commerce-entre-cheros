@extends('layouts.admin-template')
@section('title', 'Admin | Dashboard')
@section('content')
    <div class="">
        <div>
            <div class="flex items-center gap-2 p-4">
                <x-icon icon="dashboard-square" class="ml-2 h-8 w-8 text-secondary dark:text-primary" />
                <h1 class="text-3xl font-bold text-secondary dark:text-primary">
                    Panel de Administración
                </h1>
            </div>
            <!-- Content dashboard -->
            <div class="flex gap-4 px-4">
                <div class="flex-1">
                    <div class="flex gap-4">
                        <div class="h-full flex-1 rounded-xl border border-zinc-400 p-4 dark:border-zinc-800">
                            <div class="flex items-center gap-1">
                                <span
                                    class="m-1 rounded-full border border-zinc-400 bg-zinc-100 p-2 dark:border-zinc-800 dark:bg-zinc-950">
                                    <x-icon icon="user-plus" class="h-8 w-8 text-blue-900 dark:text-blue-300" />
                                </span>
                                <span class="text-5xl font-bold text-secondary dark:text-tertiary">20</span>
                            </div>
                            <span class="font-league-spartan text-xl font-semibold text-secondary dark:text-tertiary">
                                Nuevos clientes
                            </span>
                        </div>
                        <div class="h-full flex-1 rounded-xl border border-zinc-400 dark:border-zinc-800">
                            <div class="flex flex-col">
                                <div
                                    class="flex items-center justify-between rounded-t-xl border-b border-zinc-400 bg-zinc-100 px-4 py-2 dark:border-zinc-800 dark:bg-zinc-950">
                                    <h2 class="text-base font-semibold text-zinc-500 dark:text-zinc-300">
                                        Pedidos
                                    </h2>
                                    <div class="relative">
                                        <button type="button" class="show-options">
                                            <x-icon icon="more-hortizontal"
                                                class="h-6 w-6 text-zinc-500 dark:text-zinc-300" />
                                        </button>
                                        <div
                                            class="options absolute hidden w-40 rounded-lg border border-zinc-400 bg-white p-2 dark:border-zinc-800 dark:bg-zinc-950">
                                            <ul class="flex flex-col text-sm">
                                                <li>
                                                    <a href="#"
                                                        class="flex w-full items-center gap-1 rounded-lg px-2 py-2 text-zinc-700 hover:bg-zinc-100 dark:text-zinc-300 dark:hover:bg-zinc-900">
                                                        <x-icon icon="plus" class="h-4 w-4" />
                                                        Nuevo pedido
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block w-full rounded-lg px-2 py-2 text-zinc-700 hover:bg-zinc-100 dark:text-zinc-300 dark:hover:bg-zinc-900">
                                                        Ver todo
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col items-start gap-2 p-4">
                                    <div class="flex items-center gap-1 text-green-600 dark:text-green-500">
                                        <x-icon icon="truck-loading" class="h-8 w-8 text-current" />
                                        <span class="text-3xl font-bold">30</span>
                                        <span class="text-sm">
                                            Pendientes
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Chart -->
                    <div class="mt-4 h-max flex-1 rounded-xl border border-zinc-400 dark:border-zinc-800">
                        <div class="flex flex-col rounded-t-xl border-b pb-4 dark:border-zinc-800">
                            <div class="flex justify-between p-4">
                                <h2 class="text-base font-medium text-zinc-500 dark:text-zinc-300">Resumen de Ventas</h2>
                                <div class="relative">
                                    <button type="button" class="show-options">
                                        <x-icon icon="more-hortizontal" class="h-6 w-6 text-zinc-500 dark:text-zinc-300" />
                                    </button>
                                    <div
                                        class="options absolute hidden w-40 rounded-lg border border-zinc-400 bg-white p-2 dark:border-zinc-800 dark:bg-zinc-950">
                                        <ul class="flex flex-col text-sm">
                                            <li>
                                                <a href="#"
                                                    class="block w-full rounded-lg px-2 py-2 text-zinc-700 hover:bg-zinc-100 dark:text-zinc-300 dark:hover:bg-zinc-900">
                                                    Últimos 7 días
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block w-full rounded-lg px-2 py-2 text-zinc-700 hover:bg-zinc-100 dark:text-zinc-300 dark:hover:bg-zinc-900">
                                                    Últimos 30 días
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block w-full rounded-lg px-2 py-2 text-zinc-700 hover:bg-zinc-100 dark:text-zinc-300 dark:hover:bg-zinc-900">
                                                    Ver todo
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <span class="font-secondary px-4 text-5xl font-bold text-secondary dark:text-tertiary">
                                $400,000
                            </span>
                        </div>
                        <div class="h-max p-6">
                            <canvas id="salesChart" class="p-4"></canvas>
                        </div>
                    </div>
                    <!-- End Chart -->
                </div>
                <div class="flex-1">
                    <div class="flex gap-4">
                        <div class="h-max flex-1 overflow-hidden rounded-xl border border-zinc-400 dark:border-zinc-800">
                            <div class="bg-zinc-100 p-4 dark:bg-zinc-950">
                                <p class="font-semibold text-zinc-600 dark:text-zinc-300">Usuarios</p>
                                <p class="text-3xl font-bold text-secondary dark:text-tertiary">4.890</p>
                                <p class="text-xs uppercase text-zinc-500 dark:text-zinc-600">
                                    En el último mes
                                </p>
                            </div>
                            <div
                                class="flex items-center justify-center border-t border-zinc-400 pt-4 dark:border-zinc-800">
                                <div class="h-60 w-60">
                                    <canvas id="userChart"></canvas>
                                </div>
                            </div>
                            <div
                                class="mt-6 flex flex-col gap-1 border-t border-zinc-400 bg-zinc-100 p-4 dark:border-zinc-800 dark:bg-zinc-950">
                                <p class="flex items-center gap-2 text-xs uppercase">
                                    <span class="block h-3 w-8 rounded-full bg-[#f2d410]"></span>
                                    <span class="text-zinc-600 dark:text-zinc-300">
                                        62% Nuevos usuarios
                                    </span>
                                </p>
                                <p class="flex items-center gap-2 text-xs uppercase">
                                    <span class="block h-3 w-6 rounded-full bg-[#f6e36b]"></span>
                                    <span class="text-zinc-600 dark:text-zinc-300">
                                        26% Activos
                                    </span>
                                </p>
                                <p class="flex items-center gap-2 text-xs uppercase">
                                    <span class="block h-3 w-4 rounded-full bg-[#eee7b9]"></span>
                                    <span class="text-zinc-600 dark:text-zinc-300">
                                        12% Inactivos
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="h-max flex-1 overflow-hidden rounded-xl border border-zinc-400 dark:border-zinc-800">
                            <div class="bg-zinc-100 p-4 dark:bg-zinc-950">
                                <p class="font-semibold text-zinc-600 dark:text-zinc-300">Pedidos</p>
                                <p class="text-3xl font-bold text-secondary dark:text-tertiary">400</p>
                                <p class="text-xs uppercase text-zinc-500 dark:text-zinc-600">
                                    Todos los pedidos
                                </p>
                            </div>
                            <div
                                class="flex items-center justify-center border-t border-zinc-400 pt-4 dark:border-zinc-800">
                                <div class="h-60 w-60">
                                    <canvas id="orderChart"></canvas>
                                </div>
                            </div>
                            <div
                                class="mt-6 flex flex-col gap-1 border-t border-zinc-400 bg-zinc-100 p-4 dark:border-zinc-800 dark:bg-zinc-950">
                                <p class="flex items-center gap-2 text-xs uppercase">
                                    <span class="block h-3 w-8 rounded-full bg-[#138fdc]"></span>
                                    <span class="text-[#138fdc] dark:text-[#138fdc]">
                                        50% Completados
                                    </span>
                                </p>
                                <p class="flex items-center gap-2 text-xs uppercase">
                                    <span class="block h-3 w-6 rounded-full bg-[#38c172]"></span>
                                    <span class="text-green-500 dark:text-[#38c172]">
                                        45% Pendientes
                                    </span>
                                </p>
                                <p class="flex items-center gap-2 text-xs uppercase">
                                    <span class="block h-3 w-4 rounded-full bg-red-500"></span>
                                    <span class="text-green-500 dark:text-red-500">
                                        5% Cancelados
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex rounded-lg border border-zinc-400 dark:border-zinc-800">
                        <div class="flex flex-1 items-start gap-4 border-e p-4 dark:border-zinc-950">
                            <span class="rounded-full p-2 dark:bg-zinc-950">
                                <x-icon icon="package" class="h-6 w-6 text-yellow-500 dark:text-yellow-500" />
                            </span>
                            <span class="flex flex-col gap-1">
                                <p class="text-sm text-zinc-500 dark:text-zinc-300">Productos en stock bajo</p>
                                <a href="#" class="text-xs text-blue-500 underline dark:text-blue-300">Ver todo</a>
                            </span>
                        </div>
                        <div class="flex flex-1 items-start gap-4 p-4">
                            <span class="rounded-full p-2 dark:bg-zinc-950">
                                <x-icon icon="package" class="h-6 w-6 text-red-500 dark:text-red-500" />
                            </span>
                            <span class="flex flex-col gap-1">
                                <p class="text-sm text-zinc-500 dark:text-zinc-300">
                                    Productos agotados
                                </p>
                                <a href="#" class="text-xs text-blue-500 underline dark:text-blue-300">Ver todo</a>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="mt-4 border-t border-zinc-400 dark:border-zinc-800">
                <div class="m-4 overflow-hidden rounded-lg border border-zinc-400 dark:border-zinc-800">
                    <div
                        class="flex items-center justify-between rounded-t-lg border-b border-zinc-400 bg-zinc-100 dark:border-zinc-800 dark:bg-zinc-950">
                        <h2 class="p-4 text-2xl font-bold uppercase text-secondary dark:text-tertiary">
                            Últimos pedidos
                        </h2>
                        <div class="me-4 flex items-center gap-2">
                            <x-button text="Ver todos" typeButton="primary" />
                            <x-button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" type="button"
                                icon="filter" typeButton="secondary" text="Filtros" />
                            <div id="filterDropdown"
                                class="z-10 hidden w-48 rounded-lg bg-white p-3 shadow dark:bg-zinc-950">
                                <form action="{{ route('admin.categories.search') }}" method="POST"
                                    id="formSearchCategorieCheck">
                                    @csrf
                                    <h6 class="mb-3 text-sm font-medium text-zinc-900 dark:text-white">
                                        Filtros
                                    </h6>
                                    <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                        <li class="flex items-center">
                                            <input id="offers" name="filter[]" type="checkbox" value="offers"
                                                class="h-4 w-4 rounded border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-500 dark:bg-white dark:ring-offset-zinc-700 dark:focus:ring-blue-600">
                                            <label for="offers"
                                                class="ml-2 text-sm font-medium text-zinc-900 dark:text-zinc-100">
                                                Con ofertas
                                            </label>
                                        </li>
                                        <li class="flex items-center">
                                            <input id="flash_offers" name="filter[]" type="checkbox"
                                                value="flash_offers"
                                                class="h-4 w-4 rounded border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-500 dark:bg-white dark:ring-offset-zinc-700 dark:focus:ring-blue-600">
                                            <label for="flash_offers"
                                                class="ml-2 text-sm font-medium text-zinc-900 dark:text-zinc-100">
                                                Con ofertas flash
                                            </label>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <table class="w-full text-left text-sm text-zinc-500 dark:text-zinc-400">
                            <thead
                                class="border-b border-zinc-400 bg-zinc-50 text-xs uppercase text-zinc-700 dark:border-zinc-800 dark:bg-black dark:text-zinc-300">
                                <tr>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Orden
                                    </th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Total
                                    </th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Cliente
                                    </th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Estado de pago
                                    </th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Estado de envío
                                    </th>
                                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Fecha
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Tipo de envío
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-black">
                                <tr>
                                    <td class="border-e border-zinc-400 px-4 py-3 text-sm dark:border-zinc-800">
                                        #1234
                                    </td>
                                    <td class="border-e border-zinc-400 px-4 py-3 text-sm dark:border-zinc-800">
                                        $200
                                    </td>
                                    <td class="border-e border-zinc-400 px-4 py-3 text-sm dark:border-zinc-800">
                                        <div class="flex items-center gap-2">
                                            <img src="{{ asset('images/photo.jpg') }}" alt=""
                                                class="h-10 w-10 rounded-full object-cover">
                                            John Doe
                                        </div>
                                    </td>
                                    <td class="border-e border-zinc-400 px-4 py-3 text-sm dark:border-zinc-800">
                                        <span
                                            class="inline-block rounded-full bg-green-100 px-2 py-1 text-xs font-semibold uppercase text-green-500 dark:bg-green-900 dark:text-green-300">
                                            Completado
                                        </span>
                                    </td>
                                    <td class="border-e border-zinc-400 px-4 py-3 text-sm dark:border-zinc-800">
                                        <span
                                            class="inline-block rounded-full bg-green-100 px-2 py-1 text-xs font-semibold uppercase text-green-500 dark:bg-green-900 dark:text-green-300">
                                            Enviado
                                        </span>
                                    </td>
                                    <td class="border-e border-zinc-400 px-4 py-3 text-sm dark:border-zinc-800">
                                        12/12/2021
                                    </td>
                                    <td class="px-4 py-3">
                                        <span
                                            class="inline-block rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold uppercase text-blue-500 dark:bg-blue-900 dark:text-blue-300">
                                            Express
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        #1235
                                    </td>
                                    <td class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        $150
                                    </td>
                                    <td class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        Jane Doe
                                    </td>
                                    <td class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        <span
                                            class="inline-block rounded-full bg-yellow-100 px-2 py-1 text-xs font-semibold uppercase text-yellow-500 dark:bg-yellow-900 dark:text-yellow-300">
                                            Pendiente
                                        </span>
                                    </td>
                                    <td class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        <span
                                            class="inline-block rounded-full bg-yellow-100 px-2 py-1 text-xs font-semibold uppercase text-yellow-500 dark:bg-yellow-900 dark:text-yellow-300">
                                            Pendiente
                                        </span>
                                    </td>
                                    <td class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                                        12/12/2021
                                    </td>
                                    <td class="px-4 py-3">
                                        <span
                                            class="inline-block rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold uppercase text-blue-500 dark:bg-blue-900 dark:text-blue-300">
                                            Express
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
