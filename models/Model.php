<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BDDManager
 *
 * @author Aschen
 */

require_once 'config/config.php';

class Model
{
    private $dbh = null;

    public function ConnectMysql()
    {
        if ($this->dbh != null)
        {
            return true;
        }

        try
        {
            $str = 'mysql:host=' . $CONFIG['hostname'] . ';dbname=' . $CONFIG['mysql_database'];
            $this->dbh = new PDO($str, $CONFIG['mysql_user'], $CONFIG['mysql_password']);
        }
        catch (PDOException $e)
        {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            return false;
        }

        return true;
    }

    public function CloseMysql()
    {
      $dbh = null;
    }

    public function DoQuery($query)
    {
      return $this->dbh->query($query);
    }
}
