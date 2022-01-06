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
        <form method="post">
            <div>
                <label for="delai">délai :</label>
                <input type="text" id="delai" name="delai">
            </div>
            <div>
                <label for="date_signature">date de la signature:</label>
                <input type="datetime" id="date_signature" name="date_signature">
            </div>
            <div>
                <label for="cout">Coût :</label>
                <input type="text" id="cout" name="cout">
            </div>
            <div>
                <label for="entreprise">Entreprise :</label>
                <select name="entreprise" id="entreprise">
                    <option value="">Choississez une entreprise</option>
                </select>
            </div>
        </form>
        <input type="submit">
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
            <form method="post">
                <div>
                    <label for="nom">Nom de l'entreprise:</label>
                    <input type="text" id="nom" name="nom">
                </div>
                <div>
                    <label for="coordonnees">Email de l'entreprise:</label>
                    <input type="email" id="coordonnees" name="coordonnees">
                </div>
                <div>
                    <label for="contact">Email du contact de l'entreprise:</label>
                    <input type="email" id="contact" name="contact">
                </div>
                <input type="submit" name="ajouter_entreprise" value="Ajouter">
            </form>
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
                        <td><?=$nom_contrat[0]?></td>
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
        <form action="" method="post">
            <div>
                <label for="contrat">contrat</label>
                <select name="contrat" id="contrat">
                    <option value="">Choississez un contrat</option>
                </select>
            </div>
            <input type="submit" value="Selectionner">
            <div>
                <textarea name="cahier_des_charges" placeholder="cahier des charges" id="cahier_des_charges" cols="30" rows="10"></textarea>
            </div>
        </form>
        <input type="submit">
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
        <form action="" method="post">
            <div>
                <label for="competence">Competence</label>
                <input type="competence" id="competence" name="competence">
            </div>
        </form>
        <input type="submit">
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
        <form action="" method="post">
            <div>
                <label for="materiel">Materiel</label>
                <input type="materiel" id="materiel" name="materiel">
            </div>
        </form>
        <input type="submit">
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
        <form action="" method="post">
            <div>
                <label for="nom">Nom du module</label>
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
        </form>
        <input type="submit">
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
        <form action="" method="post">
            <div>
                <label for="nom">Nom de l'équipe</label>
                <input type="nom" id="nom" name="nom">
            </div>
            <div>
                <label for="dev">Développeur</label>
                <input type="text">
            </div>
            <div>
                <label for="chef">Nom du chef de l'équipe</label>
                <input type="text" id="chef" name="chef">
            </div>
        </form>
        <input type="submit">
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
                    ?>
                    <tr>
                        <td><?=$personnel["nom"]?></td>
                        <td><?=$personnel["prenom"]?></td>
                        <td><?=$personnel["email"]?></td>
                        <td><?=$personnel["date_inscription"]?></td>
                        <td><?=$personnel["date_derniere_connexion"]?></td>
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
        <form action="">
            <div>
                <label for="nom_personnel">Nom</label>
                <input type="text" id="nom_personnel" name="nom_personnel">
            </div>
            <div>
                <label for="prenom_personnel">Prénom</label>
                <input type="text" id="prenom_personnel" name="prenom_personnel">
            </div>
            <div>
                <label for="email_personnel">Email</label>
                <input type="text" id="email_personnel" name="email_personnel">
            </div>
            <div>
                <select name="fonction" id="fonction">
                <option value="">Choississez une fonction</option>
                </select>
            </div>
            <div>
                <label for="admin">Admin</label>
                <input type="checkbox" id="admin" name="admin">
            </div>
        </form>
        <input type="submit">
        <?php
            }
        ?>

<?php
}
}else{
?>

<h1>Vous n'etes pas administrateur.</h1>

<?php 
}
    include("./inc/layout_bottom.php");
?>