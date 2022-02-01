<?php
include "passerel.php";
//Vérification du formulaire
if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['password_re']))
{
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_re = $_POST['password_re'];

    $requette = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$login'");
    $result = mysqli_fetch_all($requette);


    if(count($result) ==0)
    {
        if($password == $password_re)
        {
            $requet = mysqli_query($bdd, "INSERT INTO utilisateurs (login, password) VALUES ('$login', '$password')");
            header('location: connexion.php');

        }
        else
        {
            $erreur = "Login ou Mot de passe est incorrect";
        }
    }
}
//else
//{
//    $erreur = "Ce login exsite déja";
//}

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
    <link rel="stylesheet" href="CSS/inscription.css">
    <title>Livre d'or</title>
</head>
<body class="fond1">
<?php include 'header.php';?>
<tbody >
<main>
    <h2>Formulaire d'inscription</h2>
    <section class="incueil">
        <form action="inscription.php" method="post">
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
                        <input type="password" name="password_re" placeholder="Mot de passe" value="">
                    </td>
                </tr>
                <td></td>
                <td>
                    <input type="submit" value="S'inscrire" name="valider">
                </td>
            </table>
        </form>
        <?php
        if(isset($erreur))
        {
            echo '<font color="red">'.$erreur. "</font>";
        }
        ?>
    </section>
</main>
</tbody>
<footer class="enbas">
    <div class="copy">
        Copyright © Tous droits réservés. Yasmine étudiant LAPLATEFORME.
    </div>
</footer>
</body>
</html>
