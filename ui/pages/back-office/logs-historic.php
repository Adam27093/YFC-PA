<?php
require_once("back-office.php");
require_once("../../../config.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs de connexion/inscription</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            align-self: center;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        ul {
            margin: 1rem 0;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Historique des Connexions/Inscriptions</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="logs-stats.php">Statistiques</a>
    </li>
</ul>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Type</th>
        <th>Email de l'utilisateur</th>
        <th>Date et heure</th>
    </tr>
    </thead>
    <tbody>
    <?php
    try {
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour récupérer les logs
        $sql = "SELECT * FROM Logs";
        $stmt = $pdo->query($sql);

        if ($stmt->rowCount() > 0) {
            // Affichage des logs dans le tableau
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row["type"] . "</td>";
                echo "<td>" . $row["email_utilisateur"] . "</td>";
                echo "<td>" . $row["date_heure"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Aucun log trouvé</td></tr>";
        }
    } catch(PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
    ?>
    </tbody>
</table>

</body>
</html>
