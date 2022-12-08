<?php 
    class Conexion {

        private $host;
        private $user;
        private $password;
        private $db;
        private $charset;
        protected $conex;

        function __construct()
        {
            $this->host ='localhost';
            $this->user = 'root';
            $this->password='operation654321';
            $this->db = 'calculadora';
            $this->charset = 'utf8';
        }

        function conection(){
			try{
				$connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
				$options = [
						PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
						PDO::ATTR_EMULATE_PREPARES   => false,
				];
				
				$pdo = new PDO($connection, $this->user, $this->password, $options);

				return $pdo;
			}catch(PDOException $e){
				print_r('Error connection: ' . $e->getMessage());
			}
		}
    }

?>