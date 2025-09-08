<!-- Modal Edit Level -->
<div id="modalEditLevel" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-[28rem] p-6 shadow-lg shadow-blue-400 z-50">
        <button onclick="closeEditLevelModal()" class="text-gray-200 hover:text-red-400 text-xl font-bold absolute right-5">&times;</button>

        <h2 class="text-xl font-bold mb-6 text-center">Edit Level</h2>

        <form id="formEditLevel" onsubmit="updateLevel();">
            @csrf
            <input type="hidden" id="editLevelId" name="id">

            <div class="mb-4">
                <label for="editLevelNama" class="block mb-1 text-sm">Nama Level:</label>
                <input type="text" id="editLevelNama" name="nama" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 text-gray-200 p-2 
                           focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <x-button type="button" variant="secondary" onclick="closeEditLevelModal()"> Batal</x-button>
           
                <x-button type="submit" variant="primary" >Update</x-button>

            </div>
        </form>
    </div>
</div>
