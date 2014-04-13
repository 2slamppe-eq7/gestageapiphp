<?php
    include './include.php';
    if(isset($_POST['fonc'])&&isset($_POST['tag'])){
        $tag = $_POST['tag']; 
        $fonc = $_POST['fonc'];
       switch($tag){
            case 'personne':
        switch($fonc){
            case 'connexion':
                if(isset($_POST['mdp'])&& isset($_POST['login'])){
                    $response = array();
                    $personne = Professeur::getOne($_POST['login']);
                    
                    if($personne){
                        if($personne->getMdp() == $_POST['mdp']){
                        header('Content-Type: application/json'); 
                        $response["personne"] = (array)$personne;
                        $response["success"]= 1;
                        $json = json_encode($response);
                        $json = str_replace("\\u0000","", $json);
                        $json = str_replace("Professeur", "",$json);
                        }else{
                            $response["success"] = 2;
                            $json = json_encode($response);
                        }
                        echo $json;
                        
                    }else{
                        $response = array();
                        $response["success"] = 0;
                        echo json_encode($response);
                    }
                }
                break;
        }
        break;
            case 'annee':
                switch($fonc){
                case 'getAll':
                    $response = array();
                    $lesAnnees = array();
                    $response["annees"] = array();
                    $lesAnnees = AnneeScol::getAll();
                    foreach($lesAnnees as $annee){
                        $anneeScol = array();
                        $anneeScol["annee"] = $annee->getAnneeScol();
                        array_push($response["annees"],$anneeScol);
                    }
                    $json = json_encode($response);
                    echo $json;
                     
                    break;
                
                    
                }
                break;
            case 'filiere':
                switch ($fonc){
                case 'getAll':
                    $response = array();
                    $lesFilieres = array();
                    $response["filieres"] = array();
                    $lesFilieres = Filiere::getAll();
                    foreach($lesFilieres as $filiere){
                        $laFiliere = array();
                        $laFiliere["numFiliere"] = $filiere->getNumFiliere();
                        $laFiliere["libelleFiliere"] = $filiere->getLibelleFiliere();
                        array_push($response["filieres"],$laFiliere);
                    }
                    $json = json_encode($response);
                    echo $json;
                    break;
                }                
                break;
            case 'classe':
                switch($fonc){
                    case 'getSelected':
                        $response = array();
                        $lesClasses = array();
                        $response["classes"] = array();
                        $lesClasses = Classe::getClassesByAnneeAndFiliere($_POST['annee'], $_POST['filiere']);
                        foreach($lesClasses as $classe){
                            $uneClasse = array();
                            $uneClasse["numClasse"] = $classe->getNumClasse();
                            $uneClasse["specialite"] = array();
                            $uneClasse["specialite"]["idSpecialite"] = $classe->getSpecialite()->getIdSpecialite();
                            $uneClasse["specialite"]["filiere"] = array();
                            $uneClasse["specialite"]["filiere"]["numFiliere"] = $classe->getSpecialite()->getFiliere()->getNumFiliere();
                            $uneClasse["specialite"]["filiere"]["libelleFiliere"] = $classe->getSpecialite()->getFiliere()->getLibelleFiliere();
                            $uneClasse["specialite"]["libelleLongSpecialite"] = $classe->getSpecialite()->getLibelleSpecialite();
                            $uneClasse["nomClasse"] = $classe->getNomClasse();
                            $uneClasse["anneeScol"] = $classe->getAnneeScol();
                            
                            array_push($response["classes"],$uneClasse);
                        }
                        $json = json_encode($response);
                        echo $json;
                        break;
                    }
                break;
            case 'stage':
                switch($fonc){
                    case 'getSelected':
                        $response = array();
                        $lesStages = array();
                        $response["stages"] = array();
                        $lesStages = Stage::getStageByClasse($_POST['classe']);
                        foreach($lesStages as $stage){
                            $unStage = array();
                            $unStage['numStage'] = $stage->getNumStage();
                            $unStage['organisation'] = (array)$stage->getOrganisation();                            
                            $unStage['anneeScol'] = (array)$stage->getAnneeScol();
                            $unStage['etudiant'] = (array)$stage->getEtudiant();
                            $unStage['etudiant']['classe'] = (array)$stage->getEtudiant()->getClasse();
                            $unStage['etudiant']['classe']['specialite'] = (array)$stage->getEtudiant()->getClasse()->getSpecialite();
                            $unstage['etudiant']['classe']['specialite']['filiere'] = (array)$stage->getEtudiant()->getClasse()->getSpecialite()->getFiliere();
                            $unStage['maitreStage'] = (array)$stage->getMaitreStage();
                            $unStage['dateDebut'] = $stage->getDateDebut();
                            $unStage['dateFin'] = $stage->getDateFin();
                            $unStage['dateVisite'] = $stage->getDateVisite();
                            $unStage['ville'] = $stage->getVille();
                            $unStage['divers'] = $stage->getDivers();
                            $unStage['bilanTravaux'] = $stage->getBilanTravaux();
                            $unStage['ressourcesOutils'] = $stage->getRessourcesOutils();
                            $unStage['commentaires'] = $stage->getCommentaires();
                            $unStage['participationCCF'] = $stage->getParticipationCCF();
                            
                            array_push($response["stages"],$unStage);
                        }
                        $json = json_encode($response);                        
                        $json = str_replace("\\u0000","", $json);
                        $json = str_replace("Organisation", "",$json);
                        $json = str_replace("Etudiant", "",$json);
                        $json = str_replace("MaitreStage", "",$json);
                        echo $json;
                }
                break;
                   
       }
       
                        
                    
            
        
    }else{
        echo "erreur";
    }
?>
