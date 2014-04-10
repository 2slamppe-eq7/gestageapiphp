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
    
    public static function getAll(){
        $connexion = new DbConnect();
        $sql = "SELECT * FROM ANNEESCOL";
        $query = $connexion->prepare($sql);
        $rs = $query->execute();
        $rowset = $rs->fetchAll();
        $listAnnee= Array();
        foreach($rowset as $row){
            
            $listAnnee[] = new Classe($row['ANNEESCOL']);
        }
        $connexion->close();
        return $listClass;
    }
}

?>
