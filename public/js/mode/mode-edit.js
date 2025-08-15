function openEditModeJamKerjaModal(id, nama) {
    document.getElementById('editModeJamKerjaId').value = id;
    document.getElementById('editModeJamKerjaNama').value = nama;
    document.getElementById('modalEditModeJamKerja').classList.remove('hidden');
}

function closeEditModeJamKerjaModal() {
    document.getElementById('modalEditModeJamKerja').classList.add('hidden');
}

async function updateModeJamKerja() {
    const id = document.getElementById('editModeJamKerjaId').value;
    const nama = document.getElementById('editModeJamKerjaNama').value.trim();
    if (!nama) {
        alert("Nama ModeJamKerja harus diisi");
        return;
    } 
    const mutation = `
        mutation {
            updateModeJamKerja(id: ${id}, input: { nama: "${nama}"}) {
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
    closeEditModeJamKerjaModal();
    loadModeJamKerjaData();
}