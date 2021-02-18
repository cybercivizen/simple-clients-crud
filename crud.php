<?php

// add 

function ajouter()
{

    require_once "serialiser.php";
    global $CLIENTS;
    $CLIENTS = deserialiser();

    if (!empty($_POST["username"]) and !empty($_POST["pwd"]) and !empty($_POST["email"])) :

        $id = count($CLIENTS);

        $NEW_CLIENT = [
            "ID" => $id,
            "username" => $_POST["username"],
            "password" => $_POST["pwd"],
            "email" => $_POST["email"]
        ];
        array_push($CLIENTS, $NEW_CLIENT);
    endif;
    return $CLIENTS;
}

// modify 

function modifier()
{
    require_once "serialiser.php";
    global $CLIENTS;
    $CLIENTS = deserialiser();

    if (!empty($_POST["username"]) and !empty($_POST["pwd"]) and !empty($_POST["email"])) :
        for ($i = 0; $i < count($CLIENTS); $i++) :
            if ($i == $_POST['id']) :
                $CLIENTS[$i]['username'] = $_POST["username"];
                $CLIENTS[$i]['password'] = $_POST["pwd"];
                $CLIENTS[$i]['email'] = $_POST["email"];
            endif;
        endfor;
    else :
        echo "Détails manquants! modifier à nouveau.";
    endif;
}

// delete

function supprimer()
{
    require_once "serialiser.php";
    global $CLIENTS;
    $CLIENTS = deserialiser();

    for ($i = 0; $i < count($CLIENTS); $i++) :
        if ($i == $_POST['id']) :
            array_splice($CLIENTS, $i, 1);
        endif;
    endfor;
}
