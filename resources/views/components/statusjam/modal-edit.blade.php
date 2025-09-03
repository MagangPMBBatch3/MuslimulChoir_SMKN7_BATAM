<!-- Modal Edit Data StatusJamKerja -->
<div id="modalEditStatusJamKerja" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-96 p-6 shadow-lg shadow-blue-400 z-50">
        <button onclick="closeEditStatusJamKerjaModal()" class="text-gray-200 hover:text-red-400 text-xl font-bold absolute right-5">&times;</button>
        <h2 class="text-lg font-bold mb-6 text-center">Edit StatusJamKerja</h2>

        <form id="formEditStatusJamKerja" onsubmit="event.preventDefault(); updateStatusJamKerja();">
            @csrf
            <input type="hidden" id="editStatusJamKerjaId" name="id">

            <div class="mb-4">
                <label for="editStatusJamKerjaNama" class="block text-sm font-medium mb-1">Nama StatusJamKerja</label>
                <input type="text" id="editStatusJamKerjaNama" name="nama" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 p-2 text-gray-200
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500">
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <x-button type="button" variant="secondary" onclick="closeEditStatusJamKerjaModal()"> Batal</x-button>
           
                <x-button type="submit" variant="primary" >Update</x-button>

            </div>
        </form>
    </div>
</div>
