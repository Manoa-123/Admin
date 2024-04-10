<?php
include('bdd/conexion_bdd.php');

if ($conn == false) {
    die("Erreur" . $conn->error);
    # code...
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # code...
    $titre = $_POST["titre"];
    $libelle = $_POST["libelle"];
    

    $sql = "INSERT INTO service (titre,libelle) VALUES ('$titre','$libelle')";

    if ($conn->query($sql) == true) {
        # code...
        header("Location:service.php");
    } else {
        # code...
        echo "erreur" . $conn->error;
    }

}

?>