<?php
session_start();
include('bdd/conexion_bdd.php');
 // Vérifiez la connexion
 if (!$conn) {
    die("La connexion à la base de données a échoué: " . mysqli_connect_error());
}

if (isset($_POST['modifier_voiture'])) {
    // Récupérez les données du formulaire
    $id_voiture = $_POST['id_voiture'];
    $nouveau_marque = $_POST['voiture_marque'];
    $nouveau_name = $_POST['voiture_name'];
    $nouveau_transmission = $_POST['voiture_transmission'];
    $nouveau_carburant = $_POST['voiture_carburant'];
    $nouveau_km = $_POST['voiture_km'];
    $nouveau_puissance = $_POST['voiture_puissance'];
    $nouveau_prix = $_POST['voiture_prix'];
    $nouveau_provenance = $_POST['provenance'];

   

    // Préparez la requête de mise à jour
    $sql = "UPDATE voiture SET voiture_marque = '$nouveau_marque', voiture_name = '$nouveau_name',voiture_transmission='$nouveau_transmission',
    voiture_carburant='$nouveau_carburant',voiture_km='$nouveau_km',voiture_puissance= '$nouveau_puissance',voiture_prix='$nouveau_prix',provenance= '$nouveau_provenance' WHERE id_voiture = $id_voiture";

    // Exécutez la requête de mise à jour
    if (mysqli_query($conn, $sql)) {
        // La mise à jour a réussi
        header("Location: menu.php");
        exit();
    } else {
        // La mise à jour a échoué, gérez l'erreur
        echo "Erreur lors de la mise à jour  : " . mysqli_error($conn);
    }

    // Fermez la connexion à la base de données
    mysqli_close($conn);
} else {
    
    header("Location: liste_voiture.php");
    exit();
}
?>
