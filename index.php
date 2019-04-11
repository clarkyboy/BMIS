<?php
    session_start();
    require_once 'classes/Controller/LoginController.php';
    require_once 'classes/Controller/RoutesController.php';
    require_once 'classes/Controller/MessageController.php';
    $url = null;
    if(isset($_SESSION['url'])){
        $url = $_SESSION['url'];
    }
    header('Location:'.$url);
    $logincontroller = new LoginAccessController;
    $routes = new RoutesController;
    $messagecontroller = new MessageController;
    $display = null;
    if(isset($_POST['login'])){
        $username = trim($_POST['username']);
        $password = md5(trim($_POST['password']));
        $credentials = $logincontroller->login($username, $password);
        if(!empty($credentials)){
            $_SESSION['id'] = $credentials['bmis_id'];
            $_SESSION['name'] = $credentials['person_fname'];
            $_SESSION['position'] = $credentials['bp_name'];
            $_SESSION['logstat'] = "Active";
            if($credentials['bp_code'] == 'SA'){

                echo $routes->adminDashboard();

            }elseif($credentials['bp_code'] == 'INTR'){

                echo $routes->volunteerDashboard();

            }else{

                echo $routes->guest();

            }
        }else{
           $display = $messagecontroller->errorAlert("User not Found! Incorrect username and password entered!");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <title>ezProfile</title>
</head>
<body>
    <div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image">
        </div>
        <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
            <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-8 mx-auto">
                 <img src="images/logo.PNG" alt="img-thumbnail mx-auto d-block">
                <br>
                <h3 class="login-heading mb-4">Login</h3>
                <?php echo $display;?>
                <form method="POST">
                    <div class="form-label-group">
                    <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
                    <label for="inputEmail">Username</label>
                    </div>

                    <div class="form-label-group">
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                    <label for="inputPassword">Password</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Remember password</label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="login">Sign in</button>
                    <div class="text-center">
                    <a class="small" href="#">Forgot password?</a></div>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</body>
</html>