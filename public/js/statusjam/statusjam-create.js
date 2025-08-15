function openAddStatusJamKerjaModal(){
    document.getElementById('modalAddStatusJamKerja').classList.remove('hidden');
}

function closeAddStatusJamKerjaModal(){
    document.getElementById('modalAddStatusJamKerja').classList.add('hidden');
}

async function createStatusJamKerja() {
    const nama = document.getElementById('addStatusJamKerjaNama').value.trim();
    if (!nama) {
        alert("Nama StatusJamKerja harus diisi");
        return;
    }
    const mutation = `
        mutation {
            createStatusJamKerja(input: {nama: "${nama}"}) {
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
    closeAddStatusJamKerjaModal();
    loadStatusJamKerjaData();
}