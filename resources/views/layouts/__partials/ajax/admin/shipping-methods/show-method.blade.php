@if ($method)
    <div class="p-4">
        <div class="flex flex-col rounded-lg border border-zinc-400 dark:border-zinc-800">
            <div class="flex items-center justify-between gap-4 p-4">
                <div>
                    <h2 class="font-bold uppercase text-zinc-700 dark:text-zinc-300">Nombre:</h2>
                    <x-paragraph>{{ $method->name }}</x-paragraph>
                </div>
                <div>
                    <x-badge-status :status="$method->active" />
                </div>
            </div>
            <div class="border-t border-zinc-400 dark:border-zinc-800">
                <div class="flex flex-col gap-2 px-4 pb-2 pt-4">
                    <h3 class="font-bold uppercase text-zinc-700 dark:text-zinc-300">Descripción:</h3>
                    <x-paragraph>
                        {{ $method->description }}
                    </x-paragraph>
                </div>
                <div class="flex items-center gap-2 px-5 py-2">
                    <h3 class="font-bold uppercase text-zinc-700 dark:text-zinc-300">Tiempo de entrega:</h3>
                    <x-paragraph>
                        {{ $method->time }}
                    </x-paragraph>
                </div>
                <div class="flex items-center gap-2 px-5 py-2">
                    <h3 class="font-bold uppercase text-zinc-700 dark:text-zinc-300">Locación:</h3>
                    <div class="flex items-center gap-2">
                        <x-icon icon="location" class="h-4 w-4 text-blue-500" />
                        <x-paragraph>
                            {{ $method->location }}
                        </x-paragraph>
                    </div>
                </div>
                <div class="flex items-center gap-2 px-5 pb-4 pt-2">
                    <h3 class="font-bold uppercase text-zinc-700 dark:text-zinc-300">Costo:</h3>
                    <x-paragraph>
                        ${{ $method->cost }}
                    </x-paragraph>
                </div>
            </div>
        </div>
        <div class="mt-2 overflow-hidden rounded-lg border border-zinc-400 dark:border-zinc-800">
            <table class="w-full text-left text-sm text-zinc-500 dark:text-zinc-400">
                <thead
                    class="border-b border-zinc-400 bg-zinc-50 text-xs uppercase text-zinc-700 dark:border-zinc-800 dark:bg-black dark:text-zinc-300">
                    <th scope="col" class="border-e border-zinc-400 px-4 py-3 dark:border-zinc-800">
                        Peso máximo
                    </th>
                    <th scope="col" class="px-4 py-3">
                        Peso mínimo
                    </th>
                </thead>
                <tbody>
                    <tr class="hover:bg-zinc-100 dark:hover:bg-zinc-950">
                        <td class="px-4 py-3">
                            <span class="flex items-center gap-2">
                                <x-icon icon="plus" class="h-4 w-4 text-green-600" />
                                {{ $method->max_weight }} KG
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="flex items-center gap-2">
                                <x-icon icon="minus" class="h-4 w-4 text-red-600" />
                                {{ $method->min_weight }} KG
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4 flex items-center justify-center gap-2">
        <x-button type="button" class="close-drawer" data-drawer="#drawer-details-method" typeButton="secondary"
            text="Cerrar" />
    </div>
@endif
