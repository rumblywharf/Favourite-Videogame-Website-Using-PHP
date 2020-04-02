<?php
session_start();
if(empty($_SESSION['usersID'])) {
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html> <!-- DOCTYPE tag-->
<html lang='en'> <!-- Starting HTML tag-->
<head> <!-- Starting head tag-->
    <meta charset='UTF-8'> <!-- using utf-8 charset tag-->
    <link rel="stylesheet" href="style.css">
    <!--    found the css at: https://www.free-css.com/free-css-templates/page246/freshshop-->

    <title>Deleting your data</title>
</head>
<body>
<?php
$video_game_id = $_GET['video_game_id'];

$db = new PDO('mysql:host=172.31.22.43;dbname=Cameron_R1106175', 'Cameron_R1106175', '7N8VChxI8o');
$query = 'DELETE FROM assignment1 WHERE video_game_id = :video_game_id';
$newQuery = $db->prepare($query);
$newQuery->bindParam(':video_game_id', $video_game_id, PDO::PARAM_INT);
$newQuery->execute();
$db = null;

header('location:Save.php');
?>
</body>
</html>
