
<?php
 
    include("config.php");
    include("describe.php");


    class Conexiones
    {
            public $pdo;
            public function __construct() 
            {
                try 
                {
                    $this->pdo = new PDO ("mysql:host=".DB_HOST.";dbname=".DB_DATABASE."",DB_USER,DB_PASS);
                    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
    
                } 
                catch (PDOException $e)
                {
                    echo 'connection failed: '.$e->getMessage();
                }
            }
    }   
?>