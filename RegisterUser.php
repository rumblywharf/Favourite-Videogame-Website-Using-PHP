<!DOCTYPE html> <!-- DOCTYPE tag-->
<html lang='en'> <!-- Starting HTML tag-->
<head> <!-- Starting head tag-->
    <meta charset='UTF-8'> <!-- using utf-8 charset tag-->
    <title>Saving Registration</title> <!-- Creating a title tag-->
</head> <!-- Ending head tag-->
<body>
<?php
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$check = true;

if($confirm != $password){
    echo 'Passwords do not match';
    $check = false;
}

if($check){
    $password = password_hash($password, PASSWORD_DEFAULT);
    echo $password;

    $db = new PDO('mysql:host=172.31.22.43;dbname=Cameron_R1106175', 'Cameron_R1106175', '7N8VChxI8o');
    $query = 'INSERT INTO users (username, password) VALUES (:username, :password);';
    $newQuery = $db->prepare($query);
    $newQuery->bindParam(':username', $username, PDO::PARAM_STR, 100);
    $newQuery->bindParam(':password', $password, PDO::PARAM_STR, 255);
    $newQuery->execute();
    $db = null;

    header('location:login.php');
}
?>
</body>
</html>
