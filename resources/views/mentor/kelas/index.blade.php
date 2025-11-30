<h2>Daftar Kelas</h2>

<a href="{{ route('mentor.kelas.create') }}">Buat Kelas</a>

<table border="1" cellpadding="10">
    <tr>
        <th>Nama Kelas</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

    @foreach($kelas as $k)
    <tr>
        <td>{{ $k->nama_kelas }}</td>
        <td>{{ $k->kategori }}</td>
        <td>{{ $k->harga }}</td>
        <td>
            <a href="{{ route('mentor.kelas.edit',$k->id) }}">Edit</a>

            <form action="{{ route('mentor.kelas.destroy',$k->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
