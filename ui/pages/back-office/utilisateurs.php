<?php
require_once("back-office.php");
require_once("../../../config.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
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
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Admin</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Connexion à la base de données
    try {
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour récupérer les utilisateurs
        $sql = "SELECT id, nom, prenom, email, est_admin FROM Utilisateur";
        $stmt = $pdo->query($sql);

        $currentUserId = $_SESSION['user_id'];

        if ($stmt->rowCount() > 0) {
            // Affichage des utilisateurs dans le tableau
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($row["id"] != $currentUserId) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["nom"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["prenom"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["email"]) . "</td>";

                    // Formulaire pour changer le statut admin
                    echo '<td>';
                    echo '<form method="post" action="../../../services/update_admin_status.php">';
                    echo '<input type="hidden" name="user_id" value="' . htmlspecialchars($row["id"]) . '">';
                    echo '<div class="form-check form-switch">';
                    echo '<input class="form-check-input" type="checkbox" role="switch" name="is_admin" value="1" ' . ($row["est_admin"] == 1 ? 'checked' : '') . ' onchange="this.form.submit()">';
                    echo '</div>';
                    echo '</form>';
                    echo '</td>';

                    // Formulaire pour supprimer l'utilisateur
                    echo '<td>';
                    echo '<input type="hidden" name="user_id" value="' . htmlspecialchars($row["id"]) . '">';
                    echo '<button type="submit" class="btn btn-danger">Bannir l\'utilisateur</button>';
                    echo '</form>';
                    echo '</td>';

                    echo "</tr>";
                }
            }
        } else {
            echo "<tr><td colspan='5'>Aucun utilisateur trouvé</td></tr>";
        }
    } catch (PDOException $e) {
        echo "<tr><td colspan='5'>Erreur de connexion à la base de données : " . htmlspecialchars($e->getMessage()) . "</td></tr>";
    }
    ?>
    </tbody>
</table>
</body>
</html>
