<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#7f9cf5',
                    primaryDark: '#667eea'
                }
            }
        }
    }
    </script>
</head>

<body class="font-[Poppins] bg-white overflow-hidden">

<div class="grid md:grid-cols-2 min-h-screen">

    <!-- LEFT SIDE -->
    <div class="relative hidden md:block">

        <img src="{{ asset('donasi02.jpg') }}"
             class="w-full h-full object-cover">

        <div class="absolute inset-0 bg-gradient-to-br from-[#fbc2eb]/70 to-[#a6c1ee]/70 flex flex-col justify-center px-16">

            <h1 class="text-5xl font-bold text-gray-800 leading-tight mb-6">

                Join<br>
                Relove Cloth

            </h1>

            <p class="text-lg text-gray-700 leading-relaxed max-w-lg">

                Buat akun untuk mulai berdonasi dan membantu menyebarkan
                kebaikan kepada mereka yang membutuhkan.

            </p>

        </div>

    </div>

    <div class="flex items-start justify-center px-8 py-10 bg-gradient-to-br from-[#fbc2eb]/20 to-[#a6c1ee]/20">

        <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-10">

            <div class="text-center mb-8">

                <img src="{{ asset('pong.png') }}"
                     class="w-16 h-16 mx-auto rounded-2xl shadow-md mb-4 object-cover">

                <h2 class="text-3xl font-semibold text-gray-800">
                    Create Account
                </h2>

                <p class="text-gray-500 text-sm mt-2">
                    Daftar untuk bergabung dengan Relove Cloth
                </p>

            </div>

            <form method="POST" action="/register" class="space-y-5">

                @csrf

                <div>

                    <label class="text-sm font-medium text-gray-700">
                        Nama
                    </label>

                    <input type="text"
                           name="name"
                           placeholder="Masukkan nama"
                           required
                           class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">

                </div>

                <div>

                    <label class="text-sm font-medium text-gray-700">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           placeholder="Masukkan email"
                           required
                           class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">

                </div>

                <div>

                    <label class="text-sm font-medium text-gray-700">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           placeholder="Masukkan password"
                           required
                           class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">

                </div>

                <button type="submit"
                        class="w-full bg-[#7f9cf5] hover:bg-[#667eea] transition text-white py-3 rounded-xl font-medium shadow-md">

                    Register

                </button>

            </form>

            <div class="text-center mt-6 text-sm text-gray-500">

                Sudah punya akun?

                <a href="/login"
                   class="text-[#7f9cf5] hover:text-[#667eea] font-medium transition">

                   Login

                </a>

            </div>

            <div class="text-center mt-6 text-sm text-gray-400">

                © 2026 Relove Cloth

            </div>

        </div>

    </div>

</div>

</body>
</html>