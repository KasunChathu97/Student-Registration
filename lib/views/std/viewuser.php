<?php
include_once("../../functions/db_conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User Details</title>
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
                <h3 align="center">User Details</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover table-dark table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>NIC</th>
                            <th>Phone</th>
                            <th>DOB</th>
                            <th>Status</th>
                            <th>Courses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $db_conn = connection();

                        if (isset($_GET['id'])) {
                            $id = intval($_GET['id']); // Convert to int for safety

                            // Prepare and execute query
                            $stmt = mysqli_prepare($db_conn, "SELECT * FROM user_tbl WHERE id = ?");
                            mysqli_stmt_bind_param($stmt, "i", $id);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                            <td>{$row['id']}</td>
                                            <td>{$row['user_name']}</td>
                                            <td>{$row['user_email']}</td>
                                            <td>{$row['user_nic']}</td>
                                            <td>{$row['user_phone']}</td>
                                            <td>{$row['user_dob']}</td>
                                            <td>{$row['user_status']}</td>
                                            <td>{$row['courses']}</td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8' align='center'>No user found.</td></tr>";
                            }

                            mysqli_stmt_close($stmt);
                        } else {
                            echo "<tr><td colspan='8' align='center'>No user ID provided.</td></tr>";
                        }

                        mysqli_close($db_conn);
                        ?>
                    </tbody>
                </table>
                <div class="mt-3 text-end">
                    <a href="../../../dashboard.php" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
