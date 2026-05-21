<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { colors: { primary: '#7f9cf5', primaryDark: '#667eea' } } }
        }
    </script>
</head>

<body class="font-[Poppins] bg-white min-h-screen">

    @php
        $user = session('user');
    @endphp

    @if(!$user)
        <script>window.location.href = '/login';</script>
    @endif


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
                class="flex flex-col items-center px-4 py-2 rounded-xl text-gray-600 hover:bg-[#7f9cf5]/10 hover:text-[#667eea]">
                <img src="{{ asset('donasi.png') }}" class="w-6 h-6 mb-1">
                <span class="text-xs">Donasi</span>
            </a>

            <div class="relative">
                <button onclick="toggleNotifDropdown()"
                    class="flex flex-col items-center text-gray-600 hover:text-[#667eea] relative">
                    <img src="{{ asset('notif.png') }}" class="w-6 h-6 mb-1">
                    @if(isset($notifDonasi) && $notifDonasi->count() > 0)
                        <span class="absolute top-0 right-2 w-2 h-2 bg-pink-500 rounded-full"></span>
                    @endif
                    <span class="text-xs">Notif</span>
                </button>

                <div id="notificationDropdown"
                    class="hidden absolute right-0 mt-2 w-72 bg-white shadow-xl rounded-2xl border z-50">
                    <div class="p-3 border-b text-sm font-semibold">Notifications</div>
                    <div class="p-3 text-xs text-gray-500">
                        @forelse($notifDonasi ?? [] as $n)
                            <a href="/donasi/tracking/{{ $n->kd_barang }}?read=1"
                                class="block p-3 mb-2 rounded-lg bg-amber-50 hover:bg-amber-100 border-l-4 border-amber-400">
                                📦 Donasi sedang dikirim
                                <div class="text-[10px] text-gray-500 mt-1">{{ $n->barang }} - {{ $n->jumlah }} pcs</div>
                            </a>
                        @empty
                            <div>Belum ada notifikasi</div>
                        @endforelse
                    </div>
                </div>
            </div>

            <a href="/profile"
                class="flex flex-col items-center px-4 py-2 rounded-xl bg-[#7f9cf5]/15 text-[#667eea] relative">
                <img src="{{ asset('profile.png') }}" class="w-6 h-6 mb-1 rounded-full">
                <span class="text-xs font-medium">Profile</span>
                <div class="absolute -bottom-1 w-8 h-1 bg-[#7f9cf5] rounded-full"></div>
            </a>

        </div>
    </div>

    <div class="relative h-[280px]">
        <img src="{{ asset('p1.jpg') }}" class="w-full h-full object-cover">
        <div
            class="absolute inset-0 bg-gradient-to-r from-[#fbc2eb]/70 to-[#a6c1ee]/70 flex flex-col justify-center items-center text-center px-6">
            <h1 class="text-4xl font-semibold text-gray-800 mb-4">Profile Pengguna</h1>
            <p class="max-w-2xl text-gray-700 leading-relaxed">
                Kelola informasi akun dan perbarui data profilmu dengan mudah.
            </p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-10 py-16">
        <div class="grid md:grid-cols-2 gap-10 items-center">

            <div class="bg-gradient-to-br from-[#fbc2eb]/30 to-[#a6c1ee]/30 rounded-3xl p-10 shadow-lg">
                <h2 class="text-3xl font-semibold text-gray-800 mb-5">Relove Cloth</h2>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Terima kasih telah menjadi bagian dari Relove Cloth dan ikut membantu menyebarkan kebaikan melalui
                    donasi pakaian.
                </p>
                <p class="text-gray-700 leading-relaxed mb-4">
                    Kamu dapat memperbarui informasi akun kapan saja agar data tetap aman dan terbaru.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Bersama kita bisa memberikan manfaat yang lebih besar bagi sesama.
                </p>
                <img src="{{ asset('p2.jpg') }}" class="rounded-2xl mt-8 shadow-lg w-full h-72 object-cover">
            </div>

            <div class="bg-white rounded-3xl shadow-2xl p-10 border border-gray-100">

                <div class="flex flex-col items-center mb-8">
                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-[#7f9cf5]/30 shadow-lg">
                        <img src="{{ asset('profile.png') }}" class="w-full h-full object-cover">
                    </div>
                    <h2 class="text-2xl font-semibold text-gray-800 mt-5">
                        {{ $user['name'] ?? 'Guest' }}
                    </h2>
                    <p class="text-gray-500 text-sm">Relove Cloth Member</p>

                    @if(isset($user['role']) && $user['role'] === 'admin')
                        <span
                            class="mt-2 px-3 py-1 bg-purple-100 text-purple-700 text-xs rounded-full font-medium">Admin</span>
                    @endif
                </div>

                <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label class="text-sm font-medium text-gray-700">Username</label>
                        <input type="text" name="name" value="{{ $user['name'] ?? '' }}"
                            class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ $user['gmail'] ?? '' }}"
                            class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Password Baru</label>
                        <input type="password" name="password" placeholder="Isi jika ingin mengganti password"
                            class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">
                    </div>

                </form>

                <a href="{{ route('profile.edit') }}"
                    class="block text-center mt-4 bg-gray-100 hover:bg-gray-200 transition text-gray-700 py-3 rounded-xl font-medium">
                    Edit Profile Lengkap
                </a>

                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit"
                        class="w-full bg-red-400 hover:bg-red-500 transition text-white py-3 rounded-xl font-medium shadow-md">
                        Logout
                    </button>
                </form>

            </div>
        </div>
    </div>

    <footer
        class="bg-gradient-to-r from-[#fbc2eb]/20 to-[#a6c1ee]/20 text-gray-700 pt-10 pb-6 px-10 border-t border-gray-200">
        <div class="text-center text-sm text-gray-500">
            © 2026 Relove Cloth • Donasi pakaian untuk membantu sesama
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        function toggleNotifDropdown() {
            document.getElementById('notificationDropdown').classList.toggle('hidden');
        }
    </script>

</body>

</html>