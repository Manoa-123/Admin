<?php
session_start();
include('bdd/conexion_bdd.php');
if (isset($_POST['categorie'])){
$nom = $_POST['categorie'];

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php
        include_once("header/header1.php")
            ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <?php
                                if (isset($_SESSION['username'])){
                                    echo '<div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">'.$_SESSION['username'].'<i class="far fa-user-circle" style="font-size: 14px";></i></span>
                                    </a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="index.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                    
                            </li>
                        </ul>
                    </div>';
                                }
                                ?>
                </nav>
                

                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">VOITURES</h3>
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block" id="openBtn" role="button" href="ajout_voiture.php" style="background: rgb(122,124,129);border-top-color: rgb(122,124,129);border-right-color: rgb(110,112,118);border-bottom-color: rgb(122,124,129);border-left-color: rgb(122,124,129);"><strong><span style="color: rgba(255, 255, 255, 0.5);">AJOUT DE VOITURES</span></strong></a>
                    </div>
                    <div class="container">
                 

<?php
                
                    if (isset($nom)) {
                        $liste = "SELECT * FROM voiture WHERE voiture_type = '$nom'";
                        $sql = mysqli_query($conn, $liste);
                        
                    


                    if ($sql->num_rows > 0) {
                        echo '<div class="table-responsive">';
                        echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                        echo '<thead>';
                        echo '    <tr>';
                        echo '        <th>ID</th>';
                        echo '        <th>Marque</th>';
                        echo '        <th>Nom</th>';
                        echo '        <th>Transmission</th>';
                        echo '        <th>Carburant</th>';
                        echo '        <th>Type</th>';
                        echo '        <th>Kilométrage</th>';
                        echo '        <th>Puissance</th>';
                        echo '        <th>Année</th>';
                        
                        echo '        <th>Prix</th>';
                        echo '        <th>Provenance</th>';
                        echo '        <th>Images</th>';
                        echo '        <th>Actions</th>';
        
                        echo '    </tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        
                        while ($row = mysqli_fetch_assoc($sql)) {
                            echo '<tr>';
                            echo '    <td>' . $row['id_voiture'] . '</td>';
                            echo '    <td>' . $row['voiture_marque'] . '</td>';
                            echo '    <td>' . $row['voiture_name'] . '</td>';
                            echo '    <td>' . $row['voiture_transmission'] . '</td>';
                            echo '    <td>' . $row['voiture_carburant'] . '</td>';
                            echo '    <td>' . $row['voiture_type'] . '</td>';
                            echo '    <td>' . $row['voiture_km'] . '</td>';
                            echo '    <td>' . $row['voiture_puissance'] . '</td>';
                            echo '    <td>' . $row['voiture_annee'] . '</td>';
                           
                            echo '    <td>' . $row['voiture_prix'] . '</td>';
                            echo '    <td>' . $row['provenance'] . '</td>';

                            $image_query = "SELECT sre FROM image_voiture WHERE id_voiture=" . $row['id_voiture'];
                            $result_image = mysqli_query($conn, $image_query);
                            if ($result_image) {
                                echo '<td>';
                                $image_paths = array();
                                while ($image_row = mysqli_fetch_assoc($result_image)) {
                                    $image_path = $image_row['sre'];
                                    $image_paths[] = $image_path;
                                }
                                // Afficher les chemins d'accès des images dans une liste
                                echo '<ul>';
                                foreach ($image_paths as $image_path) {
                                    echo '<li>' . $image_path . '</li>';
                                }
                                echo '</ul>';
                                echo '</td>';
                            } else {
                                echo '<td>Image non disponible</td>';
                            }
                            echo '    <td>';
                            echo '        <a href="modifier_voiture.php?id_voiture=' . $row['id_voiture'] . '"> 
                            <button class="btn btn-primary" type="button" style="background: #6689cc;border-top-color: rgb(102,137,204);border-right-color: rgb(102,137,204);border-bottom-color: rgb(102,137,204);border-left-color: rgb(102,137,204);margin-right: 9px;">modifier    </button></a>';
                            echo '        <a href="delete_voiture.php?id_voiture=' . $row['id_voiture'] . '">
                            <button class="btn btn-primary" type="button" style="padding-left: 18px;margin-right: 8px;background: var(--bs-red);margin-left: -6px;border-top-color: var(--bs-danger);border-right-color: var(--bs-danger);border-bottom-color: var(--bs-danger);border-left-color: var(--bs-danger);">supprimer</button></a>';
                            echo '    </td>';
                        
                            echo '</tr>';
                        }
                    }
                        
                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>';
                    }
                        
    ?>
    
    

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>