<?php
    require_once("DBRepository.php");

    class EtudiantRepository extends DBRepository{

        public function getStudentById(int $id)
        {
            $sql = "SELECT * FROM etudiants WHERE id = :id";

            try {
                $statement = $this->db->prepare($sql);
                $statement->bindParam(':id', $id, PDO::PARAM_INT);
                $statement->execute();
                return $statement->fetch(PDO::FETCH_ASSOC) ?: null;
            } catch (PDOException $error) {
                error_log("Erreur lors de la recupération de la réalisation/service d'id $id " . $error->getMessage());
                throw $error;
            }
        }

        public function addStudent($nom, $prenom, $adresse, $email, $matricule, $tel, $photo, $createdBy){
            $sql = "INSERT INTO etudiants (nom, prenom, adresse, email, matricule, tel, photo, created_at, created_by)
                VALUES (:nom, :prenom, :adresse, :email, :matricule, :tel, :photo, NOW(), :created_by)";
            
            try{
                $statement = $this->db->prepare($sql);
                $statement->execute([
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'adresse' => $adresse,
                    'email' => $email,
                    'matricule' => $matricule,
                    'tel' => $tel,  
                    'photo' => $photo,
                    'created_by' => $createdBy
                ]);

                $lastInsertId = $this->db->lastInsertid();
                return $lastInsertId ?: null;
                
            }catch(PDOException $error){
                error_log("Erreur lors l'ajout de $prenom $nom " . $error->getMessage());
                throw $error;
            }
        }
    }
?>