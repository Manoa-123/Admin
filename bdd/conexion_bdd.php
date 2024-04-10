<?php
$serveur = "mysql-manoa.alwaysdata.net";
$utilisateur = "manoa";
$motDePasse = "jesuislibre";
$baseDeDonnees = "manoa_supercar";

$conn = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

// Vérifier la connexion
if (!$conn) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}
?>