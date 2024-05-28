<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../config.php');

// On Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Connexion à la base de données avec PDO
    try {
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }

    // Préparer la requête SQL
    $email = $_POST['email'];
    $stmt = $pdo->prepare("SELECT * FROM Utilisateur WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Vérifier si l'utilisateur existe dans la base de données
    if ($user) {
        // Vérifier si le mot de passe est correct
        if (password_verify($_POST['mot_de_passe'], $user['mot_de_passe'])) {
            // On vérifie que l'email de l'utilisateur est confirmé
            if (!$user['est_confirme']) {
                $error_message = "Votre compte n'est pas confirmé. Veuillez vérifier votre e-mail pour activer votre compte.";
                header("Location: ../ui/connexion.php?error_message=" . urlencode($error_message));
                exit();
            } else {
                // Utilisateur connecté avec succès, enregistrement de l'identifiant de l'utilisateur dans la session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['prenom_utilisateur'] = $user['prenom'];
                $_SESSION['est_admin'] = $user['est_admin'];
                $_SESSION['email'] = $user['email'];

                // Enregistrement du log de connexion
                $timestamp = date("Y-m-d H:i");
                $stmt = $pdo->prepare("INSERT INTO Logs (type, email_utilisateur, date_heure) VALUES ('connexion', ?, ?)");
                $stmt->execute([$user['email'], $timestamp]);

                header("Location: ../ui/index.php");
                exit();
            }
        } else {
            // Mot de passe incorrect
            $error_message = "Mot de passe incorrect. Veuillez réessayer.";
            header("Location: ../ui/connexion.php?error_message=" . urlencode($error_message));
            exit();
        }
    } else {
        // Utilisateur non trouvé
        $error_message = "Utilisateur non trouvé.";
        header("Location: ../ui/connexion.php?error_message=" . urlencode($error_message));
        exit();
    }
}
?>
