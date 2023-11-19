<?php

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;
    if (isset($username) && isset($password))
        if ($username === 'admin' || $password === 'admin') {
            // session_start();
            // $_SESSION['username'] = $username;
            // header('location:home.php/?username=' . $username);
        }
}
?>
<h3>login</h3>
<form method="post">
    <div style="color:red">
        <?php
        $isRequried = false;
        if ($method === 'POST') {
            if (isset($username) && isset($password))
                if (empty($username) || empty($password)) {
                    echo 'username and password are required';
                    $isRequried = true;
                } elseif ($username === 'admin') {
                    if ($password === 'admin') {
                        header('location:home.php/?username=' . $username);
                    } else {
                    }
                } else {
                    echo 'invalid credentials';
                }
        }
        ?></div>
    <label for="username"><?php echo $isRequried ?  "<span style='color:red;'>*</span>" : '' ?>username</label>
    <input type="text" name="username" value=" <?php echo ($username) ?? '' ?>">
    <br>
    <label for="name"><?php echo $isRequried ? "<span style='color:red;'>*</span>" : '' ?>password</label>
    <input type="text" name="password">
    <br>
    <button type="submit">login</button>
</form>
<?php require('footer.php') ?>