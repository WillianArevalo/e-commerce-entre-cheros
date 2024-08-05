@extends('layouts.admin-template')

@section('title', 'Admin | Dashboard')

@section('content')
    <div
        class="m-4 rounded-lg border-2 border-dashed border-gray-200 p-4 text-gray-400 dark:border-gray-700 dark:text-white">
        <h1 class="text-3xl font-bold text-primary">
            {{ __('messages.welcome') }}
        </h1>
    </div>
@endsection
