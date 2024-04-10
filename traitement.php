<?php
session_start();
include('bdd/conexion_bdd.php');
if (!$conn) {
    # code...
    die("erreur" . mysqli_connect_error());

}

if (isset($_POST['login'])) {
    # code...
    $username = $_POST['username'];
    $mdp = $_POST['mdp'];

    $sql = "SELECT * FROM admin where username = '$username' AND mdp = '$mdp' ";

    $sql_login = mysqli_query($conn,$sql);

    if ( $row = mysqli_fetch_assoc($sql_login)) {
        # code...
        $_SESSION['username'] = $row['username'];
        $_SESSION['mdp'] = $row['mdp'];
        header("Location:menu.php");
        exit;
    } else {
        # code...
        echo "<script>alert('Username ou mot de passe incorrect.')</script>";
        echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
        exit;

    }

}


?>