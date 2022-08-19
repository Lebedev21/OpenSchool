<?php

    session_start();

    if(!($_SESSION['role'] == "admin")) {
        header("Location: ../login.php");
    }

    require_once("../inc/config.php");

?>

<html>

    <head>

        <title> Hallinta </title>
        <link rel="stylesheet" href="../css/style.css">

    </head>

    <body>

        <center>
            <h1> Lisää käyttäjä: </h1>  
            <hr style="border: 1px solid gray; width: 400px;">
            <br>
            <form action="adduser.php" method="post">
                <input type="text" name="username" placeholder="Käyttäjänimi"><br>
                <input type="password" name="password" placeholder="Salasana"><br>
                <input type="text" name="role" placeholder="Rooli"><br>
                <input type="text" name="class" placeholder="Luokka"><br>
                <input type="submit" value="Lisää käyttäjä">
            </form>
            <br>
            <h1> Poista käyttäjä: </h1>
            <hr style="border: 1px solid gray; width: 400px;">
            <br>
            <form action="deleteuser.php" method="post">
                <input type="text" name="id" placeholder="Käyttäjän Tunnistenumero"><br>
                <input type="submit" value="Poista käyttäjä">
            </form>
        </center>

    </body>

</html>