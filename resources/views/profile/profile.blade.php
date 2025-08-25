<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Profil — Template</title>
  <style>
    *{box-sizing:border-box;margin:0;padding:0}
    :root{
      --bg:#f9fafb;
      --card:#ffffff;
      --accent:#06b6d4;
      --accent-2:#06d675;
      --muted:#6b7280;
      --shadow: 0 8px 20px rgba(2,6,23,0.08);
      --radius:16px;
      font-family:Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, Arial;
    }

    body{
      background:linear-gradient(180deg,var(--bg),#fff);
      min-height:100vh;
      padding:40px;
      display:flex;
      align-items:center;
      justify-content:center
    }

    .profile-card{
      width:100%;
      max-width:880px;
      background:var(--card);
      border-radius:var(--radius);
      box-shadow:var(--shadow);
      overflow:hidden;
      display:grid;
      grid-template-columns:300px 1fr;
    }

    /* Bagian kiri */
    .left{
      background:linear-gradient(180deg,rgba(6,182,212,0.08),rgba(6,214,117,0.05));
      padding:36px 20px;
      display:flex;
      flex-direction:column;
      align-items:center;
      text-align:center;
    }
    .avatar{
      width:150px;height:150px;
      border-radius:50%;
      overflow:hidden;
      border:6px solid #fff;
      box-shadow:0 6px 20px rgba(6,182,212,0.15);
      margin-bottom:16px;
    }
    .avatar img{width:100%;height:100%;object-fit:cover;display:block}
    .name{font-size:1.5rem;font-weight:700;color:var(--accent-2)}
    .role{font-size:.95rem;color:var(--muted);margin-top:4px}

    /* Bagian kanan */
    .right{padding:32px}
    .bio{color:var(--muted);margin-bottom:24px;line-height:1.6}

    .section{margin-bottom:24px}
    .section h3{font-size:1.1rem;margin-bottom:12px;color:#111}

    .gallery{
      display:grid;
      grid-template-columns:repeat(auto-fill,minmax(150px,1fr));
      gap:12px
    }
    .gallery img{
      width:100%;height:110px;
      object-fit:cover;
      border-radius:12px;
      transition:transform .3s ease, box-shadow .3s ease;
    }
    .gallery img:hover{
      transform:scale(1.05);
      box-shadow:0 6px 16px rgba(0,0,0,.15);
    }

    .btn{
      padding:10px 18px;
      border-radius:10px;
      border:0;
      font-weight:600;
      cursor:pointer;
      font-size:.95rem;
      transition:all .3s ease;
    }
    .btn.primary{
      background:var(--accent);
      color:white;
      box-shadow:0 4px 12px rgba(6,182,212,0.25);
    }
    .btn.primary:hover{background:#0891b2}
    .btn.secondary{
      background:transparent;
      color:var(--accent);
      border:2px solid var(--accent);
    }
    .btn.secondary:hover{
      background:var(--accent);
      color:white;
    }

    /* Responsive */
    @media (max-width:780px){
      .profile-card{grid-template-columns:1fr}
      .left{flex-direction:column;padding:24px}
      .avatar{width:120px;height:120px}
      .right{padding:24px}
    }
  </style>
</head>
<body>
  <main class="profile-card" role="region" aria-label="Profil pengguna">
    <!-- Kiri -->
    <aside class="left">
      <div class="avatar" title="Foto profil">
        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=800&auto=format&fit=crop&ixlib=rb-4.0.3" alt="Avatar">
      </div>
      <h1 class="name">Nama Lengkap</h1>
      <p class="role">Web Developer • Batam</p>
    </aside>

    <!-- Kanan -->
    <section class="right">
      <p class="bio">
        Halo! Saya seorang pengembang web yang suka membuat antarmuka yang bersih dan fungsional. 
        Saya fokus pada <b>HTML</b>, <b>CSS</b>, dan <b>JavaScript</b> — serta membangun pengalaman pengguna yang responsif dan cepat.
      </p>

      <div class="section">
        <h3>Galeri</h3>
        <div class="gallery">
          <img src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?q=80&w=800&auto=format&fit=crop" alt="">
          <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=800&auto=format&fit=crop" alt="">
          <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?q=80&w=800&auto=format&fit=crop" alt="">
        </div>
      </div>

      <div class="section">
        <h3>Tindakan</h3>
        <button class="btn secondary">Edit Profil</button>
      </div>
    </section>
  </main>
</body>
</html>
