<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>

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

<body class="font-[Poppins] bg-white min-h-screen">

<!-- NAVBAR -->
<div class="flex justify-between items-center px-10 py-4 bg-white shadow">

    <div class="flex items-center gap-3">

        <img src="{{ asset('pong.png') }}"
             class="w-10 h-10 rounded-xl object-cover">

        <h1 class="font-semibold text-lg text-gray-800">
            Relove Cloth
        </h1>

    </div>

    <div class="flex gap-6 text-sm items-center">

        <a href="/dashboard"
           class="hover:text-[#7f9cf5] transition text-gray-700">
           Home
        </a>

        <a href="/donasi"
           class="hover:text-[#7f9cf5] transition text-gray-700">
           Donasi
        </a>

        <a href="/service-center"
           class="hover:text-[#7f9cf5] transition text-gray-700">
           Service Center
        </a>

        <a href="/profile"
           class="text-[#7f9cf5] font-medium">
           Profile
        </a>

    </div>

</div>

<!-- HEADER -->
<div class="relative h-[280px]">

    <img src="{{ asset('p1.jpg') }}"
         class="w-full h-full object-cover">

    <div class="absolute inset-0 bg-gradient-to-r from-[#fbc2eb]/70 to-[#a6c1ee]/70 flex flex-col justify-center items-center text-center px-6">

        <h1 class="text-4xl font-semibold text-gray-800 mb-4">
            Profile Pengguna
        </h1>

        <p class="max-w-2xl text-gray-700 leading-relaxed">
            Kelola informasi akun dan perbarui data profilmu dengan mudah.
        </p>

    </div>

</div>

<!-- PROFILE CONTENT -->
<div class="max-w-6xl mx-auto px-10 py-16">

    <div class="grid md:grid-cols-2 gap-10 items-center">

        <!-- LEFT -->
        <div class="bg-gradient-to-br from-[#fbc2eb]/30 to-[#a6c1ee]/30 rounded-3xl p-10 shadow-lg">

            <h2 class="text-3xl font-semibold text-gray-800 mb-5">
                Relove Cloth
            </h2>

            <p class="text-gray-700 leading-relaxed mb-4">
                Terima kasih telah menjadi bagian dari Relove Cloth dan ikut
                membantu menyebarkan kebaikan melalui donasi pakaian.
            </p>

            <p class="text-gray-700 leading-relaxed mb-4">
                Kamu dapat memperbarui informasi akun kapan saja agar data tetap
                aman dan terbaru.
            </p>

            <p class="text-gray-700 leading-relaxed">
                Bersama kita bisa memberikan manfaat yang lebih besar bagi sesama.
            </p>

            <img src="{{ asset('p2.jpg') }}"
                 class="rounded-2xl mt-8 shadow-lg w-full h-72 object-cover">

        </div>

        <!-- RIGHT -->
        <div class="bg-white rounded-3xl shadow-2xl p-10 border border-gray-100">

            <!-- AVATAR -->
            <div class="flex flex-col items-center mb-8">

                <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-[#7f9cf5]/30 shadow-lg">

                    @if(auth()->user()->photo)

                        <img src="{{ asset('storage/' . auth()->user()->photo) }}"
                             class="w-full h-full object-cover">

                    @else

                        <img src="{{ asset('pong.png') }}"
                             class="w-full h-full object-cover">

                    @endif

                </div>

                <h2 class="text-2xl font-semibold text-gray-800 mt-5">
                    {{ auth()->user()->name }}
                </h2>

                <p class="text-gray-500 text-sm">
                    Relove Cloth Member
                </p>

            </div>

            <!-- FORM -->
            <form method="POST"
                  action="{{ route('profile.update') }}"
                  enctype="multipart/form-data"
                  class="space-y-5">

                @csrf

                <div>

                    <label class="text-sm font-medium text-gray-700">
                        Username
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ auth()->user()->name }}"
                           class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">

                </div>

                <div>

                    <label class="text-sm font-medium text-gray-700">
                        Email
                    </label>

                    <input type="email"
                           name="gmail"
                           value="{{ auth()->user()->gmail }}"
                           class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">

                </div>

                <div>

                    <label class="text-sm font-medium text-gray-700">
                        Password Baru
                    </label>

                    <input type="password"
                           name="password"
                           placeholder="Isi jika ingin mengganti password"
                           class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">

                </div>

                <button type="submit"
                        class="w-full bg-[#7f9cf5] hover:bg-[#667eea] transition text-white py-3 rounded-xl font-medium shadow-md">

                    Update Profile

                </button>

            </form>

            <!-- LOGOUT -->
            <form method="POST"
                  action="/logout"
                  class="mt-4">

                @csrf

                <button type="submit"
                        class="w-full bg-red-400 hover:bg-red-500 transition text-white py-3 rounded-xl font-medium shadow-md">

                    Logout

                </button>

            </form>

        </div>

    </div>

</div>

<!-- FOOTER -->
<footer class="bg-gradient-to-r from-[#fbc2eb]/20 to-[#a6c1ee]/20 text-gray-700 pt-10 pb-6 px-10 border-t border-gray-200">

    <div class="text-center text-sm text-gray-500">
        © 2026 Relove Cloth • Donasi pakaian untuk membantu sesama
    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

@if(session('success'))

    Swal.fire({
        icon: 'success',
        title: 'Updated!',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    });

@endif

</script>

</body>
</html>