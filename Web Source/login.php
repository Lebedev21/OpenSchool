<?php

    session_start();

    if(isset($_SESSION['username'])){
        header('Location: dashboard.php');
    }

    require_once("./inc/config.php");

?>

<!DOCTYPE html>
<html lang="fi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Kirjautuminen</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    </head>
    <body>
        <div class="navbar">
            <h2> OpenSchool </h2>
        </div>
        <div class="login">
            <form action="login.php" method="post">          
                <center>
                    <h3> <i class="fas fa-lock-open"></i> Kirjaudu sisään </h3>
                    <input type="text" name="username" placeholder="Käyttäjätunnus">
                    <input type="password" name="password" placeholder="Salasana">
                    <input type="submit" value="Kirjaudu sisään">
                </center>
            </form>
        </div>  
    </body>
</html>

<?php

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($username) && isset($password)) {

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck < 1) {
        echo "<br><center>Väärä käyttäjänimi tai salasana.</center>";
        exit;
    } else {
        if ($row = mysqli_fetch_assoc($result)) {
            $hashed_password = $row['password'];
            if (password_verify($password, $hashed_password)) {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $row['role'];
                header('Location: dashboard.php');
                exit;
            } else {
                echo "<br><center>Väärä käyttäjänimi tai salasana.</center>";
                exit;
            }
        }
    }

} 

?>