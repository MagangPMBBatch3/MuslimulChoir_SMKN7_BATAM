async function loadUserData() {
    const queryAktif = `
        query {
            allUser {
                id
                name
                email
            }
        }
    `;

    const resAktif = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: queryAktif })
    });
    const dataAktif = await resAktif.json();
    renderUserTable(dataAktif?.data?.allUser || [], 'dataUser', true);

    // kalau kamu mau arsip, pastikan di schema ada `allUserArsip`
    const queryArsip = `
        query {
            allUserArsip {
                id
                name
                email
                deleted_at
            }
        }
    `;

    const resArsip = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: queryArsip })
    });
    const dataArsip = await resArsip.json();
    renderUserTable(dataArsip?.data?.allUserArsip || [], 'dataUserArsip', false);
}


function renderUserTable(users, tableId, isActive) {
    const tbody = document.getElementById(tableId);
    tbody.innerHTML = '';

    if (!users.length) {
        tbody.innerHTML = `
            <tr>
                <td colspan="3" class="text-center text-gray-500 p-3">Tidak ada data</td>
            </tr>
        `;
        return;
    }

    users.forEach(item => {
        let actions = '';
        if (isActive) {
            actions = `
                <button onclick="openEditUserModal('${item.id}', '${item.name}', '${item.email}')" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                <button onclick="arsipUser(${item.id})" class="bg-red-500 text-white px-2 py-1 rounded">Arsipkan</button>
                <button onclick="viewUserProfile(${item.id})" class="bg-blue-500 text-white px-2 py-1 rounded">Profile</button>
            `;
        } else {
            actions = `
                <button onclick="restoreUser(${item.id})" class="bg-green-500 text-white px-2 py-1 rounded">Restore</button>
                <button onclick="forceDeleteUser(${item.id})" class="bg-red-700 text-white px-2 py-1 rounded">Hapus Permanen</button>
                <button onclick="viewUserProfile(${item.id})" class="bg-blue-500 text-white px-2 py-1 rounded">Profile</button>

            `;
        }

        tbody.innerHTML += `
            <tr>
                <td class="border p-2 text-center">${item.id}</td>
                <td class="border p-2 text-center">${item.name}</td>
                <td class="border p-2 text-center">${item.email}</td>
                <td class="border p-2 text-center">${actions}</td>
            </tr>
        `;
    });
}

function viewUserProfile(userId) {
    window.location.href =`/profile/${userId}`;
}

async function arsipUser(id) {
    if (!confirm('Pindahkan ke arsip?')) return;
    const mutation = `
        mutation {
            deleteUser(id: ${id}) { id }
        }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadUserData();
}

async function restoreUser(id) {
    if (!confirm('Kembalikan dari arsip?')) return;
    const mutation = `
        mutation {
            restoreUser(id: ${id}) { id }
        }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadUserData();
}

async function forceDeleteUser(id) {
    if (!confirm('Hapus permanen? Data tidak bisa dikembalikan')) return;
    const mutation = `
        mutation {
            forceDeleteUser(id: ${id}) { id }
        }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadUserData();
}

async function searchUser() {
    const keyword = document.getElementById('searchUser').value.trim();
    if (!keyword) {
        loadUserData();
        return;
    }

    let query = '';

    if (!isNaN(keyword)) {
        // cari berdasarkan ID
        query = `
            {
                User(id: ${keyword}) {
                    id
                    name
                    email
                }
            }
        `;
        const res = await fetch('/graphql', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ query })
        });
        const data = await res.json();
        renderUserTable(data.data.User ? [data.data.User] : [], 'dataUser', true);

    } else {
        // cari berdasarkan email (LIKE)
        query = `
            {
                UserByEmail(email: "%${keyword}%") {
                    id
                    name
                    email
                }
            }
        `;
        const res = await fetch('/graphql', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ query })
        });
        const data = await res.json();
        renderUserTable(data.data.UserByEmail, 'dataUser', true);
    }
}

document.addEventListener('DOMContentLoaded', loadUserData);
