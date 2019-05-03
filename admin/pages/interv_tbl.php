<?php
    require_once '../../classes/Controller/AdminController.php';
    $admindao = new AdminAccessController;
    $list = $admindao->getAllInterviewers();
    $mode = $_POST['mode'];
    if($mode != null){
        echo "";
    }else{
        echo "Error!";
    }
?>
<div class="card">
    <h5 class="card-title p-3">View Interviewer</h5>
    <div class="container mt-3">
        <table class="table table-striped">
            <thead>
                <th>Name</th>
                <th>Sitio</th>
                <th>Username</th>
                <th>Date Registered</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php
                    foreach($list as $key=>$value){
                       echo "<tr>";
                            echo "<td>".$value['person_fname']." ".$value['person_lname']."</td>";
                            echo "<td>".$value['sitio_name']."</td>";
                            echo "<td>".$value['bmis_login_name']."</td>";
                            echo "<td>".date('F j, Y', strtotime($value['bmis_date_added']))."</td>";
                            echo "<td>".$value['bmis_status']."</td>";
                       echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>