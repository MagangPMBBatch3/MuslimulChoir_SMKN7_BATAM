async function loadStatusJamKerjaData() {
    const queryAktif = `
      query {
        allStatusJamKerja {
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
    renderStatusJamKerjaTable(dataAktif?.data?.allStatusJamKerja || [], 'dataStatusJamKerja', true);

    const queryArsip = `
      query {
        allStatusJamKerjaArsip {
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
    renderStatusJamKerjaTable(dataArsip?.data?.allStatusJamKerjaArsip || [], 'dataStatusJamKerjaArsip', false);
}

function renderStatusJamKerjaTable(Statuss, tableId, isActive) {
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
                <button onclick="openEditStatusJamKerjaModal(${item.id}, '${item.nama}')" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                <button onclick="archiveStatusJamKerja(${item.id})" class="bg-red-500 text-white px-2 py-1 rounded">Arsipkan</button>
            `;
        } else {
            actions = `
                <button onclick="restoreStatusJamKerja(${item.id})" class="bg-green-500 text-white px-2 py-1 rounded">Restore</button>
                <button onclick="forceDeleteStatusJamKerja(${item.id})" class="bg-red-700 text-white px-2 py-1 rounded">Hapus Permanen</button>
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

async function archiveStatusJamKerja(id) {
    if (!confirm('Pindahkan ke arsip?')) return;
    const mutation = `
    mutation {
        deleteStatusJamKerja(id: ${id}) { id }
    }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadStatusJamKerjaData();
}

async function restoreStatusJamKerja(id) {
    if (!confirm('Kembalikan dari arsip?')) return;
    const mutation = `
    mutation {
        restoreStatusJamKerja(id: ${id}) { id }
    }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadStatusJamKerjaData();
}

async function forceDeleteStatusJamKerja(id) {
    if (!confirm('Hapus permanen? Data tidak bisa dikembalikan')) return;
    const mutation = `
    mutation {
        forceDeleteStatusJamKerja(id: ${id}) { id }
    }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadStatusJamKerjaData();
}

async function searchStatusJamKerja() {
    const keyword = document.getElementById('searchStatusJamKerja').value.trim();
    if (!keyword) {
        loadStatusJamKerjaData();
        return;
    }

    let query = '';

    if (!isNaN(keyword)) {
        query = `
        {
            StatusJamKerja(id: ${keyword}) {
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
        renderStatusJamKerjaTable(data.data.StatusJamKerja ? [data.data.StatusJamKerja] : [], 'dataStatusJamKerja', true);

    } else {
        query = `
        {
            StatusJamKerjaByNama(nama: "%${keyword}%") {
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
        renderStatusJamKerjaTable(data.data.StatusJamKerjaByNama, 'dataStatusJamKerja', true);
    }
}

document.addEventListener('DOMContentLoaded', loadStatusJamKerjaData);
