<!-- Modal Add User Profile -->
<div id="modalAddUserProfile" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-[28rem] p-6 shadow-lg shadow-blue-400 z-50">
        <h2 class="text-xl font-bold mb-6 text-center">Tambah User Profile</h2>

        <form id="formAddUserProfile" onsubmit="event.preventDefault(); createUserProfile()">
            @csrf
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="addUserProfileUser" class="block mb-1 text-sm">User</label>
                    <select id="addUserProfileUser" name="user_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Email User</option>
                    </select>
                </div>

                <div>
                    <label for="addUserProfileNamaLengkap" class="block mb-1 text-sm">Nama Lengkap</label>
                    <input type="text" id="addUserProfileNamaLengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label for="addUserProfileNrp" class="block mb-1 text-sm">NRP</label>
                    <input type="text" id="addUserProfileNrp" name="nrp" placeholder="Masukkan NRP" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label for="addUserProfileAlamat" class="block mb-1 text-sm">Alamat</label>
                    <input type="text" id="addUserProfileAlamat" name="alamat" placeholder="Masukkan Alamat" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label for="addUserProfileFoto" class="block mb-1 text-sm">Foto</label>
                    <input type="file" id="addUserProfileFoto" name="foto"
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div>
                    <label for="addUserProfileBagian" class="block mb-1 text-sm">Nama Bagian</label>
                    <select id="addUserProfileBagian" name="bagian_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Bagian</option>
                    </select>
                </div>

                <div>
                    <label for="addUserProfileLevel" class="block mb-1 text-sm">Nama Level</label>
                    <select id="addUserProfileLevel" name="level_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Level</option>
                    </select>
                </div>

                <div>
                    <label for="addUserProfileStatus" class="block mb-1 text-sm">Nama Status</label>
                    <select id="addUserProfileStatus" name="status_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">Pilih Status</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-6">
                <button type="button" onclick="closeAddUserProfileModal()"
                    class="px-4 py-2 bg-slate-600 text-gray-200 rounded-lg hover:bg-slate-500 transition">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
