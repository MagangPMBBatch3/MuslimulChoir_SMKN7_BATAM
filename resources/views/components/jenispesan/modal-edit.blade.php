<!-- Modal Edit JenisPesan -->
<div id="modalEditJenisPesan" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-[24rem] p-6 shadow-lg shadow-blue-400 z-50">
        <button onclick="closeEditJenisPesanModal()" class="text-gray-200 hover:text-red-400 text-xl font-bold absolute right-5">&times;</button>

        <h2 class="text-xl font-bold mb-4 text-center">Edit JenisPesan</h2>

        <form id="formEditJenisPesan" onsubmit="updateJenisPesan(event)">
            @csrf
            <input type="hidden" id="editJenisPesanId" name="id">

            <div class="mb-4">
                <label for="editJenisPesanNama" class="block mb-1 text-sm">Nama JenisPesan:</label>
                <input type="text" id="editJenisPesanNama" name="nama" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                           focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <x-button type="button" variant="secondary" onclick="closeEditJenisPesanModal()"> Batal</x-button>
           
                <x-button type="submit" variant="primary" >Update</x-button>

            </div>
        </form>
    </div>
</div>
