<?php
$id_service = $_GET['id_service'];
include('bdd/conexion_bdd.php');
if ($conn == false) {
    die("Erreur" . $conn->error);
}

$sql = "DELETE FROM service WHERE id_service = '$id_service' ";

$sql_service = $conn->query($sql);

if ($sql_service== true) {
    // Suppression réussie
    header("Location: service.php");
} else {
    echo 'erreur' . $sql . "<br>" . $conn->error;
}
?>