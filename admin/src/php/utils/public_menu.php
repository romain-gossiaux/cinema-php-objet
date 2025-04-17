<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="index_.php?page=accueil.php">
                        <img class="img-fluid" src="./admin/assets/images/logo.png" alt="Logo du cinéma" width="64">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SESSION['page'] == 'accueil.php') { echo 'active'; } ?>" href="index_.php?page=accueil.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SESSION['page'] == 'films.php') { echo 'active'; } ?>" href="index_.php?page=films.php">Films</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SESSION['page'] == 'seances.php') { echo 'active'; } ?>" href="index_.php?page=seances.php">Séances</a>
                </li>
                <div class="ms-auto p-2">
                    <a class="btn btn-warning" href="index_.php?page=login.php" role="button">Connexion</a>
                </div>
            </ul>

        </div>
    </div>
</nav>