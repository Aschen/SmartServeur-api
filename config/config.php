<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

global $CONFIG;

$CONFIG = array();

// Set environnment dev or prod
$CONFIG['ENV'] = 'dev';

/**
 * GENERAL CONFIG
 */
$CONFIG['api_url'] = 'webservice';
if ($CONFIG['ENV'] == 'dev')
{
    $CONFIG['hostname'] = 'localhost';
}
else if ($CONFIG['ENV'] == 'prod')
{
  $CONFIG['hostname'] = 'smart-serveur.aschen.ovh';
}

/**
 * MYSQL CONFIG
 */
if ($CONFIG['ENV'] == 'dev')
{
    $CONFIG['mysql_user'] = 'root';
    $CONFIG['mysql_password'] = '';
    $CONFIG['mysql_database'] = 'db_smart_serveur';
}
