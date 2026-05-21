<h2>Daftar Pengaduan</h2>

<a href="/service-center/create">+ Kirim Pengaduan</a>

@foreach($tickets as $t)
    <p>
        <b>{{ $t->nama }}</b><br>
        {{ $t->pesan }}<br>
        Status: <b>{{ $t->status }}</b><br>

        @if($t->status != 'selesai')
            <a href="/service-center/selesai/{{ $t->id }}">
                Tandai Selesai
            </a>
        @endif
    </p>
    <hr>
@endforeach