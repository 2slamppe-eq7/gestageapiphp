<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Classe
 *
 * @author btssio
 */

use \DbConnect;
class Classe {
    
    
    private $numClasse;
    private $specialite;
    private $nomClasse;
    private $anneeScol;
    
    public function __construct($numClasse = null, $specialite = null, $nomClasse = null, $anneeScol = null) {
        $this->numClasse = $numClasse;
        $this->specialite = $specialite;
        $this->nomClasse = $nomClasse;
        $this->anneeScol = $anneeScol;
    }
    
    public static function getAll(){
        $connexion = DbConnect::connect();
        $sql = "SELECT * FROM CLASSE";
        $query = $connexion->query($sql);
        $rs = $query->fetchAll();
        $listClass = Array();
        foreach($rowset as $row){
            $specialite = Specialite::getOne($row['IDSPECIALITE']);
            $listClass[] = new Classe($row['NUMCLASSE'], $specialite, $row['NOMCLASSE']);
        }
        $connexion->close();
        return $listClass;
    }
    
    public static function getOne($numClasse){
        
        $connexion = DbConnect::connect();
        $sql = "SELECT * FROM CLASSE WHERE NUMCLASSE = ".$numClasse;
        $query = $connexion->query($sql);
        $rs = $query->fetchAll();
        
        foreach($rs as $row){
            $specialite = Specialite::getOne($row['IDSPECIALITE']);
            $classe = new Classe($row['NUMCLASSE'],$specialite,$row['NOMCLASSE']);
        }
        
        return $classe;
    }
    
    public static function getClassesByAnneeAndFiliere($annee, $numFiliere){
        $connexion = DbConnect::connect();
        $sql = "SELECT c.NUMCLASSE, c.IDSPECIALITE, c.NOMCLASSE, c.ANNEESCOL FROM CLASSE c INNER JOIN SPECIALITE s ON c.IDSPECIALITE = s.IDSPECIALITE WHERE s.NUMFILIERE = ".$numFiliere." AND c.ANNEESCOL = '".$annee."'";
        $query = $connexion->query($sql);
        $rs = $query->fetchAll();
        $listClasse = array();
        foreach($rs as $row){ 
            $specialite = Specialite::getOne($row['IDSPECIALITE']);
            
            $listClasse[] = new Classe($row['NUMCLASSE'],$specialite, $row['NOMCLASSE'], $row['ANNEESCOL']);
        }
        
        return $listClasse;
    }
    
    public function getNumClasse() {
        return $this->numClasse;
    }

    public function setNumClasse($numClasse) {
        $this->numClasse = $numClasse;
    }

    public function getSpecialite() {
        return $this->specialite;
    }

    public function setSpecialite($specialite) {
        $this->specialite = $specialite;
    }

    public function getNomClasse() {
        return $this->nomClasse;
    }

    public function setNomClasse($nomClasse) {
        $this->nomClasse = $nomClasse;
    }
    
    public function getAnneeScol() {
        return $this->anneeScol;
    }

    public function setAnneeScol($anneeScol) {
        $this->anneeScol = $anneeScol;
    }




}

?>
