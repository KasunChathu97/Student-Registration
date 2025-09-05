<?php
include_once("../../functions/db_conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input data
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $std_name = isset($_POST['userName']) ? trim($_POST['userName']) : '';
    $std_email = isset($_POST['userEmail']) ? trim($_POST['userEmail']) : '';
    $std_nic = isset($_POST['userNic']) ? trim($_POST['userNic']) : '';
    $std_tel = isset($_POST['userTel']) ? trim($_POST['userTel']) : '';
    $std_dob = isset($_POST['userDob']) ? trim($_POST['userDob']) : '';
    $std_course = isset($_POST['courses']) ? trim($_POST['courses']) : '';

    // Validate required fields
    if (!empty($std_name) && !empty($std_email) && !empty($std_nic) && !empty($std_tel) && !empty($std_dob) && !empty($std_course)) {
        $db_conn = connection();

        // Insert data into student_tbl
        $query = "INSERT INTO std_tbls (std_name, std_email, std_nic, std_tel, std_dob, std_course) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($db_conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssss", $std_name, $std_email, $std_nic, $std_tel, $std_dob, $std_course);

            if (mysqli_stmt_execute($stmt)) {
                echo 1; // Success
            } else {
                echo 0; // Failure
            }

            mysqli_stmt_close($stmt);
        } else {
            echo 0; // Failure
        }

        mysqli_close($db_conn);
    } else {
        echo 0; // Invalid input
    }
} else {
    echo 0; // Invalid request method
}
