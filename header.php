<?php
session_start();

const ROLE_ANONYMOUS = 'ROLE_ANONYMOUS';
const ROLE_USER = 'ROLE_USER';
const ROLE_ADMIN = 'ROLE_ADMIN';

/* Dé-commenter une seule des trois lignes suivantes pour changer de rôle */
// $currentRole = ROLE_ANONYMOUS;
// $currentRole = ROLE_USER;
// $currentRole = ROLE_ADMIN;

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css" />
    <title>Bibliothèque</title>
</head>

<body>
    <header>
        <div class="brand"><img src="./assets/img/egs_logo.svg" alt="Logo EGS"></div>
        <?php include 'sidebar.php'; ?>
    </header>