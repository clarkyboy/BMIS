<?php

    class PersonModel {

        private $id;
        private $fname;
        private $lname;
        private $dob;
        private $address;
        private $telno;
        private $provaddr;
        private $gender;
        private $email;
        private $bloodtype;
        private $sss;
        private $tin;
        private $philhealth;
        private $pagibig;
        private $psg;
        private $status;

        public function toString(){
            return $this->id." Name: ".$this->fname." ".$this->lname."<br> Date of Birth: ".$this->dob."<br> Address: ".$this->address."<br> Telephone: ".$this->telno.
                    "<br> Provincial Address: ".$this->provaddr."<br> Gender: ".$this->gender."<br> Email: ".$this->email."<br> Blood Type: ".$this->bloodtype."<br> SSS: ".$this->sss.
                    "<br> TIN: ".$this->tin."<br> PhilHealth: ".$this->philhealth."<br> PAGIBIG: ".$this->pagibig."<br> Sector: ".$this->psg."<br> Status: ".$this->status;
        }

    }



?>