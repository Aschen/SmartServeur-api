<?php
require 'config/config.php';
require 'flight/Flight.php';
require 'controllers/CategorieController.php';
require 'models/Model.php';


Flight::route('GET /', function(){
    $BddManager = new Model();
    $BddManager->ConnectMysql();
        foreach($BddManager->DoQuery('SELECT * FROM categories') as $row) {
        print_r($row);
    }
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

    // On appelle la fonction correspondante
    Categorie::post($nom, $image);
});

Flight::start();
?>
