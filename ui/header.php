<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../services/page_visits.php');
?>

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
    <div class="right-side">
        <?php
        // Vérifier si l'utilisateur est connecté
        if (isset($_SESSION['user_id'])) {
            $prenom_utilisateur = $_SESSION['prenom_utilisateur'];
            echo '<span>Bonjour, ' . htmlspecialchars($prenom_utilisateur) . '</span>';
            if (isset($_SESSION['est_admin']) && $_SESSION['est_admin']) {
                echo '<a href="pages/back-office/back-office.php" class="nav-link">Back-Office</a>';
            }
            echo '<a href="../services/logout.php" class="nav-link">Déconnexion</a>';
        } else {
            echo '<a href="connexion.php" class="nav-link">Connexion</a>';
            echo '<a href="inscription.php" class="nav-link">S\'inscrire</a>';
        }
        ?>
    </div>
</div>
