<div class="w-full">
    @if ($label != '')
        <label for="{{ $id }}"
            class="{{ $required ? "after:content-['*'] after:ml-0.5 after:text-red-500" : '' }} mb-2 block text-start text-sm font-medium text-zinc-600 md:text-base">
            {{ ucfirst($label) }}
        </label>
    @endif
    <input type="hidden" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}">
    <div class="relative">
        <div
            class="selected @error($name) is-invalid @enderror flex w-full items-center justify-between rounded-xl border border-zinc-300 bg-white px-6 py-3 text-sm text-zinc-700 md:text-base">
            <span class="itemSelected truncate" id="{{ $id }}_selected">
                {{ $selected && isset($options[$selected]) ? $options[$selected] : ($text ?: 'Seleccionar') }}
            </span>
            <x-icon icon="arrow-down" class="ms-4 h-5 w-5 text-zinc-500" />
        </div>
        <ul
            class="selectOptions {{ count($options) > 6 ? 'h-64 overflow-auto' : '' }} an absolute z-10 mb-8 mt-2 hidden w-full rounded-xl border border-zinc-300 bg-white p-2 shadow-lg">
            @foreach ($options as $value => $label)
                <li class="itemOption cursor-default truncate rounded-xl px-4 py-2.5 text-sm text-zinc-700 hover:bg-zinc-100 md:text-base"
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
