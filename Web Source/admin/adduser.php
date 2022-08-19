<?php

    session_start();
    
    if(!($_SESSION['role'] == "admin")) {
        header("Location: ../login.php");
    }
    
    require_once("../inc/config.php");

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role']) && isset($_POST['class'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = $_POST['role'];
        $class = $_POST['class'];
        $sql = "INSERT INTO users (username, password, role, class) VALUES ('$username', '$password', '$role', '$class')";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "Käyttäjä lisätty onnistuneesti!";
        } else {
            echo "Käyttäjän lisäys epäonnistui!";
        }
    }

?>