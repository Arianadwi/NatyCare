<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile - NatyCare</title>

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
.profile-card{background:white;border-radius:25px;padding:40px;box-shadow:0 10px 25px rgba(0,0,0,0.08)}
.profile-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:40px;gap:20px}
.profile-info{display:flex;align-items:center;gap:20px}
.profile-image{width:120px;height:120px;border-radius:50%;background:#ffd6e5;display:flex;align-items:center;justify-content:center;font-size:48px;color:#b03060;font-weight:bold}
.profile-text h2{color:#b03060;font-size:28px;margin-bottom:8px}
.profile-text p{color:#444;font-size:16px}
.edit-btn,.save-btn,.small-btn{background:#b03060;color:white;border:none;padding:14px 30px;border-radius:14px;cursor:pointer;font-size:16px}
.edit-btn:hover,.save-btn:hover,.small-btn:hover{background:#92274f}
.menu-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:25px}
.menu-card{background:#fff7fa;border-radius:20px;padding:35px 25px;text-align:center;cursor:pointer;transition:0.3s}
.menu-card:hover{transform:translateY(-5px);box-shadow:0 10px 20px rgba(240,98,146,.15);background:#fff0f5}
.menu-card h3{color:#c03a6d;margin-bottom:10px;font-size:20px}
.menu-card p{color:#666;font-size:15px}
.modal-overlay{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.4);display:none;justify-content:center;align-items:center;z-index:999;padding:20px}
.modal-overlay.active{display:flex}
.modal-box{background:white;width:520px;max-width:100%;max-height:90vh;overflow:auto;border-radius:25px;padding:35px;position:relative}
.modal-box.large{width:900px}
.close-btn{position:absolute;top:15px;right:20px;font-size:30px;color:#ff5b8f;cursor:pointer}
.modal-box h2{text-align:center;color:#f06292;margin-bottom:25px;font-size:28px}
.modal-box input,.modal-box textarea{width:100%;padding:14px;border:1px solid #ddd;border-radius:12px;margin-bottom:15px;font-size:15px}
.modal-box textarea{min-height:95px;resize:vertical}
.checkbox-row{display:flex;align-items:center;gap:10px;margin:0 0 15px;color:#555;font-size:14px}
.checkbox-row input{width:auto;margin:0;accent-color:#f06292}
.success-text{display:none;background:#e8fff0;color:#26733d;border-radius:12px;padding:12px;margin-bottom:15px;text-align:center;font-size:14px}
.modal-text{text-align:center;color:#777;margin-bottom:20px;font-size:14px}
.order-layout{display:grid;grid-template-columns:1fr 1.3fr;gap:20px}
.order-card,.address-card{border:1px solid #f3c7d6;background:#fff7fa;border-radius:14px;padding:16px;margin-bottom:12px;cursor:pointer}
.order-card:hover,.address-card:hover{border-color:#f06292}
.order-card h3,.address-card h3{color:#b03060;margin-bottom:8px;font-size:17px}
.meta{color:#666;font-size:14px;line-height:1.6}
.status-pill{display:inline-block;background:#ffd6e5;color:#9a2550;padding:5px 10px;border-radius:99px;font-size:12px;margin-top:8px}
.detail-box{background:#fff7fa;border-radius:14px;padding:18px}
.detail-row{display:flex;justify-content:space-between;gap:16px;border-bottom:1px solid #f5d5df;padding:9px 0;font-size:14px}
.detail-row b{text-align:right}
.tracking-box{margin-top:20px}
.tracking-item{display:flex;gap:14px;position:relative;margin-bottom:18px}
.tracking-item::before{content:'';position:absolute;left:16px;top:34px;width:3px;height:34px;background:#ffd0df}
.tracking-item:last-child::before{display:none}
.tracking-icon{width:35px;height:35px;border-radius:50%;background:#ffe3ed;display:flex;align-items:center;justify-content:center;font-size:16px;z-index:2;color:#f06292;font-weight:bold}
.tracking-item.done .tracking-icon{background:#f06292;color:white}
.tracking-content h3{color:#f06292;margin-bottom:5px;font-size:17px}
.tracking-content p{color:gray;font-size:13px}
.address-actions{display:flex;gap:10px;margin-top:12px}
.small-btn{padding:9px 14px;border-radius:10px;font-size:14px}
.empty-state{background:#fff7fa;border-radius:14px;padding:22px;text-align:center;color:#777}

@media(max-width:900px){
    .navbar{padding:14px 24px}.hamburger{display:block}.nav-right{gap:14px}
    .nav-menu{display:none;position:absolute;top:68px;left:24px;right:24px;background:white;border:1px solid #f5dce6;border-radius:14px;padding:14px;box-shadow:0 12px 26px rgba(0,0,0,.08);z-index:5;flex-direction:column;align-items:stretch;gap:0}
    .nav-menu.active{display:flex}.nav-menu a{padding:12px;border-radius:10px}.nav-menu a:hover{background:#fff3f8}
    .content{padding:24px}.profile-header,.profile-info{flex-direction:column;text-align:center}.menu-grid,.order-layout{grid-template-columns:1fr}.profile-card{padding:25px}
}

@media(max-width:600px){
    .logo-brand{width:135px}.navbar{padding:12px 16px}.nav-menu{top:62px;left:16px;right:16px}
    .content{padding:16px}.profile-card{padding:16px}.profile-header{gap:12px}.profile-image{width:80px;height:80px;font-size:32px}.profile-text h2{font-size:20px}
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
        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-info">
                    <div class="profile-image" id="profileInitial">N</div>
                    <div class="profile-text">
                        <h2 id="profileName">Memuat...</h2>
                        <p id="profileEmail">Memuat data profile</p>
                    </div>
                </div>
                <button class="edit-btn" onclick="openEditModal()">Edit Profil</button>
            </div>

            <div class="menu-grid">
                <div class="menu-card" onclick="openOrderModal()">
                    <h3>Pesanan Saya</h3>
                    <p>Lihat status pesanan skincare kamu</p>
                </div>
                <div class="menu-card" onclick="openAddressModal()">
                    <h3>Alamat</h3>
                    <p>Kelola alamat pengiriman kamu</p>
                </div>
                <div class="menu-card" onclick="logoutAlert()">
                    <h3>Logout</h3>
                    <p>Keluar dari akun NatyCare</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-overlay" id="editModal">
    <div class="modal-box">
        <span class="close-btn" onclick="closeEditModal()">&times;</span>
        <h2>Edit Profil</h2>
        <div class="success-text" id="profileSuccess">Profil berhasil diperbarui</div>
        <form id="profileForm">
            <input type="text" id="editName" placeholder="Nama" required>
            <input type="email" id="editEmail" placeholder="Email" required>
            <input type="password" id="editPassword" placeholder="Password Baru">
            <input type="password" id="editPasswordConfirmation" placeholder="Konfirmasi Password">
            <button class="save-btn" type="submit">Simpan Perubahan</button>
        </form>
    </div>
</div>

<div class="modal-overlay" id="orderModal">
    <div class="modal-box large">
        <span class="close-btn" onclick="closeOrderModal()">&times;</span>
        <h2>Pesanan Saya</h2>
        <div id="orderContent" class="order-layout">
            <div class="empty-state">Memuat pesanan...</div>
        </div>
    </div>
</div>

<div class="modal-overlay" id="addressModal">
    <div class="modal-box large">
        <span class="close-btn" onclick="closeAddressModal()">&times;</span>
        <h2>Alamat Saya</h2>
        <div class="order-layout">
            <div>
                <div id="addressList" class="empty-state">Memuat alamat...</div>
            </div>
            <form id="addressForm">
                <input type="text" id="addressName" placeholder="Nama Lengkap" required>
                <input type="text" id="addressPhone" placeholder="No. WhatsApp" required>
                <textarea id="addressFull" placeholder="Alamat Lengkap" required></textarea>
                <input type="text" id="addressProvince" placeholder="Provinsi" required>
                <input type="text" id="addressCity" placeholder="Kota / Kabupaten" required>
                <input type="text" id="addressDistrict" placeholder="Kecamatan" required>
                <input type="text" id="addressPostal" placeholder="Kode Pos" required>
                <label class="checkbox-row">
                    <input type="checkbox" id="addressDefault">
                    Jadikan Alamat Utama
                </label>
                <button class="save-btn" type="submit" id="addressSaveBtn">Simpan Alamat</button>
            </form>
        </div>
    </div>
</div>

<script>
const apiUrl = 'http://127.0.0.1:8000/api';
let currentUser = null;
let orders = [];
let addresses = [];
let editingAddressId = null;
let orderRefreshTimer = null;
let selectedOrderId = null;

function getAuthHeaders(){
    const token = localStorage.getItem('token');
    if(!token){
        window.location.href = '/login';
        return null;
    }

    return {
        'Content-Type':'application/json',
        'Accept':'application/json',
        'Authorization':'Bearer ' + token
    };
}

function clearSession(){
    localStorage.removeItem('token');
    localStorage.removeItem('role');
    localStorage.removeItem('user');
}

function handleUnauthorized(response){
    if(response.status === 401){
        clearSession();
        alert('Sesi login habis. Silakan login lagi');
        window.location.href = '/login';
        return true;
    }
    return false;
}

function formatRupiah(value){
    return 'Rp ' + Number(value || 0).toLocaleString('id-ID');
}

function formatDate(value){
    if(!value){
        return '-';
    }
    return new Date(value).toLocaleDateString('id-ID', {
        day:'2-digit',
        month:'long',
        year:'numeric',
        hour:'2-digit',
        minute:'2-digit'
    });
}

function statusLabel(status){
    const labels = {
        pending_payment: 'Menunggu Pembayaran',
        paid: 'Pembayaran Berhasil',
        processing: 'Sedang Dikemas',
        shipped: 'Sedang Dikirim',
        completed: 'Pesanan Diterima'
    };
    return labels[status] || status || '-';
}

function timelineSteps(status){
    const steps = [
        {key:'created', label:'Pesanan Dibuat'},
        {key:'paid', label:'Pembayaran Berhasil'},
        {key:'processing', label:'Sedang Dikemas'},
        {key:'shipped', label:'Sedang Dikirim'},
        {key:'completed', label:'Pesanan Diterima'}
    ];
    const progress = {
        pending_payment: 0,
        paid: 1,
        processing: 2,
        shipped: 3,
        completed: 4
    };
    const current = progress[status] ?? 0;

    return steps.map((step, index) => ({
        label: step.label,
        done: index <= current
    }));
}

function renderTimeline(order){
    return `
        <div class="tracking-box">
            ${timelineSteps(order.status).map(step => `
                <div class="tracking-item ${step.done ? 'done' : ''}">
                    <div class="tracking-icon">${step.done ? '&#10003;' : '&#9675;'}</div>
                    <div class="tracking-content">
                        <h3>${step.label}</h3>
                        <p>${step.done ? 'Status sudah tercapai' : 'Menunggu update pesanan'}</p>
                    </div>
                </div>
            `).join('')}
        </div>
    `;
}

function renderOrderDetail(order){
    if(!order){
        return '<div class="empty-state">Klik salah satu pesanan untuk melihat detail.</div>';
    }

    return `
        <div class="detail-box">
            <h3 style="color:#b03060;margin-bottom:12px;">Detail Pesanan #${order.id}</h3>
            <div class="detail-row"><span>Nomor Order</span><b>#${order.id}</b></div>
            <div class="detail-row"><span>Status Pesanan</span><b>${statusLabel(order.status)}</b></div>
            <div class="detail-row"><span>Metode Pembayaran</span><b>${order.metode_pembayaran || '-'}</b></div>
            <div class="detail-row"><span>Metode Pengiriman</span><b>${order.metode_pengiriman || '-'}</b></div>
            <div class="detail-row"><span>Total Pembayaran</span><b>${formatRupiah(order.total)}</b></div>
            <div class="detail-row"><span>Tanggal Order</span><b>${formatDate(order.created_at)}</b></div>
            ${renderTimeline(order)}
        </div>
    `;
}

function showOrderDetail(orderId){
    selectedOrderId = Number(orderId);
    const order = orders.find(item => Number(item.id) === Number(orderId));
    document.getElementById('orderDetail').innerHTML = renderOrderDetail(order);
}

function renderOrders(){
    const orderContent = document.getElementById('orderContent');

    if(orders.length === 0){
        orderContent.className = '';
        orderContent.innerHTML = '<div class="empty-state">Belum ada pesanan saat ini</div>';
        return;
    }

    const activeOrder = orders.find(order => Number(order.id) === Number(selectedOrderId)) || orders[0];
    selectedOrderId = Number(activeOrder.id);

    orderContent.className = 'order-layout';
    orderContent.innerHTML = `
        <div>
            ${orders.map(order => `
                <div class="order-card" onclick="showOrderDetail(${order.id})">
                    <h3>Nomor Order #${order.id}</h3>
                    <div class="meta">Metode Pembayaran: ${order.metode_pembayaran || '-'}</div>
                    <div class="meta">Metode Pengiriman: ${order.metode_pengiriman || '-'}</div>
                    <div class="meta">Total Pembayaran: ${formatRupiah(order.total)}</div>
                    <div class="meta">Tanggal Order: ${formatDate(order.created_at)}</div>
                    <span class="status-pill">${statusLabel(order.status)}</span>
                </div>
            `).join('')}
        </div>
        <div id="orderDetail">${renderOrderDetail(activeOrder)}</div>
    `;
}

function loadProfile(){
    const headers = getAuthHeaders();
    if(!headers){ return; }

    fetch(`${apiUrl}/profile`, {headers})
        .then(async response => {
            if(handleUnauthorized(response)){ return null; }
            return response.json();
        })
        .then(user => {
            if(!user){ return; }
            currentUser = user;
            localStorage.setItem('user', JSON.stringify(user));
            document.getElementById('profileName').innerText = user.name;
            document.getElementById('profileEmail').innerText = user.email;
            document.getElementById('profileInitial').innerText = (user.name || 'N').charAt(0).toUpperCase();
            document.getElementById('editName').value = user.name;
            document.getElementById('editEmail').value = user.email;
        });
}

document.getElementById('profileForm').addEventListener('submit', function(event){
    event.preventDefault();
    const headers = getAuthHeaders();
    if(!headers){ return; }

    const password = document.getElementById('editPassword').value;
    const passwordConfirmation = document.getElementById('editPasswordConfirmation').value;

    if(password !== passwordConfirmation){
        alert('Password dan konfirmasi password harus sama');
        return;
    }

    const payload = {
        name: document.getElementById('editName').value.trim(),
        email: document.getElementById('editEmail').value.trim()
    };

    if(password){
        payload.password = password;
        payload.password_confirmation = passwordConfirmation;
    }

    fetch(`${apiUrl}/profile`, {
        method: 'PUT',
        headers,
        body: JSON.stringify(payload)
    })
    .then(async response => {
        const data = await response.json();
        if(handleUnauthorized(response)){ return null; }
        if(!response.ok){
            const errors = data.errors ? Object.values(data.errors).flat().join('\n') : data.message;
            alert(errors || 'Profil gagal diperbarui');
            return null;
        }
        return data;
    })
    .then(data => {
        if(!data){ return; }
        currentUser = data.user;
        localStorage.setItem('user', JSON.stringify(data.user));
        document.getElementById('profileName').innerText = data.user.name;
        document.getElementById('profileEmail').innerText = data.user.email;
        document.getElementById('profileInitial').innerText = (data.user.name || 'N').charAt(0).toUpperCase();
        document.getElementById('editPassword').value = '';
        document.getElementById('editPasswordConfirmation').value = '';
        document.getElementById('profileSuccess').style.display = 'block';
        setTimeout(() => {
            document.getElementById('profileSuccess').style.display = 'none';
        }, 2500);
    });
});

function loadOrders(){
    const headers = getAuthHeaders();
    if(!headers){ return; }

    fetch(`${apiUrl}/orders`, {headers})
        .then(async response => {
            if(handleUnauthorized(response)){ return []; }
            return response.json();
        })
        .then(data => {
            orders = Array.isArray(data) ? data : [];
            renderOrders();
        });
}

function renderAddresses(){
    const list = document.getElementById('addressList');

    if(addresses.length === 0){
        list.className = 'empty-state';
        list.innerHTML = 'Belum ada alamat tersimpan';
        return;
    }

    list.className = '';
    list.innerHTML = addresses.map(address => `
        <div class="address-card">
            <h3>${address.nama_lengkap}${address.is_default ? ' - ✓ Utama' : ''}</h3>
            <div class="meta">${address.no_whatsapp}</div>
            <div class="meta">${address.alamat_lengkap}</div>
            <div class="meta">${address.kecamatan}, ${address.kota}, ${address.provinsi} ${address.kode_pos}</div>
            <div class="address-actions">
                <button class="small-btn" type="button" onclick="editAddress(${address.id})">Edit</button>
            </div>
        </div>
    `).join('');
}

function loadAddresses(){
    const headers = getAuthHeaders();
    if(!headers){ return; }

    fetch(`${apiUrl}/addresses`, {headers})
        .then(async response => {
            if(handleUnauthorized(response)){ return []; }
            return response.json();
        })
        .then(data => {
            addresses = Array.isArray(data) ? data : [];
            renderAddresses();
        });
}

function fillAddressForm(address){
    editingAddressId = address ? address.id : null;
    document.getElementById('addressName').value = address?.nama_lengkap || currentUser?.name || '';
    document.getElementById('addressPhone').value = address?.no_whatsapp || '';
    document.getElementById('addressFull').value = address?.alamat_lengkap || '';
    document.getElementById('addressProvince').value = address?.provinsi || '';
    document.getElementById('addressCity').value = address?.kota || '';
    document.getElementById('addressDistrict').value = address?.kecamatan || '';
    document.getElementById('addressPostal').value = address?.kode_pos || '';
    document.getElementById('addressDefault').checked = address ? Boolean(address.is_default) : addresses.length === 0;
    document.getElementById('addressSaveBtn').innerText = editingAddressId ? 'Perbarui Alamat' : 'Simpan Alamat';
}

function editAddress(id){
    const address = addresses.find(item => Number(item.id) === Number(id));
    fillAddressForm(address);
}

document.getElementById('addressForm').addEventListener('submit', function(event){
    event.preventDefault();
    const headers = getAuthHeaders();
    if(!headers){ return; }

    const payload = {
        nama_lengkap: document.getElementById('addressName').value.trim(),
        no_whatsapp: document.getElementById('addressPhone').value.trim(),
        alamat_lengkap: document.getElementById('addressFull').value.trim(),
        provinsi: document.getElementById('addressProvince').value.trim(),
        kota: document.getElementById('addressCity').value.trim(),
        kecamatan: document.getElementById('addressDistrict').value.trim(),
        kode_pos: document.getElementById('addressPostal').value.trim(),
        is_default: document.getElementById('addressDefault').checked
    };

    const url = editingAddressId ? `${apiUrl}/addresses/${editingAddressId}` : `${apiUrl}/addresses`;
    const method = editingAddressId ? 'PUT' : 'POST';

    fetch(url, {method, headers, body: JSON.stringify(payload)})
        .then(async response => {
            const data = await response.json();
            if(handleUnauthorized(response)){ return null; }
            if(!response.ok){
                alert(data.message || 'Alamat gagal disimpan');
                return null;
            }
            return data;
        })
        .then(data => {
            if(!data){ return; }
            alert(data.message || 'Alamat berhasil disimpan');
            fillAddressForm(null);
            loadAddresses();
        });
});

function openEditModal(){ document.getElementById('editModal').classList.add('active'); }
function closeEditModal(){ document.getElementById('editModal').classList.remove('active'); }
function openOrderModal(){
    document.getElementById('orderModal').classList.add('active');
    loadOrders();
    clearInterval(orderRefreshTimer);
    orderRefreshTimer = setInterval(loadOrders, 10000);
}
function closeOrderModal(){
    document.getElementById('orderModal').classList.remove('active');
    clearInterval(orderRefreshTimer);
    orderRefreshTimer = null;
}
function openAddressModal(){ document.getElementById('addressModal').classList.add('active'); fillAddressForm(addresses[0] || null); loadAddresses(); }
function closeAddressModal(){ document.getElementById('addressModal').classList.remove('active'); }

function logoutAlert(){
    clearSession();
    alert('Logout berhasil');
    window.location.href = '/login';
}

function toggleMenu(){
    document.getElementById('navMenu').classList.toggle('active');
}

loadProfile();
loadOrders();
loadAddresses();
</script>
</body>
</html>
