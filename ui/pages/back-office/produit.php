<?php
require_once("back-office.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits</title>
    <link rel="stylesheet" href="back-office.css">
</head>
<body>
<div class="container">
    <h2>Gestion des Produits</h2>
    <form id="productForm">
        <div class="form-group">
            <label for="productName">Nom du Produit</label>
            <input type="text" id="productName" name="productName" required>
        </div>
        <div class="form-group">
            <label for="productPrice">Prix</label>
            <input type="number" step="0.01" id="productPrice" name="productPrice" required>
        </div>
        <div class="form-group">
            <label for="productDescription">Description</label>
            <textarea id="productDescription" name="productDescription" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="productImage">Image du Produit</label>
            <input type="file" id="productImage" name="productImage" accept="image/*">
        </div>
        <button type="submit">Enregistrer le Produit</button>
    </form>
    <hr>
    <h2>Liste des Produits</h2>
    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <!-- Les produits existants seront affichés ici -->
        <tr>
            <td>Produit Exemple</td>
            <td>19.99</td>
            <td>Description.</td>
            <td><img src="path_to_image" alt="Produit Exemple" style="width: 100px;"></td>
            <td>
                <button>Éditer</button>
                <button>Supprimer</button>
            </td>
        </tr>
        <!-- Répétez pour chaque produit -->
        </tbody>
    </table>
</div>
</body>
</html>
