<?php
define("filename", "CLIENTS.TXT");

// serialize

function serialiser($tab)
{
    $string_data = serialize($tab);
    file_put_contents(filename, $string_data);
}

// unserliaize

function deserialiser()
{
    $string_data = file_get_contents(filename);
    $tab = unserialize($string_data);
    return $tab;
}
