<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Stage
 *
 * @author btssio
 */
class Stage {
    
    private $numStage;
    private $organisation;
    private $anneeScol;
    private $etudiant;
    private $maitreStage;
    private $dateDebut;
    private $dateFin;
    private $dateVisite;
    private $ville;
    private $divers;
    private $bilanTravaux;
    private $ressourcesOutils;
    private $commentaires;
    private $participationCCF;
    
    function __construct($numStage = null, $organisation = null, $anneeScol = null, $etudiant = null, $maitreStage = null, $dateDebut = null, $dateFin = null, $dateVisite = null, $ville = null, $divers = null, $bilanTravaux = null, $ressourcesOutils = null, $commentaires = null, $participationCCF = null) {
        $this->numStage = $numStage;
        $this->organisation = $organisation;
        $this->anneeScol = $anneeScol;
        $this->etudiant = $etudiant;
        $this->maitreStage = $maitreStage;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->dateVisite = $dateVisite;
        $this->ville = $ville;
        $this->divers = $divers;
        $this->bilanTravaux = $bilanTravaux;
        $this->ressourcesOutils = $ressourcesOutils;
        $this->commentaires = $commentaires;
        $this->participationCCF = $participationCCF;
    }
    
    
       public static function getStageByClasse($numClasse){
        $connexion = DbConnect::connect();
        $sql = "SELECT s.NUM_STAGE, s.IDORGANISATION, s.ANNEESCOL, s.IDPERSONNE, s.IDPERSONNE_1, s.DATEDEBUT, s.DATEFIN, s.DATEVISITESTAGE, s.VILLE, ";
        $sql.= "s.DIVERS, s.BILANTRAVAUX, s.RESSOURCESOUTILS, s.COMMENTAIRES, s.PARTICIPATIONCCF FROM STAGE s INNER JOIN ETUDIANT e ON e.IDPERSONNE = s.IDPERSONNE WHERE e.NUMCLASSE = ".$numClasse;
        $query = $connexion->query($sql);
        $rs = $query->fetchAll();
        $listStage = array();
        foreach($rs as $row){ 
            $organisation = Organisation::getOne($row['IDORGANISATION']);
            $anneeScol = new AnneeScol($row['ANNEESCOL']);
            $etudiant = Etudiant::getOne($row['IDPERSONNE']);
            $maitreStage = MaitreStage::getOne($row['IDPERSONNE_1']);
            
            $listStage[] = new Stage($row['NUM_STAGE'],$organisation,$anneeScol,$etudiant,$maitreStage,$row['DATEDEBUT'],$row['DATEFIN'],$row['DATEVISITESTAGE'],$row['VILLE'],$row['DIVERS'],$row['BILANTRAVAUX'],$row['RESSOURCESOUTILS'],$row['COMMENTAIRES'],$row['PARTICIPATIONCCF']);
        }
        
        return $listStage;
    }
    
    
    public function getNumStage() {
        return $this->numStage;
    }

    public function setNumStage($numStage) {
        $this->numStage = $numStage;
    }

    public function getOrganisation() {
        return $this->organisation;
    }

    public function setOrganisation($organisation) {
        $this->organisation = $organisation;
    }

    public function getAnneeScol() {
        return $this->anneeScol;
    }

    public function setAnneeScol($anneeScol) {
        $this->anneeScol = $anneeScol;
    }

    public function getEtudiant() {
        return $this->etudiant;
    }

    public function setEtudiant($etudiant) {
        $this->etudiant = $etudiant;
    }

    public function getMaitreStage() {
        return $this->maitreStage;
    }

    public function setMaitreStage($maitreStage) {
        $this->maitreStage = $maitreStage;
    }

    public function getDateDebut() {
        return $this->dateDebut;
    }

    public function setDateDebut($dateDebut) {
        $this->dateDebut = $dateDebut;
    }

    public function getDateFin() {
        return $this->dateFin;
    }

    public function setDateFin($dateFin) {
        $this->dateFin = $dateFin;
    }

    public function getDateVisite() {
        return $this->dateVisite;
    }

    public function setDateVisite($dateVisite) {
        $this->dateVisite = $dateVisite;
    }

    public function getVille() {
        return $this->ville;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function getDivers() {
        return $this->divers;
    }

    public function setDivers($divers) {
        $this->divers = $divers;
    }

    public function getBilanTravaux() {
        return $this->bilanTravaux;
    }

    public function setBilanTravaux($bilanTravaux) {
        $this->bilanTravaux = $bilanTravaux;
    }

    public function getRessourcesOutils() {
        return $this->ressourcesOutils;
    }

    public function setRessourcesOutils($ressourcesOutils) {
        $this->ressourcesOutils = $ressourcesOutils;
    }

    public function getCommentaires() {
        return $this->commentaires;
    }

    public function setCommentaires($commentaires) {
        $this->commentaires = $commentaires;
    }

    public function getParticipationCCF() {
        return $this->participationCCF;
    }

    public function setParticipationCCF($participationCCF) {
        $this->participationCCF = $participationCCF;
    }


    
}

?>
