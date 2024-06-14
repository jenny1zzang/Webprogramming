<?php
$db = mysqli_connect('localhost', 'root', '') or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'project') or die(mysqli_error($db));

$query = 'INSERT INTO movie 
(idx, name, genre, img) 
VALUES 
(1, "ToyStory3", "Animation", "https://lumiere-a.akamaihd.net/v1/images/open-uri20150422-12561-wt2it4_fbf729c8.jpeg"),
(2, "Frozen", "Animation", "https://lumiere-a.akamaihd.net/v1/images/p_frozen_18373_3131259c.jpeg"),
(3, "Iron man", "Action", "https://m.media-amazon.com/images/M/MV5BMTczNTI2ODUwOF5BMl5BanBnXkFtZTcwMTU0NTIzMw@@._V1_FMjpg_UX1000_.jpg"),
(4, "Avengers: End Game", "Action", "https://www.movieposters.com/cdn/shop/products/108b520c55e3c9760f77a06110d6a73b_500x.jpg?v=1573652543"),
(5, "Loveactually", "Romance", "https://m.media-amazon.com/images/M/MV5BNThkNjgxNGQtOTIxMy00ZTFmLWIwMDItYzE5YzM3ZDMzNDE3XkEyXkFqcGdeQXVyMTUyNjc3NDQ4._V1_QL75_UY281_CR4,0,190,281_.jpg"),
(6, "Inception", "Action", "https://m.media-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_.jpg"),
(7, "Inside Out", "Animation", "https://m.media-amazon.com/images/M/MV5BOTgxMDQwMDk0OF5BMl5BanBnXkFtZTgwNjU5OTg2NDE@._V1_.jpg"),
(8, "Wonka", "Fantasy", "https://m.media-amazon.com/images/M/MV5BNDM4NTk0NjktZDJhMi00MmFmLTliMzEtN2RkZDY2OTNiMDgzXkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_FMjpg_UX1000_.jpg")';

mysqli_query($db, $query) or die(mysqli_error($db));

echo 'Data inserted successfully!'
?>