<?php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Inscription</title>
    <link rel="stylesheet" href="style/connexion_inscription-style.css">
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LeJzr8pAAAAAByiZQN2JqyZDtMlIyyVFzZq7PN0"></script>
</head>
<body>


<div class="flex-container">
    <div class="login-section">

        <!-- Logo YFC en haut à droite -->
        <img src="resources/YFCNOIR.jpeg" alt="Logo YFC" class="logo-yfc"/>
        <h2>INSCRIPTION</h2>
        <form action="../services/signup.php" method="post">
            <input type="text" placeholder="Prénom" name="prenom" required>
            <input type="text" placeholder="Nom" name="nom" required>
            <input type="email" placeholder="Adresse email" name="email" required>
            <input type="password" placeholder="Mot de passe" name="mot_de_passe" required>
            <div class="g-recaptcha" data-sitekey="6LeJzr8pAAAAAByiZQN2JqyZDtMlIyyVFzZq7PN0A"></div>
            <button type="submit" class="inscription">Inscription</button>
        </form>
        <div class="ou">
            <span class="barre"></span>
            Déjà inscrit ?
            <span class="barre"></span>
        </div>
        <a href="connexion.php" style="text-decoration:none;">
            <button type="button" class="connexion">Connexion</button>
        </a>

    </div>
    <div class="image-section">
        <!-- L'image de fond pour la section image -->
    </div>
</div>


</body>
</html>

