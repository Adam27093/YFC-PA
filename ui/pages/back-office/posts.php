<?php
require_once("back-office.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Posts du Forum</title>
    <link rel="stylesheet" href="back-office.css">
</head>
<body>
<div class="container">
    <h2>Gérer les Posts du Forum</h2>
    <form>
        <div class="form-group">
            <label for="postTitle">Titre du Post</label>
            <input type="text" id="postTitle" name="postTitle" required>
        </div>
        <div class="form-group">
            <label for="postAuthor">Auteur</label>
            <input type="text" id="postAuthor" name="postAuthor" required>
        </div>
        <div class="form-group">
            <label for="postContent">Contenu</label>
            <textarea id="postContent" name="postContent" rows="6" required></textarea>
        </div>
        <div class="form-group">
            <label for="postDate">Date de Publication</label>
            <input type="date" id="postDate" name="postDate" required>
        </div>
        <button type="submit">Enregistrer le Post</button>
    </form>
</div>
</body>
</html>
