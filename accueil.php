<?php
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

        <h1>Accueil seuleument pour ceux authentifier !</h1>


<?php 
}
    include("./inc/layout_bottom.php");
?> 