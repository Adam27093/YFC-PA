<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Vérification si le token est présent dans l'URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Connexion à la base de données
    require_once('../config.php');
    try {
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        die();
    }

    // Recherche de l'utilisateur dans la base de données en utilisant le token
    $stmt = $pdo->prepare("SELECT id, email FROM Utilisateur WHERE token = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        $user_id = $user['id'];
        $user_email = $user['email'];

        $update_stmt = $pdo->prepare("UPDATE Utilisateur SET est_confirme = 1 WHERE id = ?");
        if ($update_stmt->execute([$user_id])) {
            // Enregistrement du log d'inscription confirmée
            $timestamp = date("Y-m-d H:i");
            $log_stmt = $pdo->prepare("INSERT INTO Logs (type, email_utilisateur, date_heure) VALUES ('confirmation_inscription', ?, ?)");
            $log_stmt->execute([$user_email, $timestamp]);

            // Redirection vers une page de confirmation réussie
            header("Location: ../ui/confirmation-reussie.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de la validation de l'utilisateur.";
        }
    } else {
        exit();
    }

    // Fermer les curseurs
    $stmt->closeCursor();
    $update_stmt->closeCursor();
} else {
    // Gérer le cas où le token n'est pas présent dans l'URL
    echo "Le token est manquant dans l'URL.";
}
?>
