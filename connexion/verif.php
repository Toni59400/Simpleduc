<?php 
include("./config/config.php");
include("./config/dbconnection.php");


if (isset($_GET['code']) and isset($_GET['cli'])){
    $email = $_GET['cli'];
    $code = $_GET['code'];
    $sql = $db->query("SELECT * from user where email = '$email'");
    $data = $sql->fetchAll();
    if ($data[0]['codeVerif'] == $code){
        $sql2 = $db->prepare("UPDATE user set valider = 'true' where email = '$email'"); 
        $sql2->execute();
        header("Location: ./accueil/accueil.php");
    }
}
?>