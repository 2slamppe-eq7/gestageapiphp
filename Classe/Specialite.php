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
        $connexion = DbConnect::connect();
        $sql = "SELECT * FROM SPECIALITE WHERE IDSPECIALITE = ".$idSpecialite;
        $query = $connexion->query($sql);
        $rs = $query->fetchAll();
        
        foreach($rs as $row){
            
            $filiere = Filiere::getOne($row['NUMFILIERE']);
            
            $specialite = new Specialite($row['IDSPECIALITE'],$filiere,$row['LIBELLELONGSPECIALITE']);
                        
        }
        
        return $specialite;
            
    }
    
    public function getIdSpecialite() {
        return $this->idSpecialite;
    }

    public function setIdSpecialite($idSpecialite) {
        $this->idSpecialite = $idSpecialite;
    }

    public function getFiliere() {
        return $this->filiere;
    }

    public function setFiliere($filiere) {
        $this->filiere = $filiere;
    }

    public function getLibelleSpecialite() {
        return $this->libelleSpecialite;
    }

    public function setLibelleSpecialite($libelleSpecialite) {
        $this->libelleSpecialite = $libelleSpecialite;
    }


}

?>
