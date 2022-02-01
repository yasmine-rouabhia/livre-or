<?php
session_start();
//on se connecte à la base de données:
include "passerel.php";

if(!empty($_POST['login']) && !empty($_POST['password']))
{
    $login = $_POST['login'];
    $password = $_POST['password'];

    $requete = "SELECT * FROM utilisateurs WHERE login = '$login' AND password = '$password' ";

    $requette = mysqli_query($bdd, $requete);
    $reponse = mysqli_fetch_assoc($requette);

    $count = count($reponse);

//var_dump($count);
    if($count = 1)
    {
        $_SESSION = $reponse;

        header('location: profil.php');
    }
    else
    {
        $erreur = "Login ou Mot de passe incorrects";
    }
}

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
    <link rel="stylesheet" href="CSS/connexion.css">
    <title>Livre d'or</title>
</head>
<body class="fond2">
<?php include 'header.php';?>
<main>
    <h2>Connexion</h2>
    <section>
        <form action="connexion.php" method="post">
            <table>
                <tr>
                    <td>
                        <label for="login">Login :</label>
                    </td>
                    <td>
                        <input type="text" name="login" placeholder="Login" value="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Mot de passe :</label>
                    </td>
                    <td>
                        <input type="password" name="password" placeholder="Mot de passe" value="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Confrimation :</label>
                    </td>
                    <td>
                        <input type="password" name="passwordd" placeholder="Mot de passe" value="">
                    </td>
                </tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Valider" name="valid">
                    </td>
            </table>
        </form>
    </section>
</main>
<footer class="enbas">
    <div class="copy">
        Copyright © Tous droits réservés. Yasmine étudiant LAPLATEFORME.
    </div>
</footer>
</body>
</html>