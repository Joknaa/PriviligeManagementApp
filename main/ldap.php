<?php 

class ldap{

    public function userInf(){
        
        require_once("ConnectionDB.php");
        $db= new ConnectionDB();

        $connexion=$db->connect();
        $rslt=$connexion->query('SELECT * FROM user ;');

        return $rslt;
    }

    public function user($mail){
        
        require_once("ConnectionDB.php");
        $db= new ConnectionDB();

        $connexion=$db->connect();
        $rslt=$connexion->query('SELECT id FROM user WHERE mail=\''.$mail.'\';');
        //$rslt->execute(array($mail));
        $id=$rslt->fetch();
        $rslt->closeCursor();

        return $id['id'];
    }
    
    public function roles($id){
        
        require_once("ConnectionDB.php");
        $db= new ConnectionDB();

        $connexion=$db->connect();
        $rslt=$connexion->query('SELECT service FROM roles WHERE id='.$id.';');
        
        return $rslt;
    }
    public function roleById($id){
        
        require_once("ConnectionDB.php");
        $db= new ConnectionDB();

        $connexion=$db->connect();
        $rslt=$connexion->query('SELECT service FROM services WHERE id='.$id.';');
        $service=$rslt->fetch();
        
        return $service;
    }
    
    public function rolesAll(){
        
        require_once("ConnectionDB.php");
        $db= new ConnectionDB();

        $connexion=$db->connect();
        $rslt=$connexion->query('SELECT * FROM services ;');
        
        return $rslt;
    }

    public function AddRole($id, $service){

        require_once("ConnectionDB.php");
        $db= new ConnectionDB();

        $connexion=$db->connect();
        $rslt=$connexion->query('SELECT * FROM roles WHERE id='.$id.'AND service='.$service.';');
        $tst=$rslt->fetch();
        
        if($tst['service'] == $service){
           echo "deja existe";
        }else{
            $requete=$connexion-> prepare('INSERT INTO `roles`(`id`, `service`) VALUES (?,?)');
            $requete -> execute(array($id, $service));
        }

    }

    public function RemoveRole($id, $service){

        require_once("ConnectionDB.php");
        $db= new ConnectionDB();

        $connexion=$db->connect();
       
            $requete=$connexion-> prepare('DELETE FROM roles WHERE id='.$id.' AND service='.$service.';');
            $requete -> execute();
        

    }
    
}

?>