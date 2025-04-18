<?php
session_start();
include('./src/php/utils/header.php');
include('./src/php/utils/all_includes.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php print $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<header class="img_header"></header>
<section>
    <?php if(file_exists('src/php/utils/admin_menu.php')){
        include('src/php/utils/admin_menu.php');
    }
    ?>
</section>
<section>
    <?php
    if(file_exists('./content/'.$_SESSION['page'])){
        $path = './content/'.$_SESSION['page'];
        include($path);
    }
    ?>
</section>
<footer>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>

