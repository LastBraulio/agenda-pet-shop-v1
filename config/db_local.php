
<?php
    
    include("config_local.php");
    include("describe.php");

    class Conexiones_local
    {
            public $pdo;
            public function __construct() 
            {
                try 
                {
                    $this->pdo = new PDO ("mysql:host=".DB_HOST_LOCAL.";dbname=".DB_DATABASE_LOCAL."",DB_USER_LOCAL,DB_PASS_LOCAL);
                    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
    
                } 
                catch (PDOException $e)
                {
                    echo 'connection failed: '.$e->getMessage();
                }
            }
    }   
?>