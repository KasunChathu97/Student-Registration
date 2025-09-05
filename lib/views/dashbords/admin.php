<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../../css/bootstrap/css/bootstrap.min.css">
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
<body style="background-color:rgba(0, 0, 0, 0.4);" >
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
                <h3 align="center">Admin Dashboard</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <a href="../std/addstd.php" class="btn btn-success" style="width:100%" >Add Student</a>
                    </div>
                    <div class="col-md-6">
                    <a href="../std/managestd.php" class="btn btn-danger" style="width:100%" >Manage Student</a>
                    </div>
                </div>
                <div class="mt-3 text-end">
                    <a href="../../../home_1.php" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

