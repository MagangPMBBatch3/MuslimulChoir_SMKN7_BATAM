async function createRegister() {
    const nama = document.getElementById("nama").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    if (!nama) {
        alert("Nama Register tidak boleh kosong");
        return;
    }
    if (!email) {
        alert("Email Register tidak boleh kosong");
        return;
    }
    if (!password) {
        alert("Password Register tidak boleh kosong");
        return;
    }

    const createUserMutation = `
        mutation {
            createUser(input: { name: "${nama}", email: "${email}", password: "${password}" }) {
                id
                name
                email
            }
        }`;

    try {
        const userResponse = await fetch("/graphql", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ query: createUserMutation }),
        });

        const userResult = await userResponse.json();

        if (userResult.errors) {
            console.error("Error creating user:", userResult.errors);
            return;
        }

        const userId = userResult.data.createUser.id;

        const createProfileMutation = `
            mutation {
                createUserProfile(input: { user_id: ${userId}, nama_lengkap: "${nama}" }) {
                    id
                    nama_lengkap
                }
            }`;

        const profileResponse = await fetch("/graphql", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ query: createProfileMutation }),
        });

        const profileResult = await profileResponse.json();

        if (profileResult.errors) {
            console.error("Error creating user profile:", profileResult.errors);
            return;
        }

        console.log("User and profile created:", userResult.data.createUser, profileResult.data.createUserProfile);

        // ✅ Redirect ke login
        window.location.href = '/login';

    } catch (error) {
        console.error("Network or server error:", error);
    }
}
