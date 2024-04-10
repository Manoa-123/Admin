<?php
session_start();

include('bdd/conexion_bdd.php');


if (!$conn) {
    # code...
    die("erreur" . mysqli_connect_error());

}

if (isset($_POST['ajout'])) {
    # code...
    $username = $_POST['username'];
    $mdp = $_POST['mdp'];
    


    $sql = "INSERT INTO admin (username,mdp) VALUES ('$username','$mdp')";
    



    if ($conn->query($sql) == true) {
        # code...
        header("Location:profile.php");
    } else {
        # code...
        echo "erreur" . $conn->error;
    }

}


?>