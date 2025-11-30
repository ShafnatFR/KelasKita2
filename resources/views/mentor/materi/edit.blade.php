<h2>Edit Materi</h2>

<form method="POST" action="{{ route('mentor.materi.update', $materi->id) }}">
    @csrf @method('PUT')

    <label>Pilih Kelas</label><br>
    <select name="kelas_id">
        @foreach($kelas as $k)
            <option value="{{ $k->id }}" @selected($materi->kelas_id == $k->id)>
                {{ $k->nama_kelas }}
            </option>
        @endforeach
    </select><br><br>

    <label>Judul Materi</label><br>
    <input type="text" name="judul_materi" value="{{ $materi->judul_materi }}"><br><br>

    <label>Deskripsi Materi</label><br>
    <textarea name="deskripsi_materi">{{ $materi->deskripsi_materi }}</textarea><br><br>

    <label>Urutan</label><br>
    <input type="number" name="urutan" value="{{ $materi->urutan }}"><br><br>

    <button type="submit">Update</button>
</form>
