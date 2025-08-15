function openEditStatusModal(id, nama) {
    document.getElementById('editStatusId').value = id;
    document.getElementById('editStatusNama').value = nama;
    document.getElementById('modalEditStatus').classList.remove('hidden');
}

function closeEditStatusModal() {
    document.getElementById('modalEditStatus').classList.add('hidden');
}

async function updateStatus() {
    const id = document.getElementById('editStatusId').value;
    const nama = document.getElementById('editStatusNama').value.trim();
    if (!nama) {
        alert("Nama Status harus diisi");
        return;
    } 
    const mutation = `
        mutation {
            updateStatus(id: ${id}, input: { nama: "${nama}"}) {
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
    closeEditStatusModal();
    loadStatusData();
}