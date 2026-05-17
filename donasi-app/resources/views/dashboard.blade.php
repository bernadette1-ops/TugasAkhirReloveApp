<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

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

<body class="font-[Poppins] bg-white">

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
           class="hover:text-[#7f9cf5] transition text-gray-700">
           Profile
        </a>

    </div>

</div>

<!-- HERO -->
<div class="relative h-[500px]">

    <img src="{{ asset('donasi01.jpg') }}"
         class="w-full h-full object-cover">

    <div class="absolute inset-0 bg-gradient-to-r from-[#fbc2eb]/60 to-[#a6c1ee]/60 flex flex-col justify-center items-center text-center text-white px-6">

        <h1 class="text-5xl font-semibold mb-4 leading-tight text-gray-800">

            Berbagi Pakaian<br>
            Untuk Kehidupan Lebih Layak

        </h1>

        <p class="max-w-xl text-gray-700 mb-6 leading-relaxed">

            Pakaian yang tidak lagi digunakan dapat memberikan manfaat besar bagi orang lain.
            Mari bersama menyalurkan donasi pakaian kepada mereka yang membutuhkan.

        </p>

        <a href="/donasi"
           class="bg-[#7f9cf5] px-6 py-3 rounded-lg font-medium hover:bg-[#667eea] transition shadow-lg text-white">

           Donasikan Sekarang

        </a>

    </div>

</div>

<!-- FITUR -->
<div class="grid md:grid-cols-3">

    <div class="bg-[#fbc2eb]/30 text-gray-800 p-8 text-center">

        <h2 class="font-semibold text-lg mb-2">
            Donasi Pakaian
        </h2>

        <p class="text-sm text-gray-600">
            Salurkan pakaian layak pakai kepada yang membutuhkan
        </p>

    </div>

    <div class="bg-[#a6c1ee]/30 text-gray-800 p-8 text-center">

        <h2 class="font-semibold text-lg mb-2">
            Bantu Sesama
        </h2>

        <p class="text-sm text-gray-600">
            Setiap donasi memberikan dampak nyata
        </p>

    </div>

    <div class="bg-[#7f9cf5]/20 text-gray-800 p-8 text-center">

        <h2 class="font-semibold text-lg mb-2">
            Sebarkan Kebaikan
        </h2>

        <p class="text-sm text-gray-600">
            Bersama kita bisa membuat perubahan
        </p>

    </div>

</div>

<!-- MISI -->
<div class="grid md:grid-cols-2 gap-12 px-10 py-16 items-center">

    <img src="{{ asset('donasi02.jpg') }}"
         class="rounded-2xl shadow-lg">

    <div>

        <h2 class="text-3xl font-semibold mb-4 text-[#7f9cf5]">

            Misi Kami

        </h2>

        <p class="text-gray-600 mb-4 leading-relaxed">

            Relove Cloth hadir sebagai platform yang bertujuan untuk memudahkan masyarakat
            dalam menyalurkan pakaian layak pakai kepada mereka yang membutuhkan.

        </p>

        <p class="text-gray-600 mb-4 leading-relaxed">

            Kami menghubungkan donatur dengan penerima secara lebih efektif.

        </p>

        <p class="text-gray-600 mb-6 leading-relaxed">

            Setiap kontribusi memiliki arti besar bagi mereka yang membutuhkan.

        </p>

        <a href="/donasi"
           class="bg-[#7f9cf5] px-6 py-3 rounded-lg hover:bg-[#667eea] transition text-white shadow-md">

           Mulai Donasi

        </a>

    </div>

</div>

