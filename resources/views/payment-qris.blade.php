<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pembayaran QRIS - NatyCare</title>
<style>
*{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{font-family:Arial,sans-serif;background:#ffeef5;color:#333}
.container{max-width:1300px;margin:auto;background:white;min-height:100vh;display:flex;flex-direction:column}

/* NAVBAR */
.navbar{display:flex;justify-content:space-between;align-items:center;padding:16px 42px;border-bottom:1px solid #f6dbe5;gap:24px}
.logo-brand{width:170px;height:auto;object-fit:contain;display:block}
.nav-right{display:flex;align-items:center;gap:22px}
.nav-menu{display:flex;align-items:center;gap:24px}
.nav-menu a{text-decoration:none;color:#555;font-size:15px;font-weight:600}
.nav-menu a:hover{color:#f06292}
.profile-icon{width:40px;height:40px;object-fit:contain;cursor:pointer;transition:.2s}
.profile-icon:hover{transform:scale(1.06)}
.hamburger{display:none;background:#f06292;color:white;border:0;border-radius:10px;padding:10px 12px;font-size:18px;cursor:pointer}

/* CONTENT */
.content{flex:1;display:flex;align-items:center;justify-content:center;padding:40px 20px}
.payment-box{background:#fffafc;border:1px solid #f5dce6;border-radius:20px;padding:40px;max-width:500px;width:100%;text-align:center;box-shadow:0 10px 30px rgba(240,98,146,.1)}
.payment-box h2{color:#f06292;font-size:28px;margin-bottom:8px;font-weight:700}
.payment-box p{color:#666;font-size:14px;margin-bottom:24px}

.order-info{background:white;border:1px solid #f5dce6;border-radius:14px;padding:20px;margin-bottom:24px;text-align:left}
.info-row{display:flex;justify-content:space-between;padding:8px 0;border-bottom:1px solid #f8bbd0;font-size:14px}
.info-row:last-child{border-bottom:none}
.info-row span:first-child{color:#999;font-weight:600}
.info-row span:last-child{color:#333;font-weight:600}

.qr-section{margin:28px 0;padding:28px;background:white;border-radius:14px;border:2px dashed #f8bbd0}
.qr-section p{color:#999;font-size:13px;margin-bottom:12px}
.qr-section img{max-width:100%;height:auto;border-radius:10px}

.qr-instructions{background:linear-gradient(135deg,#fff0f5 0%,#fff7fa 100%);border-left:4px solid #f06292;border-radius:10px;padding:16px;margin-bottom:24px;text-align:left}
.qr-instructions h4{color:#f06292;font-size:14px;margin-bottom:10px;font-weight:700}
.qr-instructions ul{margin-left:20px;font-size:13px;color:#666;line-height:1.7}
.qr-instructions li{margin-bottom:6px}

.qris-image{
    width:280px;
    max-width:100%;
    height:auto;
    display:block;
    margin:auto;
    object-fit:contain;
}

.confirm-btn{width:100%;background:#f06292;color:white;padding:14px;border:none;border-radius:10px;font-weight:700;font-size:16px;cursor:pointer;transition:.2s;margin-bottom:12px}
.confirm-btn:hover{background:#ec407a}
.back-btn{width:100%;background:white;color:#f06292;padding:12px;border:2px solid #f06292;border-radius:10px;font-weight:600;font-size:14px;cursor:pointer;transition:.2s}
.back-btn:hover{background:#fff0f5}

.status-message{margin-top:20px;padding:12px;border-radius:10px;text-align:center;font-size:13px;display:none}
.status-message.success{background:#e8fff0;color:#26733d;border:1px solid #a8e6c1;display:block}
.status-message.error{background:#ffe8e8;color:#c3272a;border:1px solid #f5a8a8;display:block}

@media(max-width:900px){
    .navbar{padding:14px 24px}.hamburger{display:block}.nav-right{gap:14px}
    .nav-menu{display:none;position:absolute;top:68px;left:24px;right:24px;background:white;border:1px solid #f5dce6;border-radius:14px;padding:14px;box-shadow:0 12px 26px rgba(0,0,0,.08);z-index:5;flex-direction:column;align-items:stretch;gap:0}
    .nav-menu.active{display:flex}.nav-menu a{padding:12px;border-radius:10px}.nav-menu a:hover{background:#fff3f8}
    .content{padding:24px 16px}.payment-box{padding:24px}
}

@media(max-width:600px){
    .logo-brand{width:135px}.navbar{padding:12px 16px}.nav-menu{top:62px;left:16px;right:16px}
    .content{padding:16px}.payment-box{padding:20px}.payment-box h2{font-size:20px}
    .qr-section{padding:16px;margin:16px 0}
}
</style>
</head>
<body>
<div class="container">
    <!-- NAVBAR -->
    <div class="navbar">
        <a href="/katalog" class="logo">
            <img src="{{ asset('images/LogoN.png') }}" class="logo-brand" alt="NatyCare">
        </a>
        <div class="nav-right">
            <button class="hamburger" type="button" onclick="toggleMenu()">☰</button>
            <div class="nav-menu" id="navMenu">
                <a href="/katalog">Beranda</a>
                <a href="/keranjang">Keranjang</a>
                <a href="/katalog#kontak">Kontak</a>
            </div>
            <a href="/profile">
                <img src="{{ asset('images/profil-admin.png') }}" class="profile-icon" alt="Profile">
            </a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <div class="payment-box">
            <h2>Pembayaran QRIS</h2>
            <p>Scan QR code dengan aplikasi e-wallet atau mobile banking</p>

            <div id="payment-container">
                <p style="color:#999;font-size:14px;margin:40px 0;">Memuat kode QRIS...</p>
            </div>
        </div>
    </div>
</div>

<script>
const orderId = "{{ $id }}";
const apiUrl = 'http://127.0.0.1:8000/api';

function toggleMenu(){
    document.getElementById('navMenu').classList.toggle('active');
}

function getAuthHeaders(){
    const token = localStorage.getItem('token');
    if(!token){
        alert('Silakan login terlebih dahulu');
        window.location.href = '/login';
        return null;
    }
    return {
        'Content-Type':'application/json',
        'Accept':'application/json',
        'Authorization':'Bearer ' + token
    };
}

function formatRupiah(value){
    return 'Rp ' + Number(value).toLocaleString('id-ID');
}

function loadOrder(){
    const headers = getAuthHeaders();
    if(!headers) return;

    fetch(`${apiUrl}/orders/${orderId}`, { headers })
        .then(async response => {
            if(response.status === 401){
                localStorage.removeItem('token');
                alert('Sesi login habis. Silakan login lagi');
                window.location.href = '/login';
                return null;
            }
            const data = await response.json();
            if(!response.ok){
                alert(data.message || 'Data pesanan tidak ditemukan');
                window.location.href = '/checkout';
                return null;
            }
            return data;
        })
        .then(order => {
            if(!order) return;

            document.getElementById('payment-container').innerHTML = `
                <div class="order-info">
                    <div class="info-row">
                        <span>Nomor Pesanan</span>
                        <span>#${order.id}</span>
                    </div>
                    <div class="info-row">
                        <span>Total Pembayaran</span>
                        <span>${formatRupiah(order.total)}</span>
                    </div>
                    <div class="info-row">
                        <span>Status</span>
                        <span style="color:#f06292;">${order.payment_status || 'Menunggu Pembayaran'}</span>
                    </div>
                </div>

                <div class="qr-instructions">
                    <h4>Cara Pembayaran:</h4>
                    <ul>
                        <li>Buka aplikasi e-wallet atau mobile banking Anda</li>
                        <li>Pilih fitur "Scan QRIS" atau "Bayar Pakai QRIS"</li>
                        <li>Arahkan kamera ke QR code di bawah</li>
                        <li>Verifikasi jumlah pembayaran</li>
                        <li>Selesaikan pembayaran</li>
                    </ul>
                </div>

                <div class="qr-section">
                    <p>Kode QRIS NatyCare</p>
                    <img src="{{ asset('images/qris.jpeg') }}" alt="QRIS NatyCare" class="qris-image" onerror="this.src='{{ asset('images/LogoN.png') }}'">
                </div>

                <button class="confirm-btn" onclick="konfirmasiPembayaran()">Saya Sudah Membayar</button>

                <div id="statusMsg" class="status-message"></div>
            `;
        })
        .catch(error => {
            console.log(error);
            document.getElementById('payment-container').innerHTML = '<p style="color:#c3272a;">Terjadi kesalahan. Silakan coba lagi.</p>';
        });
}

function konfirmasiPembayaran(){
    const headers = getAuthHeaders();
    if(!headers) return;

    const btn = event.target;
    btn.disabled = true;
    btn.innerText = 'Memproses...';

    fetch(`${apiUrl}/payment/${orderId}`, {
        method: 'PUT',
        headers: headers
    })
    .then(async response => {
        const data = await response.json();
        if(!response.ok){
            showStatus(data.message || 'Konfirmasi pembayaran gagal', 'error');
            btn.disabled = false;
            btn.innerText = 'Saya Sudah Membayar';
            return null;
        }
        return data;
    })
    .then(data => {
        if(!data) return;
        showStatus('Pembayaran berhasil dikonfirmasi!', 'success');
        setTimeout(() => {
            window.location.href = `/orders/${orderId}`;
        }, 2000);
    })
    .catch(error => {
        console.log(error);
        showStatus('Terjadi kesalahan. Silakan coba lagi.', 'error');
        btn.disabled = false;
        btn.innerText = 'Saya Sudah Membayar';
    });
}

function showStatus(message, type){
    const statusMsg = document.getElementById('statusMsg');
    statusMsg.textContent = message;
    statusMsg.className = `status-message ${type}`;
}

loadOrder();
</script>
</body>
</html>
