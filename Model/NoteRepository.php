<?php 

    public class NoteRepository extends DBRepository{

        public function addNote($id_etudiant, $matiere, $note){
            $sql = "INSERT INTO notes (id_etudiant, matiere, note ) VALUES (:id_etudiant, :matiere, :note)";
            
            try{
                $statement = $this->db->prepare($sql);
                $statement = $this->db->excute(['id' => $id_etudiant, 'matiere' => $matiere, 'note' => $note ]);
                $lastInsertId = $this->db->lastInsertId();
                return $lastInsertId;
            }catch(PDOException $error){
                error_log("Erreur lors l'ajout de la note a $id_etudiant " . $error->getMessage());
                throw $error;
            }
        }

    }

?>