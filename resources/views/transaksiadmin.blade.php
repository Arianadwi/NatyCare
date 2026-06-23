<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Pesanan - NatyCare</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:Arial}
body{background:#ffe5ef;padding:25px;color:#333}.container{max-width:1200px;margin:auto;background:white;border-radius:20px;padding:25px}
.navbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:25px}
.logo-brand{width:220px}
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
.title{font-size:34px;color:#444;margin-bottom:20px}.card{border:1px solid #f0e4e8;border-radius:15px;padding:18px;background:#fff}
table{width:100%;border-collapse:collapse}th,td{padding:12px;border:1px solid #f0e4e8;text-align:left;font-size:14px}th{background:#fff2f7}
select{padding:8px;border:1px solid #ef6c9b;border-radius:8px;background:white}.btn{border:0;border-radius:9px;padding:9px 12px;background:#ef6c9b;color:white;cursor:pointer}
.btn.light{background:#f5f5f5;color:#555}.empty{padding:18px;text-align:center;color:#777;background:#fff7fa;border-radius:12px}
.modal{position:fixed;inset:0;background:rgba(0,0,0,.35);display:none;align-items:center;justify-content:center;padding:20px;z-index:10}.modal.active{display:flex}
.modal-box{background:white;border-radius:18px;padding:24px;max-width:850px;width:100%;max-height:90vh;overflow:auto}.modal-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}
.detail-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:18px}.detail-row{padding:10px;border:1px solid #f4d6e0;border-radius:10px}.detail-row span{display:block;color:#777;font-size:13px;margin-bottom:4px}.detail-row b{color:#333}
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

    table{
        min-width:900px;
    }

    .table-wrap{
        overflow-x:auto;
    }

    .detail-grid{
        grid-template-columns:1fr;
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

    <h1 class="title">Kelola Pesanan</h1>
    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Nomor Order</th><th>Nama Pelanggan</th><th>Pembayaran</th><th>Pengiriman</th>
                    <th>Total</th><th>Status</th><th>Tanggal</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody id="orderRows"><tr><td colspan="8" class="empty">Memuat pesanan...</td></tr></tbody>
        </table>
    </div>
</div>
<div class="modal" id="detailModal">
    <div class="modal-box">
        <div class="modal-head">
            <h2>Detail Transaksi</h2>
            <button class="btn light" onclick="closeDetail()">Tutup</button>
        </div>
        <div id="detailContent"></div>
    </div>
</div>
<script>
const apiUrl = 'http://127.0.0.1:8000/api';
let orders = [];

function toggleMenu(){
    document.getElementById('navMenu')
            .classList.toggle('active');
}
function headers(){
    const token = localStorage.getItem('token');
    if(!token){ window.location.href = '/login'; return null; }
    return {'Content-Type':'application/json','Accept':'application/json','Authorization':'Bearer '+token};
}
function rupiah(value){ return 'Rp ' + Number(value || 0).toLocaleString('id-ID'); }
function tanggal(value){ return value ? new Date(value).toLocaleDateString('id-ID',{day:'2-digit',month:'long',year:'numeric',hour:'2-digit',minute:'2-digit'}) : '-'; }
function statusText(status){ return ({pending:'Pending',pending_payment:'Menunggu Pembayaran',paid:'Dibayar',processing:'Dikemas',shipped:'Dikirim',completed:'Selesai'})[status] || status || '-'; }
function logoutAdmin(){ localStorage.removeItem('token'); localStorage.removeItem('role'); localStorage.removeItem('user'); window.location.href='/login'; }
function loadOrders(){
    const h = headers(); if(!h){ return; }
    fetch(`${apiUrl}/orders`, {headers:h})
    .then(res => res.json())
    .then(data => { orders = Array.isArray(data) ? data : []; renderOrders(); });
}
function renderOrders(){
    document.getElementById('orderRows').innerHTML = orders.length ? orders.map(order => `
        <tr>
            <td>#${order.id}</td>
            <td>${order.nama_lengkap || order.user?.name || '-'}</td>
            <td>${order.metode_pembayaran || '-'}</td>
            <td>${order.metode_pengiriman || '-'}</td>
            <td>${rupiah(order.total)}</td>
            <td>
                <select onchange="updateStatus(${order.id}, this.value)" ${['pending_payment','completed'].includes(order.status) ? 'disabled' : ''}>
                    ${['pending_payment','pending','paid','processing','shipped','completed'].map(status => `
                        <option value="${status}" ${order.status === status ? 'selected' : ''}>${statusText(status)}</option>
                    `).join('')}
                </select>
            </td>
            <td>${tanggal(order.created_at)}</td>
            <td><button class="btn" onclick="showDetail(${order.id})">Detail</button></td>
        </tr>
    `).join('') : '<tr><td colspan="8" class="empty">Belum ada pesanan</td></tr>';
}
function updateStatus(id, status){
    const h = headers(); if(!h){ return; }
    fetch(`${apiUrl}/orders/${id}/status`, {method:'PUT', headers:h, body:JSON.stringify({status})})
    .then(async res => {
        const data = await res.json();
        if(!res.ok){ alert(data.message || 'Status gagal diperbarui'); return; }
        loadOrders();
    });
}
function showDetail(id){
    const order = orders.find(item => Number(item.id) === Number(id));
    if(!order){ return; }
    const items = order.items || [];
    document.getElementById('detailContent').innerHTML = `
        <div class="detail-grid">
            <div class="detail-row"><span>Nomor Order</span><b>#${order.id}</b></div>
            <div class="detail-row"><span>Nama Pelanggan</span><b>${order.nama_lengkap || order.user?.name || '-'}</b></div>
            <div class="detail-row"><span>Metode Pembayaran</span><b>${order.metode_pembayaran || '-'}</b></div>
            <div class="detail-row"><span>Metode Pengiriman</span><b>${order.metode_pengiriman || '-'}</b></div>
            <div class="detail-row"><span>Total Pembayaran</span><b>${rupiah(order.total)}</b></div>
            <div class="detail-row"><span>Status Pesanan</span><b>${statusText(order.status)}</b></div>
            <div class="detail-row"><span>Tanggal Order</span><b>${tanggal(order.created_at)}</b></div>
            <div class="detail-row"><span>Ongkir</span><b>${rupiah(order.ongkir)}</b></div>
        </div>
        <table>
            <thead><tr><th>Produk</th><th>Jumlah</th><th>Harga Produk</th><th>Subtotal</th></tr></thead>
            <tbody>${items.map(item => `
                <tr>
                    <td>${item.produk?.nama_produk || '-'}</td>
                    <td>${item.jumlah}</td>
                    <td>${rupiah(item.harga)}</td>
                    <td>${rupiah(Number(item.harga) * Number(item.jumlah))}</td>
                </tr>
            `).join('')}</tbody>
        </table>
        <div class="detail-grid" style="margin-top:18px;">
            <div class="detail-row"><span>Subtotal Produk</span><b>${rupiah(order.subtotal)}</b></div>
            <div class="detail-row"><span>Total Akhir</span><b>${rupiah(order.total)}</b></div>
        </div>
    `;
    document.getElementById('detailModal').classList.add('active');
}
function closeDetail(){ document.getElementById('detailModal').classList.remove('active'); }
loadOrders();
</script>
</body>
</html>
