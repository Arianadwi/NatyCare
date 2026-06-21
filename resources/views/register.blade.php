<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register NatyCare</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        body{min-height:100vh;font-family:'Segoe UI',Arial,sans-serif;background:#ffeef5;display:flex;align-items:center;justify-content:center;padding:28px 16px}
        .auth-page{width:100%;max-width:450px;text-align:center}.logo{margin-bottom:18px}
        .logo img{width:min(220px,62vw);height:auto;display:block;margin:auto;object-fit:contain}
        .container{width:100%;background:#fff;border-radius:18px;padding:30px;box-shadow:0 14px 35px rgba(224,70,130,.14);text-align:left}
        h2{text-align:center;color:#e84393;margin-bottom:24px;font-size:28px}
        label{display:block;font-size:14px;font-weight:700;color:#d83f82;margin-bottom:7px}
        .input-group{position:relative;margin-bottom:16px}.input-group i{position:absolute;left:14px;bottom:14px;color:#e84393;font-size:15px}
        input{width:100%;min-height:46px;padding:12px 14px 12px 42px;border-radius:10px;border:1px solid #ead8df;outline:none;font-size:15px;transition:.2s}
        input:focus{border-color:#e84393;box-shadow:0 0 0 3px rgba(232,67,147,.12)}
        button{width:100%;min-height:46px;padding:12px;background:#f06292;border:none;color:white;border-radius:10px;font-weight:700;font-size:16px;cursor:pointer;margin-top:4px;transition:.2s}
        button:hover{background:#ec407a}.link{margin-top:18px;text-align:center;font-size:14px;color:#666}
        .link a{color:#e84393;text-decoration:none;font-weight:700}.link a:hover{text-decoration:underline}
        @media(max-width:480px){body{align-items:flex-start;padding-top:22px}.container{padding:24px 20px;border-radius:16px}h2{font-size:24px}.logo img{width:min(185px,58vw)}}
    </style>
</head>
<body>
<main class="auth-page">
    <div class="logo">
        <img src="{{ asset('images/LogoN.png') }}" alt="Logo NatyCare">
    </div>
    <div class="container">
        <h2>Daftar Akun</h2>
        <form onsubmit="event.preventDefault(); registerUser();">
            <div class="input-group">
                <label>Nama</label>
                <i class="fa fa-user"></i>
                <input type="text" name="name" placeholder="Masukkan nama" required>
            </div>
            <div class="input-group">
                <label>Email</label>
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" placeholder="Masukkan email" required>
            </div>
            <div class="input-group">
                <label>Kata Sandi</label>
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Masukkan kata sandi" required>
            </div>
            <div class="input-group">
                <label>Konfirmasi Kata Sandi</label>
                <i class="fa fa-lock"></i>
                <input type="password" name="password_confirmation" placeholder="Ulangi kata sandi" required>
            </div>
            <button type="submit">Daftar</button>
        </form>
        <div class="link">Sudah punya akun? <a href="/login">Login</a></div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function registerUser() {
    const name = document.querySelector('input[name="name"]').value.trim();
    const email = document.querySelector('input[name="email"]').value.trim();
    const password = document.querySelector('input[name="password"]').value;
    const password_confirmation = document.querySelector('input[name="password_confirmation"]').value;

    // validasi sederhana
    if (!name || !email || !password || !password_confirmation) {
        Swal.fire({
            icon:'error',
            title:'Gagal',
            text:'Semua field wajib diisi'
        });
        return;
    }

    if (password !== password_confirmation) {
        alert("Password tidak sama");
        return;
    }

    fetch("http://127.0.0.1:8000/api/register", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json"
        },
        body: JSON.stringify({
            name,
            email,
            password,
            password_confirmation
        })
    })
    .then(async res => {
        const data = await res.json();
        console.log("RESPONSE:", data);

        if (res.ok) {
            Swal.fire({
    icon:'success',
    title:'Berhasil',
    text:'Registrasi berhasil',
    timer:1500,
    showConfirmButton:false
});
            document.querySelector("form").reset();
        } else {
            alert(data.message || "Register gagal");
        }
    })
    .catch(err => {
        console.log("ERROR:", err);
        alert("Gagal terhubung ke server");
    });
}
</script>
</body>
</html>