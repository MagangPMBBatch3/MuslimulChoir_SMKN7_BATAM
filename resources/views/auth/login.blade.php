<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     @vite('resources/css/app.css')
</head>
<body>
    <x-layouts.auth title="Login">
        <form action="/login" method="POST" class="bg-white p-6 rounded shadow-md w-96">
            @csrf
            <h1 class="text-2xl font-bold mb-4 text-center">Login</h1>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="mb-4">
                <label>Email</label>
                <input type="email" name="email" class="border w-full p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label>Password</label>
                <input type="password" name="password" class="border w-full p-2 rounded" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white w-full p-2 rounded">
                Login
            </button>

            <!-- Link ke Register -->
            <p class="mt-4 text-center text-sm">
                Belum punya akun?
              <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Daftar di sini</a>
            </p>
        </form>
    </x-layouts.auth>
</body>
</html>
