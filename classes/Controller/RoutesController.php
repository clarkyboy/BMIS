<?php

    class RoutesController{

        public function index(){
            return header('Location: index.php');
        }
        public function adminDashboard(){
            return  header('Location: admin/dashboard.php');
        }
        public function volunteerDashboard(){
            return header('Location: volunteer/dashboard.php');
        }
        public function guest(){
            return  header('Location: guest.php');
        }
        public function error404($msg){
            return header('Location: 404.php?msg='.$msg);
        }

        public function checkSession($logstat){
            if($logstat == null){
                echo $this->index();
            }
        }
        public function checkPosition($position, $location){

            if($position == "Super Admin" && $location =="/BMIS/volunteer/dashboard.php"){
                return $this->adminDashboard();
            }elseif($position == "Interviewer" && $location =="/BMIS/admin/dashboard.php"){
                return $this->volunteerDashboard();
            }else{
                return header('Location:'.$location);
            }
        }

    }

?>