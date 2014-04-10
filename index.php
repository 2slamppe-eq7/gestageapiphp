<?php
    require_once './Classe/AnneeScol.php';
    require_once './Classe/Classe.php';
    require_once './Classe/DBConnect.class.php';
    require_once './Classe/Filiere.php';
    require_once './Classe/Professeur.php';
    require_once './Classe/Specialite.php';
    require_once './Classe/config.php';
    if(isset($_POST['tag'])){
        $tag = $_POST['tag'];  
        
        switch($tag){
            case 'connexion':
                if(isset($_POST['mdp'])&& isset($_POST['login'])){
                    
                    $personne = Professeur::getOne($_POST['login']);
                    if($personne){
                        header('Content-Type: application/json');
                        $json = json_encode((array)$personne);
                        echo $json;
                    }
                }
        }
    }
?>
