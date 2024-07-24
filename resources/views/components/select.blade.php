<div class="w-full">
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        {{ ucfirst($label) }}
    </label>
    <input type="hidden" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}">
    <div class="relative">
        <div
            class="selected border border-gray-300 bg-gray-50 dark:border-zinc-800 rounded py-2.5 dark:bg-zinc-950 w-full px-4 dark:text-white text-sm flex items-center justify-between @error($name) is-invalid @enderror">
            <span class="itemSelected">{{ $selected ? $options[$selected] : 'Seleccionar' }}</span>
            <x-icon icon="arrow-down" class="w-5 h-5 dark:text-white text-gray-500" />
        </div>
        <ul
            class="absolute z-10 w-full mt-2 p-2 bg-white border border-gray-200 rounded shadow-lg dark:bg-zinc-950 dark:border-zinc-900 selectOptions hidden">
            @foreach ($options as $value => $label)
                <li class="itemOption text-sm rounded text-gray-900 dark:text-white px-4 py-2.5 hover:bg-gray-100 dark:hover:bg-zinc-900"
                    data-value="{{ $value }}" data-input="#{{ $id }}">
                    {{ $label }}
                </li>
            @endforeach
        </ul>
    </div>
    @error($name)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
