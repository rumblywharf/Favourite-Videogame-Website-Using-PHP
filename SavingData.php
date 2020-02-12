<?php
$rating = $_POST['Rating'];
//creating a saved variable for rating
$console = $_POST['console'];
//creating a saved variable for console
$title = $_POST['title'];
//creating a saved variable for title
$validate = true;
//making a new validate boolean variable that is automatically true

if (empty($title)){
    $validate = false;
}
//if the title field is empty return the variable false
if (strlen($title) > 100){
    $validate = false;
}
//if the titles length is longer than 100 characters then return the variable false
if($validate) {
    $db = new PDO('mysql:host=172.31.22.43;dbname=Cameron_R1106175', 'Cameron_R1106175', '7N8VChxI8o');
    $query = 'INSERT INTO assignment1 (title, console, rating) VALUES (:title, :console, :rating);';
}
//if the variable is true then connect to the database and run the insert command
else{
    header('location:Main.php');
}
//if the variable returns false then reload the page
$newQuery = $db->prepare($query);
//prepare the database for the query to run and storing it in a new variable
$newQuery->bindParam(':title', $title, PDO::PARAM_STR, 100);
$newQuery->bindParam(':console', $console, PDO::PARAM_STR, 500);
$newQuery->bindParam(':rating', $rating, PDO::PARAM_STR, 10);
//bind the given values to match the query to insert into the table
$newQuery->execute();
//execute the new variable
$db = null;
//shut down the database
header('location:Save.php');
//load the page to see the table