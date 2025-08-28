<!-- Modal Edit Data Status -->
<div id="modalEditStatus" class="fixed inset-0 hidden items-center justify-center flex z-50">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Modal Content -->
    <div class="relative bg-slate-800/95 text-gray-200 rounded-xl w-96 p-6 shadow-lg shadow-blue-400 z-50">
        <h2 class="text-lg font-bold mb-6 text-center">Edit Status</h2>

        <form id="formEditStatus" onsubmit="event.preventDefault(); updateStatus()">
            @csrf
            <input type="hidden" id="editStatusId" name="id">

            <div class="mb-4">
                <label for="editStatusNama" class="block text-sm font-medium mb-1">Nama Status</label>
                <input type="text" id="editStatusNama" name="nama" required
                    class="w-full rounded-md border border-slate-600 bg-slate-700/70 p-2 text-gray-200
                           focus:ring-2 focus:ring-blue-500 focus:outline-none hover:ring-2 hover:ring-blue-500">
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeEditStatusModal()"
                    class="px-4 py-2 bg-slate-600 text-gray-200 rounded-lg hover:bg-slate-500 transition">
                    Batal
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
