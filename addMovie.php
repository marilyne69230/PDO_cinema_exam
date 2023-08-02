<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\repository\MovieRepository;

var_dump($_POST);
// vérifier si les variables existes
if (isset($_POST['title']) && isset($_POST['releaseDate'])) {
    $title = $_POST['title'];
    $date = $_POST['releaseDate'];

    $movieRepository = new MovieRepository();

    $movieRepository->insertMovie([
        'title' => $title,
        'releaseDate' => $date
    ]);
}

header('location:index.php');
exit;
