@if ($taxes->count() > 0)
    @foreach ($taxes as $tax)
        <div>
            <input id="{{ $tax->name }}" type="checkbox" value="{{ $tax->id }}" name="tax_id[]"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-white dark:border-gray-600">
            <label for="{{ $tax->name }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                {{ $tax->name }}
                <span class="text-xs text-blue-700 dark:text-blue-400">({{ $tax->rate }}%)</span>
            </label>
        </div>
    @endforeach
@endif
