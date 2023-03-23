<?php
include("./config/config.php");
include("./config/dbconnection.php");
require_once 'lib/vendor/autoload.php';
require_once './classes/class_mail.php';
include('./inc/layout.php');


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
            $valider = "false";
            $sql = "INSERT into user(email, mdp, date_inscription, date_derniere_connexion, valider, codeVerif, nom, prenom, fonction, admin) values('$email2', '$pass', NOW(), NOW(), '$valider','$code', Null, null, 1, 'false')";
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
                            <a href="http://s4-8016.nuage-peda.fr/Simpleduc/verif.php?code='.$code.'&cli='.$email2.'">Cliquez ici !</a>
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
            if (password_verify($mdp, $data_cli[0]['mdp'])==1){
                if ($data_cli[0]['valider'] == "true"){
                    if ($data_cli[0]['admin'] == "true"){
                        echo $data_cli[0]["admin"];
                        $_SESSION['admin'] = "oui";
                        $sql = $db->prepare("UPDATE user set date_derniere_connexion = NOW() where email = '$email'");
                        $sql->execute();
                        header("Location: accueil_admin.php");
                    }else {
                        $_SESSION["admin"] = "non";
                        $_SESSION['valider'] = "true";
                        $_SESSION['id'] = $data_cli[0]['id'];
                        $sql = $db->prepare("UPDATE user set date_derniere_connexion = NOW() where email = '$email'");
                        $sql->execute();
                        header("Location: accueil.php");
                    }
                } else {
                    echo "Compte non verifie";
                }
            } else {
                echo "mdp faux";
            }
        }
    }
?>  
        <div class="header_index">
            <div>
                Bienvenue
            </div>
            <div>
                <img src="./logo.png" alt="Logo_Simpleduc" class="logo"/>
            </div>
        </div>
<?php 
if (isset($_GET['connexion'])){
?>
        <title>Connexion</title>
    </head>
    <body>
        
        <div class="center">
            <h1>Connexion</h1>
            <form method="post" class="inscription">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span><div class="email_status"></div>
                <input type="text" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" name="email_connexion">
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Mot de passe" aria-label="Recipient's username" aria-describedby="basic-addon2" name="mdp_connexion">
            </div>
            <input type="submit" name="connexion" value="Connexion" id="button_inscrip">
        </form>
        <a href="pass_lost.php">Mot de passe oublié ?</a>
        <p>Vous n'etes pas inscrit ? <a href="index.php?incription=1">Inscrivez-vous</a></p>
    </div>

<?php 
include("./inc/layout_bottom.php");
} else {
?>
        <title>Inscription</title>
    </head>
    <body>
        <div class="center">
            <h1>Inscription</h1>
            <form method="post" class="inscription">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span><div class="email_status"></div>
                <input type="text" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" name="email" id="inscrip_email">
            </div>

            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Mot de passe" aria-label="Recipient's username" aria-describedby="basic-addon2" name="mdp" id ="inscrip_mdp">
            </div>
            <input type="submit" name="inscription" value="inscription" id="button_inscrip">
        </form>
        <p>Deja inscrit ? <a href="index.php?connexion=1">Connectez-vous</a></p>
    </div>
            

<?php 
include("./inc/layout_bottom.php");
}
?>
    <script src="guillaume.js"></script>
    <script src="toni.js"></script>
    </body>
</html>