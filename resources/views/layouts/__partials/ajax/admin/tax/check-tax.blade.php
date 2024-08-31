@if ($taxes->count() > 0)
    @foreach ($taxes as $tax)
        <div>
            <input id="{{ $tax->name }}" type="checkbox" value="{{ $tax->id }}" name="tax_id[]"
                class="h-4 w-4 rounded border-2 border-zinc-400 bg-zinc-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-zinc-800 dark:bg-zinc-950 dark:ring-offset-zinc-800 dark:focus:ring-blue-600">
            <label for="{{ $tax->name }}" class="ms-2 text-sm font-medium text-zinc-900 dark:text-zinc-300">
                {{ $tax->name }}
                <span class="text-xs text-blue-700 dark:text-blue-400">({{ $tax->rate }}%)</span>
            </label>
        </div>
    @endforeach
@endif
