<?php
    require_once("../../Model/ListeRepository.php");

    class ListeController{
        private $listeRepository ;

        public function __construct(){
            $this->listeRepository = new ListeRepository();
        }

        public function afficherStudent(){
            try {
                // Récupération des étudiants depuis le repository
                $etudiants = $this->etudiantRepository->listeStudent();
        
                // Stocker les données dans la session
                $_SESSION['etudiants'] = $etudiants;
        
                // Redirection vers la vue
                header("Location: ../../View/pages/admin/liste/liste.php");
                exit();
            } catch (Exception $e) {
                die("Erreur lors de la récupération des étudiants : " . $e->getMessage());
            }
        }

        public function modifyStudent() : void{
            
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    //Recuperation des informations du forms
                    $nom=trim($_POST['nom'] ?? '');
                    $prenom=trim($_POST['prenom'] ?? '');
                    $adresse=trim($_POST['adresse'] ?? '');
                    $email=trim($_POST['email'] ?? '');
                    $tel=trim($_POST['tel'] ?? '');
                    $matricule=trim($_POST['matricule'] ?? '');
                    $id=trim($_POST['id'] ?? '');
    
                    // var_dump("$nom");//aficher 
                    // die;//stoped le code
    
                    if(empty($nom)||empty($prenom)||empty($adresse)||empty($email)||empty($tel)||empty($matricule)){
                        $this->setErrorAndRedirect(
                            "Tous les Champs sont requis",
                            "Erreur d'ajout"
                        );
                    }
                    try{
                        $lastInsertId = $this->listeRepository->edit($id, $nom, $prenom, $email, $matricule, $tel, $adresse);
                        
                        if($lastInsertId){
                            $message = "etudiant modifier avec succes";
                            $this->setSuccessAndRedirect(
                                $message,
                                "Modification reussi"
                            );
     
                        }else{
                            $this->setErrorAndRedirect(
                                "Une erreur est survenue lors de la modification de l'etudiant",
                                "Erreur d'ajout"
                            );
                        }
                    } catch (Exception $th){
                        die("Erreur");
                    }

            
                }
        }
        private function setSuccessAndRedirect($message, $title, $redirectUrl = 'admin')
        {
            $_SESSION["success"] = $message;
            header(
                "Location:$redirectUrl?success=1&message=" 
                . urlencode($message) . 
                "&title=" . urlencode($title) 
            );
            exit;
        }
        private function setErrorAndRedirect($message, $title, $redirectUrl = 'admin')
        {
            $_SESSION["error"] = $message;
            header(
                "Location:$redirectUrl?error=1&message=" 
                . urlencode($message) . 
                "&title=" . urlencode($title) 
            );
            exit;
        }

        public function suprimer() : void{
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id=trim($_POST['id'] ?? '');
                // var_dump("$id");
                // die;
                if(empty($id)){
                    $this->setErrorAndRedirect(
                        "Erreur id!",
                        "Erreur d'ajout"
                    );
                }

                try{
                    $index=$this->listeRepository->desactivate($id);
                    if($index){
                        $message = "etudiant supprimer avec succes";
                        $this->setSuccessAndRedirect(
                            $message,
                            "Suppression reussi"
                        );
                    }
                    else{
                        $this->setErrorAndRedirect(
                            "Une erreur est survenue lors de la suppression de l'etudiant",
                            "Erreur d'ajout"
                        );
                    }
                }catch (Exception $th){
                    die("Erreur");
                }
            }
        }
    }


?>