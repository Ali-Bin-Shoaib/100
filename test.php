<?php

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;
}
?>
<h3>login</h3>
<form method="post">
    <div style="color:red">
        <?php
        if (isset($username) && isset($password))
            if ($username !== 'admin' || $password != 'admin')
                echo 'invalid credentials';

        ?></div>
    <label for="username">username</label>
    <input type="text" name="username">
    <br>
    <label for="name">password</label>
    <input type="text" name="password">
    <br>
    <button type="submit">login</button>
</form>