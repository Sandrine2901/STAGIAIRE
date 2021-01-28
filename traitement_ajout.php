
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

// Préparation de la requête avec des marqueurs nommés
$sql = "insert into membres (nom_membre, login_membre) values (:nom, :prenom)";
$reponse = $connexion->prepare($sql);


// Récupération des valeurs issues de la soumission du formulaire

$nom            = $_POST["nom"];
$prenom         = $_POST["prenom"];



$reponse->bindValue(":nom", $nom, PDO::PARAM_STR);
$reponse->bindValue(":prenom", $prenom, PDO::PARAM_STR);
$reponse->execute();

header("location:index.php");
// echo 'Valeur de la dernière clef primaire insérée : ' . $connexion->lastInsertId();
?>
