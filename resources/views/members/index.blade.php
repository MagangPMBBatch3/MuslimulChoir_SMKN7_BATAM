<x-layout.main title="Daftar Member">
    <x-slot name="pageTitle">Daftar Member</x-slot>

    <div class="container">
        <h2 class="mb-6 text-2xl font-semibold">Daftar Member</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($user as $user)
            <div class="bg-white p-6 rounded-xl shadow-md flex flex-col items-center">
        <div class="relative">
            <img src="{{ $user->profile && $user->profile->foto
                        ? asset('storage/'.$user->profile->foto)
                        : asset('storage/images/default.jpg')}}"
                alt="Foto {{ $user->name }}"
                class="w-24 h-24 rounded-full object-cover border-4 border-gray-200 shadow-lg">
        </div>

        <div class="mt-4 text-center">
            <h4 class="text-lg font-semibold text-gray-800">{{ $user->name }}</h4>
            <p class="text-gray-600">NRP: {{ $user->profile->nrp ?? '-' }}</p>
            <p class="text-sm text-gray-500 mt-2">{{ $user->profile->alamat ?? '-' }}</p>
        </div>
        
        <a href="{{ route('profile.ofUser',$user->id) }}" class="mt-4 bg-blue-700 text-white px-3 -y-1 rounded hover:bg-blue-900">
            lihat Profile</a>

            </div>
        @endforeach
    </div>
    </div>
</x-layout.main>