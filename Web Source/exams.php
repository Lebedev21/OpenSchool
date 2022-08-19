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
        <title>Kokeet</title>
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

        <div class="exams">

            <h2> Tulevat kokeet: </h2>
            <?php

                $user = $_SESSION['username'];
                $query = "SELECT class FROM users WHERE username = '$user'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $luokka = $row['class'];

                $sql = "SELECT * FROM exams WHERE class = '$luokka' AND date > CURDATE() ORDER BY date ASC";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<p>".$row['date']." - ".$row['subject']." - " .$row['about']. "</p>";
                    }
                } else {
                    echo "<p>Ei tulevia kokeita.</p>";
                }

            ?>

        </div>

    </body>

</html>