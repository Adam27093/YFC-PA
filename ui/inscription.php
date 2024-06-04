<?php
require_once('../services/page_visits.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Inscription</title>
    <link rel="stylesheet" href="style/connexion_inscription-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LeJzr8pAAAAAByiZQN2JqyZDtMlIyyVFzZq7PN0"></script>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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

