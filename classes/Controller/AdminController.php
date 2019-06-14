<?php

    require_once '../classes/Service/DatabaseService.php';

    class AdminAccessController extends Database{

       public function addPerson($pos, $fname, $lname, $dob, $cityaddr, $provaddr, $email, $telno, $gender,  $date_added, $blood, $sitio, $psg, $username, $password, $tin, $sss, $phil, $pagibig, $addedby){
            $sql = "INSERT INTO person (person_fname, person_lname, person_dob, person_address, person_telno, person_provaddr, person_gender, person_email, person_bloodtype, person_sss, person_tin, person_philhealth, person_pagibig, person_sector_group, person_addedby)
                    VALUES ('$fname', '$lname', '$dob', '$cityaddr', '$telno', '$provaddr', '$gender', '$email', '$blood', '$sss', '$tin', '$phil', '$pagibig', '$psg', '$addedby')";
            $result = $this->conn->query($sql);
            if($result){
                    $person_id = mysqli_insert_id($this->conn);
                    $bmis_users = "INSERT INTO bmis_users (sitio_id, person_id, barangay_position, bmis_date_added, bmis_login_name, bmis_login_pass)
                                   VALUES('$sitio', '$person_id', '$pos', '$date_added', '$username', '$password')";
                    $resultset = $this->conn->query($bmis_users);
                    if($resultset){
                        return TRUE;
                    }else{
                        return FALSE;
                    }
            }else{
                return FALSE;
            }
       }
       public function getSitios(){
           $sql = "SELECT * FROM sitio";
           $result = $this->conn->query($sql);
           $rows = $result->fetch_all(MYSQLI_ASSOC);
           return $rows;
       }
       public function getPSG(){
           $sql = "SELECT * FROM person_sector_group";
           $result = $this->conn->query($sql);
           $rows = $result->fetch_all(MYSQLI_ASSOC);
           return $rows;
       }
       public function getBrgyPos(){
        $sql = "SELECT * FROM barangay_positions";
        $result = $this->conn->query($sql);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        return $rows;
       }
       public function checkDuplicate($name, $psg, $sitio_id, $username){
            $sql = "SELECT * FROM person JOIN bmis_users ON person.person_id = bmis_users.person_id
                WHERE (person.person_fname = '$name' AND person.person_sector_group = '$psg') OR (bmis_users.sitio_id = '$sitio_id' AND bmis_users.bmis_login_name = '$username')";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc(); // this will get a single result
            return $row;
       }

       public function getAllInterviewers(){
            $sql = "SELECT * FROM bmis_users JOIN person ON bmis_users.person_id = person.person_id JOIN sitio ON bmis_users.sitio_id = sitio.sitio_id JOIN barangay ON barangay.barangay_id = sitio.barangay_id
            WHERE bmis_users.barangay_position = 11 AND (bmis_users.bmis_status = 'Active' OR bmis_users.bmis_status = 'New') ";
            $result = $this->conn->query($sql);
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            return $rows;
       }

       public function getSpecificUser($id){
            $sql = "SELECT * FROM bmis_users WHERE bmis_id = '$id'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
       }
       public function updateInterviewer($sitio, $username, $password, $position, $status, $id){
            $sql = "UPDATE bmis_users SET sitio_id = '$sitio', barangay_position = '$position', bmis_login_name = '$username',
                    bmis_login_pass = '$password', bmis_status = '$status' WHERE bmis_id = '$id'";
            $result = $this->conn->query($sql);
            return $result;
       }

       public function getYouthResidents(){
           $sql = "SELECT * FROM person JOIN person_sector_group ON person.person_sector_group = person_sector_group.psg_id JOIN sitio ON person.person_sitio = sitio.sitio_id JOIN barangay ON barangay.barangay_id = sitio.barangay_id WHERE person.person_sector_group = 3";
           $result = $this->conn->query($sql);
           $rows = $result->fetch_all(MYSQLI_ASSOC);
           return $rows;
       }
       public function getSCResidents(){
            $sql = "SELECT * FROM person JOIN person_sector_group ON person.person_sector_group = person_sector_group.psg_id JOIN sitio ON person.person_sitio = sitio.sitio_id JOIN barangay ON barangay.barangay_id = sitio.barangay_id WHERE person.person_sector_group = 8";
            $result = $this->conn->query($sql);
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            return $rows;
        }
        public function getAllResidents(){
            $sql = "SELECT * FROM person JOIN person_sector_group ON person.person_sector_group = person_sector_group.psg_id JOIN sitio ON person.person_sitio = sitio.sitio_id JOIN barangay ON barangay.barangay_id = sitio.barangay_id";
            $result = $this->conn->query($sql);
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            return $rows;
        }
    }


?>