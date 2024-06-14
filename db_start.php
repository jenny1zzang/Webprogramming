<?php
$db = mysqli_connect('localhost', 'root', '') or die('Unsable to connect');

$query = "CREATE DATABASE IF NOT EXISTS project";
mysqli_query($db, $query) or die(mysqli_error($db));

mysqli_select_db($db, 'project') or die(mysqli_error($db));
$query = 'CREATE TABLE user (
id INT(11) NOT NULL AUTO_INCREMENT , 
name VARCHAR(128) NOT NULL , 
email VARCHAR(255) NOT NULL , 
password_hash VARCHAR(255) NOT NULL , 
PRIMARY KEY (id), 
UNIQUE (`email`)) 
ENGINE = InnoDB';
mysqli_query($db, $query) or die(mysqli_error($db));

$query ='CREATE TABLE review (
idx INT(11) NOT NULL AUTO_INCREMENT , 
con_num INT(11) NOT NULL , 
content TEXT NOT NULL , 
date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
name VARCHAR(128) NOT NULL , 
PRIMARY KEY (idx)) 
ENGINE = InnoDB';
mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'CREATE TABLE movie (
idx INT(11) NOT NULL AUTO_INCREMENT , 
name VARCHAR(255) NOT NULL , 
genre VARCHAR(255) NOT NULL , 
img TEXT NOT NULL , 
PRIMARY KEY (idx)) ENGINE = InnoDB';
mysqli_query($db, $query) or die(mysqli_error($db));
echo 'PROJECT DATABASE SUCCESSFULLY CREATED!'
?>