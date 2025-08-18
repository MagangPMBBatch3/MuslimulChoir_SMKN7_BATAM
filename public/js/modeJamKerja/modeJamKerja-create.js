function openAddModeJamKerjaModal() {
    document.getElementById('modalAddModeJamKerja').classList.remove('hidden');
}

function closeAddModeJamKerjaModal() {
    document.getElementById('modalAddModeJamKerja').classList.add('hidden');
}

async function createModeJamKerja() {
    const nama = document.getElementById('addModeJamKerjaNama').value.trim();
    if (!nama) {
        alert('Nama tidak boleh kosong');
        return;
    }
    const mutation = `
        mutation {
            createModeJamKerja(input: { nama: "${nama}" }) {
                id
                nama
}
}`;

await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query: mutation }),
    });
    closeAddModeJamKerjaModal();
    loadModeJamKerjaData();
}