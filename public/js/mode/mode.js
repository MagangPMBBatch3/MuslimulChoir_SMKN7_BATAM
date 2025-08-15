async function loadModeJamKerjaData() {
    const queryAktif = `
      query {
        allModeJamKerja {
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
    renderModeJamKerjaTable(dataAktif?.data?.allModeJamKerja || [], 'dataModeJamKerja', true);

    const queryArsip = `
      query {
        allModeJamKerjaArsip {
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
    renderModeJamKerjaTable(dataArsip?.data?.allModeJamKerjaArsip || [], 'dataModeJamKerjaArsip', false);
}

function renderModeJamKerjaTable(modes, tableId, isActive) {
    const tbody = document.getElementById(tableId);
    tbody.innerHTML = '';

    if (!modes.length) {
        tbody.innerHTML = `
            <tr>
                <td colspan="3" class="text-center text-gray-500 p-3">Tidak ada data</td>
            </tr>
        `;
        return;
    }

    modes.forEach(item => {
        let actions = '';
        if (isActive) {
            actions = `
                <button onclick="openEditModeJamKerjaModal(${item.id}, '${item.nama}')" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                <button onclick="archiveModeJamKerja(${item.id})" class="bg-red-500 text-white px-2 py-1 rounded">Arsipkan</button>
            `;
        } else {
            actions = `
                <button onclick="restoreModeJamKerja(${item.id})" class="bg-green-500 text-white px-2 py-1 rounded">Restore</button>
                <button onclick="forceDeleteModeJamKerja(${item.id})" class="bg-red-700 text-white px-2 py-1 rounded">Hapus Permanen</button>
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

async function archiveModeJamKerja(id) {
    if (!confirm('Pindahkan ke arsip?')) return;
    const mutation = `
    mutation {
        deleteModeJamKerja(id: ${id}) { id }
    }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadModeJamKerjaData();
}

async function restoreModeJamKerja(id) {
    if (!confirm('Kembalikan dari arsip?')) return;
    const mutation = `
    mutation {
        restoreModeJamKerja(id: ${id}) { id }
    }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadModeJamKerjaData();
}

async function forceDeleteModeJamKerja(id) {
    if (!confirm('Hapus permanen? Data tidak bisa dikembalikan')) return;
    const mutation = `
    mutation {
        forceDeleteModeJamKerja(id: ${id}) { id }
    }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadModeJamKerjaData();
}

async function searchModeJamKerja() {
    const keyword = document.getElementById('searchModeJamKerja').value.trim();
    if (!keyword) {
        loadModeJamKerjaData();
        return;
    }

    let query = '';

    if (!isNaN(keyword)) {
        query = `
        {
            modeJamKerja(id: ${keyword}) {
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
        renderModeJamKerjaTable(data.data.modeJamKerja ? [data.data.modeJamKerja] : [], 'dataModeJamKerja', true);

    } else {
        query = `
        {
            modeJamKerjaByNama(nama: "%${keyword}%") {
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
        renderModeJamKerjaTable(data.data.modeJamKerjaByNama, 'dataModeJamKerja', true);
    }
}

document.addEventListener('DOMContentLoaded', loadModeJamKerjaData);
