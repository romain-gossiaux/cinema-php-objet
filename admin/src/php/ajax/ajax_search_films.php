<?php

header('Content-Type: application/json');
//chemin d'accès depuis le dossier ajax
require '../db/db_pg_connect.php';
require '../classes/Connection.class.php';
require '../classes/Film.class.php';
require '../classes/FilmDAO.class.php';
$cnx = Connection::getInstance($dsn, $user, $password);

$filmDAO = new FilmDAO($cnx);

$films = $filmDAO->searchFilms($_GET['search']);

echo json_encode($films);
