<?php

    class PersonModel {

        public $id;
        public $fname;
        public $lname;
        public $dob;
        public $address;
        public $telno;
        public $provaddr;
        public $gender;
        public $email;
        public $bloodtype;
        public $sss;
        public $tin;
        public $philhealth;
        public $pagibig;
        public $psg;
        public $status;

        public function toString(){
            return $this->id." Name: ".$this->fname." ".$this->lname."<br> Date of Birth: ".$this->dob."<br> Address: ".$this->address."<br> Telephone: ".$this->telno.
                    "<br> Provincial Address: ".$this->provaddr."<br> Gender: ".$this->gender."<br> Email: ".$this->email."<br> Blood Type: ".$this->bloodtype."<br> SSS: ".$this->sss.
                    "<br> TIN: ".$this->tin."<br> PhilHealth: ".$this->philhealth."<br> PAGIBIG: ".$this->pagibig."<br> Sector: ".$this->psg."<br> Status: ".$this->status;
        }

    }



?>