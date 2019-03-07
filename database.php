<?php
/**
 * iTech Empires Tutorial Script : PHP Login Registration system with PDO Connection
 *
 * File: Database Configuration
 */


// database Connection variables
/*
define('HOST', 'localhost'); // Database host name ex. localhost
define('USER', 'root'); // Database user. ex. root ( if your on local server)
define('PASSWORD', ''); // user password  (if password is not set for user then keep it empty )
define('DATABASE', 'tvaitis'); // Database Database name
*/



function DB()
{

    $hostlocal='localhost';
    $dbasename='commentdb';
  /*  $nameusr='ruchika';
    $password="Hplj2006#n";  //shailesh
*/
    $nameusr='root';
    $password='';
    //Custom PDO options.
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    );

    try {
       // $db = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USER, PASSWORD);

         $db = new PDO("mysql:host=$hostlocal;dbname=$dbasename", $nameusr,$password,$options);
        return $db;
        echo "db conne";
    } catch (PDOException $e) {
        return "Error!: " . $e->getMessage();
        die();
    }
}
?>