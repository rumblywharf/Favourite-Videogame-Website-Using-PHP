<?php
$db = new PDO('mysql:host=172.31.22.43;dbname=Cameron_R1106175', 'Cameron_R1106175', '7N8VChxI8o');
$rating = $_POST['Rating'];
$console = $_POST['console'];
$title = $_POST['title'];
$query = "INSERT INTO assignment1 (title, console, rating) VALUES (:title, :console, :rating)";
$newQuery = $db->prepare($query);
$newQuery->bindParam(':title', $title, PDO::PARAM_STR, 500);
$newQuery->bindParam(':console', $console, PDO::PARAM_STR, 500);
$newQuery->bindParam(':rating', $rating, PDO::PARAM_STR, 10);
$newQuery->execute();
$db = null;

header('location:Save.php');