<?php
session_start();
include('bdd/conexion_bdd.php');
 // Vérifiez la connexion
 if (!$conn) {
    die("La connexion à la base de données a échoué: " . mysqli_connect_error());
}



// Récupération des données du formulaire
$id_dmdessai = $_POST['id_dmdessai'];
$nouveauStatut = $_POST['statut'];

// Mettre à jour le statut dans la table "dmdessai"
$sql = "UPDATE dmdessai SET statut = '$nouveauStatut' WHERE id_dmdessai = '$id_dmdessai'";

if ($conn->query($sql) === TRUE) {
    echo "Le statut a été mis à jour avec succès.";
} else {
    echo "Erreur lors de la mise à jour du statut : " . $conn->error;
}

// Fermeture de la connexion
$conn->close();
?>
