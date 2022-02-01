 <?php
session_start();

include "passerel.php";

$id = $_SESSION['id'];

if(!isset($id))
{
    header("location: index.php");
}
    if(isset($_POST['envoyer']))
    {
        $comm = $_POST['comm'];
        $lecommentaire = mysqli_query($bdd, "INSERT INTO commentaires (`commentaire`, `id_utilisateur`) VALUES ('$comm', '$id')");

    }

//    metrre une condition si connecter peut accéder au com sinon rediriger vers la page d'acceuil !
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
    <link rel="stylesheet" href="CSS/commentaire.css">
</head>
<main>
<?php include 'header.php';?>
<body class="fond5">
<h2>Espace commentaires</h2>
<form action="commentaire.php" method="post">
    <label for="commentaire"> Laisser un commentaire ici :</label>
        <textarea type="text" name="comm" rows="5" cols="35"></textarea>
            <button type="submit" name="envoyer" value="Envoyer" style="width =130px">Envoyer</button>
</form>
</main>
<footer class="enbas">
    <div class="copy">
        Copyright © Tous droits réservés. Yasmine étudiant LAPLATEFORME.
    </div>
</footer>
</body>
</html>
