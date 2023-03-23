<?php 
include("./config/config.php");
include("./config/dbconnection.php");


if (isset($_GET['code']) and isset($_GET['cli'])){
    $email = $_GET['cli'];
    $code = $_GET['code'];
    $sql = $db->query("SELECT * from user where email = " + $email);
    $data = $sql->fetch();
    var_dump($data);
    if ($data['codeVerif'] == $code){
        $sql2 = $db->prepare("UPDATE user set valider = 'true' where email = '$email'"); 
        $sql2->execute();
        header("Location: ./accueil.php");
    }
}
?>