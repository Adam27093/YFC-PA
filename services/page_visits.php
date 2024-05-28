<?php
require_once('../config.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupérer l'URL de la page
$page_url = $_SERVER['REQUEST_URI'];

// Préparer la requête SQL pour insérer ou mettre à jour le nombre de visites
$sql = "INSERT INTO PageVisits (page_url, visit_count) VALUES (:page_url, 1)
        ON DUPLICATE KEY UPDATE visit_count = visit_count + 1";
$stmt = $pdo->prepare($sql);

// Exécuter la requête
$stmt->execute([
    ':page_url' => $page_url,
]);
?>
