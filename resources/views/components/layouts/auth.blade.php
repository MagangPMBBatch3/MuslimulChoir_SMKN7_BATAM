<!DOCTYPE html>
<html lang="en">
<head>
   <title>{{ $title ?? 'Login' }}</title>
@vite('resources/css/app.css')</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    {{ $slot }}
</body>
</html>