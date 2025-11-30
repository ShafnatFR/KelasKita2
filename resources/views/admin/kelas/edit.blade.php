<!DOCTYPE html>
<html>
<head>
    <title>Edit Kelas</title>
</head>
<body>
    <h1>Edit Kelas: {{ $kelas->nama_kelas }}</h1>

    <a href="{{ route('admin.kelas.index') }}">Kembali</a>
    <br><br>

    <form action="{{ route('admin.kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Kelas:</label><br>
        <input type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}" required><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" value="{{ $kelas->harga }}" required><br><br>

        <label>Status Publikasi:</label><br>
        <select name="status_publikasi">
            <option value="draft" {{ $kelas->status_publikasi == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="pending" {{ $kelas->status_publikasi == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="diterima" {{ $kelas->status_publikasi == 'diterima' ? 'selected' : '' }}>Diterima (Publikasi)</option>
            <option value="ditolak" {{ $kelas->status_publikasi == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            <option value="non-aktif" {{ $kelas->status_publikasi == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
        </select><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>