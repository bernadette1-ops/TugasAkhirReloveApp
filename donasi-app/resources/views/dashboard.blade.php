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

    @php
        $user = session('user');

        $notifDonasi = collect();

        if ($user && isset($user['name'])) {
            $notifDonasi = \App\Models\Donasi::where('pengirim', $user['name'])
                ->where(function ($q) {
                    $q->where('notif_read', 0)
                        ->orWhereNull('notif_read');
                })
                ->latest()
                ->get();
        }
    @endphp

    <div class="flex justify-between items-center px-10 py-4 bg-white shadow sticky top-0 z-50">

        <div class="flex items-center gap-3">
            <img src="{{ asset('pong.png') }}" class="w-10 h-10 rounded-xl object-cover">
            <h1 class="font-semibold text-lg text-gray-800">Relove Cloth</h1>
        </div>

        <div class="flex gap-4 items-center">

            <a href="/dashboard"
                class="flex flex-col items-center px-4 py-2 rounded-xl bg-[#7f9cf5]/15 text-[#667eea] relative">
                <img src="{{ asset('home.jpg') }}" class="w-6 h-6 mb-1">
                <span class="text-xs font-medium">Home</span>
                <div class="absolute -bottom-1 w-8 h-1 bg-[#7f9cf5] rounded-full"></div>
            </a>

            <a href="/donasi"
                class="flex flex-col items-center px-4 py-2 rounded-xl text-gray-600 hover:bg-[#7f9cf5]/10 hover:text-[#667eea]">
                <img src="{{ asset('donasi.png') }}" class="w-6 h-6 mb-1">
                <span class="text-xs">Donasi</span>
            </a>

            <div class="relative">
                <button onclick="toggleNotifDropdown()"
                    class="flex flex-col items-center text-gray-600 hover:text-[#667eea] relative">

                    <img src="{{ asset('notif.png') }}" class="w-6 h-6 mb-1">

                    @if($notifDonasi->count() > 0)
                        <span id="notifBadge" class="absolute top-0 right-2 w-2 h-2 bg-pink-500 rounded-full"></span>
                    @else
                        <span id="notifBadge" class="hidden absolute top-0 right-2 w-2 h-2 bg-pink-500 rounded-full"></span>
                    @endif

                    <span class="text-xs">Notification</span>
                </button>

                <div id="notificationDropdown"
                    class="hidden absolute right-0 mt-2 w-72 bg-white shadow-xl rounded-2xl border z-50">

                    <div class="p-3 border-b text-sm font-semibold">
                        Notifications
                    </div>

                    <div class="p-3 text-xs text-gray-500">

                        @forelse($notifDonasi as $n)

                            <a href="/donasi/tracking/{{ $n->kd_barang }}?read=1"
                                class="block p-3 mb-2 rounded-lg bg-amber-50 hover:bg-amber-100 border-l-4 border-amber-400">

                                📦 Donasi sedang dikirim

                                <div class="text-[10px] text-gray-500 mt-1">
                                    {{ $n->barang }} - {{ $n->jumlah }} pcs
                                </div>

                            </a>

                        @empty
                            <div class="text-gray-500 text-sm">Belum ada notifikasi</div>
                        @endforelse

                    </div>
                </div>

            </div>

            <a href="/profile"
                class="flex flex-col items-center px-4 py-2 rounded-xl text-gray-600 hover:bg-[#7f9cf5]/10 hover:text-[#667eea]">
                <img src="{{ asset('profile.png') }}" class="w-6 h-6 mb-1 rounded-full">
                <span class="text-xs">Profile</span>
            </a>

        </div>
    </div>

    <div class="relative h-[500px]">
        <img src="{{ asset('d2.jpg') }}" class="w-full h-full object-cover">

        <div
            class="absolute inset-0 bg-gradient-to-r from-[#fbc2eb]/60 to-[#a6c1ee]/60 flex flex-col justify-center items-center text-center text-white px-6">

            <h1 class="text-5xl font-semibold mb-4 leading-tight drop-shadow-lg">
                Berbagi Pakaian<br>
                Untuk Kehidupan Lebih Layak
            </h1>

            <p class="max-w-xl text-white/90">
                Pakaian yang tidak lagi digunakan dapat memberikan manfaat besar bagi orang lain.
            </p>

        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 w-full m-0 p-0 clear-both">

        <div class="bg-[#fbc2eb]/30 py-8 px-6 text-center flex flex-col justify-center items-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">5000+</h2>
            <p class="text-sm text-gray-700 max-w-xs mx-auto">pakaian berhasil didonasikan</p>
        </div>

        <div class="bg-[#a6c1ee]/30 py-8 px-6 text-center flex flex-col justify-center items-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">1200+</h2>
            <p class="text-sm text-gray-700 max-w-xs mx-auto">penerima telah terbantu</p>
        </div>

        <div class="bg-[#7f9cf5]/20 py-8 px-6 text-center flex flex-col justify-center items-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-1">300+</h2>
            <p class="text-sm text-gray-700 max-w-xs mx-auto">donatur aktif bergabung</p>
        </div>

    </div>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-8 md:px-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-20 items-center">

                <div class="w-full h-[450px] md:h-[550px] overflow-hidden rounded-3xl shadow-xl">
                    <img src="donasi02.jpg" alt="Tentang Relove Cloth"
                        class="w-full h-full object-cover transform hover:scale-105 transition duration-500" />
                </div>

                <div class="flex flex-col justify-center space-y-8">
                    <span class="text-base font-bold tracking-widest text-[#667eea] uppercase">
                        Tentang Kami
                    </span>

                    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                        Wadah Berbagi Pakaian untuk Sesama
                    </h2>

                    <div class="space-y-6 text-gray-600 text-lg md:text-xl leading-relaxed">
                        <p>
                            <strong class="text-gray-900 font-bold">Relove Cloth</strong> merupakan platform donasi
                            pakaian yang hadir sebagai wadah untuk membantu masyarakat berbagi kepada sesama dengan
                            lebih mudah, aman, dan terorganisir.
                        </p>
                        <p>
                            Setiap pakaian yang sudah tidak kamu gunakan, ternyata masih memiliki nilai manfaat yang
                            sangat besar bagi orang lain yang sedang membutuhkan di luar sana.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="bg-gray-100 py-20 px-10">

        <h2 class="text-4xl font-semibold text-center text-[#7f9cf5] mb-14">
            Visi & Misi
        </h2>

        <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">

            <div
                class="group bg-gradient-to-br from-[#fbc2eb]/40 to-white rounded-2xl p-10 shadow-sm border border-[#fbc2eb]/40 transition hover:-translate-y-2 hover:shadow-2xl">
                <h3 class="text-2xl font-semibold mb-5 text-[#d946ef] group-hover:text-[#7f9cf5]">
                    Visi
                </h3>
                <p class="text-gray-600">
                    Menjadi platform donasi pakaian terpercaya yang membangun budaya berbagi.
                </p>
            </div>

            <div
                class="group bg-gradient-to-br from-[#a6c1ee]/40 to-white rounded-2xl p-10 shadow-sm border border-[#a6c1ee]/40 transition hover:-translate-y-2 hover:shadow-2xl">
                <h3 class="text-2xl font-semibold mb-5 text-[#3b82f6] group-hover:text-[#667eea]">
                    Misi
                </h3>
                <p class="text-gray-600">
                    Mempermudah donasi dan memastikan penyaluran tepat sasaran.
                </p>
            </div>

        </div>
    </div>

    <div class="bg-white py-24 px-10">

        <div class="max-w-6xl mx-auto">

            <h2 class="text-4xl font-semibold text-[#7f9cf5] mb-6 text-center">

                Skema Pengelolaan Barang

            </h2>

            <p class="text-center text-gray-600 leading-relaxed max-w-4xl mx-auto mb-20 text-lg">

                Setiap barang yang disedekahkan oleh para dermawan tidak langsung disalurkan begitu saja.
                Agar manfaatnya tepat sasaran dan bernilai keberkahan, Relove Cloth memiliki sistem
                pengelolaan terstruktur mulai dari penghimpunan, penyortiran, distribusi hingga dokumentasi.

            </p>

            <div class="relative">

                <div
                    class="absolute left-5 top-0 w-1 h-full bg-gradient-to-b from-[#fbc2eb] via-[#a6c1ee] to-[#7f9cf5] rounded-full">
                </div>

                <div class="space-y-16">

                    <div class="relative pl-20">

                        <div
                            class="absolute left-0 top-1 w-10 h-10 rounded-full bg-[#fbc2eb] shadow-lg border-4 border-white">
                        </div>

                        <h3 class="text-2xl font-semibold text-[#d946ef] mb-3">
                            Penghimpunan
                        </h3>

                        <p class="text-gray-600 leading-relaxed">

                            Barang donasi diperoleh dari berbagai jalur seperti layanan jemput gratis,
                            drop point, hingga pengiriman melalui ekspedisi.

                        </p>

                    </div>

                    <div class="relative pl-20">

                        <div
                            class="absolute left-0 top-1 w-10 h-10 rounded-full bg-[#a6c1ee] shadow-lg border-4 border-white">
                        </div>

                        <h3 class="text-2xl font-semibold text-[#3b82f6] mb-3">
                            Penyortiran
                        </h3>

                        <p class="text-gray-600 leading-relaxed">

                            Barang akan dipilah sesuai kategori untuk memastikan
                            penyaluran sesuai kebutuhan penerima manfaat.

                        </p>

                    </div>

                    <div class="relative pl-20">

                        <div
                            class="absolute left-0 top-1 w-10 h-10 rounded-full bg-[#7f9cf5] shadow-lg border-4 border-white">
                        </div>

                        <h3 class="text-2xl font-semibold text-[#667eea] mb-3">
                            Perbaikan & Daur Ulang
                        </h3>

                        <p class="text-gray-600 leading-relaxed">

                            Barang yang masih layak namun rusak ringan akan diperbaiki,
                            sementara barang tidak layak akan didaur ulang.

                        </p>

                    </div>

                    <div class="relative pl-20">

                        <div
                            class="absolute left-0 top-1 w-10 h-10 rounded-full bg-[#fbc2eb] shadow-lg border-4 border-white">
                        </div>

                        <h3 class="text-2xl font-semibold text-[#d946ef] mb-3">
                            Distribusi
                        </h3>

                        <p class="text-gray-600 leading-relaxed">

                            Barang yang siap akan disalurkan kepada masyarakat,
                            panti asuhan, dan penerima manfaat lainnya.

                        </p>

                    </div>

                    <div class="relative pl-20">

                        <div
                            class="absolute left-0 top-1 w-10 h-10 rounded-full bg-[#7f9cf5] shadow-lg border-4 border-white">
                        </div>

                        <h3 class="text-2xl font-semibold text-[#667eea] mb-3">
                            Dokumentasi
                        </h3>

                        <p class="text-gray-600 leading-relaxed">

                            Seluruh proses didokumentasikan sebagai bentuk transparansi
                            kepada para donatur.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="px-10 py-20 bg-gray-50">

        <div class="flex justify-between items-center mb-10">

            <div>

                <h2 class="text-4xl font-semibold text-[#7f9cf5] mb-2">

                    Donasi Terbaru

                </h2>

                <p class="text-gray-600">

                    Lihat berbagai donasi yang telah dibagikan oleh para donatur.

                </p>

            </div>

        </div>

        <div class="grid md:grid-cols-3 gap-8">

            @forelse($donasi as $item)

                <div
                    class="bg-white rounded-2xl shadow-sm hover:shadow-2xl transition duration-300 border border-gray-100 overflow-hidden">

                    <div class="bg-gradient-to-r from-[#fbc2eb]/40 to-[#a6c1ee]/40 p-5">

                        <div class="flex justify-between items-center">

                            <h3 class="font-semibold text-xl text-gray-800">

                                {{ $item->barang }}

                            </h3>

                            <span class="bg-white text-[#667eea] px-4 py-1 rounded-full text-xs font-medium shadow-sm">

                                {{ $item->jumlah }}

                            </span>

                        </div>

                    </div>

                    <div class="p-6">

                        <p class="text-gray-600 text-sm leading-relaxed mb-6">

                            {{ $item->keterangan }}

                        </p>

                        <p class="text-sm text-gray-500">

                            oleh <span class="font-medium text-gray-700">{{ $item->pengirim }}</span>

                        </p>

                    </div>

                </div>

            @empty

                <div class="col-span-3 text-center py-14">

                    <div class="text-7xl mb-4">
                        🎁
                    </div>

                    <h3 class="text-2xl font-semibold text-gray-700 mb-2">

                        Belum Ada Donasi

                    </h3>

                    <p class="text-gray-500">

                        Jadilah orang pertama yang membagikan kebaikan hari ini.

                    </p>

                </div>

            @endforelse

        </div>

    </div>

    <div class="px-10 py-24 bg-gradient-to-r from-[#fbc2eb]/30 to-[#a6c1ee]/30 text-center">

        <h2 class="text-4xl font-semibold text-[#667eea] mb-5">

            Yuk Mulai Berdonasi

        </h2>

        <p class="max-w-2xl mx-auto text-gray-600 leading-relaxed mb-8 text-lg">

            Pakaian yang sudah tidak digunakan bisa menjadi harapan baru
            bagi mereka yang membutuhkan.

        </p>

        <a href="/donasi" class="inline-block bg-[#7f9cf5] hover:bg-[#667eea]
              transition duration-300 text-white px-10 py-4 rounded-2xl
              shadow-xl text-lg font-medium hover:-translate-y-1">

            Mulai Donasi

        </a>

    </div>

    <footer
        class="bg-gradient-to-r from-[#fbc2eb]/20 to-[#a6c1ee]/20 text-gray-700 pt-14 pb-6 px-10 border-t border-gray-200">

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
                        <a href="/donasi" class="hover:text-[#7f9cf5] transition">
                            Donasi
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
                    Informasi
                </h3>

                <ul class="space-y-2 text-sm text-gray-600">

                    <li>
                        Donasi pakaian layak pakai
                    </li>

                    <li>
                        Penyaluran tepat sasaran
                    </li>

                    <li>
                        Transparan & terpercaya
                    </li>

                </ul>

            </div>

            <div>

                <h3 class="text-gray-800 font-medium mb-3">
                    Kontak
                </h3>

                <div class="space-y-3 text-sm text-gray-600">

                    <p>
                        +62 812-3456-7890
                    </p>

                    <p>
                        relove@email.com
                    </p>

                    <p>
                        @relovecloth
                    </p>

                </div>

            </div>

        </div>

        <div class="text-center text-sm text-gray-500 border-t border-gray-200 pt-4">

            © 2026 Relove Cloth • Donasi pakaian untuk membantu sesama

        </div>

    </footer>


    <script>
        function toggleNotifDropdown() {
            const dropdown = document.getElementById('notificationDropdown');
            dropdown.classList.toggle('hidden');

            const badge = document.getElementById('notifBadge');
            if (badge) badge.classList.add('hidden');
        }

        function simulasiKirimDonasi() {
            const listKonten = document.getElementById('notificationList');
            const emptyNotif = document.getElementById('emptyNotif');
            const badge = document.getElementById('notifBadge');

            if (emptyNotif) emptyNotif.remove();

            badge.classList.remove('hidden');

            const idDonasi = 'RLV-' + Math.floor(1000 + Math.random() * 9000);
            const idElemenNotif = 'item-' + idDonasi;

            const notifBaru = `
        <div id="${idElemenNotif}" class="p-4 transition duration-500 bg-amber-50" style="border-left: 4px solid #f59e0b;">
            <p class="text-xs text-amber-700 font-bold">📦 Pakaian Sedang Dikirim</p>
            <p class="text-xs text-gray-600 mt-1">Donasi <span class="font-bold text-gray-800">#${idDonasi}</span> kamu sedang dalam perjalanan kurir menuju lokasi.</p>
            <span class="text-[10px] text-gray-400 block mt-2">Baru saja</span>
        </div>
    `;

            listKonten.insertAdjacentHTML('afterbegin', notifBaru);
            alert('Donasi dikirim! Coba cek menu "Notif" di navbar atas.');

            setTimeout(() => {
                const itemNotif = document.getElementById(idElemenNotif);
                if (itemNotif) {

                    itemNotif.className = "p-4 transition duration-500 bg-green-50";
                    itemNotif.style.borderLeft = "4px solid #10b981";

                    itemNotif.innerHTML = `
                <p class="text-xs text-green-700 font-bold">✅ Donasi Telah Sampai!</p>
                <p class="text-xs text-gray-600 mt-1">Alhamdulillah, paket pakaian kamu (<span class="font-semibold text-gray-800">#${idDonasi}</span>) sudah diterima oleh petugas Relove Cloth di posko.</p>
                <div class="flex justify-between items-center mt-2">
                    <span class="text-[10px] text-gray-400">Baru saja tiba</span>
                    <a href="#" class="text-[10px] text-blue-600 font-medium hover:underline">Lihat Foto</a>
                </div>
            `;

                    badge.classList.remove('hidden');
                }
            }, 7000);
        }
    </script>

</body>

</html>