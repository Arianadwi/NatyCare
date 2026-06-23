<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin NatyCare</title>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial,sans-serif;
    background:#ffeef5;
    color:#333;
}

.shell{
    max-width:1200px;
    margin:30px auto;
    background:white;
    border-radius:20px;
    padding:28px;
}

.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:28px;
}

.logo-brand{
    width:220px;
    height:auto;
}

.hamburger{
    display:none;
    background:none;
    border:none;
    font-size:24px;
    cursor:pointer;
}

.nav a,
.nav button{
    color:#000000;
    font-size:16px;
    font-weight:600;
    text-decoration:none;
    background:none;
    border:none;
    cursor:pointer;
    margin-left:18px;
}
.nav a:hover,
.nav button:hover{
    color:#f06292;
}

.title{
    color:#f06292;
    margin-bottom:24px;
    font-size:34px;
}

.card-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:18px;
    margin-bottom:28px;
}

.metric{
    padding:22px;
    border-radius:15px;
    color:white;
}

.metric h2{
    font-size:36px;
    margin-top:8px;
}

.pink{
    background:#ff8fb1;
}

.green{
    background:#8bc98b;
}

.orange{
    background:#ffbf80;
}

.softpink{
    background:#ffb6c1;
}

.section{
    border:1px solid #eee;
    border-radius:15px;
    padding:20px;
    margin-top:20px;
}

.section h2{
    color:#555;
    margin-bottom:16px;
}

.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
    gap:20px;
}

.product{
    border:1px solid #eee;
    border-radius:15px;
    overflow:hidden;
    background:white;
    display:flex;
    flex-direction:column;
}

.product img{
    width:100%;
    height:320px;
    object-fit:contain;
    object-position:center;
    padding:10px;
    background:#fff7fa;
    border-bottom:1px solid #f7e4ec;
}

.product div{
    padding:14px;
}

.price{
    color:#f06292;
    font-weight:bold;
    font-size:20px;
    margin:8px 0;
}

table{
    width:100%;
    border-collapse:collapse;
}

th,
td{
    padding:12px;
    border:1px solid #f2dbe4;
    text-align:left;
    font-size:14px;
}

th{
    background:#fff2f7;
}

.empty{
    padding:18px;
    text-align:center;
    color:#777;
    background:#fff7fa;
    border-radius:12px;
}

.table-wrap{
    overflow-x:auto;
}

@media(max-width:992px){

    .card-grid{
        grid-template-columns:repeat(2,1fr);
    }

    .grid{
        grid-template-columns:repeat(2,1fr);
    }

    .product img{
        height:260px;
    }
}

@media(max-width:768px){

    .shell{
        margin:0;
        border-radius:0;
        padding:16px;
    }

    .title{
        font-size:28px;
        text-align:center;
    }

    .card-grid{
        grid-template-columns:1fr;
    }

    .grid{
        grid-template-columns:1fr;
    }

    .product img{
        height:220px;
    }

    .navbar{
    position:relative;
    flex-direction:row;
    justify-content:space-between;
    align-items:center;
}

.logo-brand{
    width:150px;
}

.hamburger{
    display:block;
}

.nav{
    display:none;
    position:absolute;
    top:60px;
    right:0;
    width:200px;
    background:white;
    border-radius:12px;
    box-shadow:0 4px 12px rgba(0,0,0,.1);
    padding:15px;
    flex-direction:column;
    gap:12px;
    z-index:999;
}

.nav.active{
    display:flex;
}

.nav a,
.nav button{
    margin:0;
    text-align:left;
}
}

</style>
</head>
<body>
<div class="shell">
    <div class="container">
    <div class="navbar">

    <img src="{{ asset('images/LogoNatycare.png') }}"
         class="logo-brand"
         alt="NatyCare">

    <button class="hamburger"
            onclick="toggleMenu()">
        ☰
    </button>

    <div class="nav" id="navMenu">
        <a href="/admin">Dashboard</a>
        <a href="/adminproduk">Produk</a>
        <a href="/transaksiadmin">Pesanan</a>
        <a href="/laporanadmin">Laporan</a>
        <button onclick="logoutAdmin()">Keluar</button>
    </div>

