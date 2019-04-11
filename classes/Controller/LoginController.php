<?php

    require_once 'classes/Service/DatabaseService.php';

    class LoginAccessController extends Database{

        public function login($username, $password){

            $sql = "SELECT bmis_users.*, person.person_fname, barangay_positions.bp_name, barangay_positions.bp_code FROM bmis_users 
                    JOIN person ON person.person_id = bmis_users.person_id
                    JOIN barangay_positions ON barangay_positions.bp_id = bmis_users.barangay_position
                    WHERE bmis_login_name = '$username' AND bmis_login_pass = '$password'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }
        
    }



?>