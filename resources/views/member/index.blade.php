<style>
@keyframes gradient-move {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

.animate-text {
  background-size: 200% 200%;
  animation: gradient-move 4s ease infinite;
}
</style>

<x-layouts.main title="Data User Profile">
    <div class="bg-slate-800/90 p-4 rounded-xl shadow w-full">

<h1 class="text-3xl font-extrabold mb-8 text-center bg-gradient-to-r from-blue-400 via-cyan-400 to-green-400 bg-clip-text text-transparent tracking-wider drop-shadow-lg animate-text">Data Member</h1>
        
        <div class="flex flex-col sm:flex-row justify-between mb-4 gap-2"></div>

        {{-- Tabs --}}
        <div class="mb-4 flex gap-2">
            <button class="px-4 py-2 bg-blue-500 text-white rounded-t" 
                    onclick="showTab('aktif')" 
                    id="tabAktif">Data Aktif</button>
            <button onclick="showTab('arsip')" 
                    id="tabArsip" 
                    class="px-4 py-2 bg-slate-600 text-gray-300 rounded-t">Data Arsip</button>
        </div>

        {{-- Card Containers --}}
        <div id="tableAktif" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"></div>
        <div id="tableArsip" class="hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"></div>
    </div>

    
    {{-- Scripts --}}
    <script src="{{ asset('js/member/member.js') }}"></script>
    <script>
        function generateCards() {
            const aktifContainer = document.getElementById('tableAktif');
            const arsipContainer = document.getElementById('tableArsip');

            aktifContainer.innerHTML = '';
            arsipContainer.innerHTML = '';

            members.forEach(member => {
                const card = document.createElement('div');
                card.className = 'bg-slate-700/70 rounded-lg shadow p-4 flex flex-col items-center';

                card.innerHTML = `
                    <img src="${member.foto}" alt="Foto User" class="w-24 h-24 rounded-full mb-2 object-cover">
                    <h2 class="text-white font-bold">${member.nama}</h2>
                    <p class="text-gray-300 text-sm">NRP: ${member.nrp}</p>
                    <p class="text-gray-300 text-sm">Alamat: ${member.alamat}</p>
                    <p class="text-gray-300 text-sm">Bagian: ${member.bagian}</p>
                    <p class="text-gray-300 text-sm">Level: ${member.level}</p>
                    <p class="text-gray-300 text-sm">Status: ${member.status}</p>
                    <div class="mt-2 flex gap-2">
                        <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded" onclick="editUser(${member.id})">Edit</button>
                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded" onclick="deleteUser(${member.id})">Hapus</button>
                    </div>
                `;

                if(member.status.toLowerCase() === 'aktif') {
                    aktifContainer.appendChild(card);
                } else {
                    arsipContainer.appendChild(card);
                }
            });
        }

        function showTab(tab) {
            const tabAktif = document.getElementById('tabAktif');
            const tabArsip = document.getElementById('tabArsip');
            const tableAktif = document.getElementById('tableAktif');
            const tableArsip = document.getElementById('tableArsip');

            if (tab === 'aktif') {
                tabAktif.classList.add('bg-blue-500', 'text-white');
                tabAktif.classList.remove('bg-slate-600', 'text-gray-300');
                tabArsip.classList.remove('bg-blue-500', 'text-white');
                tabArsip.classList.add('bg-slate-600', 'text-gray-300');
                tableAktif.classList.remove('hidden');
                tableArsip.classList.add('hidden');
            } else {
                tabArsip.classList.add('bg-blue-500', 'text-white');
                tabArsip.classList.remove('bg-slate-600', 'text-gray-300');
                tabAktif.classList.remove('bg-blue-500', 'text-white');
                tabAktif.classList.add('bg-slate-600', 'text-gray-300');
                tableArsip.classList.remove('hidden');
                tableAktif.classList.add('hidden');
            }
        }

        function searchUserProfile() {
            const query = document.getElementById('search').value.toLowerCase();
            members.forEach(member => {
                member.visible = member.nama.toLowerCase().includes(query) || member.id.toString().includes(query);
            });

            generateCards();
        }

        function editUser(id) {
            alert('Edit member ID: ' + id);
        }

        function deleteUser(id) {
            alert('Hapus member ID: ' + id);
        }

        document.addEventListener("DOMContentLoaded", generateCards);
    </script>
</x-layouts.main>
