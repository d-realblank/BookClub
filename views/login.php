// Filename - views/login.ejs

<h1>login</h1>

<form action="/login" method="POST">
    <input type="text" name="username"
           placeholder="username">
    <input type="password" name="password"
           placeholder="password">
    <a href="/forgot">forgot password</a>
    <button>login</button>
</form>
<p>Don't have an account?</p><a href="/register">Register</a>
