<?php
    require_once '../classes/Controller/AdminController.php';
    $admindao = new AdminAccessController;
    $list = $admindao->getAllInterviewers();
    
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - View Interviewers</title>

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
          <li class="breadcrumb-item active">View Interviewer(s)</li>
        </ol>

        <!-- Page Content -->
        <div class="card mb-3">
          <div class="card-header">
          <i class="fas fa-table"></i>
           View Interviewer</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Barangay</th>
                      <th>Sitio</th>
                      <th>Username</th>
                      <th>Date Registered</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr> 
                </thead>
                <tbody>
                    <?php
                        foreach($list as $key=>$value){
                          echo "<tr>";
                                echo "<td>".$value['person_fname']." ".$value['person_lname']."</td>";
                                echo "<td>".$value['barangay_name']."</td>";
                                echo "<td>".$value['sitio_name']."</td>";
                                echo "<td>".$value['bmis_login_name']."</td>";
                                echo "<td>".date('F j, Y', strtotime($value['bmis_date_added']))."</td>";
                                echo "<td>".$value['bmis_status']."</td>";
                                echo "<td><a href='update_interv.php?id=".$value['bmis_id']."&name=".$value['person_fname']." ".$value['person_lname']."' class='btn btn-outline-warning mr-auto'><i class='fa fa-edit' aria-hidden='true'></i></a>";
                                echo "<a href='' class='btn btn-outline-danger'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
                          echo "</tr>";
                        }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"></div>
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
