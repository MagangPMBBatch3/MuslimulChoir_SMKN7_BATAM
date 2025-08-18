async function loadKeteranganData() {
    const queryAktif = `
      query {
        allKeterangan {
          id
         bagian_id
         proyek_id
         tanggal
          bagian{
            nama
          }
         proyek{
         nama
         }
        }
      }

    `;

    const resAktif = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: queryAktif })
    });
    const dataAktif = await resAktif.json();
    renderKeteranganTable(dataAktif?.data?.allKeterangan || [], 'dataKeterangan', true);

    const queryArsip = `
      query {
        allKeteranganArsip {
           id
         bagian_id
         proyek_id
         tanggal
          bagian{
            nama
          }
         proyek{
         nama
         }
        }
      }
    `;

    const resArsip = await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: queryArsip })
    });
    const dataArsip = await resArsip.json();
    renderKeteranganTable(dataArsip?.data?.allKeteranganArsip || [], 'dataKeteranganArsip', false);
}

function renderKeteranganTable(Statuss, tableId, isActive) {
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
                <button onclick="openEditKeteranganModal(${item.id}, '${item.nama}')" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                <button onclick="archiveKeterangan(${item.id})" class="bg-red-500 text-white px-2 py-1 rounded">Arsipkan</button>
            `;
        } else {
            actions = `
                <button onclick="restoreKeterangan(${item.id})" class="bg-green-500 text-white px-2 py-1 rounded">Restore</button>
                <button onclick="forceDeleteKeterangan(${item.id})" class="bg-red-700 text-white px-2 py-1 rounded">Hapus Permanen</button>
            `;
        }

        tbody.innerHTML += `
            <tr>
                <td class="border p-2 text-center">${item.id}</td>
                <td class="border p-2 text-center">${item.bagian?.nama || item.bagian_id}</td>
                <td class="border p-2 text-center">${item.proyek?.nama || item.proyek_id}</td>
                <td class="border p-2 text-center">${item.tanggal}</td>
                <td class="border p-2 text-center">${actions}</td>
            </tr>
        `;
    });
}

async function archiveKeterangan(id) {
    if (!confirm('Pindahkan ke arsip?')) return;
    const mutation = `
    mutation {
        deleteKeterangan(id: ${id}) { id }
    }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadKeteranganData();
}

async function restoreKeterangan(id) {
    if (!confirm('Kembalikan dari arsip?')) return;
    const mutation = `
    mutation {
        restoreKeterangan(id: ${id}) { id }
    }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadKeteranganData();
}

async function forceDeleteKeterangan(id) {
    if (!confirm('Hapus permanen? Data tidak bisa dikembalikan')) return;
    const mutation = `
    mutation {
        forceDeleteKeterangan(id: ${id}) { id }
    }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation })
    });
    loadKeteranganData();
}

async function searchKeterangan() {
    const keyword = document.getElementById('searchKeterangan').value.trim();
    if (!keyword) {
        loadKeteranganData();
        return;
    }

    let query = '';

    if (!isNaN(keyword)) {
        query =` {
            Keterangan(id: ${keyword} ) {
                id
                tanggal
                bagian_id
                proyek_id
                bagian {
                id
                nama
                }
                proyek {
                id
                nama
                }
            }
            }
        `;
        const res = await fetch('/graphql', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ query })
        });
        const data = await res.json();
        renderKeteranganTable(data.data.Keterangan ? [data.data.Keterangan] : [], 'dataKeterangan', true);

    } 
        
}

document.addEventListener('DOMContentLoaded', loadKeteranganData);
