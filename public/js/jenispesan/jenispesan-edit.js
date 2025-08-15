function openEditJenisPesanModal(id, nama) {
    document.getElementById('editJenisPesanId').value = id;
    document.getElementById('editJenisPesanNama').value = nama;
    document.getElementById('modalEditJenisPesan').classList.remove('hidden');
}

function closeEditJenisPesanModal() {
    document.getElementById('modalEditJenisPesan').classList.add('hidden');
}

async function updateJenisPesan() {
    const id = document.getElementById('editJenisPesanId').value;
    const nama = document.getElementById('editJenisPesanNama').value.trim();
    if (!nama) {
        alert("Nama JenisPesan harus diisi");
        return;
    } 
    const mutation = `
        mutation {
            updateJenisPesan(id: ${id}, input: { nama: "${nama}"}) {
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
    closeEditJenisPesanModal();
    loadJenisPesanData();
}