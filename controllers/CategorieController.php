<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categorie
 *
 * @author Aschen
 */

include_once 'misc/Tools.php';
include_once 'models/CategorieModel.php';

class CategorieController {

    /**
     * Renvoi les informations sur une catégorie
     * @param string $id Identifiant de la catégorie qu'on veut récupérer
     */
    public static function get($id)
    {
        // On récupère le model
        $dbModel = new CategorieModel();

        // On convertit la valeur en int
        if (is_string($id))
        {
            $id = intval($id);
        }

        // Si la conversion a échoué on renvoi un message d'erreur
        if ($id === 0)
        {
            die(Tools::ToJson(array('error' => 'invalid id')));
        }

        // On récupère la catégorie $id
        $rep = $dbModel->getCategorie($id);

        // Envoi de la réponse JSON
        if (empty($rep))
        {
            die(Tools::ToJson(array("error" => "invalid id")));
        }
        else
        {
            // On envoi la réponse JSON
            die(Tools::ToJson($rep));
        }
    }

    public static function getAll()
    {
        // On récupère le model
        $dbModel = new CategorieModel();

        // On récupère toutes les categories
        $rep = $dbModel->getAllCategories();

        // On prépare la réponse en JSON
        if (empty($rep))
        {
            die(Tools::ToJson(array("error" => "no categorie")));
        }
        else
        {
            // On envoi la réponse JSON
            die(Tools::ToJson($rep));
        }

}    


    /**
     * Créé une nouvelle catégorie
     */
    public static function create($param)
    {
        // On récupère le model
        $dbModel = new CategorieModel();

        // Si il manque un paramètre on renvoi une erreur
        if ($param === false || empty($param['nom']) || empty($param['image']))
        {
            die(Tools::ToJson(array("error" => "invalid parameters")));
        }

        // On créé la catégorie
        $rep = $dbModel->createCategorie($param['nom'], $param['image']);

        // On renvoi l'enregistrement créé
        die(Tools::ToJson($rep));
    }

    public static function delete($id)
    {
        // On récupère le model
        $dbModel = new CategorieModel();

        // On convertit la valeur en int
        if (is_string($id))
        {
            $id = intval($id);
        }

        // Si la conversion a échoué on renvoi un message d'erreur
        if ($id === 0)
        {
            die(Tools::ToJson(array('error' => 'invalid id')));
        }

        // On supprime la catégorie
        $dbModel->deleteCategorie($id);

        // On renvoi la réponse JSON
        die(Tools::ToJson(array("id" => $id)));
    }

    public static function update($id, $param)
    {
        // On récupère le model
        $dbModel = new CategorieModel();

        // On convertit la valeur en int
        if (is_string($id))
        {
            $id = intval($id);
        }

        // Si la conversion a échoué on renvoi un message d'erreur
        if ($id === 0)
        {
            die(Tools::ToJson(array('error' => 'invalid id')));
        }

        // Si un paramètre manque
        if ($param === false || empty($param['nom']) || empty($param['image']))
        {
            die(Tools::ToJson(array("error" => "invalid parameters")));
        }

        // On met a jour la catégorie
        $dbModel->updateCategorie($id, $param['nom'], $param['image']);

        // On envoi l'enregistrement mis a jour en JSON
        die(Tools::ToJson(array("id" => $id, "nom" => $param['nom'], "image" => $param['image'])));
    }

}
