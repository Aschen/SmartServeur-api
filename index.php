<?php
include_once 'config/config.php';
include_once 'flight/Flight.php';
include_once 'controllers/CategorieController.php';
include_once 'models/Model.php';


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
Flight::route('GET /categorie', function()
{
    // On appelle la function correspondante
    Categorie::getAll();
});
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
    Categorie::create($nom, $image);
});
Flight::route('DELETE /categorie/@id', function($id)
{
    // On appelle la function correspondante
    Categorie::delete($id);
});
Flight::route('PUT /categorie/@id', function($id)
{
    // On récupère le corps du HTML (parametre PUT)
    $param = Tools::ToArray(file_get_contents("php://input"));
    
    // On appelle la function correspondante
    Categorie::update($id, $param);
});

Flight::start();
?>
