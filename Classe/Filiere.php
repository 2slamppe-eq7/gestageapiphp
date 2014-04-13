<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Filiere
 *
 * @author btssio
 */
use \DbConnect;
class Filiere {
    
    private $numFiliere;
    private $LibelleFiliere;
    
    public function __construct($numFiliere = null, $libelleFiliere = null){
        $this->numFiliere = $numFiliere;
        $this->LibelleFiliere = $libelleFiliere;
                
    }
    
    public static function getOne($numFiliere){
        $connexion = DbConnect::connect();
        $sql = "SELECT * FROM FILIERE WHERE NUMFILIERE = ".$numFiliere;
        $query = $connexion->query($sql);
        $rs = $query->fetchAll();
        
        foreach($rs as $row){
            $filiere = new Filiere($row['NUMFILIERE'], $row['LIBELLEFILIERE']);
        }
        
        return $filiere;
            
    }
    
    
            public static function getAll(){
        $connexion = DbConnect::connect();
        $sql = "SELECT * FROM FILIERE";
        $query = $connexion->query($sql);
        $rs = $query->fetchAll();
        foreach($rs as $row){            
            $listFiliere[] = new Filiere($row['NUMFILIERE'], $row['LIBELLEFILIERE']);
        }
        
        return $listFiliere;
    }
    public function getNumFiliere() {
        return $this->numFiliere;
    }

    public function setNumFiliere($numFiliere) {
        $this->numFiliere = $numFiliere;
    }

    public function getLibelleFiliere() {
        return $this->LibelleFiliere;
    }

    public function setLibelleFiliere($LibelleFiliere) {
        $this->LibelleFiliere = $LibelleFiliere;
    }


    
}

?>
