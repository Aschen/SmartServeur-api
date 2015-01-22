<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SessionModel
 *
 * @author Aschen
 */

include_once 'models/Model.php';

class SessionModel extends Model
{
    public function getSession($id)
    {
        $query = "SELECT * FROM sessions WHERE idSession=$id"; 
        
        $ret = $this->DoQuery($query);
        
        return $ret;        
    }
    
    public function getAllSessions()
    {
        $query = "SELECT * FROM sessions"; 
        
        $ret = $this->DoQuery($query);
        
        return $ret;        
    }
    
    public function newSession($numeroTable)
    {
      // On prépare la requète
      $query = "INSERT INTO sessions(numeroTable, expired) VALUES ($numeroTable, 0)";
      
      // On execute la requete
      $this->DoQuery($query);
  
      // On récupère l'id de la catégorie créé (/!\ Attention accès concurentiel!!)
      $rep = $this->DoQuery("SELECT * FROM sessions WHERE numeroTable=$numeroTable AND expired=0 ORDER BY idSession DESC");      

      // On retourne l'enregistrement créé
      return $rep[0];        
    }
    
    public function endSession($id)
    {
        // HELLO
    }
}
