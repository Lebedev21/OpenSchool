<?php

    session_start();
    
    if(!($_SESSION['role'] == "teacher")) {
        header("Location: ../login.php");
    }
    
    require_once("../inc/config.php");
    
    $name = $_POST['name'];
    $class = $_POST['class'];
    $date = $_POST['date'];
    $subject = $_POST['subject'];
    $resolved = $_POST['resolved'];

    $sql = "INSERT INTO absences (name, class, date, subject, resolved) VALUES ('$name', '$class', '$date', '$subject', '$resolved')";
    $result = mysqli_query($conn, $sql);
    if($result) {
        echo "Lisäys onnistui!";
        header("Location: index.php");
    } else {
        echo "Lisäys epäonnistui!";
        header("Location: index.php");
    }


?>