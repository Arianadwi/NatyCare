<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laporan Penjualan - NatyCare</title>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial;
}

body{
    background:#fff3f7;
    padding:25px;
    color:#333;
}

.container{
    max-width:1200px;
    margin:auto;
    background:white;
    border-radius:20px;
    padding:25px;
}

.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.logo-brand{
    width:220px;
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
    margin-left:18px;
    text-decoration:none;
    color:#000;
    background:none;
    border:0;
    font-size:16px;
    font-weight:700;
    cursor:pointer;
}

.nav a:hover,
.nav button:hover{
    color:#f06292;
}

.title{
    font-size:34px;
    color:#444;
    margin-bottom:20px;
}

.metrics{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:16px;
    margin-bottom:22px;
}

.metric{
    padding:20px;
    border-radius:15px;
    background:#fff0f5;
    border:1px solid #f5d4df;
}

.metric p{
    color:#777;
}

.metric h2{
    color:#f06292;
    margin-top:8px;
}

.card{
    border:1px solid #eee;
    border-radius:15px;
    padding:18px;
}

table{
    width:100%;
    border-collapse:collapse;
}

th,
td{
    padding:12px;
    border:1px solid #f0e4e8;
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

@media(max-width:900px){

    .navbar{
        position:relative;
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

    .metrics{
        grid-template-columns:1fr;
    }

    .table-wrap{
        overflow-x:auto;
    }

    table{
        min-width:850px;
    }

    .title{
        text-align:center;
        font-size:28px;
    }
}
</style>
</head>
<body>
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
    <h1 class="title">Laporan Penjualan</h1>
    <div class="metrics">
        <div class="metric"><p>Total Transaksi</p><h2 id="totalTransaksi">0</h2></div>
        <div class="metric"><p>Total Pendapatan</p><h2 id="totalPendapatan">Rp 0</h2></div>
        <div class="metric"><p>Produk Terjual</p><h2 id="produkTerjual">0</h2></div>
    </div>
    <div class="card table-wrap">
        <table>
            <thead><tr><th>Order</th><th>Pelanggan</th><th>Produk</th><th>Status</th><th>Total</th><th>Tanggal</th></tr></thead>
            <tbody id="salesRows"><tr><td colspan="6" class="empty">Memuat laporan...</td></tr></tbody>
        </table>
    </div>
</div>
<script>
const apiUrl = 'http://127.0.0.1:8000/api';
function toggleMenu(){
    document.getElementById('navMenu')
            .classList.toggle('active');
}
function headers(){
    const token = localStorage.getItem('token');
    if(!token){ window.location.href = '/login'; return null; }
    return {'Accept':'application/json','Authorization':'Bearer '+token};
}
function rupiah(value){ return 'Rp ' + Number(value || 0).toLocaleString('id-ID'); }
function tanggal(value){ return value ? new Date(value).toLocaleDateString('id-ID',{day:'2-digit',month:'long',year:'numeric',hour:'2-digit',minute:'2-digit'}) : '-'; }
function statusText(status){ return ({pending:'Pending',pending_payment:'Menunggu Pembayaran',paid:'Dibayar',processing:'Dikemas',shipped:'Dikirim',completed:'Selesai'})[status] || status || '-'; }
function logoutAdmin(){ localStorage.removeItem('token'); localStorage.removeItem('role'); localStorage.removeItem('user'); window.location.href='/login'; }
function loadReport(){
    const h = headers(); if(!h){ return; }
    fetch(`${apiUrl}/laporan`, {headers:h})
    .then(res => res.json())
    .then(data => {
        document.getElementById('totalTransaksi').innerText = data.total_transaksi || 0;
        document.getElementById('totalPendapatan').innerText = rupiah(data.total_penjualan);
        document.getElementById('produkTerjual').innerText = data.produk_terjual || 0;
        const rows = data.transaksi || [];
        document.getElementById('salesRows').innerHTML = rows.length ? rows.map(order => `
            <tr>
                <td>#${order.id}</td>
                <td>${order.nama_lengkap || order.user?.name || '-'}</td>
                <td>${(order.items || []).map(item => `${item.produk?.nama_produk || '-'} (${item.jumlah})`).join(', ') || '-'}</td>
                <td>${statusText(order.status)}</td>
                <td>${rupiah(order.total)}</td>
                <td>${tanggal(order.created_at)}</td>
            </tr>
        `).join('') : '<tr><td colspan="6" class="empty">Belum ada penjualan</td></tr>';
    });
}
loadReport();
</script>
</body>
</html>
