<!DOCTYPE html>
<html>

<head>
    <title>Tambah Donasi</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-[Poppins] bg-gray-50">
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

                    @if($notifDonasi->count() > 0)
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

    <div class="flex justify-center px-6 py-10 bg-gradient-to-br from-pink-200/30 to-purple-200/30 min-h-screen">
        <div class="w-full max-w-2xl bg-white rounded-2xl shadow-lg p-8">
            <div class="flex items-center gap-3 mb-8">
                <a href="{{ url()->previous() }}" class="text-xl text-gray-600 hover:text-[#7f9cf5] transition">
                    ←
                </a>

                <h2 class="text-2xl font-semibold text-gray-800">
                    Tambah Donasi
                </h2>

            </div>

            <form action="/donasi/store" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Upload Gambar
                    </label>

                    <input type="file" name="gambar"
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Barang yang ingin didonasikan
                    </label>

                    <input type="text" name="barang" required
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-[#7f9cf5]">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Pilih Daerah Donasi
                    </label>

                    <select name="daerah" required
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:ring-2 focus:ring-[#7f9cf5]">

                        <option value="">-- Pilih Daerah --</option>

                        <option value="Lowokwaru">Lowokwaru</option>
                        <option value="Blimbing">Blimbing</option>
                        <option value="Klojen">Klojen</option>
                        <option value="Sukun">Sukun</option>
                        <option value="Kedungkandang">Kedungkandang</option>

                    </select>
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Jumlah
                    </label>

                    <input type="number" name="jumlah" required
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Keterangan
                    </label>

                    <textarea name="keterangan" rows="4"
                        class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50"></textarea>
                </div>

                <input type="hidden" name="pengirim" value="{{ session('user')['name'] ?? 'Guest' }}">

                <button type="submit"
                    class="w-full bg-[#7f9cf5] hover:bg-[#667eea] transition text-white py-3 rounded-xl font-medium shadow-md">
                    Kirim Donasi
                </button>

            </form>

        </div>
    </div>

    @if(session('success'))

        <div id="successModal" class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">

            <div class="bg-white rounded-2xl shadow-xl p-10 text-center relative w-[400px]">

                <a href="{{ route('donasi.tracking', session('tracking_id')) }}"
                    class="absolute top-3 right-4 text-gray-400 hover:text-black text-xl">
                    ✕
                </a>

                <div class="text-green-500 text-6xl mb-4">
                    ✅
                </div>

                <h2 class="text-xl font-semibold">
                    Donasi berhasil dikirim
                </h2>

            </div>
        </div>

    @endif
</body>

</html>