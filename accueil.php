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
    $id_user = $_SESSION['id'];
    $data_equipe = $db->query("SELECT * FROM equipe where chef_equipe = '$id_user'");
    $data_equipe = $data_equipe->fetchAll();
    $data_user = $db->query("SELECT * FROM user where id = '$id_user'");
?>
        <div class="two_div_in_screen">
            <div>
                <p class="title_table">Equipe(s) Dirigée(s)</p>
                <?php 
                $data_equipe_dirigee = $db->query("SELECT * FROM equipe where chef_equipe = '$id_user'"); 
                $data_equipe_dirigee = $data_equipe_dirigee->fetchAll();
                foreach($data_equipe_dirigee as $equipe){
                ?>
                <div class="body_table">
                    <p><?=$equipe['nom']?></p>
                    <table>
                        <thead>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Competences</th>
                        </thead>
                        <tbody>
                            <?php 
                            $id_equipe = $equipe["id_equipe"];
                            $data_personne_in_equipe = $db->query("SELECT * FROM user inner join appartenir on appartenir.id_personne = user.id where appartenir.id_equipe = '$id_equipe'");
                            $data_personne_in_equipe = $data_personne_in_equipe->fetchAll();
                            foreach($data_personne_in_equipe as $prs){
                            ?>
                            <tr>
                                <td><?=$prs['nom']?></td>
                                <td><?=$prs['prenom']?></td>
                                <td>
                                    <?php  
                                    $id_usr = $prs['id'];
                                    $data_comp = $db->query("SELECT * from maitriser where id_personne = '$id_usr'");
                                    $data_comp = $data_comp->fetchAll();
                                    foreach($data_comp as $comp){
                                        $id_comp = $comp['id_competence'];
                                        $data_c = $db->query("SELECT * from competence where id_competence = '$id_comp'"); 
                                        $data_c = $data_c->fetchAll(); 
                                        echo $data_c[0]['nom']. "; ";
                                    }
                                    ?>
                            </tr>
                            <?php

                                }   
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php  
                }
                ?>
            </div>
            <div>
                <p class="title_table">Mes modules</p>
                <?php 
                    $data_module = $db->query("SELECT * FROM appartenir  where id_personne = '$id_user'");
                    $data_module = $data_module->fetchAll();
                    foreach($data_module as $module) {
                        $id_equipe = $module['id_equipe']; 
                        $donnee_mod = $db->query("SELECT * FROM module_ where equipe = '$id_equipe'");
                        $donnee_mod = $donnee_mod->fetchAll();
                        foreach($donnee_mod as $mod){
                
                ?>
                <div class="body_table">
                    <p><?=$mod["nom"]?></p>
                   
                </div>
                <?php }
                    }
                    
                ?>
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $comp_usr = $db->query("SELECT * FROM maitriser where id_personne = '$id_user'");
                            $comp_usr = $comp_usr->fetchAll(); 
                            foreach($comp_usr as $comp){
                                $id_c  = $comp['id_competence'];
                                $nom_comp = $db->query("SELECT * from competence where id_competence = '$id_c'");
                                $nom_comp = $nom_comp->fetchAll();
                                foreach($nom_comp as $nom_comp2){
                            ?>
                            <tr>
                                <td><?=$nom_comp2['nom']?></td>
                                <td><a href="accueil.php?supp_comp=<?=$nom_comp2['id_competence']?>">Supprimer</a></td>
                            </tr>
                            <?php }
                        } ?>
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
                                <?php 
                                $comp = $db->query("SELECT * FROM competence");
                                $comp = $comp -> fetchAll();
                                foreach($comp as $item){
                                ?>
                                <tr>
                                    <td><?=$item["nom"]?></td>
                                    <td><a href="accueil.php?add_comp=<?=$item['id_competence']?>">Ajouter</a></td>
                                </tr>    
                                <?php
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<?php 
if (isset($_GET["supp_comp"])){
    $id_compe = $_GET["supp_comp"];
    $sql = $db->prepare("DELETE FROM maitriser where id_personne = '$id_user' and id_competence = '$id_compe'");
    $sql->execute();
}
if (isset($_GET['add_comp'])){
    $id_compe = $_GET['add_comp'];
    $sql2 = $db->query("SELECT * from maitriser where id_personne = '$id_user'"); 
    $sql2= $sql2->fetchAll();  
    $bool_present = False ;
    foreach($sql2 as $data){
        if ($data["id_competence"] == $id_compe){
            $bool_present = True;
        }
    }
    if ($bool_present == False){
        $sql = $db->prepare("INSERT into maitriser(id_personne, id_competence) values ('$id_user','$id_compe')");
        $sql->execute();
    } else {
        $bool_present = False;
    }
}
}
    include("./inc/layout_bottom.php");
?> 