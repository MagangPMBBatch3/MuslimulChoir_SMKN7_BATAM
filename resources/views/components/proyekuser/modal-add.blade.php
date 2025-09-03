<!-- Modal Add Proyek User -->
<div id="modalAddProyekUser" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-96 p-6 shadow-lg shadow-blue-400 z-50">
        <button onclick="closeAddProyekUserModal()" class="text-gray-200 hover:text-red-400 text-xl font-bold absolute right-5">&times;</button>
        <h2 class="text-lg font-bold mb-6 text-center">Tambah Proyek User</h2>

        <form id="formAddProyekUser" onsubmit="event.preventDefault(); createProyekUser()">
            @csrf
            <div class="mb-4">
                <label for="addProyekUserProyek" class="block text-sm font-medium mb-1">Proyek</label>
                <select id="addProyekUserProyek" name="proyek_id" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 p-2 text-gray-200
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500">
                    <option value="">Pilih Proyek</option>
                </select>

                <label for="addProyekUserUserProfile" class="block text-sm font-medium mt-4 mb-1">User Profile</label>
                <select id="addProyekUserUserProfile" name="users_profile_id" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 p-2 text-gray-200
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500">
                    <option value="">Pilih User Profile</option>
                </select>
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <x-button type="button" variant="secondary" onclick="closeAddProyekUserModal()"> Batal</x-button>
           
                <x-button type="submit" variant="primary" >Tambah Data</x-button>

            </div>
        </form>
    </div>
</div>
