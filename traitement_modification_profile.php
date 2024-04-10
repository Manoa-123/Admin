<?php
session_start();
include('bdd/conexion_bdd.php');

 // Vérifiez la connexion
 if (!$conn) {
    die("La connexion à la base de données a échoué: " . mysqli_connect_error());
}

if (isset($_POST['modifier_profile'])) {
    // Récupérez les données du formulaire
    $id_admin = $_POST['id_admin'];
    $nouveau_username = $_POST['username'];
    $nouveau_mdp = $_POST['mdp'];
   
    // Préparez la requête de mise à jour
    $sql = "UPDATE admin SET username = '$nouveau_username', mdp = '$nouveau_mdp' WHERE id_admin = $id_admin";

    // Exécutez la requête de mise à jour
    if (mysqli_query($conn, $sql)) {
        // La mise à jour a réussi
        header("Location: profile.php");
        exit();
    } else {
        // La mise à jour a échoué, gérez l'erreur
        echo "Erreur lors de la mise à jour du profil : " . mysqli_error($conn);
    }

    // Fermez la connexion à la base de données
    mysqli_close($conn);
} else {
    // Redirigez vers la page de liste des services si la soumission du formulaire est incorrecte
    header("Location: profile.php");
    exit();
}
?>
