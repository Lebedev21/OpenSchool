<?php

    session_start();
    
    if(!($_SESSION['role'] == "admin")) {
        header("Location: ../login.php");
    }
    
    require_once("../inc/config.php");
    
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM users WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "Käyttäjä poistettu onnistuneesti!";
        } else {
            echo "Käyttäjän poisto epäonnistui!";
        }
    }

?>