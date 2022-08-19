<?php

    session_start();
   
    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }

    require_once("./inc/config.php");

?>

<!DOCTYPE html>
<html lang="fi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Oma etusivu</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    </head>

    <body>

        <div class="navbar">
            <ul>
                <li> <a href="dashboard.php"> <i class="fa-solid fa-home"></i> Koti </a> </li>
                <li> <a href="messages.php"> <i class="fa-solid fa-envelope"></i> Viestit </a> </li>
                <!--<li> <a href="calendar.php"> <i class="fa-solid fa-calendar"></i> Työjärjestys </a> </li>-->
                <li> <a href="absences.php"> <i class="fa-solid fa-calendar"></i> Poissaolot </a> </li>
                <li> <a href="exams.php"> <i class="fa-solid fa-pencil"></i> Kokeet </a> </li>
                <div id="logoff">
                    <a href="logoff.php"> <i class="fa-solid fa-power-off"></i> Kirjaudu ulos </a>
                </div>
            </ul>
        </div>

        <?php

            if($_SESSION['role'] == "admin") {
                $role = "Ylläpitäjä";
            }

            if($_SESSION['role'] == "student") {
                $role = "Oppilas";
            }

            if($_SESSION['role'] == "teacher") {
                $role = "Opettaja";
            }

        ?>

        <div class="home">

            <h2> Tervetuloa takaisin, <?php echo $_SESSION['username']; ?>! </h2>
            <p> Täällä voit seurata omia poissaolojasi, tulevia kokeita sekä lähettää ja vastaanottaa viestejä. </p>
            <br>
            <p> Sinä olet: <?php echo $role; ?>. </p>

        </div>

        <div class="box">

            <?php 
            
                if($role == "Ylläpitäjä") {
                    echo "<center><a class='admin-button' href='admin/'> <i class='fa-solid fa-toolbox'></i> Ylläpito </a></center>";
                }

                if($role == "Opettaja") {
                    echo "<center><a class='teacher-button' href='teacher/'> <i class='fa-solid fa-user-tie'></i> Hallitse </a></center>";
                }

                if($role == "Oppilas") {
                    $time = date("H:i:s");
                    echo "<center><p> Sivu päivitetty: $time </p></center>";
                }

            ?>

        </div>

    </body>

</html>