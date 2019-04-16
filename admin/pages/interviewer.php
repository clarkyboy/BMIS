<?php
    require_once '../../../classes/Controller/AdminController.php';
    $admindao = new AdminAccessController;
    $sitio = $admindao->getSitios();
    $psg = $admindao->getPSG();
?>
    <div class="card">
        <h5 class="card-title p-3">Add Interviewer</h5>
        <div class="container p-3">
            <form action="" method="post">
                <div class="row">
                    <div class="col-3">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="fname" id="" class="form-control">
                    </div>
                    <div class="col-3">
                        <label for="firstname">Lastname</label>
                        <input type="text" name="lname" id="" class="form-control">
                    </div>
                    <div class="col-3">
                        <label for="firstname">Date of Birth</label>
                        <input type="date" name="dob" id="" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">City Address</label>
                    <input type="text" name="ctaddr" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Province Address</label>
                    <input type="text" name="provaddr" id="" class="form-control">
                </div>
                <div class="row">
                    <div class="col-3">
                        <label for="firstname">Cellphone/Telephone Number</label>
                        <input type="tel" name="telephone" id="" class="form-control">
                    </div>
                    <div class="col-3">
                        <label for="gender">Gender</label>
                        <select name="gender" id="" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="LGBT">LGBT</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="firstname">Date of Birth</label>
                        <input type="date" name="dob" id="" class="form-control">
                    </div>
                </div>
            </form>
        </div>
        
    </div>
