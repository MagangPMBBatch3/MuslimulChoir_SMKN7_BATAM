<!-- Modal Add User -->
<div id="modalAddUser" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-96 p-6 shadow-lg shadow-blue-400 z-50">
        <button onclick="closeAddUserModal()" class="text-gray-200 hover:text-red-400 text-xl font-bold absolute right-5">&times;</button>
        <h2 class="text-xl font-bold mb-6 text-center">Tambah Data User</h2>

        <form id="formAddUser" onsubmit="event.preventDefault(); createUser()">
            @csrf

            <div class="mb-4">
                <label for="addUserNama" class="block text-sm font-medium mb-1">Nama User</label>
                <input type="text" id="addUserNama" name="namaUser" placeholder="Masukkan Nama User" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 p-2 text-gray-200
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500 mb-3">
            </div>

            <div class="mb-4">
                <label for="addUserEmail" class="block text-sm font-medium mb-1">Email User</label>
                <input type="email" id="addUserEmail" name="EmailUser" placeholder="Masukkan Email User " required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 p-2 text-gray-200
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500 mb-3">
            </div>

            <div class="mb-4">
                <label for="addUserPassword" class="block text-sm font-medium mb-1">Password User</label>
                <input type="password" id="addUserPassword" name="PasswordUser" placeholder="Masukkan Password User" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 p-2 text-gray-200
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500 mb-3">
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <x-button type="button" variant="secondary" onclick="closeAddUserModal()"> Batal</x-button>
           
                <x-button type="submit" variant="primary" >Tambah Data</x-button>

            </div>
        </form>
    </div>
</div>
