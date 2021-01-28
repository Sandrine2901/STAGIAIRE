<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Liste des Stagiaires</title>
</head>
<?php

// Ouverture d'une connexion sur la Base magasin du SGBD MySQL
$dsn = "mysql:dbname=formation;host=localhost;charset=utf8";
try {
    $option = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    $connexion = new PDO($dsn, "root", "", $option);
} catch (PDOException $e) {
    printf("Echec connexion : %s\n", $e->getMessage());
}


// Récupération des personnes dans la Table membres
$sql = "select * from membres ORDER BY nom_membre ASC ";
$reponse = $connexion->prepare($sql);
$reponse->execute(array());

$reponse->rowCount()

?>

<body>
    <h1>Liste des Stagiaires </h1>
    <br><br>
    <?php echo 'Il y a <strong>' . $reponse->rowCount() . '</strong> stagiaires dans la formation' . "</br><br>"; ?>
    <table class="table">
        <tr>
            <th class="membre">ID Membre</th><th>Prénom Membre</th><th>Nom Membre</th><th>Modifier</th><th>Suppression</th>
        </tr>
        <?php
        while ($donnees = $reponse->fetch()) {
            echo '<tr><td class="membre">' . $donnees["id_membre"] . '</td><td class="prenom">' . $donnees["login_membre"] . '</td><td class="nom">'
                . $donnees["nom_membre"] . '</td><td><a href=modif.php?code=' . $donnees["id_membre"] . '>Modifier</a></td>' . '<td><a href=traitement_supp.php?code=' . $donnees["id_membre"] . '>Supprimer</a></td></tr>';
        };
        echo '<tr><td colspan="5" class="ajout"><a href=ajout.php? id="ref_ajout">Ajouter un stagiaire</a></td></tr>';
        ?>
    </table>
</body>

</html>