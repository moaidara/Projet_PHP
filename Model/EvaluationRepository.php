<?php 

    require_once("DBRepository.php");

    class EvaluationRepository extends DBRepository{

        public function getEvaluationById(int $id)
        {
            $sql = "SELECT * FROM evalutions WHERE id = :id";

            try {
                $statement = $this->db->prepare($sql);
                $statement->bindParam(':id', $id, PDO::PARAM_INT);
                $statement->execute();
                return $statement->fetch(PDO::FETCH_ASSOC) ?: null;
            } catch (PDOException $error) {
                error_log("Erreur lors de la recupération de l'evaluation d'id $id " . $error->getMessage());
                throw $error;
            }
        }

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
                error_log("Erreur lors l'ajout de l'evaluation de $matiere " . $error->getMessage());
                throw $error;
            }
        }

    }

?>