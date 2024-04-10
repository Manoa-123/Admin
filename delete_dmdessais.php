<?php
session_start();
include('bdd/conexion_bdd.php');

if (isset($_GET['id_dmdessai'])) {
    $id_dmdessai = $_GET['id_dmdessai'];

    
    $sql = "DELETE FROM dmdessai WHERE id_dmdessai = $id_dmdessai";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location:demande_dessais.php"); 
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>
