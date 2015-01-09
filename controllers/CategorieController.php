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

class Categorie {

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
        
        // On prépare la requète
        $query = "SELECT * FROM categories WHERE idCategorie = $id";
        
        // On récupère les résultats de la requète
        $rep = $dbModel->DoQuery($query);
        
        // Envoi de la réponse JSON
        if (empty($rep))
        {
            die(Tools::ToJson(array("error" => "invalid id")));
        }
        else
        {
            die(Tools::ToJson($rep));
        }
    }
    
    public static function getAll()
    {
        // On récupère le model
        $dbModel = new CategorieModel();        

        // On prépare la réponse en JSON
        $rep = Tools::ToJson($dbModel->getAllCategories());
        
        // On envoi la réponse JSON
        die($rep);
    }    

    /**
     * Créé une nouvelle catégorie
     * Paramètres POST : 'nom' et 'image'
     */
    public static function create($nom, $image)
    {
        // On récupère le model
        $dbModel = new CategorieModel();        

      // Si il manque un paramètre on renvoi une erreur
      if ($nom == false || $image == false)
      {
            die(Tools::ToJson(array('error' => 'missing parameters')));
      }

      // On prépare la requète
      $query = "INSERT INTO categories (nom, image) VALUES ('$nom', '$image')";
      
      // On execute la requete
      $dbModel->DoQuery($query);
  
      // On récupère l'id de la catégorie créé (/!\ Attention accès concurentiel!!)
      $rep = $dbModel->DoQuery("SELECT * FROM categories WHERE nom='$nom' AND image='$image' ORDER BY idCategorie DESC");      
      
      // On renvoi le dernier enregistrement créé
      die(Tools::ToJson($rep[0]));
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

        // On prépare la requète
        $query = "DELETE FROM categories WHERE idCategorie='$id'";
        
        // On exécute la requète
        $dbModel->DoQuery($query);
        
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

        if ($param === false || empty($param['nom']) || empty($param['image']))
        {
            die(Tools::ToJson(array("error" => "invalid parameters")));
        }
                
        // On prépare la requète
        $query = "UPDATE categories SET nom='" . $param['nom'] . "', image='" . $param['image'] . "' WHERE idCategorie=$id";
        
        // On exécute la requète
        $dbModel->DoQuery($query);

        die(Tools::ToJson(array("id" => $id, "nom" => $param['nom'], "image" => $param['image'])));
    }

}
