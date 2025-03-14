<?php
    session_start();
    require_once("../../../Model/NoteRepository.php");
    require_once("../../../Model/EtudiantRepository.php");
    require_once("../../../Model/EvaluationRepository.php");

    class NoteController{
        private $noteRepository;
        private $etudiantRepository;
        private $evaluationRepository;

        public function __construct(){
            $this->noteRepository = new NoteRepository();
            $this->etudiantRepository = new EtudiantRepository();
            $this->evaluationRepository = new EvaluationRepository();
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

        public function add_note() : void {
            //Verifier si la requete est de type POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Recuperation des informations du forms
                $id_etudiant=trim($_POST['id_etudiant'] ?? '');
                $id_evaluation=trim($_POST['id_evaluation'] ?? '');
                $note=trim($_POST['note'] ?? '');
                // var_dump("$nom");//aficher 
                // die;//stoped le code

                if(empty($id_etudiant)||empty($id_evaluation)||empty($note)){
                    $this->setErrorAndRedirect(
                        "Tous les Champs sont requis",
                        "Erreur d'ajout"
                    );
                }

                try{
                    if($this->etudiantRepository->getStudentById($id_etudiant) && $this->evaluationRepository->getEvaluationById($id_evaluation)){
                        $lastInsertId = $this->noteRepository->addNote($id_etudiant, $id_evaluation, $note);
                    
                        if($lastInsertId){
                            $message = "note ajouter avec succes";
                            $this->setSuccessAndRedirect(
                                $message,
                                "Ajout reussi"
                            );
    
                        }else{
                            $this->setErrorAndRedirect(
                                "Une erreur est survenue lors de l'ajout de la note",
                                "Erreur d'ajout"
                            );
                        }
                    }else{
                        $this->setErrorAndRedirect(
                            "veiller verifier l'id de l'etudiant ou l'id de l'evaluation",
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