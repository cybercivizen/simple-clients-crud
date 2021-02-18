<?php

require_once "serialiser.php";
require_once "crud.php";

$filename = 'CLIENTS.TXT';
$CLIENTS = deserialiser();

if (!is_array($CLIENTS)) {
    $CLIENTS = array();
}

// handling cookies

if (!isset($_COOKIE["user_id"]) || !isset($_COOKIE["user_date"])) {
    header("location: authentification.php");
} else {

?>
    <div class="container">
        <div class="flex-container">
            <div class="user-name">Bonjour M.<?= $_COOKIE["user_id"] ?></div>
            <div class="user-date">Date de dernier connexion: <?= $_COOKIE["user_date"] ?></div>
        <?php

    }

    // handling exceptions 

    try {
        if (!isset($_COOKIE["user_id"]) || !isset($_COOKIE["user_date"])) {
            throw new Exception('Vous n\'êtes pas identifié');
        }
        if (!file_exists($filename)) {
            throw new Exception('Le fichier n\'existe pas.');
            exit();
        }
        if (!is_array($CLIENTS)) {
            throw new Exception('Le fichier ne contient pas un tableau.');
            exit();
        }
    } catch (Exception $ex) {
        $error = $ex->getMessage();
        header("location: erreur.php?msg=$error");
    }

    // crud functions

    if (isset($_POST['ajouter'])) :
        ajouter();
    endif;


    if (isset($_POST['modify'])) :
        modifier();
    endif;


    if (isset($_POST['delete'])) :
        supprimer();
    endif;

    // serialize data to the same file.
    serialiser($CLIENTS);

        ?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Liste des clients</title>
            <link rel="stylesheet" href="styles/style_main.css">
            <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@700&display=swap" rel="stylesheet">
        </head>

        <body>
            <br><br>
            <a href="ajoutClient.php">
                <div>Ajouter client</div>
            </a>
        </div>
        <div class="wrapper">
            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Options</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- handling output -->
                    <?php
                    for ($i = 0; $i < count($CLIENTS); $i++) :
                    ?>

                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $CLIENTS[$i]['username'] ?></td>
                            <td><?= $CLIENTS[$i]['password'] ?></td>
                            <td><?= $CLIENTS[$i]['email'] ?></td>
                            <td>
                                <form action="editClients.php" method="post">
                                    <input hidden type="text" name="id" value="<?= $i ?>">
                                    <input hidden type="text" name="form_name" value="<?= $CLIENTS[$i]["username"] ?>">
                                    <input hidden type="text" name="form_pwd" value="<?= $CLIENTS[$i]['password'] ?>">
                                    <input hidden type="text" name="form_email" value="<?= $CLIENTS[$i]['email'] ?>">
                                    <button class="btn" type="submit">Modifier</button>
                                </form>
                                <form method="post">
                                    <input class="btn" type="submit" name="delete" value="Supprimer">
                                    <input hidden type="text" name="id" value="<?= $i ?>">

                                </form>
                            </td>
                        </tr> <!-- end of output -->
                    <?php
                    endfor;

                    if (isset($_COOKIE["user_id"]) && isset($_COOKIE["user_date"]) && count($CLIENTS) == 0) :
                        header("Location: ajoutClient.php");
                        exit;
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
        </body>

        </html>