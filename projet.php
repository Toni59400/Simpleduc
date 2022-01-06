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
        <div>
            <p class="title_table">Projet Client</p>
            <form method="post">
                <select class="float_right" name="entreprise" id="entreprise">
                    <option value="">Selectionner un client</option>
                    <?php 
                    $data_entreprise = $db->query("SELECT * from entreprise");
                    $data_entreprise = $data_entreprise-> fetchAll(); 
                    foreach($data_entreprise as $entreprise){ ?>
                        <option value="<?=$entreprise["id_entreprise"]?>"><?=$entreprise["nom"]?></option>
                    <?php } ?>
                </select>
                <input type="submit" value="chercher_contrat" name="chercher_contrat">
            </form>
            <?php if (isset($_POST["chercher_contrat"])){
                $id_entreprise = $_POST["entreprise"];
                $data_contrat = $db->query("SELECT * from contrat where id_entreprise='$id_entreprise'");
                $data_contrat = $data_contrat-> fetchAll();
                ?>
            <div class="body_table">
                <table>
                    <thead>
                        <th>Id contrat</th>
                        <th>Délai</th>
                        <th>Date de signature</th>
                        <th>Coût</th>
                    </thead>
                    <tbody>
                        <?php foreach($data_contrat as $contrat){?>
                        <tr>
                            <td><?=$contrat["id_contrat"]?></td>
                            <td><?=$contrat["delai"]?></td>
                            <td><?=$contrat["date_signature"]?></td>
                            <td><?=$contrat["cout"]?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php
            }
            ?>
        </div>
<?php 
}
    include("./inc/layout_bottom.php");
?> 