<?php
require_once("back-office.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Liste des Utilisateurs</h2>

<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "yfc";
    $password = "123";
    $dbname = "YFC";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Requête pour récupérer les utilisateurs
    $sql = "SELECT nom, prenom, email FROM Utilisateur WHERE est_admin = 0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Affichage des utilisateurs dans le tableau
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nom"] . "</td>";
            echo "<td>" . $row["prenom"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo '<td><button class="delete-btn">Supprimer</button></td>';
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Aucun utilisateur trouvé</td></tr>";
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
    ?>
    </tbody>
</table>

</body>
</html>
