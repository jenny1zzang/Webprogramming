<?php
$password_hash = password_hash($_POST["input_password"], PASSWORD_DEFAULT);
$email = $_POST["input_email"];
$name = $_POST["input_name"];

include "db_conn.php";

if ($_POST['input_password'] !== $_POST["input_password_check"]) {
    echo "<script>
    alert('The password is different');
    location.href = 'register.html';
    </script>";
}

$query = "SELECT * FROM user where email = '$email'";
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$user = mysqli_fetch_array($result);

if ($user) {
    echo "<script>
    alert('This email already exists. Please enter another email.');
    location.href = 'register.html';
    </script>";
}

$query = "INSERT INTO user (name, email, password_hash)
VALUES ('$name', '$email', '$password_hash')";

$result2 = mysqli_query($db, $query) or die(mysqli_error($db));

echo "<script>
    alert('Register Successful');
    location.href = 'login.php';
    </script>";
exit;
?>