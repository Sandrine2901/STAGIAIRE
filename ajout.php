<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion d'un Stagiaire</title>
</head>
<?php
// Ouverture d'une connexion sur la Base magasin du SGBD MySQL
$dsn = "mysql:dbname=formation;host=localhost";
try {
    $option = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );

    $connexion = new PDO($dsn, "root", "", $option);
} catch (PDOException $e) {
    printf("Echec connexion : %s\n", $e->getMessage());
}

?>
<body>
    <h1>Insertion d'un Stagiaire </h1>
    <br><br>

    <form action="traitement_ajout.php" method="post">
    

        <p>
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" autocomplete="off" style='background-color:pink' >
        </p>
        <br>
        <p>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" autocomplete="off" style='background-color:pink' >
        </p>
        <br><br>
        <p>
            <button   type="submit" style='background-color:green'>Envoyer</button>&nbsp;&nbsp;&nbsp;
            <button   type="reset" style='background-color:red' >Annuler</button>
            
        </p>
    </form>
</body>

</html>