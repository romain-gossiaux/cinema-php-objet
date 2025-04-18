<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <div class="container" id="menu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="index_.php?page=accueil_admin.php">
                        <img class="img-fluid" src="./assets/images/logo.png" alt="Logo du cinéma" width="64">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SESSION['page'] == 'accueil_admin.php') { echo 'active'; } ?>" href="index_.php?page=accueil_admin.php">Accueil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php if ($_SESSION['page'] == 'ajouter_seance.php' || $_SESSION['page'] == 'modifier_seance.php') echo 'active'; ?>"
                       href="#" role="button" data-bs-toggle="dropdown" >
                        Gérer séances
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index_.php?page=ajouter_seance.php">Ajouter séance</a></li>
                        <li><a class="dropdown-item" href="index_.php?page=modifier_seance.php">Modifier séance</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SESSION['page'] == 'reservations.php') { echo 'active'; } ?>" href="index_.php?page=reservations.php">Gérer réservations</a>
                </li>
                <li class="ms-auto p-2">
                    <a class="btn btn-warning" href="index_.php?page=disconnect.php" role="button">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>