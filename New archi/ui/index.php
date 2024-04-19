<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YFC Event Header</title>
    <link rel="stylesheet" href="style/index-style.css">
</head>
<body>
<div class="header">
    <div class="left-side">
        <img src="resources/Logo yfc.png" alt="Logo" class="logo">
        <a href="/events" class="nav-link">Événements</a>
        <a href="/fighters" class="nav-link">Combattants</a>
        <a href="/media" class="nav-link">Médias</a>
        <a href="/forum" class="nav-link">Forum</a>
        <a href="/shop" class="nav-link">Boutique</a>
        <a href="/faq" class="nav-link">FAQ</a>
    </div>
    <?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Vérifier si l'utilisateur est connecté
    if (isset($_SESSION['user_id']) && $_SESSION['est_admin']) {
        // L'utilisateur est connecté, afficher le bouton de déconnexion
        $prenom_utilisateur = $_SESSION['prenom_utilisateur'];
        echo '<div class="right-side">
        <span>Bonjour, ' . $prenom_utilisateur . '</span>
        <a href="back-office.php" class="nav-link">Back-Office</a>
        <a href="../services/logout.php" class="nav-link">Déconnexion</a>
        </div>';
    } elseif (isset($_SESSION['user_id'])) {
        // L'utilisateur est connecté, afficher le bouton de déconnexion
        $prenom_utilisateur = $_SESSION['prenom_utilisateur'];
        echo '<div class="right-side">
        <span>Bonjour, ' . $prenom_utilisateur . '</span>
        <a href="../services/logout.php" class="nav-link">Déconnexion</a>
        </div>';
    } else {
        // L'utilisateur n'est pas connecté, afficher les boutons de connexion et d'inscription
        echo '<div class="right-side">
        <a href="connexion.php" class="nav-link">Connexion</a>
        <a href="inscription.php" class="nav-link">S\'inscrire</a>
        </div>';
    }
    ?>
</div>
<div class="sub-header">
    <div class="event-info">
        <h1>Explorez les prochains événements de YFC et trouvez des billets.</h1>
        <p>Prochain événement : Combat des Champions - 15 avril 2024</p>
        <a href="/tickets" class="btn-discover">DÉCOUVRIR!</a>
    </div>
</div>
<div class="section fighters">
    <h2>Nos Meilleurs Combattants !</h2>
    <div class="highlighted-fighter">
        <!--  image de fond pour le combattant en vedette -->
        <img src="resources/yfcvedettecombatant.jpg" alt="Combattant en vedette">
        <div class="fighter-info">
            <h3>Combattant en vedette</h3>
            <!-- Ajoutez d'autres informations sur le combattant si nécessaire -->
            <p>Découvrez les profils des meilleurs combattants de YFC !</p>
            <a href="/fighters" class="btn-discover">Découvrir</a>
        </div>
    </div>

    <section class="community-section">
        <h2>UNE COMMUNAUTÉ DE COMBATTANT !</h2>
        <div class="community-content">
            <img src="resources/forum.jpeg" alt="forum">
            <p>Rejoignez-nous pour discuter des combats !</p>
            <a href="/forum" class="btn-community">FORUM COMMUNAUTÉ</a>
        </div>
    </section>

    <section class="store-section">
        <h2>NOTRE BOUTIQUE !</h2>

        <img src="resources/Boutique.jpeg" alt="boutique">
        <a href="/store" class="btn-store">BOUTIQUE</a>
        <!-- Vous pouvez ajouter ici d'autres éléments de la boutique si nécessaire -->
    </section>

    <!-- Insérez ici le reste de votre contenu -->

</div>


</body>
<footer class="site-footer">
    <div class="footer-content">
        <div class="social-networks">
            <h3>RÉSEAUX SOCIAUX</h3>
            <ul>
                <li><a href="https://facebook.com">Facebook</a></li>
                <li><a href="https://instagram.com">Instagram</a></li>
                <!-- Ajoutez d'autres réseaux sociaux ici -->
            </ul>
        </div>

        <div class="yfc-info">
            <h3>YFC</h3>
            <ul>
                <li><a href="/sport">Le sport</a></li>
                <!-- Ajoutez d'autres liens ici -->
            </ul>
        </div>

        <div class="help-links">
            <h3>AIDE</h3>
            <ul>
                <li><a href="/faq">Foire aux questions - Fight Pass</a></li>
                <!-- Ajoutez d'autres liens d'aide ici -->
            </ul>
        </div>

        <!-- Ajoutez d'autres colonnes de liens ici si nécessaire -->

        <div class="legal-links">
            <h3>LÉGAL</h3>
            <ul>
                <li><a href="/terms">Conditions d'utilisation</a></li>
                <!-- Ajoutez d'autres liens légaux ici -->
            </ul>
        </div>
    </div>
</footer>

</html>