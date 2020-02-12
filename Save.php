<!DOCTYPE html> <!-- DOCTYPE tag-->
<html lang='en'> <!-- Starting HTML tag-->
<head> <!-- Starting head tag-->
    <meta charset='UTF-8'> <!-- using utf-8 charset tag-->
    <title>Saved Database</title> <!-- Creating a title tag-->
</head> <!-- Ending head tag-->
<body> <!-- Starting body tag-->
<h1><strong>Video Games</strong></h1> <!-- Video Games header-->
<?php
$db = new PDO('mysql:host=172.31.22.43;dbname=Cameron_R1106175', 'Cameron_R1106175', '7N8VChxI8o');
//connecting to my database
$query = 'SELECT * FROM assignment1;';
//showing everything from the table 'teams'
$newQuery = $db->prepare($query);
//prepare the database for the query to run and storing it in a new variable
$newQuery->execute();
//execute the new variable
$favGame = $newQuery->fetchAll();
//fetch the new query from teams
echo '<table border="1"><thead><th>Title</th><th>Console</th><th>Rating</th></thead>';
//creating the table with one border and all 3 different headers
foreach($favGame as $value){
    //for each heading from the pulled query, check for a value
    echo '<tr> <td>' . $value['title'] . '</td> <td>' . $value['console'] . '</td> <td>' . $value['rating'] . '</td> </tr>';
    //<tr> tag goes around the values as a whole and each heading, it must be in a <td> tag, while connecting each tag with a period
}
$db = null;
//shut down the database
?>
</body> <!-- Ending body tag-->
</html> <!-- Ending HTML tag-->
