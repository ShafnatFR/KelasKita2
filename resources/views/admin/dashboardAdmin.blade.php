<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Dashboard Admin</h1>
    <p>Selamat datang {{ Auth::user()->username }}</p>
    <h2>Menu</h2>
    <ul>
        <li><a href="{{ route('admin.users.index') }}">Kelola User</a></li>
        <li><a href="{{ route('admin.kelas.index') }}">Kelola Kelas</a></li>
        <li><a href="{{ route('admin.laporan.index') }}">Kelola Laporan</a></li>
    </ul>
    <br>
    <a href="{{ route('logout') }}">Logout</a>
</body>
</html>