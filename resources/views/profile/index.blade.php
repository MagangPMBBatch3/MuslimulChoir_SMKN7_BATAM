<x-layouts.main title="Profile">
   <x-slot name="pageTitle">Profile Saya</x-slot>

  <div class="w-full max-w-5xl bg-gray-800 shadow-2xl rounded-2xl p-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
      
      <!-- Left Side: Profile Summary -->
      <div class="flex flex-col items-center text-center">
        <img src="{{ $user->userProfile && $user->userProfile->foto
          ? asset('storage/img/' . $user->userProfile->foto)
          : asset('storage/img/default-avatar.png') }}"
          alt="Profile Photo"
          class="w-32 h-32 rounded-full object-cover border-4 border-gray-700 shadow-lg mx-auto">
        
        <h2 class="mt-4 text-2xl font-bold text-white">{{ $user->name }}</h2>
        <p class="text-gray-400">{{ $user->email }}</p>
        <p class="bg-gray-600 bg-opacity-70 px-3 py-1 mt-2 font-bold text-white rounded-lg">
          {{ $user->role }}
        </p>

        <!-- Profile Information -->
        <div class="mt-6 w-full bg-gray-700 rounded-xl p-4 shadow-inner text-left">
          <h3 class="text-lg font-semibold text-gray-200 mb-3 border-b border-gray-600 pb-1">Informasi Profile</h3>
          <dl class="space-y-2 text-sm">
            <div><span class="font-semibold text-white">NRP:</span> {{ $user->userProfile->nrp ?? '-' }}</div>
            <div><span class="font-semibold text-white">Alamat:</span> {{ $user->userProfile->alamat ?? '-' }}</div>
            <div><span class="font-semibold text-white">Bagian:</span> {{ $user->userProfile->bagian->nama ?? '-' }}</div>
            <div><span class="font-semibold text-white">Level:</span> {{ $user->userProfile->level->nama ?? '-' }}</div>
            <div><span class="font-semibold text-white">Status:</span> {{ $user->userProfile->status->nama ?? '-' }}</div>
          </dl>
        </div>
      </div>

      <!-- Right Side: Update Form -->
      <div>
        <h3 class="text-xl font-semibold text-white mb-6 border-b border-gray-700 pb-2 text-center">Update Profil</h3>

        @if(session('success'))
          <div class="bg-green-900 border-l-4 border-green-500 text-green-300 p-4 mb-4 rounded-md">
            {{ session('success') }}
          </div>
        @endif

        @if($errors->any())
          <div class="bg-red-900 border-l-4 border-red-500 text-red-300 p-4 mb-4 rounded-md">
            <ul class="list-disc pl-5">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
          @csrf
          @method('PUT')

          <!-- Hidden User ID -->
          <input type="hidden" name="user_id" value="{{ $user->id }}">

          <!-- NRP Input -->
          <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">NRP:</label>
            <input type="text" name="nrp" 
              value="{{ old('nrp', $user->userProfile->nrp ?? '') }}" 
              class="w-full border rounded-lg p-2 bg-gray-900 text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
              required>
          </div>

          <!-- Alamat Input -->
          <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Alamat:</label>
            <textarea name="alamat" rows="3"
              class="w-full border rounded-lg p-2 bg-gray-900 text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
              required>{{ old('alamat', $user->userProfile->alamat ?? '') }}</textarea>
          </div>

          <!-- Bagian & Level Selects -->
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-300 mb-1">Nama Bagian:</label>
              <select name="bagian_id" required 
                class="w-full border rounded-lg p-2 bg-gray-900 text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Pilih Bagian</option>
                @foreach($bagians as $bagian)
                  <option value="{{ $bagian->id }}" 
                    {{ (old('bagian_id', $user->userProfile->bagian_id ?? '') == $bagian->id) ? 'selected' : '' }}>
                    {{ $bagian->nama }}
                  </option>
                @endforeach
              </select>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-300 mb-1">Nama Level:</label>
              <select name="level_id" required 
                class="w-full border rounded-lg p-2 bg-gray-900 text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Pilih Level</option>
                @foreach($levels as $level)
                  <option value="{{ $level->id }}"
                    {{ (old('level_id', $user->userProfile->level_id ?? '') == $level->id) ? 'selected' : '' }}>
                    {{ $level->nama }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>

          <!-- Status Select -->
          <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Nama Status:</label>
            <select name="status_id" required 
              class="w-full border rounded-lg p-2 bg-gray-900 text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="">Pilih Status</option>
              @foreach($statuses as $status)
                <option value="{{ $status->id }}"
                  {{ (old('status_id', $user->userProfile->status_id ?? '') == $status->id) ? 'selected' : '' }}>
                  {{ $status->nama }}
                </option>
              @endforeach
            </select>
          </div>

          <!-- File Upload -->
          <div class="border-2 border-dashed border-gray-600 bg-gray-900 rounded-xl p-6 text-center hover:border-blue-500 hover:bg-gray-700 transition">
            <input type="file" name="foto" id="fileInput" accept="image/*" class="hidden">
            <label for="fileInput" class="cursor-pointer text-gray-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4 4 4-4m0 0l4-4-4-4m4 4H4"/>
              </svg>
              <p class="mt-2">Klik untuk upload foto</p>
            </label>
            <p id="fileName" class="mt-2 text-sm text-gray-400"></p>
          </div>

          <!-- Image Preview -->
          <div id="preview" class="hidden mt-4">
            <img id="previewImg" class="w-32 h-32 object-cover rounded-xl mx-auto shadow-md border border-gray-600">
          </div>

          <button type="submit" 
            class="w-full bg-gray-600 text-white py-2 rounded-lg shadow hover:bg-gray-700 transition">
            Update Profil
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- JS Preview Upload -->
  <script>
    const fileInput = document.getElementById('fileInput');
    const fileName = document.getElementById('fileName');
    const preview = document.getElementById('preview');
    const previewImg = document.getElementById('previewImg');

    fileInput.addEventListener('change', () => {
      const file = fileInput.files[0];
      if (file) {
        fileName.textContent = "File: " + file.name;
        const reader = new FileReader();
        reader.onload = (e) => {
          previewImg.src = e.target.result;
          preview.classList.remove("hidden");
        };
        reader.readAsDataURL(file);

        if (!file.type.match('image.*')) {
          alert('Harap pilih file gambar!');
          return;
        }
        if (file.size > 4048000) {
          alert('Ukuran file maksimal 4MB!');
          return;
        }
      } else {
        fileName.textContent = "";
        preview.classList.add("hidden");
      }
    });
  </script>

</x-layouts.main>
