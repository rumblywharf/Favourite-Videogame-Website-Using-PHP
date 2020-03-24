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

$db = new PDO('mysql:host=172.31.22.43;dbname=Cameron_R1106175', 'Cameron_R1106175', '7N8VChxI8o');
$query = 'SELECT usersID, password FROM users WHERE username = :username;';
$newQuery = $db->prepare($query);
$newQuery->bindParam(':username', $username, PDO::PARAM_STR, 100);
$newQuery->execute();
$users = $newQuery->fetch();

if(password_verify($password, $users['password'])) {
    session_start();
    $_SESSION['usersID'] = $users['usersID'];
    header('location:Home.php');
}
else
    header('location:login.php?incorrectPassword=true');
$db = null;
?>
</body>
</html>
