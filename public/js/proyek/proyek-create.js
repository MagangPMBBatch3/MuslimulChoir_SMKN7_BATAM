function openAddProyekModal(){
    document.getElementById('modalAddProyek').classList.remove('hidden');
}

function closeAddProyekModal(){
    document.getElementById('modalAddProyek').classList.add('hidden');
}

async function createProyek() {
    const kode = document.getElementById('addProyekKode').value.trim();
    if (!kode) {
        alert("Kode Proyek harus diisi");
        return;
    }

    const nama = document.getElementById('addProyekNama').value.trim();
    if (!nama) {
        alert("Nama Proyek harus diisi");
        return;
    }

    const tanggal = document.getElementById('addProyekTanggal').value.trim();
    if (!tanggal) {
        alert("Tanggal Proyek harus diisi");
        return;
    }

    const nama_sekolah = document.getElementById('addProyekNamaSekolah').value.trim();
    if (!nama_sekolah) {
        alert("Nama Proyek harus diisi");
        return;
    }
    console.log(nama, kode, tanggal, nama_sekolah);
    const mutation = `
        mutation {
            createProyek(input: {nama: "${nama}", kode: "${kode}", tanggal: "${tanggal}", nama_sekolah: "${nama_sekolah}"}) {
                id
                kode
                nama
                tanggal
                nama_sekolah
            }
        }
    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({query: mutation})
    });
    closeAddProyekModal();
    loadProyekData();
}