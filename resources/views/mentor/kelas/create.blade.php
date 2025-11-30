<h2>Buat Kelas Baru</h2>

<form method="POST" action="{{ route('mentor.kelas.store') }}">
    @csrf

    <label>Nama Kelas:</label><br>
    <input type="text" name="nama_kelas"><br><br>

    <label>Kategori:</label><br>
    <input type="text" name="kategori"><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga"><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi_kelas"></textarea><br><br>

    <button type="submit">Simpan</button>
</form>
