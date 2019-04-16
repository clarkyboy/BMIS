<?php

    require_once 'classes/Service/DatabaseService.php';

    class AdminAccessController extends Database{

       public function addPersonSector(){

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

    }


?>