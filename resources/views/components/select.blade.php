<div class="w-full">
    @if ($label)
        <label for="{{ $id }}"
            class="{{ $required ? "after:content-['*'] after:ml-0.5 after:text-red-500" : '' }} mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            {{ ucfirst($label) }}
        </label>
    @endif
    <input type="hidden" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}">
    <div class="relative">
        <div
            class="selected @error($name) is-invalid @enderror flex w-full items-center justify-between rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 text-sm dark:border-zinc-800 dark:bg-zinc-950 dark:text-white">
            <span class="itemSelected" id="{{ $id }}_selected">
                {{ $selected && isset($options[$selected]) ? $options[$selected] : ($text ?: 'Seleccionar') }}
            </span>
            <x-icon icon="arrow-down" class="h-5 w-5 text-gray-500 dark:text-white" />
        </div>
        <ul
            class="selectOptions {{ count($options) > 6 ? 'h-64 overflow-auto' : '' }} absolute z-10 mb-8 mt-2 hidden w-full rounded-lg border border-gray-200 bg-white p-2 shadow-lg dark:border-zinc-900 dark:bg-zinc-950">
            @foreach ($options as $value => $label)
                <li class="itemOption rounded-lg px-4 py-2.5 text-sm text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-zinc-900"
                    data-value="{{ $value }}" data-input="#{{ $id }}">
                    {{ $label }}
                </li>
            @endforeach
        </ul>
    </div>
    @error($name)
        <span class="text-sm text-red-500">{{ $message }}</span>
    @enderror
</div>
