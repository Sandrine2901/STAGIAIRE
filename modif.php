<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Modification d'un Stagiaire</title>
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

$sql = "select * from membres where id_membre = :code ";
$reponse = $connexion->prepare($sql);
$reponse->execute(array(":code" => $_GET["code"]));
$data = $reponse->fetch();

?>

<body>
    <h1 style='color=red'>Modification d'un Stagiaire </h1>
    <br><br>

    <form action="traitement_modif.php" method="post" >

    <p>
            <input type="hidden" name="code" id="code" autocomplete="off" value="<?=$data['id_membre'] ?>">
        </p>
        <br>

    <p>
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" autocomplete="off"value="<?=$data['login_membre'] ?>"style='background-color:pink'>
            
        </p>
        <br>
        <p>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" autocomplete="off"value="<?=$data['nom_membre'] ?>"style='background-color:pink'>
        </p>
        <br><br>
        <p>
            <button type="submit" style='background-color:green'>Envoyer</button>&nbsp;&nbsp;&nbsp;
            <button type="reset" style='background-color:red' >Annuler</button>
            
        </p>
    </form>
</body>

</html>