<?php
require_once("back-office.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Médias</title>
    <link rel="stylesheet" href="back-office.css">
</head>
<body>
<div class="container">
    <h2>Gérer les Médias</h2>
    <form>
        <div class="form-group">
            <label for="mediaTitle">Titre du média</label>
            <input type="text" id="mediaTitle" name="mediaTitle" required>
        </div>
        <div class="form-group">
            <label for="mediaType">Type de média</label>
            <select id="mediaType" name="mediaType" required>
                <option value="">Sélectionner</option>
                <option value="image">Image</option>
                <option value="video">Vidéo</option>
                <option value="article">Article</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mediaUrl">URL du média</label>
            <input type="url" id="mediaUrl" name="mediaUrl" required>
        </div>
        <div class="form-group">
            <label for="mediaDescription">Description</label>
            <textarea id="mediaDescription" name="mediaDescription" rows="4" required></textarea>
        </div>
        <button type="submit">Enregistrer le média</button>
    </form>
</div>
</body>
</html>
