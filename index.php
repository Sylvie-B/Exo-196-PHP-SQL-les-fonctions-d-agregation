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
    require "./DB/version-object.php";

    $bdd = new DB2('localhost', 'exo-196', 'root', '');
    $link = $bdd->getDbLink();

    try {

        // TODO votre code ici.
        $parts = $link->prepare("SELECT MIN(age) as minus FROM `exo-196`.user");
        $state = $parts->execute();

        if($state){
            $min = $parts->fetch();
            echo "Age minimum : ".$min['minus']." ans";
        }
        echo "<br>";

        $parts = $link->prepare("SELECT MAX(age) as max FROM `exo-196`.user");
        $state = $parts->execute();

        if($state){
            $max = $parts->fetch();
            echo "Age maximum : ".$max['max']." ans";
        }
        echo "<br>";

        $parts = $link->prepare("SELECT count(*) as number FROM `exo-196`.user");
        $state = $parts->execute();

        if($state){
            $count = $parts->fetch();
            echo "Nombre d'utilisateurs : ".$count['number'];
        }
        echo "<br>";

        $parts = $link->prepare("SELECT count(numero) as nbr FROM `exo-196`.user WHERE numero >= 5");
        $state = $parts->execute();

        if($state){
            $count = $parts->fetch();
            echo "Nombre d'utilisateurs ayant un numéro de rue plus grand ou égal à 5 : ".$count['nbr'];
        }
        echo "<br>";

        $parts = $link->prepare("SELECT AVG(age) as moy FROM `exo-196`.user");
        $state = $parts->execute();

        if($state){
            $result = $parts->fetch();
            echo "Moyenne d'âge des utilisateurs : ".$result['moy']." ans";
        }
        echo "<br>";

        $parts = $link->prepare("SELECT SUM(numero) as addNbr FROM `exo-196`.user");
        $state = $parts->execute();

        if($state){
            $sum = $parts->fetch();
            echo "Somme des numéros de maison des utilisateurs : ".$sum['addNbr'];
        }

    }
    catch (PDOException $exception) {
        echo $exception->getMessage();
    }

    ?>
</body>
</html>

