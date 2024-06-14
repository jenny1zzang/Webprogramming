<?php
include "db_conn.php";

$query = "SELECT * FROM movie ORDER BY idx DESC";
$result = mysqli_query($db, $query);
$rows = [];
while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
}
?>

<!DOCTYPE html>
<html>
    <head>
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
                font-size: 20px;
            }

            h1 {
                margin-left: 55px;
            }
        </style>
    </head>
    <body>
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