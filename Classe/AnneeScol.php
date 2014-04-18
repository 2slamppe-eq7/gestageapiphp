<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AnneeScol
 *
 * @author btssio
 */
class AnneeScol {
    private $anneeScol;
   
    public function __construct($anneeScol = null){
        $this->anneeScol = $anneeScol;
    }
    public function getAnneeScol() {
        return $this->anneeScol;
    }

    public function setAnneeScol($anneeScol) {
        $this->anneeScol = $anneeScol;
    }

        public static function getAll(){
        $connexion = DbConnect::connect();
        $sql = "SELECT * FROM ANNEESCOL ";
        $query = $connexion->query($sql);
        $rs = $query->fetchAll();
        foreach($rs as $row){            
            $listAnnee[] = new AnneeScol($row['ANNEESCOL']);
        }
        
        return $listAnnee;
    }
    
    public static function getOne($anneeScol){
        $connexion = DbConnect::connect();
        $sql = "SELECT * FROM ANNEESCOL WHERE ANNEESCOL = '".$anneeScol."'";
        $query = $connexion->query($sql);
        $rs = $query->fetchAll();
        foreach($rs as $row){            
            $anneeScol = new AnneeScol($row['ANNEESCOL']);
        }
        
        return $anneeScol;
    }
    

}

?>
