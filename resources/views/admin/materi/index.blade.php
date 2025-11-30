<!DOCTYPE html>
<html>
<head>
    <title>Kelola Materi</title>
</head>
<body>
    <h1>Daftar Semua Materi</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('admin.dashboardAdmin') }}">Kembali ke Dashboard</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>No</th>
                <th>Judul Materi</th>
                <th>Kelas</th>
                <th>Mentor</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($materi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <strong>{{ $item->judul_materi }}</strong><br>
                    <small>Urutan: {{ $item->urutan }}</small>
                </td>
                <td>{{ $item->kelas->nama_kelas ?? 'Kelas dihapus' }}</td>
                <td>{{ $item->kelas->mentor->username ?? 'Mentor tidak ada' }}</td>
                <td>
                    @if($item->status == 'diterima')
                        <span style="color:green; font-weight:bold;">Diterima (Aktif)</span>
                    @elseif($item->status == 'pending')
                        <span style="color:blue; font-weight:bold;">Pending</span>
                    @elseif($item->status == 'ditolak')
                        <span style="color:red; font-weight:bold;">Ditolak</span>
                    @else
                        <span style="color:orange;">{{ ucfirst($item->status) }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.materi.edit', $item->id) }}">Update Status</a>
                    |
                    <form action="{{ route('admin.materi.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus materi ini? Isi materi di dalamnya juga akan terhapus.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color:red; border:none; background:none; cursor:pointer; text-decoration:underline;">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center;">Belum ada materi yang diupload.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>