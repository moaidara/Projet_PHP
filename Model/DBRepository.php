<?php
    class DBRepository{
        private $db;
        private $db_Name;
        private $db_User;
        private $password;
        private $host;
    }

    public function __construct(){
        $this->db_Name = 'mo_dev';
        $this->db_User = 'root';
        $this->password = "";
        $this->host = 'localhost';
        $this->getConnexion();
    }

    private function getConnexion(){
        $dsn = "mysql:host={$this->host};port=3307; dbname={$this->db_Name}";
        
        try{
            $this->db = new PDO($dsn, $this->db_User, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error){
            error_log('probleme de connexion a la base de donnee');
            throw $error;```php
class DBRepository{
    private $db;
    private $dbName;
    private $dbUser;
    private $password;
    private $host;

    public function __construct(){
        $this->dbName = 'mo_dev';
        $this->dbUser = 'root';
        $this->password = "";
        $this->host = 'localhost';
        $this->getConnexion();
    }

    private function getConnexion(){
        $dsn = "mysql:host={$this->host};port=3307;dbname={$this->dbName}";
        
        try{
            $this->db = new PDO($dsn, $this->dbUser, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error){
            error_log('Problem connecting to the database: ' . $error->getMessage());
            throw $error;
        }
    }

    public function getDB(){
        return $this->db;
    }
}
```
        }
    }

?>