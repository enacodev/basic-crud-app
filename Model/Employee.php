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

        //get all employees
        public function all(){
           $query = "SELECT * 
                     FROM `employees`";
           $employees =  $this->database_connection->query($query);
           return $employees;  
        }

        //get specific employee
        public function get($id){ 
            if(isset($id)){
                $id= mysqli_real_escape_string($this->database_connection,trim($id));
                $query = "SELECT * 
                          FROM `employees` 
                          WHERE `id` = $id";
                $employee = $this->database_connection->query($query);
                return $employee->fetch_assoc(); 
            }    
        }


        //update specific employee specified in the passed parameters
        public function update($parameters){ 
            $is_submitted = isset($parameters["is_submitted"]) ? $parameters["is_submitted"] : false;

            //check if submitted and an employee is being edited
            if( $is_submitted && isset($parameters['id']) ){
                $id = mysqli_real_escape_string($this->database_connection,trim($parameters["id"]));
                $firstname = mysqli_real_escape_string($this->database_connection,trim($parameters["firstname"]));
                $lastname = mysqli_real_escape_string($this->database_connection,trim($parameters["lastname"]));
                $position = mysqli_real_escape_string($this->database_connection,trim($parameters["position"]));
                $address=  mysqli_real_escape_string($this->database_connection,trim($parameters["address"]));
                $query = "UPDATE `employees` 
                          SET `firstname`='$firstname', `lastname`='$lastname', `position`='$position', `address`='$address'
                          WHERE `id` = $id";
                $employee = $this->database_connection->query($query); 
                unset($parameters['is_submitted']); 
            }  
        }

        //delete employee
        public function delete($id){
           if(isset($id)){
                $id= mysqli_real_escape_string($this->database_connection,trim($id));

                $query="DELETE 
                        FROM `employees` 
                        WHERE `id` =$id";

                $employee = $this->database_connection->query($query); 
            
                if($employee){
                   return true;
                }
            }
        }

        //add employee
        public function add($parameters){
            $is_submitted = isset($parameters["is_submitted"]) ? $parameters["is_submitted"] : false;
            if($is_submitted){
                $firstname = mysqli_real_escape_string($this->database_connection,trim($parameters["firstname"]));
                $lastname = mysqli_real_escape_string($this->database_connection,trim($parameters["lastname"]));
                $position = mysqli_real_escape_string($this->database_connection,trim($parameters["position"]));
                $address=  mysqli_real_escape_string($this->database_connection,trim($parameters["address"]));

                $query="INSERT INTO `employees` (`firstname`, `lastname`, `position`, `address`) 
                        VALUES ('$firstname', '$lastname', '$position', '$address')";
                        
                $employee = $this->database_connection->query($query); 
                unset($parameters['is_submitted']); 
            }                
        }

        function __destruct() {
            mysqli_close($this->database_connection);  
        }

        //search employee
        public function search($keyword){
            $keyword = mysqli_real_escape_string($this->database_connection,trim($keyword));
            $query = "SELECT * 
                      FROM `employees`
                      WHERE `firstname`
                      LIKE '%".$keyword."%'
                      OR lastname like '%".$keyword."%' 
                      OR address like '%".$keyword."%' 
                      OR position like '%".$keyword."%' 
                      ";
            $employees =  $this->database_connection->query($query);
            return $employees;  
        }

        
    }
?>