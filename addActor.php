<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\repository\ActorRepository;
use App\Models\Actor;

if (isset($_POST['last-name']) && isset($_POST['first-name'])) {
    $lastName = $_POST['last-name'];
    $firstName = $_POST['first-name'];

    $actorRepository = new ActorRepository();

    $actorRepository->insertActor([
        'firstName' => $firstName,
        'lastName' => $lastName
    ]);
}
header('location:index.php');
exit;

