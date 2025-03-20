<?php
    require_once("DBRepository.php");

    class ListeRepository extends DBRepository{



        public function listeStudent(){
            $sql = "SELECT id, nom, prenom, email, adresse, matricule, tel  FROM etudiants WHERE etat = 1";
            
            try{
                $statement = $this->db->prepare($sql);
                $statement-> execute();
                $user = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $user;
            }catch(PDOException $error){
                error_log("erreur lors de la recuperation des informations");
                throw $error;
            }
        }

        public function edit($id, $nom, $prenom, $mail, $matricule, $tel, $adresse)
        {
            $sql = "UPDATE etudiants
                    SET nom = :nom, prenom = :prenom, matricule = :matricule, email = :email, 
                        tel = :tel, matricule = :matricule, adresse = :adresse
                    WHERE id = :id ";

            try {

                $statement = $this->db->prepare($sql);
                $statement->execute([
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'id' => $id,
                    'matricule' => $matricule,
                    'email' => $mail,
                    'tel' => $tel,
                    'adresse' => $adresse
                ]);

                return $statement->rowCount() >= 0; //true si $rowAffected > 0
            } catch (PDOException $error) {
                error_log("Erreur lors la modification des informations de $nom " . $error->getMessage());
                throw $error;
            }
        }

        //Permet de désactiver un service ou une réalisation
        public function desactivate($id)
        {
            $sql = "UPDATE etudiants SET etat = 0 WHERE id = :id";
            // var_dump($id);
            // die;
            try {
                $statement = $this->db->prepare($sql);
                $statement->execute(['id' => $id]);
                $rowAffected = $statement->rowCount();
                return $rowAffected > 0;
            } catch (PDOException $error) {
                error_log("Erreur lors de la désactivation de la réalisation/service d'id $id " . $error->getMessage());
                throw $error;
            }
        }
    }
?>