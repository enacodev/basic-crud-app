<?php
    class Employee
    {
        private $database_connection;
        function __construct() {
            $dbserver = "localhost";
            $dbname = "codev";
            $dbuser = "root";
            $dbpass = "";
          
            $database_connection = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

            if ($database_connection->connect_error) {
                die("Database connection error! " . $database_connection->connect_error);
            }
            else{
                $this->database_connection=$database_connection;  
            }
        }

        public function all(){
           $query = "SELECT * FROM employees ORDER BY id ASC ";
           $employees =  $this->database_connection->query($query);
           return $employees;  
        }

        public function get_employee($id){ 
            if(isset($id)){
                $student_id= mysqli_real_escape_string($this->database_connection,trim($id));
                $query = "SELECT * FROM employees WHERE id = $id";
                $employee = $this->database_connection->query($query);
                return $employee->fetch_assoc(); 
            }  
            return array();   
        }
        
    }
?>