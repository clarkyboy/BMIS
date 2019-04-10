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
    }

?>