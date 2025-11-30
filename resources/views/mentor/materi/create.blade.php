<h2>Buat Materi Baru</h2>

<form method="POST" action="{{ route('mentor.materi.store') }}">
    @csrf

    <label>Pilih Kelas</label><br>
    <select name="kelas_id">
        @foreach($kelas as $k)
            <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
        @endforeach
    </select><br><br>

    <label>Judul Materi</label><br>
    <input type="text" name="judul_materi" required><br><br>

    <label>Deskripsi Materi</label><br>
    <textarea name="deskripsi_materi"></textarea><br><br>

    <label>Urutan</label><br>
    <input type="number" name="urutan" value="1" required><br><br>

    <button type="submit">Simpan</button>
</form>
