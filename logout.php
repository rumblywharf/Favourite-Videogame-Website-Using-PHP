<!DOCTYPE html> <!-- DOCTYPE tag-->
<html lang='en'> <!-- Starting HTML tag-->
<head> <!-- Starting head tag-->
    <meta charset='UTF-8'> <!-- using utf-8 charset tag-->
    <link rel="stylesheet" href="style.css">
<!--    found the css at: https://www.free-css.com/free-css-templates/page246/freshshop-->
    <title>Logging the user out</title> <!-- Creating a title tag-->
</head> <!-- Ending head tag-->
<body>
<?php
session_start();
session_unset();
session_destroy();
header('location:login.php');
?>
</body>
</html>
