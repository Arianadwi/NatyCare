<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Profile - NatyCare</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial;
    background:#ffeef5;
}

/* CONTAINER */
.container{
    max-width:1200px;
    margin:auto;
    padding:40px;
}

/* PROFILE CARD */
.profile-card{
    background:white;
    border-radius:25px;
    padding:40px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

/* HEADER */
.profile-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:40px;
}

/* PROFILE INFO */
.profile-info{
    display:flex;
    align-items:center;
    gap:20px;
}

.profile-image{
    width:120px;
    height:120px;
    border-radius:50%;
    background:#ffd6e5;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:50px;
}

.profile-text h2{
    color:#b03060;
    font-size:28px;
    margin-bottom:8px;
}

.profile-text p{
    color:#444;
    font-size:16px;
}

/* BUTTON */
.edit-btn{
    background:#b03060;
    color:white;
    border:none;
    padding:14px 30px;
    border-radius:14px;
    cursor:pointer;
    transition:0.3s;
    font-size:16px;
}

.edit-btn:hover{
    background:#92274f;
}

/* MENU */
.menu-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:25px;
}

/* CARD */
.menu-card{
    background:#fff7fa;
    border-radius:20px;
    padding:35px 25px;
    text-align:center;
    cursor:pointer;
    transition:0.3s;
}

.menu-card:hover{
    transform:translateY(-5px);
    box-shadow:0 10px 20px rgba(0,0,0,0.08);
}

.menu-card .icon{
    font-size:50px;
    margin-bottom:15px;
}

.menu-card h3{
    color:#c03a6d;
    margin-bottom:10px;
    font-size:20px;
}

.menu-card p{
    color:#666;
    font-size:15px;
}

/* MODAL */
.modal-overlay{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.4);
    display:none;
    justify-content:center;
    align-items:center;
    z-index:999;
}

.modal-overlay.active{
    display:flex;
}

/* MODAL BOX */
.modal-box{
    background:white;
    width:500px;
    border-radius:25px;
    padding:35px;
    position:relative;
}

/* CLOSE */
.close-btn{
    position:absolute;
    top:15px;
    right:20px;
    font-size:30px;
    color:#ff5b8f;
    cursor:pointer;
}

/* TITLE */
.modal-box h2{
    text-align:center;
    color:#f06292;
    margin-bottom:25px;
    font-size:28px;
}

/* INPUT */
.modal-box input{
    width:100%;
    padding:14px;
    border:1px solid #ddd;
    border-radius:12px;
    margin-bottom:15px;
    font-size:15px;
}

/* SAVE BUTTON */
.save-btn{
    width:100%;
    background:#f06292;
    color:white;
    border:none;
    padding:14px;
    border-radius:12px;
    cursor:pointer;
    font-size:16px;
}

.save-btn:hover{
    background:#ec407a;
}

/* MODAL TEXT */
.modal-text{
    text-align:center;
    color:#777;
    margin-bottom:20px;
    font-size:14px;
}

/* TRACKING */
.tracking-box{
    margin-top:20px;
}

.tracking-item{
    display:flex;
    gap:18px;
    position:relative;
    margin-bottom:30px;
}

/* GARIS */
.tracking-item::before{
    content:'';
    position:absolute;
    left:16px;
    top:38px;
    width:3px;
    height:60px;
    background:#ffd0df;
}

.tracking-item:last-child::before{
    display:none;
}

/* ICON TRACKING */
.tracking-icon{
    width:35px;
    height:35px;
    border-radius:50%;
    background:#ffe3ed;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:16px;
    z-index:2;
}

/* TEXT TRACKING */
.tracking-content h3{
    color:#f06292;
    margin-bottom:5px;
    font-size:18px;
}

.tracking-content p{
    color:gray;
    font-size:14px;
}

</style>
</head>

<body>

