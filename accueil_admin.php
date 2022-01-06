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
                        $nom_entreprise = $nom_entreprise -> fetch(); 
                    ?> 
                        
                    <tr>
                        <td><?= $contrat["delai"]?></td>
                        <td><?= $contrat["date_signature"]?></td>
                        <td><?= $contrat["cout"]?></td>
                        <td><?=$nom_entreprise?></td>
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
                <input type="submit" value="Ajouter un contrat" name="add_contrat">
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
        } if (isset($_POST["ajouter_entreprise"])){
            if (isset($_POST['nom']) && isset($_POST['coordonnees']) && isset($_POST['contact'])){
                $nom = $_POST['nom'];
                $coordonnes = $_POST['coordonnees'];
                $contact = $_POST['contact'];
                $sql = $db->prepare("INSERT into entreprise(coordonnees, contact, nom) values ('$coordonnes','$contact','$nom')");
                $sql -> execute();
                echo "ok" ; 
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
                    <?php foreach($data_module as $module){ ?>
                    <tr>
                        <td><?= $module["nom"]?></td>
                        <td><?= $module["equipe"]?></td>
                        <td><?= $module["projet"]?></td>
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
                <select name="equipe" id="equipe">
                    <option value="">Choississez une équipe</option>
                </select>
            </div>
            <div>
                <select name="projet" id="projet">
                    <option value="">Choississez un projet</option>
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
                        <td><?=$chef_equipe["nom"]?>  <?=$chef_equipe["prenom"]?></td>
                        <td><?php foreach($data_dev as $developpeur){$dev_name = $db->query("SELECT * from user where id = '$developpeur'"); $dev_name= $dev_name->fetchAll(); echo $dev_name['nom']; }?></td>
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
    if ((isset($_POST["delai"]) & !empty($_POST["delai"])) &  (isset($_POST["date_signature"]) & !empty($_POST["date_signature"])) & (isset($_POST["cout"]) & !empty($_POST["cout"])) & (isset($_POST["entreprise"]) & !empty($_POST["entreprise"]))){
        $delai = $_POST["delai"];
        $date_signature = $_POST['date_signature'];
        $cout = $_POST['cout'];
        $entreprise = $_POST["entreprise"];
        
    }
}

//entreprise
if (isset($_POST["add_entreprise"])){
    if ((isset($_POST["nom"]) & !empty($_POST["nom"])) & (isset($_POST["coordonnees"]) & !empty($_POST["coordonnees"])) & (isset($_POST["contact"]) & !empty($_POST["contact"]))){
        $nom = $_POST["nom"];
        $coordonnes = $_POST["coordonnes"]; 
        $contact = $_POST["contact"];
    }
}

//projet
if (isset($_POST["add_projet"])){
    if ((isset($_POST["contrat"]) & !empty($_POST["contrat"])) & (isset($_POST["cahier_des_charges"]) & !empty($_POST["cahier_des_charges"])) & (isset($_POST['budget']) & !empty($_POST["budget"]))){
        $contrat = $_POST["contrat"];
        $cahier_des_charges = $_POST["cahier_des_charges"];
        $budget = $_POST['budget'];
    }
}

//competence
if (isset($_POST["add_competence"])){
    if ((isset($_POST['nom']) & !empty($_POST['nom']))){
        $nom_competence = $_POST['nom_competence'];
    }
}

//materiel
if (isset($_POST["add_materiel"])){
    if((isset($_POST['nom']) & !empty($_POST['nom']))){
        $nom_mat = $_POST["nom"];
    }
}

//module
if (isset($_POST["add_module"])){
    if ((isset($_POST['nom']) & !empty($_POST['nom'])) & (isset($_POST['equipe']) & !empty($_POST['equipe'])) & (isset($_POST['projet']) & !empty($_POST['projet']))){
        $nom =  $_POST["nom"];
        $equipe = $_POST["equipe"];
        $projet = $_POST["projet"];
    }
}

//equipe
if (isset($_POST["add_equipe"])){
    if ((isset($_POST['nom']) & !empty($_POST['nom'])) & (isset($_POST['dev']) & !empty($_POST['dev'])) & (isset($_POST['chef']) & !empty($_POST['chef']))){
        foreach($_POST['dev'] as $id){
            //  ajout dans bdd appartenir
        }
    $nom = $_POST["nom"];
    $chef = $_POST["chef"];
    }
}

//user
if (isset($_POST["add_user"])){
    if ((isset($_POST['nom_personnel']) & !empty($_POST['nom_personnel'])) & (isset($_POST['prenom_personnel']) & !empty($_POST['prenom_personnel'])) & (isset($_POST['email_personnel']) & !empty($_POST['email_personnel'])) & (isset($_POST['fonction']) & !empty($_POST['fonction'])) & (isset($_POST['admin']) & !empty($_POST['admin']))){
        $nom = $_POST["nom_personnel"];
        $prenom = $_POST["prenom_personnel"];
        $mail  = $_POST["email_personnel"];
        $fonction = $_POST["fonction"];
        $admin = $_POST["admin"];
    }
}



}else{
?>

<h1>Vous n'etes pas administrateur.</h1>

<?php 
}
    include("./inc/layout_bottom.php");
?>