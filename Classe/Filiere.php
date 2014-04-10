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
        $connexion = new DbConnect();
        $sql = "SELECT * FROM FILIERE WHERE NUMFILIERE = ".$numFiliere;
        $query = $connexion->execute($sql);
        $rs = $query->fectchAll();
        
        foreach($rs as $row){
            $filiere = new Filiere($row['NUMFILIERE'], $row['LIBELLEFILIERE']);
        }
        $connexion->close();
        return $filiere;
            
    }
    
    
}

?>
