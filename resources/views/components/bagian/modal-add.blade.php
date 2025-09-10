<!-- Modal Tambah Data Bagian -->
<div id="modalAdd" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 p-6 rounded-xl shadow-lg shadow-blue-400 w-96 z-50">
        <button onclick="closeAddModal()"class="text-gray-400 hover:text-red-400 text-xl font-bold absolute right-5">&times;</button>
        <h2 class="text-xl font-bold mb-4 text-center">Tambah Data Bagian</h2>
        
        <form id="formAddBagian" onsubmit="event.preventDefault(); createBagian()">
            @csrf
            <!-- Input -->
            <div class="mb-4">
                <label for="addnama" class="block text-sm font-medium mb-1">Nama Bagian:</label>
                <input type="text" name="addnama" id="addnama"
                       class="w-full rounded-lg border border-slate-600 bg-gray-900 text-gray-200 
                              placeholder-gray-400 p-2 shadow-sm focus:ring-2 focus:ring-blue-500 
                              focus:outline-none transition duration-200 ease-in-out"
                       placeholder="Masukkan nama bagian">
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-2 border-t border-slate-700 pt-3">
                <x-button type="button" variant="secondary" onclick="closeAddModal()"> Batal</x-button>
           
                <x-button type="submit" variant="primary" >Tambah Data</x-button>
                
            </div>
        </form>
    </div>
</div>
