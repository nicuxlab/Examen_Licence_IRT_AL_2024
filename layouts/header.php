<!DOCTYPE html>
<html lang="fr">

<head>
    <?php

    function asset($path)
    {
        // Définir le chemin de base vers le dossier des assets
        $basePath = 'http://localhost/examens/Examen_Licence_IRT_AL_2024/';

        // Retourner l'URL complète vers le fichier
        return $basePath . $path;
    }


    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo asset('layouts/bootstrap/css/font-awesome.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('layouts/bootstrap/css/fastbootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('layouts/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('layouts/bootstrap/css/select-input.css'); ?>">

    <title>Application de gestion des courses</title>
</head>

<body>