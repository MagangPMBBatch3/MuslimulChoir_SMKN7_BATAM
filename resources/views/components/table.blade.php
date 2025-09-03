@props([
    'id' => '',
])

<div class="overflow-x-auto rounded-xl shadow-lg border border-slate-700">
    <table class="w-full text-sm text-left text-gray-200">
        <!-- Header -->
        <thead class="bg-gradient-to-r from-slate-800 to-slate-700 text-gray-300 uppercase text-xs tracking-wider">
            <tr>
                {{ $head ?? '' }}
            </tr>
        </thead>

        <!-- Body -->
        <tbody id="{{ $id }}" class="divide-y divide-slate-700">
            {{ $slot }}
        </tbody>
    </table>
</div>
