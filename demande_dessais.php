<?php
session_start();
include('bdd/conexion_bdd.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
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
                    <h3 class="text-dark mb-4">DEMANDE D'ESSAIS</h3> 
                    <div class="card shadow">
                        <div class="card-header py-3">
                            
                        </div>


                        
                        <div class="card-body">
                            
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                <?php
                                    
                                    $sql = "SELECT * FROM dmdessai ";
                                    $sql_client = mysqli_query($conn,$sql);
                                    if ($sql_client -> num_rows > 0) {
                                        echo '<echo>
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Civilité</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Date</th>
                                                <th>Heure</th>
                                                <th>Marque</th>
                                                <th>Modèle</th>
                                                <th>Type</th>
                                                <th>Transmission</th>
                                                <th>Statut</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead></echo>';
                                        while ($row_client = mysqli_fetch_assoc($sql_client)) {
                                            echo '<tr>
                                                <td>'.$row_client['id_dmdessai'].'</td>
                                                <td>'.$row_client['civilite'].'</td>
                                                <td>'.$row_client['nom'].'</td>
                                                <td>'.$row_client['prenom'].'</td>
                                                <td>'.$row_client['dates'].'</td>
                                                <td>'.$row_client['heure'].'</td>
                                                <td>'.$row_client['marque'].'</td>
                                                <td>'.$row_client['v_nom'].'</td>
                                                <td>'.$row_client['type'].'</td>
                                                <td>'.$row_client['transmission'].'</td>
                                                <td>
                                                    <form method="POST" action="traitement_statut.php">
                                                        <input type="hidden" name="id_dmdessai" value="' . $row_client['id_dmdessai'] . '">
                                                        <select name="statut">
                                                            <option value="en_cours" ' . ($row_client['statut'] == 'en_cours' ? 'selected' : '') . '>En cours</option>
                                                            <option value="confirme" ' . ($row_client['statut'] == 'confirme' ? 'selected' : '') . '>Confirmé</option>
                                                            <option value="termine" ' . ($row_client['statut'] == 'termine' ? 'selected' : '') . '>Terminé</option>
                                                        </select>
                                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="delete_dmdessais.php?id_dmdessai=' . $row_client['id_dmdessai'] . '">
                                                        <button class="btn btn-primary" type="button" style="background: var(--bs-red);margin-right: 9px;border-top-color: var(--bs-red);border-right-color: var(--bs-red);border-bottom-color: var(--bs-red);border-left-color: var(--bs-red);">Supprimer</button>
                                                    </a>
                                                    
                                                </td>
                                            </tr>';
                                        }
                                    }
                                        
                                    ?>
                                    
                                    
                                    </tbody>
                                </table>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite"></p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>SUPERCAR © 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>