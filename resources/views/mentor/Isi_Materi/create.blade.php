@extends('layouts.app')

@section('content')

<h2>Tambah Isi Materi</h2>

<form method="POST"
      action="{{ route('mentor.isi-materi.store') }}"
      enctype="multipart/form-data">
    @csrf

    <label>Pilih Materi</label><br>
    <select name="id_materi" required>
        @foreach($materi as $m)
            <option value="{{ $m->id }}">{{ $m->judul_materi }}</option>
        @endforeach
    </select>
    <br><br>

    <label>Judul Isi Materi</label><br>
    <input type="text" name="judul" required>
    <br><br>

    <label>Tipe Konten</label><br>
    <select name="tipe" id="tipe" onchange="toggleInput()">
        <option value="text">Teks</option>
        <option value="video">Video (YouTube)</option>
        <option value="file">File (PDF/DOC/ZIP)</option>
    </select>
    <br><br>

    <!-- KONTEN TEXT / VIDEO -->
    <div id="kontenField">
        <label>Konten (Text / URL Video)</label><br>
        <textarea name="konten" rows="5" cols="50"></textarea>
        <br><br>
    </div>

    <!-- FILE UPLOAD -->
    <div id="fileField" style="display:none;">
        <label>Upload File</label><br>
        <input type="file" name="file_path">
        <br><br>
    </div>

    <button type="submit">Simpan</button>

</form>

<script>
function toggleInput() {
    let tipe = document.getElementById('tipe').value;

    document.getElementById('kontenField').style.display =
        (tipe === 'text' || tipe === 'video') ? 'block' : 'none';

    document.getElementById('fileField').style.display =
        (tipe === 'file') ? 'block' : 'none';
}
</script>

@endsection
