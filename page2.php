<?php
session_start();

if (
    isset($_GET["reponse1"]) == true &&
    empty($_GET["reponse1"]) == false
) {

    $_SESSION["reponse1"] = $_GET["reponse1"];
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
    <title>Nombre | Épreuve-synthèse</title>
</head>

<body>
    <?php if (isset($erreur) != true) { ?>

        <h1>Choisissez un nombre:</h1>
        <form action="page3.php" method="get">
            <select name="reponse2">
                <?php for ($i = 100; $i <= 200; $i++) { ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Envoyer">
        </form>
    <?php } else { ?>
        <h1><?= $erreur ?></h1>

    <?php } ?>
</body>

</html>