<?php

class ConnectionDB{

    public function connect(){
        try{
            $connexion = new PDO('mysql:host=localhost;port=3306;dbname=ldap;charset=utf8', 'root', '');
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $connexion;

        }catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
          }
    }

}


?>