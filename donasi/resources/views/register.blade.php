<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fbc2eb, #a6c1ee);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            text-align: center;
        }

        .title {
            font-size: 40px;
            font-weight: 700;
            color: white;
            margin-bottom: 25px;
        }

        .box {
            background: #ffffffcc;
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 20px;
            width: 320px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 10px;
            background: #f1f5ff;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: #7f9cf5;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        .link {
            margin-top: 10px;
            font-size: 14px;
        }

        a {
            color: #667eea;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title">
        Create Account
    </div>

    <div class="box">
        <form method="POST" action="/register">
            @csrf

            <input type="text" name="name" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Register</button>
        </form>

        <div class="link">
            Sudah punya akun?
            <a href="/login">Login</a>
        </div>
    </div>
</div>

</body>
</html>