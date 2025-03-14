<?php 

    require_once("DBRepository.php");

    class EvaluationRepository extends DBRepository{

        public function addEvaluation($matiere, $semestre, $type){
            $sql = "INSERT INTO evaluations (matiere, semestre, type ) VALUES (:matiere, :semestre, :type)";
            
            try{
                $statement = $this->db->prepare($sql);
                $statement->execute([
                    'matiere' => $matiere, 
                    'semestre' => $semestre, 
                    'type' => $type ]);
                $lastInsertId = $this->db->lastInsertId();
                return $lastInsertId;
            }catch(PDOException $error){
                error_log("Erreur lors l'ajout de la matiere $matiere " . $error->getMessage());
                throw $error;
            }
        }

    }

?>