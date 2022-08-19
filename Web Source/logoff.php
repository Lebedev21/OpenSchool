<?php

    session_start();
    session_destroy();

    echo "<title> Olet kirjautunut ulos. </title>";
    echo "<link rel='stylesheet' href='css/style.css'>";
    echo "<br><center>Kirjauduit ulos. Sinut ohjataan takaisin kirjautumiseen...</center>";
    header('Refresh: 3; url=login.php');

?>