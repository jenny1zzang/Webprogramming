<?php
include "db_conn.php";

$idx = $_GET['idx'];
$query = "SELECT * FROM review WHERE con_num = '$idx'";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
}



$query = "SELECT * FROM movie WHERE idx = '$idx'";
$result = mysqli_query($db, $query);
$movie = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="read.css">
    </head>
    <body>
        <div class="movie_container">
            <h1><?php echo $movie['name'] ?> review</h1>
            <img src=<?= $movie['img']?>>
        </div>
        <div class="review_container">
            <form action="reply_ok.php?idx=<?= $idx ?>" method="POST">
                <?php if(isset($rows)) {?>
                    <?php foreach($rows as $row) { ?>
                    <div class="review">
                        <p class="name"><?= $row['name']?></p>
                        <p class="content"><?= $row['content']?></p>
                        <p class="date"><?= $row['date']?></p>
                        </div>
                    <?php } ?>
                <?php } ?>
                <div class="review_box">
                <textarea name="content" class="review_content" required></textarea>
                <button class="review_btn">Review</button>
                <div class="go_to_main">
                <a href="main.php">Go to the Main</a>
                </div>
                </div>
            </form>
        </div>
    </body>
</html>
