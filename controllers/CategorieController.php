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

require_once 'misc/Tools.php';

class Categorie {

    /**
     * Renvoi les informations sur une catégorie
     * @param string $id Identifiant de la catégorie qu'on veut récupérer
     */
    public static function get($id)
    {

        // On convertit la valeur en int
        if (is_string($id))
        {
            $id = intval($id);
        }

        // Si la conversion a échoué on renvoi un message d'erreur
        if ($id == 0)
        {
            die(Tools::ToJson(array('error' => 'invalid id')));
        }

        $name = 'Cocktails';
        $image = 'images/cocktails.jpg';

        // On prépare la réponse en JSON
        $rep = Tools::ToJson(array('id' => $id, 'nom' => $name, 'image' => $image));

        // On envoi la réponse JSON
        die($rep);
    }

    /**
     * Créé une nouvelle catégorie
     * Paramètres POST : 'nom' et 'image'
     */
    public static function post($nom, $image)
    {

      // Si il manque un paramètre on renvoi une erreur
      if ($nom == false || $image == false)
      {
        die(Tools::ToJson(array('error' => 'missing parameters')));
      }

      $id = 42;

      // On prépare la réponse en JSON
      $rep = Tools::ToJson(array('id' => $id, 'nom' => $nom, 'image' => $image));

      // On envoi la réponse JSON
      die($rep);
    }

    public static function delete($id)
    {
        // On convertit la valeur en int
        if (is_string($id))
        {
            $id = intval($id);
        }

        // Si la conversion a échoué on renvoi un message d'erreur
        if ($id == 0)
        {
            die(Tools::ToJson(array('error' => 'invalid id')));
        }

        // On prépare la réponse JSON
        $rep = Tools::ToJson(array('delete' => true, 'id' => $id));

        // On envoi la réponse JSON
        die($rep);
    }

    public static function update($id, $nom, $image)
    {
        // On convertit la valeur en int
        if (is_string($id))
        {
            $id = intval($id);
        }

        // Si la conversion a échoué on renvoi un message d'erreur
        if ($id == 0)
        {
            die(Tools::ToJson(array('error' => 'invalid id')));
        }

        // On prépare la réponse JSON
        $rep = Tools::ToJson(array('update' => true, 'id' => $id, 'nom' => $nom, 'image' => $image));

        // On envoi la réponse JSON
        die($rep);
    }

}