<div class="container">

    <div class="profile-card">

        <!-- PROFILE HEADER -->
        <div class="profile-header">

            <div class="profile-info">

                <div class="profile-image">
                    👤
                </div>

                <div class="profile-text">
                    <h2>Septia Anggraini</h2>
                    <p>septia@gmail.com</p>
                </div>

            </div>

            <!-- BUTTON -->
            <button class="edit-btn" onclick="openEditModal()">
                Edit Profil
            </button>

        </div>

        <!-- MENU -->
        <div class="menu-grid">

            <!-- PESANAN -->
            <div class="menu-card" onclick="openOrderModal()">

                <div class="icon">
                    📦
                </div>

                <h3>
                    Pesanan Saya
                </h3>

                <p>
                    Lihat status pesanan skincare kamu
                </p>

            </div>

            <!-- ALAMAT -->
            <div class="menu-card" onclick="openAddressModal()">

                <div class="icon">
                    📍
                </div>

                <h3>
                    Alamat
                </h3>

                <p>
                    Tambahkan alamat pengiriman
                </p>

            </div>

            <!-- LOGOUT -->
            <div class="menu-card" onclick="logoutAlert()">

                <div class="icon">
                    🚪
                </div>

                <h3>
                    Logout
                </h3>

                <p>
                    Keluar dari akun NatyCare
                </p>

            </div>

        </div>

    </div>

</div>

<!-- MODAL EDIT -->
<div class="modal-overlay" id="editModal">

    <div class="modal-box">

        <span class="close-btn" onclick="closeEditModal()">
            ✕
        </span>

        <h2>Edit Profil</h2>

        <input type="text" placeholder="Nama">

        <input type="email" placeholder="Email">

        <input type="text" placeholder="No Handphone">

        <button class="save-btn">
            Simpan Perubahan
        </button>

    </div>

</div>

<!-- MODAL PESANAN -->
<div class="modal-overlay" id="orderModal">

    <div class="modal-box">

        <span class="close-btn" onclick="closeOrderModal()">
            ✕
        </span>

        <h2>Pesanan Saya</h2>

        <!-- INFO -->
        <p class="modal-text">
            Belum ada pesanan saat ini 💖
        </p>

        <!-- TRACKING -->
        <div class="tracking-box">

            <!-- STATUS 1 -->
            <div class="tracking-item">

                <div class="tracking-icon">
                    ✔
                </div>

                <div class="tracking-content">

                    <h3>
                        Pesanan Dibuat
                    </h3>

                    <p>
                        Pesanan akan muncul setelah checkout
                    </p>

                </div>

            </div>

            <!-- STATUS 2 -->
            <div class="tracking-item">

                <div class="tracking-icon">
                    💳
                </div>

                <div class="tracking-content">

                    <h3>
                        Pembayaran Berhasil
                    </h3>

                    <p>
                        Status pembayaran akan tampil di sini
                    </p>

                </div>

            </div>

            <!-- STATUS 3 -->
            <div class="tracking-item">

                <div class="tracking-icon">
                    📦
                </div>

                <div class="tracking-content">

                    <h3>
                        Sedang Dikemas
                    </h3>

                    <p>
                        Pesanan sedang diproses admin
                    </p>

                </div>

            </div>

            <!-- STATUS 4 -->
            <div class="tracking-item">

                <div class="tracking-icon">
                    🚚
                </div>

                <div class="tracking-content">

                    <h3>
                        Sedang Dikirim
                    </h3>

                    <p>
                        Pengiriman akan diperbarui otomatis
                    </p>

                </div>

            </div>

            <!-- STATUS 5 -->
            <div class="tracking-item">

                <div class="tracking-icon">
                    📍
                </div>

                <div class="tracking-content">

                    <h3>
                        Pesanan Diterima
                    </h3>

                    <p>
                        Status selesai akan tampil di sini
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- MODAL ALAMAT -->
<div class="modal-overlay" id="addressModal">

    <div class="modal-box">

        <span class="close-btn" onclick="closeAddressModal()">
            ✕
        </span>

        <h2>Alamat Saya</h2>

        <p class="modal-text">
            Belum ada alamat tersimpan 📍
        </p>

    </div>

</div>

<script>

function openEditModal(){
    document.getElementById("editModal").classList.add("active");
}

function closeEditModal(){
    document.getElementById("editModal").classList.remove("active");
}

function openOrderModal(){
    document.getElementById("orderModal").classList.add("active");
}

function closeOrderModal(){
    document.getElementById("orderModal").classList.remove("active");
}

function openAddressModal(){
    document.getElementById("addressModal").classList.add("active");
}

function closeAddressModal(){
    document.getElementById("addressModal").classList.remove("active");
}

function logoutAlert(){
    alert("Logout berhasil");
}

</script>
 <!-- update profile -->
</body>
</html>