async function loadLevelData() {
    const queryAktif = `
      query {
        allLevel {
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
    renderLevelTable(dataAktif?.data?.allLevel || [], 'dataLevel', true);

    const queryArsip = `
      query {
        allLevelArsip {
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
    renderLevelTable(dataArsip?.data?.allLevelArsip || [], 'dataLevelArsip', false);
}


function renderLevelTable(levels, tableId, isActive) {
    const tbody = document.getElementById(tableId);
    tbody.innerHTML = '';

    if (!levels.length) {
        tbody.innerHTML = `
            <tr>
                <td colspan="3" class="text-center text-gray-500 p-3">Tidak ada data</td>
            </tr>
        `;
        return;
    }

    levels.forEach(item => {
        let actions = '';
        if (isActive) {
            actions = `
                <button onclick="openEditLevelModal(${item.id}, '${item.nama}')" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                <button onclick="archiveLevel(${item.id})" class="bg-red-500 text-white px-2 py-1 rounded">Arsipkan</button>
            `;
        } else {
            actions = `
                <button onclick="restoreLevel(${item.id})" class="bg-green-500 text-white px-2 py-1 rounded">Restore</button>
                <button onclick="forceDeleteLevel(${item.id})" class="bg-red-700 text-white px-2 py-1 rounded">Hapus Permanen</button>
            `;
        }

        tbody.innerHTML += `
            <tr>
                <td class="border p-2">${item.id}</td>
                <td class="border p-2">${item.nama}</td>
                <td class="border p-2">${actions}</td>
            </tr>
        `;
    });
}

async function archiveLevel(id) {
    if(!confirm('Pindahkan ke arsip?')) return;
    const mutation = `
    mutation {
    deleteLevel(id: ${id}){id}
    }
    `;
    await fetch('/graphql', {
    method: 'POST',
    headers: {'Content-Type' : 'application/json'},
    body: JSON.stringify({ query: mutation})
  });
  loadLevelData();
    
}

async function restoreLevel(id) {
    if (!confirm('Kembalikan dari arsip')) return;
    const mutation =`
    mutation {
    restoreLevel(id: ${id}){id}}
    `;
    await fetch('/graphql', {
    method: 'POST',
    headers: {'Content-Type' : 'application/json'},
    body: JSON.stringify({ query: mutation})
  });
  loadLevelData();
}

async function forceDeleteLevel(id) {
    if(!confirm('Hapus permanen? Data tidak bisa dikembalikan')) return;
    const mutation = `
    mutation{
    forceDeleteLevel(id: ${id}){id}}`;
    await fetch('/graphql', {
    method: 'POST',
    headers: {'Content-Type' : 'application/json'},
    body: JSON.stringify({ query: mutation})
  });
  loadLevelData();
}

async function searchLevel() {
    const keyword = document.getElementById('searchLevel').value.trim();
    if (!keyword) {
        loadLevelData();
        return;
    }

    let query = '';

    if (!isNaN(keyword)) {
        query = `
        {
            level(id: ${keyword}) {
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
        renderLevelTable(data.data.level ? [data.data.level] : [], 'dataLevel', true);

    } else {
        query = `
        {
            levelByNama(nama: "%${keyword}%") {
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
        renderLevelTable(data.data.levelByNama, 'dataLevel', true);
    }
}


document.addEventListener('DOMContentLoaded', loadLevelData);