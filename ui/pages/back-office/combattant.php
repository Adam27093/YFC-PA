<?php
require_once("back-office.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Combattants</title>
    <link rel="stylesheet" href="back-office.css">
</head>
<body>
<div class="container">
    <h2>Ajouter / Modifier un Combattant</h2>
    <form>
        <div class="form-group">
            <label for="fighterName">Nom du combattant:</label>
            <input type="text" id="fighterName" name="fighterName" required>
        </div>
        <div class="form-group">
            <label for="fighterWeight">Poids:</label>
            <input type="number" id="fighterWeight" name="fighterWeight" required>
        </div>
        <div class="form-group">
            <label for="fighterCategory">Catégorie de poids:</label>
            <select id="fighterCategory" name="fighterCategory" required>
                <option value="">Sélectionner une catégorie</option>
                <option value="lightweight">Poids léger</option>
                <option value="middleweight">Poids moyen</option>
                <option value="heavyweight">Poids lourd</option>
            </select>
        </div>
        <div class="form-group">
            <label for="fighterRecord">Record:</label>
            <input type="text" id="fighterRecord" name="fighterRecord" required>
        </div>
        <button type="submit">Enregistrer</button>
    </form>
</div>
</body>
</html>
