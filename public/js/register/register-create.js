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

    await fetch("/graphql", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ query: mutation }),
    });

    window.location.href = '/login';
}