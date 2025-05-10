<?php
if(isset($_POST['login_submit'])){
    extract($_POST,EXTR_OVERWRITE);
    $adm = new AdminDAO($cnx);
    $nom_admin = $adm->getAdmin($login,$password);

    if ($nom_admin){
        $_SESSION['admin'] = $nom_admin;
        header('location: admin/index_.php?page=accueil_admin.php');
        exit();
    } else {
        $message = "Identifiant ou mot de passe incorrect.";
    }
}

?>

<div class="container" id="loginForm">
    <form <?php print $_SERVER['PHP_SELF'];?>" method="post">
        <div class="mt-3 mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" id="login" name="login">
        </div>
        <div class="mb-3">
            <label for="password1" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <?php if (isset($message)) : ?>
            <div class="alert alert-danger mt-3"><?= $message ?></div>
        <?php endif; ?>
        <button type="submit" class="btn btn-warning" name="login_submit">Connexion</button>
    </form>
</div>