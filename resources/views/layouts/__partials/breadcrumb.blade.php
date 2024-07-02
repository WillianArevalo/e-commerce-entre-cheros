<!-- Breadcrumb -->
@php $breadcrumbs = Breadcrumbs::generate(); @endphp
@if (!empty($breadcrumbs))
    <div class="flex justify-end">
        <nav class="flex text-gray-700 w-max" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse uppercase">
                @foreach ($breadcrumbs as $key => $breadcrumb)
                    @if ($breadcrumb->url && !$loop->last)
                        <li>
                            <div class="flex items-center gap-4">
                                <a href="{{ $breadcrumb->url }}"
                                    class="text-sm font-medium text-gray-700 hover:text-blue-600  dark:text-gray-400 dark:hover:text-white flex items-center gap-1">
                                    {{ $breadcrumb->title }}
                                </a>
                                <x-icon icon="arrow-right" class="rtl:rotate-180 block w-5 h-5 mx-1 text-gray-400 " />
                            </div>
                        </li>
                    @else
                        <li aria-current="page">
                            <div class="flex items-center">
                                <span
                                    class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $breadcrumb->title }}</span>
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
