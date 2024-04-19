<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// On Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $servername = "localhost";
    $username = "yfc";
    $password = "123";
    $dbname = "YFC";

    // Connexion à la base de données avec MySQLi
    $conn = new mysqli($servername, $username, $password, $dbname);

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
            // Utilisateur connecté avec succès, enregistrement de l'identifiant de l'utilisateur dans la session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['prenom_utilisateur'] = $user['prenom'];
            $_SESSION['est_admin'] = $user['est_admin'];
            // Redirection vers une page sécurisée par exemple
            header("Location: ../ui/index.php");
            exit();
        } else {
            // Mot de passe incorrect
            echo "Mot de passe incorrect.";
        }
    } else {
        // Utilisateur non trouvé
        echo "Utilisateur non trouvé.";
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
}
?>
