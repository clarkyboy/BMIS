<?php

    require_once '../classes/Service/DatabaseService.php';

    class AdminAccessController extends Database{

       public function addPerson($pos, $fname, $lname, $dob, $cityaddr, $provaddr, $email, $telno, $gender,  $date_added, $blood, $sitio, $psg, $username, $password, $tin, $sss, $phil, $pagibig){
            $sql = "INSERT INTO person (person_fname, person_lname, person_dob, person_address, person_telno, person_provaddr, person_gender, person_email, person_bloodtype, person_sss, person_tin, person_philhealth, person_pagibig, person_sector_group)
                    VALUES ('$fname', '$lname', '$dob', '$cityaddr', '$telno', '$provaddr', '$gender', '$email', '$blood', '$sss', '$tin', '$phil', '$pagibig', '$psg')";
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
                return $sql;
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

    }


?>