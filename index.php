<?php
include("./config/config.php");
include("./config/dbconnection.php");
require_once 'lib/vendor/autoload.php';
require_once './classes/class_mail.php';


    $regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/";
    $valid = "true";
    if (isset($_POST["inscription"])){
        if((isset($_POST['email']) && !empty($_POST["email"])) && (isset($_POST['mdp']) && (!empty($_POST["mdp"])))){
            if (preg_match($regex, strtolower(htmlspecialchars($_POST['email'])))){    // Verification du pregmatch et de l'email
                $mail = $_POST["email"];
                $req_insc = $db->query("SELECT * from user where email = '$mail'");
                $data = $req_insc->fetchAll(); 
                if(!empty($data)){
                    echo "Email deja utilisé";
                    $valid = false;
                }

                if ($valid == true){

                    if (strlen($_POST['mdp']) >= 8 ){
                        $valid = true;
                    } else{
                        $valid = false;
                    }
                }
            }
        }
        if($valid){
            $pass = password_hash( $_POST['mdp'], PASSWORD_DEFAULT);
            $email2 = $_POST['email'];
            $code = uniqid();
            var_dump($code);
            $valider = "false";
            $sql = "INSERT into user(email, mdp, date_inscription, date_derniere_connexion, valider, codeVerif) values('$email2', '$pass', NOW(), NOW(), '$valider','$code')";
            $req = $db->prepare($sql);
            $req->execute();
            $email = new Mail();
            $message = '
                    <html>
                        <head>
                            <title>Calendrier des anniversaires pour Août</title>
                        </head>
                        <body>
                            <p>Veuillez confirmez votre compte en cliquant sur ce lien. </p>
                            <a href="verif.php?code='.$code.'&cli='.$email2.'">Cliquez ici ! </a>
                    </html>
                    ';
            $email->envoyerMailer($email2, 'Verification Compte', $message, '');
        } else { 
            echo "pas valide";
        }
    } if (isset($_POST["connexion"])){
        if (isset($_POST['email_connexion']) && isset($_POST['mdp_connexion'])){
            $email = $_POST["email_connexion"];
            $mdp = $_POST['mdp_connexion'];
            $sql_cli = $db->query("SELECT * from user where email = '$email'"); 
            $data_cli = $sql_cli->fetchAll();
            var_dump(password_verify($mdp, $data_cli[0]['mdp']));
            if (password_verify($mdp, $data_cli[0]['mdp'])==1){
                if ($data_cli[0]['valider'] == "true"){
                header("Location: accueil.php");
                } else {
                    echo "Compte non verifie";
                }
            } else {
                echo "mdp faux";
            }
        }
    }

include('./inc/layout.php');
?>  
            <title>Connexion</title>
        </head>
        <body>

<?php 
if (isset($_GET['connexion'])){
?>
        <div class="flex_center">
            <h1>Connexion</h1>
                <form method="post" class="inscription">
                    <label for="mail">Login :</label>
                    <input type="mail" name="email_connexion">
                    <label for="password">Mdp :</label>
                    <input type="password" name="mdp_connexion">
                    <input type="submit" name="connexion" value="Connexion">
                </form>
            <a href="pass_lost.php">Mot de passe oublié ?</a>
            <p>Vous n'etes pas inscrit ? <a href="index.php">Inscrivez-vous</a></p>
        </div>

<?php 
} else {
include("./inc/layout.php");
?>
        <title>Inscription</title>
    </head>
    <body>

        <div class="flex_center">
            <h1>Inscription</h1>
                <form method="post" class="inscription">
                    <label for="mail">Login :</label>
                    <input type="mail" name="email">
                    <label for="password">Mdp :</label>
                    <input type="password" name="mdp">
                    <input type="submit" name="inscription" value="inscription">
                </form>
            <p>Deja inscrit ? <a href="index.php?connexion=1">Connectez-vous</a></p>
        </div>


<?php 
}
?>

    </body>
</html>