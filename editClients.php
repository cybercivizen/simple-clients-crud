<?php

// handling exceptions

try {
    if (!isset($_POST['form_name']) || !isset($_POST['form_pwd']) || !isset($_POST['form_email'])) {
        throw new Exception('Aucun client sélectionné pour modifier');
    }
} catch (Exception $ex) {
    $error = $ex->getMessage();
    header("location: erreur.php?msg=$error");
}

$edit_name = $_POST['form_name'];
$edit_pwd = $_POST['form_pwd'];
$edit_email = $_POST['form_email'];
$id = $_POST['id'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Modifier client</title>
    <link rel="stylesheet" href="styles/style_edit.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="id">Modifier client</div>
    <div class="container">
        <form action="listeClients.php" method="post">

            <div class="item">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="<?= $edit_name ?>" value="<?= $edit_name ?>">
            </div>
            <div class="item">
                <label for="pwd">Mot de passe</label>
                <input type="password" name="pwd" placeholder="<?= $edit_pwd ?>" value="<?= $edit_pwd ?>">
            </div>
            <div class="item">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="<?= $edit_email ?>" value="<?= $edit_email ?>">
            </div>
            <div>
                <input hidden type="text" name="id" value="<?= $id ?>">
                <button type="submit" name="modify">Modifier</button>
            </div>
        </form>
    </div>
</body>

</html>