function openEditProyekModal(id,kode, nama, tanggal, nama_sekolah) {
    document.getElementById('editProyekId').value = id;
    document.getElementById('editProyekKode').value = kode;
    document.getElementById('editProyekNama').value = nama;
    document.getElementById('editProyekTanggal').value = tanggal;
    document.getElementById('editProyekNamaSekolah').value = nama_sekolah;
    console.log(id, kode, nama, tanggal, nama_sekolah);

    document.getElementById('modalEditProyek').classList.remove('hidden');
}

function closeEditProyekModal() {
    document.getElementById('modalEditProyek').classList.add('hidden');
}

async function updateProyek() {
    const id = document.getElementById('editProyekId').value;
    const kode = document.getElementById('editProyekKode').value.trim();
    if (!kode) {
        alert("Kode Proyek harus diisi");
        return;
    }

    const nama = document.getElementById('editProyekNama').value.trim();
    if (!nama) {
        alert("Nama Proyek harus diisi");
        return;
    }

    const tanggal = document.getElementById('editProyekTanggal').value.trim();
    if (!tanggal) {
        alert("Tanggal Proyek harus diisi");
        return;
    }

    const nama_sekolah = document.getElementById('editProyekNamaSekolah').value.trim();
    if (!nama_sekolah) {
        alert("Nama Proyek harus diisi");
        return;
    }

    const mutation = `
    mutation {
        updateProyek(
            id: ${id},
            input: {
                nama: "${nama}",
                kode: "${kode}",
                tanggal: "${tanggal}",
                nama_sekolah: "${nama_sekolah}"
            }
        ) {
            id
            kode
            nama
            tanggal
            nama_sekolah
        }
    }
`;

    const response = await fetch('/graphql', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({query: mutation})
    });
    const result = await response.json();
    console.log(result);
    closeEditProyekModal();
    loadProyekData();
}