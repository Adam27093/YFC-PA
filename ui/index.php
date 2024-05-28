<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YFC Event Header</title>
    <link rel="stylesheet" href="style/index-style.css">
</head>
<body>

<?php
include_once('header.php');
?>

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
        <img src="resources/yfcvedettecombatant.jpg" alt="Combattant en vedette">
        <div class="fighter-info">
            <h3>Combattant en vedette</h3>
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
    </section>
</div>

<footer class="site-footer">
    <div class="footer-content">
        <div class="social-networks">
            <h3>RÉSEAUX SOCIAUX</h3>
            <ul>
                <li><a href="https://facebook.com">Facebook</a></li>
                <li><a href="https://instagram.com">Instagram</a></li>
            </ul>
        </div>
        <div class="yfc-info">
            <h3>YFC</h3>
            <ul>
                <li><a href="/sport">Le sport</a></li>
            </ul>
        </div>
        <div class="help-links">
            <h3>AIDE</h3>
            <ul>
                <li><a href="/faq">Foire aux questions - Fight Pass</a></li>
            </ul>
        </div>
        <div class="legal-links">
            <h3>LÉGAL</h3>
            <ul>
                <li><a href="/terms">Conditions d'utilisation</a></li>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>
