<?php
session_start();
if (isset($_SESSION['user_id'])) {
    include "db_conn.php";
    
    $query = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

    $userid = $_SESSION["user_id"];
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="edit.css">
        <title>Edit Profile</title>
    </head>
    <body>
        <div class="container">
            <h2>Edit Profile</h2>
            <p>You can change your information.</p>
            <hr>
            <form action="edit_ok.php" method="post">
                <div>
                    <label for="name">Name</label><br>
                    <input name="name" id="name" type="text" value = "<?php echo $user['name']?>" required>
                </div>
                <div>
                    <label for="email">Email</label><br>
                    <input name="email" id="email" type="email" value = "<?php echo $user['email']?>" required>
                </div>
                <div>
                    <label for="password">Password</label><br>
                    <input name="password" id="password" type="password" required>
                </div>
                <div>
                    <label for="password_check">Password Check</label><br>
                    <input name="password_check" id="password_check" type="password" required>
                </div>
                <button>Update</button>
            </form>
            <p class="pre_text">Return to <a href="main.php">Main</a></p>
        </div>
    </body>
</html>