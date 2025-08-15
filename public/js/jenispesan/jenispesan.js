async function loadJenisPesanData() {
    const queryAktif = `
      query {
        allJenisPesan {
          id
          nama
        }
      }
    `;

    const resAktif = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: queryAktif })
    });
    const dataAktif = await resAktif.json();
    renderJenisPesanTable(dataAktif?.data?.allJenisPesan || [], 'dataJenisPesan', true);

    const queryArsip = `
      query {
        allJenisPesanArsip {
          id
          nama
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
    renderJenisPesanTable(dataArsip?.data?.allJenisPesanArsip || [], 'dataJenisPesanArsip', false);
}

function renderJenisPesanTable(Statuss, tableId, isActive) {
    const tbody = document.getElementById(tableId);
    tbody.innerHTML = '';

    if (!Statuss.length) {
        tbody.innerHTML = `
            <tr>
                <td colspan="3" class="text-center text-gray-500 p-3">Tidak ada data</td>
            </tr>
        `;
        return;
    }

    Statuss.forEach(item => {
        let actions = '';
        if (isActive) {
            actions = `
                <button onclick="openEditJenisPesanModal(${item.id}, '${item.nama}')" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                <button onclick="archiveJenisPesan(${item.id})" class="bg-red-500 text-white px-2 py-1 rounded">Arsipkan</button>
            `;
        } else {
            actions = `
                <button onclick="restoreJenisPesan(${item.id})" class="bg-green-500 text-white px-2 py-1 rounded">Restore</button>
                <button onclick="forceDeleteJenisPesan(${item.id})" class="bg-red-700 text-white px-2 py-1 rounded">Hapus Permanen</button>
            `;
        }

        tbody.innerHTML += `
            <tr>
                <td class="border p-2 text-center">${item.id}</td>
                <td class="border p-2 text-center">${item.nama}</td>
                <td class="border p-2 text-center">${actions}</td>
            </tr>
        `;
    });
}

async function archiveJenisPesan(id) {
    if (!confirm('Pindahkan ke arsip?')) return;
    const mutation = `
    mutation {
        deleteJenisPesan(id: ${id}) { id }
    }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadJenisPesanData();
}

async function restoreJenisPesan(id) {
    if (!confirm('Kembalikan dari arsip?')) return;
    const mutation = `
    mutation {
        restoreJenisPesan(id: ${id}) { id }
    }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadJenisPesanData();
}

async function forceDeleteJenisPesan(id) {
    if (!confirm('Hapus permanen? Data tidak bisa dikembalikan')) return;
    const mutation = `
    mutation {
        forceDeleteJenisPesan(id: ${id}) { id }
    }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadJenisPesanData();
}

async function searchJenisPesan() {
    const keyword = document.getElementById('searchJenisPesan').value.trim();
    if (!keyword) {
        loadJenisPesanData();
        return;
    }

    let query = '';

    if (!isNaN(keyword)) {
        query = `
        {
            JenisPesan(id: ${keyword}) {
                id
                nama
            }
        }
        `;
        const res = await fetch('/graphql', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ query })
        });
        const data = await res.json();
        renderJenisPesanTable(data.data.JenisPesan ? [data.data.JenisPesan] : [], 'dataJenisPesan', true);

    } else {
        query = `
        {
            JenisPesanByNama(nama: "%${keyword}%") {
                id
                nama
            }
        }
        `;
        const res = await fetch('/graphql', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ query })
        });
        const data = await res.json();
        renderJenisPesanTable(data.data.JenisPesanByNama, 'dataJenisPesan', true);
    }
}

document.addEventListener('DOMContentLoaded', loadJenisPesanData);
