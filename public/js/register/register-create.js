async function createRegister() {
    
    const nama = document.getElementById("nama").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();
    if (!nama) {
        alert("Nama Register tidak boleh kosong");
        return;
    }
    if (!email) {
        alert("email Register tidak boleh kosong");
        return;
    }
    if (!password) {
        alert("password Register tidak boleh kosong");
        return;
    }
    const mutation = `
        mutation {
            createUser(input: { name: "${nama}", email: "${email}", password: "${password}" }) {
                id
                name
                email
                }
            }`;

    
    const userResponse = await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query: mutation }),
    });
    
    window.location.href = '/login';

    const userResult = await userResponse.json();

        if (userResult.errors) {
        alert('Gagal membuat user: ' + userResult.errors[0].message);
        return;
    }

        const newUser = userResult.data.createUser;
        const profileMutation = `
        mutation {
            createUserProfile(input: {
                user_id: ${newUser.id},
                nama_lengkap: "${newUser.name}",
                nrp: null,
                alamat: null,
                foto: null,
                bagian_id: 2,
                status_id: 2,
                level_id: 2
            }) {
                id
                user_id
                nama_lengkap
            }
        }
    `;

        await fetch('/graphql', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ query: profileMutation })
    });
   
}