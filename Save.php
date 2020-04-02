<!DOCTYPE html> <!-- DOCTYPE tag-->
<html lang='en'> <!-- Starting HTML tag-->
<head> <!-- Starting head tag-->
    <meta charset='UTF-8'> <!-- using utf-8 charset tag-->
    <link rel="stylesheet" href="style.css">
    <!--    found the css at: https://www.free-css.com/free-css-templates/page246/freshshop-->

    <title>Saved Database</title> <!-- Creating a title tag-->
</head> <!-- Ending head tag-->
<body> <!-- Starting body tag-->
<center> <!-- making everything center starting tag-->
    <header>
        <nav>
            <div>
                <a href="Home.php">Home</a>
            </div>
            <div><a href="Main.php">Input</a></div>
            <div>
                <a href="Save.php">Database</a>
            </div>
            <?php
            session_start();
            if(empty($_SESSION['usersID'])) {
                echo
               '<div><a href = "login.php">Login</a></div >
            <div><a href = "Register.php">Register</a></div>';
            }
            else{
                echo '<div><a href = "logout.php">Logout</a></div>';
            }
            ?>
        </nav>
    </header>
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
echo '<table border="1"><thead><th>Title</th><th>Console</th><th>Rating</th><th>Picture</th>';
if(!empty($_SESSION['usersID']))
    echo '<th>Edit</th><th>Delete</th>';
echo '</thead>';
//creating the table with one border and all 3 different headers
foreach($favGame as $value){
    //for each heading from the pulled query, check for a value
    echo '<tr> <td>' . $value['title'] . '</td> <td>' . $value['console'] . '</td> <td>' . $value['rating'] . '</td>';

    if(!empty($value['pictures']))
        echo '<td><img src="uploads/' . $value['pictures'] . '" alt="imageRecord" width="100" height="50"/>';
    else
        echo '<td></td>';

    if(!empty($_SESSION['usersID']))
    echo '<td><a href = "Main.php?video_game_id=' . $value['video_game_id'] . '" onclick = "return confirmEdit();">Edit</a></td> <td><a href = "delete.php?video_game_id=' . $value['video_game_id'] . '" onclick = "return confirmDelete();">Delete</a></td>';
echo '</tr>';
    //<tr> tag goes around the values as a whole and each heading, it must be in a <td> tag, while connecting each tag with a period
}
$db = null;
//shut down the database
?>
</center> <!-- making everything center ending tag-->
<script src =  "javascript/javascript_file.js"></script>
</body> <!-- Ending body tag-->
</html> <!-- Ending HTML tag-->
