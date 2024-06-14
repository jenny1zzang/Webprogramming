<?php
session_start();
//해시방법 주석 필요
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$email = $_POST["email"];
$name = $_POST["name"];

include "db_conn.php";

if ($_POST['password'] !== $_POST["password_check"]) {
    echo "<script>
    alert('The password is different');
    location.href = 'edit.php';
    </script>";
}

$query = "SELECT * FROM user where email = '$email'";
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$user = mysqli_fetch_array($result);

if ($user) {
    echo "<script>
    alert('This email already exists. Please enter another email.');
    location.href = 'edit.php';
    </script>";
    exit;
}else {
    $query = "UPDATE user SET name = '$name', email = '$email', password_hash='$password_hash' 
WHERE id = {$_SESSION["user_id"]}";

$result = mysqli_query($db, $query);

echo "<script>
    alert('Edit Successful');
    location.href = 'main.php';
    </script>";
exit;
}
?>