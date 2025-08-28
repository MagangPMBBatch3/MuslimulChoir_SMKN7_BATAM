<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">

    <x-layouts.auth title="Register">
        <form onsubmit="createRegister()" 
              class="w-full max-w-md bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl p-8 border border-gray-700">
            @csrf
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <!-- Judul -->
            <h1 class="text-3xl font-bold mb-6 text-center text-blue-400">Register</h1>

            <!-- Error -->
            @if ($errors->any())
                <div class="bg-red-900/70 text-red-300 p-3 rounded mb-4 text-sm border border-red-700">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Input Nama -->
            <div class="mb-4">
                <label for="nama" class="block mb-1 font-semibold text-gray-300">Nama</label>
                <input type="text" name="nama" id="nama" required
                       class="mt-1 block w-full rounded-lg border border-gray-600 bg-gray-900/70 text-gray-100 
                              focus:ring-2 focus:ring-blue-400 focus:border-blue-400 p-3 outline-none transition duration-200" 
                       placeholder="Masukkan nama lengkap">
            </div>

            <!-- Input Email -->
            <div class="mb-4">
                <label for="email" class="block mb-1 font-semibold text-gray-300">Email</label>
                <input type="email" name="email" id="email" required
                       class="mt-1 block w-full rounded-lg border border-gray-600 bg-gray-900/70 text-gray-100 
                              focus:ring-2 focus:ring-blue-400 focus:border-blue-400 p-3 outline-none transition duration-200" 
                       placeholder="Masukkan email">
            </div>

            <!-- Input Password -->
            <div class="mb-6">
                <label for="password" class="block mb-1 font-semibold text-gray-300">Password</label>
                <input type="password" name="password" id="password" required
                       class="mt-1 block w-full rounded-lg border border-gray-600 bg-gray-900/70 text-gray-100 
                              focus:ring-2 focus:ring-blue-400 focus:border-blue-400 p-3 outline-none transition duration-200" 
                       placeholder="Masukkan password">
            </div>

            <!-- Tombol -->
            <button type="submit" 
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg py-3 transition duration-200 shadow-lg hover:shadow-blue-500/30">
                Register
            </button>

            <!-- Link ke Login -->
            <p class="mt-6 text-center text-sm text-gray-400">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-400 font-semibold hover:underline">Login di sini</a>
            </p>
        </form>

        <script src="{{ asset('js/register/register-create.js') }}"></script>
    </x-layouts.auth>
</body>
</html>
