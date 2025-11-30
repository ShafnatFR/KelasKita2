<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User: {{ $user->username }}</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT') <label>Username:</label><br>
        <input type="text" name="username" value="{{ $user->username }}" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ $user->email }}" required><br><br>

        <label>Password (Kosongkan jika tidak ingin mengganti):</label><br>
        <input type="password" name="password"><br><br>

        <label>Role:</label><br>
        <select name="role">
            <option value="murid" {{ $user->role == 'murid' ? 'selected' : '' }}>Murid</option>
            <option value="mentor" {{ $user->role == 'mentor' ? 'selected' : '' }}>Mentor</option>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
        </select><br><br>

        <label>Status:</label><br>
        <select name="status">
            <option value="aktif" {{ $user->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="non-aktif" {{ $user->status == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
        </select><br><br>

        <label>No Telpon:</label><br>
        <input type="text" name="no_telpon" value="{{ $user->no_telpon }}"><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat">{{ $user->alamat }}</textarea><br><br>

        <button type="submit">Update</button>
        <a href="{{ route('admin.users.index') }}">Batal</a>
    </form>
</body>
</html>