<!DOCTYPE html>
<html>
<head>
    <title>Kelola Kelas</title>
</head>
<body>
    <h1>Daftar Kelas</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('admin.dashboardAdmin') }}">Kembali ke Dashboard</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Mentor</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_kelas }}</td>
                <td>
                    {{ $item->mentor ? $item->mentor->username : 'Tidak Ada Mentor' }}
                </td>
                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                <td>
                    <!-- Logika tampilan status -->
                    @if($item->status_publikasi == 'diterima')
                        <span style="color:green; font-weight:bold;">Diterima (Aktif)</span>
                    @elseif($item->status_publikasi == 'pending')
                        <span style="color:blue; font-weight:bold;">Pending</span>
                    @elseif($item->status_publikasi == 'ditolak')
                        <span style="color:red; font-weight:bold;">Ditolak</span>
                    @else
                        <span style="color:orange; font-weight:bold;">{{ ucfirst($item->status_publikasi) }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.kelas.edit', $item->id) }}">Edit/Detail</a>
                    
                    <form action="{{ route('admin.kelas.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus kelas ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>