<?php

    class Connection
    {
        private $host = 'localhost';
        private $db_name = 'db_task';
        private $user = 'root';
        private $pass = '';

        public function connecte()
        {
            try 
            {
                $conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", "$this->user", "$this->pass");

                return $conn;
            } 
            catch (PDOException $e) 
            {
                echo '<p>' . $e->getMessage() . '</p>';
            }
        }
    }

?>