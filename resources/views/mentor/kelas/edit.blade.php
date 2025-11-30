<h2>Edit Kelas</h2>

<form method="POST" action="{{ route('mentor.kelas.update',$kelas->id) }}">
    @csrf @method('PUT')

    <label>Nama Kelas:</label><br>
    <input type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}"><br><br>

    <label>Kategori:</label><br>
    <input type="text" name="kategori" value="{{ $kelas->kategori }}"><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga" value="{{ $kelas->harga }}"><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi_kelas">{{ $kelas->deskripsi_kelas }}</textarea><br><br>

    <button type="submit">Update</button>
</form>
