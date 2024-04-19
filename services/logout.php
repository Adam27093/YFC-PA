<?php
session_start();
require_once('config.php');

// Détruire toutes les données de session
$_SESSION = array();

// Détruire la session
session_destroy();

// Rediriger vers la page d'accueil ou une autre page après la déconnexion
header("Location: ../ui/index.php");
exit;
?>
