async function loadJenisPesanOptionsForEdit() {
    const query = `
        query {
            allJenisPesan {
                id
                nama
            }
        }
    `;

    const response = await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query }),
    });

    const data = await response.json();
    const select = document.getElementById("editPesanJenisPesan");

    while (select.options.length > 1) {
        select.remove(1);
    }

    data.data.allJenisPesan.forEach((jenispesan) => {
        const option = new Option(jenispesan.nama, jenispesan.id);
        select.add(option);
    });
}

async function openEditPesanModal(id, pengirim, penerima, isi, parent_id, tgl_pesan, jenis_id) {
    await loadJenisPesanOptionsForEdit();
    document.getElementById("editId").value = id;
    document.getElementById("editPesanPengirim").value = pengirim;
    document.getElementById("editPesanPenerima").value = penerima;
    document.getElementById("editPesanIsi").value = isi;
    document.getElementById("editPesanParentID").value = parent_id;
    document.getElementById("editPesanTglPesan").value = tgl_pesan;
    document.getElementById("editPesanJenisPesan").value = jenis_id;
 
    document.getElementById("modalEditPesan").classList.remove("hidden");
}

function closeEditPesanModal() {
    document.getElementById("modalEditPesan").classList.add("hidden");
}

async function updatePesan() {
    const id = document.getElementById("editId").value;
    const pengirim = document.getElementById("editPesanPengirim").value;
    const penerima = document.getElementById("editPesanPenerima").value;
    const isi = document.getElementById("editPesanIsi").value;
    const parent_id = document.getElementById("editPesanParentID").value;
    let tgl_pesan = document.getElementById("editPesanTglPesan").value;
    const jenis_id = document.getElementById("editPesanJenisPesan").value;

    if (!pengirim || !penerima || !parent_id || !isi || !parent_id || !tgl_pesan || !jenis_id) {
        alert("Semua field harus diisi!");
        return;
    }

        if (tgl_pesan.includes("T")) {
            tgl_pesan = tgl_pesan.replace("T", " ") + ":00";
        }

    const mutation = `
            mutation {
                updatePesan(
                 id: ${id},
            input:{
                pengirim : "${pengirim}"
                penerima : "${penerima}"
                isi : "${isi}"
                parent_id : ${parent_id}
                tgl_pesan : "${tgl_pesan}"
                jenis_id : ${jenis_id}
            }) {
                id
                pengirim
                penerima
                isi
                parent_id
                tgl_pesan
                jenis_id
                jenis_pesan {
                    nama
                }
                }
            }`;
          console.log(mutation);


    const response = await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query: mutation }),
    });
    const result = await response.json();
    console.log(result);
    loadPesanData();
    closeEditPesanModal();
}