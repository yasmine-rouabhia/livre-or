<?php
session_start();

if (isset($_POST['confirm']))
{
    $loogin = $_POST['loogin'];
    $passwordd = $_POST['passwordd'];
    $password_re = $_POST['password_re'];
    $id = $_SESSION['id'];

    if (!empty($loogin) && !empty($passwordd) && !empty($password_re))
    {
        include "passerel.php";

        if ($bdd == true)
        {
            $req = mysqli_query($bdd,"UPDATE utilisateurs SET login = '$loogin',password = '$passwordd' WHERE id = $id");

            if ($req == true)
            {
                if($passwordd == $password_re)
                {
                    $req2 = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE id = $id ");
                    $result = mysqli_fetch_assoc($req2);

                if ($result == true)
                {
                    $_SESSION['data'] = $result;
                    header('location: connexion.php');
                    $erreur = 'Modification effectuées';
                }
                }
            }
            else
            {
//                header("Location: index.php");
                $erreur = 'Problème sur la requête';
            }
        }
        else
        {
            $erreur ='Problème de connexion à la base de données.';
        }
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
    <link rel="stylesheet" href="CSS/profil.css">
    <title>Livre d'or</title>
</head>
<body class="fond3">
<?php include 'header.php';?>
<main>
<tbody>
    <section>
        <h2>Profils</h2>
        <form action="profil.php" method="post">
            <table>
                <tr>
                    <td>
                        <label for="login">Modifier Login :</label>
                    </td>
                    <td>
                        <input type="text" name="loogin" value="<?php echo $_SESSION['login']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Modifier Mot de passe :</label>
                    </td>
                    <td>
                        <input type="password" name="passwordd" placeholder="Mot de passe">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Confrimation :</label>
                    </td>
                    <td>
                        <input type="password" name="password_re" placeholder="Mot de passe">
                    </td>
                </tr>
                <td></td>
                <td>
                    <input type="submit" value="Confirmer" name="confirm">
                </td>
            </table>
        </form>
<!--        --><?php
//        }else{
//        ?>
    </section>
</tbody>
</main>
<footer class="enbas">
    <div class="copy">
        Copyright © Tous droits réservés. Yasmine étudiant LAPLATEFORME.
    </div>
</footer>
</body>
</html>
<?php
//}
//?>