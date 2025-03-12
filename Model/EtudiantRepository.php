<?php
    require_once("DBRepository.php");
    class EtudiantRepository extends DBRepository{
        public function addStudent($nom, $prenom, $adresse, $email, $matricule, $tel, $photo, $createdBy){
            $sql = "INSERT INTO etudiants (nom, prenom, adresse, email, matricule, tel, photo, created_at, createdBy)
                VALUES (:nom, :prenom, :adresse, :email, :matricule, :tel, :photo, NOW(), :createdBy)";
            
            try{
                $statement = $this->db->prepare($sql);
                $statement = $this->db->execute([
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'adresse' => $adresse,
                    'email' => $email,
                    'matricule' => $matricule,
                    'tel' => $tel,  
                    'photo' => $photo,
                    'createdBy' => $createdBy
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