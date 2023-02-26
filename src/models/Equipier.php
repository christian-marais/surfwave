<?php

class Equipier extends Model{

    public function __construct(){//on définit la configuration automatique du contexte d'utilisation des méthodes
        $this->table='equipier';//on choisit la table par défaut de l'ensemble des méthodes
        $this->getConnection();//on initialise la connexion à la DB
    }   

    public function getAllEquipiers(){
        $this->table='equipier';
        return $this->getAll();
    }

    public function getOneEquipier($champ,$valeur){
        $this->table='equipier';
        return $this->getBy($champ,$valeur);
    }

    public function deleteOneEquipier($champ,$valeur){
        $this->table='equipier';
        $this->deleteBy($champ,$valeur);
    }

    public function updateOneEquipier($id,$valeur_id){
        $this->table='equipier';
        $data=[
            'codeEq' => htmlspecialchars($_POST['codeEq']),
            'surnomEq' => htmlspecialchars($_POST['surnomEq']),
            'nomEq' => htmlspecialchars($_POST['nomEq']),
            'fonctionEq' => htmlspecialchars($_POST['fonctionEq']), 
        ];
        return $this->updateBy($id,$valeur_id,$data);
        
    }

    public function insertOneEquipier(){
   
        $this->table='equipier';
        (empty($_POST['codeEq']))? $_POST['codeEq']="" : "";
        (empty($_POST['surnomEq']))? $_POST['surnomEq']="" : "";
        (empty($_POST['nomEq']))? $_POST['nomEq']="" : "";
        (empty($_POST['fonctionEq']))? $_POST['fonctionEq']="" : "";

        $data=[
            'codeEq' => htmlspecialchars($_POST['codeEq']),
            'surnomEq' => htmlspecialchars($_POST['surnomEq']),
            'nomEq' => htmlspecialchars($_POST['nomEq']),
            'fonctionEq' => htmlspecialchars($_POST['fonctionEq'])
        ];
        $results=$this->insertOne($data);
        return $results;
       
    }

}
