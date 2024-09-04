@extends('layouts.admin-template')
@section('title', 'Detalles del usuario')
@section('content')
    <div>
        @include('layouts.__partials.admin.header-crud-page', [
            'title' => 'Detalles del usuaro',
            'text' => 'Regresar a la lista de usuarios',
            'url' => route('admin.users.index'),
        ])
        <div class="p-4">
            <div class="flex justify-end gap-4 pb-4">
                <form action="{{ route('admin.users.destroy', $user->id) }}" id="formDeleteUser-{{ $user->id }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button type="button" data-form="formDeleteUser-{{ $user->id }}" text="Eliminar usuario"
                        icon="user-remove" typeButton="danger" class="buttonDelete" />
                </form>
                <x-button type="a" href="{{ Route('admin.users.edit', $user->id) }}" text="Editar usuario"
                    typeButton="success" icon="user-edit" />
                <x-button type="button" text="Cambiar contraseña" typeButton="secondary" icon="key" />
            </div>
            <div class="flex gap-4">
                <div class="flex flex-[2] items-center gap-8 rounded-lg border border-zinc-400 p-4 dark:border-zinc-800">
                    <div class="p-4">
                        <img src="{{ Storage::url($user->profile) }}" alt=""
                            class="h-60 w-60 rounded-full object-cover">
                    </div>
                    <div class="flex flex-col gap-2">
                        <span
                            class="w-max rounded-full bg-primary-100 px-3 py-2 text-sm font-semibold uppercase text-primary-500 dark:bg-primary-950 dark:text-primary-400">
                            {{ $user->role === 'admin' ? 'Administrador' : 'Usuario' }}
                        </span>
                        <h2 class="text-2xl font-bold text-zinc-800 dark:text-zinc-300">
                            {{ $user->name }} {{ $user->last_name }}
                        </h2>
                        <p class="text-lg font-semibold text-zinc-700 dark:text-zinc-400">
                            {{ $user->email }}
                        </p>
                        <p class="text-xs uppercase text-zinc-700 dark:text-zinc-300">
                            Ultimo inicio de sesión:&nbsp;
                            {{ $user->last_login ? $user->last_login->diffForHumans() : 'Sin iniciar' }}
                        </p>
                    </div>
                </div>
                <div class="flex flex-1 flex-col gap-2 rounded-lg border border-zinc-400 p-4 dark:border-zinc-800">
                    <div class="flex justify-between">
                        <div>
                            <h3 class="font-semibold text-zinc-600 dark:text-zinc-200">Usuario:</h3>
                            <x-paragraph>{{ $user->username }}</x-paragraph>
                        </div>
                        <div>
                            <h3 class="font-semibold text-zinc-600 dark:text-zinc-200">Estado:</h3>
                            <x-badge-status :status="$user->status" />
                        </div>
                    </div>
                    <div>
                        <h3 class="font-semibold text-zinc-600 dark:text-zinc-200">Fecha de creación:</h3>
                        <x-paragraph>{{ $user->created_at->format('d/m/Y') }}</x-paragraph>
                    </div>
                    <div>
                        <h3 class="font-semibold text-zinc-600 dark:text-zinc-200">Fecha de actualización:</h3>
                        <x-paragraph>{{ $user->updated_at->format('d/m/Y') }}</x-paragraph>
                    </div>
                    <div class="flex justify-between">
                        <div>
                            <h3 class="font-semibold text-zinc-600 dark:text-zinc-200">
                                Zona horaria:
                            </h3>
                            <x-paragraph>{{ $user->timezone }}</x-paragraph>
                        </div>
                        <div>
                            <h3 class="font-semibold text-zinc-600 dark:text-zinc-200">Lenguaje:</h3>
                            <x-paragraph class="uppercase">{{ $user->locale }}</x-paragraph>
                        </div>
                        <div>
                            <h3 class="font-semibold text-zinc-600 dark:text-zinc-200">Moneda:</h3>
                            <x-paragraph class="uppercase">{{ $user->currency }}</x-paragraph>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-delete-modal modalId="deleteModal" title="¿Estás seguro de eliminar el usuario?"
            message="No podrás recuperar este registro" action="" />
    </div>
@endsection
