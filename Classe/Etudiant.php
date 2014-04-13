<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Etudiant
 *
 * @author btssio
 */
class Etudiant {
    private $idPersonne;
    private $classe;
    private $civilite;
    private $nom;
    private $prenom;
    private $numTel;
    private $adresseMail;
    private $numTelMobile;
    private $login;
    private $mdp;
    
    
    public function __construct($idPersonne = null,$classe = null,$civilite = null,$nom = null,$prenom = null,$numTel = null,$adresseMail = null,$numTelMobile = null,$login = null,$mdp = null)
    {
        $this->idPersonne = $idPersonne;
        $this->classe = $classe;
        $this->civilite = $civilite;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->numTel = $numTel;
        $this->adresseMail = $adresseMail;
        $this->numTelMobile = $numTelMobile;
        $this->login = $login;
        $this->mdp = $mdp;
          
    }
    
    public static function getOne($idEtudiant){
        
        $connexion = DbConnect::connect();
        $sql = "SELECT p1.IDPERSONNE,e.NUMCLASSE,p1.CIVILITE,p1.NOM,p1.PRENOM,p1.NUM_TEL,p1.ADRESSE_MAIL,p1.NUM_TEL_MOBILE,p1.LOGINUTILISATEUR,p1.MDPUTILISATEUR FROM PERSONNE p1 INNER JOIN ETUDIANT e ON e.IDPERSONNE = p1.IDPERSONNE WHERE e.IDPERSONNE= '".$idEtudiant."'";
        $query = $connexion->query($sql);
        $rs = $query->fetchAll();
        
        foreach($rs as $row){
            $classe = Classe::getOne($row['NUMCLASSE']);
            $etudiant = new Etudiant($row['IDPERSONNE'],$classe,$row['CIVILITE'],$row['NOM'],$row['PRENOM'],$row['NUM_TEL'],$row['ADRESSE_MAIL'],$row['NUM_TEL_MOBILE'],$row['LOGINUTILISATEUR'],$row['MDPUTILISATEUR'] );
        }
        
        return $etudiant;
    }
    
    public function getIdPersonne() {
        return $this->idPersonne;
    }

    public function setIdPersonne($idPersonne) {
        $this->idPersonne = $idPersonne;
    }

    public function getClasse() {
        return $this->classe;
    }

    public function setClasse($classe) {
        $this->classe = $classe;
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
