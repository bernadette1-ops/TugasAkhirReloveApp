<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- FONT -->
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
    display: flex;
    flex-direction: column;
    align-items: center;
}

        .title {
            font-size: 44px;
            font-weight: 700;
            color: white;
            margin-bottom: 25px;
            text-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        .login-box {
            background: #ffffffcc;
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 20px;
            width: 320px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 10px;
            background: #f1f5ff;
            outline: none;
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

        .error {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title">
        Welcome to Relove Cloth!
    </div>

    <div class="login-box">
        <h2>Login</h2>

        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif

        <form method="POST" action="/login">
            @csrf

            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</div>

</body>
</html>