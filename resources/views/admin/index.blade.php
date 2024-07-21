@extends('layouts.admin-template')

@section('title', 'Admin | Dashboard')

@section('content')
    <div
        class="dark:text-white text-gray-400 p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-4">
        <h1 class="font-bold text-primary text-3xl">
            {{ __('messages.welcome') }}
        </h1>
    </div>
@endsection
