<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Vérification si le token est présent dans l'URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Connexion à la base de données
    require_once('../config.php');
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Vérification de la connexion
    if ($conn->connect_error) {
        echo "Erreur de connexion à la base de données : " . $conn->connect_error;
        die();
    }

    // Recherche de l'utilisateur dans la base de données en utilisant le token
    $stmt = $conn->prepare("SELECT id FROM Utilisateur WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];
        $user_email = $user['email'];

        $update_stmt = $conn->prepare("UPDATE Utilisateur SET est_confirme = 1 WHERE id = ?");
        $update_stmt->bind_param("i", $user_id);
        if ($update_stmt->execute()) {
            // Enregistrement du log d'inscription confirmée
            $timestamp = date("Y-m-d H:i");
            $stmt = $conn->prepare("INSERT INTO Log (type, email_utilisateur, date_heure) VALUES ('inscription_confirmée', ?, ?)");
            $stmt->bind_param("ss", $user['email'], $timestamp);
            $stmt->execute();

            // Redirection vers une page de confirmation réussie
            header("Location: ../ui/confirmation-reussie.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de la validation de l'utilisateur.";
        }
    } else {
        // Redirection vers une page de confirmation échouée
        // header("Location: ../ui/confirmation-echouee.php");
        exit();
    }

    // Fermer la connexion
    $stmt->close();
    $update_stmt->close();
    $conn->close();
} else {
    // Gérer le cas où le token n'est pas présent dans l'URL
    echo "Le token est manquant dans l'URL.";
}

