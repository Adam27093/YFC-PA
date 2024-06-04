<?php
require_once('../services/page_visits.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="style/connexion_inscription-style.css">
</head>
<body>

<div class="flex-container">
    <div class="login-section">
        <!-- Logo YFC en haut à droite -->
        <img src="resources/YFCNOIR.jpeg" alt="Logo YFC" class="logo-yfc"/>
        <h2>CONNEXION</h2>

        <form action="../services/login.php" method="post">
            <input type="email" placeholder="Adresse email" name="email" required>
            <input type="password" placeholder="Mot de passe" name="mot_de_passe" required>
            <button type="submit" class="connexion">Connexion</button>
        </form>

        <!-- Affichage du message d'erreur -->
        <div id="messageErreur" class="error-message">
            <?php
            if (isset($_GET['error_message'])) {
                echo htmlspecialchars($_GET['error_message']);
            }
            ?>
        </div>

        <div class="ou">
            <span class="barre"></span>
            Pas encore inscrit ?
            <span class="barre"></span>
        </div>

        <a href="inscription.php" style="text-decoration:none;">
            <button type="button" class="inscription">Inscription</button>
        </a>
    </div>

    <div class="image-section">
        <!-- L'image de fond pour la section image -->
    </div>
</div>

</body>
</html>
