<?php
require_once "./config/config.php";
require_once "./config/dbconnection.php";


function isInDatabase($mail, $db){
    $query = $db->query("SELECT * FROM user WHERE email = '$mail'");
    $data = $query->fetchAll();
    if(empty($data)){
        return 0;
    } else {
        return 1;
    }
}

if(isset($_GET['mail'])){
$email = $_GET["mail"];
echo json_encode(isInDatabase($email, $db));

}
?>