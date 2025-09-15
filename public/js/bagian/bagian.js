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
