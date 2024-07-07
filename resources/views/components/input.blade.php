@props([
    'type' => 'text',
    'name',
    'id',
    'label',
    'placeholder' => '',
    'value' => '',
    'class' => '',
    'required' => '',
    'icon' => '',
    'error' => true,
])

@php
    $errorClass = $errors->has($name) ? 'is-invalid' : '';

    $labelClass = $required ? " after:content-['*'] after:ml-0.5 after:text-red-500" : '';

    $classes =
        'bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-4 focus:ring-blue-200 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-900 dark:focus:border-blue-500' .
        $class .
        ' ' .
        $errorClass;
@endphp
<label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white {{ $labelClass }}">
    {{ $label }}
</label>

@if ($icon)
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
            <span class="text-gray-500 dark:text-gray-400 font-medium">
                <x-icon icon="{{ $icon }}" class="w-5 h-5 text-current" />
            </span>
        </div>
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
            placeholder="{{ $placeholder }}" value="{{ $value }}" class="{{ $classes }} ps-10"
            {{ $attributes }}>
    </div>
@endif

@if ($type != 'textarea' && !$icon)
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
        placeholder="{{ $placeholder }}" value="{{ $value }}" class="{{ $classes }}"
        {{ $attributes }}>
@endif

@if ($type === 'textarea')
    <textarea id="{{ $id }}" name="{{ $name }}" rows="4"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-2 border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="{{ $placeholder }}">{{ $value }}</textarea>
@endif

@if ($error === true)
    @error($name)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
@endif
