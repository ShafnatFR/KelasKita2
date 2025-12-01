<h2>Login</h2>

@if($errors->any())
    <div style="color:red">
        {{ implode(', ', $errors->all()) }}
    </div>
@endif

<form method="POST" action="/login">
    @csrf

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

<br>
