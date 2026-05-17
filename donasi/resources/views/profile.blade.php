<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fbc2eb, #a6c1ee);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: #ffffffcc;
            backdrop-filter: blur(10px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .nav-left {
            display: flex;
            align-items: center;
        }

        .nav-logo {
            width: 40px;
            margin-right: 10px;
            border-radius: 8px;
        }

        .nav-right a {
            margin: 0 10px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        /* 🔥 FIX CENTER TOTAL */
        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-box {
            background: #ffffffcc;
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 20px;
            width: 400px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #ddd;
            margin: 0 auto 20px;
            overflow: hidden;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .upload-btn {
            display: inline-block;
            padding: 10px 15px;
            background: #7f9cf5;
            color: white;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .upload-btn:hover {
            background: #667eea;
        }

        input[type="text"],
        input[type="email"],
        .password-display {
        width: 100%;
        padding: 12px 16px;
        margin: 10px 0;
        border-radius: 12px;
        background: #e2e8f0;
        border: 2px solid #cbd5e1;
        font-size: 14px;
        text-align: center;
        box-sizing: border-box;
    }

        .password-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .eye {
            cursor: pointer;
            font-size: 18px;
        }

        button {
            margin-top: 10px;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 10px;
            background: #7f9cf5;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        button:hover {
            background: #667eea;
        }

        .label {
            font-weight: 600;
            margin-top: 10px;
            display: block;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="nav-left">
        <img src="/pong.png" class="nav-logo">
        <strong>Relove Cloth</strong>
    </div>

    <div class="nav-right">
        <a href="/dashboard">Home</a>
        <a href="/donasi">Donasi</a>
        <a href="/callcenter">Call Center</a>
        <a href="/profile">Profile</a>
    </div>
</div>

<div class="container">
    <div class="profile-box">

        <div class="avatar">
            @if(auth()->user()->photo)
                <img src="/uploads/{{ auth()->user()->photo }}">
            @else
                <img src="/pong.png">
            @endif
        </div>

        <label class="upload-btn" for="photo-upload">Pilih Foto</label>
        <input type="file" id="photo-upload" style="display:none;">

        <h2>Profile</h2>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf

            <label class="label">Username</label>
            <input 
                type="text" 
                name="name"
                value="{{ auth()->user()->name }}"
                class="input-field"
            >

            <label class="label">Email</label>
            <input 
                type="email" 
                name="gmail"
                value="{{ auth()->user()->gmail }}"
                class="input-field"
            >

            <label class="label">Password</label>

            <div class="password-wrapper">
                <input
                    type="password"
                    id="passwordField"
                    name="password"
                    placeholder="Leave blank if not changing"
                    class="input-field"
                >

                <span class="eye" onclick="togglePassword()">👁️</span>
            </div>

            <button type="submit">Update Profile</button>
        </form>

        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Logout</button>
        </form>

    </div>
</div>

<script>
function togglePassword() {
    const field = document.getElementById("passwordField");

    if (field.type === "password") {
        field.type = "text";
    } else {
        field.type = "password";
    }
}
</script>

</body>
</html>