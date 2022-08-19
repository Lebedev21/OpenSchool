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
        <title>Viestit</title>
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

        <div class="messages">

            <form class="message-form" action="messages.php" method="post">
                <h2> Lähetä viesti: </h2>
                <input type="text" name="recipient" placeholder="Vastaanottajan käyttäjätunnus...">
                <input type="text" name="subject" placeholder="Aihe">
                <textarea maxlength="255" name="message" placeholder="Viesti"></textarea>
                <input type="submit" value="Lähetä viesti!">
            </form>

            <div class="messages-received">
            <h2> Saapuneet viestit: </h2>

                <?php

                    $sql = "SELECT * FROM messages WHERE receiver = '".$_SESSION['username']."'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<div class='message'>";
                                echo "<p> Lähettäjä: ".$row['sender']."</p>";
                                echo "<p>Aihe: ".$row['title']."</p>";
                                echo "<p>Viesti: ".$row['message']."</p>";
                                echo "<p>Vastaanotettu: ".$row['date']."</p>";
                            echo "</div>";
                        }
                    }
                    else{
                        echo "<p style='color: red;'>Sinulle ei ole viestejä.</p>";
                    }

                ?>
                
            </div>

        </div>

    </body>

</html>

<?php

    if(isset($_POST['recipient']) && isset($_POST['subject']) && isset($_POST['message'])){

        $strippasinbaarisminajamunmalis = htmlspecialchars($_POST['message']);
        $recipient = mysqli_real_escape_string($conn, $_POST['recipient']);
        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $strippasinbaarisminajamunmalis22 = mysqli_real_escape_string($conn, $strippasinbaarisminajamunmalis);
        $date = date("Y-m-d H:i:s");
        $sender = $_SESSION['username'];
        $sql = "INSERT INTO messages (sender, receiver, title, message, date) VALUES ('$sender', '$recipient', '$subject', '$strippasinbaarisminajamunmalis22', '$date')";
        mysqli_query($conn, $sql);

    }

?>