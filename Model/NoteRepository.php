<?php 

    require_once("DBRepository.php");
    
    class NoteRepository extends DBRepository{

        
        public function addNote($id_etudiant, $id_evaluations, $note){
            $sql = "INSERT INTO notes (id_etudiant, id_evaluation, note ) VALUES (:id_etudiant, :id_evaluation, :note)";
            
            try{
                $statement = $this->db->prepare($sql);
                $statement->execute([
                    'id_etudiant' => $id_etudiant, 
                    'id_evaluation' => $id_evaluations, 
                    'note' => $note ]);
                $lastInsertId = $this->db->lastInsertId();
                return $lastInsertId;
            }catch(PDOException $error){
                error_log("Erreur lors de l'ajout de la note a $id_etudiant " . $error->getMessage());
                throw $error;
            }
        }

    }

?>