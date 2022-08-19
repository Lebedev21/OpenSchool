<?php

    session_start();

    if(!($_SESSION['role'] == "teacher")) {  
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
            <h1> Lisää koe: </h1>
            <hr style="border: 1px solid gray; width: 400px;">
            <br>
            <form action="addexam.php" method="post">
                <input type="text" name="subject" placeholder="Oppiaine"><br>
                <input type="text" name="class" placeholder="Luokka"><br>
                <input type="text" name="date" placeholder="Päivämäärä (VVVV-KK-PP)"><br>
                <input type="text" name="about" placeholder="Kuvaus"><br>
                <input type="submit" value="Lisää koe!">
            </form>
            <br>
            <h1> Lisää poissaolo: </h1>
            <hr style="border: 1px solid gray; width: 400px;">
            <br>
            <form action="addabsence.php" method="post">
                <input type="text" name="name" placeholder="Opiskelijan käyttäjätunnus"><br>
                <input type="text" name="class" placeholder="Opiskelijan luokka"><br>
                <input type="text" name="date" placeholder="Päivämäärä ja kellonaika (VVVV-KK-PP H:i:s)"><br>
                <input type="text" name="subject" placeholder="Oppitunti (esim. MA, EN, FY)"><br>
                <input type="text" name="resolved" placeholder="Luvaton / Luvallinen"><br>
                <input type="submit" value="Lisää poissaolo!">
            </form>
        </center>

    </body>

</html>