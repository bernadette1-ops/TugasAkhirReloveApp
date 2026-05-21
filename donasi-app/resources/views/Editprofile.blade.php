<!DOCTYPE html>
<html>

<head>
    <title>Edit Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { colors: { primary: '#7f9cf5', primaryDark: '#667eea' } } }
        }
    </script>
</head>

<body class="font-[Poppins] bg-gradient-to-br from-[#fbc2eb]/40 to-[#a6c1ee]/40 min-h-screen">

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

            <a href="/profile"
                class="flex flex-col items-center px-4 py-2 rounded-xl bg-[#7f9cf5]/15 text-[#667eea] relative">
                <img src="{{ asset('profile.png') }}" class="w-6 h-6 mb-1 rounded-full">
                <span class="text-xs font-medium">Profile</span>
                <div class="absolute -bottom-1 w-8 h-1 bg-[#7f9cf5] rounded-full"></div>
            </a>

        </div>
    </div>

    <div class="flex justify-center px-6 py-12">
        <div class="w-full max-w-lg bg-white rounded-3xl shadow-2xl overflow-hidden">

            <div class="h-36 bg-gradient-to-r from-[#fbc2eb] to-[#a6c1ee] relative flex items-end justify-center pb-0">
                <div class="absolute w-80 h-80 rounded-full bg-white/10 -top-20 -left-10"></div>
                <div class="absolute w-52 h-52 rounded-full bg-white/10 -top-10 right-10"></div>

                <div class="relative z-10 -mb-16">
                    <div class="w-32 h-32 rounded-full border-4 border-white shadow-xl overflow-hidden bg-white">
                        <img src="{{ asset('profile.png') }}" class="w-full h-full object-cover" id="previewImage">
                    </div>
                </div>
            </div>

            <div class="px-10 pt-20 pb-10">

                <div class="flex items-center gap-2 mb-6">
                    <a href="{{ route('profile') }}" class="text-gray-400 hover:text-[#667eea] text-lg">←</a>
                    <h2 class="text-2xl font-semibold text-gray-800">Edit Profile</h2>
                </div>

                <p class="text-gray-500 text-sm mb-8">Update informasi akunmu di bawah ini.</p>

                <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label class="text-sm font-medium text-gray-700">Username</label>
                        <input type="text" name="name" value="{{ $user['name'] ?? '' }}" required
                            class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ $user['gmail'] ?? '' }}" required
                            class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Password Baru</label>
                        <input type="password" name="password" placeholder="Kosongkan jika tidak ingin ganti"
                            class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">
                    </div>

                    <button type="submit"
                        class="w-full bg-[#7f9cf5] hover:bg-[#667eea] transition text-white py-3 rounded-xl font-medium shadow-md">
                        Simpan Perubahan
                    </button>

                </form>

                <form method="POST" action="{{ route('profile.photo') }}" enctype="multipart/form-data" class="mt-5">
                    @csrf
                    <label class="text-sm font-medium text-gray-700 block mb-2">Ganti Foto Profil</label>
                    <div class="flex gap-3 items-center">
                        <input type="file" name="photo" accept="image/*" onchange="previewPhoto(event)"
                            class="flex-1 text-sm text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:bg-[#7f9cf5]/10 file:text-[#667eea] file:font-medium hover:file:bg-[#7f9cf5]/20">
                        <button type="submit"
                            class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-xl text-sm font-medium">
                            Upload
                        </button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="mt-6">
                    @csrf
                    <button type="submit"
                        class="w-full bg-red-400 hover:bg-red-500 transition text-white py-3 rounded-xl font-medium shadow-md">
                        Logout
                    </button>
                </form>

            </div>
        </div>
    </div>

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

        function previewPhoto(event) {
            const img = document.getElementById('previewImage');
            img.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

</body>

</html>