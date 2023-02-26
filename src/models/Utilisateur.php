<?php

    class Utilisateur extends Model{
        
        public function __construct(){
            $this->table='users';
            $this->getConnection();
        }   

        public function checkUser($mail,$password){
           
            $sql="SELECT * FROM users WHERE id_user = AES_ENCRYPT(?,'0x89cd9986f89e70d43f0b349e0e294172') AND password_user = AES_ENCRYPT(?,'0x89cd9986f89e70d43f0b349e0e294172')";
        
            $query=$this->connexion->prepare($sql);
            $query->execute(array($mail,$password));
            $results=$query->fetch();
            return $results;  
        }
    }
?>
