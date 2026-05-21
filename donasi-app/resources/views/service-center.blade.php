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
    <div class="flex justify-between items-center px-10 py-4 bg-white shadow sticky top-0 z-50">

        <div class="flex items-center gap-3">
            <img src="{{ asset('pong.png') }}" class="w-10 h-10 rounded-xl object-cover">
            <h1 class="font-semibold text-lg text-gray-800">Relove Cloth</h1>
        </div>

        <div class="flex gap-4 items-center">

            <a href="/dashboard"
                class="flex flex-col items-center px-4 py-2 rounded-xl text-gray-600 hover:bg-[#7f9cf5]/10 hover:text-[#667eea]">
                <img src="{{ asset('home.jpg') }}" class="w-6 h-6 mb-1">
                <span class="text-xs">Home</span>
            </a>

            <a href="/donasi"
                class="flex flex-col items-center px-4 py-2 rounded-xl bg-[#7f9cf5]/15 text-[#667eea] relative">
                <img src="{{ asset('donasi.png') }}" class="w-6 h-6 mb-1">
                <span class="text-xs font-medium">Donasi</span>
                <div class="absolute -bottom-1 w-8 h-1 bg-[#7f9cf5] rounded-full"></div>
            </a>

            <div class="relative">

                <button onclick="toggleNotifDropdown()"
                    class="flex flex-col items-center text-gray-600 hover:text-[#667eea] relative">

                    <img src="{{ asset('notif.png') }}" class="w-6 h-6 mb-1">

                    @if($notifDonasi->count())
                        <span class="absolute top-0 right-2 w-2 h-2 bg-pink-500 rounded-full"></span>
                    @endif

                    <span class="text-xs">Notif</span>
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
                            <div>Belum ada notifikasi</div>
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

    <div class="max-w-7xl mx-auto px-10 py-16">

        <div class="grid md:grid-cols-2 gap-10 items-start">

            <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">

                <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                    Kirim Pengaduan
                </h2>

                <form method="POST" action="/service-center" class="space-y-5">

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

                        <input type="email" name="gmail" placeholder="Masukkan email" required
                            class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">

                    </div>

                    <div>

                        <label class="text-sm font-medium text-gray-700">
                            Keluhan
                        </label>

                        <textarea name="keluhan" rows="5" placeholder="Tulis keluhan atau masukan" required
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

                <img src="{{ asset('sc2.jpg') }}" class="rounded-2xl mt-8 shadow-lg w-full h-72 object-cover">

            </div>

        </div>

    </div>

    @php
        $isAdmin = (session('user')['email'] ?? null) === 'admin@gmail.com';
    @endphp

    @if($isAdmin)

        <div class="px-10 pb-20">

            <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100">

                <div class="px-8 py-6 border-b border-gray-100">
                    <h2 class="text-2xl font-semibold text-gray-800">
                        Riwayat Pengaduan
                    </h2>
                </div>

                <div class="p-8 space-y-6">

                    @forelse($tickets as $t)

                        <div
                            class="bg-gradient-to-r from-[#fbc2eb]/10 to-[#a6c1ee]/10 border border-gray-100 rounded-2xl p-6 shadow-sm">

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
                                    @if($t->status === 'selesai')
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

                            @if($t->status === 'pending')
                                <a href="/service-center/selesai/{{ $t->kd_keluhan }}"
                                    class="inline-block mt-5 bg-[#7f9cf5] hover:bg-[#667eea] transition text-white px-5 py-2 rounded-xl text-sm shadow-md">
                                    Tandai Selesai
                                </a>
                            @endif

                        </div>

                    @empty
                        <div class="text-gray-500 text-sm">
                            Belum ada pengaduan.
                        </div>
                    @endforelse

                </div>

            </div>
        </div>

    @endif
    <footer
        class="bg-gradient-to-r from-[#fbc2eb]/20 to-[#a6c1ee]/20 text-gray-700 pt-10 pb-6 px-10 border-t border-gray-200">

        <div class="text-center text-sm text-gray-500">
            © 2026 Relove Cloth • Donasi pakaian untuk membantu sesama
        </div>

    </footer>
    </div>
    </div>

</body>

</html>