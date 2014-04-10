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
    private $specidalite;
    private $nomClasse;
    
    public function __construct($numClasse, $specialite, $nomClasse) {
        $this->numClasse = $numClasse;
        $this->specidalite = $specialite;
        $this->nomClasse = $nomClasse;
    }
    
    public static function getAll(){
        $connexion = new DbConnect();
        $sql = "SELECT * FROM CLASSE";
        $query = $connexion->prepare($sql);
        $rowset = $query->fetchAll();
        $listClass = Array();
        foreach($rowset as $row){
            $specialite = Specialite::getOne($row['IDSPECIALITE']);
            $listClass[] = new Classe($row['NUMCLASSE'], $specialite, $row['NOMCLASSE']);
        }
        $connexion->close();
        return $listClass;
    }
}

?>
