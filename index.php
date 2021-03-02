<?php
$server = 'localhost';
$db = 'exo-196';
$user = 'root';
$pass = '';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    /**
     * 1. Importez le contenu du fichier user.sql dans une nouvelle base de données.
     * 2. Utilisez un des objets de connexion que nous avons fait ensemble pour vous connecter à votre base de données.
     *
     * Pour chaque résultat de requête, affichez les informations, ex:  Age minimum: 36 ans <br>   ( pour obtenir une information par ligne ).
     *
     * 3. Récupérez l'age minimum des utilisateurs.
     * 4. Récupérez l'âge maximum des utilisateurs.
     * 5. Récupérez le nombre total d'utilisateurs dans la table à l'aide de la fonction d'agrégation COUNT().
     * 6. Récupérer le nombre d'utilisateurs ayant un numéro de rue plus grand ou égal à 5.
     * 7. Récupérez la moyenne d'âge des utilisateurs.
     * 8. Récupérer la somme des numéros de maison des utilisateurs ( bien que ca n'ait pas de sens ).
     */

    // TODO Votre code ici, commencez par require un des objet de connexion que nous avons fait ensemble.
    try {

    $bdd = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /* 1. Sélectionnez et affichez tous les utilisateurs dont le nom est 'Conor' */
    // TODO votre code ici.
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

//
//        $select = $pdo->prepare("SELECT MIN() from user");
//        $ref = $select->execute();
//
//        echo "<div class='info'>Age minimum des utilisateurs : <br>";
//        if($ref) {
//            foreach ($select->fetchAll() ){
//                echo $user['min'];
//            }
//        }
//        echo "</div>";
    }
    catch (PDOException $exception) {
        echo $exception->getMessage();
    }



    ?>
</body>
</html>

