<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommandesModel
 *
 * @author Aschen
 */

include_once 'models/Model.php';

class CommandesModel extends Model
{    
    public function getCommande($id)
    {
        $query = "SELECT * FROM commandes WHERE idCommande=$id"; 
        
        $ret = $this->DoQuery($query);
        
        return $ret;        
    }
    
    public function getAllCommandes()
    {
        $query = "SELECT * FROM commandes"; 
        
        $ret = $this->DoQuery($query);
        
        return $ret;        
    }
    
    public function getAllSessionCommandes($idSession)
    {
        $query = "SELECT * FROM commandes WHERE idSession=$idSession"; 
        
        $ret = $this->DoQuery($query);
        
        return $ret;
    }
    
    public function createCommande($idSession, $idProduit, $quantite)
    {
      // On prépare la requète
      $query = "INSERT INTO commandes (idSession, idProduit, quantite) VALUES ($idSession, $idProduit, $quantite)";
      
      // On execute la requete
      $this->DoQuery($query);
  
      // On récupère l'id de la catégorie créé (/!\ Attention accès concurentiel!!)
      $rep = $this->DoQuery("SELECT * FROM commandes WHERE idSession=$idSession AND idProduit=$idProduit AND quantite=$quantite ORDER BY idCommande DESC");      

      // On retourne l'enregistrement créé
      return $rep[0];        
    }
    
    public function deleteCommande($id)
    {
        // On prépare la requète
        $query = "DELETE FROM commandes WHERE idCommande=$id";
        
        // On exécute la requète
        $this->DoQuery($query);        
    }
    
    public function updateCommande($id, $idProduit, $quantite)
    {
        // On prépare la requète
        $query = "UPDATE commandes SET idProduit=$idProduit, quantite=$quantite WHERE idCommande=$id";
        
        // On exécute la requète
        $this->DoQuery($query);               
    }
}
