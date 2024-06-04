<?php
require_once("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];

    try {
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("DELETE FROM Utilisateur WHERE id = ?");
        $stmt->execute([$user_id]);

        header("Location: ../ui/pages/back-office/utilisateurs.php");
        exit();
    } catch (PDOException $e) {
        die("Erreur de suppression de l'utilisateur : " . $e->getMessage());
    }
} else {
    header("Location: ../ui/pages/back-office/utilisateurs.php");
    exit();
}
?>
