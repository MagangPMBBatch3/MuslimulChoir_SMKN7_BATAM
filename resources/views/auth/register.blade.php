<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <x-layouts.auth title="Register">
    <form onsubmit="createRegister()"class="bg-white p-6 rounded shadow-md w-96">
        @csrf
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <h1 class=" text-2xl font-bold mb-4 text-center">Register</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" required
                class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm outline-0">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" required
                class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm outline-0">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" required
                class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm outline-0">
        </div>

        <button type="submit" class="bg-blue-500 text-white w-full p-2 rounded">Register</button>

        <span class="flex justify-end mt-4 text-gray-400">Already have account? <a class="text-blue-500 ml-1" href="{{ route('login') }}"> Login</a></span>
    </form>

    <script src="{{ asset('js/register/register-create.js') }}"></script>
</x-layouts.auth>
</body>
</html>