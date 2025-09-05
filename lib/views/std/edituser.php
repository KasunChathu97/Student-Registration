<?php
include_once("../../functions/db_conn.php");

// Fetch the user details using the ID passed in the URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id) {
    $db_conn = connection();
    $query = "SELECT * FROM user_tbl WHERE id = ?";
    $stmt = mysqli_prepare($db_conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
} else {
    die("Invalid or missing user ID.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <h3 align="center">Edit User Details</h3>
            </div>
            <div class="card-body">
                <form id="stdEditForm">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                    <div class="form-group">
                        <label for="userName">User Name</label>
                        <input type="text" name="userName" id="userName" class="form-control" value="<?php echo htmlspecialchars($row['user_name']); ?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="userEmail">User Email</label>
                        <input type="email" name="userEmail" id="userEmail" class="form-control" value="<?php echo htmlspecialchars($row['user_email']); ?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="userNic">NIC</label>
                        <input type="text" name="userNic" id="userNic" class="form-control" value="<?php echo htmlspecialchars($row['user_nic']); ?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="userTel">Phone</label>
                        <input type="text" name="userTel" id="userTel" class="form-control" value="<?php echo htmlspecialchars($row['user_phone']); ?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="userDob">DOB</label>
                        <input type="date" name="userDob" id="userDob" class="form-control" value="<?php echo htmlspecialchars($row['user_dob']); ?>">
                    </div>
                    <div class="form-group mt-2">
                        <label for="courses">Course</label>
                        <input type="text" name="courses" id="courses" class="form-control" value="<?php echo htmlspecialchars($row['courses']); ?>">
                    </div>
                    <div class="form-group mt-2">
                        <button type="button" id="btnSave" class="btn btn-success">Save</button>
                        <a href="managestd.php" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $('#btnSave').click(function() {
            $.ajax({
                url: "../../route/std/edit.php",
                method: "POST",
                data: $('#stdEditForm').serialize(),
                success: function(response) {
                    if (response == 1) {
                        alert("Success! Details inserted into the student table.");
                        window.location.href = "managestd.php";
                    } else {
                        alert("Error! Insertion failed.");
                    }
                }
            });
        });
    </script>
</body>
</html>
