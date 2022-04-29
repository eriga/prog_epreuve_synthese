<?php
session_start();

function remplacerCaracteres($mot)
{
    return str_replace(
        ["é", "è", "ê", "ç", "û", "ï"],
        ["e", "e", "e", "c", "u", "i"],
        $mot
    );
}

if (
    isset($_GET["reponse3"]) == true &&
    empty($_GET["reponse3"]) == false
) {
    $_SESSION["reponse3"] = remplacerCaracteres($_GET["reponse3"]);

    $heros = "";
    // ÉTAPE 1
    $heros .= substr($_SESSION["reponse1"], 0, 3); // Hul

    // ÉTAPE 2 Hulbi
    $reponse2 = $_SESSION["reponse2"];
    if ($reponse2 < 125) {
        $heros .= "bi";
    } else if ($reponse2 >= 125 && $reponse2 < 150) {
        $heros .= "ta";
    } else if ($reponse2 >= 150 && $reponse2 < 175) {
        $heros .= "du";
    } else {
        $heros .= "co";
    }

    // ÉTAPE 3 Hulbiac
    $heros .= strtolower(substr($_SESSION["reponse3"], 0, 2));

    // Écrire le nouveau nom dans le fichier heros.txt
    file_put_contents("fichiers/heros.txt", $heros . "\r\n", FILE_APPEND);
    
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
    <title>Résultat | Épreuve-synthèse</title>
</head>

<body>
    <?php if (isset($erreur) != true) { ?>
        <h1>Votre superhéros: <?= $heros ?></h1>

        <h3>Vos choix:</h3>
        <p>Choix #1: <?= $_SESSION["reponse1"] ?></p>
        <p>Choix #2: <?= $_SESSION["reponse2"] ?></p>
        <p>Choix #3: <?= $_SESSION["reponse3"] ?></p>
        
        <p><a href="index.php">Recommencer</a></p>

    <?php } else { ?>
        <h1><?= $erreur ?></h1>

    <?php } ?>
</body>

</html>