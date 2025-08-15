function openAddStatusModal(){
    document.getElementById('modalAddStatus').classList.remove('hidden');
}

function closeAddStatusModal(){
    document.getElementById('modalAddStatus').classList.add('hidden');
}

async function createStatus() {
    const nama = document.getElementById('addStatusNama').value.trim();
    if (!nama) {
        alert("Nama Status harus diisi");
        return;
    }
    const mutation = `
        mutation {
            createStatus(input: {nama: "${nama}"}) {
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
    closeAddStatusModal();
    loadStatusData();
}