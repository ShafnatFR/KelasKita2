<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Dashboard Admin</h1>
    <p>Selamat datang {{ Auth::user()->username }}</p>
    <h2>Menu</h2>
    <ul>
        <li><a href="{{ route('admin.users.index') }}">Kelola User</a></li>
        <li><a href="{{ route('admin.kelola.kelas') }}">Kelola Kelas</a></li>
    </ul>
</body>

</html>