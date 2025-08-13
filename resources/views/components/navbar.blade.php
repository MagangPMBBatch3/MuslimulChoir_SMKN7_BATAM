<div class="bg-white p-4 shadow rounded mb-4 flex items-center justify-between">
        <h1 class="text-xl font-bold">{{ $pageTitle ?? 'Dasbhboard' }}</h1>
       <span>Halo, {{ Auth::user(->name) }}</span>
</div>
  