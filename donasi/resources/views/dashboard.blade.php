<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

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

        .box {
            background: #ffffffcc;
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            width: 350px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 20px;
            color: #555;
        }

        a, button {
            display: block;
            margin: 10px auto;
            padding: 10px;
            width: 80%;
            border: none;
            border-radius: 10px;
            background: #7f9cf5;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        form {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Halo, {{ auth()->user()->profile }} 👋</h2>
    <p>Selamat datang di Relove Cloth</p>

    <a href="/profile">Profile</a>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>

</body>
</html>