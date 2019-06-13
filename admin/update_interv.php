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
  $pos = $admindao->getBrgyPos();
  $statuses = array("Active", "Inactive", "Banned", "New");
  $id = $_GET['id'];
  $name = $_GET['name'];
  $bmis = $admindao->getSpecificUser($id);

  if(isset($_POST['update'])){

      $userModel->sitio = $_POST['sitio'];
      $userModel->barangay_position = $_POST['position'];
     // $userModel->date_added = $_POST['dad'];
      $userModel->login_name = $_POST['username'];
      if(empty($_POST['password'])){
        $userModel->login_pass = $bmis['bmis_login_pass'];
      }else{
        $userModel->login_pass = md5(trim($_POST['password']));
      }
      
      $userModel->status = $_POST['status'];

      //$addedby = $_POST['sessionid'];

      //$checker = $admindao->checkDuplicate($personModel->fname, $personModel->psg, $userModel->sitio, $userModel->login_name);
      // if(count($checker) > 0){
      //     $display = $messageController->errorAlert("Person already updated. Please refrain from entering duplicates");
      // }else{
          $result = $admindao->updateInterviewer($userModel->sitio, $userModel->login_name, $userModel->login_pass, $userModel->barangay_position,  $userModel->status, $id);
          if($result){
              $display = $messageController->successAlert("Interviewer upded!");
          }else{
              $display = $messageController->errorAlert("Check the input boxes. Make sure you filled out everything correctly");
          }

      // }//end of checker

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

  <title>SB Admin - Update Interviewer</title>

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
          <li class="breadcrumb-item active">Update Interviewer</li>
        </ol>

        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Update Interviewer</div>
          <div class="card-body">
          <?php echo $display; ?>
        <div class="container p-3">
            <p class="lead">Name:  <b><?php echo $name;?></b></p>
            <form action="" method="post" class="p-3">
                <div class="form-group">
                      <label for="sitio">Sitio</label>
                      <select name="sitio" id="" class="form-control" required>
                          <?php
                              foreach ($sitio as $key => $value) {
                                if($bmis['sitio_id'] == $value['sitio_id']){
                                  echo "<option value = '".$value['sitio_id']."' selected>".$value['sitio_name']."</option>";
                                }else{
                                  echo "<option value = '".$value['sitio_id']."'>".$value['sitio_name']."</option>";
                                }
                                
                              }
                            ?>
                      </select>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for="">Username</label>
                        <input type="text" name="username" id="" class="form-control" value="<?php echo $bmis['bmis_login_name']; ?>" spellcheck="true" required>
                    </div>
                   
                    <div class="col-4">
                        <label for="">Password</label>
                        <input type="password" name="password" id="" class="form-control">
                    </div>
                    <div class="col-4">
                        <label for="">Confirm Password</label>
                        <input type="password" name="cpassword" id="" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Position</label>
                   <select name="position" id="" class="form-control">
                        <?php
                             foreach ($pos as $key => $value) {
                                if($bmis['barangay_position'] == $value['bp_id']){
                                  echo "<option value = '".$value['bp_id']."' selected>".$value['bp_code']." | ".$value['bp_name']."</option>";
                                }else{
                                  echo "<option value = '".$value['bp_id']."'>".$value['bp_code']." | ".$value['bp_name']."</option>";
                                }
                                 
                             }
                        ?>
                   </select>
                </div>
                <!-- <input type="hidden" name="sessionid" value="<?php echo $_SESSION['id']; ?>" class="form-control"> -->
                <div class="form-group">
                  <label for="">Status</label>
                  <select name="status" id="" class="form-control">
                      <?php
                          for($i=0; $i<count($statuses); $i++){
                              if($bmis['bmis_status'] == $statuses[$i]){
                                  echo "<option value='".$bmis['bmis_status']."' selected>".$statuses[$i]."</option>";
                              }else{
                                  echo "<option value='".$statuses[$i]."'>".$statuses[$i]."</option>";
                              }
                          }
                      ?>
                  </select>
                </div>
                <input type="submit" value="Save" name="update" class="btn btn-warning">
                <a href="ret_interv.php" class="btn btn-danger" role="button">Back</a>
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

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
</body>

</html>
