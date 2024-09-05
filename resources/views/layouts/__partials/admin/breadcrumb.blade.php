<!-- Breadcrumb -->
@php $breadcrumbs = Breadcrumbs::generate(); @endphp
@if (!empty($breadcrumbs))
    <div class="flex items-center justify-end">
        <nav class="flex w-max px-6 py-3 text-zinc-700" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 uppercase rtl:space-x-reverse md:space-x-2">
                @foreach ($breadcrumbs as $key => $breadcrumb)
                    @if ($breadcrumb->url && !$loop->last)
                        <li>
                            <div class="flex items-center gap-4">
                                <a href="{{ $breadcrumb->url }}"
                                    class="flex items-center gap-1 rounded-lg px-2 py-1 text-xs font-semibold text-zinc-500 hover:bg-primary-50 hover:text-primary-500 dark:text-zinc-400 dark:hover:bg-primary-950 dark:hover:text-primary-300">
                                    {!! $breadcrumb->title !!}
                                </a>
                                <x-icon icon="arrow-badge-right"
                                    class="mx-1 block h-5 w-5 text-zinc-400 rtl:rotate-180" />
                            </div>
                        </li>
                    @else
                        <li aria-current="page">
                            <div class="flex items-center">
                                <span
                                    class="ms-1 flex items-center gap-1 rounded-lg bg-primary-50 px-2 py-1 text-xs font-semibold text-primary-500 dark:bg-primary-950 dark:text-primary-300 md:ms-2">
                                    {!! $breadcrumb->title !!}
                                </span>
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
