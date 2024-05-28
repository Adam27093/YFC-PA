<?php
require_once('../config.php');
require_once('./mailing.php');

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Connexion à la base de données avec PDO
    try {
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }

    // Préparation de la requête SQL pour vérifier si l'e-mail existe déjà
    $email = $_POST['email'];
    $stmt = $pdo->prepare("SELECT id FROM Utilisateur WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        echo "L'adresse e-mail est déjà utilisée.";
    } else {
        // Préparation de la requête SQL pour insérer un nouvel utilisateur
        $password = $_POST['mot_de_passe'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hacher le mot de passe
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $token = uniqid(rand(), true); // Génère un identifiant unique basé sur la date/heure actuelle et une valeur aléatoire

        $stmt = $pdo->prepare("INSERT INTO Utilisateur (nom, prenom, email, mot_de_passe, token) VALUES (?, ?, ?, ?, ?)");
        if ($stmt->execute([$nom, $prenom, $email, $hashed_password, $token])) {
            echo "Nouveau compte créé avec succès !";

            // Envoi d'un e-mail de confirmation
            $to_name = $prenom;
            $to_email = $email;
            $subject = "Confirmation d'inscription";

            $confirmationLink = "vps-f2b7b135.vps.ovh.net/services/mail-validation.php?token=" . $token;
            $message = "Bonjour $prenom,\n\nVotre inscription sur notre site a été confirmée.\nBienvenue chez YFC.\n\nVeuillez confirmer votre adresse e-mail en cliquant sur le lien suivant : $confirmationLink\n\nCordialement,\n\nVotre équipe.";

            if (envoi_mail($to_name, $to_email, $subject, $message)) {
                echo 'Un e-mail de confirmation a été envoyé à votre adresse.';
            } else {
                echo 'Erreur lors de l\'envoi de l\'e-mail de confirmation.';
            }

            // Enregistrement du log d'inscription
            $timestamp = date("Y-m-d H:i");
            $stmt = $pdo->prepare("INSERT INTO Logs (type, email_utilisateur, date_heure) VALUES ('inscription', ?, ?)");
            $stmt->execute([$email, $timestamp]);

            header("Location: ../ui/inscription-terminee.php");
            exit();
        } else {
            echo "Erreur lors de la création du compte : " . $pdo->errorInfo()[2];
        }
    }
}
?>
