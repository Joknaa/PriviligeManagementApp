<?php

class ConnectionDB{

    function connect(){
        try{
            $connexion = new PDO('mysql:host=localhost;port=3308;dbname=ldap;charset=utf8', 'root', '');
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $connexion;
        }catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
          }
    }
}


?>