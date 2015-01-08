<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tools
 *
 * @author Aschen
 */
class Tools {

    public static $error = '';

    /**
     * Transforme un tableau associatif en chaine JSON
     * @param array Tableau associatif
     * @return string JSON ou false si une erreur est survenue
     */
    public static function ToJson($data)
    {
        if (!is_array($data))
        {
            Tools::$error = 'Data must be an array.';
            return false;
        }
        
        $json = json_encode($data);
        if ($json == false)
        {
            Tools::$error = 'Failed to encode data.';
            return false;
        }
        
        return $json;
    }

    /**
     * Convertit une chaine JSON en tableau associatif
     * @param string $json Chaine JSON a convertir
     * @return array Tableau associatif ou false si une erreur est survenue
     */
    public static function ToArray($json)
    {
        if (!is_string($json))
        {
            Tools::$error = 'Json must be a string.';
            return false;
        }
        
        $data = json_decode($json, true);
        if ($data == null)
        {
            Tools::$error = 'Failed to decode json.';
            return false;
        }
        
        return $data;
    }
}
