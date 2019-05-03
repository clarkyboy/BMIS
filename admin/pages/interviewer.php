<?php
    //$document_root = $_SERVER['DOCUMENT_ROOT'];
    require_once '../../classes/Controller/AdminController.php';
    require_once '../../classes/Controller/MessageController.php';
    require_once '../../classes/Model/PersonModel.php';
    require_once '../../classes/Model/UsersModel.php';
    $mode = $_POST['mode'];
    $personModel = new PersonModel;
    $userModel = new UsersModel;
    $messageController = new MessageController;
    $admindao = new AdminAccessController;
    $display = null;
    $sitio = $admindao->getSitios();
    $psg = $admindao->getPSG();
    $pos = $admindao->getBrgyPos();

    if(isset($_POST['add'])){
        $personModel->fname = $_POST['fname'];
        $personModel->lname = $_POST['lname'];
        $personModel->dob = $_POST['dob'];
        $personModel->address = $_POST['ctaddr'];
        $personModel->telno = $_POST['telephone'];
        $personModel->provaddr = $_POST['provaddr'];
        $personModel->gender = $_POST['gender'];

        $personModel->email = $_POST['email'];
        $personModel->bloodtype = $_POST['bloodtype'];
        $personModel->sss = $_POST['sss'];
        $personModel->tin = $_POST['tin'];
        $personModel->philhealth = $_POST['philhealth'];
        $personModel->pagibig = $_POST['pagibig'];
        $personModel->psg = $_POST['sector'];

        $userModel->sitio = $_POST['sitio'];
        $userModel->barangay_position = $_POST['position'];
        $userModel->date_added = $_POST['dad'];
        $userModel->login_name = $_POST['username'];
        $userModel->login_pass = md5(trim($_POST['password']));

        $addedby = $_POST['sessionid'];

        $checker = $admindao->checkDuplicate($personModel->fname, $personModel->psg, $userModel->sitio, $userModel->login_name);
        if(count($checker) > 0){
            $display = $messageController->errorAlert("Person already added. Please refrain from entering duplicates");
        }else{
            $result = $admindao->addPerson($userModel->barangay_position, $personModel->fname, $personModel->lname, $personModel->dob,  
                                        $personModel->address, $personModel->provaddr, $personModel->email, $personModel->telno, 
                                        $personModel->gender, $userModel->date_added, $personModel->bloodtype, $userModel->sitio,
                                    $personModel->psg, $userModel->login_name, $userModel->login_pass,$personModel->tin, 
                                    $personModel->sss, $personModel->philhealth, $personModel->pagibig, $addedby);
            if($result){
                $display = $messageController->successAlert("Interviewer added!");
            }else{
                $display = $messageController->errorAlert("Check the input boxes. Make sure you filled out everything correctly");
            }

        }//end of checker

    }//end of isset
if($mode != null){
    echo "";
}else{
    echo "Error!";
}
?>
    <div class="card">
        <h5 class="card-title p-3">Add Interviewer</h5>
       
        
    </div>
