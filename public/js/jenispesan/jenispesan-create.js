function openAddJenisPesanModal(){
    document.getElementById('modalAddJenisPesan').classList.remove('hidden');
}

function closeAddJenisPesanModal(){
    document.getElementById('modalAddJenisPesan').classList.add('hidden');
}

async function createJenisPesan() {
    const nama = document.getElementById('addJenisPesanNama').value.trim();
    if (!nama) {
        alert("Nama JenisPesan harus diisi");
        return;
    }
    const mutation = `
        mutation {
            createJenisPesan(input: {nama: "${nama}"}) {
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
    closeAddJenisPesanModal();
    loadJenisPesanData();
}