<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Specialite
 *
 * @author btssio
 */
use \DbConnect;
class Specialite {
    private $idSpecialite;
    private $filiere;
    private $libelleSpecialite;
    
    public function __construct($idSpecialite = null, $filiere = null, $libelleSpecialite = null){
        $this->idSpecialite = $idSpecialite;
        $this->filiere = $filiere;
        $this->libelleSpecialite = $libelleSpecialite;
                
    }
    
    public static function getOne($idSpecialite){
        $connexion = new DbConnect();
        $sql = "SELECT * FROM SPECIALITE WHERE IDSPECIALITE = ".$idSpecialite;
        $query = $connexion->execute($sql);
        $rs = $query->fectchAll();
        
        foreach($rs as $row){
            
            $filiere = Filiere::getOne($row['NUMFILIERE']);
            
            $specialite = new Specialite($row['IDSPECIALITE'],$filiere,$row['LIBELLELONGSPECIALITE']);
                        
        }
        $connexion->close();
        return $specialite;
            
    }
}

?>