<!-- BANTU -->
<div class="bg-gray-100 py-16 text-center">

    <h2 class="text-2xl font-semibold mb-10 text-gray-800">

        Bagaimana Kamu Bisa Membantu?

    </h2>

    <div class="grid md:grid-cols-3 gap-8 px-10">

        <div class="group bg-gradient-to-br from-[#fbc2eb]/40 to-white rounded-xl p-8
                    shadow-sm border border-[#fbc2eb]/40
                    transition duration-300 transform hover:-translate-y-2 hover:shadow-xl active:scale-95 cursor-pointer">

            <h3 class="font-semibold mb-2 text-[#d946ef] group-hover:text-[#7f9cf5] transition">

                Donasikan

            </h3>

            <p class="text-gray-600 text-sm">

                Berikan pakaian yang sudah tidak digunakan namun masih layak pakai.

            </p>

        </div>

        <div class="group bg-gradient-to-br from-[#a6c1ee]/40 to-white rounded-xl p-8
                    shadow-sm border border-[#a6c1ee]/40
                    transition duration-300 transform hover:-translate-y-2 hover:shadow-xl active:scale-95 cursor-pointer">

            <h3 class="font-semibold mb-2 text-[#3b82f6] group-hover:text-[#667eea] transition">

                Sebarkan

            </h3>

            <p class="text-gray-600 text-sm">

                Ajak orang lain untuk ikut berbagi melalui platform ini.

            </p>

        </div>

        <div class="group bg-gradient-to-br from-[#7f9cf5]/40 to-white rounded-xl p-8
                    shadow-sm border border-[#7f9cf5]/40
                    transition duration-300 transform hover:-translate-y-2 hover:shadow-xl active:scale-95 cursor-pointer">

            <h3 class="font-semibold mb-2 text-[#7f9cf5] group-hover:text-[#4f46e5] transition">

                Dukung

            </h3>

            <p class="text-gray-600 text-sm">

                Tingkatkan kesadaran pentingnya donasi pakaian bagi sesama.

            </p>

        </div>

    </div>

</div>

<!-- DONASI -->
<div class="px-10 py-16">

    <h2 class="text-2xl font-semibold mb-6 text-gray-800">

        Donasi Pakaian Terbaru

    </h2>

    <div class="grid md:grid-cols-3 gap-6">

        @forelse($donasi as $item)

        <div class="bg-white rounded-xl shadow hover:shadow-lg transition border">

            <div class="p-5">

                <div class="flex justify-between items-center mb-3">

                    <h3 class="font-semibold text-gray-800 text-lg">
                        {{ $item->barang }}
                    </h3>

                    <span class="bg-[#7f9cf5]/10 text-[#667eea] px-3 py-1 rounded-full text-xs">
                        {{ $item->jumlah }}
                    </span>

                </div>

                <p class="text-sm text-gray-600 leading-relaxed">
                    {{ $item->keterangan }}
                </p>

                <p class="text-xs text-gray-400 mt-4 italic text-right">
                    oleh {{ $item->pengirim }}
                </p>

            </div>

        </div>

        @empty

        <div class="col-span-3 text-center text-gray-600 py-10">

            Belum ada donasi 😢

        </div>

        @endforelse

    </div>

</div>

<!-- FOOTER -->
<footer class="bg-gradient-to-r from-[#fbc2eb]/20 to-[#a6c1ee]/20 text-gray-700 pt-14 pb-6 px-10 border-t border-gray-200">

    <div class="grid md:grid-cols-4 gap-10 pb-10">

        <div>

            <h2 class="text-gray-800 text-lg font-semibold mb-3">

                Relove Cloth

            </h2>

            <p class="text-sm text-gray-600 leading-relaxed">

                Platform donasi pakaian yang menghubungkan kebaikan dari mereka
                yang memiliki dengan mereka yang membutuhkan.

            </p>

        </div>

        <div>

            <h3 class="text-gray-800 font-medium mb-3">
                Navigasi
            </h3>

            <ul class="space-y-2 text-sm">

                <li>
                    <a href="/dashboard" class="hover:text-[#7f9cf5] transition">
                        Home
                    </a>
                </li>

                <li>
                    <a href="/profile" class="hover:text-[#7f9cf5] transition">
                        Profile
                    </a>
                </li>

            </ul>

        </div>

        <div>

            <h3 class="text-gray-800 font-medium mb-3">
                Donasi
            </h3>

            <ul class="space-y-2 text-sm">

                <li>
                    <a href="/donasi" class="hover:text-[#7f9cf5] transition">
                        Tambah Donasi
                    </a>
                </li>

                <li>
                    <a href="/dashboard" class="hover:text-[#7f9cf5] transition">
                        Lihat Donasi
                    </a>
                </li>

            </ul>

        </div>

        <div>

            <h3 class="text-gray-800 font-medium mb-3">
                Kontak
            </h3>

            <p class="text-sm text-gray-600">
                Email: relove@email.com
            </p>

            <div class="flex gap-3 mt-4">

                <div class="w-8 h-8 flex items-center justify-center bg-[#fbc2eb]/40 rounded-full hover:bg-[#fbc2eb]/60 transition">
                    IG
                </div>

                <div class="w-8 h-8 flex items-center justify-center bg-[#a6c1ee]/40 rounded-full hover:bg-[#a6c1ee]/60 transition">
                    FB
                </div>

                <div class="w-8 h-8 flex items-center justify-center bg-[#7f9cf5]/30 rounded-full hover:bg-[#7f9cf5]/50 transition">
                    TW
                </div>

            </div>

        </div>

    </div>

    <div class="text-center text-sm text-gray-500 border-t border-gray-200 pt-4">

        © 2026 Relove Cloth • Donasi pakaian untuk membantu sesama

    </div>

</footer>

</body>
</html>