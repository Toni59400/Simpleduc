<?php
include('config/config.php');
include('config/dbconnection.php');
    include("./inc/layout.php");
    if (isset($_SESSION['admin']) && $_SESSION["admin"] == "oui"){
?>
        <title>Accueil | Simpléduc | Admin</title>
    </head>
    <body>
        <div class="header_index">
            <div class="info_right">
                <div class="header_right">
                    <a href="../unconnexion.php">Deconnexion</a>
                </div>
            </div>
            <div>
                <a href="../accueil_admin.php"><img class="logo" src="./logo.png" alt="Logo_Simpleduc"/></a>
            </div>
        </div>
        <div>
            <nav class="nav_admin">
                <div><a href="accueil_admin.php?contrat=1">Contrat</a></div>
                <div><a href="accueil_admin.php?entreprise=1">Entreprise</a></div>
                <div><a href="accueil_admin.php?projet=1">Projet</a></div>
                <div><a href="accueil_admin.php?competence=1">Competence</a></div>
                <div><a href="accueil_admin.php?materiel=1">Materiel</a></div>
                <div><a href="accueil_admin.php?module=1">Module</a></div>
                <div><a href="accueil_admin.php?equipe=1">Équipe</a></div>
                <div><a href="accueil_admin.php?personnel=1">Personnel</a></div>
            </nav>
        </div>

<?php
if (isset($_GET['contrat'])){
    $data_contrat = $db->query("SELECT * from contrat");
    $data_contrat = $data_contrat -> fetchAll();
?>
        
        <div class="item_admin">
            <table>
                <thead>
                    <tr>
                        <th>Délai</th>
                        <th>Date de signature</th>
                        <th>Coût</th>
                        <th>Entreprise</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_contrat as $contrat){
                        $id_entreprise = $contrat["id_entreprise"];
                        $nom_entreprise = $db->query("SELECT * from entreprise where id_entreprise = '$id_entreprise'");
                        $nom_entreprise = $nom_entreprise -> fetchAll(); 
                    ?> 
                        
                    <tr>
                        <td><?= $contrat["delai"]?></td>
                        <td><?= $contrat["date_signature"]?></td>
                        <td><?= $contrat["cout"]?></td>
                        <td><?=$nom_entreprise[0]['nom']?></td>
                        <td><a href="">Modifier</a><a href="">Supprimer</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <form method="post">
                <input type="submit" value="Ajouter" name="ajouter_contrat">
            </form>
        </div>
        <?php
            if(isset($_POST['ajouter_contrat'])){
        ?>
        <div class="center">
            <form method="post" class="item_admin_add">
                <div>
                    <label class="inline">Nom : </label>
                    <input class="float_right" type="text" id="delai" name="nom">
                </div>
                <div>
                    <label class="inline" for="delai">Délai :</label>
                    <input class="float_right" type="text" id="delai" name="delai">
                </div>
                <div>
                    <label  class="inline" for="date_signature">Date de la signature:</label>
                    <input  class="float_right"  type="datetime" id="date_signature" name="date_signature">
                </div>
                <div>
                    <label class="inline" for="cout">Coût :</label>
                    <input  class="float_right" type="text" id="cout" name="cout">
                </div>
                <div>
                    <label class="inline" for="entreprise">Entreprise :</label>
                    <select class="float_right" name="entreprise" id="entreprise">
                        <?php 
                        $data_entreprise = $db->query("SELECT * from entreprise");
                        $data_entreprise = $data_entreprise-> fetchAll(); 
                        foreach($data_entreprise as $entreprise){ ?>
                            <option value="<?=$entreprise["id_entreprise"]?>"><?=$entreprise["nom"]?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="submit" value="add_contratt" name="add_contrat">
            </form>
        </div>
                <?php
            }
        ?>
<?php
}
if (isset($_GET['entreprise'])){
    $data_entreprise = $db->query("SELECT * from entreprise");
    $data_entreprise = $data_entreprise -> fetchAll();
?>
        <div class="item_admin">
            <table>
                <thead>
                    <tr>
                        <th>Nom de l'entreprise</th>
                        <th>Email de l'entreprise</th>
                        <th>Contact de l'entreprise</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_entreprise as $entreprise){?>
                    <tr>
                        <td><?=$entreprise["nom"]?></td>
                        <td><?=$entreprise["coordonnees"]?></td>
                        <td><?=$entreprise["contact"]?></td>
                        <td><a href="">Modifier</a><a href="">Supprimer</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <form method="post">
                <input type="submit" value="Ajouter" name="ajouter_contrat">
            </form>
            <?php
                if(isset($_POST['ajouter_contrat'])){
            ?>
            <div class="center">
            <form method="post" class="item_admin_add">
                <div>
                    <label class="inline" for="nom">Nom de l'entreprise:</label>
                    <input type="text" id="nom" name="nom">
                </div>
                <div>
                    <label class="inline" for="coordonnees">Email de l'entreprise:</label>
                    <input type="email" id="coordonnees" name="coordonnees">
                </div>
                <div>
                    <label class="inline" for="contact">Email du contact de l'entreprise:</label>
                    <input type="email" id="contact" name="contact">
                </div>
                <input type="submit" name="add_entreprise" value="Ajouter_entreprise">
            </form>
            </div>
        </div>
        <?php
        } if (isset($_POST["add_entreprise"])){
            if (isset($_POST['nom']) && isset($_POST['coordonnees']) && isset($_POST['contact'])){
                $nom = $_POST['nom'];
                $coordonnes = $_POST['coordonnees'];
                $contact = $_POST['contact'];
                $sql = $db->prepare("INSERT into entreprise(coordonnees, contact, nom) values ('$coordonnes','$contact','$nom')");
                $sql -> execute();
            }
        }
                ?>
<?php
}
if (isset($_GET['projet'])){
    $data_projet = $db->query("SELECT * from projet");
    $data_projet = $data_projet -> fetchAll();
?>
        <div class="item_admin">
            <table>
                <thead>
                    <tr>
                        <th>Delai</th>
                        <th>Budget</th>
                        <th>Cahier des charges</th>
                        <th>Id contrat</th>
                        <th>Nom Contrat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_projet as $projet) { 
                        $id_contrat = $projet['id_contrat'];
                        $nom_contrat = $db -> query("SELECT * from contrat where id_contrat = '$id_contrat'");
                        $nom_contrat = $nom_contrat->fetchAll(); 
                    ?>
                    <tr>
                        <td><?=$projet["delais"]?></td>
                        <td><?=$projet["budget"]?></td>
                        <td><?=$projet["cahier_des_charges"]?></td>
                        <td><?=$projet["id_contrat"]?></td>
                        <td><?=$nom_contrat[0]['nom']?></td>
                        <td><a href="">Modifier</a><a href="">Supprimer</a></td>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>

        <form method="post">
            <input type="submit" value="Ajouter" name="ajouter_contrat">
        </form>
        <?php
            if(isset($_POST['ajouter_contrat'])){
                $data_contrat2 = $db->query("SELECT * from contrat");
                $data_contrat2 = $data_contrat2->fetchAll();
        ?>
        <div class="center">
        <form class="item_admin_add" method="post">
            <div>
                <label class="inline">Delai : </label>
                <input name="delai">
            </div>
            <div>
                <label class="inline" for="contrat">Contrat</label>
                <select name="contrat" id="contrat">
                    <?php foreach($data_contrat2 as $contrat){ ?>
                        <option value="<?=$contrat['id_contrat']?>"><?=$contrat['nom']?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label class="inline" for="text">Budget</label>
                <input type="text" name="budget">
            </div>
            <div>
                <textarea name="cahier_des_charges" placeholder="cahier des charges" id="cahier_des_charges" cols="30" rows="10"></textarea>
            </div>
            <input type="submit" name="add_projet" value="ajouter_projet">
        </form>
        </div>
        
        <?php
            }
        ?>
<?php
}
if (isset($_GET['competence'])){
    $data_competence = $db->query("SELECT * from competence");
    $data_competence = $data_competence -> fetchAll();
?>
        <div class="item_admin">
            <table>
                <thead>
                    <tr>
                        <th>Compétence</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_competence as $competence){ ?>
                    <tr>
                        <td><?=$competence["nom"]?></td>
                        <td><a href="">Modifier</a><a href="">Supprimer</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <form method="post">
            <input type="submit" value="Ajouter" name="ajouter_contrat">
        </form>
        <?php
            if(isset($_POST['ajouter_contrat'])){
        ?>
        <div class="center">
        <form class="item_admin_add" method="post">
            <div>
                <label class="inline" for="competence">Competence</label>
                <input type="competence" id="competence" name="nom">
            </div>
            <input type="submit" name="add_competence" value="ajouter_competence">
        </form>
        </div>
        
        <?php
            }
        ?>
<?php
}
if (isset($_GET['materiel'])){
    $data_materiel = $db->query("SELECT * from materiel");
    $data_materiel = $data_materiel -> fetchAll();
?>
        <div class="item_admin">
            <table>
                <thead>
                    <tr>
                        <th>Matériel</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_materiel as $materiel){ ?>
                    <tr>
                        <td><?=$materiel["nom"]?></td>
                        <td><a href="">Modifier</a><a href="">Supprimer</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        <form method="post">
            <input type="submit" value="Ajouter" name="ajouter_contrat">
        </form>
        <?php
            if(isset($_POST['ajouter_contrat'])){
        ?>
        <div class="center">
        <form class="item_admin_add" method="post">
            <div class="center">
                <label class="inline" for="materiel">Materiel</label>
                <input type="materiel" id="materiel" name="nom">
            </div>
            <input type="submit" value="Ajouter_materiel" name="add_materiel">
        </form>
        </div>
        
        <?php
            }
        ?>
<?php
}
if (isset($_GET['module'])){
    $data_module = $db->query("SELECT * from module_");
    $data_module = $data_module -> fetchAll();
?>
        <div class="item_admin">
            <table>
                <thead>
                    <tr>
                        <th>Nom du module</th>
                        <th>Nom de l'équipe</th>
                        <th>Nom du projet</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_module as $module){ 
                        $id_equipe = $module["equipe"];
                        $data_equipe = $db -> query("SELECT * from equipe where id_equipe = '$id_equipe'");
                        $data_equipe = $data_equipe->fetchAll();
                        $id_projet = $module['projet']; 
                        $data_projet = $db -> query("SELECT * from projet where id_projet = '$id_projet'");
                        $data_projet = $data_projet->fetchAll();
                        ?>
                    <tr>
                        <td><?= $module["nom"]?></td>
                        <td><?= $data_equipe[0]["nom"]?></td>
                        <td><?= $data_projet[0]["id_projet"]?></td>
                        <td><a href="">Modifier</a><a href="">Supprimer</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        
        <form method="post">
            <input type="submit" value="Ajouter" name="ajouter_contrat">
        </form>
        <?php
            if(isset($_POST['ajouter_contrat'])){
        ?>
        <div class="center">
        <form class="item_admin_add" method="post">
            <div>
                <label class="inline" for="nom">Nom du module</label>
                <input type="nom" id="nom" name="nom">
            </div>
            <div>
            <label class="inline">Equipe</label>
                <select name="equipe" id="equipe">
                    <?php  
                    $data_equipe = $db->query("SELECT * from equipe");
                    $data_equipe = $data_equipe->fetchAll();
                    foreach($data_equipe as $equipe){
                    ?>
                    <option value="<?=$equipe["id_equipe"]?>"><?=$equipe['nom']?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label class="inline">Projet</label>
                <select name="projet" id="projet">
                <?php  
                    $data_projet = $db->query("SELECT * from projet");
                    $data_projet = $data_projet->fetchAll();
                    foreach($data_projet as $projet){
                    ?>
                    <option value="<?=$projet["id_projet"]?>"><?=$projet["id_projet"]?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" name="add_module" value="Ajouter_module">
        </form>
        </div>
        
        <?php
            }
        ?>
<?php
}
if (isset($_GET['equipe'])){
    $data_equipe = $db->query("SELECT * from equipe");
    $data_equipe = $data_equipe -> fetchAll();
?>
        <div class="item_admin">
            <table>
                <thead>
                    <tr>
                        <th>Nom de l'équipe</th>
                        <th>Responsable</th>
                        <th>Developpeur</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_equipe as $equipe){
                        $id_equipe = $equipe['id_equipe'];
                        $id_chef = $equipe['chef_equipe'];
                        $chef_equipe = $db->query("SELECT * from user where id = '$id_chef'");
                        $chef_equipe = $chef_equipe->fetchAll();
                        $data_dev = $db->query("SELECT * from appartenir where id_equipe = '$id_equipe'");

                    ?>
                    <tr>
                        <td><?=$equipe["nom"]?></td>
                        <td><?=$chef_equipe[0]["nom"]?>  <?=$chef_equipe[0]["prenom"]?></td>
                        <td><?php foreach($data_dev as $developpeur){
                            $id = $developpeur['id_personne'];
                            $dev_name = $db->query("SELECT * from user where id = '$id'"); 
                            $dev_name= $dev_name->fetch(); 
                            echo $dev_name['nom'].' '.$dev_name['prenom'].' ; ';
                        }?></td>
                        <td><a href="">Modifier</a><a href="">Supprimer</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        <form method="post">
            <input type="submit" value="Ajouter" name="ajouter_contrat">
        </form>
        <?php
            if(isset($_POST['ajouter_contrat'])){
        ?>
        <div class="center">
        <form class="item_admin_add" method="post">
            <div>
                <label class="inline" for="nom">Nom de l'équipe</label>
                <input type="nom" id="nom" name="nom">
            </div>
            <div>
                <label class="inline" for="dev">Développeur</label>
                    <?php 
                    $data_dev = $db->query("SELECT user.nom as nomp, user.prenom as prenomp, user.id as id from user INNER JOIN fonction on user.fonction = fonction.id_fonction where fonction.nom = 'Developpeur' order by nomp"); 
                    $data_dev = $data_dev->fetchAll();
                    foreach($data_dev as $dev){
                        
                    ?>
                    <input type="checkbox" value="<?=$dev['id']?>" name="dev[]"><label><?=$dev['nomp']?> <?=$dev['prenomp']?></label>
                    <?php
                        }
                    ?>
            </div>
            <div>
                <label class="inline">Responsable (chef équipe)</label>
                <select name="chef" >
                    <?php  $chef_equipe = $db->query("SELECT * from user order by nom");
                    $chef_equipe = $chef_equipe->fetchAll();
                    foreach($chef_equipe as $user){
                    ?>
                    <option value="<?=$user["id"]?>"><?=$user["nom"]?> <?=$user["prenom"]?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" value="Ajouter_equipe" name="add_equipe">
        </form>
        </div>
        
        <?php
            }
        ?>
<?php
}
if (isset($_GET['personnel'])){
    $data_personnel = $db->query("SELECT * from user");
    $data_personnel = $data_personnel -> fetchAll();
?>
        <div class="item_admin">
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Date d'inscription</th>
                        <th>Date de la dernière connexion</th>
                        <th>Fonction</th> <!--Developpeur-->
                        <th>Admin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data_personnel as $personnel) { 
                        $id_fonction = $personnel['fonction']; 
                        $data_fonction = $db->query("SELECT * from fonction where id_fonction = '$id_fonction'");
                        $data_fonction = $data_fonction -> fetchAll();
                        $dateinsc = explode(" ", $personnel["date_inscription"]); 
                        $dateinsc2 = explode("-", $dateinsc[0]);
                        $show_dateinsc = "$dateinsc2[2]-$dateinsc2[1]-$dateinsc2[0]";
                        $date_last = explode(" ", $personnel['date_derniere_connexion']);
                        $date_last2 = explode("-", $date_last[0]);
                        $show_datelast = "$date_last2[2]-$date_last2[1]-$date_last2[0]";
                    ?>
                    <tr>
                        <td><?=$personnel["nom"]?></td>
                        <td><?=$personnel["prenom"]?></td>
                        <td><?=$personnel["email"]?></td>
                        <td><?=$show_dateinsc?> à <?= $dateinsc[1]?></td>
                        <td><?=$show_datelast?> à <?= $date_last[1]?></td>
                        <td><?=$data_fonction[0]["nom"]?></td>
                        <td><?=$personnel["admin"]?></td>
                        <td><a href="">Modifier</a><a href="">Supprimer</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <form method="post">
            <input type="submit" value="Ajouter" name="ajouter_contrat">
        </form>
        <?php
            if(isset($_POST['ajouter_contrat'])){
        ?>
        <div class="center">
        <form method="POST" class="item_admin_add">
            <div>
                <label class="inline" for="nom_personnel">Nom</label>
                <input type="text" id="nom_personnel" name="nom_personnel">
            </div>
            <div>
                <label class="inline" for="prenom_personnel">Prénom</label>
                <input type="text" id="prenom_personnel" name="prenom_personnel">
            </div>
            <div>
                <label class="inline" for="email_personnel">Email</label>
                <input type="text" id="email_personnel" name="email_personnel">
            </div>
            <div>
                <label class="inline" for="pass">Mot de passe</label>
                <input type="pass"  name="mdp">
            </div>
            <div>
                <select name="fonction" id="fonction">
                <?php 
                $data_fonction2 = $db->query("SELECT * from fonction");
                $data_fonction2 = $data_fonction2->fetchAll();
                foreach($data_fonction2 as $fonction){
                ?>
                    <option value="<?=$fonction['id_fonction']?>"><?=$fonction['nom']?></option>
                <?php } ?>
                </select>
            </div>
            <div>
                <label class="inline" for="admin">Admin</label>
                <input type="checkbox" id="admin" name="admin">
            </div>
            <input type="submit" value="Ajouter_user" name="add_user">
        </form>
        </div>
        
        <?php
            }
        ?>

<?php
}

// ajouter dans la base de donnée : a faire (nom des boutons) : add_contrat ; add_entreprise ; add_projet ; add_competence ; 
//  add_materiel ; add_module ; add_equipe ; add_user 

// contrat 
if (isset($_POST['add_contrat'])){
    if ((isset($_POST["nom"]) & !empty($_POST["nom"])) & (isset($_POST["delai"]) & !empty($_POST["delai"])) &  (isset($_POST["date_signature"]) & !empty($_POST["date_signature"])) & (isset($_POST["cout"]) & !empty($_POST["cout"])) & (isset($_POST["entreprise"]) & !empty($_POST["entreprise"]))){
        $nom = $_POST['nom'];
        $delai = $_POST["delai"];
        $date_signature = $_POST['date_signature'];
        $cout = $_POST['cout'];
        $entreprise = $_POST["entreprise"];
        $sql = $db->prepare("INSERT into contrat (nom, delai, date_signature, cout, id_entreprise) values ('$nom','$delai','$date_signature','$cout','$entreprise')");
        $sql = $sql->execute();
    }
}


//projet
if (isset($_POST["add_projet"])){
    if ((isset($_POST["delai"]) & !empty($_POST["delai"])) & (isset($_POST["contrat"]) & !empty($_POST["contrat"])) & (isset($_POST["cahier_des_charges"]) & !empty($_POST["cahier_des_charges"])) & (isset($_POST['budget']) & !empty($_POST["budget"]))){
        $delai = $_POST["delai"];
        $contrat = $_POST["contrat"];
        $cahier_des_charges = $_POST["cahier_des_charges"];
        $budget = $_POST['budget'];
        $sql = $db->prepare("INSERT into projet (delais, budget, cahier_des_charges, id_contrat) values ('$delai', '$budget', '$cahier_des_charges', '$contrat')");
        $sql = $sql->execute();
    }
}

//competence
if (isset($_POST["add_competence"])){
    if ((isset($_POST['nom']) & !empty($_POST['nom']))){
        $nom_competence = $_POST['nom'];
        $sql = $db->prepare("INSERT into competence (nom) values ('$nom_competence')");
        $sql = $sql->execute();
    }
}

//materiel
if (isset($_POST["add_materiel"])){
    if((isset($_POST['nom']) & !empty($_POST['nom']))){
        $nom_mat = $_POST["nom"];
        $sql = $db->prepare("INSERT into materiel (nom) values ('$nom_mat')");
        $sql = $sql->execute();
    }
}

//module
if (isset($_POST["add_module"])){
    if ((isset($_POST['nom']) & !empty($_POST['nom'])) & (isset($_POST['equipe']) & !empty($_POST['equipe'])) & (isset($_POST['projet']) & !empty($_POST['projet']))){
        $nom =  $_POST["nom"];
        $equipe = $_POST["equipe"];
        $projet = $_POST["projet"];
        $sql = $db->prepare("INSERT into module_ (nom, equipe, projet) values ('$nom', '$equipe' , '$projet')");
        $sql = $sql->execute();
    }
}

//equipe
if (isset($_POST["add_equipe"])){
    if ((isset($_POST['nom']) & !empty($_POST['nom'])) & (isset($_POST['dev']) & !empty($_POST['dev'])) & (isset($_POST['chef']) & !empty($_POST['chef']))){
        $nom = $_POST["nom"];
        $chef = $_POST["chef"];
        $sql = $db->prepare("INSERT into equipe (nom, chef_equipe) values ('$nom', '$chef')");
        $sql = $sql->execute();
        $id_equipe = $db->query("SELECT * from equipe where nom = '$nom'"); 
        $id_equipe = $id_equipe->fetchAll();
        $id_e= $id_equipe[0]['id_equipe'];
        foreach($_POST['dev'] as $id){
            $id = (int)$id;
            $sql = $db->prepare("INSERT into appartenir (id_personne, id_equipe) values ('$id', '$id_e')");
            $sql = $sql->execute();
        }
    }
}

//user
if (isset($_POST["add_user"])){
    if (isset($_POST['mdp']) & isset($_POST['nom_personnel']) & isset($_POST['prenom_personnel'])  & isset($_POST['email_personnel'])  & isset($_POST['fonction'])){
        echo "passe";
        $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
        $nom = $_POST["nom_personnel"];
        $prenom = $_POST["prenom_personnel"];
        $mail  = $_POST["email_personnel"];
        $fonction = $_POST["fonction"];
        if (!isset($_POST["admin"])){
            $admin = "false";
        }else{
            $admin = 'true';
        }
        $sql = $db->prepare("INSERT into user (email, mdp, date_inscription, date_derniere_connexion, valider, codeVerif, nom, prenom, fonction, admin) values ('$mail', '$mdp', NOW(), NOW(), 'true', '', '$nom', '$prenom', '$fonction', '$admin')");
        $sql = $sql->execute();
        echo "ok";
    }
}


}else{
?>

<h1>Vous n'etes pas administrateur.</h1>

<?php 
}
    include("./inc/layout_bottom.php");
?>

