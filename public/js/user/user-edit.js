function openEditUserModal(id, nama, email) {
    document.getElementById('editUserId').value = id;
    document.getElementById('editUserNama').value = nama;
    document.getElementById('editUserEmail').value = email;
    document.getElementById('modalEditUser').classList.remove('hidden');
}

function closeEditUserModal() {
    document.getElementById('modalEditUser').classList.add('hidden');
}

async function updateUser() {
    const id = document.getElementById('editUserId').value;
    const nama = document.getElementById('editUserNama').value.trim();
    const email = document.getElementById('editUserEmail').value.trim();
    if (!nama) {
        alert("Nama User harus diisi");
        return;
    } 
    const mutation = `
        mutation {
            updateUser(id: ${id}, input: { name: "${nama}", email: "${email}"}) {
                id
                name
                email
            }
        }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({query: mutation})
    });
    closeEditUserModal();
    loadUserData();
}