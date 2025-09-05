<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add STD Details</title>
    <link rel="stylesheet" href="../../../css/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body style="background-color:rgba(0, 0, 0, 0.4);">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../../../home_1.php">DDA Campus</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-danger" href="../../../home.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
            <h3 align="center">Add Student Details</h3>
            </div>
        <div class="card-body">

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form id="stdRegistrationForm">
                <div class="form-group mt-2">
                    <input type="text" name="stdName" class="form-control" placeholder="Enter Student Name....">
                </div>
                <div class="form-group mt-2">
                    <input type="email" name="stdEmail" class="form-control" placeholder="Enter Student Email....">
                </div>
                <div class="form-group mt-2">
                    <input type="text" name="stdNic" class="form-control" placeholder="Enter Student NIC....">
                </div>
                <div class="form-group mt-2">
                    <input type="text" name="stdTel" class="form-control" placeholder="Enter StudentPhone....">
                </div>
                <div class="form-group mt-2">
                    <input type="date" name="stdDob" class="form-control" placeholder="EnterStudent DOB....">
                </div>
                <div class="form-group mt-2">
                    <label style="color:white" for="courseSelect">Select Your Course
                    <select name="courseSelect" id="courseSelect" class="form-control mt-3">
                    <option value="" disabled selected>Choose a course</option>
                    <option value="computer_science">Bacholor of Science (IT)   </option>
                    <option value="business_management">Bacholor of Business Management</option>
                    <option value="engineering">Bacholor of Engineering technology</option>
                    <option value="psychology">BacholorPsychology</option>
                    <option value="arts">Bacholor of Arts General Degree </option>
                    </select>
                    </label>
                   </div>
                <div class="form-group mt-2">
                    <input type="submit" name="btnSave" id="btnSave" class="btn btn-success">
                    <input type="reset" value="Clear" class="btn btn-danger">               
                </div>
            </form>
            </div>
        </div>
            <div class="mt-3 text-end">
                <a href="../dashbords/admin.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</body>
</html>
<script src="../../../css/bootstrap/js/bootstrap.js"></script>


<script>
    $('#btnSave').click(function(e){

        $.ajax({
            url:"../../route/std/register.php",
            type:"post",
            data:$('#stdRegistrationForm').serialize(),
            success: function(data){
                console.log('Response:', data);
                if(data == '0'){
                    alert('Error');
                   // alert('success');
                    location.reload(); // Reload the page to see the updated data
                }else{
                    alert('success');
                   // alert('Error');
                }
            }
        })
    });

</script>

