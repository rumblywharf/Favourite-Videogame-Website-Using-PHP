<?php
session_start();
if(empty($_SESSION['usersID']))
    header('location:login.php');
$video_game_id = null;
$title = null;
$console = null;
$rating = null;
$picture = null;
$file = null;

if(!empty($_GET['video_game_id'])){
    $video_game_id = ($_GET['video_game_id']);

    $db = new PDO('mysql:host=172.31.22.43;dbname=Cameron_R1106175', 'Cameron_R1106175', '7N8VChxI8o');
    $query = 'SELECT * FROM assignment1 WHERE video_game_id = :video_game_id;';
    $newQuery = $db->prepare($query);
    $newQuery->bindParam(':video_game_id', $video_game_id, PDO::PARAM_INT);
    $newQuery->execute();
    $records = $newQuery->fetch();
    $title = $records['title'];
    $console = $records['console'];
    $rating = $records['rating'];
    $picture = $records['pictures'];
    $file = $_FILES['file'];
    $db = null;
}
?>

<!DOCTYPE html> <!-- DOCTYPE tag-->
<html lang='en'> <!-- Starting HTML tag-->
<head> <!-- Starting head tag-->
    <meta charset='UTF-8'> <!-- using utf-8 charset tag-->
    <link rel="stylesheet" href="style.css">
    <!--    found the css at: https://www.free-css.com/free-css-templates/page246/freshshop-->

    <title>Assignment 1</title> <!-- Creating a title tag-->
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
<img src="https://www.washingtonpost.com/wp-apps/imrs.php?src=https://arc-anglerfish-washpost-prod-washpost.s3.amazonaws.com/public/2NI3ACSRWBHFVDDHRDKDQDVMEA.jpg&w=767" alt="Video-Games-Photo"> <!-- calls an external image-->
<form action="SavingData.php" method="post" enctype="multipart/form-data"> <!-- starting form tag-->
    <fieldset> <!-- starting fieldset tag-->
        <legend>What is your favourite video game?</legend> <!-- creating a legend-->
            <label for="title">Game title: </label> <!-- creating a label-->
            <input type="text" id="title" name="title" value="<?php echo $title; ?>"> <!-- making an text input-->
            <label for="console">Select a console: </label> <!-- creating a label-->
            <select name="console" id="console" value="<?php echo $console; ?>"> <!-- making a select type input-->
                <?php
                $db = new PDO('mysql:host=172.31.22.43;dbname=Cameron_R1106175', 'Cameron_R1106175', '7N8VChxI8o');
                //connecting to my database
                $query = 'SELECT console FROM consoles;';
                //showing consoles from the table 'consoles'
                $newQuery = $db->prepare($query);
                //prepare the database for the query to run and storing it in a new variable
                $newQuery->execute();
                //execute the new variable
                $console = $newQuery->fetchAll();
                //fetch the new query from consoles

                foreach ($console as $value)
                    echo '<option>' . $value['console'] . '</option>';
                //runs through all pulled data from database to fill the dropdown

                $db = null;
                //shut down the database
                ?>
            </select> <!-- ending a select type input-->

            <label for="Rating">Select an ESRB rating: </label> <!-- creating a label-->
            <select name="Rating" id="Rating" value="<?php echo $rating; ?>"> <!-- making a select type input-->
                <?php
                $db = new PDO('mysql:host=172.31.22.43;dbname=Cameron_R1106175', 'Cameron_R1106175', '7N8VChxI8o');
                //connecting to my database
                $query = 'SELECT Rating FROM Ratings;';
                //showing ratings from the table 'ratings'
                $newQuery = $db->prepare($query);
                //prepare the database for the query to run and storing it in a new variable
                $newQuery->execute();
                //execute the new variable
                $Rating = $newQuery->fetchAll();
                //fetch the new query from ratings

                foreach ($Rating as $value)
                    echo '<option>' . $value['Rating'] . '</option>';
                //runs through all pulled data from database to fill the dropdown
                $db = null;
                //shut down the database
                ?>
        </select> <!-- ending a select type input-->
        <input name="video_game_id" value="<?php echo $video_game_id; ?>" type="hidden"/>

        <label for="file">Choose a file: </label>
        <input type="file" id="pictures" name="pictures">

        <?php
        if(!empty($picture)){
            echo '<img src="uploads/' . $picture . '" alt="uploadedImage" width="100" height="50"/>';
        }
        ?>
        <input type="submit"> <!-- creating a submit button-->
    </fieldset> <!-- ending fieldset tag-->
</form> <!-- ending form tag-->
</center> <!-- making everything center ending tag-->
</body> <!-- Ending body tag-->
</html> <!-- Ending HTML tag-->
