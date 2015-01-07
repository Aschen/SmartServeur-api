<?php
require 'config/config.php';
require 'flight/Flight.php';
require 'models/Categorie.php';

Flight::route('GET /', function(){
    echo 'hello world!';
});

/**
 * Categorie routes
 */
Flight::route('GET /categorie/@id', function($id)
{
    // On appelle la function correspondante
    Categorie::get($id);   
});

Flight::route('POST /categorie', function()
{
    // On récupère les paramètres POST
    $nom = filter_input(INPUT_POST, 'nom');
    $image = filter_input(INPUT_POST, 'image');

    // Si il manque un paramètre on renvoi une erreur
    if ($nom == false || $image == false)
    {
        die(Tools::ToJson(array('error' => 'missing parameters')));
    }

    // On appelle la fonction correspondante
    Categorie::post($nom, $image);
});

Flight::start();
?>
