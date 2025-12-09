<h2>Daftar Kelas</h2>

<a href="{{ route('mentor.kelas.create') }}">Buat Kelas</a>
<a href="{{ route('jadi-murid') }}">
    <button>Kembali Jadi Murid</button>
</a>
<a href="{{ route('mentor.materi.index') }}">
    <button style="background:green; color:white;">Kelola Materi</button>
</a>


<table border="1" cellpadding="10">
    <tr>
        <th>Nama Kelas</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($kelas as $k)
    <tr>
        <td>{{ $k->nama_kelas }}</td>
        <td>{{ $k->kategori }}</td>
        <td>{{ $k->harga }}</td>
        <td><span style="font-weight: bold; color:
            @if($k->status_publikasi == 'draft') gray
            @elseif($k->status_publikasi == 'pending') orange
            @elseif($k->status_publikasi == 'diterima') green
            @elseif($k->status_publikasi == 'ditolak') red
            @endif
        ">
            {{ $k->status_publikasi }}
        </span></td>
        <td>
            <a href="{{ route('mentor.kelas.edit',$k->id) }}">Edit</a>

            <form action="{{ route('mentor.kelas.destroy',$k->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
    <a href="/logout">Logout</a>

</table>
