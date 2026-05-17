<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <title>Service Center - Relove Cloth</title>

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
           class="text-[#7f9cf5] font-medium">
           Service Center
        </a>

        <a href="/profile"
           class="hover:text-[#7f9cf5] transition text-gray-700">
           Profile
        </a>

    </div>

</div>

<!-- HEADER -->
<div class="relative h-[320px]">

    <img src="{{ asset('sc1.jpg') }}"
         class="w-full h-full object-cover">

    <div class="absolute inset-0 bg-gradient-to-r from-[#fbc2eb]/70 to-[#a6c1ee]/70 flex flex-col justify-center items-center text-center px-6">

        <h1 class="text-4xl font-semibold text-gray-800 mb-4">
            Service Center
        </h1>

        <p class="max-w-2xl text-gray-700 leading-relaxed">
            Sampaikan keluhan, masukan, atau kendala yang kamu alami
            agar kami dapat membantu dengan lebih baik.
        </p>

    </div>

</div>

<!-- CONTENT -->
<div class="max-w-7xl mx-auto px-10 py-16">

    <div class="grid md:grid-cols-2 gap-10 items-start">

        <!-- FORM -->
        <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">

            <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                Kirim Pengaduan
            </h2>

            <form method="POST"
                  action="/service-center"
                  class="space-y-5">

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
                           name="gmail"
                           placeholder="Masukkan email"
                           required
                           class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">

                </div>

                <div>

                    <label class="text-sm font-medium text-gray-700">
                        Keluhan
                    </label>

                    <textarea name="keluhan"
                              rows="5"
                              placeholder="Tulis keluhan atau masukan"
                              required
                              class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]"></textarea>

                </div>

                <button type="submit"
                        class="w-full bg-[#7f9cf5] hover:bg-[#667eea] transition text-white py-3 rounded-xl font-medium shadow-md">

                    Kirim Pengaduan

                </button>

            </form>

            @if(session('success'))

                <div class="mt-5 bg-green-100 text-green-600 px-4 py-3 rounded-xl text-sm text-center">

                    Keluhan berhasil dikirim!

                </div>

            @endif

        </div>

        <!-- INFO -->
        <div class="bg-gradient-to-br from-[#fbc2eb]/30 to-[#a6c1ee]/30 rounded-3xl p-10 shadow-lg">

            <h2 class="text-3xl font-semibold text-gray-800 mb-5">
                Kami Siap Membantu
            </h2>

            <p class="text-gray-700 leading-relaxed mb-4">
                Relove Cloth selalu berusaha memberikan pengalaman terbaik
                bagi setiap pengguna platform.
            </p>

            <p class="text-gray-700 leading-relaxed mb-4">
                Jika kamu menemukan kendala atau memiliki masukan,
                silakan kirimkan melalui Service Center ini.
            </p>

            <p class="text-gray-700 leading-relaxed">
                Semua pengaduan akan kami proses secepat mungkin.
            </p>

            <img src="{{ asset('sc2.jpg') }}"
                 class="rounded-2xl mt-8 shadow-lg w-full h-72 object-cover">

        </div>

    </div>

</div>

<!-- LIST KELUHAN -->
<div class="px-10 pb-20">

    <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100">

        <div class="px-8 py-6 border-b border-gray-100">

            <h2 class="text-2xl font-semibold text-gray-800">
                Riwayat Pengaduan
            </h2>

        </div>

        <div class="p-8 space-y-6">

            @foreach($tickets as $t)

            <div class="bg-gradient-to-r from-[#fbc2eb]/10 to-[#a6c1ee]/10 border border-gray-100 rounded-2xl p-6 shadow-sm">

                <div class="flex justify-between items-start gap-5 flex-wrap">

                    <div>

                        <h3 class="text-lg font-semibold text-gray-800">
                            {{ $t->name }}
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            {{ $t->gmail }}
                        </p>

                    </div>

                    <div>

                        @if($t->status == 'selesai')

                            <span class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-medium">
                                Selesai
                            </span>

                        @else

                            <span class="bg-orange-100 text-orange-500 px-4 py-2 rounded-full text-sm font-medium">
                                Pending
                            </span>

                        @endif

                    </div>

                </div>

                <p class="text-gray-700 leading-relaxed mt-5">
                    {{ $t->keluhan }}
                </p>

                @if($t->status == 'pending')

                    <a href="/service-center/selesai/{{ $t->kd_keluhan }}"
                       class="inline-block mt-5 bg-[#7f9cf5] hover:bg-[#667eea] transition text-white px-5 py-2 rounded-xl text-sm shadow-md">

                       Tandai Selesai

                    </a>

                @endif

            </div>

            @endforeach

        </div>

    </div>

</div>

<!-- FOOTER -->
<footer class="bg-gradient-to-r from-[#fbc2eb]/20 to-[#a6c1ee]/20 text-gray-700 pt-10 pb-6 px-10 border-t border-gray-200">

    <div class="text-center text-sm text-gray-500">
        © 2026 Relove Cloth • Donasi pakaian untuk membantu sesama
    </div>

</footer>

</body>
</html>