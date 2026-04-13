<!DOCTYPE html>
<html>
<head>
    <title>Login Natycare</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f4f4;
            text-align: center;
        }

        .logo {
            font-size: 30px;
            font-weight: bold;
            color: #f06292;
            margin-top: 50px;
        }

        .container {
            width: 400px;
            margin: 20px auto;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            text-align: left;
        }

        h2 {
            text-align: center;
            color: #e91e63;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #e84393; /* PINK */
        }

        .input-group {
            position: relative;
            margin-bottom: 15px;
        }

        .input-group i {
            position: absolute;
            top: 38px;
            left: 10px;
            color: #e84393; /* ICON PINK */
        }

        input {
            width: 100%;
            padding: 10px 10px 10px 35px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: linear-gradient(to right, #f8a5c2, #e84393);
            border: none;
            color: white;
            border-radius: 8px;
            font-weight: bold;
            margin-top: 10px;
        }

        .link {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
        }

        .link a {
            color: #e84393;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="logo">🌸 Natycare</div>

<div class="container">
    <h2>Login Admin</h2>

    <form method="POST" action="/api/login">
        @csrf

        <div class="input-group">
            <label>Email</label>
            <i class="fa fa-envelope"></i>
            <input type="email" name="email" placeholder="Masukkan email">
        </div>

        <div class="input-group">
            <label>Kata Sandi</label>
            <i class="fa fa-lock"></i>
            <input type="password" name="password" placeholder="Masukkan kata sandi">
        </div>

        <button type="submit">Login</button>
    </form>

    <div class="link">
        Belum punya akun? <a href="/register">Daftar</a>
    </div>
</div>

</body>
</html>