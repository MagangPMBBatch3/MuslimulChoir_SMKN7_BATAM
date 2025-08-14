function openAddLevelModal(){
    document.getElementById('modalAddLevel').classList.remove('hidden');
}

function closeAddLevelModal(){
    document.getElementById('modalAddLevel').classList.add('hidden');
}

async function createLevel() {
    const nama = document.getElementById('addLevelNama').value.trim();
    if (!nama) {
        alert("Nama level harus diisi");
        return;
    }
    const mutation = `
        mutation {
            createLevel(input: {nama: "${nama}"}) {
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
    closeAddLevelModal();
    loadLevelData();
}