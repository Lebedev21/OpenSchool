<?php

    session_start();
    
    if(!($_SESSION['role'] == "teacher")) {
        header("Location: ../login.php");
    }
    
    require_once("../inc/config.php");
    
    if(isset($_POST['subject']) && isset($_POST['class']) && isset($_POST['date']) && isset($_POST['about'])) {
        $subject = $_POST['subject'];
        $class = $_POST['class'];
        $date = $_POST['date'];
        $about = $_POST['about'];
        $sql = "INSERT INTO exams (subject, class, date, about) VALUES ('$subject', '$class', '$date', '$about')";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "Koe lisätty onnistuneesti!";
            header("Location: index.php");
        } else {
            echo "Kokeen lisäys epäonnistui!";
            header("Location: index.php");
        }
    }

?>