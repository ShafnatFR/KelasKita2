<!DOCTYPE html>
<html>
<head>
    <title>Update Status Materi</title>
</head>
<body>
    <h1>Update Status Materi</h1>
    <a href="{{ route('admin.materi.index') }}">Kembali</a>
    <hr>

    <h3>Detail Materi</h3>
    <table border="0" cellpadding="5">
        <tr>
            <td><strong>Judul</strong></td>
            <td>: {{ $materi->judul_materi }}</td>
        </tr>
        <tr>
            <td><strong>Kelas</strong></td>
            <td>: {{ $materi->kelas->nama_kelas ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>Deskripsi</strong></td>
            <td>: {{ $materi->deskripsi_materi }}</td>
        </tr>
    </table>
    <br>

    <h3>Ubah Status</h3>
    <form action="{{ route('admin.materi.update', $materi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Pilih Status:</label><br>
        <select name="status" required>
            <option value="pending" {{ $materi->status == 'pending' ? 'selected' : '' }}>Pending (Menunggu Review)</option>
            <option value="diterima" {{ $materi->status == 'diterima' ? 'selected' : '' }}>Diterima (Tampilkan)</option>
            <option value="ditolak" {{ $materi->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            <option value="non-aktif" {{ $materi->status == 'non-aktif' ? 'selected' : '' }}>Non-Aktif (Sembunyikan)</option>
            <option value="draft" {{ $materi->status == 'draft' ? 'selected' : '' }}>Draft</option>
        </select>
        <br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>