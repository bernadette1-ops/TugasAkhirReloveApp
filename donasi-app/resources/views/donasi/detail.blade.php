<!DOCTYPE html>
<html>
<head>
    <title>Detail Donasi</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
    .flip-container {
        perspective: 1000px;
    }

    .flip-icon {
        transition: transform .6s, scale .3s;
        transform-style: preserve-3d;
    }

    .flip-container:hover .flip-icon {
        transform: rotateY(180deg);
        scale: 1.15;
    }
    </style>
</head>

<body class="bg-gray-100">
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

<div class="max-w-6xl mx-auto p-10">

    <a href="/donasi"
       class="mb-6 inline-block bg-gray-300 px-4 py-2 rounded-lg">
        ← Kembali
    </a>

    <div class="bg-white rounded-3xl shadow-xl p-8 flex gap-10">

        <div class="w-1/2">
            <img src="{{ asset('donasi_img/'.$donasi->gambar) }}"
                 class="rounded-2xl w-full h-[400px] object-cover">
        </div>

        <div class="w-1/2 space-y-4">

            <h1 class="text-3xl font-bold">
                {{ $donasi->barang }}
            </h1>

            <p><b>Daerah:</b> {{ $donasi->daerah ?? '-' }}</p>

            <p><b>Jumlah:</b> {{ $donasi->jumlah }}</p>

            <p><b>Keterangan:</b></p>

            <div class="bg-gradient-to-br from-purple-50 to-blue-50 
                        border border-purple-100
                        rounded-2xl 
                        p-5 
                        text-gray-700 
                        leading-relaxed
                        shadow-sm">

                {{ $donasi->keterangan ?? 'Tidak ada keterangan' }}

            </div>

            <p>
                <strong>Status:</strong>

                @if($donasi->status == 1)
                    <span class="text-yellow-600 font-semibold">
                        Pending
                    </span>
                @else
                    <span class="text-green-600 font-semibold">
                        Selesai
                    </span>
                @endif
            </p>

            @if(session('user') && (
                session('user')['role'] === 'admin'
                || $donasi->pengirim == session('user')['name'] ?? ''
            ))

            <div class="flex gap-4 mt-6">

            <button onclick="openEdit(
                '{{ $donasi->kd_barang }}',
                '{{ $donasi->barang }}',
                '{{ $donasi->daerah }}',
                '{{ $donasi->jumlah }}',
                '{{ $donasi->keterangan }}'
            )"
            class="flex-1 bg-[#7f9cf5] hover:bg-[#667eea] text-white py-3 rounded-xl shadow-md">
                Edit Donasi
            </button>

                <a href="/donasi/delete/{{ $donasi->kd_barang }}"
                class="flex-1 bg-red-400 hover:bg-red-500 text-white py-3 rounded-xl text-center shadow-md">
                    Hapus Donasi
                </a>

            </div>

            @endif
        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-xl p-8 mt-10">

        <h2 class="text-xl font-semibold mb-5">
            Uploaded Picture
        </h2>

        @if($donasi->gambar)
            <img src="{{ asset('donasi_img/'.$donasi->gambar) }}"
                 class="w-72 rounded-xl shadow">
        @else
            <p class="text-gray-500">No picture</p>
        @endif

    </div>

</div>
<div id="editModal"
     class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white rounded-3xl p-8 w-[450px] shadow-2xl">

        <h2 class="text-xl font-semibold mb-5">Edit Donasi</h2>

        <form id="editForm" method="POST" class="space-y-4">
            @csrf

            <input type="text" name="barang" id="edit_barang"
                   class="w-full border px-4 py-3 rounded-xl"
                   placeholder="Nama Barang">

            <select name="daerah" id="edit_daerah"
                class="w-full border px-4 py-3 rounded-xl bg-gray-50">

                <option value="">-- Pilih Daerah --</option>

                <option value="Lowokwaru">Lowokwaru</option>
                <option value="Blimbing">Blimbing</option>
                <option value="Klojen">Klojen</option>
                <option value="Sukun">Sukun</option>
                <option value="Kedungkandang">Kedungkandang</option>

            </select>

            <input type="number" name="jumlah" id="edit_jumlah"
                   class="w-full border px-4 py-3 rounded-xl"
                   placeholder="Jumlah">

            <textarea name="keterangan" id="edit_keterangan"
                      class="w-full border px-4 py-3 rounded-xl"
                      rows="4"
                      placeholder="Keterangan"></textarea>

            <button type="submit"
                    class="w-full bg-[#7f9cf5] text-white py-3 rounded-xl hover:bg-[#667eea]">
                Update
            </button>
        </form>

        <button onclick="closeEdit()"
                class="w-full mt-3 bg-gray-200 py-3 rounded-xl">
            Cancel
        </button>

    </div>
</div>

<script>

function openEdit(id, barang, daerah, jumlah, keterangan) {

    document.getElementById('editModal').classList.remove('hidden');

    document.getElementById('edit_barang').value = barang;
    document.getElementById('edit_daerah').value = daerah;
    document.getElementById('edit_jumlah').value = jumlah;
    document.getElementById('edit_keterangan').value = keterangan;

    document.getElementById('editForm').action = "/donasi/update/" + id;
}

function closeEdit() {
    document.getElementById('editModal').classList.add('hidden');
}

</script>

</body>
</html>x    