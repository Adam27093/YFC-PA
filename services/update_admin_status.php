<?php
require_once("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $is_admin = isset($_POST['is_admin']) ? 1 : 0;

    try {
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("UPDATE Utilisateur SET est_admin = ? WHERE id = ?");
        $stmt->execute([$is_admin, $user_id]);


        header("Location: ../ui/pages/back-office/utilisateurs.php");
        exit();
    } catch (PDOException $e) {
        die("Erreur de mise à jour du statut admin : " . $e->getMessage());
    }
} else {
    header("Location: ../ui/pages/back-office/utilisateurs.php");
    exit();
}
?>
