<?php

class Categorie extends Model{

    public function __construct(){
        $this->table='catpro';
        $this->getConnection();
    }   

    public function getAllCategories(){
        return $this->getAll();
    }

    public function getOneCategorie($champ,$valeur){
        return $this->getBy($champ,$valeur);
    }

    public function deleteOneCategorie($champ,$valeur){
        
        $this->table='produits';
        $this->deleteBy('catProd',$valeur);
        $this->table='tarif';
        $this->deleteBy('CodeCat',$valeur);
        $this->table='catpro';
        return $this->deleteBy($champ,$valeur);
    }

    public function insertOneCategorie($data=null){
      
        (empty($_POST['categoProd']))? $_POST['categoProd']="" : "";
        (empty($_POST['libCatego']))? $_POST['libCatego']="" : "";
        
        if($data==null){
            $data=[
                'categoProd' => htmlspecialchars($_POST['categoProd']), 
                'libCatego' => htmlspecialchars($_POST['libCatego']) 
            ];
        }
        return $this->insertOne($data);
        
    }
    
    public function getCategorie(){
        return $this->getOne();
    }
    
    public function updateOneCategorie($id,$valeur_id,$data){
     
        //la table catégorie contient des clés primaires qui sont des foreign key pour d'autres tables. L'update ne peut se faire directement et doit passer par des sous étapes
        //si la clé primaire est utilisée en foreign key dans une occurence
        
        if($this->updateBy($id,$valeur_id,$data)){// Si on ne peut pas update
        $this->insertOneCategorie($data);// On insère la modfication comme nouvelle catégorie
        $this->table='produits';
        $this->updateBy('catProd',$valeur_id,['catProd'=>$_POST['categoProd'.$_POST['validating_edit']]]);//on update les foreign key des autres tables pour correspondre à la nouvelle catégorie
        $this->table='tarif';
        $this->updateBy('codeCat',$valeur_id,['codeCat'=>$_POST['categoProd'.$_POST['validating_edit']]]);
        $this->table='catpro';
        $results=$this->deleteBy($id,$valeur_id);//on supprime l'ancienne occurrence de catégorie
        }   
    }
}
