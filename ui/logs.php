<?php
require_once("back-office.php");
require_once("../config.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs de connexion/inscription</title>
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
    </tr>
    </thead>
    <tbody>
    <?php
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Requête pour récupérer les utilisateurs
    $sql = "SELECT * FROM Log";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Affichage des utilisateurs dans le tableau
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["type"] . "</td>";
            echo "<td>" . $row["email_utilisateur"] . "</td>";
            echo "<td>" . $row["date_heure"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Aucun log trouvé</td></tr>";
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
    ?>
    </tbody>
</table>

</body>
</html>
