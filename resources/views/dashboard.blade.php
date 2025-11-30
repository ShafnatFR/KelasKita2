<h2>Selamat Datang, {{ auth()->user()->username }}</h2>

<p>Role: {{ auth()->user()->role }}</p>

<form action="{{ route('jadi-mentor') }}" method="GET">
    <button type="submit">Jadi Mentor</button>
</form>


<br><br>
<a href="/logout">Logout</a>
