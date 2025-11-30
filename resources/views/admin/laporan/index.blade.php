<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Laporan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .alert {
            color: green;
            margin-bottom: 10px;
        }

        .btn-delete {
            color: red;
            cursor: pointer;
            background: none;
            border: none;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Daftar Laporan Masuk</h1>
    <a href="{{ route('admin.dashboardAdmin') }}">Kembali ke Dashboard</a>

    <br><br>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Pelapor</th>
                <th>Kelas Dilaporkan</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $index => $laporan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $laporan->user->username ?? 'User Dihapus' }}</td>
                    <td>{{ $laporan->kelas->nama_kelas ?? 'Kelas Dihapus' }}</td>
                    <td>{{ $laporan->kategori_report }}</td>
                    <td>{{ $laporan->keterangan_report }}</td>
                    <td>
                        <form action="{{ route('admin.laporan.update', $laporan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status_laporan" onchange="this.form.submit()">
                                <option value="belum diproses" {{ $laporan->status_laporan == 'belum diproses' ? 'selected' : '' }}>Belum Diproses</option>
                                <option value="diproses" {{ $laporan->status_laporan == 'diproses' ? 'selected' : '' }}>
                                    Diproses</option>
                                <option value="selesai" {{ $laporan->status_laporan == 'selesai' ? 'selected' : '' }}>Selesai
                                </option>
                                <option value="ditolak" {{ $laporan->status_laporan == 'ditolak' ? 'selected' : '' }}>Ditolak
                                </option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.laporan.destroy', $laporan->id) }}" method="POST"
                            onsubmit="return confirm('Yakin hapus laporan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>