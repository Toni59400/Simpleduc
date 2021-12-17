<?php
    include("./inc/layout.php");
    include("./inc/header.php");
?>
        <div>
            <a href="creer.php?contrat=1">Contrat</a>
            <a href="creer.php?entreprise=1">Ajouter une entreprise</a>
            <a href="creer.php?projet=1">Projet</a>
            <a href="creer.php?competence=1">Competence</a>
            <a href="creer.php?materiel=1">Materiel</a>
            <a href="creer.php?module=1">Module</a>
            <a href="creer.php?equipe=1">Équipe</a>
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
                <select name="entreprise" id="entreprise">
                    <option value="">Choississez une entreprise</option>
                </select>
            </div>
        </form>
        <input type="submit">
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

<?php
}
if (isset($_GET['projet'])){
?>
        <form action="" method="post">
            <div>
                <select name="contrat" id="contrat">
                    <option value="">Choississez un contrat</option>
                </select>
            </div>
            <div>
                <label for="Cahier de charges"></label>
                <textarea name="cahier_des_charges" id="cahier_des_charges" cols="30" rows="10"></textarea>
            </div>
        </form>
        <input type="submit">
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
<?php
}
?>

<?php 
    include("./inc/layout_bottom.php");
?> 