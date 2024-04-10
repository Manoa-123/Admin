<?php
$id_admin = $_GET['id_admin'];
include('bdd/conexion_bdd.php');

if ($conn == false) {
    die("Erreur" . $conn->error);
}

$sql = "DELETE FROM admin WHERE id_admin = '$id_admin' ";

$sql_client = $conn->query($sql);

if ($sql_client == true) {
    // Suppression réussie
    header("Location: profile.php");
} else {
    echo 'erreur' . $sql . "<br>" . $conn->error;
}
?>