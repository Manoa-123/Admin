<?php
$id_acceuil = $_GET['id_acceuil'];
include('bdd/conexion_bdd.php');
if ($conn == false) {
    die("Erreur" . $conn->error);
}

$sql = "DELETE FROM acceuil WHERE id_acceuil = '$id_acceuil' ";

$sql_acceuil = $conn->query($sql);

if ($sql_acceuil == true) {
    // Suppression réussie
    header("Location: service.php");
} else {
    echo 'erreur' . $sql . "<br>" . $conn->error;
}
?>