<?php
    include("./inc/layout.php");
    if (isset($_SESSION['admin']) && $_SESSION["admin"] == "oui"){
?>
        <title>Accueil | Simpléduc | Admin</title>
    </head>
    <body>
        <div class="header_index">
            <div class="info_right">
                <div class="header_right">
                    <a href="projets">Projets</a>
                    <a href="test">Test</a>
                    <a href="../unconnexion.php">Deconnexion</a>
                </div>
            </div>
            <div>
                <a href="../accueil_admin.php"><img class="logo" src="./logo.png" alt="Logo_Simpleduc"/></a>
            </div>
        </div>

        <h1>Accueil seuleument pour les admins !</h1>


<?php 
}else{
?>

<h1>Vous n'etes pas administrateur.</h1>

<?php 
}
    include("./inc/layout_bottom.php");
?> 