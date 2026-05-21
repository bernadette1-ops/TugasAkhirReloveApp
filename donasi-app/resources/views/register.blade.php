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

<body class="font-[Poppins] overflow-hidden bg-white">

    <div class="flex h-screen">
        <div class="relative w-1/2 hidden md:block overflow-hidden">

            <div class="absolute inset-0">

                <img src="{{ asset('donasi01.jpg') }}"
                    class="slide absolute inset-0 w-full h-full object-cover object-center opacity-100 transition-opacity duration-1000">

                <img src="{{ asset('donasi02.jpg') }}"
                    class="slide absolute inset-0 w-full h-full object-cover object-center opacity-0 transition-opacity duration-1000">

                <img src="{{ asset('donasi03.jpg') }}"
                    class="slide absolute inset-0 w-full h-full object-cover object-center opacity-0 transition-opacity duration-1000">

            </div>

            <div class="absolute inset-0 bg-gradient-to-br from-[#fbc2eb]/70 to-[#a6c1ee]/70"></div>

            <div class="absolute left-[75px] top-1/2 -translate-y-1/2 w-[520px] h-[260px] z-10">

                <div class="flex flex-col justify-center h-full">

                    <h1 class="text-6xl font-bold text-[#14213d] leading-[1.05] mb-8">

                        Join<br>
                        Relove Cloth

                    </h1>

                    <p class="text-[20px] leading-[1.8] text-[#14213d]/90">

                        Buat akun untuk mulai berdonasi dan membantu
                        menyebarkan kebaikan kepada mereka yang membutuhkan.

                    </p>

                </div>

            </div>

        </div>

        <div
            class="w-full md:w-1/2 flex items-center justify-center bg-gradient-to-br from-[#fbc2eb]/20 to-[#a6c1ee]/20 px-8">

            <div class="w-[480px] h-[620px] bg-white rounded-3xl shadow-2xl p-10">

                <div class="h-full flex flex-col">

                    <div class="h-[110px] flex flex-col justify-center text-center">

                        <h2 class="text-3xl font-semibold text-gray-800">
                            Create Account
                        </h2>

                        <p class="text-gray-500 text-sm mt-2">
                            Daftar untuk bergabung dengan Relove Cloth
                        </p>

                    </div>

                    <div class="flex-1 flex flex-col justify-center">

                        <form method="POST" action="/register" class="space-y-5">

                            @csrf

                            <div>

                                <label class="text-sm font-medium text-gray-700">
                                    Nama
                                </label>

                                <input type="text" name="name" placeholder="Masukkan nama" required
                                    class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">

                            </div>

                            <div>

                                <label class="text-sm font-medium text-gray-700">
                                    Email
                                </label>

                                <input type="email" name="email" placeholder="Masukkan email" required
                                    class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">

                            </div>

                            <div>

                                <label class="text-sm font-medium text-gray-700">
                                    Password
                                </label>

                                <input type="password" name="password" placeholder="Masukkan password" required
                                    class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">

                            </div>

                            <button type="submit"
                                class="w-full bg-[#7f9cf5] hover:bg-[#667eea] transition text-white py-3 rounded-xl font-medium shadow-md">

                                Register

                            </button>

                        </form>

                    </div>

                    <div class="h-[90px] flex flex-col justify-end">

                        <div class="text-center text-sm text-gray-500">

                            Sudah punya akun?

                            <a href="/login" class="text-[#7f9cf5] hover:text-[#667eea] font-medium">

                                Login

                            </a>

                        </div>

                        <div class="text-center mt-4 text-sm text-gray-400">

                            © 2026 Relove Cloth

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>

        const slides = document.querySelectorAll('.slide');

        let currentSlide = 0;

        setInterval(() => {

            slides[currentSlide].classList.remove('opacity-100');
            slides[currentSlide].classList.add('opacity-0');

            currentSlide = (currentSlide + 1) % slides.length;

            slides[currentSlide].classList.remove('opacity-0');
            slides[currentSlide].classList.add('opacity-100');

        }, 3000);

    </script>

</body>

</html>