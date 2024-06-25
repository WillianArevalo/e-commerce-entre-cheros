@extends('layouts.login-template')

@section('title', 'Login | Admin')

@section('content')
    <main class="w-full h-screen flex items-center justify-center font-secondary dark:bg-gray-900">
        <section class="bg-gray-50 dark:bg-gray-900 w-full">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <div
                    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="text-center text-xl font-bold leading-tight tracking-tight text-secondary md:text-2xl dark:text-white">
                            Iniciar sesión administrador
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="{{ route('admin.validate') }}" method="POST">
                            @csrf
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Correo electrónico
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <x-icon icon="mail" class="w-5 h-5 text-gray-400" />
                                    </div>
                                    <input type="text" id="email" name="email"
                                        class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') is-invalid @enderror"
                                        placeholder="name@example.com" value="{{ old('email') }}">
                                    @error('email')
                                        <div
                                            class="absolute inset-y-0 end-0 flex items-center pe-3.5 pointer-events-none icon-error">
                                            <x-icon icon="alert-circle" class="w-5 h-5 text-red-700 dark:text-red-500" />
                                        </div>
                                    @enderror
                                    <div
                                        class="absolute inset-y-0 end-0 flex items-center pe-3.5 pointer-events-none hidden icon-success">
                                        <x-icon icon="checkmark-circle"
                                            class="w-5 h-5 text-green-700 dark:text-green-500" />
                                    </div>
                                </div>
                                @error('email')
                                    <p class="text-red-700 font-medium text-sm mt-1 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Contraseña
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <x-icon icon="password" class="w-5 h-5 text-gray-400" />
                                    </div>
                                    <input type="password" id="password" name="password"
                                        class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') is-invalid @enderror"
                                        placeholder="Ingresa tu contraseña">
                                    @error('password')
                                        <div
                                            class="absolute inset-y-0 end-0 flex items-center pe-3.5 pointer-events-none icon-error">
                                            <x-icon icon="alert-circle" class="w-5 h-5 text-red-700 dark:text-red-500" />
                                        </div>
                                    @enderror
                                    <div
                                        class="absolute inset-y-0 end-0 flex items-center pe-3.5 pointer-events-none hidden icon-success">
                                        <x-icon icon="checkmark-circle"
                                            class="w-5 h-5 text-green-700 dark:text-green-500" />
                                    </div>
                                </div>
                                @error('password')
                                    <p class="text-red-700 font-medium text-sm mt-1 dark:text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex items-center justify-center">
                                <button type="submit"
                                    class="w-max text-white bg-secondary focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 hover:bg-blue-900 flex items-center justify-center gap-1">
                                    <x-icon icon="login" class="w-5 h-5 text-current" />
                                    Iniciar sesión
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
