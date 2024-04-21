<?php
session_start();
require_once('../config.php');

// On Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Connexion à la base de données avec MySQLi
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Préparer la requête SQL
    $email = $_POST['email'];
    $stmt = $conn->prepare("SELECT * FROM Utilisateur WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer le résultat de la requête
    $result = $stmt->get_result();

    // Vérifier si l'utilisateur existe dans la base de données
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Vérifier si le mot de passe est correct
        if (password_verify($_POST['mot_de_passe'], $user['mot_de_passe'])) {
            // On vérifie que l'email de l'utilisateur est confirmé
            if (!$user['est_confirme']) {
                $error_message = "Votre compte n'est pas confirmé. Veuillez vérifier votre e-mail pour activer votre compte.";
                header("Location: ../ui/connexion.php?error_message=" . urlencode($error_message));
                $stmt->close();
                $conn->close();
                exit();
            } else {
                // Utilisateur connecté avec succès, enregistrement de l'identifiant de l'utilisateur dans la session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['prenom_utilisateur'] = $user['prenom'];
                $_SESSION['est_admin'] = $user['est_admin'];
                $_SESSION['email'] = $user['email'];

                // Enregistrement du log de connexion
                $timestamp = date("Y-m-d H:i");
                $stmt = $conn->prepare("INSERT INTO Log (type, email_utilisateur, date_heure) VALUES ('connexion', ?, ?)");
                $stmt->bind_param("ss", $user['email'], $timestamp);
                $stmt->execute();

                header("Location: ../ui/index.php");
                $stmt->close();
                $conn->close();
                exit();
            }
        } else {
            // Mot de passe incorrect
            $error_message = "Mot de passe incorrect. Veuillez réessayer.";
            header("Location: ../ui/connexion.php?error_message=" . urlencode($error_message));
            $stmt->close();
            $conn->close();
            exit();
        }
    } else {
        // Utilisateur non trouvé
        $error_message = "Utilisateur non trouvé.";
        header("Location: ../ui/connexion.php?error_message=" . urlencode($error_message));
        $stmt->close();
        $conn->close();
        exit();
    }
}
?>
