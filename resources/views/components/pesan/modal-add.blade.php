<!-- Modal Add Pesan -->
<div id="modalAddPesan" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-96 p-6 shadow-lg shadow-blue-400 z-50">
        <!-- Close Button -->
        <button 
            onclick="closeAddPesanModal()" 
            class="text-gray-200 hover:text-red-400 text-xl font-bold absolute right-5">
            &times;
        </button>

        <!-- Title -->
        <h3 class="text-lg font-bold mb-6 text-center">Tambah Pesan</h3>

        <!-- Form -->
        <form id="formAddPesan" onsubmit="event.preventDefault(); createPesan()">
            <div class="grid grid-cols-2 gap-4">
                <!-- Kolom Kiri -->
                <div class="flex flex-col gap-3">
                    <!-- Pengirim -->
                    <label for="addPengirim" class="block text-sm font-medium">Pengirim:</label>
                    <select id="addPengirim" name="pengirim" required
                        class="w-full rounded-md border border-slate-600 bg-slate-900/70 text-gray-200 p-2
                               focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500">
                        <option value="">Pilih Pengirim</option>
                    </select>

                    <!-- Penerima -->
                    <label for="addPenerima" class="block text-sm font-medium">Penerima:</label>
                    <select id="addPenerima" name="penerima" required
                        class="w-full rounded-md border border-slate-600 bg-slate-900/70 text-gray-200 p-2
                               focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500">
                        <option value="">Pilih Penerima</option>
                    </select>
                </div>

                <!-- Kolom Kanan -->
                <div class="flex flex-col gap-3">
                    <!-- Tanggal Pesan -->
                    <label for="addPesanTglPesan" class="block text-sm font-medium">Tgl Pesan:</label>
                    <input type="datetime-local" id="addPesanTglPesan" name="tgl_pesan" required
                        class="w-full rounded-md border border-slate-600 bg-slate-900/70 text-gray-200 p-2 ">

                    <!-- Jenis Pesan -->
                    <label for="addPesanJenisPesan" class="block text-sm font-medium">Jenis Pesan:</label>
                    <select id="addPesanJenisPesan" name="jenis_id" required
                        class="w-full rounded-md border border-slate-600 bg-slate-900/70 text-gray-200 p-2">
                        <option value="">Pilih Jenis Pesan</option>
                    </select>
                </div>
            </div>

            <!-- Isi Pesan -->
            <label for="addPesanIsi" class="block text-sm font-medium mt-4 mb-2">Isi:</label>
            <textarea id="addPesanIsi" name="isi" placeholder="Masukkan Isi" required
                class="w-full h-28 rounded-md border border-slate-600 bg-slate-900/70 text-gray-200 p-2
                       focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500"></textarea>

            <!-- Action Button -->
            <div class="flex justify-end gap-2 mt-6">
                <x-button type="button" variant="secondary" onclick="closeAddPesanModal()">Batal</x-button>
                <x-button type="submit" variant="primary">Tambah Data</x-button>
            </div>
        </form>
    </div>
</div>
