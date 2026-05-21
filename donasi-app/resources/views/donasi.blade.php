<!DOCTYPE html>
<html>

<head>
    <title>Donasi</title>

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

                    @if(count($notifDonasi) > 0)
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

    <div class="relative h-[420px]">

        <img src="{{ asset('d1.jpg') }}" class="w-full h-full object-cover">

        <div
            class="absolute inset-0 bg-gradient-to-r from-[#fbc2eb]/70 to-[#a6c1ee]/70 flex flex-col justify-center items-center text-center px-6">

            <h1 class="text-5xl font-semibold text-gray-800 mb-6">
                Donasikan Pakaianmu
            </h1>

            <a href="/donasi_create"
                class="bg-[#7f9cf5] hover:bg-[#667eea] text-white px-8 py-4 rounded-xl shadow-lg font-medium transition mb-6">
                Mulai Berdonasi
            </a>

        </div>

    </div>

    <div class="max-w-7xl mx-auto px-10 py-16">

        <h2 class="text-3xl font-semibold text-gray-800 mb-10 text-center">
            Donasi yang telah diberikan
        </h2>

        <div class="grid md:grid-cols-3 gap-8">

            @foreach($donasi as $d)

                    <div class="bg-white rounded-3xl shadow-lg p-6 hover:shadow-xl transition">

                        <a href="/donasi/{{ $d->kd_barang }}" class="block">

                            <img src="{{ asset('donasi_img/' . $d->gambar) }}"
                                class="rounded-2xl mb-5 w-full h-48 object-cover">

                            <h3 class="text-xl font-semibold text-gray-800">
                                {{ $d->barang }}
                            </h3>

                            <p class="text-gray-600 mt-2">
                                Jumlah: {{ $d->jumlah }}
                            </p>

                            <p class="text-sm font-semibold mt-2">
                                Status :
                                <span class="
                                        px-3 py-1 rounded-full text-xs
                                        {{ $d->status == 'pending'
                ? 'bg-yellow-100 text-yellow-700'
                : 'bg-green-100 text-green-700' }}">
                                    {{ ucfirst($d->status ?? 'pending') }}
                                </span>
                            </p>

                            <div class="mt-4 text-sm text-gray-400">
                                Donatur: {{ $d->pengirim }}
                            </div>

                        </a>

                        @if(session('user') && $d->pengirim == session('user')['name'])
                            <div class="flex gap-3 mt-5">

                                <button onclick="openEdit(
                                                        '{{ $d->kd_barang }}',
                                                        '{{ $d->barang }}',
                                                        '{{ $d->jumlah }}',
                                                        '{{ $d->keterangan }}'
                                                    )"
                                    class="flex-1 bg-[#7f9cf5] hover:bg-[#667eea] text-white py-2 rounded-xl text-sm shadow-md">

                                    Edit
                                </button>

                                <a href="/donasi/delete/{{ $d->kd_barang }}"
                                    class="flex-1 bg-red-400 hover:bg-red-500 text-white py-2 rounded-xl text-sm text-center shadow-md">
                                    Delete
                                </a>

                            </div>
                        @endif

                    </div>

            @endforeach

        </div>

    </div>

    <div id="editModal" class="hidden fixed inset-0 bg-black/50 justify-center items-center z-50">

        <div class="bg-white rounded-3xl p-8 w-[420px] shadow-2xl">

            <h3 class="text-2xl font-semibold text-gray-800 mb-6">
                Edit Donasi
            </h3>

            <form id="editForm" method="POST" class="space-y-5">
                @csrf

                <input type="text" name="barang" id="edit_barang" class="w-full px-4 py-3 rounded-xl border bg-gray-50">

                <input type="number" name="jumlah" id="edit_jumlah"
                    class="w-full px-4 py-3 rounded-xl border bg-gray-50">

                <textarea name="keterangan" id="edit_keterangan" rows="4"
                    class="w-full px-4 py-3 rounded-xl border bg-gray-50"></textarea>

                <button type="submit" class="w-full bg-[#7f9cf5] hover:bg-[#667eea] text-white py-3 rounded-xl">
                    Update
                </button>
            </form>

            <button onclick="closeModal()" class="w-full mt-3 bg-gray-200 hover:bg-gray-300 py-3 rounded-xl">
                Cancel
            </button>

        </div>

    </div>

    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    <script>

        function openEdit(id, barang, jumlah, keterangan) {

            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');

            document.getElementById('edit_barang').value = barang;
            document.getElementById('edit_jumlah').value = jumlah;
            document.getElementById('edit_keterangan').value = keterangan;

            document.getElementById('editForm').action = "/donasi/update/" + id;
        }

        function closeModal() {

            document.getElementById('editModal').classList.remove('flex');
            document.getElementById('editModal').classList.add('hidden');

        }

    </script>

    <script>
        function toggleNotifDropdown() {
            const dropdown = document.getElementById('notificationDropdown');
            dropdown.classList.toggle('hidden');

            const badge = document.getElementById('notifBadge');
            badge.classList.add('hidden');
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

    <div class="mt-16 pt-8 border-t text-center text-sm text-gray-600 pb-10">
        <p>
            Apabila ada masalah, anda dapat menghubungi
            <a href="{{ route('service.center') }}" class="text-[#667eea] font-semibold hover:underline">
                Service Center
            </a>
        </p>
    </div>

</body>

</html>