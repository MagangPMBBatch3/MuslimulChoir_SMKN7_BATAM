function openCreateKeteranganModal() {
    // kosongkan form
    document.getElementById('editKeteranganId').value = "";
    document.getElementById('editKeteranganBagian_id').value = "";
    document.getElementById('editKeteranganProyek_id').value = "";
    document.getElementById('editKeteranganTanggal').value = "";
    document.getElementById('modalEditKeterangan').classList.remove('hidden');
}

async function createKeterangan() {
    const bagian_id = document.getElementById('editKeteranganBagian_id').value.trim();
    const proyek_id = document.getElementById('editKeteranganProyek_id').value.trim();
    const tanggal = document.getElementById('editKeteranganTanggal').value.trim();

    if (!bagian_id || !proyek_id || !tanggal) {
        alert("Semua field harus diisi");
        return;
    }

    const mutation = `
      mutation {
        createKeterangan(
          input: {
            bagian_id: ${bagian_id},
            proyek_id: ${proyek_id},
            tanggal: "${tanggal}"
          }
        ) {
          id
          bagian_id
          proyek_id
          tanggal
        }
      }
    `;

    try {
        await fetch('/graphql', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ query: mutation })
        });

        closeEditKeteranganModal();
        loadKeteranganData(); // refresh tabel/list
    } catch (error) {
        console.error("Error create Keterangan:", error);
    }
}
