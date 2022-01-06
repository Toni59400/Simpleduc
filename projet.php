<?php
    include('config/config.php');
    include('config/dbconnection.php');
    include("./inc/layout.php");
    if (!isset($_SESSION["valider"])){
?>
    <H1>Accueil non autorisé, vous n'avez pas les permissions.</H1>

<?php }else{ ?>
        <title>Accueil | Simpléduc</title>
    </head>
    <body>
<?php
    include("./inc/header.php");
?>
            <div>
                
            </div>
<?php
}
    include("./inc/layout_bottom.php");
?>