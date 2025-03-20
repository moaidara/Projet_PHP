<?php
    require_once('DBRepository.php');

    class UserRepository extends DBRepository{
        public function login($user, $password){
            $sql = "SELECT * FROM users WHERE etat = 1 AND email = :email";
            
            try{
                $statement = $this->db->prepare($sql);
                $statement-> execute(['email' => $email]);
                $user = $statement->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $error){
                error_log("erreur lors de la connexion de l'utilisateur");
                throw $error;
            }
        }
        
        

    }
?>