</div>
</div>

    <h1 class="title">Selamat Datang Admin NatyCare</h1>

    <div class="card-grid">
        <div class="metric pink"><p>Total Transaksi Hari Ini</p><h2 id="todayOrders">0</h2></div>
        <div class="metric orange"><p>Total Pesanan</p><h2 id="totalOrders">0</h2></div>
        <div class="metric green"><p>Produk Stok Habis</p><h2 id="outStock">0</h2></div>
        <div class="metric softpink"><p>Antrian Pesanan</p><h2 id="queueOrders">0</h2></div>
    </div>

    <div class="section">
        <h2>Pesanan Terbaru</h2>
        <div id="recentOrders" class="empty">Memuat pesanan...</div>
    </div>

    <div class="section">
        <h2>Produk Terbaru</h2>
        <div id="recentProducts" class="grid"></div>
    </div>
</div>

<script>
const apiUrl = 'http://127.0.0.1:8000/api';
function toggleMenu(){
    document
        .getElementById('navMenu')
        .classList.toggle('active');
}
function headers(){
    const token = localStorage.getItem('token');
    if(!token){ window.location.href = '/login'; return null; }
    return {'Accept':'application/json','Authorization':'Bearer '+token};
}
function rupiah(value){ return 'Rp ' + Number(value || 0).toLocaleString('id-ID'); }
function tanggal(value){ return value ? new Date(value).toLocaleDateString('id-ID',{day:'2-digit',month:'long',year:'numeric',hour:'2-digit',minute:'2-digit'}) : '-'; }
function statusText(status){
    return ({pending:'Pending',pending_payment:'Menunggu Pembayaran',paid:'Dibayar',processing:'Dikemas',shipped:'Dikirim',completed:'Selesai'})[status] || status || '-';
}
function productImage(product){
    const gambar = product.gambar_url || product.gambar;
    if(!gambar){ return '/images/LogoN.png'; }
    const source = String(gambar);
    if(source.startsWith('http') || source.startsWith('/images/')){ return source; }
    const fileName = source.split('/').filter(Boolean).pop();
    return `/images/${fileName}`;
}
function imageFallback(img){ img.onerror = null; img.src = '/images/LogoN.png'; }
function logoutAdmin(){
    localStorage.removeItem('token');
    localStorage.removeItem('role');
    localStorage.removeItem('user');
    window.location.href = '/login';
}
function loadDashboard(){
    const h = headers(); if(!h){ return; }
    fetch(`${apiUrl}/dashboard`, {headers:h})
    .then(res => res.json())
    .then(data => {
        document.getElementById('todayOrders').innerText = data.total_transaksi_hari_ini || 0;
        document.getElementById('totalOrders').innerText = data.total_order || 0;
        document.getElementById('outStock').innerText = data.produk_stok_habis || 0;
        document.getElementById('queueOrders').innerText = data.antrian_pesanan || 0;
        document.getElementById('recentOrders').innerHTML = data.pesanan_terbaru?.length ? `
        <div class="table-wrap">
            <table>
                <thead><tr><th>Order</th><th>Pelanggan</th><th>Total</th><th>Status</th><th>Tanggal</th></tr></thead>
                <tbody>${data.pesanan_terbaru.map(order => `
                    <tr>
                        <td>#${order.id}</td>
                        <td>${order.nama_lengkap || order.user?.name || '-'}</td>
                        <td>${rupiah(order.total)}</td>
                        <td>${statusText(order.status)}</td>
                        <td>${tanggal(order.created_at)}</td>
                    </tr>
                `).join('')}</tbody>
            </table>` : '<div class="empty">Belum ada pesanan</div>';
        document.getElementById('recentProducts').innerHTML = data.produk_terbaru?.length ? data.produk_terbaru.map(product => `
            <div class="product">
                <img src="${productImage(product)}" alt="${product.nama_produk}" onerror="imageFallback(this)">
                <div>
                    <h3>${product.nama_produk}</h3>
                    <p class="price">${rupiah(product.harga)}</p>
                    <p>Stok: ${product.stok}</p>
                </div>
            </div>
        `).join('') : '<div class="empty">Belum ada produk</div>';
    });
}
loadDashboard();
</script>
</body>
</html>
