<!DOCTYPE html> <!-- DOCTYPE tag-->
<html lang='en'> <!-- Starting HTML tag-->
<head> <!-- Starting head tag-->
    <meta charset='UTF-8'> <!-- using utf-8 charset tag-->
    <title>Assignment 1</title> <!-- Creating a title tag-->
</head> <!-- Ending head tag-->
<body> <!-- Starting body tag-->
<center> <!-- making everything center starting tag-->
<h1><strong>Video Games</strong></h1> <!-- Video Games header-->
<img src="https://www.washingtonpost.com/wp-apps/imrs.php?src=https://arc-anglerfish-washpost-prod-washpost.s3.amazonaws.com/public/2NI3ACSRWBHFVDDHRDKDQDVMEA.jpg&w=767" alt="Video-Games-Photo"> <!-- calls an external image-->
<form action="SavingData.php" method="post"> <!-- starting form tag-->
    <fieldset> <!-- starting fieldset tag-->
        <legend>What is your favourite video game?</legend> <!-- creating a legend-->
            <label for="title">Game title: </label> <!-- creating a label-->
            <input type="text" id="title" name="title"> <!-- making an text input-->
            <label for="console">Select a console: </label> <!-- creating a label-->
            <select name="console" id="console"> <!-- making a select type input-->
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
            <select name="Rating" id="Rating"> <!-- making a select type input-->
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
        <input type="submit"> <!-- creating a submit button-->
    </fieldset> <!-- ending fieldset tag-->
</form> <!-- ending form tag-->
</center> <!-- making everything center ending tag-->
</body> <!-- Ending body tag-->
</html> <!-- Ending HTML tag-->
