<!DOCTYPE html> <!-- DOCTYPE tag-->
<html lang='en'> <!-- Starting HTML tag-->
<head> <!-- Starting head tag-->
    <meta charset='UTF-8'> <!-- using utf-8 charset tag-->
    <title>Register</title> <!-- Creating a title tag-->
</head> <!-- Ending head tag-->
<body> <!-- Starting body tag-->
<center> <!-- making everything center starting tag-->
    <header>
        <nav>
            <div>
                <a href="Home.php">Home</a>
            </div>
            <div>
                <a href="Main.php">Input</a>
            </div>
            <div>
                <a href="Save.php">Database</a>
            </div>
        </nav>
    </header>
    <h1>Register</h1>
    <form method="post" action="RegisterUser.php">
        <fieldset>
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" required> <!-- making an text input-->

            <label for="password">Password: </label>
            <input type="text" id="password" name="password" required> <!-- making an text input-->

            <label for="confirm">Confirm Password: </label>
            <input type="text" id="confirm" name="confirm" required> <!-- making an text input-->
        </fieldset>
        <input type="submit">
    </form>
</center> <!-- making everything center ending tag-->
</body> <!-- Ending body tag-->
</html> <!-- Ending HTML tag-->