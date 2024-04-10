<?php
session_start();
if (isset($_GET['id_acceuil'])) {
    $id_acceuil = $_GET['id_acceuil'];
} else {
    // Gérez l'erreur si l'identifiant n'est pas présent dans l'URL
    echo "L'identifiant de l'acceuil à modifier n'a pas été spécifié.";
    exit(); // Arrêtez le script pour éviter l'affichage du formulaire vide
}
// Connection à la base
$conn = mysqli_connect("localhost", "root", "", "supercar");

// Récupérez les données actuelles depuis la base de données
$sql = "SELECT * FROM acceuil WHERE id_acceuil = $id_acceuil";
$result = mysqli_query($conn, $sql);

if ($result && $row = mysqli_fetch_assoc($result)) {
    // Les données sont disponibles, vous pouvez les utiliser pour remplir le formulaire
} else {
    // L'identifiant n'a pas été trouvé dans la base de données, gérez l'erreur
    echo "L'identifiant de l'acceuil n'a pas été trouvé dans la base de données.";
    exit(); // Arrêtez le script pour éviter l'affichage du formulaire vide
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Modifier Acceuil - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: var(--bs-red);">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div><img src="logo.png" width="80px" height="80px"></div>
                    <div class="sidebar-brand-text mx-3"><span>supercar</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="menu.php"><i class="fas fa-car-side"></i><span>VOITURES</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="profile.php"><i class="fas fa-user"></i><span>PROFILS</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="service.php"><i class="fas fa-table"></i><span>SERVICE</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="table.php"><i class="far fa-user-circle"></i><span>CLIENTS</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="demande_dessais.php"><i class="far fa-calendar-alt"></i><span>DEMANDE D'ESSAIS</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php"><i class="fas fa-user"></i><span>CONTACT</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="acceuil.php"><i class="fas fa-table"></i><span>ACCEUIL</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>
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
                            <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
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
                    <h3 class="text-dark mb-4">Modifier Acceuil</h3>
                </div>
                <section class="position-relative py-4 py-xl-5">
                    <div class="container position-relative">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-5">
                                <div class="card mb-7">
                                    <div class="card-body p-sm-5">
                                        <form  action="traitement_modification_acceuil.php" method="post">
                                        <input type="hidden" name="id_acceuil" value="<?php echo $row['id_acceuil']; ?>">
                                        <label for="titre">A propos :</label>
                                        <textarea id="libelle_1" class="form-control" name="libelle_1" rows="6" placeholder="libelle 1" required><?php echo $row['libelle_1']; ?></textarea>
                                        <br>
                                        <br>
                                        <label for="libelle">Libellé :</label>
                                        <textarea id="libelle" class="form-control" name="libelle_2" rows="6" placeholder="Libellé" required><?php echo $row['libelle_2']; ?></textarea>
                                        <br>
                                        <br>
                                        <label for="libelle">Libellé :</label>
                                        <textarea id="libelle" class="form-control" name="libelle_3" rows="6" placeholder="Libellé" required><?php echo $row['libelle_3']; ?></textarea>
                                        <br>
                                        <br>
                                        <label for="libelle">Libellé :</label>
                                        <textarea id="libelle" class="form-control" name="libelle_4" rows="6" placeholder="Libellé" required><?php echo $row['libelle_4']; ?></textarea>
                                        <br>
                                        <br>
                                        <input type="hidden" value="<?php echo $row['id_acceuil']; ?>">
                                        <button class="btn btn-primary d-block w-100" name="modifier_acceuil " type="submit">Modifier</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"></div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
