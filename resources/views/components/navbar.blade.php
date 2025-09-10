<style>
@keyframes gradient-move {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

.animate-text {
  background-size: 200% 200%;
  animation: gradient-move 5s ease infinite;
}
</style>

<div class="bg-gray-900 border-b border-blue-500 
            px-6 py-4 flex items-center justify-between 
            rounded-t-xl shadow-lg">

    <!-- Judul -->
    <h1 class="text-3xl font-bold tracking-wider 
               bg-gradient-to-r from-blue-400 via-cyan-400 to-green-400 
               bg-clip-text text-transparent animate-text drop-shadow-md">
        {{ $pageTitle ?? 'Dashboard' }}
    </h1>

    <!-- Sapaan -->
    <div class="flex items-center gap-3 text-gray-300 italic">
        <span>
            Selamat datang, 
            <span class="text-white font-semibold not-italic">
                {{ Auth::user()->name }}
            </span>
        </span>
        <!-- Foto pengguna kecil -->
        <img 
            src="{{ Auth::user()->userProfile && Auth::user()->userProfile->foto
                    ? asset('storage/img/' . Auth::user()->userProfile->foto)
                    : asset('storage/img/default-avatar.png') }}" 
            alt="Foto User" 
            class="w-8 h-8 rounded-full object-cover border-2 border-gray-600 shadow-sm">
    </div>
</div>
