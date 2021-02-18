<?php

$user_date = date('l jS \of F Y h:i:s A');

?>

<!DOCTYPE html>

<head>
    <title>Authentification</title>
    <link rel="stylesheet" href="styles/style_authentification.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="id">Identification</div>
    <div class="container">

        <div>
            <form method="post">
                <input type="text" name="user_id" placeholder="Votre nom d'utilisateur">
                <input hidden type="text" name="user_date" value="<?= $user_date ?>">
        </div>
        <div>
            <input class="submit" type="submit" name="Envoyer" value="Envoyer">
        </div>
        </form>
    </div>
</body>

<!-- setting cookies -->

<?php

if (isset($_POST["user_id"])) {
    $user_id = $_POST["user_id"];

    setcookie("user_id", $user_id, time() + 3600);
    setcookie("user_date", $user_date, time() + 3600);
    header('location: listeClients.php');
}

?>