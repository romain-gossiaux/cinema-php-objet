<?php

header('Content-Type: application/json');
//chemin d'accès depuis le dossier ajax
require '../db/db_pg_connect.php';
require '../classes/Connection.class.php';
require '../classes/Vue_seances_films.class.php';
require '../classes/Vue_seances_filmsDAO.class.php';
$cnx = Connection::getInstance($dsn, $user, $password);

$vue_seances_films = new Vue_seances_filmsDAO($cnx);
$data = $vue_seances_films->getAfficheBySeanceId($_GET['id_seance']);
print json_encode($data);

