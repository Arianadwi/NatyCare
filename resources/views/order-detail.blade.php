<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Pesanan - NatyCare</title>
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
.content{flex:1;padding:36px 42px}
.order-header{text-align:center;margin-bottom:36px}
.order-header h2{color:#b03060;font-size:28px;margin-bottom:8px;font-weight:700}
.order-header p{color:#666;font-size:14px}

.order-grid{display:grid;grid-template-columns:2fr 1fr;gap:28px}

/* MAIN CONTENT */
.order-items{background:#fffafc;border:1px solid #f5dce6;border-radius:14px;padding:24px}
.order-items h3{color:#f06292;font-size:18px;margin-bottom:20px;font-weight:700}

.item-card{display:flex;gap:16px;padding:16px;background:white;border-radius:12px;margin-bottom:12px;border:1px solid #f5dce6}
.item-image{width:100px;height:100px;object-fit:cover;border-radius:10px;flex-shrink:0;background:#fff}
.item-details{flex:1}
.item-name{font-weight:700;font-size:15px;margin-bottom:8px}
.item-meta{font-size:13px;color:#666;line-height:1.6;margin-bottom:8px}
.item-price{color:#f06292;font-weight:700;font-size:15px}

/* SIDEBAR */
.order-summary{background:#fff0f5;border-radius:14px;padding:24px;height:fit-content;position:sticky;top:20px}
.summary-title{color:#f06292;font-size:16px;margin-bottom:20px;font-weight:700}

.summary-section{margin-bottom:20px;padding-bottom:20px;border-bottom:1px solid #f8bbd0}
.summary-section:last-child{border-bottom:none}
.section-label{font-size:12px;color:#999;text-transform:uppercase;letter-spacing:.5px;margin-bottom:8px;font-weight:600}
.section-value{font-size:14px;color:#333;line-height:1.6}
.section-value b{color:#f06292;font-weight:700}

.status-badge{display:inline-block;padding:6px 12px;border-radius:20px;font-size:12px;font-weight:600}
.status-pending{background:#fff0e6;color:#cc7700}
.status-processing{background:#e3f2fd;color:#1565c0}
.status-shipped{background:#f3e5f5;color:#6a1b9a}
.status-completed{background:#e8f5e9;color:#2e7d32}
.status-paid{background:#e8f5e9;color:#2e7d32}

.action-buttons{margin-top:20px;display:flex;flex-direction:column;gap:10px}
.btn{padding:12px;border:none;border-radius:10px;font-weight:600;font-size:14px;cursor:pointer;transition:.2s;width:100%;text-decoration:none;text-align:center}
.btn-primary{background:#f06292;color:white}
.btn-primary:hover{background:#ec407a}
.btn-secondary{background:white;color:#f06292;border:2px solid #f06292}
.btn-secondary:hover{background:#fff0f5}

.timeline{margin-top:20px;padding-top:20px;border-top:1px solid #f8bbd0}
.timeline-title{font-size:12px;color:#999;text-transform:uppercase;letter-spacing:.5px;margin-bottom:12px;font-weight:600}
.timeline-item{display:flex;gap:12px;margin-bottom:12px;position:relative;padding-left:20px}
.timeline-item::before{content:'';position:absolute;left:4px;top:6px;width:10px;height:10px;border-radius:50%;background:#f8bbd0;border:2px solid white}
.timeline-item.done::before{background:#f06292}
.timeline-text{font-size:13px;color:#666}
.timeline-text strong{color:#333}

@media(max-width:900px){
    .navbar{padding:14px 24px}.hamburger{display:block}.nav-right{gap:14px}
    .nav-menu{display:none;position:absolute;top:68px;left:24px;right:24px;background:white;border:1px solid #f5dce6;border-radius:14px;padding:14px;box-shadow:0 12px 26px rgba(0,0,0,.08);z-index:5;flex-direction:column;align-items:stretch;gap:0}
    .nav-menu.active{display:flex}.nav-menu a{padding:12px;border-radius:10px}.nav-menu a:hover{background:#fff3f8}
    .content{padding:24px}.order-grid{grid-template-columns:1fr;gap:20px}.order-summary{position:relative;top:auto}
}

@media(max-width:600px){
    .logo-brand{width:135px}.navbar{padding:12px 16px}.nav-menu{top:62px;left:16px;right:16px}
    .content{padding:16px}.order-header h2{font-size:20px}
    .order-items{padding:16px}.item-card{flex-direction:column}.item-image{width:100%;height:150px}
    .order-summary{padding:16px}.action-buttons{display:flex;flex-direction:column}
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
        <div class="order-header">
            <h2>Detail Pesanan</h2>
            <p>Pantau status pesanan Anda dengan detail lengkap</p>
        </div>

        <div id="order-container">
            <div style="text-align:center;padding:60px 20px;color:#999;">
                <p>Memuat data pesanan...</p>
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
    return 'Rp ' + Number(value || 0).toLocaleString('id-ID');
}

function formatDate(dateString){
    if(!dateString) return '-';
    return new Date(dateString).toLocaleDateString('id-ID', {
        day:'2-digit',
        month:'long',
        year:'numeric',
        hour:'2-digit',
        minute:'2-digit'
    });
}

function productImage(gambar){
    if(!gambar) return '/images/LogoN.png';
    const fileName = String(gambar).split('/').filter(Boolean).pop();
    return `/images/${fileName}`;
}

function imageFallback(image){
    image.onerror = null;
    image.src = '/images/LogoN.png';
}

function getStatusBadge(status){
    const badges = {
        'pending_payment': {class: 'status-pending', text: 'Menunggu Pembayaran'},
        'paid': {class: 'status-paid', text: 'Pembayaran Berhasil'},
        'processing': {class: 'status-processing', text: 'Sedang Dikemas'},
        'shipped': {class: 'status-shipped', text: 'Sedang Dikirim'},
        'completed': {class: 'status-completed', text: 'Pesanan Diterima'}
    };
    const badge = badges[status] || {class: 'status-pending', text: status || 'Tidak Diketahui'};
    return `<span class="status-badge ${badge.class}">${badge.text}</span>`;
}

function getTimeline(status){
    const steps = [
        {name: 'Pesanan Dibuat', key: 'created'},
        {name: 'Pembayaran Berhasil', key: 'paid'},
        {name: 'Sedang Dikemas', key: 'processing'},
        {name: 'Sedang Dikirim', key: 'shipped'},
        {name: 'Pesanan Diterima', key: 'completed'}
    ];
    
    const statusMap = {'pending_payment': 0, 'paid': 1, 'processing': 2, 'shipped': 3, 'completed': 4};
    const currentStep = statusMap[status] || 0;
    
    return steps.map((step, index) => `
        <div class="timeline-item ${index <= currentStep ? 'done' : ''}">
            <div class="timeline-text">
                <strong>${step.name}</strong>
            </div>
        </div>
    `).join('');
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
                window.location.href = '/katalog';
                return null;
            }
            return data;
        })
        .then(order => {
            if(!order) return;

            const itemsHtml = (order.items || []).map(item => `
                <div class="item-card">
                    <img src="${productImage(item.produk.gambar)}" class="item-image" onerror="imageFallback(this)" alt="${item.produk.nama_produk}">
                    <div class="item-details">
                        <div class="item-name">${item.produk.nama_produk}</div>
                        <div class="item-meta">
                            Jumlah: <strong>${item.jumlah}</strong><br>
                            Harga Satuan: <strong>${formatRupiah(item.harga)}</strong><br>
                            Subtotal: <strong>${formatRupiah(item.harga * item.jumlah)}</strong>
                        </div>
                    </div>
                </div>
            `).join('');

            const receivedButton = (order.metode_pembayaran === 'COD' && order.status === 'shipped')
                ? '<button class="btn btn-primary" onclick="markAsReceived()">Barang Sudah Diterima</button>'
                : '';

            document.getElementById('order-container').innerHTML = `
                <div class="order-grid">
                    <div>
                        <div class="order-items">
                            <h3>Produk Pesanan</h3>
                            ${itemsHtml || '<p style="color:#999;text-align:center;padding:20px;">Tidak ada produk</p>'}
                        </div>
                    </div>

                    <div>
                        <div class="order-summary">
                            <div class="summary-title">Ringkasan Pesanan</div>

                            <div class="summary-section">
                                <div class="section-label">Nomor Pesanan</div>
                                <div class="section-value">#${order.id}</div>
                            </div>

                            <div class="summary-section">
                                <div class="section-label">Status Pesanan</div>
                                <div class="section-value">${getStatusBadge(order.status)}</div>
                            </div>

                            <div class="summary-section">
                                <div class="section-label">Informasi Pengiriman</div>
                                <div class="section-value">
                                    <b>${order.nama_lengkap || '-'}</b><br>
                                    ${order.no_whatsapp || '-'}<br>
                                    ${order.alamat_lengkap || '-'}<br>
                                    ${order.kecamatan || ''} ${order.kota || ''}<br>
                                    ${order.provinsi || ''} ${order.kode_pos || ''}
                                </div>
                            </div>

                            <div class="summary-section">
                                <div class="section-label">Metode Pengiriman</div>
                                <div class="section-value">${order.metode_pengiriman || '-'}</div>
                            </div>

                            <div class="summary-section">
                                <div class="section-label">Metode Pembayaran</div>
                                <div class="section-value">${order.metode_pembayaran || '-'}</div>
                            </div>

                            <div class="summary-section">
                                <div class="section-label">Total Pembayaran</div>
                                <div class="section-value">
                                    Subtotal: Rp ${Number(order.subtotal || 0).toLocaleString('id-ID')}<br>
                                    Ongkir: ${formatRupiah(order.ongkir || 0)}<br>
                                    <b style="color:#f06292;font-size:16px;">${formatRupiah(order.total || 0)}</b>
                                </div>
                            </div>

                            <div class="timeline">
                                <div class="timeline-title">Status Pengiriman</div>
                                ${getTimeline(order.status)}
                            </div>

                            <div class="action-buttons">
                                ${receivedButton}
                                <button class="btn btn-secondary" onclick="window.location.href='/profile'">Lihat Pesanan Lain</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        })
        .catch(error => {
            console.log(error);
            document.getElementById('order-container').innerHTML = '<p style="color:#c3272a;text-align:center;padding:40px;">Terjadi kesalahan saat memuat data pesanan.</p>';
        });
}

function markAsReceived(){
    if(!confirm('Konfirmasi barang sudah diterima?')) return;

    const headers = getAuthHeaders();
    if(!headers) return;

    const btn = event.target;
    btn.disabled = true;
    btn.innerText = 'Memproses...';

    fetch(`${apiUrl}/orders/${orderId}/complete`, {
        method: 'PUT',
        headers: headers
    })
    .then(async response => {
        const data = await response.json();
        if(!response.ok){
            alert(data.message || 'Gagal mengupdate status');
            btn.disabled = false;
            btn.innerText = 'Barang Sudah Diterima';
            return null;
        }
        return data;
    })
    .then(data => {
        if(!data) return;
        alert('Status pesanan berhasil diperbarui');
        loadOrder();
    })
    .catch(error => {
        console.log(error);
        alert('Terjadi kesalahan');
        btn.disabled = false;
        btn.innerText = 'Barang Sudah Diterima';
    });
}

loadOrder();
</script>
</body>
</html>
