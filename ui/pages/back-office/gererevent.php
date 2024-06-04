<?php
require_once("back-office.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les événements</title>
    <link rel="stylesheet" href="back-office.css">
</head>
<body>
<div class="form-container">
    <h2>Ajouter / Modifier un événement</h2>
    <form action="#" method="post">
        <div class="form-group">
            <label for="eventName">Nom de l'événement:</label>
            <input type="text" id="eventName" name="eventName">
        </div>
        <div class="form-group">
            <label for="eventDate">Date de l'événement:</label>
            <input type="date" id="eventDate" name="eventDate">
        </div>
        <!-- Ajoutez d'autres champs selon vos besoins -->
        <button type="submit">Enregistrer</button>
    </form>
</div>
</body>
</html>
