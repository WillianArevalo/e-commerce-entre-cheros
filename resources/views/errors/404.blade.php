@extends('layouts.login-template')

@section('title', 'Página no encontrada')

@section('content')
    <style>
        .error-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            overflow: visible
        }

        .error-digit,
        .error-zero {
            font-size: 10rem;
            font-weight: bold;
            position: relative;
        }

        .error-zero {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            border: 20px solid #333;
            position: relative;
            overflow: visible;
        }

        .error-bird img {
            width: 450px;
            height: 450px;
            object-fit: cover;
            position: absolute;
            top: -90px;
            left: 0;
            z-index: 10;
            overflow: visible;

        }
    </style>
    <div class="error-container">
        <span class="error-digit">4</span>
        <div class="error-zero">
            <span class="error-bird">
                <img src="{{ asset('/images/imagen6.png') }}" alt="">
            </span>
        </div>
        <span class="error-digit">4</span>
    </div>
@endsection
