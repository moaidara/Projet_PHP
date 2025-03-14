<?php 
    session_start();
    require_once("../../../Model/EvaluationRepository.php");

    class EvaluationController{
        private $evaluationRepository;

        public function __construct(){
            $this->evaluationRepository = new EvaluationRepository;
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

        public function addEvalu() : void {
            //Verifier si la requete est de type POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Recuperation des informations du forms
                $matiere=trim($_POST['matiere'] ?? '');
                $type=trim($_POST['type'] ?? '');
                $semestre=trim($_POST['semestre'] ?? '');
                // var_dump("$nom");//aficher 
                // die;//stoped le code

                if(empty($matiere)||empty($type)||empty($semestre)){
                    $this->setErrorAndRedirect(
                        "Tous les Champs sont requis",
                        "Erreur d'ajout"
                    );
                }

                try{
                    $lastInsertId = $this->evaluationRepository->addEvaluation($matiere, $semestre, $type);
                    
                    if($lastInsertId){
                        $message = "evaluation ajouter avec succes";
                        $this->setSuccessAndRedirect(
                            $message,
                            "Ajout reussi"
                        );
 
                    }else{
                        $this->setErrorAndRedirect(
                            "Une erreur est survenue lors de l'ajout de l'evaluation",
                            "Erreur d'ajout"
                        );
                    }
                } catch (Exception $th){
                    die("Erreur");
                }

            }
        }

        
    }
?>