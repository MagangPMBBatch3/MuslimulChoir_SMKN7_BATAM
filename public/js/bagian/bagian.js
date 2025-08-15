async function loadData(queryType = "all") {
    let query;
    const searchValue = document.getElementById('search').value.trim();

    if (queryType === "search" && searchValue) {
        if (!isNaN(searchValue)) {
            query = `
            query {
                bagian(id: ${searchValue}){
                    id
                    nama
                }
            }
            `;
        } else {
            query = `
            query {
                bagianByNama(nama: "%${searchValue}%"){
                    id
                    nama
                }
            }
            `;
        }
    } else {
        query = `
        query {
            allBagian {
                id
                nama
            }        
        }
        `;
    }

    const res = await fetch('/graphql', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ query })
    });
    const data = await res.json();

    const tbody = document.getElementById('dataBagian');
    tbody.innerHTML = '';

    let items = [];
    if (data.data.allBagian) items = data.data.allBagian;
    if (data.data.bagianByNama) items = data.data.bagianByNama;
    if (data.data.bagian) items = [data.data.bagian];

    if (items.length === 0) {
        tbody.innerHTML = `<tr><td colspan="3" class="text-center p-2">Data tidak ditemukan</td></tr>`;
    }

    items.forEach(item => {
        if (!item) return;
        tbody.innerHTML += `
            <tr class="border-b">
                <td class="border px-2 py-1 text-center">${item.id}</td>
                <td class="border px-2 py-1 text-center">${item.nama}</td>
                <td class="border px-2 py-1 text-center">
                    <button onclick="openEditModal(${item.id}, '${item.nama}')" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                    <button onclick="hapusBagian(${item.id})" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                </td>
            </tr>
        `;
    });
}

function searchBagian() {
    loadData("search");
}

async function hapusBagian(id) {
    if (!confirm("Yakin ingin menghapus data ini?")) return;
    const mutation = `
        mutation {
            deleteBagian(id: ${id}) {
                id
            }
        }
    `;

    await fetch("/graphql", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ query: mutation })
    });

    loadData();
}

document.addEventListener("DOMContentLoaded", () => loadData());