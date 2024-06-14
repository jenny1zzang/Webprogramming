<?php

session_start();

if (isset($_SESSION['user_id'])) {
    include "db_conn.php";
    $query = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <nav>
    <?php if (isset($user)): ?>
        <ul>
            <li class="nav-lefttab"><a href="main.php">Home</a></li>
            <li class="nav-lefttab"><p>Hello, <?php echo $user['name']; ?></p></li>
            <li class="nav-righttab"><a href="logout.php">Log out</a></li>
            <li class="nav-righttab"><a href="edit.php">Edit Profile</a></li>
        </ul>
    <?php else: ?>
        <ul>
            <li class="nav-lefttab"><a href="main.php">Home</a></li>
            <li class="nav-righttab"><a href="login.php">Log in</a></li>
            <li class="nav-righttab"><a href="register.html">sign up</a></li>
        </ul>    
    <?php endif; ?>
    </nav>
    <form action="search.php" method="POST">
        <label for="genre">You can find movies of any genre you want</label>
        <select name="select_genre" required="required">
            <option value="" selected disabled hidden>==Select==</option>
            <option value="Action">Action</option>
            <option value="Animation">Animation</option>
            <option value="Fantasy">Fantasy</option>
        </select>
        <button class="search_btn">Search</button>
    </form>
    <?php include "board.php"; ?>
</body>
</html>