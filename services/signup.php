<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Vérification si le formulaire a été soumis
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
        echo "Erreur de connexion à la base de données : " . $conn->connect_error;
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Préparation de la requête SQL pour vérifier si l'e-mail existe déjà
    $email = $_POST['email'];
    $stmt = $conn->prepare("SELECT id FROM Utilisateur WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "L'adresse e-mail est déjà utilisée.";
    } else {
        // Préparation de la requête SQL pour insérer un nouvel utilisateur
        $password = $_POST['mot_de_passe'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hacher le mot de passe
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

        $stmt = $conn->prepare("INSERT INTO Utilisateur (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nom, $prenom, $email, $hashed_password);

        // Exécution de la requête
        if ($stmt->execute()) {
            echo "Nouveau compte créé avec succès !";
            header("Location: ../ui/index.php");
        } else {
            echo "Erreur lors de la création du compte : " . $conn->error;
        }
    }

    // Fermer la connexion
    $stmt->close();
    $conn->close();
}
?>
