<?php
$id_voiture = $_GET['id_voiture'];
include('bdd/conexion_bdd.php');

if ($conn == false) {
    die("Erreur" . $conn->error);
}

$sql = "DELETE FROM voiture WHERE id_voiture = '$id_voiture' ";

$sql_voiture = $conn->query($sql);

if ($sql_voiture == true) {
    // Suppression réussie
    header("Location: menu.php");
} else {
    echo 'erreur' . $sql . "<br>" . $conn->error;
}
?>