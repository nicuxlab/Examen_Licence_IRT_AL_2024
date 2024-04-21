<?php

// Paramètres de connexion à la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'licence_sil');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}

?>


