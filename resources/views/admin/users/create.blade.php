<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
</head>
<body>
    <h1>Tambah User Baru</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        
        <label>Username:</label><br>
        <input type="text" name="username" value="{{ old('username') }}" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Role:</label><br>
        <select name="role">
            <option value="murid">Murid</option>
            <option value="mentor">Mentor</option>
            <option value="admin">Admin</option>
        </select><br><br>

        <label>Status:</label><br>
        <select name="status">
            <option value="aktif">Aktif</option>
            <option value="non-aktif">Non-Aktif</option>
        </select><br><br>

        <label>No Telpon (Opsional):</label><br>
        <input type="text" name="no_telpon" value="{{ old('no_telpon') }}"><br><br>

        <label>Alamat (Opsional):</label><br>
        <textarea name="alamat">{{ old('alamat') }}</textarea><br><br>

        <button type="submit">Simpan</button>
        <a href="{{ route('admin.users.index') }}">Batal</a>
    </form>
</body>
</html>