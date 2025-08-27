<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>
<body class="bg-gradient-to-r from-blue-100 via-white to-blue-50 min-h-screen flex items-center justify-center">
    <x-layouts.auth title="Register">
        <form onsubmit="createRegister()" 
              class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md border border-gray-200">
            @csrf
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <!-- Judul -->
            <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Register</h1>

            <!-- Error -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Input Nama -->
            <div class="mb-4">
                <label for="nama" class="block mb-1 font-semibold text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" required
                       class="border border-gray-300 p-3 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" 
                       placeholder="Masukkan nama lengkap">
            </div>

            <!-- Input Email -->
            <div class="mb-4">
                <label for="email" class="block mb-1 font-semibold text-gray-700">Email</label>
                <input type="email" name="email" id="email" required
                       class="border border-gray-300 p-3 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" 
                       placeholder="Masukkan email">
            </div>

            <!-- Input Password -->
            <div class="mb-6">
                <label for="password" class="block mb-1 font-semibold text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                       class="border border-gray-300 p-3 rounded w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 hover:ring-2 hover:ring-blue-500" 
                       placeholder="Masukkan password">
            </div>

            <!-- Tombol -->
            <x-button type="submit" variant="primary" class="w-full py-3">
                Register
            </x-button>

            <!-- Link ke Login -->
            <p class="mt-6 text-center text-sm text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">
                    Login di sini
                </a>
            </p>
        </form>

        <script src="{{ asset('js/register/register-create.js') }}"></script>
    </x-layouts.auth>
</body>
</html>
