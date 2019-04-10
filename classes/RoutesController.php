<?php

    class Routes{
        public function adminDashboard(){
            return  header('Location: admin/dashboard.php');
        }
        public function volunteerDashboard(){
            return header('Location: volunteer/dashboard.php');
        }
        public function guest(){
            return  header('Location: guest.php');
        }
    }

?>