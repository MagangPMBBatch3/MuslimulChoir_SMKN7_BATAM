function openEditKeteranganModal(id, bagian_id, proyek_id, tanggal) {
    document.getElementById('editKeteranganId').value = id;
    document.getElementById('editKeteranganBagian_id').value = bagian_id;
    document.getElementById('editKeteranganProyek_id').value = proyek_id;
    document.getElementById('editKeteranganTanggal').value = tanggal;
    document.getElementById('modalEditKeterangan').classList.remove('hidden');
}

function closeEditKeteranganModal() {
    document.getElementById('modalEditKeterangan').classList.add('hidden');
}

async function updateKeterangan(id,bagian_id, proyek_id, tanggal) {
    const id = document.getElementById('editKeteranganId').value;
    const bagian_id = document.getElementById('editKeteranganBagian_id').value.trim();
    const proyek_id = document.getElementById('editKeteranganProyek_id').value.trim();
    const tanggal = document.getElementById('editKeteranganTanggal').value.trim();
    if (!nama) {
        alert("Nama Keterangan harus diisi");
        return;
    } 
    const mutation = `
         mutation {
      updateKeterangan(
        id: ${id},
        input: {
          bagian_id: ${bagianId}
          proyek_id: ${proyekId}
        }
      ) {
        id
        bagian_id
        proyek_id
      }
    }

    `;
    await fetch('/graphql', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({query: mutation})
    });
    closeEditKeteranganModal();
    loadKeteranganData();
}