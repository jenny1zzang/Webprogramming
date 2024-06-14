<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'project';
$db = new mysqli($servername, $username, $password, $dbname);

if (!$db) {
    echo("Connection failed!");
}
?>