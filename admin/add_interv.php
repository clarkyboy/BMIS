<?php
  require_once '../classes/Controller/AdminController.php';
  require_once '../classes/Controller/MessageController.php';
  require_once '../classes/Model/PersonModel.php';
  require_once '../classes/Model/UsersModel.php';
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
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Add Interviewer</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

<?php include 'pages/navbar.php'; ?>

  <div id="wrapper">

  <?php include 'pages/sidebar.php';?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Add Interviewer</li>
        </ol>

        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Add Interviewer</div>
          <div class="card-body">
          <?php echo $display; ?>
        <div class="container p-3">
            <form action="" method="post" class="p-3">
                <div class="form-group">
                    <label for="">Position</label>
                   <select name="position" id="" class="form-control">
                        <?php
                             foreach ($pos as $key => $value) {
                                 echo "<option value = '".$value['bp_id']."'>".$value['bp_code']." | ".$value['bp_name']."</option>";
                             }
                        ?>
                   </select>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="fname" id="" class="form-control" required>
                    </div>
                    <div class="col-4">
                        <label for="firstname">Lastname</label>
                        <input type="text" name="lname" id="" class="form-control" required>
                    </div>
                    <div class="col-4">
                        <label for="firstname">Date of Birth</label>
                        <input type="date" name="dob" id="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">City Address</label>
                    <input type="text" name="ctaddr" id="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Province Address</label>
                    <input type="text" name="provaddr" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email Address</label>
                    <input type="email" name="email" id="" class="form-control">
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="firstname">Cellphone/Telephone Number</label>
                        <input type="text" name="telephone" id="" class="form-control">
                    </div>
                    <div class="col-4">
                        <label for="gender">Gender</label>
                        <select name="gender" id="" class="form-control" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="LGBT">LGBT</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="dob">Date Added</label>
                        <input type="date" name="dad" id="" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                            <label for="bloodtype">Blood Type</label>
                            <select name="bloodtype" id="" class="form-control">
                                <option value="A+">A+</option>
                                <option value="A">A</option>
                                <option value="A">A-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB">AB</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="B">B</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="O">O</option>
                            </select>
                    </div>
                    <div class="col-4">
                            <label for="sitio">Sitio</label>
                            <select name="sitio" id="" class="form-control" required>
                                <?php
                                    foreach ($sitio as $key => $value) {
                                    echo "<option value = '".$value['sitio_id']."'>".$value['sitio_name']."</option>";
                                    }
                                ?>
                            </select>
                    </div>
                    <div class="col-4">
                            <label for="sector">Sector Group</label>
                            <select name="sector" id="" class="form-control" required>
                                <?php
                                    foreach ($psg as $key => $value) {
                                    echo "<option value = '".$value['psg_id']."'>".$value['psg_desc']."</option>";
                                    }
                                ?>
                            </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="">Username</label>
                        <input type="text" name="username" id="" class="form-control" spellcheck="true required>
                    </div>
                    <div class="col-6">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control" value="interviewer123default" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">SSS No.</label>
                    <input type="text" name="sss" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Philhealth No.</label>
                    <input type="text" name="philhealth" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tax Identification No.</label>
                    <input type="text" name="tin" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">PAGIBIG No.</label>
                    <input type="text" name="pagibig" id="" class="form-control">
                </div>
                <input type="hidden" name="sessionid" value="<?php echo $_SESSION['id']; ?>" class="form-control">
                <input type="submit" value="Save" name="add" class="btn btn-primary">
                <input type="Reset" value="Reset" class="btn btn-danger">
            </form>
        </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

</body>

</html>
