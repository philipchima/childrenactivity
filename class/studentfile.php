<?php
    class Student{
        // Connection
        private $conn;
        // Table
        private $db_table = "studentdbase";
        // Columns
        //public $id;
        public $last_name;
        public $first_name;
        public $username;
        public $password;
        public $school;
        public $class_from;
        public $character_load;
        public $pref_level;
        public $status;
        public $date_created;
        public $student_code;
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getStudent(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        public function createStudent(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        last_name = :last_name, 
                        first_name = :first_name,
                        username = :username, 
                        password = :password, 
                        school = :school,
                        class_from =:class_from, 
                        character_load = :character_load,
                        pref_level = :pref_level,
                        status = :status,
                        date_created = :date_created,
                        student_code = :student_code";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->last_name=htmlspecialchars(strip_tags($this->last_name));
            $this->first_name=htmlspecialchars(strip_tags($this->first_name));
            $this->username=htmlspecialchars(strip_tags($this->username));
            $this->password=htmlspecialchars(strip_tags($this->password));
            $this->school=htmlspecialchars(strip_tags($this->school));
            $this->class_from=htmlspecialchars(strip_tags($this->class_from));
            $this->character_load=htmlspecialchars(strip_tags($this->character_load));
            $this->pref_level=htmlspecialchars(strip_tags($this->pref_level));
            $this->status=htmlspecialchars(strip_tags($this->status));
            $this->date_created=htmlspecialchars(strip_tags($this->date_created));
            $this->student_code=htmlspecialchars(strip_tags($this->student_code));
        
            // bind data


             $stmt->bindParam(":last_name", $this->last_name);
            $stmt->bindParam(":first_name", $this->first_name);
            $stmt->bindParam(":username", $this->username);
            $stmt->bindParam(":password", $this->password);
            $stmt->bindParam(":school", $this->school);

            $stmt->bindParam(":class_from", $this->class_from);
            $stmt->bindParam(":character_load", $this->character_load);
            $stmt->bindParam(":pref_level", $this->pref_level);
            $stmt->bindParam(":status", $this->status);
            $stmt->bindParam(":date_created", $this->date_created);
            $stmt->bindParam(":student_code", $this->student_code);


            //$stmt->bindParam(":name", $this->name);
            //$stmt->bindParam(":email", $this->email);
            //$stmt->bindParam(":age", $this->age);
            //$stmt->bindParam(":designation", $this->designation);
            //$stmt->bindParam(":created", $this->created);


        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // READ single
        public function getSingleEmployee(){
            $sqlQuery = "SELECT
                        id, 
                        name, 
                        email, 
                        age, 
                        designation, 
                        created
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->name = $dataRow['name'];
            $this->email = $dataRow['email'];
            $this->age = $dataRow['age'];
            $this->designation = $dataRow['designation'];
            $this->created = $dataRow['created'];
        }        
        // UPDATE
        public function updateEmployee(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        name = :name, 
                        email = :email, 
                        age = :age, 
                        designation = :designation, 
                        created = :created
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->age=htmlspecialchars(strip_tags($this->age));
            $this->designation=htmlspecialchars(strip_tags($this->designation));
            $this->created=htmlspecialchars(strip_tags($this->created));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":age", $this->age);
            $stmt->bindParam(":designation", $this->designation);
            $stmt->bindParam(":created", $this->created);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteEmployee(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>