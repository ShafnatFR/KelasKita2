<h2>Selamat Datang, {{ auth()->user()->username }}</h2>

<p>Role: {{ auth()->user()->role }}</p>

<a href="/mentor/kelas">Jadi Mentor</a>

<br><br>
<a href="/logout">Logout</a>
