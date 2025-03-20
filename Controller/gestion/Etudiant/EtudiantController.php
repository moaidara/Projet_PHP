<?php
    session_start();
    require_once("../../../Model/EtudiantRepository.php");

    class EtudiantController{
        private $etudiantRepository;

        public function __construct(){
            $this->etudiantRepository = new EtudiantRepository;
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
        public function addEtudiant() : void {
            //Verifier si la requete est de type POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Recuperation des informations du forms
                $nom=trim($_POST['nom'] ?? '');
                $prenom=trim($_POST['prenom'] ?? '');
                $adresse=trim($_POST['adresse'] ?? '');
                $photo=$_FILES['photo'] ?? null;
                $email=trim($_POST['email'] ?? '');
                $tel=trim($_POST['tel'] ?? '');
                $matricule=trim($_POST['matricule'] ?? '');
                $createdBy = trim($_POST['created_by'] ?? '');

                // var_dump("$nom");//aficher 
                // die;//stoped le code

                if(empty($nom)||empty($photo['name'])||empty($prenom)||empty($adresse)||empty($email)||empty($tel)||empty($matricule)){
                    $this->setErrorAndRedirect(
                        "Tous les Champs sont requis",
                        "Erreur d'ajout"
                    );
                }

                //Recupre l'image 
                $uploadDir="../../../public/img/";
                $photoName = uniqid().'_'.basename($photo['name']);//uniqid(). genere un id unique a chaque photo
                $uploadPath=$uploadDir. $photoName;

                if(!move_uploaded_file($photo['tmp_name'], $uploadPath)){

                    $this->setErrorAndRedirect(
                        "Erreur lors du telechargement de l'image",
                        "Erreur d'ajout"
                    );
                }
                try{
                    $lastInsertId = $this->etudiantRepository->addStudent($nom, $prenom, $adresse, $email, $matricule, $tel, $photo, $createdBy);
                    
                    if($lastInsertId){
                        $message = "etudiant ajouter avec succes";
                        $this->setSuccessAndRedirect(
                            $message,
                            "Ajout reussi"
                        );
 
                    }else{
                        $this->setErrorAndRedirect(
                            "Une erreur est survenue lors de l'ajout de l'etudiant",
                            "Erreur d'ajout"
                        );
                    }
                } catch (Exception $th){
                    die("Erreur");
                }

            }
        }

        // public function afficherStudent()
        // {
        //     // Récupérer les utilisateurs actifs
        //     $users = $this->etudiantRepository->listeStudent();
            
        //     // Envoyer les utilisateurs à la vue
        //     return $users;
        // }
    }
?>