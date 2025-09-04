<style>
@keyframes gradient-move {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

.animate-text {
  background-size: 200% 200%;
  animation: gradient-move 4s ease infinite;
}
</style>

<div class="bg-gray-900 border-b-2 border-blue-500 
            p-5 flex items-center justify-between rounded-t-xl shadow-md">
    
    <!-- Judul -->
    <h1 class="text-2xl font-extrabold text-center 
               bg-gradient-to-r from-blue-400 via-cyan-400 to-green-400 
               bg-clip-text text-transparent tracking-wider animate-text">
        {{ $pageTitle ?? 'Dashboard' }}
    </h1>
    
    <!-- Sapaan -->
    <span class="text-gray-300 italic">
        Selamat datang, <span class="text-white font-semibold">{{ Auth::user()->name }}</span> 🌟
    </span>
</div>
