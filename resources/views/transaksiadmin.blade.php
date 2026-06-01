<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Transaksi Penjualan Admin</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#ffe5ef;
    padding:20px;
}

.container{
    max-width:1100px;
    margin:auto;
    background:#ffffff;
    border:8px solid #ffe5ef;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px 30px;
    border-bottom:1px solid #f3d9e3;
}

.logo{
    font-size:28px;
    font-weight:bold;
    color:#ef6c9b;
}

.header-right{
    display:flex;
    align-items:center;
}

.profile-icon{
    width:50px;
    height:50px;
    object-fit:contain;
    cursor:pointer;
    transition:0.3s;
}

.profile-icon:hover{
    transform:scale(1.05);
}

.content{
    padding:30px;
}

.judul{
    font-size:32px;
    color:#444;
    margin-bottom:25px;
}

.card{
    border:1px solid #f0e4e8;
    border-radius:15px;
    padding:20px;
    background:#fff;
}

.table-wrapper{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#fff2f7;
    padding:15px;
    color:#555;
    border:1px solid #f0e4e8;
}

td{
    padding:15px;
    border:1px solid #f0e4e8;
    text-align:center;
}

td:first-child,
th:first-child{
    text-align:left;
}

.status-select{
    width:130px;
    padding:8px;
    border:1px solid #ef6c9b;
    border-radius:8px;
    background:white;
    color:#555;
    font-size:14px;
    cursor:pointer;
}

.status-select:focus{
    outline:none;
}

.btn-simpan{
    margin-top:20px;
    padding:12px 20px;
    background:#ef6c9b;
    color:white;
    border:none;
    border-radius:10px;
    cursor:pointer;
}

.btn-simpan:hover{
    background:#df4f84;
}

@media(max-width:768px){

    .content{
        padding:15px;
    }

    .judul{
        font-size:24px;
    }

    table{
        min-width:700px;
    }

}

</style>
</head>

<body>

<div class="container">

    <div class="header">

        <div class="logo">
            Natycare
        </div>

        <div class="header-right">

            <a href="/profile">
                <img src="{{ asset('images/profil-admin.png') }}"
                     class="profile-icon"
                     alt="Profil Admin">
            </a>

        </div>

    </div>

    <div class="content">

        <h2 class="judul">
            Transaksi Penjualan
        </h2>

        <div class="card">

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Status Pesanan</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>Brightening Cleanser</td>
                            <td>1</td>
                            <td>Rp 25.000</td>
                            <td>
                                <select class="status-select">
                                    <option selected>Dikemas</option>
                                    <option>Dikirim</option>
                                    <option>Selesai</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Hydra Glowing Toner</td>
                            <td>1</td>
                            <td>Rp 95.000</td>
                            <td>
                                <select class="status-select">
                                    <option selected>Dikemas</option>
                                    <option>Dikirim</option>
                                    <option>Selesai</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Anti-Aging Serum</td>
                            <td>1</td>
                            <td>Rp 96.000</td>
                            <td>
                                <select class="status-select">
                                    <option selected>Dikemas</option>
                                    <option>Dikirim</option>
                                    <option>Selesai</option>
                                </select>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

            <button class="btn-simpan">
                Simpan Perubahan
            </button>

        </div>

    </div>

</div>

</body>
</html>