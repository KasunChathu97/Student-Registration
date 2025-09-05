<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <?php
include_once ("../../functions/db_conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Id = $_POST["userId"];
    $userdName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userdNic = $_POST["userNic"];
    $userTel = $_POST["userTel"];
    $userDob = $_POST["userDob"];
    
    $db_conn = connection();
    $query = "UPDATE user_tbl SET user_name = ?, user_email = ?, user_nic = ?, user_phone = ?, user_dob = ? WHERE id = ?";
    $stmt = mysqli_prepare($db_conn, $query);

    if (!$stmt) {
        die("Error in SQL query: " . mysqli_error($db_conn));
    }

    // Correct the bind_param statement: the variables should be in the same order as in the SQL query.
    mysqli_stmt_bind_param($stmt, "sssssi", $userdName, $userEmail, $userdNic, $userTel, $userDob, $Id);

    if (mysqli_stmt_execute($stmt)) {
        echo "1"; // Success
    } else {
        echo "0"; // Error
    }

    mysqli_stmt_close($stmt);
    mysqli_close($db_conn);
}
?>

</head>
<body>
