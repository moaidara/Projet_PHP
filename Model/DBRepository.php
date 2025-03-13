<?php
    class DBRepository{
        protected $db;
        private $db_Name;
        private $db_User;
        private $password;
        private $host;
        
        
        public function __construct(){
            $this->db_Name = getenv("DB_NAME") ?: "mo_dev";
            $this->db_User = getenv("DB_USER") ?:"root";
            $this->password = getenv("DB_PASSWORD") ?: "";
            $this->host = getenv("DB_HOST") ?: "localhost";
            $this->getConnexion();
        }
    
        private function getConnexion(){
            $dsn = "mysql:host={$this->host};port=3307; dbname={$this->db_Name}";
            
            try{
                $this->db = new PDO($dsn, $this->db_User, $this->password);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $error){
                error_log('probleme de connexion a la base de donnee');
                throw $error;
            }
        }
    }

    

?>