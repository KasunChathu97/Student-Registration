<?php
//include function page
include_once('lib/functions/userfunction.php');
if(isset($_POST['btnLogin'])){
    $result = Authentication($_POST['userName'],$_POST['userPass']);
    echo($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface.com</title>
    <!--Link Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
        }
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="center-container">
        <div class="col-md-6">
            <div class="card" style="background-color:rgba(0, 0, 0, 0.4);">
                <div class="card-header" style="color:white">
                    <h3 align="center">Login Section</h3> 
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group mt-3">
                            <label style="color:white" for="">Enter Your User Name</label>
                            <input type="email" name="userName" id="userName" class="form-control" required>
                        </div>
                        <div class="form-group mt-3">
                            <label style="color:white" for="">Enter Your Password</label>
                            <input type="password" name="userPass" id="userPass" class="form-control" required>
                        </div>
                        <div class="form-group mt-3" align="center">
                            <input type="submit" value="Login" name="btnLogin" class="btn btn-outline-warning btn-sm">
                        </div>
                        <div class="col-md-12" style="color:white">
                            <p class="do mt-3">Don't you have an account ? 
                            <a href="index_1.php">Register Now</a></p> <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
