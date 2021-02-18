<?php

require_once "serialiser.php";
$CLIENTS = deserialiser();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Ajouter client</title>
    <link rel="stylesheet" href="styles/style_ajout.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="id">Ajouter Client</div>
    <div class="container">
        <?php
        if (count($CLIENTS) == 0) :
        ?>
            <div class="new">La liste est vide, vous pouvez ajouter un nouveau client ci-dessous</div>
        <?php
        endif
        ?>
        <form action="listeClients.php" method="post">

            <div class="item">
                <label for="username">Username</label>
                <input type="text" name="username">
            </div>
            <div class="item">
                <label for="pwd">Mot de passe</label>
                <input type="password" name="pwd">
            </div>
            <div class="item">
                <label for="email">Email</label>
                <input type="email" name="email">
            </div>
            <div>
                <button type="submit" name="ajouter">AJOUTER</button>
            </div>

        </form>
    </div>
</body>

</html>