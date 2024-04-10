<?php
$id_contact = $_GET['id_contact'];
include('bdd/conexion_bdd.php');
if ($conn == false) {
    die("Erreur" . $conn->error);
}

$sql = "DELETE FROM contact WHERE id_contact = '$id_contact' ";

$sql_client = $conn->query($sql);

if ($sql_client == true) {
    // Suppression réussie
    header("Location: contact.php");
} else {
    echo 'erreur' . $sql . "<br>" . $conn->error;
}
?>