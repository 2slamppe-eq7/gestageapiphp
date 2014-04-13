<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Organisation
 *
 * @author btssio
 */
class Organisation {
    
    private $idOrganisation;
    private $nom;
    private $ville;
    private $adresse;
    private $cp;
    private $tel;
    private $fax;
    private $formeJuridique;
    private $activite;
    
    function __construct($idOrganisation = null, $nom = null, $ville = null, $adresse = null, $cp = null, $tel = null, $fax = null, $formeJuridique = null, $activite = null) {
        $this->idOrganisation = $idOrganisation;
        $this->nom = $nom;
        $this->ville = $ville;
        $this->adresse = $adresse;
        $this->cp = $cp;
        $this->tel = $tel;
        $this->fax = $fax;
        $this->formeJuridique = $formeJuridique;
        $this->activite = $activite;
    }
    
    public static function getOne($idOrganisation){
        
        $connexion = DbConnect::connect();
        $sql = "SELECT * FROM ORGANISATION WHERE IDORGANISATION = ".$idOrganisation;
        $query = $connexion->query($sql);
        $rs = $query->fetchAll();
        
        foreach($rs as $row){
            $organisation = new Organisation($row["IDORGANISATION"], $row["NOM_ORGANISATION"], $row["VILLE_ORGANISATION"], $row["ADRESSE_ORGANISATION"], $row["CP_ORGANISATION"], $row["TEL_ORGANISATION"], $row["FAX_ORGANISATION"], $row["FORMEJURIDIQUE"], $row["ACTIVITE"] );
        }
        
        return $organisation;
    }

    public function getIdOrganisation() {
        return $this->idOrganisation;
    }

    public function setIdOrganisation($idOrganisation) {
        $this->idOrganisation = $idOrganisation;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getVille() {
        return $this->ville;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function getCp() {
        return $this->cp;
    }

    public function setCp($cp) {
        $this->cp = $cp;
    }

    public function getTel() {
        return $this->tel;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function getFax() {
        return $this->fax;
    }

    public function setFax($fax) {
        $this->fax = $fax;
    }

    public function getFormeJuridique() {
        return $this->formeJuridique;
    }

    public function setFormeJuridique($formeJuridique) {
        $this->formeJuridique = $formeJuridique;
    }

    public function getActivite() {
        return $this->activite;
    }

    public function setActivite($activite) {
        $this->activite = $activite;
    }


}

?>
