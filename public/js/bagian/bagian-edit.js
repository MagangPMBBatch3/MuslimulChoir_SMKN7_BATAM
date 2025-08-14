function openEditModal(id, nama){
    document.getElementById('editId').value = id;
    document.getElementById('editNama').value = nama;
    document.getElementById('modalEdit').classList.remove('hidden');
}
function closeEditModal(){
    document.getElementById('modalEdit').classList.add('hidden');
}

async function updateBagian() {
    const id = document.getElementById('editId').value;
    const newNama = document.getElementById('editNama').value;
    if (!newNama) return alert("Nama tidak boleh kosong");

    const mutation = `
         mutation {
             updateBagian(input: {id: ${id}, nama: "${newNama}"}) {
             id
             nama
            }
         
         }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: {'Content-Type' : 'application/json'},
        body: JSON.stringify({query: mutation})
    });
    closeEditModal();
    loadData();
}