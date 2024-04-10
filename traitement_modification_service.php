<?php
session_start();
include('bdd/conexion_bdd.php');
 // Vérifiez la connexion
 if (!$conn) {
    die("La connexion à la base de données a échoué: " . mysqli_connect_error());
}


if (isset($_POST['modifier_service'])) {
    // Récupérez les données du formulaire
    $id_service = $_POST['id_service'];
    $nouveau_titre = $_POST['titre'];
    $nouveau_libelle = $_POST['libelle'];
    
    // Préparez la requête de mise à jour
    $sql = "UPDATE service SET titre = '$nouveau_titre', libelle = '$nouveau_libelle' WHERE id_service = $id_service";

    // Exécutez la requête de mise à jour
    if (mysqli_query($conn, $sql)) {
        // La mise à jour a réussi, redirigez vers la page de liste des services
        header("Location: service.php");
        exit();
    } else {
        // La mise à jour a échoué, gérez l'erreur
        echo "Erreur lors de la mise à jour du service : " . mysqli_error($conn);
    }

    // Fermez la connexion à la base de données
    mysqli_close($conn);
} else {
    // Redirigez vers la page de liste des services si la soumission du formulaire est incorrecte
    header("Location: service.php");
    exit();
}
?>
