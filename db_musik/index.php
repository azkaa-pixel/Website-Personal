<!DOCTYPE html>
<html>
<head>
    <title>Login - Musik</title>
    <style>
        body { background: #FFF5F7; font-family: 'Segoe UI', sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 40px; border-radius: 30px; box-shadow: 0 15px 35px rgba(208, 23, 96, 0.1); width: 350px; text-align: center; }
        h2 { color: #D01760; margin-bottom: 30px; font-weight: 700; }
        .input-group { margin-bottom: 15px; text-align: left; }
        label { font-size: 13px; color: #D01760; font-weight: bold; margin-left: 10px; }
        input { width: 100%; padding: 15px; margin-top: 5px; border: none; border-radius: 15px; box-sizing: border-box; outline: none; background: #F8F9FA; transition: 0.3s; }
        input:focus { background: #FFEBF2; box-shadow: 0 0 0 2px #D01760; }
        button { width: 100%; padding: 15px; background: #D01760; border: none; border-radius: 15px; color: white; font-weight: bold; font-size: 16px; cursor: pointer; margin-top: 20px; transition: 0.4s; box-shadow: 0 8px 15px rgba(208, 23, 96, 0.3); }
        button:hover { background: #A0124A; transform: translateY(-3px); box-shadow: 0 12px 20px rgba(208, 23, 96, 0.4); }
        .link { margin-top: 25px; font-size: 14px; color: #666; }
        .link a { color: #D01760; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Welcome Back!</h2>
        <form action="proses_login.php" method="POST">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit">LOGIN SEKARANG</button>
        </form>
        <div class="link">
            Belum punya akun? <a href="register.php">Daftar</a>
        </div>
    </div>
</body>
</html>