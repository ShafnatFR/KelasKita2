<h2>Daftar Materi</h2>

<a href="{{ route('mentor.materi.create') }}">Tambah Materi</a>
<a href="{{ route('mentor.isi-materi.create') }}">
    <button>Tambah Isi Materi</button>
</a>


<table border="1" cellpadding="10">
    <tr>
        <th>Kelas</th>
        <th>Judul</th>
        <th>Urutan</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($materi as $m)
    <tr>
        <td>{{ $m->kelas->nama_kelas }}</td>
        <td>{{ $m->judul_materi }}</td>
        <td>{{ $m->urutan }}</td>
        <td>{{ $m->status }}</td>
        <td>
            <a href="{{ route('mentor.materi.edit', $m->id) }}">Edit</a>

            <form method="POST" action="{{ route('mentor.materi.destroy', $m->id) }}" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
