function openAddUserModal(){
    document.getElementById('modalAddUser').classList.remove('hidden');
}

function closeAddUserModal(){
    document.getElementById('modalAddUser').classList.add('hidden');
}

async function createUser() {
    const nama = document.getElementById('addUserNama').value.trim();
    const email = document.getElementById('addUserEmail').value.trim();
    const password = document.getElementById('addUserPassword').value.trim();

    if (!nama || !email || !password) {
        alert("Nama, Email, dan Password harus diisi");
        return;
    }

    const mutation = `
        mutation {
            createUser(input: {
                name: "${nama}",
                email: "${email}",
                password: "${password}"
            }) {
                id
                name
                email
            }
        }
    `;

    await fetch('/graphql', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ query: mutation })
    });

    closeAddUserModal();
    loadUserData();
}
