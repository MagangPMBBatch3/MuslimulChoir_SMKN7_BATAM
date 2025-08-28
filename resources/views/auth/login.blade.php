<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">

    <x-layouts.auth title="Login">
        <form action="/login" method="POST" 
              class="w-full max-w-md bg-gray-800/80 backdrop-blur-xl rounded-2xl shadow-xl p-8">
            @csrf

            <!-- Judul -->
            <h1 class="text-3xl font-bold text-center text-blue-400 mb-6">Login</h1>

            <!-- Error -->
            @if ($errors->any())
                <div class="bg-red-900/70 text-red-300 p-3 rounded mb-4 text-sm border border-red-700">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Input Email -->
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-300">Email</label>
                <input type="email" name="email"
                       class="mt-1 block w-full rounded-lg border border-gray-600 bg-gray-900/70 text-gray-100 
                              focus:ring-2 focus:ring-blue-400 focus:border-blue-400 p-3 outline-none transition duration-200"
                       placeholder="Masukkan email Anda" required>
            </div>

            <!-- Input Password -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300">Password</label>
                <input type="password" name="password"
                       class="mt-1 block w-full rounded-lg border border-gray-600 bg-gray-900/70 text-gray-100 
                              focus:ring-2 focus:ring-blue-400 focus:border-blue-400 p-3 outline-none transition duration-200"
                       placeholder="Masukkan password" required>
            </div>

            <!-- Remember & Forgot -->
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center text-gray-300 text-sm">
                    <input type="checkbox" class="rounded border-gray-600 bg-gray-800 text-blue-400 focus:ring-blue-400">
                    <span class="ml-2">Ingat saya</span>
                </label>
                <a href="#" class="text-sm text-blue-400 hover:underline">Lupa password?</a>
            </div>

            <!-- Tombol -->
            <x-button type="submit" variant="primary"
                      class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg py-3 
                             transition duration-200 shadow-lg hover:shadow-blue-500/30">
                Login
            </x-button>

            <!-- Link Register -->
            <p class="text-center text-gray-400 text-sm mt-6">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-blue-400 hover:underline">Daftar</a>
            </p>
        </form>
    </x-layouts.auth>

</body>
</html>
