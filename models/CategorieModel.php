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
        $query = "SELECT * FROM Categorie WHERE idCategorie = $id"; 
        
        $ret = $this->DoQuery($query);
        
        return $ret;
    }
    
    public function getAllCategories()
    {
        $query = "SELECT * FROM categories"; 
        
        $ret = $this->DoQuery($query);

        return $ret;       
    }
    
}
