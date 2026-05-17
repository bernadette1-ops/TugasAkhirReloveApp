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
           class="text-[#7f9cf5] font-medium">
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

<!-- HEADER -->
<div class="relative h-[320px]">

    <img src="{{ asset('d1.jpg') }}"
         class="w-full h-full object-cover">

    <div class="absolute inset-0 bg-gradient-to-r from-[#fbc2eb]/70 to-[#a6c1ee]/70 flex flex-col justify-center items-center text-center px-6">

        <h1 class="text-4xl font-semibold text-gray-800 mb-4">
            Form Donasi Pakaian
        </h1>

        <p class="max-w-2xl text-gray-700 leading-relaxed">
            Isi form donasi dengan lengkap untuk membantu kami menyalurkan
            pakaian kepada mereka yang membutuhkan.
        </p>

    </div>

</div>

<!-- CONTENT -->
<div class="max-w-7xl mx-auto px-10 py-16">

    <div class="grid md:grid-cols-2 gap-10 items-start">

        <!-- FORM -->
        <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">

            <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                Tambah Donasi
            </h2>

            <form action="/donasi/store" method="POST" class="space-y-5">

                @csrf

                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Barang yang ingin dikirim
                    </label>

                    <input type="text"
                           name="barang"
                           required
                           class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Jumlah
                    </label>

                    <input type="number"
                           name="jumlah"
                           required
                           class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Keterangan
                    </label>

                    <textarea name="keterangan"
                              maxlength="100"
                              required
                              rows="5"
                              class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-[#7f9cf5]"></textarea>
                </div>

                <input type="hidden"
                       name="pengirim"
                       value="{{ Auth::user()->name }}">

                <button type="submit"
                        class="w-full bg-[#7f9cf5] hover:bg-[#667eea] transition text-white py-3 rounded-xl font-medium shadow-md">

                    Kirim Donasi

                </button>

            </form>

        </div>

        <!-- INFO -->
        <div class="bg-gradient-to-br from-[#fbc2eb]/30 to-[#a6c1ee]/30 rounded-3xl p-10 shadow-lg">

            <h2 class="text-3xl font-semibold text-gray-800 mb-5">
                Kenapa Donasi Itu Penting?
            </h2>

            <p class="text-gray-700 leading-relaxed mb-4">
                Banyak pakaian yang masih layak pakai berakhir tidak digunakan.
                Dengan berdonasi, kamu membantu orang lain mendapatkan kebutuhan
                yang lebih layak.
            </p>

            <p class="text-gray-700 leading-relaxed mb-4">
                Relove Cloth membantu menyalurkan pakaian dengan lebih efektif
                agar manfaatnya bisa dirasakan lebih luas.
            </p>

            <p class="text-gray-700 leading-relaxed">
                Satu donasi kecil dapat memberikan dampak besar bagi sesama.
            </p>

            <img src="{{ asset('d2.jpg') }}"
                 class="rounded-2xl mt-8 shadow-lg w-full h-72 object-cover">

        </div>

    </div>

</div>

<!-- TABLE -->
<div class="px-10 pb-20">

    <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100">

        <div class="px-8 py-6 border-b border-gray-100">

            <h2 class="text-2xl font-semibold text-gray-800">
                Data Donasi
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-[#7f9cf5]/10">

                    <tr>

                        <th class="py-4 px-4 text-gray-700 text-sm font-semibold text-center">
                            No
                        </th>

                        <th class="py-4 px-4 text-gray-700 text-sm font-semibold text-center">
                            Pengirim
                        </th>

                        <th class="py-4 px-4 text-gray-700 text-sm font-semibold text-center">
                            Barang
                        </th>

                        <th class="py-4 px-4 text-gray-700 text-sm font-semibold text-center">
                            Jumlah
                        </th>

                        <th class="py-4 px-4 text-gray-700 text-sm font-semibold text-center">
                            Keterangan
                        </th>

                        <th class="py-4 px-4 text-gray-700 text-sm font-semibold text-center">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($donasi as $d)

                    <tr class="border-b hover:bg-gray-50 transition">

                        <td class="py-4 px-4 text-center">
                            {{ $loop->iteration }}
                        </td>

                        <td class="py-4 px-4 text-center">
                            {{ $d->pengirim }}
                        </td>

                        <td class="py-4 px-4 text-center font-medium text-gray-800">
                            {{ $d->barang }}
                        </td>

                        <td class="py-4 px-4 text-center">
                            {{ $d->jumlah }}
                        </td>

                        <td class="py-4 px-4 text-center text-gray-600">
                            {{ $d->keterangan }}
                        </td>

                        <td class="py-4 px-4 text-center">

                            @if($d->pengirim == Auth::user()->name)

                                <div class="flex justify-center gap-2">

                                    <button onclick="openEdit(
                                        '{{ $d->kd_barang }}',
                                        '{{ $d->barang }}',
                                        '{{ $d->jumlah }}',
                                        '{{ $d->keterangan }}'
                                    )"
                                    class="bg-[#7f9cf5] hover:bg-[#667eea] transition text-white px-4 py-2 rounded-lg text-sm">

                                        Edit

                                    </button>

                                    <a href="/donasi/delete/{{ $d->kd_barang }}"
                                       class="bg-red-400 hover:bg-red-500 transition text-white px-4 py-2 rounded-lg text-sm">

                                       Delete

                                    </a>

                                </div>

                            @else

                                -

                            @endif

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- MODAL -->
<div id="editModal"
     class="hidden fixed inset-0 bg-black/50 justify-center items-center z-50">

    <div class="bg-white rounded-3xl p-8 w-[420px] shadow-2xl">

        <h3 class="text-2xl font-semibold text-gray-800 mb-6">
            Edit Donasi
        </h3>

        <form id="editForm" method="POST" class="space-y-5">

            @csrf

            <div>

                <label class="text-sm font-medium text-gray-700">
                    Barang
                </label>

                <input type="text"
                       name="barang"
                       id="edit_barang"
                       class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50">

            </div>

            <div>

                <label class="text-sm font-medium text-gray-700">
                    Jumlah
                </label>

                <input type="number"
                       name="jumlah"
                       id="edit_jumlah"
                       class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50">

            </div>

            <div>

                <label class="text-sm font-medium text-gray-700">
                    Keterangan
                </label>

                <textarea name="keterangan"
                          id="edit_keterangan"
                          rows="4"
                          class="w-full mt-2 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50"></textarea>

            </div>

            <button type="submit"
                    class="w-full bg-[#7f9cf5] hover:bg-[#667eea] transition text-white py-3 rounded-xl">

                Update

            </button>

        </form>

        <button onclick="closeModal()"
                class="w-full mt-3 bg-gray-200 hover:bg-gray-300 transition py-3 rounded-xl text-gray-700">

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

</body>
</html>