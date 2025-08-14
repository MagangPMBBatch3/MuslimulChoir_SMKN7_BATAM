function openEditLevelModal(id, nama) {
    document.getElementById('editLevelId').value = id;
    document.getElementById('editLevelNama').value = nama;
    document.getElementById('modalEditLevel').classList.remove('hidden');
}

function closeEditLevelModal() {
    document.getElementById('modalEditLevel').classList.add('hidden');
}

async function updateLevel() {
    const id = document.getElementById('editLevelId').value;
    const nama = document.getElementById('editLevelNama').value.trim();
    if (!nama) {
        alert("Nama level harus diisi");
        return;
    } 
    const mutation = `
        mutation {
            updateLevel(id: ${id}, input: { nama: "${nama}"}) {
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
    closeEditLevelModal();
    loadLevelData();
}