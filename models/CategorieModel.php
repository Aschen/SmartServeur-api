<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategorieModel
 *
 * @author Aschen
 */

include_once 'models/Model.php';

class CategorieModel extends Model
{
 
    public function getCategorie($id)
    {
        $query = "SELECT * FROM categories WHERE idCategorie=$id"; 
        
        $ret = $this->DoQuery($query);
        
        return $ret;
    }
    
    public function getAllCategories()
    {
        $query = "SELECT * FROM categories"; 
        
        $ret = $this->DoQuery($query);

        return $ret;       
    }
    
    public function createCategorie($nom, $image)
    {
      // On prépare la requète
      $query = "INSERT INTO categories (nom, image) VALUES ('$nom', '$image')";
      
      // On execute la requete
      $this->DoQuery($query);
  
      // On récupère l'id de la catégorie créé (/!\ Attention accès concurentiel!!)
      $rep = $this->DoQuery("SELECT * FROM categories WHERE nom='$nom' AND image='$image' ORDER BY idCategorie DESC");      

      // On retourne l'enregistrement créé
      return $rep[0];
    }
    
    public function deleteCategorie($id)
    {
        // On prépare la requète
        $query = "DELETE FROM categories WHERE idCategorie='$id'";
        
        // On exécute la requète
        $this->DoQuery($query);
    }

    public function updateCategorie($id, $nom, $image)
    {
        // On prépare la requète
        $query = "UPDATE categories SET nom='$nom', image='$image' WHERE idCategorie=$id";
        
        // On exécute la requète
        $this->DoQuery($query);       
    }
    
}
