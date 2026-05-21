<!DOCTYPE html>
<html>

<head>
    <title>Tracking Donasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-pink-200 via-purple-200 to-blue-200 min-h-screen">

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

            <a href="/profile"
                class="flex flex-col items-center px-4 py-2 rounded-xl text-gray-600 hover:bg-[#7f9cf5]/10 hover:text-[#667eea]">
                <img src="{{ asset('profile.png') }}" class="w-6 h-6 mb-1 rounded-full">
                <span class="text-xs">Profile</span>
            </a>

        </div>
    </div>

    <div class="flex justify-center items-center py-16">

        <div class="bg-white w-[750px] rounded-3xl shadow-2xl p-12 relative">

            <a href="/donasi" class="absolute top-4 left-4 text-xl font-bold">←</a>

            <h2 class="text-center text-xl font-bold mb-8">
                Informasi Penyaluran Donasi
            </h2>

            <div class="absolute top-4 right-4">
                <span class="px-3 py-1 rounded-full text-sm text-white
                {{ $donasi->tracking_status == 4 ? 'bg-green-500' : 'bg-yellow-400' }}">
                    {{ $donasi->tracking_status == 4 ? 'Completed' : 'In Progress' }}
                </span>
            </div>

            <div class="text-center mb-10">
                <img src="{{ asset('donasi_img/' . $donasi->gambar) }}" class="w-28 h-28 mx-auto rounded-lg object-cover">

                <p class="font-semibold mt-2">{{ $donasi->barang }}</p>
                <p class="text-sm text-gray-500">{{ $donasi->daerah }}</p>
            </div>

            <div class="flex items-center justify-between relative">

                <div class="absolute top-4 left-0 w-full h-1 bg-gray-300"></div>

                <div class="absolute top-4 left-0 h-1 bg-green-500 transition-all duration-500"
                    style="width: {{ ($donasi->status - 1) * 33 }}%;">
                </div>

                @for($i = 1; $i <= 4; $i++)
                    <div class="relative z-10 text-center">

                        <div class="w-8 h-8 flex items-center justify-center rounded-full text-white font-bold
                            {{ $donasi->tracking_status >= $i ? 'bg-green-500' : 'bg-gray-300' }}">
                            {{ $i }}
                        </div>

                        <p class="text-xs mt-2 w-24">
                            @if($i == 1) Submitted
                            @elseif($i == 2) Pickup
                            @elseif($i == 3) Arrived
                            @else Received
                            @endif
                        </p>

                    </div>
                @endfor

            </div>

            @if(session('user') && session('user')['role'] === 'admin')
                <div class="mt-10 text-center">

                    <form action="/donasi/tracking/update/{{ $donasi->kd_barang }}" method="POST">
                        @csrf
                        <button type="submit">Update Tracking</button>
                    </form>

                </div>
            @endif

            <div class="mt-12 pt-6 border-t text-center text-sm text-gray-600">
                <p>
                    Apabila ada masalah anda dapat menghubungi
                    <a href="{{ route('service.center') }}" class="text-[#667eea] font-semibold hover:underline">
                        Service Center
                    </a>
                </p>
            </div>

        </div>

    </div>

</body>

</html>