<div>
    <div class="flex flex-col gap-4 sm:flex-row">
        <div class="flex flex-1 flex-col items-center gap-2 rounded-xl border border-zinc-400 p-4 dark:border-zinc-800">
            <div class="h-16 w-16">
                <img src="{{ Storage::url($review->user->profile) }}" alt="Profile {{ $review->user->name }}"
                    class="h-full w-full rounded-full object-cover">
            </div>
            <div class="flex flex-col items-center gap-1">
                <h2 class="text-base font-bold text-zinc-800 dark:text-zinc-300">{{ $review->user->name }}</h2>
                <p class="text-sm text-zinc-700 dark:text-zinc-400">{{ $review->user->email }}</p>
            </div>
        </div>
        <div class="flex flex-1 flex-col items-center gap-2 rounded-xl border border-zinc-400 p-4 dark:border-zinc-800">
            <div>
                <img src="{{ Storage::url($review->product->main_image) }}" alt="Image {{ $review->product->name }}"
                    class="h-16 w-16 rounded-full object-cover">
            </div>
            <div class="flex flex-col items-center gap-1">
                <h2 class="text-base font-bold text-zinc-800 dark:text-zinc-300">{{ $review->product->name }}</h2>
                <span class="flex items-center gap-2">
                    <x-icon icon="star" class="h-4 w-4 fill-yellow-300 text-yellow-400" />
                    <p class="text-sm text-zinc-700 dark:text-zinc-400">
                        4.5 (10 reseñas)
                    </p>
                </span>
            </div>
        </div>
    </div>
    <div class="mt-4 rounded-xl border border-zinc-400 p-4 dark:border-zinc-800">
        <div class="flex items-center justify-between">
            <p class="text-xs uppercase text-zinc-700 dark:text-zinc-400">
                {{ $review->created_at->diffForHumans() }}
            </p>
            <div>
                @if ($review->is_approved === 0)
                    <span
                        class="w-max rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:bg-opacity-20 dark:text-yellow-300">
                        Pendiente
                    </span>
                @elseif($review->is_approved === 2)
                    <span
                        class="w-max rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:bg-opacity-20 dark:text-red-300">
                        Rechazado
                    </span>
                @else
                    <span
                        class="w-max rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:bg-opacity-20 dark:text-green-300">
                        Aprobado
                    </span>
                @endif
            </div>
        </div>
        <div class="flex items-center gap-1">
            <h2 class="me-4 text-base font-bold text-zinc-800 dark:text-zinc-300">
                Calificación:
            </h2>
            @for ($i = 0; $i < 5; $i++)
                @if ($i < $review->rating)
                    <x-icon icon="star" class="h-4 w-4 fill-yellow-300 text-yellow-400" />
                @else
                    <x-icon icon="star" class="h-4 w-4 fill-zinc-300 text-zinc-400 dark:fill-zinc-800" />
                @endif
            @endfor
        </div>
        <div class="mt-2 flex flex-col gap-1">
            <h2 class="me-4 text-base font-bold text-zinc-800 dark:text-zinc-300">
                Comentario:
            </h2>
            <p class="text-sm text-zinc-700 dark:text-zinc-400">
                {{ $review->comment }}
            </p>
        </div>
    </div>
    @if (in_array($review->is_approved, [1, 2]))
        <div class="mt-4 overflow-hidden rounded-xl border border-zinc-400 dark:border-zinc-800">
            <div class="border-b border-zinc-400 bg-zinc-50 px-4 py-2 dark:border-zinc-800 dark:bg-zinc-950">
                <div class="flex items-center">
                    <span
                        class="{{ $review->is_approved === 1 ? 'bg-green-500 ring-2 dark:ring-green-900' : 'bg-red-500 ring-2 dark:ring-red-900' }} me-3 flex h-2 w-2 rounded-full">
                    </span>
                    <p
                        class="{{ $review->is_approved === 1 ? 'text-green-800 dark:text-green-400' : 'text-red-800 dark:text-red-400' }} text-sm font-medium">
                        {{ $review->is_approved === 1 ? 'Aprobado' : 'Rechazado' }}:
                        {{ $review->is_approved === 1 ? $review->approved_at->diffForHumans() : $review->rejected_at->diffForHumans() }}
                    </p>
                </div>
            </div>
            <div class="flex p-4">
                <div class="flex flex-col gap-2">
                    <h2 class="me-4 text-base font-bold text-zinc-800 dark:text-zinc-300">
                        {{ $review->is_approved === 1 ? 'Aprobado por:' : 'Rechazado por:' }}
                    </h2>
                    <div class="flex items-center gap-4">
                        <img src="{{ Storage::url($review->is_approved === 1 ? $review->approvedBy->profile : $review->rejectBy->profile) }}"
                            class="h-14 w-14 rounded-full object-cover"
                            alt="Profile picture {{ $review->is_approved === 1 ? $review->approvedBy->username : $review->rejectBy->username }}">
                        <div class="flex flex-col gap-1">
                            <p class="text-sm font-medium text-zinc-700 dark:text-zinc-400">
                                {{ $review->is_approved === 1 ? $review->approvedBy->name : $review->rejectBy->name }}
                            </p>
                            <p class="text-sm text-zinc-700 dark:text-zinc-400">
                                {{ $review->is_approved === 1 ? $review->approvedBy->email : $review->rejectBy->email }}
                            </p>
                            <span
                                class="w-max rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:bg-opacity-20 dark:text-green-300">
                                {{ ($review->is_approved === 1 ? $review->approvedBy->role : $review->rejectBy->role) === 'admin' ? 'Administrador' : 'Moderador' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @if ($review->is_approved === 2)
                <div class="border-t border-zinc-400 p-4 dark:border-zinc-800">
                    <div class="flex flex-col gap-2">
                        <h2 class="me-4 text-base font-bold text-zinc-800 dark:text-zinc-300">
                            Razón del rechazo:
                        </h2>
                        <p class="text-sm text-zinc-700 dark:text-zinc-400">
                            {{ $review->reason }}
                        </p>
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>
