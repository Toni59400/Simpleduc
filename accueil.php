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
        <div class="two_div_in_screen">
            <div>
                <p class="title_table">Equipe(s) Dirigée(s)</p>
                <div class="body_table">
                    <p>Nom equipe</p>
                    <table>
                        <thead>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Competences</th>
                        </thead>
                        <tbody>
                            <td>Nom_ex</td>
                            <td>Prenom_ex</td>
                            <td>Competences_ex</td>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <p class="title_table">Mes modules</p>
                <div class="body_table">
                    <p>Nom module</p>
                    <p>Nom contrat -> Nom projet -> Nom module</p>
                    <table>
                        <thead>
                            <th>Prenom</th>
                            <th>Competences</th>
                        </thead>
                        <tbody>
                            <td>Nom_ex</td>
                            <td>Prenom_ex</td>
                            <td>Competences_ex</td>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="two_div_in_screen">

        </div>
<?php 
}
    include("./inc/layout_bottom.php");
?> 