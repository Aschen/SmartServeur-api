<?php
include_once 'config/config.php';
include_once 'flight/Flight.php';
include_once 'controllers/CategorieController.php';
include_once 'controllers/CommandeController.php';
include_once 'models/Model.php';

/**
 * 
 * Commande route
 */
Flight::route("GET /commande", function() 
{
    CommandeController::getAll();
});

/**
 * Categorie routes
 */
Flight::route('GET /categorie', function()
{
    // On appelle la function correspondante
    CategorieController::getAll();
});
Flight::route('GET /categorie/@id', function($id)
{
    // On appelle la function correspondante
    CategorieController::get($id);
});
Flight::route('POST /categorie', function()
{
    // On récupère le corps du HTML (parametre POST)
    $param = Tools::ToArray(file_get_contents("php://input"));

    // On appelle la fonction correspondante
    CategorieController::create($param);
});
Flight::route('DELETE /categorie/@id', function($id)
{
    // On appelle la function correspondante
    CategorieController::delete($id);
});
Flight::route('PUT /categorie/@id', function($id)
{
    // On récupère le corps du HTML (parametre PUT)
    $param = Tools::ToArray(file_get_contents("php://input"));

    // On appelle la function correspondante
    CategorieController::update($id, $param);
});

Flight::start();
?>
