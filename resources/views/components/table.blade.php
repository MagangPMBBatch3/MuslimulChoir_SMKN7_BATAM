@props([
    'id' => '',
])

<table class="w-full border border-slate-700 rounded-lg overflow-hidden">
    <thead class="bg-slate-700 text-gray-300 uppercase text-xs">
        <tr>
            {{ $head ?? '' }}
        </tr>
    </thead>
    <tbody id="{{ $id }}" class="divide-y divide-slate-700 text-gray-200">
        {{ $slot }}
    </tbody>
</table>