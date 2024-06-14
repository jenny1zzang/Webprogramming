<?php
include "db_conn.php";

@$email = $_POST['email'];
@$pw = $_POST['password'];
$query = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($db, $query);

$user = mysqli_fetch_assoc($result);
if ($user) {
    if (password_verify($pw, $user['password_hash'])){
        session_start();

        $_SESSION['user_id'] = $user['id'];

        header("Location: main.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="login.css">
        <title>Login</title>
    </head>
    <body>
        <div class = "container">
            <h2>Account Login</h2>
            <p>If you are already a member you can login with your email address and password.</p>
            <hr>
            <form method="post">
                <div>
                    <label for="email">Email</label><br>
                    <input id="email" name="email" type="text" required>
                </div>
                <div>
                    <label>Password</label><br>
                    <input id="password" name="password" type="password" required>
                </div>
                <button>Log in</button>
            </form>
            <p class="singup_text">Don't have an account? <a href="register.html">Sing up here</a></p>
        </div>
    </body>   
</html>