// Filename - views/register.php
<?php
// Include the database configuration file
include_once '../includes/dbConfig.inc.php';
?>

<h1> Sign up form </h1>

<form action="../includes/signup.inc.php" method="POST">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <button>Submit</button>
</form>
<p>Already have an account?</p><a href="/login">Login</a>
```
