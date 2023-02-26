<?php

abstract class Model{//classe contenant la connexion à la bdd ainsi que des méthodes contenant des requetes basique d'accès à la bdd
    // Informations de base de données

    private $host="localhost";
    private $dbname="surfwave";
    private $username = "christian";
    private $password="1997";
 /*
    private $host="localhost:3306";
    private $dbname="c1617653c_surfwave";
    private $username = "c1617653c_christian";
    private $password="@87Toopac87";
    */  

    // propriété contenant la conenxion

    protected $connexion;

    //propriete contenant les informations de table et requete des
    protected $table;
    public $id;
    protected $stmt;
    private $affectedRow;

    protected function getConnection(){//initialise la connexion par la classe PDO
        $this->connexion=null;
        
        try{
            $this->connexion = new PDO('mysql:local='.$this->host.'; dbname='.$this->dbname, $this->username,$this->password);
            $this->connexion->exec('set names utf8');
        }catch(Exception $e){
            echo'Erreur :'.$e->getMessage();
        }
    }
    /**
     * M récupère toutes les info d'une table
     * O un tableau de résultats
     * I rien
     */
    protected function getAll(){
        $sql='SELECT * FROM '.$this->table;
        $query=$this->connexion->prepare($sql);
        $query->execute();
        $results= $query->fetchAll();
        return $results;
    }
     /**
     * M récupère une occurence
     * O un tableau de résultats
     * I rien
     */
    protected function getOne(){
        $sql='SELECT * FROM '.$this->table.' WHERE id_'.$this->table.' = ?';
        $query=$this->connexion->prepare($sql);
        $query->execute(array($this->id));
        $results=$query->fetch();
        return $results;
    }
     /**
     * M insere une nouvelle ligne dans la bdd
     * O la requete ou false 
     * I tableau de données associatif contenant le nom de colonne et la valeur
     */
    protected function insertOne($data){
        $i=0;
        foreach($data as $colonne => $valeur){
            $colonnes[$i]=$colonne;
            $valeurs[$i]= $valeur;
            $params[$i] ='?';
            $i++;
        }
        $sql= 'INSERT INTO '.$this->table.' ('.implode(",",$colonnes).') VALUES ('.implode(",",$params).')';
        
        $req=$this->connexion->prepare($sql);
        $req->execute($valeurs);
        return $req;

    }
    /**
     * M update une ligne dans la bdd
     * O le nombre de lignes affectées
     * I un string de l'id, un string de la valeur de l'id, un tableau de données associatif contenant le nom de colonne et la valeur
     */
    protected function updateBy($id,$valeur_id,$data){
       
        $i=0;
        $sql="UPDATE $this->table SET";
        foreach($data as $colonne => $valeur){
          $sql.=' '.$colonne.' = ? ,';
          $valeurs[$i]= $valeur;
          $i++;
        }
        $valeurs[$i]= $valeur_id;
        $sql=substr($sql,0,-1);
        $sql.=" WHERE $id = ?";
        
        $req=$this->connexion->prepare($sql);
        $req->execute($valeurs);
        
        $this->affectedRow = $req->rowCount();
        return $req;
    }
    
    /**
     * M recupère une occurence selon la valeur d'un champ
     * O un tableau de données 
     * I string du nom de colonne et string de sa valeur
     */
    protected function getBy($champ,$valeur){
        $sql='SELECT * FROM '.$this->table.' WHERE '.$champ.' = ?';
        
        $query=$this->connexion->prepare($sql);
        $query->execute(array($valeur));
        $results=$query->fetch();
    
        return $results;
    }
    /**
     * M supprime une occurence de la bdd
     * O la requete ou les messages d'erreurs
     * I  string du nom de colonne et string de sa valeur
     */
    protected function deleteBy($champ,$valeur){
        $sql='DELETE FROM '.$this->table.' WHERE '.$champ.' = ?';
        
        $query=$this->connexion->prepare($sql);
        $query->execute(array($valeur));

        return $query;
    }
    
    /*protected function __destruct(){
        $this->stmt =null;
    }*/

}
?>