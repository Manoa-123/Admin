<?php
$idco = $_GET['idco'];
include('bdd/conexion_bdd.php');

if ($conn == false) {
    die("Erreur" . $conn->error);
}

$sql = "DELETE FROM inscription WHERE idco = '$idco' ";

$sql_client = $conn->query($sql);

if ($sql_client == true) {
    // Suppression réussie
    header("Location: table.php");
} else {
    echo 'erreur' . $sql . "<br>" . $conn->error;
}
?>