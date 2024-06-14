<?php

session_start();
include "db_conn.php";

if (isset($_SESSION['user_id'])) {
    $query = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
}

$genre = $_POST['select_genre'];
if ($genre == "none") {

}
$query = "SELECT * FROM movie WHERE genre = '$genre'";
$result = mysqli_query($db, $query);
$rows = [];
while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
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
    <style>
            section {
                place-items: center;
                display: grid;
                grid-template-columns: auto auto auto auto;
            }
            section div{
                padding: 30px;
                margin: 10px;
            }
            .movie img {
                width: 200px;
                height: 300px;
                border-radius: 8px;
            }
            .moviename{
                text-align: center;
                margin-bottom: 0;
            }
            a {
                font-family: 'Inter';
                font-style: normal;
                font-weight: 500;
                font-size: 20px;    
                line-height: 150%;
                color: #000000;
                text-align: center;
                text-decoration: none;
            }
            a:hover {
                color: #db3434;
            }
            .movie .genre {
                font-family: 'Inter';
                font-style: normal;
                font-weight: 500; 
                line-height: 150%;
                text-align: center;

                margin: 5px;
                font-size: 15px;
                color: #828282;
            }

            @media (max-width: 480px) and (min-width: 320px){
                section {
                place-items: center;
                display: grid;
                grid-template-columns: 1fr;
                }
            }
            button {
                margin-left: 00px;
                width: 100px;
                height: 20px;
                background: #db3434;
                border-radius: 6px;
    
                font-style: normal;
                font-weight: 500;
                font-size: 13px;
                line-height: 19px;
                color: #FFFFFF;
    
                border: 0;
            }
            label {
                margin-left: 55px;
                margin-right: 10px;
            }

            h1 {
                margin-left: 55px;
            }
        </style>
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
    <h1>"<?= $genre ?>" Genre search results</h1>
    <section class="movie-cards">
            <?php foreach($rows as $row) { ?>
                <div class="movie">
                    <img src=<?= $row['img']?>>
                    <p class="moviename"><a href="read.php?idx=<?= $row['idx']?>"><?= $row['name']?></a></p>
                    <p class="genre">Genre: <?= $row['genre']?></p>
                    </div>
            <?php } ?>
        </section>
</body>
</html>