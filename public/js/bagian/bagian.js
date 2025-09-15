// async function loadData(queryType = "all") {
//     let query;
//     const searchValue = document.getElementById('search').value.trim();

//     if (queryType === "search" && searchValue) {
//         if (!isNaN(searchValue)) {
//             query = `
//             query {
//                 bagian(id: ${searchValue}){
//                     id
//                     nama
//                 }
//             }
//             `;
//         } else {
//             query = `
//             query {
//                 bagianByNama(nama: "%${searchValue}%"){
//                     id
//                     nama
//                 }
//             }
//             `;
//         }
//     } else {
//         query = `
//         query {
//             allBagian {
//                 id
//                 nama
//             }        
//         }
//         `;
//     }

//     const res = await fetch('/graphql', {
//         method: 'POST',
//         headers: {'Content-Type': 'application/json'},
//         body: JSON.stringify({ query })
//     });
//     const data = await res.json();

//     const tbody = document.getElementById('dataBagian');
//     tbody.innerHTML = '';

//     let items = [];
//     if (data.data.allBagian) items = data.data.allBagian;
//     if (data.data.bagianByNama) items = data.data.bagianByNama;
//     if (data.data.bagian) items = [data.data.bagian];

//     if (items.length === 0) {
//         tbody.innerHTML = <tr><td colspan="3" class="text-center p-2">Data tidak ditemukan</td></tr>;
//     }

//     items.forEach(item => {
//         if (!item) return;
//         tbody.innerHTML += `
//             <tr class="border-b">
//                 <td class="border px-2 py-1 text-center">${item.id}</td>
//                 <td class="border px-2 py-1 text-center">${item.nama}</td>
//                 <td class="border px-2 py-1 text-center">
//                     <button onclick="openEditModal(${item.id}, '${item.nama}')" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
//                     <button onclick="hapusBagian(${item.id})" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
//                 </td>
//             </tr>
//         `;
//     });
// }

// function searchBagian() {
//     loadData("search");
// }

// async function hapusBagian(id) {
//     if (!confirm("Yakin ingin menghapus data ini?")) return;
//     const mutation = `
//         mutation {
//             deleteBagian(id: ${id}) {
//                 id
//             }
//         }
//     `;

//     await fetch("/graphql", {
//         method: "POST",
//         headers: { "Content-Type": "application/json" },
//         body: JSON.stringify({ query: mutation })
//     });

//     loadData();
// }

// document.addEventListener("DOMContentLoaded", () => loadData());


const API_URL = '/graphql';
let currentPage = 1;

// Load data Bagian dengan pagination
async function loadBagianPaginate(page = 1) {
    currentPage = page;
    const perPage = document.getElementById('perPage')?.value || 5;
    const searchValue = document.getElementById('search')?.value.trim() || "";

    const query = `
    query ($first: Int, $page: Int, $search: String) {
        allBagianPaginate(first: $first, page: $page, search: $search) {
            data {
                id
                nama
            }
            paginatorInfo {
                currentPage
                lastPage
                total
                hasMorePages
            }
        }
    }
    `;

    const variables = { first: parseInt(perPage), page, search: searchValue };

    const res = await fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query, variables })
    });

    const data = await res.json();

    const tbody = document.getElementById('dataBagian');
    tbody.innerHTML = '';

    const result = data.data.allBagianPaginate;
    const items = result.data;
    const pageInfo = result.paginatorInfo;

    if (!items || items.length === 0) {
        tbody.innerHTML =
            `<tr><td colspan="3" class="text-center p-2">Data tidak ditemukan</td></tr>`;
        document.getElementById('pageInfo').innerText = 'Tidak ada data';
        return;
    }

    // Render baris table
    items.forEach(item => {
        tbody.innerHTML += `
            <tr>
                <td class="border p-2">${item.id}</td>
                <td class="border p-2">${item.nama}</td>
                <td class="border p-2 flex gap-1">
                    <button onclick="openEditModal(${item.id}, '${item.nama}')" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                    <button onclick="hapusBagian(${item.id})" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                </td>
            </tr>
        `;
    });

    // Update informasi halaman
    document.getElementById('pageInfo').innerText =
        `Halaman ${pageInfo.currentPage} dari ${pageInfo.lastPage} (Total: ${pageInfo.total})`;

    // Update tombol prev/next
    document.getElementById('prevBtn').disabled = pageInfo.currentPage <= 1;
    document.getElementById('nextBtn').disabled = !pageInfo.hasMorePages;
}

// Pencarian
function searchBagian() {
    loadBagianPaginate(1);
}

// pagination tombol
function prevPage() {
    if (currentPage > 1) loadBagianPaginate(currentPage - 1);
}
function nextPage() {
    loadBagianPaginate(currentPage + 1);
}

// hapus data
async function hapusBagian(id) {
    if (!confirm('Yakin ingin menghapus data ini?')) return;

    const mutation = `
    mutation ($id: ID!) {
        deleteBagian(id: $id) {
            id
        }
    }
    `;

    const res = await fetch(API_URL, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: mutation, variables: { id } })
    });

    await res.json();
    loadBagianPaginate(currentPage);
}

// load otomatis saat halaman siap
document.addEventListener('DOMContentLoaded', () => {
    loadBagianPaginate();
});
