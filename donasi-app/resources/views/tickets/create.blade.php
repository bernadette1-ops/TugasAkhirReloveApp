<h2>Service Center - Kirim Pengaduan</h2>

<form method="POST" action="/service-center">
    @csrf
    <input type="text" name="nama" placeholder="Nama"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>
    <textarea name="pesan" placeholder="Tulis keluhan"></textarea><br><br>
    <button type="submit">Kirim</button>

    @if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
    @endif
</form>