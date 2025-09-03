@props([
    'align' => 'left'
])

<th {{ $attributes->merge([
    'class' => "border border-slate-600 p-3 text-{$align}"
]) }}>
    {{ $slot }}
</th>
