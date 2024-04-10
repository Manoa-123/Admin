<?php
session_start();
include('bdd/conexion_bdd.php');

$id_acceuil = $_POST['id_acceuil'];
$id_acceuil = $_POST['id_acceuil'];
$nouveau_libelle1 = $_POST['libelle_1'];
$nouveau_libelle2 = $_POST['libelle_2'];
$nouveau_libelle3 = $_POST['libelle_3'];
$nouveau_libelle4 = $_POST['libelle_4'];

    
    // Vérifiez la connexion
    if (!$conn) {
        die("La connexion à la base de données a échoué: " . mysqli_connect_error());
    }

    // Préparez la requête de mise à jour
    $sql = "UPDATE acceuil SET libelle_1 = '$nouveau_libelle1', libelle_2 = '$nouveau_libelle2',libelle_3='$nouveau_libelle3',libelle_4='$nouveau_libelle4' WHERE id_acceuil = '$id_acceuil' ";

    // Exécutez la requête de mise à jour
    if (mysqli_query($conn, $sql)) {
        // La mise à jour a réussi, redirigez vers la page de liste des services
        header("Location: acceuil.php");
        exit();
    } else {
        // La mise à jour a échoué, gérez l'erreur
        echo "Erreur lors de la mise à jour  : " . mysqli_error($conn);
    }

    // Fermez la connexion à la base de données
    mysqli_close($conn);

?>
