<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface.com</title>
    <!-- Link Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 125vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10;
        }
        .card {
            background-color: rgba(0, 0, 0, 0.4);
            color: white;
        }
        .form-container {
            max-width: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="card">
            <div class="card-header">
                <h4>Registration Section</h4> 
            </div>
            <div class="card-body">
                <form action="lib\route\user\registration.php" method="post">
                    <div class="form-group mt-3">
                        <label for="userName">Enter Your Name</label>
                        <input type="text" name="userName" id="userName" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="userEmail">Enter Your Email</label>
                        <input type="text" name="userEmail" id="userEmail" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="userpass">Enter Your Password</label>
                        <input type="password" name="userpass" id="userpass" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="userphone">Enter Your Phone</label>
                        <input type="text" name="userPhone" id="userphone" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="userNic">Enter Your NIC</label>
                        <input type="text" name="userNic" id="userNic" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="userDOB">Enter Your DOB</label>
                        <input type="date" name="userDOB" id="userDOB" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="courseSelect">Select Your Course</label>
                        <select name="courseSelect" id="courseSelect" class="form-control mt-3">
                            <option value="" disabled selected>Choose a course</option>
                            <option value="computer_science">Bachelor of Science (IT)</option>
                            <option value="business_management">Bachelor of Business Management</option>
                            <option value="engineering">Bachelor of Engineering Technology</option>
                            <option value="psychology">Bachelor of Psychology</option>
                            <option value="arts">Bachelor of Arts General Degree</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" name="btnSave" id="btnSave" value="Register" class="btn btn-outline-success btn-5m">
                        <input type="reset" value="Clear" class="btn btn-outline-danger btn-5m">
                    </div>
                    <div class="col-md-12" style="color:white">
                        <p class="do mt-3">Already have an account ? 
                        <a href="login.php">Login Now</a></p> <br>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
