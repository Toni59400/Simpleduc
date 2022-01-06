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
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Competences</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nom_ex</td>
                                <td>Prenom_ex</td>
                                <td>Competences_ex</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="two_div_in_screen">
            <div>
                <p class="title_table">Mon profil</p>
                <div class="body_table">
                    <table>
                        <thead>
                            <tr>
                                <th>Mes compétences</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Exemple_competences</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <p class="title_table">Ajouter des compétences</p>
                    <div class="body_table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nom de la competences</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nom_ex</td>
                                    <td>Ajouter - Supprimer</td>
                                </tr>
                                <tr>
                                    <td>Nom_ex</th>
                                    <td>Ajouter - Supprimer</td>
                                </tr>              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<?php 
}
    include("./inc/layout_bottom.php");
?> 