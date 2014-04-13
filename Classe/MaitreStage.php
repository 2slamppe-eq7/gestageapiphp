<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MaitreStage
 *
 * @author btssio
 */
class MaitreStage {
        private $idPersonne;
    private $civilite;
    private $nom;
    private $prenom;
    private $numTel;
    private $adresseMail;
    private $numTelMobile;
    private $login;
    private $mdp;
    
    public function __construct($idPersonne = null,$civilite = null,$nom = null,$prenom = null,$numTel = null,$adresseMail = null,$numTelMobile = null,$login = null,$mdp = null)
    {
        $this->idPersonne = $idPersonne;
        $this->civilite = $civilite;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->numTel = $numTel;
        $this->adresseMail = $adresseMail;
        $this->numTelMobile = $numTelMobile;
        $this->login = $login;
        $this->mdp = $mdp;
          
    }
    
    public static function getOne($idMaitreStage){
        
        $connexion = DbConnect::connect();
        $sql = "SELECT p1.IDPERSONNE,p1.CIVILITE,p1.NOM,p1.PRENOM,p1.NUM_TEL,p1.ADRESSE_MAIL,p1.NUM_TEL_MOBILE,p1.LOGINUTILISATEUR,p1.MDPUTILISATEUR FROM PERSONNE p1 INNER JOIN MAITRE_STAGE m ON p1.IDPERSONNE = m.IDPERSONNE WHERE p1.IDPERSONNE = '".$idMaitreStage."'";
        $query = $connexion->query($sql);
        $rs = $query->fetchAll();
        
        foreach($rs as $row){
            $maitreStage = new MaitreStage($row['IDPERSONNE'],$row['CIVILITE'],$row['NOM'],$row['PRENOM'],$row['NUM_TEL'],$row['ADRESSE_MAIL'],$row['NUM_TEL_MOBILE'],$row['LOGINUTILISATEUR'],$row['MDPUTILISATEUR'] );
        }
        
        return $maitreStage;
    }
    
    public function getIdPersonne() {
        return $this->idPersonne;
    }

    public function setIdPersonne($idPersonne) {
        $this->idPersonne = $idPersonne;
    }

    public function getCivilite() {
        return $this->civilite;
    }

    public function setCivilite($civilite) {
        $this->civilite = $civilite;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getNumTel() {
        return $this->numTel;
    }

    public function setNumTel($numTel) {
        $this->numTel = $numTel;
    }

    public function getAdresseMail() {
        return $this->adresseMail;
    }

    public function setAdresseMail($adresseMail) {
        $this->adresseMail = $adresseMail;
    }

    public function getNumTelMobile() {
        return $this->numTelMobile;
    }

    public function setNumTelMobile($numTelMobile) {
        $this->numTelMobile = $numTelMobile;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }


}

?>
