@extends('layouts.app')

@section('content')

<h2>Edit Isi Materi</h2>

<form method="POST"
      action="{{ route('mentor.isi-materi.update', $isi->id) }}"
      enctype="multipart/form-data">
    @csrf @method('PUT')

    <label>Pilih Materi</label><br>
    <select name="id_materi">
        @foreach($materi as $m)
            <option value="{{ $m->id }}"
                @selected($isi->id_materi == $m->id)>
                {{ $m->judul_materi }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label>Judul Isi</label><br>
    <input type="text" name="judul" value="{{ $isi->judul }}" required>
    <br><br>

    <label>Tipe Konten</label><br>
    <select name="tipe" id="tipe" onchange="toggleInput()">
        <option value="text" @selected($isi->tipe=='text')>Teks</option>
        <option value="video" @selected($isi->tipe=='video')>Video</option>
        <option value="file" @selected($isi->tipe=='file')>File</option>
    </select>
    <br><br>

    <div id="kontenField">
        <label>Konten</label><br>
        <textarea name="konten" rows="5" cols="50">
            {{ $isi->konten }}
        </textarea>
        <br><br>
    </div>

    <div id="fileField" style="display:none;">
        <label>Upload File Baru (opsional)</label><br>
        <input type="file" name="file_path">
        <br><br>
    </div>

    <button type="submit">Update</button>

</form>

<script>
function toggleInput() {
    let tipe = document.getElementById('tipe').value;

    document.getElementById('kontenField').style.display =
        (tipe === 'text' || tipe === 'video') ? 'block' : 'none';

    document.getElementById('fileField').style.display =
        (tipe === 'file') ? 'block' : 'none';
}

toggleInput(); // jalankan saat load halaman
</script>

@endsection
