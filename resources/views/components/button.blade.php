@props([
    'type' => 'button',
    'variant' => 'primary', // jenis button: primary, success, danger, warning, etc.
])

@php
    $baseClass = "px-4 py-2 rounded-lg font-semibold text-white transition";

    $variants = [
        'primary' => 'bg-blue-600 hover:bg-blue-700',
        'success' => 'bg-green-600 hover:bg-green-700',
        'danger' => 'bg-red-600 hover:bg-red-700',
        'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-black',
        'secondary' => 'bg-gray-600 hover:bg-gray-700',
    ];

    $classes = $baseClass . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
