function openEditStatusJamKerjaModal(id, nama) {
    document.getElementById('editStatusJamKerjaId').value = id;
    document.getElementById('editStatusJamKerjaNama').value = nama;
    document.getElementById('modalEditStatusJamKerja').classList.remove('hidden');
}

function closeEditStatusJamKerjaModal() {
    document.getElementById('modalEditStatusJamKerja').classList.add('hidden');
}

async function updateStatusJamKerja() {
    const id = document.getElementById('editStatusJamKerjaId').value;
    const nama = document.getElementById('editStatusJamKerjaNama').value.trim();
    if (!nama) {
        alert("Nama StatusJamKerja harus diisi");
        return;
    } 
    const mutation = `
        mutation {
            updateStatusJamKerja(id: ${id}, input: { nama: "${nama}"}) {
                id
                nama
            }
        }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({query: mutation})
    });
    closeEditStatusJamKerjaModal();
    loadStatusJamKerjaData();
}