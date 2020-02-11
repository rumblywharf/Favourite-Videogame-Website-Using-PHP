<!DOCTYPE html> <!-- DOCTYPE tag-->
<html lang='en'> <!-- Starting HTML tag-->
<head> <!-- Starting head tag-->
    <meta charset='UTF-8'> <!-- using utf-8 charset tag-->
    <title>Assignment 1</title> <!-- Creating a title tag-->
</head> <!-- Ending head tag-->
<body> <!-- Starting body tag-->
<h1><strong>Video Games</strong></h1> <!-- Video Games header-->
<img src="https://www.washingtonpost.com/wp-apps/imrs.php?src=https://arc-anglerfish-washpost-prod-washpost.s3.amazonaws.com/public/2NI3ACSRWBHFVDDHRDKDQDVMEA.jpg&w=767" alt="Video-Games-Photo"> <!-- calls an external image-->
<form> <!-- starting form tag-->
    <fieldset> <!-- starting fieldset tag-->
        <legend>What is your favourite video game?</legend> <!-- creating a legend-->
            <label for="title">Game title: </label> <!-- creating a label-->
            <input type="text" id="title" placeholder= "Call of Duty" name="title" required> <!-- making an text input-->

            <label for="Console">Select a console: </label> <!-- creating a label-->
            <select name="Console" id="Console"> <!-- making a select type input-->
                <?php
                $db = new PDO('mysql:host=172.31.22.43;dbname=Cameron_R1106175', 'Cameron_R1106175', '7N8VChxI8o');
                $query = 'SELECT console FROM consoles;';
                $newQuery = $db->prepare($query);
                $newQuery->execute();
                $console = $newQuery->fetchAll();

                foreach ($console as $value)
                    echo '<option>' . $value['console'] . '</option>';

                $db = null;
                ?>
            </select> <!-- ending a select type input-->
    </fieldset> <!-- ending fieldset tag-->
</form> <!-- ending form tag-->
</body> <!-- Ending body tag-->
</html> <!-- Ending HTML tag-->
