<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommandeController
 *
 * @author Aschen
 */

include_once 'misc/Tools.php';
include_once 'models/CommandeModel.php';

class CommandeController
{
    public function get($id)
    {
        $dbModel = new CommandesModel();
        
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
        $rep = $dbModel->getCommande($id);
        
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
    
    public function getAll()
    {
        // On récupère le model
        $dbModel = new CommandeModel();        

        // On récupère toutes les commandes
        $rep = $dbModel->getAllCommandes();

        // On prépare la réponse en JSON
        if (empty($rep))
        {
            die(Tools::ToJson(array("error" => "no commandes")));
        }
        else
        {
            die(Tools::ToJson($rep));
        }
        
        // On envoi la réponse JSON
        die($rep);        
    }
    
    public function getAllFromSession($idSession)
    {
        // On récupère le model
        $dbModel = new CommandeModel();        

        // On récupère toutes les commandes
        $rep = $dbModel->getAllSessionCommandes($idSession);

        // On prépare la réponse en JSON
        if (empty($rep))
        {
            die(Tools::ToJson(array("error" => "no commandes")));
        }
        else
        {
            die(Tools::ToJson($rep));
        }
        
        // On envoi la réponse JSON
        die($rep);                
    }
    
    public function create($param)
    {
        // On récupère le model
        $dbModel = new CommandeModel();        

        // Si il manque un paramètre on renvoi une erreur
        if ($param === false || empty($param['idSession']) || empty($param['idProduit']) || empty($param['quantite']))
        {
            die(Tools::ToJson(array("error" => "invalid parameters")));
        }

        // On créé la commande
        $rep = $dbModel->createCommande($param['idSession'], $param['idProduit'], $param['quantite']);
      
        // On renvoi l'enregistrement créé
        die(Tools::ToJson($rep));        
    }
    
    public function delete($id)
    {
        // On récupère le model
        $dbModel = new CommandeModel();        

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
        $dbModel->deleteCommande($id);
        
        // On renvoi la réponse JSON
        die(Tools::ToJson(array("id" => $id)));       
    }
    
    public static function update($id, $param)
    {
        // On récupère le model
        $dbModel = new CommandeModel();        

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
        if ($param === false || empty($param['idProduit']) || empty($param['quantite']))
        {
            die(Tools::ToJson(array("error" => "invalid parameters")));
        }
                
        // On met a jour la catégorie
        $dbModel->updateCommande($id, $param['idProduit'], $param['quantite']);
        
        // On envoi l'enregistrement mis a jour en JSON
        die(Tools::ToJson(array("id" => $id, "idProduit" => $param['idProduit'], "quantite" => $param['quantite'])));
    }
}
