<?php
session_start();
include 'passerel.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/livre-or.css">
    <title>Livre d'or</title>
</head>
<body class="fond4">
<main>
<?php include 'header.php';?>
<div class="parent">

<div class="text">
    <table>
<thead>
    <tr>
        <th>Pseudo</th>
        <th>Commentaires</th>
        <th>Date et Heures</th>
    </tr>
</thead>
        <?php
        $req = mysqli_query($bdd, "SELECT * FROM commentaires INNER JOIN utilisateurs WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY date DESC ");
        $reponse = mysqli_fetch_all($req, MYSQLI_ASSOC);

        foreach ($reponse as $comm) : ?>

        <tbody>

            <?php if (isset($_SESSION['login'])) : ?>

            <?php endif ?>
            <?php

            {
            echo '
            <tr>
                <td>'. $comm['login'].'</td>
                <td>'. $comm['commentaire'].'</td>
                <td>'. $comm['date'].'</td>
            </tr>';
            }
            ?>

            <?php endforeach;?>
    </table>
</div>
        </tbody>
</div>
</main>
<footer class="enbas">
    <div class="copy">
        Copyright © Tous droits réservés. Yasmine étudiant LAPLATEFORME.
    </div>
</footer>

</body>
</html>


