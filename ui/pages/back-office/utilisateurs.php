<?php
require_once("back-office.php");
require_once("../../../config.php");

// Démarrer la session
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <link rel="stylesheet" href="back-office.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        table {
            margin-top: 20px;
            width: 80%;
            border: #cccccc solid 2px;
            border-radius: 10px;
        }
        th {
            background-color: #343a40;
            color: white;
        }
        .table thead th {
            text-align: center;
        }
        .table tbody td {
            vertical-align: middle;
            text-align: center;
        }
        .btn {
            font-size: 0.9em;
        }
        .form-check:hover {
            cursor: pointer;
        }
    </style>
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<section class="container">

<h1 class="my-4">Liste des Utilisateurs</h1>

<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Admin</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Connexion à la base de données
    try {
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérifier si l'utilisateur est connecté avant de récupérer l'ID de l'utilisateur actuel
        if (isset($_SESSION['user_id'])) {
            $currentUserId = $_SESSION['user_id'];

            // Requête pour récupérer les utilisateurs
            $sql = "SELECT id, nom, prenom, email, est_admin FROM Utilisateur";
            $stmt = $pdo->query($sql);

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
                        echo '<form method="post" action="../../../services/update_admin_status.php" style="display:inline;">';
                        echo '<input type="hidden" name="user_id" value="' . htmlspecialchars($row["id"]) . '">';
                        echo '<div class="form-check form-switch d-inline-block">';
                        echo '<input class="form-check-input" type="checkbox" role="switch" name="is_admin" value="1" ' . ($row["est_admin"] == 1 ? 'checked' : '') . ' onchange="this.form.submit()">';
                        echo '</div>';
                        echo '</form>';
                        echo '</td>';

                        // Formulaire pour supprimer l'utilisateur
                        echo '<td>';
                        echo '<form method="post" action="../../../services/delete_user.php" style="display:inline;">';
                        echo '<input type="hidden" name="user_id" value="' . htmlspecialchars($row["id"]) . '">';
                        echo '<button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Bannir</button>';
                        echo '</form>';
                        echo '</td>';

                        echo "</tr>";
                    }
                }
            } else {
                echo "<tr><td colspan='5'>Aucun utilisateur trouvé</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Utilisateur non connecté</td></tr>";
        }
    } catch (PDOException $e) {
        echo "<tr><td colspan='5'>Erreur de connexion à la base de données : " . htmlspecialchars($e->getMessage()) . "</td></tr>";
    }
    ?>
    </tbody>
</table>
</section>
</body>
</html>
