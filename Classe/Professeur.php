<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Professeur
 *
 * @author btssio
 */
class Professeur {
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
    
    public static function getOne($login){
        
        $connexion = DbConnect::connect();
        $sql = "SELECT * FROM PROFESSEUR WHERE LOGINUTILISATEUR = 'test'";
        $query = $connexion->query($sql);
        $rs = $query->fetchAll();
        
        foreach($rs as $row){
            $professeur = new Professeur($row['IDPERSONNE'],$row['CIVILITE'],$row['NOM'],$row['PRENOM'],$row['NUM_TEL'],$row['ADRESSE_MAIL'],$row['NUM_TEL_MOBILE'],$row['LOGINUTILISATEUR'],$row['MDPUTILISATEUR'] );
        }
        
        return $professeur;
    }
}

?>
