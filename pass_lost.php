<?php 
include("./config/config.php");
include("./config/dbconnection.php");
require_once 'lib/vendor/autoload.php';
require_once './classes/class_mail.php';


if (isset($_POST['mdp_lost'])){
    if (isset($_POST['email_connexion'])){
        $email2=$_POST['email_connexion'];
        $email = new Mail();
            $message = '
                    <html>
                        <head>
                            <title>Recup mdp</title>
                        </head>
                        <body>
                            <p>Cliquez sur ce lien pour recuperer le mdp</p>
                            <a href="https://s4-8016.nuage-peda.fr/s1/pass_lost.php?cli='.$email2.'">Cliquez ici ! </a>
                    </html>
                    ';
            $email->envoyerMailer($email2, 'Recuperation MDP', $message, '');
    }
} if (isset($_GET['cli'])){ ?>

<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="style.css"/>
        <title>Inscription</title>
    </head>
    <body>
    <div class="flex_center">
        <h1>Changement de mdp</h1>
            <form method="post" class="inscription">
                <label for="pass">Nouveau mdp</label>
                <input type="pass" name="pass">
                <label for="pass">Confirmer mdp</label>
                <input type="pass" name="pass_confirm">
                <input type="submit" name="pass_modif" value="Modifier le mdp">
            </form>
        <a href="https://s4-8016.nuage-peda.fr/s1/index.php">Retour</a>
    </div>

    </body>
</html>

<?php } else {?>

<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="style.css"/>
        <title>Inscription</title>
    </head>
    <body>
    <div class="flex_center">
        <h1>Recuperation MDP</h1>
            <form method="post" class="inscription">
                <label for="mail">Votre Adresse mail</label>
                <input type="mail" name="email_connexion">
                <input type="submit" name="mdp_lost" value="Envoyer mail recup">
            </form>
        <a href="https://s4-8016.nuage-peda.fr/s1/index.php">Retour</a>
    </div>

    </body>
</html>

<?php } if (isset($_POST['pass_modif'])){
    if (isset($_POST['pass']) && isset($_POST["pass_confirm"])){
        if ($_POST['pass'] == $_POST['pass_confirm']){
            $email3 = $_GET['cli'];
            $mdp = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $sql = $db->prepare("UPDATE user set mdp = '$mdp' where email = '$email3'"); 
            $sql -> execute();
        }
    }
}
?>
