<?php
session_start();

if (
    isset($_GET["reponse2"]) == true &&
    empty($_GET["reponse2"]) == false &&
    $_GET["reponse2"] >= 100 &&
    $_GET["reponse2"] <= 200
) {
    // PSEUDO
    // 1. Placer le paramètre dans la session
    // 2. Lire le fichier fruits.txt
    // 3. Convertir le contenu en tableau
    // 4. Afficher le contenu

    $_SESSION["reponse2"] = $_GET["reponse2"];

    $fruits = explode("\r\n", file_get_contents("fichiers/fruits.txt"));

} else {
    $erreur = "Le paramètre n'est pas valide";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit | Épreuve-synthèse</title>
</head>

<body>
    <?php if (isset($erreur) != true) { ?>
        <h1>Choisissez un fruit:</h1>

        <?php foreach($fruits as $fruit) { ?>
            <p><a href="resultat.php?reponse3=<?= $fruit ?>"><?= $fruit ?></a></p>

        <?php } ?>
        
    <?php } else { ?>
        <h1><?= $erreur ?></h1>

    <?php } ?>
</body>

</html>