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
        <div>
            <a href="accueil_admin.php?contrat=1">Contrat</a>
            <a href="accueil_admin.php?entreprise=1">Ajouter une entreprise</a>
            <a href="accueil_admin.php?projet=1">Projet</a>
            <a href="accueil_admin.php?competence=1">Competence</a>
            <a href="accueil_admin.php?materiel=1">Materiel</a>
            <a href="accueil_admin.php?module=1">Module</a>
            <a href="accueil_admin.php?equipe=1">Équipe</a>
            <a href="accueil_admin.php?personnel=1">Personnel</a>
        </div>

<?php
if (isset($_GET['contrat'])){
?>
        <form action="" method="post">
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
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="">Modifier</a><a href="">Supprimer</a></td>
                </tr>
            </tbody>
        </table>
<?php
}
if (isset($_GET['entreprise'])){
?>
        <form action="" method="post">
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
        </form>
        <input type="submit">

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
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="">Modifier</a><a href="">Supprimer</a></td>
                </tr>
            </tbody>
        </table>

<?php
}
if (isset($_GET['projet'])){
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

        <table>
            <thead>
                <tr>
                    <th>Delai</th>
                    <th>Budget</th>
                    <th>Cahier des charges</th>
                    <th>Id contrat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="">Modifier</a><a href="">Supprimer</a></td>
                </tr>
            </tbody>
        </table>
<?php
}
if (isset($_GET['competence'])){
?>
        <form action="" method="post">
            <div>
                <label for="competence">Competence</label>
                <input type="competence" id="competence" name="competence">
            </div>
        </form>
        <input type="submit">

        <table>
            <thead>
                <tr>
                    <th>Compétence</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td><a href="">Modifier</a><a href="">Supprimer</a></td>
                </tr>
            </tbody>
        </table>
<?php
}
if (isset($_GET['materiel'])){
?>
        <form action="" method="post">
            <div>
                <label for="materiel">Materiel</label>
                <input type="materiel" id="materiel" name="materiel">
            </div>
        </form>
        <input type="submit">

        <table>
            <thead>
                <tr>
                    <th>Matériel</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td><a href="">Modifier</a><a href="">Supprimer</a></td>
                </tr>
            </tbody>
        </table>
<?php
}
if (isset($_GET['module'])){
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
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="">Modifier</a><a href="">Supprimer</a></td>
                </tr>
            </tbody>
        </table>
<?php
}
if (isset($_GET['equipe'])){
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
                <input type="chef" id="chef" name="chef">
            </div>
        </form>
        <input type="submit">

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
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="">Modifier</a><a href="">Supprimer</a></td>
                </tr>
            </tbody>
        </table>
<?php
}
if (isset($_GET['personnel'])){
?>

        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Date d'inscription</th>
                    <th>Date de la dernière connexion</th>
                    <th>Fonction</th>
                    <th>Admin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="">Modifier</a><a href="">Supprimer</a></td>
                </tr>
            </tbody>
        </table>

<?php
}
}else{
?>

<h1>Vous n'etes pas administrateur.</h1>

<?php 
}
    include("./inc/layout_bottom.php");
?>