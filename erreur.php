<!DOCTYPE html>
<html>

<head>
    <title>Gestion des erreurs</title>
    <link rel="stylesheet" href="styles/style_erreur.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container">
        <img src="styles/warning.png" width="150px;">

        <h3>Cause de l'erreur: </h3>

        <?php if (isset($_GET['msg'])) {
            $text = $_GET['msg'];
        } else {
            $text = "Page web inaccessible!"; // direct access to error's page (forbidden)
        }
        ?>
        <div> <?= $text ?></div>
        <?php
        if ($text == 'Vous n\'êtes pas identifié') { // identification error
        ?>
            <div>Aller vers la page d'authentification</div>
            <a href="authentification.php">Page d'authentification</a>

        <?php } else { // other errors
        ?>

            <div>Retour a la page d'acceuil</div>
            <a href="listeClients.php">Page d'acceuil</a>
        <?php } ?>
    </div>
</body>

</html>