<!-- Breadcrumb -->
@php $breadcrumbs = Breadcrumbs::generate(); @endphp
@if (!empty($breadcrumbs))
    <div class="flex justify-end">
        <nav class="flex w-max px-6 py-2 text-gray-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 uppercase rtl:space-x-reverse md:space-x-2">
                @foreach ($breadcrumbs as $key => $breadcrumb)
                    @if ($breadcrumb->url && !$loop->last)
                        <li>
                            <div class="flex items-center gap-4">
                                <a href="{{ $breadcrumb->url }}"
                                    class="flex items-center gap-1 rounded-lg px-3 py-1 text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:bg-zinc-950 dark:hover:text-white">
                                    {{ $breadcrumb->title }}
                                </a>
                                <x-icon icon="arrow-right" class="mx-1 block h-5 w-5 text-gray-400 rtl:rotate-180" />
                            </div>
                        </li>
                    @else
                        <li aria-current="page">
                            <div class="flex items-center">
                                <span
                                    class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">{{ $breadcrumb->title }}</span>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>
@else
    <div class="mt-16">Sin nada</div>
@endif
