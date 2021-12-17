<?php
    include("./inc/layout.php");
    var_dump($_SESSION);
    if (!isset($_SESSION["valider"])){
?>
    <H1>Accueil non autorisé</H1>
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