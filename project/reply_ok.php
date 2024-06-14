<?php
    session_start();
	include "db_conn.php";

    $idx = $_GET['idx'];
    $content = $_POST['content'];
    
    $escaped_content = mysqli_real_escape_string($db, $content);

    if(isset($_SESSION['user_id'])) {
        $query = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
        $result = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($result);
        $name = $user['name'];

        $query = "INSERT INTO review (con_num, content, name) VALUES ('$idx', '$escaped_content', '$name')";
        mysqli_query($db, $query);
        echo "<script>
        alert('Review registration Successful');
        location.href = 'read.php?idx=$idx';
        </script>";
        exit;
    } else {
        echo "<script>
        alert('Please Log in first');
        location.href = 'read.php?idx=$idx';
        </script>";
        exit;
    }

?>